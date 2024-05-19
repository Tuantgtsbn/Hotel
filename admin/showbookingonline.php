<?php
include 'db.php';
    $sql = "SELECT customerOnline.id as id,fullname,phoneno,email,roomtype,checkin,checkout,cdate,customerOnline.approval FROM customerOnline inner join bookingOnline on customerOnline.id = bookingOnline.idcustomer where bookingOnline.approval = 0";
    $result = mysqli_query($con, $sql);
    $data = array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {

            $obj=new stdClass();
            $obj->id = $row['id'];
            $obj->fullname = $row['fullname'];
            $obj->phoneno = $row['phoneno'];
            $obj->email = $row['email'];
            $obj->roomtype = $row['roomtype'];
            $obj->checkin = (string)$row['checkin'];
            $obj->checkout = (string)$row['checkout'];
            $obj->cdate = (string)$row['cdate'];
            $obj->approval = $row['approval'];
            $data[] = $obj;
        }
        echo json_encode($data);
    }else{
        echo "No data found";
    }

    

?>
