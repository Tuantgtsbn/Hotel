<?php
include('db.php');
$id = $_GET['id'];
$sql = "UPDATE bill set status=1,cdate= CURDATE() where id=$id";

if (mysqli_query($con, $sql)) {
    $sql="SELECT id_customer,id_room From bill where id=$id";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $id_customer = $row['id_customer'];
    $id_room = $row['id_room'];
    $sql = "UPDATE room set statu=0 where id=$id_room";
    mysqli_query($con, $sql);
    $sql="Update bookingOffline set approval=1 where idcustomer=$id_customer";
    mysqli_query($con, $sql);
    $sql="Update customerOffline set approval=1 where id=$id_customer";
    echo 'Success';
} else {
    echo 'Error';
}
?>
