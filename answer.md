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

NOTE: up() có thể sử dụng để thêm cột, thêm bảng, v.v..., ngược lại down có thể thực hiện xóa bảng, cột.

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

# Chapter 3:
```
Câu 1: Kể tên các quan hệ của Laravel và phương thức tương ứng.
- One to One (hasOne - belongsTo)
- One to Many (hasMany - belongsTo)
- Many to Many (belongsToMany - belongsToMany)
- Polymorphic Relations (morphTo - morphMany)
- Many to Many Polymorphic Relations (morphedByMany - morphedByMany)
- Has Many Through
- Has One Through

Câu 2: Các hàm attach(), detach(), toggle(), sync() dùng để làm gì?
- Hàm attach() được sử dụng để thêm mối quan hệ mới vào bảng liên kết (pivot table) trong mối quan hệ nhiều-nhiều.
    // Ví dụ: Một user có nhiều vai trò
    $user = User::find(1);
    $user->roles()->attach(1); // Thêm vai trò có id là 1 cho user có id là 1
- Hàm detach() được sử dụng để xóa mối quan hệ từ bảng liên kết.
    // Ví dụ: Xóa vai trò có id là 1 khỏi user có id là 1
    $user = User::find(1);
    $user->roles()->detach(1);
- Hàm toggle() được sử dụng để thêm hoặc xóa mối quan hệ một cách tự động. Nếu mối quan hệ chưa tồn tại, nó sẽ 
thêm vào; nếu đã tồn tại, nó sẽ xóa.
    // Ví dụ: Toggle vai trò có id là 1 cho user có id là 1
    $user = User::find(1);
    $user->roles()->toggle(1);
- Hàm sync() được sử dụng để cập nhật mối quan hệ sao cho nó trở thành một tập hợp cụ thể của các khóa ngoại.
    // Ví dụ: Đồng bộ các vai trò của user có id là 1 thành [1, 2, 3]
    $user = User::find(1);
    $user->roles()->sync([1, 2, 3]);

Câu 3: Làm thế nào để lấy dữ liệu từ bảng trung gian trong quan hệ n-n.
- Sử dụng phương thức withPivot().
- Sử dụng Các Cột Pivot trong Model.
```

# Chapter 4:
```
Câu 1: Accessors/Mutators dùng để làm gì?
- Accessors: được sử dụng để chuyển đổi giá trị của một thuộc tính khi nó được truy cập.
- Mutators: được sử dụng để chuyển đổi giá trị của một thuộc tính trước khi nó được lưu vào cơ sở dữ liệu.

Câu 2: Tạo Accessors/Mutators như thế nào?
- Accessors: 
    protected function firstName(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucfirst($value),
        );
    }
- Mutators:
    protected function firstName(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => strtolower($value),
        );
    }
    
=> Kết quả trả về là 1 Attribute
Với get sẽ lấy giá trị của cột đó sau khi đi qua logic hàm.
Còn set thì sẽ đi qua logic của hàm trước khi được luu.

Câu 3: Scope dùng để làm gì?
- Scope là một cách để định nghĩa các điều kiện truy vấn thông qua các phương thức trong mô hình Eloquent. Scopes giúp bạn
 tái sử dụng logic truy vấn phổ biến và giữ mã nguồn dễ đọc và quản lý.

Câu 4: Nêu các loại scope của Laravel?:
+ Global Scopes
+ Local Scopes
```

