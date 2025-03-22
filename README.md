# Hệ thống website đăng tin tuyển dụng và tìm kiếm việc tích hợp công cụ tạo CV

## Phạm vi dự án

-   Công nghệ:  PHP, Laravel, Bootstap 5, MySQL...

-   Mô tả: Là một website thương mại điện tử bán giày và phụ kiện tích hợp thanh toán online.


#### 🧑‍💼 Chức Năng Khách Hàng
- 🔹 Đăng ký, đăng nhập (Tài khoản & Google)
- 🔹 Quản lý tài khoản (Quên mật khẩu, đổi mật khẩu, địa chỉ...)
- 🔹 Quản lý đơn hàng (Chờ thanh toán, Chờ xác nhận, Đang giao...)
- 🔹 Danh sách sản phẩm, bài viết
- 🔹 Lọc sản phẩm (Danh mục, loại, giá tăng - giảm, A-Z, Z-A)
- 🔹 Xem chi tiết sản phẩm, yêu thích sản phẩm
- 🔹 Bình luận, đánh giá sản phẩm
- 🔹 Giỏ hàng (Hỗ trợ mã giảm giá)
- 🔹 Đặt hàng (Tùy chọn nhiều địa chỉ khác nhau)
- 🔹 Thanh toán (COD, VNPAY, MOMO)
- 🔹 Gửi email thông báo sau khi đặt hàng & đăng ký tài khoản
- 🔹 Xem chi tiết trạng thái đơn hàng
- 🔹 In hóa đơn (PDF)

---

#### 🔧 Chức Năng Quản Trị Viên
- 🔹 Quản lý sản phẩm, danh mục
- 🔹 Quản lý bài viết, danh mục
- 🔹 Quản lý mã giảm giá
- 🔹 Quản lý tài khoản (Admin, khách hàng)
- 🔹 Quản lý menu, banner giới thiệu
- 🔹 Phân quyền người dùng theo vai trò (Xem chi tiết trong video)
- 🔹 Thống kê doanh thu (Hôm nay, 7 ngày qua, tháng trước...)
- 🔹 Xuất báo cáo doanh thu (Excel)


#### 🌐 Webdemo: https://shoes.themedemo.site/

#### 🔧 Quản Trị Viên: https://shoes.themedemo.site/admin/login

#### Tài khoản

-   Admin: admin@gmail.com - admin123456
-   Khách hàng: khachhang@gmail.com - 123456


<img src="https://raw.githubusercontent.com/khoait03/shoes-shop/main/public/demo/home.png" alt="Ecommerce" width="900">

<img src="https://raw.githubusercontent.com/khoait03/shoes-shop/main/public/demo/admin-products.png" alt="Ecommerce" width="900">



## Cài đặt

Để cài đặt dự án, bạn cần thực hiện các bước sau:

1. Clone repository

2. Cài đặt các phụ thuộc:

    ```bash
    composer install 
   
    ```

3. Tạo file .env:

    ```bash
    cp .env.example .env

    ```

4. Cấu hình file .env:
   Mở file .env và cấu hình các thông số kết nối cơ sở dữ liệu, ứng dụng, và các thông tin khác cần thiết cho dự án.

5. Tạo khóa ứng dụng:

    ```bash
    php artisan key:generate

    ```

6. Chạy migration:

    ```bash
    php artisan migrate

    ```

7. Chạy seeder:

    ```bash
    php artisan db:seed

    ```

8. Run project:

    ```bash
    php artisan serve

    ```

9. Truy cập vào đường dẫn để xem ứng dụng:
    ```bash
    http://127.0.0.1:8000/
    ```

## 📜 Copyright Notice

© 2024 Nguyen Le Anh Khoa. All rights reserved.

This project and its contents are protected under copyright law. Unauthorized copying, distribution, or modification of any part of this project without prior written permission from the author is strictly prohibited.

For inquiries, please contact:  
📞 Phone: 0336216546  
📧 Email: [khoacntt2003@gmail.com](mailto:khoacntt2003@gmail.com), [nguyenleanhkhoa.dev@gmail.com](mailto:nguyenleanhkhoa.dev@gmail.com)  
