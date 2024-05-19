<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('location:index.php');
}
ob_start();
?>
<?php
include('db.php');
$idbooking=$_GET['idbooking'];
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
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css" />

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
                                <a class="nav-link" href="home.php"><i class="me-2 fa-solid fa-gauge-high"></i> Status</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="booking.php"><i class="me-2 fa-solid fa-chart-simple"></i> Booking</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="payment.php"><i class=" me-2 fa-solid fa-credit-card"></i> Payment</a>
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
                    <a href="booking.php"><i class="me-2 fa-solid fa-chart-simple"></i> Booking</a>
                </li>
                <li>
                    <a href="payment.php" class="active"><i class="me-2 fa-solid fa-credit-card"></i> Payment</a>
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
                    <h1>Payment</h1>
                </div>
            </div>

            <div class="row content mt-3 p-3" style="background-color:#fff;">
                <table class="table table-bordered table-hover table-striped" id="listpayment">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Room</th>
                            <th>Roomtype</th>
                            <th>Checkin</th>
                            <th>Checkout</th>
                            <th>Total price room</th>
                            <th>Total price services</th>
                            <th>Total</th>
                            <th>Detail</th>
                            <th>Payment</th>
                        </tr>
                    </thead>
                    <tbody class="listpayment">
                        <!-- Noi dung -->
                    </tbody>
                </table>

            </div>


        </div>
    </div>
    <div class="modal" id="confirmPay">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Do you want to pay ?</h4>
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

    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>

    <script>
        function formatNumber(num) {
            let tmp = num
            return tmp.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
        }
        

        function loaddata(path) {
            var listpayment = document.querySelector('.listpayment');
            $.ajax({
                url: path,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (typeof data == 'string') {
                        listpayment.innerHTML = data;
                    } else {
                        listpayment.innerHTML = ''; // Clear the existing rows
                        data.forEach(function(item) {
                            var tr = document.createElement('tr');
                            tr.innerHTML = `
                            <td>${item.id}</td>
                            <td>${item.customer}</td>
                            <td>${item.id_room}</td>
                            <td>${item.roomtype}</td>
                            <td>${item.checkin}</td>
                            <td>${item.checkout}</td>
                            <td>${formatNumber(item.priceroom)}</td>
                            <td>${formatNumber(item.priceservices)}</td>
                            <td>${formatNumber(Number(item.priceroom) + Number(item.priceservices))}</td>
                            <td><button class="btn btn-primary detail" data-bs="${item.idcus}">DETAIL</button></td>
                            <td><button class="btn btn-success pay" data-bs="${item.id}" data data-bs-toggle="modal" data-bs-target="#confirmPay">PAY</button></td>
                        `;
                            listpayment.appendChild(tr);
                        });

                        // Attach event listeners after the rows have been added
                        var listDetailBtn = document.querySelectorAll('.detail');
                        listDetailBtn.forEach(function(btn) {
                            btn.addEventListener('click', function() {
                                var listValue = btn.parentElement.parentElement.querySelectorAll('td');
                                let id = listValue[0].textContent;
                                let customer = listValue[1].textContent;
                                let id_room = listValue[2].textContent;
                                let id_customer = this.getAttribute('data-bs');
                                let roomtype = listValue[3].textContent;
                                let checkin = listValue[4].textContent;
                                let checkout = listValue[5].textContent;
                                let priceroom = listValue[6].textContent;
                                let priceservices = listValue[7].textContent;
                                let total = listValue[8].textContent;
                                let url = 'print.php?id=' + id + '&idcus=' + id_customer + '&id_room=' + id_room + '&roomtype=' + roomtype + '&checkin=' + checkin + '&checkout=' + checkout + '&priceroom=' + priceroom + '&priceservices=' + priceservices + '&total=' + total;
                                window.open(url, '_blank');
                            });
                        });

                        var id = 0;
                        var target=null;
                        document.getElementById('confirmPay').addEventListener('show.bs.modal', function(event) {
                            target=event.relatedTarget;
                            id = target.getAttribute('data-bs');
                        });
                        var confirmBtn = document.getElementById('confirmBtn');
                        confirmBtn.addEventListener('click', function(evnet) {
                            $.ajax({
                                url: 'confirmpay.php',
                                type: 'GET',
                                data: {
                                    id: id
                                },
                                success: function(response) {
                                    if (response == 'Success') {
                                        // Remove the row from the table
                                        var row = target.closest('tr');
                                        row.remove();
                                        alert('Pay success');
                                        // loaddata(path);
                                    } else {

                                        alert('Error');
                                    }
                                },
                                error: function(xhr, status, error) {
                                    console.log(xhr.responseText);
                                }
                            });
                        });

                        $('#listpayment').DataTable({
                            "columnDefs": [{
                                "className": "text-center",
                                "targets": "_all"
                            }],
                            "pagingType": 'full_numbers',
                            "destroy": true // Add this line to destroy the existing DataTable before reinitializing it
                        });
                        var searchValue = <?php if(isset($idbooking)) echo $idbooking; else echo "''"; ?>;
                        if(searchValue!=''){
                            $('#listpayment').DataTable().search(searchValue).draw();
                        }
                        // // Get the search input element
                        // var searchInput = document.querySelector('.dataTables_filter input');
                        // // Set the value of the search input
                        // searchInput.value = searchValue;

                    }
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        }

        $(document).ready(function() {
            loaddata('showpayment.php');
        });
    </script>
    <script>
        

    </script>


</body>

</html>