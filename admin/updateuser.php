<?php
include('db.php');
    $id = $_POST['id'];
    $usname = $_POST['usname'];
    $pass = $_POST['pass'];
    if (isset($id) && isset($usname) && isset($pass)) {
        $id = test_data($id);
        $usname = test_data($usname);
        $pass = test_data($pass);
        $sql = "UPDATE login SET usname = '$usname', pass = '$pass' WHERE id = '$id'";
        // if (mysqli_query($con, $sql)) {
        //     echo ' <script language="javascript" type="text/javascript"> alert("Update success") </scrip>';
        // } else {
        //     echo ' <script language="javascript" type="text/javascript"> alert("Update fail") </scrip>';
        // }
        if (mysqli_query($con, $sql)) {
            $sql = "SELECT * FROM login";
            $result = mysqli_query($con, $sql);
            $data = array();
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $obj = new stdClass();
                    $obj->id = $row['id'];
                    $obj->usname = $row['usname'];
                    $obj->pass = $row['pass'];
                    $data[] = $obj;
                }
                echo json_encode($data);
            } else {
                echo "Chưa có dữ liệu";
            }
        }
        else{
            echo 'Error';
        }

        
    }else{
        echo 'Error';
    }
?>