# Chapter 5:
```
Câu 3: Seeder/Factory/Faker dùng để làm gì?
- Seeder:
+ Seeder được sử dụng để điền dữ liệu mẫu hoặc khởi tạo dữ liệu ban đầu cho cơ sở dữ liệu.
+ Thường được sử dụng khi muốn tạo dữ liệu mẫu để phát triển và kiểm thử ứng dụng.

- Factory:
+ Factory là một cách để định nghĩa các mô hình (models) mà có thể tạo ra nhanh chóng với dữ liệu mẫu.
+ Sử dụng Factory khi cần tạo ra nhiều bản ghi mẫu của một mô hình để sử dụng trong Seeder hoặc trong quá 
trình kiểm thử.

- Faker:
+  Faker là một thư viện được tích hợp trong Laravel giúp tạo dữ liệu giả mạo (fake data) một cách dễ dàng.
+ Sử dụng Faker để tạo dữ liệu giả mạo cho các trường trong mô hình đang làm việc. Điều này giúp tạo ra các
bản ghi mẫu với dữ liệu ngẫu nhiên, thích hợp để sử dụng trong quá trình phát triển và kiểm thử.

Câu 4: Khi nào nên sử dụng Seeder? Khi nào nên sử dụng Factory?
- Seeder:
+ Khởi tạo Dữ liệu Ban Đầu
+ Kiểm Thử và Phát Triển
+ Điền Cơ Sở Dữ Liệu Với Dữ Liệu Mẫu
- Factory:
+ Tạo Bản Ghi Mẫu
+ Tạo Dữ Liệu Mẫu Đa Dạng
+ Kiểm Thử và Phát Triển Linh Hoạt
```

# Chapter 6
```
Câu 1: Mô tả cấu trúc một route trong Laravel?
- HTTP Method: Là phương thức HTTP như GET, POST, PUT, DELETE, vv. Điều này xác định loại yêu cầu mà route sẽ xử lý.
- URI (Uniform Resource Identifier): Địa chỉ URL mà route sẽ phản hồi. Ví dụ, nếu bạn muốn xử lý yêu cầu đến từ
"example.com/about", thì URI sẽ là '/about'.
- Controller@action: Điều này là cặp controller và action mà route sẽ chạy khi nó được gọi. Controller là một class
chứa các phương thức (actions) để xử lý các yêu cầu, và action là phương thức trong controller đó.
- Name(Tùy chọn): giúp đặt tên cho route, và có thể sử dụng tên đó thay vì URI khi tạo liên kết hoặc chuyển hướng.

Câu 2: Kể tên các hàm trong Resources Controller và phươngthức/công dụng tương ứng.
- index: Trả về danh sách tất cả các mục
- create: Trả về giao diện để tạo mới một mục
- store: Lưu trữ một mục mới được tạo
- show: Hiển thị thông tin chi tiết của một mục
- edit: Trả về giao diện để sửa đổi thông tin của một mục
- update: Cập nhật thông tin của một mục.
- destroy: Xoá một mục
```

# Chapter 7:
```
Câu 1: Middleware dùng để làm gì?
- Kết nối và Giao tiếp: Tạo cầu nối giữa các thành phần phần mềm khác nhau, giúp chúng tương tác và truyền thông tin.
- Trung gian thông tin: Đóng vai trò là trung gian để đảm bảo truyền thông tin hiệu quả và đáng tin cậy.
- Quản lý phiên và Trạng thái: Duy trì thông tin trạng thái và quản lý phiên làm việc giữa các yêu cầu.
- Bảo mật: Cung cấp cơ chế bảo mật để bảo vệ dữ liệu khi truyền qua mạng hoặc giữa các thành phần của hệ thống.
- Quản lý Tài nguyên: Hỗ trợ quản lý tài nguyên hệ thống, bao gồm quản lý kết nối cơ sở dữ liệu và phân phối tải công 
việc.
- Tích hợp hệ thống: Kết nối và tích hợp các hệ thống và ứng dụng khác nhau.
- Quản lý Lỗi và Ghi nhật ký: Cung cấp cơ chế quản lý lỗi và ghi nhật ký để theo dõi và chẩn đoán vấn đề.
- Điều phối và Phân phối: Điều phối tác vụ giữa các thành phần, đồng bộ hóa hoạt động và phân phối công việc để tối ưu 
hiệu suất hệ thống.

Câu 2: Phân biệt Global Middleware, Group Middleware và Route Middleware
- Global Middleware:
    + Áp dụng trên mọi request.
    + Đăng ký trong $middleware của app/Http/Kernel.php.

- Group Middleware:
    + Áp dụng cho một nhóm route cụ thể.
    + Đăng ký trong $middlewareGroups của app/Http/Kernel.php.
    
- Route Middleware:
    + Áp dụng chỉ cho một hoặc một nhóm route.
    + Đăng ký trong $routeMiddleware của app/Http/Kernel.php.        
```

