<?php
include('db.php');
function sumdate($date1, $date2)
{
    $date1 = strtotime($date1);
    $date2 = strtotime($date2);
    $diff = abs($date2 - $date1);
    return floor($diff / (60 * 60 * 24)) + 1;
}
function formatNumber($num)
{
    return number_format($num, 1);
}
$id = $_GET['id'];
$idcus = $_GET['idcus'];
$id_room = $_GET['id_room'];
$roomtype = $_GET['roomtype'];
$checkin = $_GET['checkin'];
$checkout = $_GET['checkout'];
$priceroom = $_GET['priceroom'];
$priceservices = $_GET['priceservices'];
$total = $_GET['total'];
$detail = new stdClass();
if (isset($_GET['id']) && isset($_GET['idcus']) && isset($_GET['id_room']) && isset($_GET['roomtype']) && isset($_GET['checkin']) && isset($_GET['checkout']) && isset($_GET['priceroom']) && isset($_GET['priceservices']) && isset($_GET['total'])) {
    $detail->id = $id;
    $detail->idcus = $idcus;
    $detail->id_room = $id_room;
    $detail->roomtype = $roomtype;
    $detail->checkin = $checkin;
    $detail->checkout = $checkout;
    $detail->priceroom = $priceroom;
    $detail->priceservices = $priceservices;
    $detail->total = $total;
    $detail->services = array();
    $sql = "SELECT * from customerOffline where id=$idcus";
    $re = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($re);
    $detail->customer = $row['fullname'];
    $detail->phone = $row['phoneno'];
    $detail->email = $row['email'];

    $sql1 = "SELECT * from room where id=$id_room";
    $re1 = mysqli_query($con, $sql1);
    $row1 = mysqli_fetch_assoc($re1);
    $detail->services['room'] = new stdClass();
    $detail->services['room']->name = $row1['roomtype'];
    $detail->services['room']->unitprice = $row1['price'];
    $detail->services['room']->count = sumdate($checkin, $checkout);
    $detail->services['room']->total = $row1['price'] * sumdate($checkin, $checkout);
    $sql2 = "SELECT service.name as name,service.price as price,orderservices.numbers as count from orderservices inner join `service` on orderservices.id_service=service.id  where orderservices.id_room=$id_room and status=1";
    $re2 = mysqli_query($con, $sql2);
    $i = 1;
    if (mysqli_num_rows($re2) > 0) {
        while ($row2 = mysqli_fetch_assoc($re2)) {
            $detail->services[$row2['name']] = new stdClass();
            $detail->services[$row2['name']]->name = $row2['name'];
            $detail->services[$row2['name']]->unitprice = $row2['price'];
            $detail->services[$row2['name']]->count = $row2['count'];
            $detail->services[$row2['name']]->total = $row2['price'] * $row2['count'];
            $i++;
        }
    }
    $tmp = 0;
    foreach ($detail->services as $key => $value) {
        $tmp += $value->total;
    }
    if ($tmp != $detail->total) {
        $detail->total = $tmp;
    }
    $detail->discount = 0.1;
    $detail->pay = $detail->total * (1 - $detail->discount);
    // echo json_encode($detail);




} else {
    header('Location: payment.php');
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
    <link rel="stylesheet" href="style/print.css">
    <style>
        #invoice{
            color:black;
            background-color:white;
        }

    </style>
</head>

<body>
    <div class="container-fluid wrapper">
        <button class="btn btn-primary">Download</button>
        <div id="invoice" class="w-75 mx-auto p-5">
            <div class="row">
                <div class="title col-12 text-center">
                    <h3>Invoice</h3>
                </div>
                <div class="address col-6">
                    <p>Address: 68 Hàng Bài Hoàn Kiếm Hà Nội
                        <br> Phone: +84966668888

                    </p>

                </div>
                <div class="logo-brand col-6 text-center">
                    <p>
                        <span class="first-letter">Sun</span>
                        <span class="second-letter">Rise</span>
                    </p>
                </div>

                <div class="customer col-6 mt-3">
                    <h3>Information customer:</h3>
                    <p class="customer-name"><?php echo $detail->customer ?></p>
                    <p class="customer-email"><?php echo $detail->email ?></p>
                    <p class="customer-phone"><?php echo $detail->phone ?></p>

                </div>
                <div class="invoice col-6 mt-3">
                    <table class="meta float-end">
                        <tr>
                            <th><span>Invoice #</span></th>
                            <td><span><?php echo $detail->id ?></span></td>
                        </tr>
                        <tr>
                            <th><span>Date</span></th>
                            <td><span><?php echo date("Y-m-d") ?></span></td>
                        </tr>

                    </table>

                </div>

                <div class="col-12 services mt-3">
                    <table class="w-100">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Service</th>
                                <th>Count</th>
                                <th>Price a unit</th>
                                <th>Total Price</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td><?php echo $detail->services['room']->name ?></td>
                                <td><?php echo $detail->services['room']->count ?></td>
                                <td><?php echo formatNumber($detail->services['room']->unitprice) ?></td>
                                <td><?php echo formatNumber($detail->services['room']->total) ?></td>
                            </tr>
                            <?php
                            $i = 1;
                            foreach ($detail->services as $key => $value) {
                                if ($key != 'room') {
                                    $i++;
                                    echo "<tr>";
                                    echo "<td>$i</td>";
                                    echo "<td>$value->name</td>";
                                    echo "<td>$value->count</td>";
                                    echo "<td>" . formatNumber($value->unitprice) . "</td>";
                                    echo "<td>" . formatNumber($value->total) . "</td>";
                                    echo "</tr>";
                                }
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
                <div class="col-12 total-price mt-3">
                    <table class="meta float-end ">
                        <tr>
                            <th><span>Total</span></th>
                            <td><?php echo formatNumber($detail->total) ?></td>
                        </tr>
                        <tr>
                            <th>Discount</th>
                            <td><span><?php echo ($detail->discount * 100) . "%" ?></span></td>
                        </tr>
                        <tr>
                            <th>Pay</th>
                            <td><span><?php echo formatNumber($detail->pay) ?></span></td>
                        </tr>
                    </table>
                    <div class="clearfix"></div>

                </div>
                <div class="col-12 line"></div>
                <div class="footer col-12 mt-2 text-center">
                    <p>Thank you for choosing our hotel.</p>
                    <p>If you have any complaints, please tell us.</p>
                </div>

            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        // Giả sử bạn đã tạo một form và muốn chuyển nó thành hình ảnh
        var form = document.getElementById('invoice');

        // // Tạo một canvas
        // var canvas = document.createElement('canvas');
        // var ctx = canvas.getContext('2d');

        // // Đảm bảo rằng kích thước của canvas phù hợp với form
        // canvas.width = form.offsetWidth;
        // canvas.height = form.offsetHeight;

        // // Vẽ form lên canvas
        // ctx.drawImage(form, 0, 0, canvas.width, canvas.height);
        var button = document.querySelector('button');

        // Khi nhấn nút, tải hình ảnh từ canvas
        button.addEventListener('click', function() {
            html2canvas(form, {
                backgroundColor: null // Đảm bảo nền của form là trong suốt, không bị ảnh hưởng bởi các phần tử khác
            }).then(function(canvas) {
                var imgURI = canvas.toDataURL('image/jpeg');
                var link = document.createElement('a');
                link.href = imgURI;
                link.download = 'invoice.jpeg';
                link.click();
            });
        });
    </script>

</body>

</html>