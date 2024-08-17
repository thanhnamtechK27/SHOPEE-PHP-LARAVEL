<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <!-- navbar section   -->

    <header class="navbar-section">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><i class="bi bi-chat"></i> Tìm việc 24h </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#home">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#services">Dịch vụ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">Thông báo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#projects">Dự án</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Kết nối</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Đăng nhập</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Đăng ký</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- hero section  -->

    <section id="home" class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12 text-content">
                    <h1>Hỗ trợ tìm việc nhanh nhất</h1>
                    <p>Chúng tôi xây dựng các chiến lược hiệu quả để giúp bạn tiếp cận công việc tiềm năng trên toàn bộ trang web.
                    </p>
                    <button class="btn"><a href="#">Tìm kiếm dự án</a></button>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <img src="images/hero-image.png" alt="" class="img-fluid">
                </div>

            </div>
        </div>
    </section>

    <!-- services section  -->

    <section class="services-section" id="services">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-md-12 col-sm-12 services">

                    <div class="row row1">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="card">
                                <img src="images/research.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h4 class="card-title">Nghiên cứu</h4>
                                    <p class="card-text">Chúng tôi xây dựng các chiến lược hiệu quả để giúp bạn tiếp cận công việc tiềm năng trên toàn bộ trang web.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="card">
                                <img src="images/brand.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h4 class="card-title">Thương hiệu</h4>
                                    <p class="card-text">Nhận diện thương hiệu đại diện cho các yếu tố hình ảnh và tài sản giúp phân biệt thương hiệu.</p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row row2">

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="card">
                                <img src="images/ux.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h4 class="card-title">UI/UX Design</h4>
                                    <p class="card-text">Dịch vụ thiết kế UI/UX tập trung vào việc tạo giao diện trực quan và lấy người dùng làm trung tâm cho các sản phẩm kỹ thuật số.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="card">
                                <img src="images/app-development.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h4 class="card-title">Phát triển</h4>
                                    <p class="card-text">Một ý tưởng được hiện thực hóa thông qua các giai đoạn khác nhau của dịch vụ, chẳng hạn như lập kế hoạch, thử nghiệm và triển khai.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6 col-md-12 col-sm-12 text-content">
                    <h3>Dịch vụ</h3>
                    <h1>Chúng tôi có thể giúp bạn giải quyết vấn đề của bạn thông qua dịch vụ của chúng tôi.</h1>
                    <p>Chúng tôi là một công ty chiến lược thương hiệu và thiết kế kỹ thuật số, xây dựng các thương hiệu quan trọng trong văn hóa với hơn mười năm kinh nghiệm.</p>
                    <button class="btn">Khám phá dịch vụ</button>
                </div>

            </div>
        </div>
    </section>

    <!-- about section  -->

    <section class="about-section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <img src="images/about.jpg" alt="" class="img-fluid">
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 text-content">
                    <h3>Chúng ta là ai</h3>
                    <h1>Cung cấp dịch vụ tìm kiểm công việc từ các thương hiệu đang phát triển.</h1>

                    <p>Công ty chúng tôi chuyên nghiên cứu, thiết kế nhận diện thương hiệu, thiết kế UI/UX, phát triển và thiết kế đồ họa. Để giúp khách hàng cải thiện hoạt động kinh doanh của họ, chúng tôi làm việc với họ trên toàn thế giới.</p>
                    <button>Xem thêm</button>
                </div>
            </div>
        </div>
    </section>

    <!-- project section  -->

    <section class="project-section" id="projects">
        <div class="container">
            <div class="row text">
                <div class="col-lg-6 col-md-12">
                    <h3>Những công việc của chung tôi</h3>
                    <h1>Dự án mới nhất của chúng tôi</h1>
                    <hr>
                </div>
                <div class="col-lg-6 col-md-12">
                    <p>Chúng tôi xây dựng sản phẩm gần gũi với trái tim của chúng tôi. Chúng tôi thực sự biến ý tưởng của bạn thành hiện thực và biến giấc mơ của bạn thành công với trải nghiệm tuyệt vời.</p>
                </div>
            </div>
            <div class="row project">

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card">
                        <img src="images/project1.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="text">
                                <h4 class="card-title">SaaS Website</h4>
                                <p class="card-text">Development. Jan 19,2022</p>
                                <button>Xem dự án</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card">
                        <img src="images/project2.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="text">
                                <h4 class="card-title">Travel Website</h4>
                                <p class="card-text">UI/UX Jun 29,2023</p>
                                <button>Xem dự án</button>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card">
                        <img src="images/project3.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="text">
                                <h4 class="card-title">Travel Website</h4>
                                <p class="card-text">UI/UX Aug 9,2021</p>
                                <button>Xem dự án</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card">
                        <img src="images/project4.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="text">
                                <h4 class="card-title">SaaS Website</h4>
                                <p class="card-text">Development. May 25 ,2022</p>
                                <button>Xem dự án</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- contact section  -->

    <section class="contact-section" id="contact">
        <div class="container">

            <div class="row gy-4">

                <h1>Liên hệ </h1>
                <div class="col-lg-6">

                    <div class="row gy-4">
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bi bi-geo-alt"></i>
                                <h3>Địa chỉ</h3>
                                <p>A108 Quang Trung,<br>Hai Chau, 535022</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bi bi-telephone"></i>
                                <h3>Số điện thoại</h3>
                                <p>+91 9876545672<br>+91 8763456243</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bi bi-envelope"></i>
                                <h3>Email </h3>
                                <p>timkiemviec24h@gmail.com<br>timkiemviec24h@gmail.com</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bi bi-clock"></i>
                                <h3>Mở cửa</h3>
                                <p>Monday - Friday<br>9:00AM - 05:00PM</p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6 form">
                    <form action="contact.php" method="POST" class="php-email-form">
                        <div class="row gy-4">

                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Tên của bạn" required>
                            </div>

                            <div class="col-md-6 ">
                                <input type="email" class="form-control" name="email" placeholder="Email của bạn" required>
                            </div>

                            <div class="col-md-12">
                                <input type="text" class="form-control" name="nickname" placeholder="nickname" required>
                            </div>

                            <div class="col-md-12">
                                <textarea class="form-control" name="message" rows="5" placeholder="Ghi chú"
                                    required></textarea>
                            </div>

                            <div class="col-md-12 text-center">
                                <button type="submit" name="submit">Gửi tin nhắn</button>
                            </div>

                        </div>
                    </form>

                </div>

            </div>

        </div>
    </section>

    <!-- footer section  -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12">
                    <p class="logo"><i class="bi bi-chat"></i> Tìm việc 24h</p>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <ul class="d-flex">
                        <li><a href="#">Trang chủ</a></li>
                        <li><a href="#">Dịch vụ</a></li>
                        <li><a href="#">Dự án</a></li>
                        <li><a href="#">Kết nối</a></li>
                        <li><a href="#">Đăng ký</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-12 col-sm-12">
                    <p>&copy;2023_ThanhNamDev</p>
                </div>

                <div class="col-lg-1 col-md-12 col-sm-12">
                    <!-- back to top  -->

                    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                            class="bi bi-arrow-up-short"></i></a>
                </div>

            </div>

        </div>

    </footer>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>