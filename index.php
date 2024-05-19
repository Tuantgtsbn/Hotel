<?php
include 'db.php';
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sunrise Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <!-- Button scroll to top -->
    <div class="scroll-to-top">
        <a href="#top">
            <i class="fa-solid fa-up-long"></i>
        </a>
    </div>
    <!-- Button scroll to top -->

    <div class="container-fluid d-flex justify-content-between p-0 flex-md-row flex-column" id="top">
        <div class="social ">
            <ul class="nav">
                <li class="nav-item"><a class="nav-link" href="#"><i class="fab fa-facebook"></i></a></li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="fab fa-twitter"></i></a></li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="fab fa-instagram"></i></a></li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="fab fa-linkedin"></i></a></li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="fab fa-youtube"></i></a></li>
            </ul>

        </div>
        <div class="header-contact">
            <ul class="nav">
                <li class="nav-item">
                    <span class="fas fa-envelope"></span>
                    <a class="nav-link text-black d-inline-block" href="mailto:info@sunrise.com">info@sunrise.com</a>
                </li>
                <li class="nav-item">
                    <span class="fas fa-phone"></span>
                    <a class="nav-link text-black d-inline-block" href="">1234567890</a>
                </li>
                <li class="nav-item d-flex align-items-center">
                    <i class="fa-solid fa-magnifying-glass btn btn-warning btn-lg search-btn">
                    </i>
                </li>


            </ul>
        </div>


    </div>
    <header>
        <nav class="navbar navbar-expand-md">
            <div class="container-fluid">
                <a class="navbar-brand text-white " href="#">Sunrise</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="#">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#about">Giới thiệu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#team">Đội ngũ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#rooms">Phòng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#contact">Liên hệ</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div id="demo" class="carousel slide" data-bs-ride="carousel">

        <!-- Indicators/dots -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
        </div>

        <!-- The slideshow/carousel -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="Images/1.jpg" alt="Los Angeles" class="d-block w-100">
                <div class="carousel-caption">
                    <h3>Sunrise</h3>
                    <p>Chúng tôi biết bạn muốn gì</p>
                    <div class="btn">
                        <a href="#about">Lear more</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="Images/2.jpg" alt="Chicago" class="d-block w-100">
                <div class="carousel-caption">
                    <h3>Sunrise</h3>
                    <p>Chúng tôi biết bạn cần gì</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="Images/3.jpg" alt="New York" class="d-block w-100">
                <div class="carousel-caption">
                    <h3>Sunrise</h3>
                    <p>Chúng tôi biết bạn thích gì</p>
                </div>
            </div>
        </div>



        <!-- Left and right controls/icons -->
        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    <div class="container-fluid bg-warning">
        <a href="#rooms">
            <h2 class="text-center mb-0" style="height: 100px;line-height: 100px;color:black">Đặt phòng ngay</h2>

        </a>
    </div>

    <div id="about">
        <div class="container text-center">
            <h3>Giới thiệu về Sunrise</h3>
            <p>
                Được thành lập năm 2022, Sunrise là một trong những khách sạn hàng đầu tại Việt Nam. Với hệ thống phòng
                nghỉ hiện đại, tiện nghi, chúng tôi cam kết mang đến cho quý khách những trải nghiệm tuyệt vời nhất.
            </p>
            <img src="Images/1.jpg" alt="Los Angeles" class="d-block w-100">
        </div>
    </div>

    <div id="services" style="background-color:rgb(223, 225, 228);">
        <div class="container text-center">
            <h3>Tiện ích</h3>
            <div class="row">
                <div class="col-md-6 service">
                    <div class="advantage-block">
                        <i class="fa fa-credit-card text-center" aria-hidden="true"></i>
                        <h4 class="text-center">Ở trước, trả sau</h4>
                        <div class="content text-start">

                            <p>
                                Sunrise cung cấp dịch vụ ở trước, trả sau, giúp quý khách có thể trải nghiệm dịch vụ mà
                                không cần lo lắng về việc thanh toán.
                            </p>
                            <p><i class="fa fa-check" aria-hidden="true"></i>Phòng trang trí hiện đại, đầy đủ tiện nghi
                            </p>
                            <p><i class="fa fa-check" aria-hidden="true"></i>Ban công riêng</p>
                        </div>


                    </div>
                </div>
                
                <div class="col-md-6 service ">
                    <div class="advantage-block">
                        <i class="fa-solid fa-clock text-center" aria-hidden="true"></i>
                        <h4 class="text-center">Hoạt động 24/7</h4>
                        <div class="content text-start">
                            <p>
                                Sunrise hoạt động 24/7, giúp quý khách có thể sử dụng dịch vụ bất cứ lúc nào.
                            </p>
                            <p><i class="fa fa-check" aria-hidden="true"></i>Đặt phòng 24/7</p>
                            <p><i class="fa fa-check" aria-hidden="true"></i>Dịch vụ ăn uống 24/7</p>
                        </div>

                    </div>
                </div>
                <div class="clearfix"> </div>

            </div>

        </div>
    </div>
    <!-- ----------------------------------------------------- -->
    <div id="team">
        <div class="container mt-3">
            <h3 class="text-center">Đội ngũ</h3>
            <br>
            <!-- Nav pills -->
            <div class="nav row mx-auto" role="tablist" style="width: 70%">

                <li class="nav-item col">
                    <a class="nav-link active" data-bs-toggle="pill" href="#teams1">
                        <img src="Images/teams1.jpg" alt="" class="rounded-circle mx-auto d-block ">
                    </a>
                </li>
                <li class="nav-item col">
                    <a class="nav-link" data-bs-toggle="pill" href="#teams2">
                        <img src="Images/teams2.jpg" alt="" class="rounded-circle mx-auto d-block">
                    </a>
                </li>
                <li class="nav-item col">
                    <a class="nav-link" data-bs-toggle="pill" href="#teams3">
                        <img src="Images/teams3.jpg" alt="" class="rounded-circle mx-auto d-block">
                    </a>
                </li>


            </div>

            <!-- Tab panes -->
            <div class="tab-content">
                <div id="teams1" class="container tab-pane active"><br>
                    <div class="row content">
                        <div class="col-4">
                            <img src="Images/teams1.jpg" alt="" class="w-100">
                        </div>
                        <div class="col-8 text-start">
                            <h4 class="name-person">Trần Trung Kiên</h4>
                            <p class="position">Quản lý</p>
                            <p class="description">
                                Với kinh nghiệm nhiều năm trong ngành khách sạn, tôi muốn khách sạn Sunrise được quản lý
                                hiệu quả nhất, mang lại trải nghiệm tuyệt vời nhất cho quý khách.
                            </p>
                            <div class="social d-inline-block">
                                <ul class="nav">
                                    <li class="nav-item"><a class="nav-link" href="#"><i class="fab fa-facebook"></i></a></li>
                                    <li class="nav-item"><a class="nav-link" href="#"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li class="nav-item"><a class="nav-link" href="#"><i class="fab fa-linkedin"></i></a></li>
                                    <li class="nav-item"><a class="nav-link" href="#"><i class="fab fa-youtube"></i></a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
                <div id="teams2" class="container tab-pane fade"><br>
                    <div class="row content">
                        <div class="col-4">
                            <img src="Images/teams2.jpg" alt="" class="w-100">
                        </div>
                        <div class="col-8 text-start">
                            <h4 class="name-person">Nguyễn Minh Trường</h4>
                            <p class="position">Chủ tịch</p>
                            <p class="description">
                                Là người sáng lập Sunrise, tôi muốn khách sạn trở thành điểm đến lý tưởng cho mọi du
                                khách, mang lại trải nghiệm tuyệt vời nhất.
                            </p>
                            <div class="social d-inline-block">
                                <ul class="nav">
                                    <li class="nav-item"><a class="nav-link" href="#"><i class="fab fa-facebook"></i></a></li>
                                    <li class="nav-item"><a class="nav-link" href="#"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li class="nav-item"><a class="nav-link" href="#"><i class="fab fa-linkedin"></i></a></li>
                                    <li class="nav-item"><a class="nav-link" href="#"><i class="fab fa-youtube"></i></a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
                <div id="teams3" class="container tab-pane fade"><br>
                    <div class="row content">
                        <div class="col-4">
                            <img src="Images/teams3.jpg" alt="" class="w-100">
                        </div>
                        <div class="col-8 text-start">
                            <h4 class="name-person">Hoàng Xuân Vinh</h4>
                            <p class="position">Giám đốc</p>
                            <p class="description">
                                Gắn bó với khách sạn từ lúc còn là ý tưởng, tôi muốn Sunrise trở thành điểm đến cho mọi
                                du khách.
                            </p>
                            <div class="social d-inline-block">
                                <ul class="nav">
                                    <li class="nav-item"><a class="nav-link" href="#"><i class="fab fa-facebook"></i></a></li>
                                    <li class="nav-item"><a class="nav-link" href="#"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li class="nav-item"><a class="nav-link" href="#"><i class="fab fa-linkedin"></i></a></li>
                                    <li class="nav-item"><a class="nav-link" href="#"><i class="fab fa-youtube"></i></a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ----------------------------------------------------- -->

    <!-- <div id="team">
        <div class="container">
            <h3>Our Team</h3>
            <div class="row img-team p-lg-5">
                <div class="col-md-3">
                    <img src="Images/1.jpg" alt="Los Angeles" class="d-block w-100 img-thumbnail rounded-circle">
                </div>
                <div class="col-md-3">
                    <img src="Images/2.jpg" alt="Los Angeles" class="d-block w-100 img-thumbnail rounded-circle">
                </div>
                <div class="col-md-3">
                    <img src="Images/3.jpg" alt="Los Angeles" class="d-block w-100 img-thumbnail rounded-circle">
                    <h4>John Doe</h4>
                    <p>CEO</p>
                </div>
                <div class="col-md-3">
                    <img src="Images/3.jpg" alt="Los Angeles" class="d-block w-100 img-thumbnail rounded-circle">
                </div>
            </div>

            <div class="row content">
                <div class="col-4">
                    <img src="Images/1.jpg" alt="" class="w-100">
                </div>
                <div class="col-8 text-start">
                    <p class="name-person">Lucas Jimenez</p>
                    <p class="position">Manager</p>
                    <p class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos
                        voluptates. Quisquam, quos voluptates.</p>
                    <div class="social d-inline-block">
                        <ul class="nav">
                            <li class="nav-item"><a class="nav-link" href="#"><i class="fab fa-facebook"></i></a></li>
                            <li class="nav-item"><a class="nav-link" href="#"><i class="fab fa-twitter"></i></a></li>
                            <li class="nav-item"><a class="nav-link" href="#"><i class="fab fa-instagram"></i></a></li>
                            <li class="nav-item"><a class="nav-link" href="#"><i class="fab fa-linkedin"></i></a></li>
                            <li class="nav-item"><a class="nav-link" href="#"><i class="fab fa-youtube"></i></a></li>
                        </ul>
            
                    </div>
                </div>
            </div>
            
        </div>


    </div> -->

    <div id="gallery">
        <div class="container-fluid text-center">
            <h3>Thư viện ảnh</h3>
            <div class="row">
                <div class="col-s-6 col-md-4 col-lg-3">
                    <img src="Images/g1.jpg" alt="Los Angeles" class="d-block w-100">
                </div>
                <div class="col-s-6 col-md-4 col-lg-3">
                    <img src="Images/g2.jpg" alt="Los Angeles" class="d-block w-100">
                </div>
                <div class="col-s-6 col-md-4 col-lg-3">
                    <img src="Images/g3.jpg" alt="Los Angeles" class="d-block w-100">
                </div>
                <div class="col-s-6 col-md-4 col-lg-3">
                    <img src="Images/g4.jpg" alt="Los Angeles" class="d-block w-100">
                </div>


                <div class="col-s-6 col-md-4 col-lg-3">
                    <img src="Images/g5.jpg" alt="Los Angeles" class="d-block w-100">
                </div>
                <div class="col-s-6 col-md-4 col-lg-3">
                    <img src="Images/g6.jpg" alt="Los Angeles" class="d-block w-100">
                </div>
                <div class="col-s-6 col-md-4 col-lg-3">
                    <img src="Images/g7.jpg" alt="Los Angeles" class="d-block w-100">
                </div>
                <div class="col-s-6 col-md-4 col-lg-3">
                    <img src="Images/g8.jpg" alt="Los Angeles" class="d-block w-100">
                </div>


                <div class="col-s-6 col-md-4 col-lg-3">
                    <img src="Images/g9.jpg" alt="Los Angeles" class="d-block w-100">
                </div>
                <div class="col-s-6 col-md-4 col-lg-3">
                    <img src="Images/g10.jpg" alt="Los Angeles" class="d-block w-100">
                </div>
                <div class="col-s-6 col-md-4 col-lg-3">
                    <img src="Images/g2.jpg" alt="Los Angeles" class="d-block w-100">
                </div>
                <div class="col-s-6 col-md-4 col-lg-3">
                    <img src="Images/g3.jpg" alt="Los Angeles" class="d-block w-100">
                </div>
            </div>



        </div>

        <!-- Thêm các dòng khác tùy ý -->

    </div>

    <div id="rooms">
        <div class="container txt">
            <h3 class="text-center">Các loại phòng</h3>
            <div class="row">
                <div class="col-md-3 card mt-3">
                    <img src="Images/r1.jpg" alt="Los Angeles" class="card-img-top w-100">
                    <div class="card-body">
                        <h4 class="card-title roomType">Phòng Standard </h4>
                        <p class="card-text roomPrice">Giá: 100</p>
                        <p class="card-text roomDecrip">
                            Phòng gồm 1 gường, 1 phòng tắm, 1 ban công riêng, đồ dùng cơ bản
                        </p>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalOrderOnline">Đặt ngay</button>

                    </div>

                </div>
                <div class="col-md-3 card mt-3">
                    <img src="Images/r2.jpg" alt="Los Angeles" class="card-img-top w-100">
                    <div class="card-body">
                        <h4 class="card-title roomType">Phòng Deluxe</h4>
                        <p class="card-text roomPrice">Giá: 200</p>
                        <p class="card-text roomDecrip">
                            Phòng gồm 1 gường, 1 phòng tắm, 1 ban công riêng, đồ dùng cơ bản, view đẹp, phòng rộng
                        </p>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalOrderOnline">Đặt ngay</button>

                    </div>

                </div>
                <div class="col-md-3 card mt-3">
                    <img src="Images/r3.jpg" alt="Los Angeles" class="card-img-top w-100">
                    <div class="card-body">
                        <h4 class="card-title roomType">Phòng Suit</h4>
                        <p class="card-text roomPrice">Giá: 300</p>
                        <p class="card-text roomDecrip">
                            Phòng gồm 1 phòng ngủ, 2 gường, 1 phòng tắm, view đẹp, đồ dùng đầy đủ, phòng rộng
                        </p>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalOrderOnline">Đặt ngay</button>

                    </div>

                </div>
                <div class="col-md-3 card mt-3">
                    <img src="Images/r4.jpg" alt="Los Angeles" class="card-img-top w-100">
                    <div class="card-body">
                        <h4 class="card-title roomType">Phòng Master</h4>
                        <p class="card-text roomPrice">Giá: 400</p>
                        <p class="card-text roomDecrip">
                            Phòng gồm 2 phòng ngủ, 2 gường, 2 phòng tắm, view đẹp, đồ dùng đầy đủ, phòng rộng
                        </p>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalOrderOnline">Đặt ngay</button>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <div id="visitor-review">
        <div class="container-fluid px-0">
            <h3>Những trải nghiệm của khách hàng</h3>
            <div id="demo" class="carousel slide" data-bs-ride="carousel">

                <!-- Indicators/dots -->
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                </div>

                <!-- The slideshow/carousel -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-md-6 ">
                                <img src="Images/5.jpg" alt="" class="w-100">
                                <div class="img-human">
                                    <img src="Images/c1.jpg" alt="" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="detail-review">
                                    <h4>
                                        <ul class="stars">
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>

                                        </ul>

                                        Tuyệt vời


                                    </h4>
                                    <p class="review">
                                        Mình đã đến Sunrise 2 lần và cảm thấy rất hài lòng với dịch vụ ở đây. Phòng sạch
                                        sẽ.
                                    </p>
                                    <div class="visitor">
                                        <h4 class="name">Hoài Xuân</h4>
                                        <p class="country">Hà Nội</p>
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-6 ">
                                <img src="Images/5.jpg" alt="" class="w-100">
                                <div class="img-human">
                                    <img src="Images/c2.jpg" alt="" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="detail-review">
                                    <h4>
                                        <ul class="stars">
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>


                                        </ul>
                                        Không thể hài lòng hơn
                                    </h4>
                                    <p class="review">
                                        Phòng ở đây rất đẹp, view đẹp, nhân viên thân thiện, dễ thương. Mình sẽ quay lại
                                        lần nữa.
                                    </p>
                                    <div class="visitor">
                                        <h4 class="name">Minh Tuấn</h4>
                                        <p class="country">Bắc Ninh</p>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="carousel-item ">
                        <div class="row">
                            <div class="col-md-6 ">

                                <img src="Images/5.jpg" alt="" class="w-100">
                                <div class="img-human">
                                    <img src="Images/c3.jpg" alt="" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="detail-review">
                                    <h4>
                                        <ul class="stars">
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>

                                        </ul>

                                        Quá hài lòng

                                    </h4>
                                    <p class="review">
                                        Lần đầy mình đến qua lời giới thiệu của bạn bè và mình thực sự rất hài lòng với
                                        dịch vụ ở đây.
                                    </p>
                                    <div class="visitor">
                                        <h4 class="name">Thúy Quỳnh</h4>
                                        <p class="country">Thái Bình</p>
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>

                <!-- Left and right controls/icons -->
                <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>

    </div>

    <div id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-6 contact-form ">
                    <form id="form-register">
                        <h4 class="text-center">Đăng ký</h4>
                        <p class="text-center" style="color:ffce14;">Đăng ký để nhận ưu đãi</p>
                        <label for="name" class="form-label">Họ tên</label>
                        <input type="text" id="name" class="form-control" name="name" required>
                        <label for="tel" class="form-label">Số điện thoại</label>
                        <input type="tel" class="form-control" id="tel" name="phone" required>
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" class="form-control" name="email" required>
                        <button type="button"class="btn btn-primary mt-3" name="submit1">Gửi</button>
                    </form>
                    
                </div>
                <div class="col-md-6 information">
                    <h4 class="text-center">Liên hệ</h4>
                    <p><strong class="title" style="color:ffce14;">SĐT:</strong> +84966668888</p>
                    <p><strong class="title" style="color:ffce14;">Địa chỉ: </strong> 68 Hàng Bài Hoàn Kiếm Hà Nội</p>
                    <p><strong class="title" style="color:ffce14;">Email: </strong><a href="mailto:info@sunrise.com">INFO@SUNRISE.COM</a></p>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.445910641832!2d105.80788217503087!3d21.01483678063092!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab616fc2fc37%3A0x38e4a815297811b9!2zS2jDoWNoIFPhuqFuIFN1bnJpc2U!5e0!3m2!1svi!2s!4v1713772266324!5m2!1svi!2s" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>


                </div>

            </div>
        </div>

    </div>

    <footer>
        <div class="contanier-fluid">
            <p>
                <i class="fa-solid fa-copyright"></i>
                2022 Sunrise. All rights reserved.| Designed by <a href="#">BootstrapMade</a>
            </p>
        </div>
    </footer>

    <!-- Modal order-->
    <div class="modal fade" id="modalOrderOnline" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Đặt phòng</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-2" id="form-booking">
                        <div class="col-md-12">
                            <label for="inputName" class="form-label">Họ tên</label>
                            <input name="name" type="text" class="form-control" id="inputName" required>

                        </div>
                        <div class="col-md-12">
                            <label for="inputEmail4" class="form-label">Email</label>
                            <input name="email" type="text" class="form-control" id="inputEmail4" required>

                        </div>
                        <div class="col-6">
                            <label for="inputAddress" class="form-label">Số điện thoại</label>
                            <input name="phone" type="phone" class="form-control" id="inputAddress" required>

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


                        <div class="col-12">
                            <div class="form-check d-flex align-items-center">
                                <input class="form-check-input me-2" type="checkbox" id="gridCheck" required>
                                <label class="form-check-label" for="gridCheck">
                                    Xác nhận
                                </label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button name="submit2" type="button" class="btn btn-primary" >Gửi</button>
                        </div>

                    </form>
                    

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script src="js/orderOnline.js"></script>
    <script>
        // Lưu vị trí hiện tại trước khi tải lại trang
        var scrollPosition;

        window.onload = function() {
            // Lưu vị trí hiện tại
            scrollPosition = window.scrollY;

            // Di chuyển đến vị trí đã lưu
            window.scrollTo(0, scrollPosition);
        };
        var submit1=document.querySelector('button[name="submit1"]');
        submit1.onclick=function(){
            var name=document.querySelector('#form-register input[name="name"]').value;
            var phone=document.querySelector('#form-register input[name="phone"]').value;
            var email=document.querySelector('#form-register input[name="email"]').value;
            if(name==''||phone==''||email==''){
                alert('Vui lòng nhập đầy đủ thông tin');
                return;
            }
            var data={
                name:name,
                phone:phone,
                email:email
            }
            fetch('./admin/confirmregister.php',{
                method:'POST',
                headers:{
                    'Content-Type':'application/json'
                },
                body:JSON.stringify(data)
            }).then(response=>response.text()).then(data=>{
                alert(data);
            })

        }
        var submit2=document.querySelector('button[name="submit2"]');
        submit2.onclick=function(){
            var name=document.querySelector('#form-booking input[name="name"]').value;
            var phone=document.querySelector('#form-booking input[name="phone"]').value;
            var email=document.querySelector('#form-booking input[name="email"]').value;
            var checkin=document.querySelector('#form-booking input[name="checkin"]').value;
            var checkout=document.querySelector('#form-booking input[name="checkout"]').value;
            var roomType=document.querySelector('#form-booking input[name="roomType"]').value;
            if(name==''||phone==''||email==''||checkin==''||checkout==''){
                alert('Vui lòng nhập đầy đủ thông tin');
                return;
            }
            var data={
                name:name,
                phone:phone,
                email:email,
                checkin:checkin,
                checkout:checkout,
                roomType:roomType
            }
            fetch('./admin/submitbookingonline.php',{
                method:'POST',
                headers:{
                    'Content-Type':'application/json'
                },
                body:JSON.stringify(data)
            }).then(response=>response.text()).then(data=>{
                alert(data);
            })

        }

    </script>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script> -->
</body>

</html>