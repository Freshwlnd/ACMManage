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

//$OffCName = '西安邀请赛';
//$University = '西安';
//$Expend = '2000';
//$Time = '2019-5-18';
$OffCName = $_POST['OffCName'];
$University = $_POST['University'];
$Expend = $_POST['Expend'];
$Time = $_POST['Time'];

$sql1 = "INSERT INTO
    OfflineContest(OffCName, University, Expend, Time)
     Value ('$OffCName', '$University', '$Expend', '$Time')";


$IsAdmin = false;

if (isset($_COOKIE["user"])){
    $PNo0 = $_COOKIE["user"];
    $sql1 = "SELECT PAdmin FROM person WHERE PNo='$PNo0'";
    $result = $conn->query($sql1);
    $row = mysqli_fetch_assoc($result);
    $IsAdmin = $row['PAdmin'];
}

if ($IsAdmin) {

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