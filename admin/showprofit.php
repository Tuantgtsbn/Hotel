<?php
include 'db.php';
$sql = "SELECT priceroom,priceservices,cdate FROM bill where status=1";
$re = mysqli_query($con, $sql);
$data = new stdClass();
if (mysqli_num_rows($re) > 0) {
    while ($row = mysqli_fetch_assoc($re)) {
        $date=$row['cdate'];
        $data->$date=$row['priceroom']+$row['priceservices'];
    }
    echo json_encode($data);
} else {
    echo '0';
}
