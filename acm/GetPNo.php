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

$PNo = '1712190120';

if (isset($_COOKIE["user"])){
    $PNo = $_COOKIE["user"];
    $sql1 = "SELECT PNo, PName FROM person WHERE PNo='$PNo'";
    $result = $conn->query($sql1);
    $row = mysqli_fetch_assoc($result);
    echo $row['PNo'] . " " . $row['PName'];

} else {
    echo '游客';
}

?>