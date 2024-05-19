<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('location:index.php');
}
function sumdate($date1, $date2)
{
    $date1 = strtotime($date1);
    $date2 = strtotime($date2);
    $diff = abs($date2 - $date1);
    return floor($diff / (60 * 60 * 24))+1;
}
ob_start();
?>

<?php
include('db.php');
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./style/booking.css">

</head>

<body>
    <header>
        <div class="container-fluid p-0">
            <nav class="navbar navbar-expand-md fixed-top" style="background-color:rgb(9, 25, 42);">
                <div class="container-fluid">
                    <a class="navbar-brand btn btn-primary text-white" href="home.php">
                        <?php
                        echo $_SESSION['user'];
                        ?>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="mynavbar">
                        <ul class="navbar-nav me-auto" style="display:none;">
                            <li class="nav-item">
                                <a class="nav-link" href="home.php"><i class="me-2 fa-solid fa-gauge-high"></i> Status</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link active" href="#"><i class="me-2 fa-solid fa-chart-simple"></i> Booking</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="payment.php"><i class=" me-2 fa-solid fa-credit-card"></i> Payment</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="profit.php"><i class="me-2 fa-solid fa-money-check"></i> Profit</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="collapse" data-bs-target="#setting"><i class="fa-solid fa-gear"></i>Setting</a>
                            </li>
                            <ul id="setting" class="collapse">
                                <li>
                                    <a class="nav-link" href="room.php"><i class="fa-solid fa-bed"></i>Add Room</a>
                                </li>
                                <li>
                                    <a class="nav-link" href="roomdel.php"><i class="fa-solid fa-trash"></i>Delete Room</a>
                                </li>
                            </ul>
                            <li class="nav-item">
                                <a class="nav-link" href="logout"><i class="me-2 fa-solid fa-right-from-bracket"></i> Logout</a>
                            </li>

                        </ul>
                        <div class="dropdown ms-auto">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                                <i class="me-2 fa-solid fa-user"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="usersetting.php"><i class="me-2 fa-solid fa-user"></i> User Profile</a></li>
                                <li><a class="dropdown-item" href="#"><i class="me-2 fa-solid fa-gear"></i> Settings</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                    </hr>
                                </li>
                                <li><a class="dropdown-item" href="#"><i class="me-2 fa-solid fa-right-from-bracket"></i> Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <div class="sidebar">
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="home.php"><i class="me-2 fa-solid fa-gauge-high"></i> Status</a>
                </li>
                <li>
                    <a href="#" class="active"><i class="me-2 fa-solid fa-chart-simple"></i> Booking</a>
                </li>
                <li>
                    <a href="payment.php"><i class="me-2 fa-solid fa-credit-card"></i> Payment</a>
                </li>
                <li>
                    <a href="profit.php"><i class="me-2 fa-solid fa-money-check"></i> Profit</a>
                </li>
                <li>
                    <a href="logout.php"><i class="me-2 fa-solid fa-right-from-bracket"></i> Logout</a>
                </li>
                <li>
                    <a data-bs-toggle="collapse" data-bs-target="#setting"><i class="me-2 fa-solid fa-gear"></i> Setting</a>
                </li>
                <ul id="setting" class="collapse">
                    <li>
                        <a href="addroom.php"><i class="me-2 fa-solid fa-bed"></i> Add Room</a>
                    </li>
                    <li>
                        <a href="roomdel.php"><i class="me-2 fa-solid fa-trash"></i> Delete Room</a>
                    </li>
                </ul>

            </ul>
        </div>
    </div>

    <div id="content">
        <div class="container-fluid">
            <div class="row title-content">
                <div class="col-12">
                    <h1>Available Rooms</h1>
                </div>
            </div>
            <div class="row filter">
                <form action="" method="get" class="col-4">

                    <label for="filterroomtype" class="form-label">Loại phòng</label>
                    <select name="filterroomtype" class="form-select" id="filterroomtype">
                        <option value="All" selected>All</option>
                        <option value="Standard">Standard</option>
                        <option value="Deluxe">Deluxe</option>
                        <option value="Suit">Suit</option>
                        <option value="Master">Master</option>
                    </select>


                </form>
                <div class="col-4 ms-auto">
                    <label for="valuesearchroom" class="form-label">Tìm kiếm</label>
                    <input type="text" name="valuesearchroom" class="form-control" id="valuesearchroom" placeholder="Tìm kiếm...">
                </div>

            </div>

            <div class="row" id="availableroom">
                <!-- Hiển thị các phòng -->

            </div>
            <div class="pagination mt-5 justify-content-center" id="pagination">
                <!-- Hiển thị các trang -->
            </div>

        </div>
    </div>




    <div class="modal fade" id="modalOrderOnline" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Đặt phòng</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="container-fluid p-0" action="" method="post">
                        <div class="form-page active row" id="page1">
                            <!-- Trang 1 -->
                            <div class="col-md-12">
                                <label for="inputName" class="form-label">Họ tên</label>
                                <input name="name" type="text" class="form-control" id="inputName" required>

                            </div>
                            <div class="col-md-12">
                                <label for="inputEmail4" class="form-label">Email</label>
                                <input name="email" type="text" class="form-control" id="inputEmail4" required>

                            </div>
                            <div class="col-md-12">
                                <label for="inputAddress" class="form-label">Số điện thoại</label>
                                <input name="phone" type="phone" class="form-control" id="inputAddress" required>

                            </div>
                            <div class="col-md-6">
                                <label for="roomId" class="form-label">Tên phòng</label>
                                <input type="text" id="roomId" class="form-control" name="roomId" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="roomType" class="form-label">Loại phòng</label>
                                <input type="text" id="roomType" class="form-control" name="roomType" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="inputDateCheckIn" class="form-label">Giờ nhận phòng</label>
                                <input name="checkin" type="date" class="form-control" id="inputDateCheckIn" required>

                            </div>
                            <div class="col-md-6">
                                <label for="inputDateCheckOut" class="form-label">Giờ trả phòng</label>
                                <input name="checkout" type="date" class="form-control" id="inputDateCheckOut" required>

                            </div>
                            <div class="col-md-3 mt-2">
                                <p type="button" class="text-decoration-underline" onclick="nextPage('page1', 'page2')">Next >></p>

                            </div>
                        </div>
                        <div class="form-page row p-0" id="page2">
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
                    <?php
                    if (isset($_POST['submit'])) {
                        $name = test_data($_POST['name']);
                        $phone = test_data($_POST['phone']);
                        $email = test_data($_POST['email']);
                        $roomId = test_data($_POST['roomId']);
                        $roomType = test_data($_POST['roomType']);
                        $checkin = test_data($_POST['checkin']);
                        $checkout = test_data($_POST['checkout']);
                        $totalInput = count($_POST);

                        $totalService = ($totalInput - 8) / 2;
                        $last_id = 0;
                        $sql="SELECT price FROM room WHERE id='$roomId'";
                        $res=mysqli_query($con,$sql);
                        $row=mysqli_fetch_assoc($res);
                        $priceroom=$row['price']*sumdate($checkin,$checkout);
                        $priceservices=0;
                        for($i=1;$i<=$totalService;$i++){
                            $idService = test_data($_POST['idService' . $i]);
                            $numService = test_data($_POST['numService' . $i]);
                            $sql="SELECT price FROM service WHERE id='$idService'";
                            $res=mysqli_query($con,$sql);
                            $row=mysqli_fetch_assoc($res);
                            $priceservices=$row['price']* $numService+$priceservices;
                    
                        }
                        $sql1 = "INSERT INTO `customerOffline`(`fullname`, `phoneno`, `email`) VALUES ('$name','$phone','$email')";
                        if (mysqli_query($con, $sql1)) {
                            // Lấy giá trị id của khách hàng vừa chèn
                            $last_id = mysqli_insert_id($con);
                            $sql2 = "INSERT INTO `bookingOffline`(`idcustomer`, `idroom`, `checkin`,`checkout`) VALUES ($last_id,'$roomId','$checkin','$checkout')";
                            if (mysqli_query($con, $sql2)) {
                                $sql3 = "INSERT INTO `orderservices`(`id_room`, `id_service`, `numbers`) VALUES ";
                                for ($i = 1; $i <= $totalService; $i++) {
                                    $idService = test_data($_POST['idService' . $i]);
                                    $numService = test_data($_POST['numService' . $i]);
                                    if ($numService > 0) {
                                        $sql3 .= "('$roomId',$idService,$numService)";
                                        if ($i != $totalService)
                                            $sql3 .= ",";
                                    }
                                }
                                $sql3 .= ";";
                                if (mysqli_query($con, $sql3)) {
                                    $sql4 = "UPDATE `room` SET `statu`=1 WHERE id='$roomId'";
                                    mysqli_query($con, $sql4);
                                    $sql5="INSERT INTO `bill`(`id_room`, `id_customer`, `priceroom`, `priceservices`) VALUES ('$roomId','$last_id','$priceroom','$priceservices')";
                                    mysqli_query($con,$sql5);
                                    echo '<script>alert("Đặt phòng thành công")</scrip>';
                                } else {
                                    echo '<script>alert("Đặt phòng thất bại")</scrip>';
                                }
                            } else {

                                echo '<script>alert("Đặt phòng thất bại")</script>';
                            }
                        } else {
                            echo '<script>alert("Đặt phòng thất bại")</script>';
                        }
                    }
                    ?>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/orderOnline.js"></script>
    <script>
        let selectElement = document.getElementById('filterroomtype');
        let availableroom = document.getElementById('availableroom');
        let pagination = document.getElementById('pagination');
        let filterroomtype = selectElement.value;
        // Thay đỏio giá trị loại phòng
        selectElement.addEventListener('change', function() {
            let xml = new XMLHttpRequest();
            xml.onreadystatechange = function() {
                if (xml.readyState == 4 && xml.status == 200) {
                    let data = JSON.parse(xml.responseText);
                    if(typeof data=='string'){
                        availableroom.innerHTML=data;
                        pagination.innerHTML='';
                    
                    
                }else{
                    availableroom.innerHTML = data.rooms.join('');
                    pagination.innerHTML = data.pages.join('');
                    current_page = data.current_page;
                    total_page = data.total_page;
                }
            }
            
        };
        xml.open('GET', 'getavailableroom.php?filterroomtype=' + selectElement.value, true);
            xml.send();
    });
        // Thay đổi giá trị tìm kiếm
        document.getElementById('valuesearchroom').addEventListener('change', function() {
            let value = document.getElementById('valuesearchroom').value;
            let url = new URL(window.location.href);

            url.searchParams.set('valuesearchroom', value);
            window.location.href = url;
        });
        // let valuesearchroom = document.getElementById('valuesearchroom').value;
        let current_page = 1;
        let total_page = 1;
        let limit = 12;
        let url = 'getavailableroom.php?filterroomtype=' + filterroomtype + '&page=' + current_page;
        let xhr = new XMLHttpRequest();
        xhr.open('GET', url, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                let data = JSON.parse(xhr.responseText);
                availableroom.innerHTML = data.rooms.join('');
                
                pagination.innerHTML = data.pages.join('');
                current_page = data.current_page;
                total_page = data.total_page;
            }
        }
        xhr.send();
        // Hiển thị trang
        function showpage(index){
            let url = 'getavailableroom.php?filterroomtype=' + filterroomtype + '&page=' + index;
            let xhr = new XMLHttpRequest();
            xhr.open('GET', url, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    let data = JSON.parse(xhr.responseText);
                    availableroom.innerHTML = data.rooms.join('');
                    pagination.innerHTML = data.pages.join('');
                    current_page = data.current_page;
                    total_page = data.total_page;
                }
            }
            xhr.send();
        }
    </script>
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
        let addServiceButton = document.querySelector('.modal .add-service');
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
                `<input type="number" class="form-control" name="numService${maxService}" id="">` +
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