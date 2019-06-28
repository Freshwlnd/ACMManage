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

$IsAdmin = false;

if (isset($_COOKIE["user"])){
    $PNo0 = $_COOKIE["user"];
    $sql1 = "SELECT PAdmin FROM person WHERE PNo='$PNo0'";
    $result = $conn->query($sql1);
    $row = mysqli_fetch_assoc($result);
    $IsAdmin = $row['PAdmin'];
}

if ($IsAdmin) {

    $sql2 = "SELECT  PName, PNo, PSex, PClass, PBankNo, PHeight, PPhone, PQQ, PWechat, PT_Size, PSignNo, PHdu, PWeight, PSingle FROM person";
    $result = $conn->query($sql2);
    echo json_encode($result->fetch_all(MYSQLI_ASSOC));

} else {

    $sql2 = "SELECT PName, PNo, PClass, PPhone, PBankNo, PQQ, PWechat, PT_Size FROM person";
    $result = $conn->query($sql2);
    echo json_encode($result->fetch_all(MYSQLI_ASSOC));

}

?>