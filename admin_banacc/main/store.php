<?php
include 'db/connect.php';
function moveUploadedFile($file, $destinationDir)
{
    if (!empty($file['name'])) {
        $targetPath = $destinationDir . uniqid() . '_' . basename($file['name']);
        move_uploaded_file($file['tmp_name'], $targetPath);
        return $targetPath;
    }
    return null;
}

function moveUploadedFiles($files, $destinationDir)
{
    $uploadedFiles = [];

    foreach ($files['name'] as $key => $name) {
        if (!empty($name)) {
            $targetPath = $destinationDir . uniqid() . '_' . basename($name);
            $uploadedFiles[] = $targetPath;
            move_uploaded_file($files['tmp_name'][$key], $targetPath);
        }
    }

    return $uploadedFiles;
}

// Thêm sản phẩm
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add"])) {
    $category = $_POST["category"];
    $deal = $_POST["deal"];
    $tensp = $_POST["tensp"];
    $gia = $_POST["gia"];
    $trangthai = $_POST["trangthai"];
    $img = moveUploadedFile($_FILES['img'], 'img/');
    $ghichu = $_POST["ghichu"];

    // Thêm sản phẩm vào bảng tbl_product
    $sql = "INSERT INTO tbl_product (category, deal, tensp, gia, trangthai, img, ghichu) 
            VALUES ('$category', '$deal', '$tensp', '$gia', '$trangthai', '$img', '$ghichu')";
    $conn->query($sql);

    // Lấy id của sản phẩm vừa thêm vào
    $productId = $conn->insert_id;

    // Thêm ảnh chi tiết vào bảng tbl_img
    if (!empty($_FILES['imgchitiet']['name'][0])) {
        $imgchitietPaths = moveUploadedFiles($_FILES['imgchitiet'], 'imgchitiet/');
        foreach ($imgchitietPaths as $imgchitietPaths) {
            $sql = "INSERT INTO tbl_img (product_id, img) VALUES ('$productId', '$imgchitietPaths')";
            $conn->query($sql);
        }
    }
}



// Sửa sản phẩm
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edit"])) {
    $id = $_POST["id"];
    $category = $_POST["category"];
    $deal = $_POST["deal"];
    $tensp = $_POST["tensp"];
    $gia = $_POST["gia"];
    if (!empty($_FILES['img']['name'])) {
        $img = moveUploadedFile($_FILES['img'], 'img/');
    } else {
       
        $img = $_POST["current_img"]; // Thêm một trường ẩn
    }
    $trangthai = $_POST["trangthai"];
    $ghichu = $_POST["ghichu"];

    $stmt = $conn->prepare("UPDATE tbl_product SET category=?, deal=?, tensp=?, gia=?, trangthai=?, img=?, ghichu=? WHERE id=?");
    $stmt->bind_param("sssssssi", $category, $deal, $tensp, $gia, $trangthai, $img, $ghichu, $id);
    $stmt->execute();

    if (!empty($_FILES['imgchitiet']['name'][0])) {
        $imgchitietPaths = moveUploadedFiles($_FILES['imgchitiet'], 'imgchitiet/');
        foreach ($imgchitietPaths as $imgchitietPath) {
            $stmt = $conn->prepare("INSERT INTO tbl_img (product_id, img) VALUES (?, ?)");
            $stmt->bind_param("is", $id, $imgchitietPath);
            $stmt->execute();
        }
    }
     if (!empty($_POST['delete_img'])) {
        foreach ($_POST['delete_img'] as $deletedImg) {
            unlink($deletedImg);
            $stmt = $conn->prepare("DELETE FROM tbl_img WHERE product_id=? AND img=?");
            $stmt->bind_param("is", $id, $deletedImg);
            $stmt->execute();
            $stmt->close();
        }
    }
    header("Location: product.php");
    exit();
}


