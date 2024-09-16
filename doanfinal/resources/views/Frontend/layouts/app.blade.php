    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Login | E-Shopper</title>
        <link href="{{asset('Frontend/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{asset('Frontend/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('Frontend/css/prettyPhoto.css')}}" rel="stylesheet">
        <link href="{{asset('Frontend/css/price-range.css')}}" rel="stylesheet">
        <link href="{{asset('Frontend/css/animate.css')}}" rel="stylesheet">
        <link href="{{asset('Frontend/css/main.css')}}" rel="stylesheet">
        <link href="{{asset('Frontend/css/responsive.css')}}" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->       
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link type="text/css" rel="stylesheet" href="{{asset('/Frontend/css/rate.css')}}">
        <link rel="shortcut icon" href="{{asset('Frontend/images/ico/favicon.ico')}}">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('Frontend/images/ico/apple-touch-icon-144-precomposed.png')}}">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('images/ico/apple-touch-icon-114-precomposed.png')}}">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('images/ico/apple-touch-icon-72-precomposed.png')}}">
        <link rel="apple-touch-icon-precomposed" href="{{asset('Frontend/images/ico/apple-touch-icon-57-precomposed.png')}}">
       
        
    </head><!--/head-->

    <body>
        @include("Frontend.layouts.header")
            @include("Frontend.layouts.slider")
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        @include("Frontend.layouts.left-sidebar")
                    </div>
                    <section id="form"><!--form-->
                        @yield("content")
                    </section><!--/form-->
                </div>
            </div>
        </section>
        @include("Frontend.layouts.footer")

        <script src="{{asset('Frontend/js/jquery.js')}}"></script>
        <script src="{{asset('Frontend/js/price-range.js')}}"></script>
        <script src="{{asset('Frontend/js/jquery.scrollUp.min.js')}}"></script>
        <script src="{{asset('Frontend/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('Frontend/js/jquery.prettyPhoto.js')}}"></script>
        <script src="{{asset('Frontend/js/main.js')}}"></script>
        <script>
            $(document).ready(function() {
                $('#sl2').on('slide', function(e) {
                    e.preventDefault();
                    var tooltipText = $('.tooltip-inner').text().trim();
                    console.log('khoảng giá sau khi kéo:', tooltipText);

                    // Chia chuỗi tooltipText bằng ký tự ' : '
                    var tooltipArray = tooltipText.split(' : ');

                    // Kiểm tra và gửi AJAX request chỉ khi tooltipArray có đúng hai phần tử
                    if (tooltipArray.length === 2) {
                        // Gửi AJAX request
                        $.ajax({
                            method: 'POST',
                            url: '{{ route('filtered-products') }}',
                            data: {
                                '_token': '{{ csrf_token() }}',
                                'tooltipText': tooltipArray // Sử dụng tooltipArray đã chia đúng
                            },
                            success: function(response) {
                                // Xử lý kết quả trả về từ controller
                                if (response.data) {
                                    // Sử dụng hàm map để tạo HTML cho từng sản phẩm
                                    var productsHtml = response.data.map(function(product) {
                                            return `
                                                 <div class="col-md-3 col-sm-6">
                                                    <div class="single-products">
                                                        <div class="productinfo text-center">
                                                            <img src="${product.image}" alt="${product.name}" style="width: 100%; height: auto;" />
                                                            <h2>${product.price}</h2>
                                                            <p>${product.name}</p>
                                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            `;
                                    }).join('');
                                    // Hiển thị dữ liệu HTML lên view
                                    $('#products-list').html(productsHtml);
                                } else {
                                    console.error('Lỗi khi lấy dữ liệu sản phẩm.');
                                }
                            },
                            error: function(err) {
                                console.error('Lỗi khi gửi yêu cầu AJAX:', err);
                            }
                        });
                    } else {
                        console.error('Dữ liệu tooltipText không hợp lệ:', tooltipText);
                    }
                });
            });
        </script>
        @yield("js")
    </body>
    </html>