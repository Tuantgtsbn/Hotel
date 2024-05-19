<?php
include 'db.php';
ob_start();
$id_customer = $_GET['id'];
$name = $_GET['name'];
$email = $_GET['email'];
$phone = $_GET['phone'];
$roomtype= $_GET['roomtype'];
$checkin = $_GET['checkin'];
$checkout = $_GET['checkout'];
$avairooms=array();
function sumdate($date1, $date2)
{
    $date1 = strtotime($date1);
    $date2 = strtotime($date2);
    $diff = abs($date2 - $date1);
    return floor($diff / (60 * 60 * 24))+1;
}
$sql = "SELECT id FROM room WHERE roomtype = '$roomtype' AND statu = 0";
$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $avairooms[] = $row['id'];
}
?>
<?php
$sql = 'select id, name from service';
$res = mysqli_query($con, $sql);
$services = array();
while ($row = mysqli_fetch_assoc($res)) {
    $services[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="./style/confirmbooking.css">
</head>

<body>
    <div class="container-fluid">
    <form class="w-50 mx-auto mt-5" action="" method="post">
        <h3>Thông tin đặt phòng</h3>
        <div class="form-page active row p-3" id="page1">
            <!-- Trang 1 -->
            
            <div class="col-md-12">
                <label for="inputName" class="form-label">Họ tên</label>
                <input name="name" type="text" class="form-control" id="inputName" value="<?php echo $name;?>" required>

            </div>
            <div class="col-md-12">
                <label for="inputEmail4" class="form-label">Email</label>
                <input name="email" type="text" class="form-control" id="inputEmail4" value="<?php echo $email;?>" required>

            </div>
            <div class="col-md-12">
                <label for="inputAddress" class="form-label">Số điện thoại</label>
                <input name="phone" type="phone" class="form-control" id="inputAddress" value="<?php echo $phone;?>"required>

            </div>
            <div class="col-md-6">
                <label for="roomId" class="form-label">Tên phòng</label>
                
                <select name="roomId" class="form-select" id="roomid" required>
                    <?php
                    foreach ($avairooms as $room) {
                        echo '<option value="' . $room . '">' . $room . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-6">
                <label for="roomType" class="form-label">Loại phòng</label>
                <input type="text" id="roomType" class="form-control" name="roomType" value="<?php echo $roomtype;?>">
            </div>
            <div class="col-md-6">
                <label for="inputDateCheckIn" class="form-label">Giờ nhận phòng</label>
                <input name="checkin" type="date" class="form-control" id="inputDateCheckIn" value="<?php echo $checkin;?>" required>

            </div>
            <div class="col-md-6">
                <label for="inputDateCheckOut" class="form-label">Giờ trả phòng</label>
                <input name="checkout" type="date" class="form-control" id="inputDateCheckOut"value="<?php echo $checkout;?>" required>

            </div>
            <div class="col-md-3 mt-2">
                <p type="button" class="text-decoration-underline" onclick="nextPage('page1', 'page2')">Next >></p>

            </div>
        </div>
        <div class="form-page row p-3" id="page2">
            <h3>Các dịch vụ</h3>
            <div id="service-list" class="row">
                <div class="row" id="service1">
                    <div class="col-7 ">
                        <label class="form-label">Dịch vụ</label>
                        <select name="idService1" class=" form-select">
                            <?php
                            foreach ($services as $service) {
                                echo '<option value="' . $service['id'] . '">' . $service['name'] . '</option>';
                            }
                            ?>
                        </select>

                    </div>
                    <div class="col-4">
                        <label class="form-label">Số lượng</label>
                        <input type="number" class="form-control" name="numService1" id="" value="0">
                    </div>
                    <div class="col-1">
                        <label class="form-label" style="visibility:hidden;">Xóa</label>
                        <button type="button" class="btn btn-danger" onclick="document.getElementById('service1').remove();">X</button>
                    </div>

                </div>
            </div>
            <div class="col-12 mt-2">
                <button type="button" class="btn btn-primary w-100 add-service">
                    Thêm
                </button>
            </div>
            <div class="col-md-3 mt-2">
                <p type="button" class="text-decoration-underline" onclick="prevPage('page2', 'page1')">
                    << Back </p>

            </div>
            <div class="col-12 mt-2">
                <input type="submit" class="btn btn-primary w-100" name="submit" value="Đặt Phòng">
            </div>


        </div>





    </form>
    </div>
    <?php
    if(isset($_POST['submit'])){
        $name =test_data( $_POST['name']);
        $email = test_data($_POST['email']);
        $phone = test_data($_POST['phone']);
        $roomid = test_data($_POST['roomId']);
        $roomtype =test_data( $_POST['roomType']);
        $checkin = test_data($_POST['checkin']);
        $checkout = test_data($_POST['checkout']);
        $totalInput = count($_POST);

        $totalService = ($totalInput - 8) / 2;
        $sql="SELECT price FROM room WHERE id='$roomid'";
        $res=mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($res);
        $priceroom=(int)$row['price']*sumdate($checkin,$checkout);;
        $priceservices=0;
        for($i=1;$i<=$totalService;$i++){
            $idService = test_data($_POST['idService' . $i]);
            $numService = test_data($_POST['numService' . $i]);
            $sql="SELECT price FROM service WHERE id='$idService'";
            $res=mysqli_query($con,$sql);
            $row=mysqli_fetch_assoc($res);
            $priceservices=$row['price']* $numService+$priceservices;
    
        }
        $sql = "INSERT INTO customerOffline (fullname,phoneno,email) VALUES ('$name','$phone','$email')";
        if(mysqli_query($con,$sql)){
            $id = mysqli_insert_id($con);
            $sql = "INSERT INTO bookingOffline (idcustomer,idroom,checkin,checkout) VALUES ($id,'$roomid','$checkin','$checkout')";
            mysqli_query($con,$sql);
            $sql="INSERT INTO `orderservices`(`id_room`, `id_service`, `numbers`) VALUES ";
            for($i=1;$i<=$totalService;$i++){
                $idService = $_POST['idService'.$i];
                $numService = $_POST['numService'.$i];
                if($numService>0){
                    $sql.="('$roomid',$idService,$numService)";
                    if ($i != $totalService)
                        $sql .= ",";
                }
            }
            $sql.=";";
            if(mysqli_query($con,$sql)){
                $sql4="UPDATE room SET statu = 1 WHERE id = '$roomid'";
                mysqli_query($con,$sql4);
                $sql5="UPDATE customerOnline SET approval = 1 WHERE id = $id_customer";
                mysqli_query($con,$sql5);
                $sql6="UPDATE bookingOnline SET approval = 1 WHERE idcustomer = $id_customer";
                mysqli_query($con,$sql6);
                $sql7="INSERT INTO `bill`(`id_room`, `id_customer`, `priceroom`, `priceservices`) VALUES ('$roomid','$id','$priceroom','$priceservices')";
                mysqli_query($con,$sql7);
                echo '<script>alert("Đặt phòng thành công")</script>';
            }
        }else{
            echo '<script>alert("Đặt phòng thất bại")</script>';
        }
        header('Location: home.php');
    }
    ob_end_flush();
    
    ?>
    
    
    <script>
        function nextPage(currentPageId, nextPageId) {
            document.getElementById(currentPageId).classList.remove('active');
            document.getElementById(nextPageId).classList.add('active');
        }

        function prevPage(currentPageId, prevPageId) {
            document.getElementById(currentPageId).classList.remove('active');
            document.getElementById(prevPageId).classList.add('active');
        }
    </script>
    <script>
        let maxService = 1;
        let addServiceButton = document.querySelector('form .add-service');
        function addService() {
            maxService++;
            let serviceList = document.getElementById('service-list');
            let service = document.createElement('div');
            service.classList.add('row');
            service.id = 'service' + maxService;
            service.innerHTML =
                '<div class="col-7 ">' +
                '<label class="form-label">Dịch vụ</label>' +
                `<select name="idService${maxService}" class="form-select">` +
                '<?php
                    foreach ($services as $service) {
                        echo '<option value="' . $service['id'] . '">' . $service['name'] . '</option>';
                    }
                    ?>' +
                '</select>' +
                '</div>' +
                '<div class="col-4">' +
                '<label class="form-label">Số lượng</label>' +
                `<input type="number" class="form-control" name="numService${maxService}" id="" value="0">` +
                '</div>' +
                '<div class="col-1">'+
                '<label class="form-label" style="visibility:hidden;">Xóa</label>'+
                `<button type="button" class="btn btn-danger"  onclick="document.getElementById('${service.id}').remove();">X</button>`+
                '</div>'
                '</div>';
            serviceList.appendChild(service);
        }
        addServiceButton.addEventListener('click', addService);
    </script>
</body>

</html>