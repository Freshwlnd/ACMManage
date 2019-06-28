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

    $OnCNo = $_POST['OnCNo'];

    $sql1 = "DELETE FROM OnlineContest WHERE OnCNo='$OnCNo'";

    $result = $conn->query($sql1);

    if ($result == TRUE) {
        echo TRUE;
    } else {
        echo("错误描述: " . mysqli_error($conn));
    }

} else {

    echo "权限不足！";

}

$conn->close();

?>
