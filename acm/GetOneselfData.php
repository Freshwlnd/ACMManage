<?php
include_once(dirname(__FILE__).'/../small/small.php');

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


if (isset($_COOKIE["user"])){
    $PNo = $_COOKIE["user"];

    $sql1 = "SELECT PNo, PName, PSex, PClass, PBankNo, PHeight, PPhone, PQQ, PWechat, PT_Size, PSignNo, PHdu, PWeight, PSingle, PPassword FROM person WHERE PNo='$PNo'";
    $result = $conn->query($sql1);
//    $data = db::select("select * from person")->getResult();
//    echoData::toJson($data);
    echo json_encode(mysqli_fetch_assoc($result));

}

?>