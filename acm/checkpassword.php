<?php

$servername = "127.0.0.1";
$username0 = "root";
$password0 = "root";
$dbname = "ACMInfo";

// 创建连接
$conn = new mysqli($servername, $username0, $password0, $dbname);
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

$account = $_POST['account'];
$password = md5($_POST['password']);

$sql1 = "SELECT * FROM UserPassword WHERE 学号='$account' AND 密码='$password'";

$result = $conn->query($sql1);


if($result) {
	if ($result->num_rows > 0) {
	    setcookie("user", $account, time()+3600);
	    echo true;
	} else {
	    echo "密码错误！";
	}
} else {
    echo("错误描述: " . mysqli_error($conn));
}


$conn->close();

?>
