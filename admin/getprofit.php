<?php
include('db.php');
date_default_timezone_set('Asia/Ho_Chi_Minh');
$curentDate = date('Y-m-d');
// echo $curentDate;
function distanceDate($date1, $date2)
{   
    $date1 = (new DateTime($date1))->format('Y-m-d');
    $date2 = (new DateTime($date2))->format('Y-m-d');
    $datediff = strtotime($date2) - strtotime($date1);
    return round($datediff / (60 * 60 * 24));
}
// $lastweek=date('Y-m-d', strtotime('-6 days'));
$profit = array();
for($i=6;$i>=0;$i--){
    $date = date('Y-m-d', strtotime('-'.$i.' days'));
    // echo $date;
    $profit[$date] = 0;
}
$sql="SELECT * FROM bill where status=1";
$result = mysqli_query($con, $sql);
while($row = mysqli_fetch_assoc($result)){
    $date = $row['cdate'];;
    //echo $date;
    $distance = distanceDate($date, $curentDate);
    if($distance >= 0 && $distance < 7){
        $profit[$date] += (int)$row['priceservices']+ (int)$row['priceroom'];
    }
}
echo json_encode($profit);

?>