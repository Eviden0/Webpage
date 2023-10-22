<?php
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
$sql="select * from login where username='{$_POST["username"]}'and password='{$_POST["password"]}'";
$result=mysqli_query($conn,$sql);

$row=mysqli_fetch_assoc($result);
if ($row==true) {
    header("Location: ./loginRight.html");
    echo '登录成功';
}else {
    header("Location: ./loginError.html");
    echo '密码错误，登录失败！';
}

?>
