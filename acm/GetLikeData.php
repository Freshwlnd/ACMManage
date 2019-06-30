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

$PNo = isset($_POST['PNo']) ? $_POST['PNo']:'';

$sql2 = "SELECT PNo FROM PNoPName WHERE PNo LIKE '$PNo%'";
$result = $conn->query($sql2);

if($result) {
    echo json_encode($result->fetch_all(MYSQLI_ASSOC));
} else {
    $a['error'] = "查询出错！";
    echo json_encode($a);
}


?>