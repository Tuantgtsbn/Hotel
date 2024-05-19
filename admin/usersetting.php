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
    <link rel="stylesheet" href="./style/usersetting.css">
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
                    <a href="home.php"><i class="me-2 fa-solid fa-gauge-high"></i> Status</a>
                </li>
                <li>
                    <a href="booking"><i class="me-2 fa-solid fa-chart-simple"></i> Booking</a>
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
                    <h1>Quản lý tài khoản</h1>
                </div>
            </div>
            <div class="row content mt-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>User name</th>
                            <th>Password</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody id="tbodyUser">

                    </tbody>
                </table>
            </div>
            <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#modalAddAdmin">Add new admin</button>

        </div>
    </div>


    <!-- Modal update -->
    <div class="modal fade" id="modalUpdate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Change username and password</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" class="row">
                        <div class="col-3">
                            <label for="">Id</label>
                            <input type="text" class="form-control" name="id" readonly>
                        </div>
                        <div class="col-12">
                            <label for="">User name</label>
                            <input type="text" class="form-control" name="usname" minlength="4">
                        </div>
                        <div class="col-12">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="pass" minlength="8" required>
                        </div>
                        <div class="col-12 mt-2">
                            <button type="button" class="btn btn-primary" id="updateBtn" name="update" data-bs-dismiss="modal">Update</button>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>


    <script>
        var updateBtn = document.getElementById('updateBtn');
        var tbodyUser = document.getElementById('tbodyUser');
        updateBtn.addEventListener('click', function() {
            var id = document.querySelector('#modalUpdate input[name="id"]').value;
            var usname = document.querySelector('#modalUpdate input[name="usname"]').value;
            var pass = document.querySelector('#modalUpdate input[name="pass"]').value;
            var xmlhttp = new XMLHttpRequest();

            xmlhttp.onload = function() {
                if (this.status == 200) {
                    var data = JSON.parse(this.responseText);
                    var html = '';
                    if (typeof data === 'string') {
                        if(data == 'Error'){
                            alert('Error');
                        }else{
                        html += '<tr>';
                        html += '<td colspan="5">' + data + '</td>';
                        html += '</tr>';
                        }
                    } else {
                        for (var i = 0; i < data.length; i++) {
                            html += '<tr>';
                            html += '<td>' + data[i].id + '</td>';
                            html += '<td>' + data[i].usname + '</td>';
                            html += '<td>' + data[i].pass + '</td>';
                            html += '<td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalUpdate" data-id="' + data[i].id + '" data-usname="' + data[i].usname + '"><i class="fa-solid fa-eraser"></i>Update</button></td>';
                            html += '<td><button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDelete" data-id="' + data[i].id + '"><i class="fa-solid fa-trash"></i>Delete</button></td>';
                            html += '</tr>';
                        }
                    }

                    tbodyUser.innerHTML = html;
                }
            }

            xmlhttp.open('POST', 'updateuser.php', true);
            xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xmlhttp.send('id=' + id + '&usname=' + usname + '&pass=' + pass);
        })


    </script>

    <!-- Modal add User -->
    <div class="modal" id="modalAddAdmin">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add Admin</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form method="post" class="row">
                        <div class="col-12">
                            <label for="">User name</label>
                            <input type="text" class="form-control" name="usname" minlength="4" required>
                        </div>
                        <div class="col-12">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="pass" minlength="8" required>
                        </div>
                        <div class="col-12 mt-2">
                            <button type="button" id="addUserBtn" class="btn btn-primary" data-bs-dismiss="modal" name="addAdmin">Add</button>
                        </div>
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    <script>
        var addUserBtn = document.getElementById('addUserBtn');
        var tbodyUser = document.getElementById('tbodyUser');
        addUserBtn.addEventListener('click', function() {
            var usname = document.querySelector('#modalAddAdmin input[name="usname"]').value;
            var pass = document.querySelector('#modalAddAdmin input[name="pass"]').value;
            var xmlhttp = new XMLHttpRequest();

            xmlhttp.onload = function() {
                if (this.status == 200) {
                    var data = JSON.parse(this.responseText);
                    var html = '';
                    if (typeof data === 'string') {
                        html += '<tr>';
                        html += '<td colspan="5">' + data + '</td>';
                        html += '</tr>';
                    } else {
                        for (var i = 0; i < data.length; i++) {
                            html += '<tr>';
                            html += '<td>' + data[i].id + '</td>';
                            html += '<td>' + data[i].usname + '</td>';
                            html += '<td>' + data[i].pass + '</td>';
                            html += '<td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalUpdate" data-id="' + data[i].id + '" data-usname="' + data[i].usname + '"><i class="fa-solid fa-eraser"></i>Update</button></td>';
                            html += '<td><button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDelete" data-id="' + data[i].id + '"><i class="fa-solid fa-trash"></i>Delete</button></td>';
                            html += '</tr>';
                        }
                    }

                    tbodyUser.innerHTML = html;
                }
            }

            xmlhttp.open('POST', 'adduser.php', true);
            xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xmlhttp.send('usname=' + usname + '&pass=' + pass);
        })
    </script>
    <!-- Modal confirm Yes/No -->
    <div class="modal" id="confirmDelete">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Do you want to delete this user ?</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="confirmBtn" data-bs-dismiss="modal">Yes</button>

                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                </div>

            </div>
        </div>
    </div>
    <script>
        var tbodyUser = document.getElementById('tbodyUser');
        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onload = function() {
            if (this.status == 200) {
                var data = JSON.parse(this.responseText);
                var html = '';
                if (typeof data === 'string') {
                    html += '<tr>';
                    html += '<td colspan="5">' + data + '</td>';
                    html += '</tr>';
                } else {
                    for (var i = 0; i < data.length; i++) {
                        html += '<tr>';
                        html += '<td>' + data[i].id + '</td>';
                        html += '<td>' + data[i].usname + '</td>';
                        html += '<td>' + data[i].pass + '</td>';
                        html += '<td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalUpdate" data-id="' + data[i].id + '" data-usname="' + data[i].usname + '"><i class="fa-solid fa-eraser"></i>Update</button></td>';
                        html += '<td><button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDelete" data-id="' + data[i].id + '"><i class="fa-solid fa-trash"></i>Delete</button></td>';
                        html += '</tr>';
                    }
                }

                tbodyUser.innerHTML = html;
            }
        }
        xmlhttp.open('GET', 'getuser.php', true);
        xmlhttp.send();
    </script>
    <script>
        var confirmDelete = document.getElementById('confirmDelete')
        var tbodyUser = document.getElementById('tbodyUser')
        var iduser=0;
        confirmDelete.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget
            iduser = button.getAttribute('data-id')
        })
        var confirmBtn = document.getElementById('confirmBtn')
        confirmBtn.addEventListener('click', function() {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onload = function() {
                if (this.status == 200) {
                    var data = JSON.parse(this.responseText);
                    var html = '';
                    if (typeof data === 'string') {
                        if(data == 'Error'){
                            alert('Error');
                        }else{
                            html += '<tr>';
                            html += '<td colspan="5">' + data + '</td>';
                            html += '</tr>';
                        }
                    } else {
                        for (var i = 0; i < data.length; i++) {
                            html += '<tr>';
                            html += '<td>' + data[i].id + '</td>';
                            html += '<td>' + data[i].usname + '</td>';
                            html += '<td>' + data[i].pass + '</td>';
                            html += '<td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalUpdate" data-id="' + data[i].id + '" data-usname="' + data[i].usname + '"><i class="fa-solid fa-eraser"></i>Update</button></td>';
                            html += '<td><button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDelete" data-id="' + data[i].id + '"><i class="fa-solid fa-trash"></i>Delete</button></td>';
                            html += '</tr>';
                        }
                    }

                    tbodyUser.innerHTML = html;
                }
            }
            xmlhttp.open('GET', 'deleteuser.php?id=' + iduser, true);
            xmlhttp.send();
        })
    </script>
    <script>
        var myModal = document.getElementById('modalUpdate')
        myModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget
            var iduser = button.getAttribute('data-id')
            var usname = button.getAttribute('data-usname')
            var idInput = myModal.querySelector('.modal-body input')
            var usnameInput = myModal.querySelector('.modal-body input[name="usname"]')
            idInput.value = iduser
            usnameInput.value = usname

        })
    </script>

    <!-- Modal add admin -->



</body>

</html>

