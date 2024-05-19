<?php
include 'db.php';
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];
    $sql = "UPDATE register set approval=1 where id='$id'";
    if(mysqli_query($con, $sql)){
        echo 'Xác nhận thành công';
    }else{
        echo 'Xác nhận thất bại';
    }
}else if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $json = file_get_contents('php://input');
        $data=json_decode($json);
        $response='';
        $name = test_data($data->name);
        $phone = test_data($data->phone);
        $email = test_data($data->email);
        $sql = "INSERT INTO `register`(`fullname`, `phoneno`, `email`) VALUES ('$name','$phone','$email')";
        $result = mysqli_query($con, $sql);
        if ($result) {
            $response='Đăng ký thành công';
        } else {
            $response='Đăng ký thất bại';
        }
        echo $response;
    
}

?>
