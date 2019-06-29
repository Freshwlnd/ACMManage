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

$sql1 = "SELECT * FROM OffAwards";
$sql2 = "SELECT * FROM PNoPName";



$result1 = $conn->query($sql1);

if($result1) {

    $result2 = $conn->query($sql2);

    if ($result2) {

        $outt1 = $result2->fetch_all(MYSQLI_ASSOC);

        $num = count($outt1);
        for ($x=0; $x<$num; $x++) {
            $outt1[$x]['GMedal'] = 0;
            $outt1[$x]['SMedal'] = 0;
            $outt1[$x]['BMedal'] = 0;
        }

        if ($result1->num_rows > 0) {

            while ($row = $result1->fetch_assoc()) {
                for ($x=0; $x<$num; $x++) {
                    if ($outt1[$x]['PNo'] == $row['PNo1'] or $outt1[$x]['PNo'] == $row['PNo2'] or $outt1[$x]['PNo'] == $row['PNo3']) {
                        $outt1[$x]['GMedal'] += $row['GoldMedal'];
                        $outt1[$x]['SMedal'] += $row['SilverMedal'];
                        $outt1[$x]['BMedal'] += $row['BronzeMedal'];
                    }
                }
            }

            for ($x = 0; $x < $num - 1; $x++) {
                for ($y = 0; $y < $num - $x - 1; $y++) {

                    if ($outt1[$y]['GMedal'] < $outt1[$y + 1]['GMedal']) {

                        $tmp = $outt1[$y];
                        $outt1[$y] = $outt1[$y + 1];
                        $outt1[$y + 1] = $tmp;

                    } elseif ($outt1[$y]['GMedal'] == $outt1[$y + 1]['GMedal']) {

                        if ($outt1[$y]['SMedal'] < $outt1[$y + 1]['SMedal']) {

                            $tmp = $outt1[$y];
                            $outt1[$y] = $outt1[$y + 1];
                            $outt1[$y + 1] = $tmp;

                        } elseif ($outt1[$y]['SMedal'] == $outt1[$y + 1]['SMedal']) {

                            if ($outt1[$y]['BMedal'] < $outt1[$y + 1]['BMedal']) {

                                $tmp = $outt1[$y];
                                $outt1[$y] = $outt1[$y + 1];
                                $outt1[$y + 1] = $tmp;

                            }
                        }
                    }
                }
            }
        }

    } else {

        $outt1['error'] = mysqli_error($conn);

    }

} else {

    $outt1['error'] = mysqli_error($conn);

}

echo json_encode($outt1);

?>