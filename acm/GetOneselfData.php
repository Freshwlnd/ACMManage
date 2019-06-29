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

if (isset($_COOKIE["user"])){
    $PNo = $_COOKIE["user"];

    $sql1 = "SELECT * FROM AdminData WHERE PNo='$PNo'";

    $result = $conn->query($sql1);

    if($result) {
        echo json_encode(mysqli_fetch_assoc($result));
    } else {
        $a['error'] = "查询出错！";
        echo json_encode($a);
    }

} else {

	$a['PName']='游客';
    echo json_encode(a);

}

?>