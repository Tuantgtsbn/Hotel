<?php
include 'db.php';
$sql = "SELECT * FROM register where approval=0";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $obj = new stdClass();
        $obj->id = $row['id'];
        $obj->fullname = $row['fullname'];
        $obj->email = $row['email'];
        $obj->phoneno = $row['phoneno'];
        $obj->cdate = (string)$row['cdate'];
        $obj->approval = $row['approval'];
        $data[] = $obj;
    }
    echo json_encode($data);
} else {
    echo "Chưa có dữ liệu";
}
?>
