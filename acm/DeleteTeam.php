<?php

$servername = "127.0.0.1";
$username0 = "root";
$password0 = "";
$dbname = "ACMInfo";

// 创建连接
$conn = new mysqli($servername, $username0, $password0, $dbname);
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

$TNo = 100000000;

$sql1 = "SELECT * FROM Team";

$result = $conn->query($sql1);

$TNo = $TNo + $result->num_rows - 1;
$TNo = "T".substr($TNo,1);

$sql1 = "DELETE FROM Team WHERE TNo='$TNo'";

$result = $conn->query($sql1);

echo $result;

$conn->close();

?>
