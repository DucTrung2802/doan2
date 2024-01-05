<?php
include 'db/connect.php';
// Thêm phản hồi
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_feedback"])) {
    $fb_comment = $_POST["fb_comment"];
    $user_name = $_POST["user_name"];

    $sql = "INSERT INTO tbl_feedback (fb_comment, user_name) VALUES ('$fb_comment', '$user_name')";
    $conn->query($sql);
}

// Sửa phản hồi
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edit_feedback"])) {
    $id = $_POST["id"];
    $fb_comment = $_POST["fb_comment"];
    $user_name = $_POST["user_name"];

    $sql = "UPDATE tbl_feedback SET fb_comment='$fb_comment', user_name='$user_name' WHERE id='$id'";
    $conn->query($sql);
}

// Xóa phản hồi
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["delete_feedback"])) {
    $id = $_GET["delete_feedback"];

    $sql = "DELETE FROM tbl_feedback WHERE id='$id'";
    $conn->query($sql);
}

?>
<!-- Display Feedback Data -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Bình Luận</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Quản Lý Phản Hồi</h2>

    <!-- Button trigger modal for adding feedback -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addFeedbackModal">
        Thêm Phản Hồi
    </button>

    <br><br>

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Bình Luận</th>
            <th>Tên Người Dùng</th>
            <th>Thao Tác</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $result_feedback = $conn->query("SELECT * FROM tbl_feedback");

        while ($row_feedback = $result_feedback->fetch_assoc()) {
            echo "<tr>
                    <td>{$row_feedback['id']}</td>
                    <td>{$row_feedback['fb_comment']}</td>
                    <td>{$row_feedback['user_name']}</td>
                    <td>
                        <a href='#' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#deleteFeedbackModal{$row_feedback['id']}'>Xóa</a>
                        <a href='#' class='btn btn-warning btn-sm' data-toggle='modal' data-target='#editFeedbackModal{$row_feedback['id']}'>Sửa</a>
                    </td>
                </tr>";

            // Modal for Delete Feedback
            echo "<div class='modal fade' id='deleteFeedbackModal{$row_feedback['id']}' tabindex='-1' role='dialog' aria-labelledby='deleteFeedbackModalLabel' aria-hidden='true'>
                    <div class='modal-dialog' role='document'>
                        <div class='modal-content'>
                            <!-- ... (similar structure as the modal for delete account) ... -->
                        </div>
                    </div>
                </div>";

            // Modal for Edit Feedback
            echo "<div class='modal fade' id='editFeedbackModal{$row_feedback['id']}' tabindex='-1' role='dialog' aria-labelledby='editFeedbackModalLabel' aria-hidden='true'>
                    <div class='modal-dialog' role='document'>
                        <div class='modal-content'>
                            <!-- ... (similar structure as the modal for edit account) ... -->
                        </div>
                    </div>
                </div>";
        }
        ?>
        </tbody>
    </table>

</div>

<!-- Modal for Add Feedback -->
<div class="modal fade" id="addFeedbackModal" tabindex="-1" role="dialog" aria-labelledby="addFeedbackModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- ... (similar structure as the modal for add account) ... -->
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
