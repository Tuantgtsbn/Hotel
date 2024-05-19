<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('location:index.php');
}
ob_start();
?>
<?php
include('db.php');
?>
<?php
    $addstatus="";
    $imageerror="";
    if (isset($_POST['sub'])) {
        $id = test_data($_POST['id']);
        $floor = test_data($_POST['floor']);
        $bed = test_data($_POST['bed']);
        $roomtype = test_data($_POST['roomtype']);
        $price = test_data($_POST['price']);
        $descrip = test_data($_POST['descrip']);
        $nameofimage = $_FILES['nameofimage']['name'];
        $tmp_name = $_FILES['nameofimage']['tmp_name'];
        if (!empty($nameofimage)&&!empty($id)&&!empty($floor)&&!empty($bed)&&!empty($roomtype)&&!empty($price)&&!empty($descrip)) {
            $permit = array('jpg', 'jpeg', 'png', 'gif');
            $ext = pathinfo($nameofimage, PATHINFO_EXTENSION);
            if (!in_array($ext, $permit)) {
                $imageerror = "Vui lòng chọn file ảnh khác";
                $addstatus="Thêm thất bại";
            } else {
                $nameofimage = time() . '_' . $nameofimage;
                if (!is_dir("../Images") && !file_exists("../Images")) {
                    mkdir("../Images");
                }
                move_uploaded_file($tmp_name, "../Images/$nameofimage");
                
                $sql = "INSERT INTO room (id, floor, bed, roomtype, price, descrip, nameofimage) VALUES ('$id', $floor, $bed, '$roomtype', $price, '$descrip', '$nameofimage')";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    $addstatus="Thêm thành công";
                } else {
                    $addstatus="Thêm thất bại";
                }
            }
        }
    }
    ob_end_flush();
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./style/room.css">

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
                                <a class="nav-link" href="#"><i class="me-2 fa-solid fa-chart-simple"></i> Booking</a>
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
                                    <a class="nav-link" class="active"href="#"><i class="fa-solid fa-bed"></i>Add Room</a>
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
                    <a href="booking.php"><i class="me-2 fa-solid fa-chart-simple"></i> Booking</a>
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
                        <a href="addroom.php" class="active"><i class="me-2 fa-solid fa-bed"></i> Add Room</a>
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
                    <h1>Add Rooms</h1>
                </div>
            </div>
            <div class="form w-50 mx-auto">
            <div class="row ">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="col-4">
                        <label for="id" class="form-label">ID</label>
                        <input type="text" class="form-control" id="id" name="id" required>
                    </div>
                    <div class="col-4">
                        <label for="floor" class="form-label">Tầng</label>
                        <input type="number" class="form-control" id="floor" name="floor" required>
                    </div>
                    <div class="col-4">
                        <label for="bed" class="form-label">Số gường</label>
                        <input type="number" class="form-control" id="bed" name="bed" required>
                    </div>
                    <div class="col-8">
                        <label for="roomtype" class="form-label">Loại phòng</label>
                        <select class="form-select" id="roomtype" name="roomtype" required>
                            <option value="Deluxe">Deluxe</option>
                            <option value="Standard">Standard</option>
                            <option value="Suit">Suit</option>
                            <option value="Master">Master</option>

                        </select>
                    </div>
                    <div class="col-4">
                        <label for="price" class="form-label">Giá</label>
                        <input type="number" class="form-control" id="price" name="price" required>
                    </div>
                    <div class="col-12">
                        <label for="descrip" class="form-label">Mô tả</label>
                        <textarea class="form-control" name="descrip" id="descrip"></textarea>

                    </div>
                    <div class="col-6">
                        <label for="nameofimage" class="form-label">Hình ảnh</label>
                        <input type="file" name="nameofimage" class="form-control"id="nameofimage">
                        <?php
                        echo "<p style='color:red;'>$imageerror</p>";
                        ?>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary" name="sub">Thêm</button>
                    </div>
                    <div class="col-12">
                        <?php
                        if($addstatus=="Thêm thất bại"){
                            echo "<p style='color:red;'>$addstatus</p>";
                        }else{
                            echo "<p style='color:green;'>$addstatus</p>";
                        }
                        
                        ?>
                    </div>
                </form>
            </div>
            </div>
            
        </div>
    </div>
    
</body>

</html>