<?php
include_once("db/connect.php");

// Nút xác nhận nạp tiền
// Nút xác nhận nạp tiền
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["confirmDeposit"])) {
    $id = $_POST["id"];
    $user_name = $_POST["user_name"];
    
    // Lấy giá trị deposits từ CSDL
    $result = $conn->query("SELECT deposits FROM update_balance WHERE id='$id'");
    $row = $result->fetch_assoc();
    $deposits = $row['deposits'];

    // Thực hiện xác nhận nạp tiền ở đây
    $sqlUpdate = "UPDATE tbl_user 
                  SET sodu = sodu + $deposits
                  WHERE user_name = '$user_name'";
    $conn->query($sqlUpdate);

    // Xóa dòng dữ liệu sau khi đã xác nhận nạp tiền
    $sqlDelete = "DELETE FROM update_balance WHERE id='$id'";
    $conn->query($sqlDelete);
  header("location: update_balance.php");
}

// Nút xóa
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["delete"])) {
    $id = $_GET["delete"];

    $sql = "DELETE FROM update_balance WHERE id='$id'";
    $conn->query($sql);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Số Dư</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Quản Lý Số Dư</h2>

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>User Name</th>
            <th>Deposits</th>
            <th>Thao tác</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $result = $conn->query("SELECT * FROM update_balance");

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['user_name']}</td>
                    <td>{$row['deposits']}</td>
                    <td>
                        <a href='#' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#deleteModal{$row['id']}'>Xóa</a>
                        <a href='#' class='btn btn-warning btn-sm' data-toggle='modal' data-target='#confirmModal{$row['id']}'>Xác nhận nạp</a>
                    </td>
                </tr>";

                // Modal for Delete
            echo "<div class='modal fade' id='deleteModal{$row['id']}' tabindex='-1' role='dialog' aria-labelledby='deleteModalLabel' aria-hidden='true'>
            <div class='modal-dialog' role='document'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='deleteModalLabel'>Xác nhận Xóa</h5>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>
                    <div class='modal-body'>
                        Bạn có chắc chắn muốn xóa người dùng này không?
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Đóng</button>
                        <a href='?delete={$row['id']}' class='btn btn-danger'>Xóa</a>
                    </div>
                </div>
            </div>
        </div>";


        echo "<div class='modal fade' id='confirmModal{$row['id']}' tabindex='-1' role='dialog' aria-labelledby='confirmModalLabel' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='confirmModalLabel'>Xác nhận Nạp Tiền</h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
                <div class='modal-body'>
                    Bạn có chắc chắn muốn xác nhận nạp tiền cho người dùng này không?
                    <form method='post'>
                    <input type='hidden' name='id' value='{$row['id']}'>
                    <input type='hidden' name='user_name' value='{$row['user_name']}'>
                    <input type='hidden' name='deposits' value='{$row['deposits']}'>
                    
                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Đóng</button>
                    <button type='submit' class='btn btn-primary' name='confirmDeposit'>Xác nhận</button>
                </div></form>
            </div>
        </div>
    </div>";  

        }
        ?>
        </tbody>
    </table>
</div>
<!-- Modal for Confirm Deposit -->

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
