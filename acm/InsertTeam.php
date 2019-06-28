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

$OJName = "HDU";
$OnCName = "多效训练赛1";
$Time = '2019-6-28';
//$OJName = $_POST['OJName'];
//$OnCName = $_POST['OnCName'];
//$Time = $_POST['Time'];


$IsAdmin = false;

if (isset($_COOKIE["user"])){
    $PNo0 = $_COOKIE["user"];
    $sql1 = "SELECT PAdmin FROM person WHERE PNo='$PNo0'";
    $result = $conn->query($sql1);
    $row = mysqli_fetch_assoc($result);
    $IsAdmin = $row['PAdmin'];
}

if ($IsAdmin) {

    $sql2 = "INSERT INTO
        OnlineContest(OnCNo, OJName, OnCName, Time)
         Value ('$OnCNo', '$OJName', '$OnCName', '$Time')";

    $result = $conn->query($sql2);

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