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

    $sql1 = "SELECT * FROM OffAwards WHERE PNo1='$PNo' OR PNo2='$PNo' OR PNo3='$PNo'";
    $result = $conn->query($sql1);

    if($result) {
        $outt = array();

        if ($result->num_rows > 0) {
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
                $row['队员1'] = $conn->query($sql2)->fetch_row()[0];
                $PNo2 = $row['PNo2'];
                $sql2 = "SELECT PName FROM person WHERE PNo='$PNo2'";
                $row['队员2'] = $conn->query($sql2)->fetch_row()[0];
                $PNo3 = $row['PNo3'];
                $sql2 = "SELECT PName FROM person WHERE PNo='$PNo3'";
                $row['队员3'] = $conn->query($sql2)->fetch_row()[0];
                array_push($outt, $row);
            }
        } else {
            $outt['error'] = '暂无获奖信息';
        }
    } else {
        $outt['error'] = '查询出错';
    }

} else {

    $outt['error']= '未登录！';

}

echo json_encode($outt);

?>