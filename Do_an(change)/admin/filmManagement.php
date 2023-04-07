<!DOCTYPE html>
<html>

<head>
    <title>Quản lý phim - Xem Phim Online</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap 5 stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Xóa phim
            $(".btn-delete").click(function () {
                var filmId = $(this).data("id");
                if (confirm("Bạn có chắc chắn muốn xóa phim này không?")) {
                    $.ajax({
                        url: "action.php",
                        type: "POST",
                        data: {
                            film_id: filmId
                        },
                        success: function (response) {
                            // Nếu xóa phim thành công, reload trang
                            location.reload();
                        }
                    });
                }
            });

            // Sửa phim
            $(".btn-edit").click(function () {
                var filmId = $(this).data("id");
                // Chuyển đến trang sửa phim với ID phim
                window.location.href = "formEditFilm.php?film_id=" + filmId;
            });
        });
    </script>
</head>

<body>
    <header class="bg-dark text-white">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Xem Phim Online</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Phim</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Người dùng</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="container my-5">
        <h1 class="text-center mb-5">Quản lý phim</h1>
        <?php
                define('DB_HOST', 'localhost');
                define('DB_USER', 'root');
                define('DB_PASS', '');
                define('DB_SCHEMA', 'Quan_ly_phim');
                // Kết nối đến cơ sở dữ liệu
                try {
                    $con = new PDO("mysql:host=".DB_HOST.";dbname=".DB_SCHEMA, DB_USER, DB_PASS);
                    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                
                    // Truy vấn thông tin phim từ bảng Film
                    $sql = "SELECT * FROM Film";
                    $result = $con->query($sql);
                    // Hiển thị thông tin phim lên trang web
                    
                    if ($result->rowCount() > 0) {
                        echo '<table class="table table-striped">';
                        echo '<thead><tr><th>ID phim</th><th>Tên phim</th><th>Năm phát hành</th><th>Đạo diễn</th><th>Diễn viên</th><th>Quốc gia</th><th>Mô tả</th><th>Ảnh nền</th><th>Thao tác</th></tr></thead>';
                        echo '<tbody>';
                        foreach ($result as $row) {
                            echo '<tr>';
                            echo '<td>' . $row['ID_Film'] . '</td>';
                            echo '<td>' . $row['Name'] . '</td>';
                            echo '<td>' . $row['Nam_phat_hanh'] . '</td>';
                            echo '<td>' . $row['Dao_dien'] . '</td>';
                            echo '<td>' . $row['Dienvien'] . '</td>';
                            echo '<td>' . $row['Quoc_gia'] . '</td>';
                            echo '<td>' . $row['Mo_ta'] . '</td>';
                            echo '<td>' . $row['Anh_nen'] . '</td>';
                            echo '<td><a href="edit.php?id=' . $row['ID_Film'] . '">Sửa</a> | <a href="action.php?id=' . $row['ID_Film'] . '">Xóa</a></td>';
                            echo '</tr>';
                        }
                        echo '</tbody>';
                        echo '</table>';
                    } else {
                        echo "Không có phim nào trong danh sách";
                    }
                    
                
                    // Ngắt kết nối đến cơ sở dữ liệu
                } catch(PDOException $e) {
                    echo "Kết nối thất bại: " . $e->getMessage();
                }
            ?>
        <a href="formAddFilm.php" class="btn btn-primary">Thêm phim mới</a>
    </main>
    <!--Bootstrap 5 JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.0/js/bootstrap.bundle.min.js"
        integrity="sha512-+h3qJr7rX6NnY6jN83Nw1eWUbJ8s+Q2s7jK6vZcWJ9X/A0Qezz7L1+KcBzNJ8PcZn0zZKaJvZd1j0eqXO32a1g=="
        crossorigin="anonymous"></script>
</body>

</html>