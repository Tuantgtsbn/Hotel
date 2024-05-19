<?php
include ('db.php');

$sql ="SELECT bill.id as id, customerOffline.id as idcus,customerOffline.fullname as `name`, room.id as room,room.roomtype as roomtype, bookingOffline.checkin as checkin, bookingOffline.checkout as checkout, bill.priceroom as priceroom, bill.priceservices as priceservices FROM (((bill inner join customerOffline on bill.id_customer=customerOffline.id) inner join bookingOffline on customerOffline.id=bookingOffline.idcustomer) inner join room on bill.id_room=room.id) where bill.status=0;";
$re = mysqli_query($con,$sql);
if (mysqli_num_rows($re) > 0) {
    $data = array();
    while ($row = mysqli_fetch_assoc($re)) {
        $obj = new stdClass();
        $obj->id = $row['id'];
        $obj->customer = $row['name'];
        $obj->idcus = $row['idcus'];
        $obj->id_room = $row['room'];
        $obj->roomtype= $row['roomtype'];
        $obj->checkin= (string)$row['checkin'];
        $obj->checkout=(string) $row['checkout'];
        $obj->priceroom= $row['priceroom'];
        $obj->priceservices= $row['priceservices'];
        

        $data[] = $obj;
    }
    echo json_encode($data);
} else {
    echo "Chưa có dữ liệu";
}
?>