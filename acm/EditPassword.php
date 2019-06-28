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

$OldPassword = md5($_POST['OldPassword']);
$NewPassword = md5($_POST['NewPassword']);

if (isset($_COOKIE["user"])) {
    $PNo = $_COOKIE["user"];
    $sql1 = "SELECT PPassword FROM person WHERE PNo='$PNo'";
    $result = $conn->query($sql1);
    if($result->fetch_assoc()['PPassword']==$OldPassword) {
        $sql2 = "UPDATE person SET PPassword='$NewPassword' WHERE PNo='$PNo'";
        $result = $conn->query($sql2);
        if($result==TRUE) {
            echo TRUE;
        } else {
            echo("错误描述: " . mysqli_error($conn));
        }
    } else {
        echo "原密码错误！";
    }

} else {

    echo "未登录！";

}


?>