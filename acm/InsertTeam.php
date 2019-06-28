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

$OnCNo = 100000000;
$OJName = "HDU";
$OnCName = "多效训练赛1";
$Time = '2019-6-28';
//$OJName = $_POST['OJName'];
//$OnCName = $_POST['OnCName'];
//$Time = $_POST['Time'];

$sql1 = "SELECT * FROM OnlineContest";

$result = $conn->query($sql1);

$OnCNo = $OnCNo + $result->num_rows;
$OnCNo = "OnC".substr($OnCNo,1);

$sql2 = "INSERT INTO
    OnlineContest(OnCNo, OJName, OnCName, Time)
     Value ('$OnCNo', '$OJName', '$OnCName', '$Time')";

$result = $conn->query($sql2);

if($result==TRUE) {
    echo TRUE;
} else {
    echo("错误描述: " . mysqli_error($conn));
}

$conn->close();

?>