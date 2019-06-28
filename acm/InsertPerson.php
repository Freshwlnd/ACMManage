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

$PNo = $_POST['PNo'];
$PName = $_POST['PName'];
//$PSex = $_POST['PSex'];
$PClass = $_POST['PClass'];
$PBankNo = $_POST['PBankNo'];
//$PHeight = $_POST['PHeight'];
$PPhone = $_POST['PPhone'];
$PQQ = $_POST['PQQ'];
$PWechat = $_POST['PWechat'];
$PT_Size = $_POST['PT_Size'];
//$PSignNo = $_POST['PSignNo'];
//$PHdu = $_POST['PHdu'];
//$PWeight = $_POST['PWeight'];
//$PSingle = $_POST['PSingle'];
$PPassword = md5('123456');

//$sql1 = "INSERT INTO
//    person(PNo, PName, PSex, PClass, PBankNo, PHeight, PPhone, PQQ, PWechat, PT_Size, PSignNo, PHdu, PWeight, PSingle, PPassword)
//     Value ('$PNo', '$PName', '$PSex', '$PClass', '$PBankNo', '$PHeight', '$PPhone', '$PQQ', '$PWechat', '$PT_Size', '$PSignNo', '$PHdu', '$PWeight', '$PSingle', '$PPassword')";

$sql1 = "INSERT INTO
    person(PNo, PName, PClass, PBankNo, PPhone, PQQ, PWechat, PT_Size, PPassword)
     Value ('$PNo', '$PName', '$PClass', '$PBankNo', '$PPhone', '$PQQ', '$PWechat', '$PT_Size', '$PPassword')";
//echo $sql1;
$result = $conn->query($sql1);

if($result==TRUE) {
    echo TRUE;
} else {
    echo("错误描述: " . mysqli_error($conn));
}

$conn->close();

?>
