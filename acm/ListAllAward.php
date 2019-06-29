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

$sql1 = "SELECT * FROM OffAwards;";
$result = $conn->query($sql1);


if($result) {

    $outt = array();
    while ($row = $result->fetch_assoc()) {
        if ($row['GoldMedal'] == 1) {
            $row['获奖情况'] = '金牌';
        } elseif ($row['SilverMedal'] == 1) {
            $row['获奖情况'] = '银牌';
        } elseif ($row['BrozeMedal'] == 1) {
            $row['获奖情况'] = '铜牌';
        } else {
            $row['获奖情况'] = '铁牌';
        }
        $PNo1 = $row['PNo1'];
        $sql2 = "SELECT PName FROM person WHERE PNo='$PNo1'";
        $row['队员1'] = $conn->query($sql2)->fetch_row();
        $PNo2 = $row['PNo2'];
        $sql2 = "SELECT PName FROM person WHERE PNo='$PNo2'";
        $row['队员1'] = $conn->query($sql2)->fetch_row();
        $PNo3 = $row['PNo3'];
        $sql2 = "SELECT PName FROM person WHERE PNo='$PNo3'";
        $row['队员1'] = $conn->query($sql2)->fetch_row();

    }

} else {

    $outt['error'] = '查询出错！';

}

echo json_encode($outt);

?>