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

$TNo = $_POST['TNo'];

$sql1 = "DELETE FROM Team WHERE TNo='$TNo'";

$result = $conn->query($sql1);

if($result==TRUE) {
    echo TRUE;
} else {
    echo("错误描述: " . mysqli_error($conn));
}

$conn->close();

?>
