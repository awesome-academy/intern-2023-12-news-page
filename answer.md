# Chapter 1:
```
Câu 1: Có bao nhiêu cách để tạo 1 project trong laravel
- Có các cách sau:
    + Sử dụng Laravel Installer
    + Sử dụng Composer
    + Sử dụng docker
    
Câu 2: Nêu mục đích chính, ngắn gọn của các thư mục trong dự
- app: Chứa mã nguồn của ứng dụng, bao gồm các controllers, models, và các thành phần logic khác.
- bootstrap: Chứa các tập tin để khởi động ứng dụng, ví dụ như tập tin app.php để cấu hình và bắt đầu ứng dụng.
- config: Chứa các tập tin cấu hình của ứng dụng, giúp bạn tinh chỉnh các thiết lập như cơ sở dữ liệu, email, và các thiết lập khác.
- database: Chứa các tập tin liên quan đến cơ sở dữ liệu, bao gồm migrations (chuyển đổi cơ sở dữ liệu) và seeders (tạo dữ liệu mẫu).
- public: Là nơi chứa các tài nguyên như hình ảnh, các tập tin CSS, JavaScript và các tài nguyên công cộng khác.
- resources: Chứa các tài nguyên không phải mã nguồn, ví dụ như các tệp Blade (giao diện người dùng), tệp Sass, và các tài nguyên khác.
- routes: Chứa các tập tin định tuyến, xác định các URL và liên kết chúng với các controllers hoặc hành động cụ thể.
- storage: Là nơi chứa các tệp tạm thời được tạo ra bởi ứng dụng, bao gồm các tệp nhật ký và tệp tải lên.
- tests: Chứa các bài kiểm thử cho ứng dụng.
- vendor: Chứa các thư viện và gói mở rộng của bên thứ ba.
- node_modules: Chứa các gói Node.js được sử dụng cho quản lý gói và tài nguyên JavaScript.

Câu 3: Vòng đời của 1 request trong laravel
- Nhận yêu cầu (Request): Yêu cầu HTTP được gửi từ trình duyệt hoặc ứng dụng khách đến máy chủ web Laravel.
- Middleware: Yêu cầu đi qua một loạt các middleware được xác định trong tệp app/Http/Kernel.php. Middleware có thể thực hiện các tác vụ như xác thực, kiểm soát quyền truy cập, và thêm thông tin vào yêu cầu.
- Định tuyến (Routing): Hệ thống định tuyến xác định xem yêu cầu sẽ được xử lý bởi controller và hành động (action) nào.
- Controller: Controller xử lý yêu cầu, thường làm nhiệm vụ xử lý logic kinh doanh và tương tác với các model.
- Model: Nếu có thao tác với cơ sở dữ liệu, controller thường tương tác với các model để thực hiện các truy vấn cơ sở dữ liệu.
- Middleware (Sau Controller): Sau khi controller hoàn thành xử lý, yêu cầu có thể đi qua một loạt middleware khác, cung cấp cơ hội để thực hiện các tác vụ bổ sung.
- Phản hồi (Response): Controller trả về một phản hồi (response), có thể là một trang HTML, dữ liệu JSON, hoặc bất kỳ loại phản hồi nào khác.
- Middleware (Sau Response): Yêu cầu có thể đi qua một số middleware cuối cùng sau khi phản hồi đã được tạo, trước khi được gửi đến trình duyệt hoặc ứng dụng khách.
- Gửi phản hồi đến trình duyệt (Browser): Phản hồi được gửi từ máy chủ đến trình duyệt hoặc ứng dụng khách, hoàn thành quá trình xử lý yêu cầu.
```
