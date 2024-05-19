<?php
include 'db.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $json = file_get_contents('php://input');
        $data=json_decode($json);
        $response='';
        $name = test_data($data->name);
        $phone = test_data($data->phone);
        $email = test_data($data->email);
        $roomType = test_data($data->roomType);
        $checkin = test_data($data->checkin);
        $checkout = test_data($data->checkout);
        $sql = "INSERT INTO `customerOnline`(`fullname`, `phoneno`, `email`) VALUES ('$name','$phone','$email')";
        $result = mysqli_query($con, $sql);
        $id = mysqli_insert_id($con);
        $sql1 = "INSERT INTO `bookingOnline`(`idcustomer`, `roomType`, `checkin`, `checkout`) VALUES ('$id','$roomType','$checkin','$checkout')";
        $result1 = mysqli_query($con, $sql1);
        if ($result && $result1) {
            $response='Đăng ký thành công';
        } else {
            $response='Đăng ký thất bại';
        }
        echo $response;
    }

    

?>