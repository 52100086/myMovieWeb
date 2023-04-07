<?php
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_SCHEMA', 'Quan_ly_phim');

    try {
        $con = new PDO("mysql:host=".DB_HOST.";dbname=".DB_SCHEMA, DB_USER, DB_PASS);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Kết nối thành công<br>";

        // Thêm mới phim
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST["name"];
            $nam_phat_hanh = $_POST["nam_phat_hanh"];
            $dao_dien = $_POST["dao_dien"];
            $dienvien = $_POST["dienvien"];
            $quoc_gia = $_POST["quoc_gia"];
            $mo_ta = $_POST["mo_ta"];
            $anh_nen = $_POST["anh_nen"];

            $sql = "INSERT INTO Film (name, Nam_phat_hanh, Dao_dien, Dienvien, Quoc_gia, Mo_ta, Anh_nen)
            VALUES (?, ?, ?, ?, ?, ?, ?)";

            try {
                $stmt = $con->prepare($sql);
                $stmt->execute(array($name, $nam_phat_hanh, $dao_dien, $dienvien, $quoc_gia, $mo_ta, $anh_nen));
                echo "Thêm mới phim thành công";
            } catch(PDOException $e) {
                echo "Lỗi: " . $e->getMessage();
            }
        }

        //Xóa phim
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["ID_Film"])) {
            $film_id = $_POST["ID_Film"];
            
            $sql = "DELETE FROM Film WHERE ID_Film=?";
        
            try {
                $stmt = $con->prepare($sql);
                $stmt->execute(array($film_id));
                echo "Xóa phim thành công";
            } catch(PDOException $e) {
                echo "Lỗi: " . $e->getMessage();
            }
        }

        //Sửa phim
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edit_film_id"])) {
            $film_id = $_POST["edit_film_id"];
            $name = $_POST["edit_name"];
            $nam_phat_hanh = $_POST["edit_nam_phat_hanh"];
            $dao_dien = $_POST["edit_dao_dien"];
            $dienvien = $_POST["edit_dienvien"];
            $quoc_gia = $_POST["edit_quoc_gia"];
            $mo_ta = $_POST["edit_mo_ta"];
            $anh_nen = $_POST["edit_anh_nen"];
        
            $sql = "UPDATE Film SET Name=?, Nam_phat_hanh=?, Dao_dien=?, Dienvien=?, Quoc_gia=?, Mo_ta=?, Anh_nen=? WHERE ID_Film=?";
        
            try {
                $stmt = $con->prepare($sql);
                $stmt->execute(array($name, $nam_phat_hanh, $dao_dien, $dienvien, $quoc_gia, $mo_ta, $anh_nen, $film_id));
                echo "Sửa phim thành công";
            } catch(PDOException $e) {
                echo "Lỗi: " . $e->getMessage();
            }
        }
        
    } catch(PDOException $e) {
        echo "Kết nối thất bại: " . $e->getMessage();
    }
?>