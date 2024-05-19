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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap.min.css" integrity="sha512-BMbq2It2D3J17/C7aRklzOODG1IQ3+MHw3ifzBHMBwGO/0yUqYmsStgBjI0z5EYlaDEFnvYV7gNYdD3vFLRKsA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./style/home.css">
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
                                <a class="nav-link active" href="#"><i class="me-2 fa-solid fa-gauge-high"></i> Status</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="booking.php"><i class="me-2 fa-solid fa-chart-simple"></i> Booking</a>
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
                                    <a class="nav-link" href="addroom.php"><i class="fa-solid fa-bed"></i>Add Room</a>
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
                    <a href="#" class="active"><i class="me-2 fa-solid fa-gauge-high"></i> Status</a>
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
                    <h1>Dashboard</h1>
                </div>
            </div>
            <div id="accordion">

                <div class="card booking-online mt-5">
                    <div class="card-header">
                        <button class="btn title-btn" data-bs-toggle="collapse" data-bs-target="#bookingOnline">
                            New booking online <span class="badge bg-primary">
                                <!-- Số lượt booking online -->
                            </span>

                        </button>
                    </div>
                    <div id="bookingOnline" class="collapse show" data-bs-parent="#accordion">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>RoomType</th>

                                            <th>Checkin</th>
                                            <th>Checkout</th>

                                            <th>DateBooking</th>
                                            <th>Status</th>
                                            <th>Confirm</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Nội dung bookingonline -->
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card usingroom mt-2">
                    <div class="card-header">
                        <button class="btn title-btn" data-bs-toggle="collapse" data-bs-target="#usingroom">
                            Booked room <span class="badge bg-primary">
                                <!-- Số lượt booking online -->
                            </span>

                        </button>
                        
                    </div>
                    <div id="usingroom" class="collapse" data-bs-parent="#accordion">
                        <div class="card-body">
                            <div class="row">
                                <!-- Hien thi noi dung -->
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card register mt-2">
                    <div class="card-header">
                        <button class="btn title-btn" data-bs-toggle="collapse" data-bs-target="#register">
                            New register <span class="badge bg-primary">
                                <!-- Số lượt booking online -->
                            </span>

                        </button>
                    </div>
                    <div id="register" class="collapse" data-bs-parent="#accordion">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Time</th>
                                            <th>Status</th>
                                            <th>Confirm</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Nội dung bookingonline -->
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>



            </div>

        </div>
    </div>
    <!-- Modal confirm Yes/No -->
    
    <script>
        var numOfBookingOnline = document.querySelector('#accordion .booking-online .card-header button span');
        var listBookingOnline = document.querySelector('#bookingOnline tbody');

        var xml = new XMLHttpRequest();
        xml.onload = function() {
            if (xml.status == 200) {
                let data = JSON.parse(xml.responseText);
                numOfBookingOnline.innerHTML = data.length;
                for (let i = 0; i < data.length; i++) {
                    listBookingOnline.innerHTML += `<tr>
                    <td>${data[i].id}</td>
                    <td>${data[i].fullname}</td>
                    <td>${data[i].phoneno}</td>
                    <td>${data[i].email}</td>
                    <td>${data[i].roomtype}</td>
                    <td>${data[i].checkin}</td>
                    <td>${data[i].checkout}</td>
                    <td>${data[i].cdate}</td>
                    <td>Chưa xác nhận</td>
                    <td><a href="confirmbooking.php?id=${data[i].id}&name=${data[i].fullname}&phone=${data[i].phoneno}&email=${data[i].email}&roomtype=${data[i].roomtype}&checkin=${data[i].checkin}&checkout=${data[i].checkout}" class='btn btn-primary onlineconfirm'>Confirm</a></td>
                    <td><button class="btn btn-danger deleteBookingBtn" data-id="${data[i].id}">Delete</button></td>
                </tr>`;
                }
                
                var delBookingBtn=document.querySelectorAll('.deleteBookingBtn');
    
                var id=0;
                delBookingBtn.forEach(function(btn){
                    btn.addEventListener('click',function(){
                        id=btn.getAttribute('data-id');
                        var xml4=new XMLHttpRequest();
                        xml4.onreadystatechange=function(){
                            if(xml4.readyState==4 && xml4.status==200){
                                var data=xml4.responseText;
                                if(data=='Delete successfully'){
                                    btn.parentElement.parentElement.remove();
                                    numOfBookingOnline.innerHTML=Number(numOfBookingOnline.innerHTML)-1;
                                    alert(data);
                                }else{
                                    alert(data);
                                }
                            }
                        }
                        xml4.open('GET','deletebookingonline.php?deleteid='+id,true);
                        xml4.send();
                    });
                });



            }

        }

        xml.open('GET', 'showbookingonline.php', true);
        // xml.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xml.send();
    </script>

    <script>
        var numOfUsingRoom = document.querySelector('#accordion .usingroom .card-header button span');
        var listUsingRoom = document.querySelector('#usingroom .row');
        var xml1 = new XMLHttpRequest();
        xml1.onload = function() {
            if (xml1.status == 200) {
                let data = JSON.parse(xml1.responseText);
                if (typeof data === 'string') {
                    listUsingRoom.innerHTML = data;
                } else {
                    numOfUsingRoom.innerHTML = data.length;
                    for (let i = 0; i < data.length; i++) {
                        let fullname = data[i].fullname.split(' ');
                        listUsingRoom.innerHTML += `<div class="col-3 mb-3">
                                    <div class="card">
                                        <i class="fa-solid fa-users mx-auto pt-5" style="font-size:5rem;"></i>
                                        <div class="card-body text-center">
                                            <h4 class="card-title">${fullname[fullname.length-1]}</h4>
                                            <p class="card-text">Room <span class="card_idroom">${data[i].idroom}</span></p>
                                            <button class="btn btn-primary" data-booking="${data[i].idroom}">PAY</button>
                                        </div>
                                    </div>



                                </div>`;
                    }
                }
                var listPayBtn = document.querySelectorAll('#usingroom .row .card button');
                listPayBtn.forEach(function(btn) {
                    btn.addEventListener('click', function() {
                        window.open('payment.php?idbooking=' + btn.getAttribute('data-booking'), '_blank');
                    });
                });


            }
        }
        xml1.open('GET', 'usingroom.php', true);
        xml1.send();
    </script>
    <script>
        var numOfRegister = document.querySelector('#accordion .register .card-header button span');
        var listRegister = document.querySelector('#register tbody');
        var xml2 = new XMLHttpRequest();
        xml2.onload = function() {
            if (xml2.status == 200) {
                let data = JSON.parse(xml2.responseText);
                if (typeof(data) === 'string') {
                    listRegister.innerHTML = data;
                } else {
                    numOfRegister.innerHTML = data.length;
                    for (let i = 0; i < data.length; i++) {
                        listRegister.innerHTML += `<tr>
                    <td>${data[i].id}</td>
                    <td>${data[i].fullname}</td>
                    <td>${data[i].phoneno}</td>
                    <td>${data[i].email}</td>
                    <td>${data[i].cdate}</td>
                    <td>Chưa xác nhận</td>
                    <td><button  class='btn btn-primary confirmregister' data-id="${data[i].id}">Confirm</button></td>
                </tr>`;
                    }
                }
                var listConfirmRegisterBtn = document.querySelectorAll('.confirmregister');
                listConfirmRegisterBtn.forEach(function(btn) {
                    btn.addEventListener('click', function() {
                        var id = btn.getAttribute('data-id');
                        var xml5 = new XMLHttpRequest();
                        xml5.onreadystatechange = function() {
                            if (xml5.readyState == 4 && xml5.status == 200) {
                                var data = xml5.responseText;
                                if (data == 'Xác nhận thành công') {
                                    btn.parentElement.parentElement.remove();
                                    numOfRegister.innerHTML = Number(numOfRegister.innerHTML) - 1;
                                    alert(data);
                                } else {
                                    alert(data);
                                }
                            }
                        }
                        xml5.open('GET', 'confirmregister.php?id=' + id, true);
                        xml5.send();
                    });
                });


            }

        }
        xml2.open('GET', 'showregister.php', true);
        xml2.send();
    </script>


    <!-- <script>
        
    </script> -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>