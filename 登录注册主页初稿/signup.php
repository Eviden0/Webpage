<?php
//echo $_POST["username"];
//echo $_POST["password"];
header("content-type:text/html;charset=utf-8");

$mysql_server = 'localhost';
$mysql_username = 'root';
$mysql_password = 'root';
$mysql_database = 'phplogin';
echo "数据库连接状况:";
$conn = new mysqli($mysql_server, $mysql_username, $mysql_password,$mysql_database);
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
echo "连接成功<br>";
$sql = "SELECT * FROM login";
$result = $conn->query($sql);

//if ($result->num_rows > 0) {
//    // 输出数据
//    while($row = $result->fetch_assoc()) {
//        echo  " - Name: " . $row["username"]. " password:" . $row["password"]. "<br>";
//    }
//} else {
//    echo "0 结果";
//}
//$pas="Eviden";
//$pwd="AlargeShit";
$sql="INSERT INTO login(username,password) VALUES ('{$_POST["username"]}','{$_POST["password"]}')";
if ($conn->query($sql) === TRUE) {
    echo "注册成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>