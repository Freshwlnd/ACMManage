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

    $sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'PNo';
    $order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';

    $sql2 = "SELECT * FROM AdminData order by $sort $order";
    $result = $conn->query($sql2);

    if($result) {
        echo json_encode($result->fetch_all(MYSQLI_ASSOC));
    } else {
        $a['error'] = "查询出错！";
        echo json_encode($a);
    }

} else {

    $a['error'] = "权限不足！";
    echo json_encode($a);

}

?>