// Xóa sản phẩm
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["delete"])) {
    $id = $_GET["delete"];

    $sql = "DELETE FROM tbl_product WHERE id='$id'";
    $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Sản Phẩm</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Quản Lý Sản Phẩm</h2>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProductModal">
        Thêm Sản Phẩm
    </button>

    <br><br>

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Danh Mục</th>
            <th>Ưu Đãi</th>
            <th>Tên Sản Phẩm</th>
            <th>Giá</th>
            <th>Trạng Thái</th>
            <th>Ảnh</th>
            <th>Ảnh Chi Tiết</th>
            <th>Ghi Chú</th>
            <th>Thao tác</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $result = $conn->query("SELECT p.*, GROUP_CONCAT(i.img) as imgchitiet
        FROM tbl_product p
        LEFT JOIN tbl_img i ON p.id = i.product_id
        GROUP BY p.id");

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['category']}</td>
            <td>{$row['deal']}</td>
            <td>{$row['tensp']}</td>
            <td>{$row['gia']}</td>
            <td>{$row['trangthai']}</td>
            <td><img src='{$row['img']}' alt='Image' width='50'></td>
            <td>";
    // Hiển thị ảnh chi tiết
            if (!empty($row['imgchitiet'])) {
                $imgChiTietArray = explode(',', $row['imgchitiet']);
                foreach ($imgChiTietArray as $img) {
                    echo "<img src='$img' alt='Image Chi Tiet' width='50'>";
                }
            }
            echo "</td>
            <td>{$row['ghichu']}</td>
            <td>
                <a href='#' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#deleteModal{$row['id']}'>Xóa</a>
                <a href='#' class='btn btn-warning btn-sm' data-toggle='modal' data-target='#editModal{$row['id']}'>Sửa</a>
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
                                Bạn có chắc chắn muốn xóa sản phẩm này không?
                            </div>
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Đóng</button>
                                <a href='?delete={$row['id']}' class='btn btn-danger'>Xóa</a>
                            </div>
                        </div>
                    </div>
                </div>";

            // Modal for Edit
            echo "<div class='modal fade' id='editModal{$row['id']}' tabindex='-1' role='dialog' aria-labelledby='editModalLabel' aria-hidden='true'>
            <div class='modal-dialog' role='document'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='editModalLabel'>Chỉnh Sửa Sản Phẩm</h5>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>
                    <div class='modal-body'>
                        <form method='post' enctype='multipart/form-data'>
                            <input type='hidden' name='id' value='{$row['id']}'>
                            <div class='form-group'>
                                <label for='category'>Danh Mục:</label>
                                <input type='text' class='form-control' name='category' value='{$row['category']}' required>
                            </div>
                            <div class='form-group'>
                                <label for='deal'>Ưu Đãi:</label>
                                <input type='text' class='form-control' name='deal' value='{$row['deal']}' required>
                            </div>
                            <div class='form-group'>
                                <label for='tensp'>Tên Sản Phẩm:</label>
                                <input type='text' class='form-control' name='tensp' value='{$row['tensp']}' required>
                            </div>
                            <div class='form-group'>
                                <label for='gia'>Giá:</label>
                                <input type='text' class='form-control' name='gia' value='{$row['gia']}' required>
                            </div>
                            <div class='form-group'>
                                <label for='trangthai'>Trạng Thái:</label>
                                <input type='text' class='form-control' name='trangthai' value='{$row['trangthai']}' required>
                            </div>
                            <div class='form-group'>
                                <label for='img'>Ảnh:</label>
                                <input type='file' class='form-control' name='img' accept='image/*'>
                                <img src='{$row['img']}' alt='Current Image' width='50'>
                                <input type='hidden' name='current_img' value='{$row['img']}'>
                            </div>
                            <div class='form-group'>
                                <label for='imgchitiet'>Ảnh Chi Tiết:</label>
                                <input type='file' class='form-control' name='imgchitiet[]' accept='image/*' multiple>";
                                
                                if (!empty($row['imgchitiet'])) {
                                    $imgChiTietArray = explode(',', $row['imgchitiet']);
                                    foreach ($imgChiTietArray as $img) {
                                        echo "<div class='img-container' style='position: relative; display: inline-block; margin-right: 10px;'>
                                                <img src='$img' alt='Current Image Chi Tiet' width='50' style='margin-bottom: 5px;'>
                                                
                                                <input type='checkbox' name='delete_img[]' value='$img' style='position: absolute; top: 0; right: 0;'>
                                                
                                              </div>";
                                    }
                                }
                          echo "  </div>
                          
                            <div class='form-group'>
                                <label for='ghichu'>Ghi Chú:</label>
                                <textarea class='form-control' name='ghichu'>{$row['ghichu']}</textarea>
                            </div>
                        </div>
                        <div class='modal-footer'>
                            <button type='button' class='btn btn-secondary' data-dismiss='modal'>Đóng</button>
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
<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductModalLabel">Thêm Sản Phẩm Mới</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="category">Danh Mục:</label>
                        <input type="text" class="form-control" name="category" required>
                    </div>
                    <div class="form-group">
                        <label for="deal">Ưu Đãi:</label>
                        <input type="text" class="form-control" name="deal" required>
                    </div>
                    <div class="form-group">
                        <label for="tensp">Tên Sản Phẩm:</label>
                        <input type="text" class="form-control" name="tensp" required>
                    </div>
                    <div class="form-group">
                        <label for="gia">Giá:</label>
                        <input type="text" class="form-control" name="gia" required>
                    </div>
                    <div class="form-group">
                        <label for="trangthai">Trạng Thái:</label>
                        <input type="text" class="form-control" name="trangthai" required>
                    </div>
                    <div class="form-group">
                        <label for="img">Ảnh:</label>
                        <input type="file" class="form-control" name="img" accept="image/*" required>
                    </div>
                    <div class="form-group">
                        <label for="imgchitiet">Ảnh Chi Tiết:</label>
                        <input type="file" class="form-control" name="imgchitiet[]" accept="image/*" multiple>
                    </div>
                    <div class="form-group">
                        <label for="ghichu">Ghi Chú:</label>
                        <textarea class="form-control" name="ghichu"></textarea>
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
<script>
    // Xóa ảnh chi tiết khi ấn nút x
    function deleteImage(imgContainer) {
        // Ẩn ảnh và checkbox
        imgContainer.style.display = 'none';

        // Đánh dấu checkbox là đã chọn để xóa khi submit form
        var deleteCheckbox = imgContainer.querySelector('input[type="checkbox"]');
        deleteCheckbox.checked = true;
    }
</script>
<script>
    // Xóa ảnh chi tiết khi ấn nút x
    function deleteImage(imgContainer) {
        // Ẩn ảnh và checkbox
        imgContainer.style.display = 'none';

        // Đánh dấu checkbox là đã chọn để xóa khi submit form
        var deleteCheckbox = imgContainer.querySelector('input[type="checkbox"]');
        deleteCheckbox.checked = true;
    }

    // Xóa ảnh đã chọn
    function deleteSelected() {
        var selectedCheckboxes = document.querySelectorAll('input[name="delete_img[]"]:checked');

        selectedCheckboxes.forEach(function (checkbox) {
            // Find the parent container of the checkbox (img-container)
            var imgContainer = checkbox.parentNode;

            // Remove the parent container (img-container)
            imgContainer.parentNode.removeChild(imgContainer);
        });
    }
</script>
</body>
</html>
