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

$OnCNo = 100000000;

$sql1 = "SELECT * FROM OnlineContest";

$result = $conn->query($sql1);

$OnCNo = $OnCNo + $result->num_rows - 1;
$OnCNo = "OnC".substr($OnCNo,1);

$sql1 = "DELETE FROM OnlineContest WHERE OnCNo='$OnCNo'";

$result = $conn->query($sql1);

if($result==TRUE) {
    echo TRUE;
} else {
    echo("错误描述: " . mysqli_error($conn));
}

$conn->close();

?>