# Chapter 8:
```
Câu 1: Bạn biết những starter kit Authentication nào của Laravel?
- Laravel Breeze
- Laravel Jetstream
- Laravel Fortify
- Laravel Sail
- Laravel Sanctum

Câu 2: Trong quicktask bạn sử dụng starter kit nào? Khi cần customize logic thì cần sửa ở đâu?
- Laravel Breeze
- Customize các file trong Controller, Middleware, Requests trong của file app
```

# Chapter 10:
```
Câu 1: Package manager như bower, npm dùng để làm gì?
- Bower và npm thường được sử dụng cho phần front-end của dự án web. Bower quản lý thư viện JavaScript và CSS, 
trong khi npm thường được sử dụng cho các gói Node.js và công cụ front-end.

Câu 2: Tại sao chúng ta nên thực hiện compile các file CSS/SASS/JS/v.v... thay vì viết trực tiếp vào public? 
Bạn sử dụng công cụ nào của Laravel để quản lý và compile các file đó?
- Các lý do cần compile thay vì viết trực tiếp:
+ Tối ưu hóa và Tối giản hóa mã nguồn
+ Tích hợp Dễ dàng
+ Quản lý Phiên bản
+ Tích hợp Hệ thống Quản lý Gói (Package)
+ Phát triển hiệu suất
+ Quản lý Dependencies
- Laravel mix
```

# Chapter 12:
```
Câu 1: Cách hoạt động của Eloquent ORM và Query Builder
- Eloquent ORM:
+ Định nghĩa Mô hình
+ Thực hiện Truy vấn
+ Mối quan hệ

- Query Builder:
+ Tạo Truy vấn
+ Điều kiện
+ Kết hợp
+ Thực hiện Truy vấn

Câu 2: Nêu ưu/nhược điểm của chúng
* Eloquent ORM:
- Ưu điểm:
+ Dễ đọc và viết
+ Tích hợp mạnh mẽ
+ Quản lý mô hình

- Nhược điểm:
+ Hiệu suất
+ Khả năng tùy chỉnh hạn chế

* Query Builder:
- Ưu điểm:
+ Hiệu suất
+ Tích hợp linh hoạt

- Nhược điểm:
+ Khó đọc hơn
+ Khả năng mất tích hợp

Câu 3: Khi nào nên dùng Eloquent ORM hoặc Query Builder?
- Sử dụng Eloquent ORM khi:
+ Đối tượng và Mối quan hệ (Object and Relationships)
+ Lập trình hướng đối tượng (Object-Oriented Programming - OOP)
+ Tích hợp với các tính năng Laravel khác

- Sử dụng Query Builder khi:
+ Truy vấn phức tạp
+ Hiệu suất
+ Cần tích hợp với dữ liệu từ nhiều nguồn
+ Tự do tuyệt đối

Câu 4: Phân biệt Lazy loading và Eager loading
- Lazy Loading:
+ Độ trễ
+ Tải dữ liệu khi cần
+ Tiết kiệm tài nguyên, vì dữ liệu chỉ được tải khi cần thiết. Đặc biệt hữu ích khi bạn chỉ cần một phần nhỏ dữ liệu 
liên quan.
+ Tăng số lần truy vấn đến cơ sở dữ liệu khi cần truy cập nhiều đối tượng liên quan, có thể dẫn đến vấn đề N+1.

- Eager Loading:
+ Tải trước
+ Tất cả một lượt
+ Hiệu suất tốt hơn khi cần truy cập nhiều đối tượng liên quan, giảm số lần truy vấn xuống cơ sở dữ liệu.
+ Có thể làm tăng khối lượng dữ liệu được truy vấn khi không cần thiết, đặc biệt khi chỉ cần một số ít thông tin của 
đối tượng chính.

Câu 5: Phân biệt with() và load()
- with() nó sẽ thực thi ngay sau câu truy vấn đầu và khi nó gặp các phương phức dạng như get(), first(), all(), ... 
- load() thì nó sẽ chạy phương thức đầu tiên load ra các bản ghi, và load các mối quan hệ ở thời điểm sau này.
```
