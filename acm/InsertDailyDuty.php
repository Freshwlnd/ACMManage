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

    $DDTNo = $_POST['DDTNo'];
    $PNo1 = $_POST['PNo1'];
    $PNo2 = $_POST['PNo2'];
    $PNo3 = $_POST['PNo3'];
    $PNo4 = $_POST['PNo4'];
    $PNo5 = $_POST['PNo5'];

    $sql2 = "INSERT INTO
        DailyDutyTeam(DDTNo, PNo1, PNo2, PNo3, PNo4, PNo5)
         Value ('$DDTNo', '$PNo1', '$PNo2', '$PNo3', '$PNo4', '$PNo5')";

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