<?php
include('db.php');
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


?>
