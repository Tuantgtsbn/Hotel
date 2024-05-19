<?php
include 'db.php';
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['deleteid'];
    $sql1 = "DELETE FROM bookingOnline WHERE idcustomer = $id";

    $sql2 = "DELETE FROM customerOnline WHERE id = $id";
    if (mysqli_query($con, $sql1)) {
        if(mysqli_query($con, $sql2)){
            echo "Delete successfully";
        } else {
            echo "Delete failed";
        }
        
    } else {
        echo "Delete failed";
    }
}   
?>