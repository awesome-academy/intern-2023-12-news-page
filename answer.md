# Chapter 1:

```
Câu 1: Có bao nhiêu cách để tạo 1 project trong laravel
- Có các cách sau:
    + Sử dụng Laravel Installer
    + Sử dụng Composer
    + Sử dụng Docker
    
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
- Middleware: Yêu cầu đi qua một loạt các middleware được xác định trong tệp 
app/Http/Kernel.php. Middleware có thể thực hiện các tác vụ như xác thực, kiểm soát quyền truy cập, và thêm thông tin vào yêu cầu.
- Định tuyến (Routing): Hệ thống định tuyến xác định xem yêu cầu sẽ được xử lý bởi controller và hành động (action) nào.
- Controller: Controller xử lý yêu cầu, thường làm nhiệm vụ xử lý logic kinh doanh và tương tác với các model.
- Model: Nếu có thao tác với cơ sở dữ liệu, controller thường tương tác với các model để thực hiện các truy vấn cơ sở dữ liệu.
- Middleware (Sau Controller): Sau khi controller hoàn thành xử lý, yêu cầu có 
thể đi qua một loạt middleware khác, cung cấp cơ hội để thực hiện các tác vụ bổ sung.
- Phản hồi (Response): Controller trả về một phản hồi (response), có thể
là một trang HTML, dữ liệu JSON, hoặc bất kỳ loại phản hồi nào khác.
- Middleware (Sau Response): Yêu cầu có thể đi qua một số middleware cuối
cùng sau khi phản hồi đã được tạo, trước khi được gửi đến trình duyệt hoặc ứng dụng khách.
- Gửi phản hồi đến trình duyệt (Browser): Phản hồi được gửi từ máy chủ đến trình 
duyệt hoặc ứng dụng khách, hoàn thành quá trình xử lý yêu cầu.
```

# Chapter 2:

```
Câu 1: Migration là gì?
- Migration là một công cụ mạnh mẽ giúp quản lý và thực hiện các thay đổi trong cơ
sở dữ liệu. Mục tiêu chính của migration là duy trì tính nhất quán của cơ sở dữ liệu giữa các phiên bản của ứng dụng.

Câu 2: Hàm up() và down() trong một class migration dùng để làm gì?
- Phương thức up(): được sử dụng để định nghĩa các thay đổi bạn muốn thực hiện trên cơ sở dữ liệu khi migration được 
chạy. Thường thì các thay đổi này bao gồm việc tạo mới các bảng, thêm cột, chỉnh sửa cấu trúc, và các hoạt động khác
liên quan đến cập nhật cơ sở dữ liệu

- Phương thức down(): được sử dụng để định nghĩa các thay đổi cần được áp dụng khi bạn rollback migration. Cụ thể, down()
thường chứa các lệnh để xóa các thành phần đã được thêm vào trong phương thức up(). Điều này giúp đảm bảo tính nhất quán
của cơ sở dữ liệu khi bạn quay lại phiên bản trước của ứng dụng.

NOTE: up() có thể sử dụng xóa cột, xóa bảng, v.v..., ngược lại down có thể tạo thêm bảng, cột.

Câu 3: Nêu các câu lệnh Migration thông dụng mà bạn biết.
# php artisan make:migration create_nametable_table
# php artisan migrate 
# php artisan migrate:rollback
# php artisan migrate:refresh

Câu 4: Mass assignment là gì?
- Mass assignment xảy ra khi một lượng lớn dữ liệu được gán đồng thời cho một đối tượng (object) thông qua một phương 
thức hoặc phép gán. Điều này thường xảy ra khi người dùng gửi dữ liệu đầu vào từ một biểu mẫu web hoặc các yêu cầu HTTP khác.

Câu 5: Cách xử lý Mass assignment trong Laravel.
- Sử dụng $fillable hoặc $guarded trong model.
- Sử dụng Accessors và Mutators.
- Sử dụng Form Requests.

Câu 6: Tại sao Laravel có cả thuộc tính "fillable" và "guarded".
- "fillable": được sử dụng để liệt kê các trường cho phép mass assignment.
- "guarded": được sử dụng để liệt kê các trường không được phép mass assignment.

Câu 7: Với các thuộc tính nằm trong blacklist, ta làm như thế nào đểcập nhập trường dữ liệu đó?
- Sử dụng phương thức "update".
- Sử dụng phương thức "fill" và "save".
- Bỏ qua $guarded trong trường hợp cụ thể
```
