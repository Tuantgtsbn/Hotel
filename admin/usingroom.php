<?php
include 'db.php';
$sql = "SELECT customerOffline.fullname as fullname,bookingOffline.id as idbooking,idroom FROM bookingOffline join customerOffline on bookingOffline.idcustomer = customerOffline.id where bookingOffline.approval=1";
$result = mysqli_query($con, $sql);
if(mysqli_num_rows($result)>0){
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $obj = new stdClass();
        $obj->idbooking = $row['idbooking'];
        $obj->fullname = $row['fullname'];
        $obj->idroom = $row['idroom'];
        $data[] = $obj;
    }
    echo json_encode($data);
} else {
    echo "Chưa có dữ liệu";
}
?>