<?php
$sname= "localhost";
$unmae= "root";
$password = "";
$db_name = "web";
$conn = mysqli_connect($sname, $unmae, $password, $db_name);
if (!$conn) {
    echo "Connection failed!";
}
function check($n,$p){
    $conn = mysqli_connect("localhost", "root", "", "web");
    $sql = "SELECT * FROM account";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if(($n===$row["username"]&& $p===$row["userpassword"]|| $n===$row["phone"] && $p===$row["userpassword"])==1){
                header("Location: index.php");
            }else{
                header("Location: loginpage.php");
            }
        }
    }
}
?>