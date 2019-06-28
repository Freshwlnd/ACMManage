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


    $sql1 = "SELECT OfflineContest.Time AS '比赛时间', University AS '比赛地点', OffCName AS '比赛名', TName AS '队伍名', GoldMedal, SilverMedal, BronzeMedal, PNo1, PNo2, PNo3
	FROM Team, ParticipateOffC, OfflineContest
	WHERE ParticipateOffC.OffCNo=OfflineContest.OffCNo AND ParticipateOffC.TNo=Team.TNo AND (Team.PNo1='$PNo' OR Team.PNo2='$PNo' OR Team.PNo3='$PNo');";
    $result = $conn->query($sql1);

    echo "{";

    $row=$result->fetch_assoc();
    if($row['GoldMedal']==1) {
        $row['获奖情况']='金牌';
    } elseif ($row['SilverMedal']==1) {
        $row['获奖情况']='银牌';
    } elseif ($row['BrozeMedal']==1) {
        $row['获奖情况']='铜牌';
    } else {
        $row['获奖情况']='铁牌';
    }
    $PNo1 = $row['PNo1'];
    $sql2 = "SELECT PName FROM person WHERE PNo='$PNo1'";
    $row['队员1']=$conn->query($sql2)->fetch_row();
    $PNo2 = $row['PNo2'];
    $sql2 = "SELECT PName FROM person WHERE PNo='$PNo2'";
    $row['队员2']=$conn->query($sql2)->fetch_row();
    $PNo3 = $row['PNo3'];
    $sql2 = "SELECT PName FROM person WHERE PNo='$PNo3'";
    $row['队员3']=$conn->query($sql2)->fetch_row();
    echo json_encode($row);

    while($row=$result->fetch_assoc()) {
        if($row['GoldMedal']==1) {
            $row['获奖情况']='金牌';
        } elseif ($row['SilverMedal']==1) {
            $row['获奖情况']='银牌';
        } elseif ($row['BrozeMedal']==1) {
            $row['获奖情况']='铜牌';
        } else {
            $row['获奖情况']='铁牌';
        }
        $PNo1 = $row['PNo1'];
        $sql2 = "SELECT PName FROM person WHERE PNo='$PNo1'";
        $row['队员1']=$conn->query($sql2)->fetch_row();
        $PNo2 = $row['PNo2'];
        $sql2 = "SELECT PName FROM person WHERE PNo='$PNo2'";
        $row['队员2']=$conn->query($sql2)->fetch_row();
        $PNo3 = $row['PNo3'];
        $sql2 = "SELECT PName FROM person WHERE PNo='$PNo3'";
        $row['队员3']=$conn->query($sql2)->fetch_row();
        echo ", ";
        echo json_encode($row);
    }

    echo "}";

} else {

    $PNo = '1712190114';

    $sql1 = "SELECT OfflineContest.Time AS '比赛时间', University AS '比赛地点', OffCName AS '比赛名', TName AS '队伍名', GoldMedal, SilverMedal, BronzeMedal, PNo1, PNo2, PNo3
	FROM Team, ParticipateOffC, OfflineContest
	WHERE ParticipateOffC.OffCNo=OfflineContest.OffCNo AND ParticipateOffC.TNo=Team.TNo AND (Team.PNo1='$PNo' OR Team.PNo2='$PNo' OR Team.PNo3='$PNo');";
    $result = $conn->query($sql1);

    $outt = array();

    while($row=$result->fetch_assoc()) {
        if($row['GoldMedal']==1) {
            $row['获奖情况']='金牌';
        } elseif ($row['SilverMedal']==1) {
            $row['获奖情况']='银牌';
        } elseif ($row['BrozeMedal']==1) {
            $row['获奖情况']='铜牌';
        } else {
            $row['获奖情况']='铁牌';
        }
        $PNo1 = $row['PNo1'];
        $sql2 = "SELECT PName FROM person WHERE PNo='$PNo1'";
        $row['队员1']=$conn->query($sql2)->fetch_row()[0];
        $PNo2 = $row['PNo2'];
        $sql2 = "SELECT PName FROM person WHERE PNo='$PNo2'";
        $row['队员2']=$conn->query($sql2)->fetch_row()[0];
        $PNo3 = $row['PNo3'];
        $sql2 = "SELECT PName FROM person WHERE PNo='$PNo3'";
        $row['队员3']=$conn->query($sql2)->fetch_row()[0];
        $outt.array_push($outt, $row);
    }

    echo json_encode($outt);

}

?>