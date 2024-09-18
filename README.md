# Dự Án Website Kinh Doanh Thời Trang

## Giới Thiệu
Dự án **SHOPEE-PHP-LARAVEL** là một website kinh doanh thời trang được xây dựng bằng Laravel. Mục tiêu của dự án là cung cấp một nền tảng trực tuyến tiện lợi cho khách hàng để duyệt và mua sắm các sản phẩm thời trang cũng như quản lý dành cho admin

## Tính Năng
- Đăng ký và đăng nhập người dùng.
- Duyệt sản phẩm theo danh mục.
- Tìm kiếm và lọc sản phẩm.
- Thêm sản phẩm vào giỏ hàng.
- Thanh toán và quản lý đơn hàng.
- Quản lý tài khoản khách hàng.
- Quản lý blog
- Viết blog
- Comment
...

## Hướng Dẫn Cài Đặt

1. **Clone Repository**
   ```bash
   git clone https://github.com/thanhnamtechK27/SHOPEE-PHP-LARAVEL.git
   cd SHOPEE-PHP-LARAVEL
2. Cài đặt Composer Dependencies
3. Cấu hình .env:
- Tạo bản sao của tệp .env.example và đổi tên thành .env.
- Cập nhật các thông tin cấu hình cơ sở dữ liệu và các thông tin khác trong tệp .env.
5. Chạy Migrations: php artisan migrate
6. Chạy Dự Án: php artisan serve
## Cấu Trúc Thư Mục:
/app             # Chứa các mã nguồn của ứng dụng
/config          # Chứa các tệp cấu hình
/database        # Chứa các tệp migration và seeders
/public          # Chứa các tệp công khai (CSS, JS, hình ảnh)
/resources       # Chứa các tệp view và tài nguyên khác
/routes          # Chứa các tệp định nghĩa routes
/storage         # Chứa dữ liệu tạm thời và các tệp được tải lên
/tests           # Chứa các tệp kiểm thử
