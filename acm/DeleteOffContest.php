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

$OffCNo = 100000000;

$sql1 = "SELECT * FROM OfflineContest";

$result = $conn->query($sql1);

$OffCNo = $OffCNo + $result->num_rows - 1;
$OffCNo = "OffC".substr($OffCNo,1);

$sql1 = "DELETE FROM OfflineContest WHERE OffCNo='$OffCNo'";

$result = $conn->query($sql1);

echo $result;

$conn->close();

?>
