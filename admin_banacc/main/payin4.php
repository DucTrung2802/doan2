<?php
include 'db/connect.php';

// Thêm thanh toán
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add"])) {
    $user_name = $_POST["user_name"];
    $payment_amount = $_POST["payment_amount"];
    $payment_status = $_POST["payment_status"];
    $ma_sp = $_POST["ma_sp"];

    $sql = "INSERT INTO payment_infor (user_name, payment_amount, payment_status, ma_sp) VALUES ('$user_name', '$payment_amount', '$payment_status', '$ma_sp')";
    $conn->query($sql);
}

// Sửa thanh toán
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edit"])) {
    $payment_id = $_POST["payment_id"];
    $user_name = $_POST["user_name"];
    $payment_amount = $_POST["payment_amount"];
    $payment_status = $_POST["payment_status"];
    $ma_sp = $_POST["ma_sp"];

    $sql = "UPDATE payment_infor SET user_name='$user_name', payment_amount='$payment_amount', payment_status='$payment_status', ma_sp='$ma_sp' WHERE payment_id='$payment_id'";
    $conn->query($sql);
}

// Xóa thanh toán
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["delete"])) {
    $payment_id = $_GET["delete"];

    $sql = "DELETE FROM payment_infor WHERE payment_id='$payment_id'";
    $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Thanh Toán</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Quản Lý Thanh Toán</h2>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPaymentModal">
        Thêm Thanh Toán
    </button>

    <br><br>

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tên Người Dùng</th>
            <th>Số Tiền</th>
            <th>Trạng Thái</th>
            <th>Mã Sản Phẩm</th>
            <th>Thao tác</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $result = $conn->query("SELECT * FROM payment_infor");

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['payment_id']}</td>
                    <td>{$row['user_name']}</td>
                    <td>{$row['payment_amount']}</td>
                    <td>{$row['payment_status']}</td>
                    <td>{$row['ma_sp']}</td>
                    <td>
                        <a href='#' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#deleteModal{$row['payment_id']}'>Xóa</a>
                        <a href='#' class='btn btn-warning btn-sm' data-toggle='modal' data-target='#editModal{$row['payment_id']}'>Sửa</a>
                    </td>
                </tr>";

            // Modal for Delete
            echo "<div class='modal fade' id='deleteModal{$row['payment_id']}' tabindex='-1' role='dialog' aria-labelledby='deleteModalLabel' aria-hidden='true'>
                    <div class='modal-dialog' role='document'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='deleteModalLabel'>Xác nhận Xóa</h5>
                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>
                            <div class='modal-body'>
                                Bạn có chắc chắn muốn xóa thanh toán này không?
                            </div>
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Đóng</button>
                                <a href='?delete={$row['payment_id']}' class='btn btn-danger'>Xóa</a>
                            </div>
                        </div>
                    </div>
                </div>";

            // Modal for Edit
            echo "<div class='modal fade' id='editModal{$row['payment_id']}' tabindex='-1' role='dialog' aria-labelledby='editModalLabel' aria-hidden='true'>
                    <div class='modal-dialog' role='document'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='editModalLabel'>Chỉnh Sửa Thanh Toán</h5>
                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>
                            <div class='modal-body'>
                                <form method='post'>
                                    <input type='hidden' name='payment_id' value='{$row['payment_id']}'>
                                    <div class='form-group'>
                                        <label for='user_name'>Tên Người Dùng:</label>
                                        <input type='text' class='form-control' name='user_name' value='{$row['user_name']}' required>
                                    </div>
                                    <div class='form-group'>
                                        <label for='payment_amount'>Số Tiền:</label>
                                        <input type='text' class='form-control' name='payment_amount' value='{$row['payment_amount']}' required>
                                    </div>
                                    <div class='form-group'>
                                        <label for='payment_status'>Trạng Thái:</label>
                                        <input type='text' class='form-control' name='payment_status' value='{$row['payment_status']}' required>
                                    </div>
                                    <div class='form-group'>
                                        <label for='ma_sp'>Mã Sản Phẩm:</label>
                                        <input type='text' class='form-control' name='ma_sp' value='{$row['ma_sp']}' required>
                                    </div>
                                    <button type='submit' class='btn btn-primary' name='edit'>Lưu</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>";
        }
        ?>
        </tbody>
    </table>

</div>

<!-- Modal for Add -->
<div class="modal fade" id="addPaymentModal" tabindex="-1" role="dialog" aria-labelledby="addPaymentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPaymentModalLabel">Thêm Thanh Toán Mới</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="form-group">
                        <label for="user_name">Tên Người Dùng:</label>
                        <input type="text" class="form-control" name="user_name" required>
                    </div>
                    <div class="form-group">
                        <label for="payment_amount">Số Tiền:</label>
                        <input type="text" class="form-control" name="payment_amount" required>
                    </div>
                    <div class="form-group">
                        <label for="payment_status">Trạng Thái:</label>
                        <input type="text" class="form-control" name="payment_status" required>
                    </div>
                    <div class="form-group">
                        <label for="ma_sp">Mã Sản Phẩm:</label>
                        <input type="text" class="form-control" name="ma_sp" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="add">Thêm</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
