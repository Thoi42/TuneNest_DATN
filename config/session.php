<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Trình Lưu Trữ Phiên Mặc Định
    |--------------------------------------------------------------------------
    |
    | Tùy chọn này xác định trình lưu trữ phiên mặc định được sử dụng cho
    | các yêu cầu đến. Laravel hỗ trợ nhiều tùy chọn lưu trữ để
    | lưu trữ dữ liệu phiên. Lưu trữ trong cơ sở dữ liệu là một lựa chọn mặc định tuyệt vời.
    |
    | Các tùy chọn hỗ trợ: "file", "cookie", "database", "apc",
    |            "memcached", "redis", "dynamodb", "array"
    |
    */

    'driver' => env('SESSION_DRIVER', 'database'),

    /*
    |--------------------------------------------------------------------------
    | Thời Gian Tồn Tại của Phiên
    |--------------------------------------------------------------------------
    |
    | Tại đây bạn có thể chỉ định số phút mà bạn muốn phiên
    | được phép duy trì khi không hoạt động trước khi hết hạn. Nếu bạn muốn
    | chúng hết hạn ngay khi trình duyệt đóng lại, bạn có thể
    | chỉ định điều đó thông qua tùy chọn cấu hình expire_on_close.
    |
    */

    'lifetime' => env('SESSION_LIFETIME', 120),

    'expire_on_close' => env('SESSION_EXPIRE_ON_CLOSE', false),

      /*
    |--------------------------------------------------------------------------
    | Mã Hóa Phiên
    |--------------------------------------------------------------------------
    |
    | Tùy chọn này cho phép bạn dễ dàng chỉ định rằng tất cả dữ liệu phiên của bạn
    | nên được mã hóa trước khi được lưu trữ. Tất cả việc mã hóa được thực hiện
    | tự động bởi Laravel và bạn có thể sử dụng phiên như bình thường.
    |
    */

    'encrypt' => env('SESSION_ENCRYPT', false),

     /*
    |--------------------------------------------------------------------------
    | Vị Trí Tệp Phiên
    |--------------------------------------------------------------------------
    |
    | Khi sử dụng trình lưu trữ phiên "file", các tệp phiên sẽ được đặt
    | trên đĩa. Vị trí lưu trữ mặc định được xác định ở đây; tuy nhiên, bạn
    | có thể cung cấp một vị trí khác mà chúng nên được lưu trữ.
    |
    */

    'files' => storage_path('framework/sessions'),

    /*
    |--------------------------------------------------------------------------
    | Kết Nối Cơ Sở Dữ Liệu Phiên
    |--------------------------------------------------------------------------
    |
    | Khi sử dụng trình lưu trữ phiên "database" hoặc "redis", bạn có thể chỉ định một
    | kết nối sẽ được sử dụng để quản lý các phiên này. Kết nối này nên
    | tương ứng với một kết nối trong các tùy chọn cấu hình cơ sở dữ liệu của bạn.
    |
    */

    'connection' => env('SESSION_CONNECTION'),

    /*
    |--------------------------------------------------------------------------
    | Bảng Cơ Sở Dữ Liệu Phiên
    |--------------------------------------------------------------------------
    |
    | Khi sử dụng trình lưu trữ phiên "database", bạn có thể chỉ định bảng để
    | được sử dụng để lưu trữ các phiên. Tất nhiên, một giá trị mặc định hợp lý đã được
    | xác định cho bạn; tuy nhiên, bạn có thể thay đổi điều này sang bảng khác.
    |
    */

    'table' => env('SESSION_TABLE', 'sessions'),

   /*
    |--------------------------------------------------------------------------
    | Lưu Trữ Cache Phiên
    |--------------------------------------------------------------------------
    |
    | Khi sử dụng một trong các backend phiên dựa trên cache của framework, bạn có
    | thể xác định lưu trữ cache mà nên được sử dụng để lưu trữ dữ liệu phiên
    | giữa các yêu cầu. Điều này phải khớp với một trong những lưu trữ cache đã
    | được định nghĩa của bạn.
    |
    | Ảnh hưởng đến: "apc", "dynamodb", "memcached", "redis"
    |
    */

    'store' => env('SESSION_STORE'),

    /*
    |--------------------------------------------------------------------------
    | Xổ Số Dọn Dẹp Phiên
    |--------------------------------------------------------------------------
    |
    | Một số trình lưu trữ phiên phải tự động dọn dẹp vị trí lưu trữ của chúng
    | để loại bỏ các phiên cũ khỏi lưu trữ. Đây là xác suất mà điều đó
    | sẽ xảy ra trong một yêu cầu nhất định. Theo mặc định, xác suất là 2 trên 100.
    |
    */

    'lottery' => [2, 100],

    /*
    |--------------------------------------------------------------------------
    | Tên Cookie Phiên
    |--------------------------------------------------------------------------
    |
    | Tại đây bạn có thể thay đổi tên của cookie phiên được tạo bởi
    | framework. Thông thường, bạn không cần phải thay đổi giá trị này
    | vì làm như vậy không mang lại cải thiện bảo mật có ý nghĩa.
    |
    */

    'cookie' => env(
        'SESSION_COOKIE',
        Str::slug(env('APP_NAME', 'laravel'), '_').'_session'
    ),

    /*
    |--------------------------------------------------------------------------
    | Đường Dẫn Cookie Phiên
    |--------------------------------------------------------------------------
    |
    | Đường dẫn cookie phiên xác định đường dẫn mà cookie sẽ
    | được coi là có sẵn. Thông thường, đây sẽ là đường dẫn gốc của
    | ứng dụng của bạn, nhưng bạn có thể thay đổi điều này khi cần thiết.
    |
    */

    'path' => env('SESSION_PATH', '/'),

    /*
    |--------------------------------------------------------------------------
    | Miền Cookie Phiên
    |--------------------------------------------------------------------------
    |
    | Giá trị này xác định miền và các miền phụ mà cookie phiên có
    | sẵn. Theo mặc định, cookie sẽ có sẵn cho miền gốc và tất cả các miền phụ.
    | Thông thường, điều này không nên được thay đổi.
    |
    */

    'domain' => env('SESSION_DOMAIN'),

    /*
    |--------------------------------------------------------------------------
    | Cookie Chỉ Được Gửi Qua HTTPS
    |--------------------------------------------------------------------------
    |
    | Bằng cách đặt tùy chọn này thành true, cookie phiên chỉ được gửi lại
    | cho máy chủ nếu trình duyệt có kết nối HTTPS. Điều này sẽ giữ cho
    | cookie không được gửi cho bạn khi không thể thực hiện một cách an toàn.
    |
    */

    'secure' => env('SESSION_SECURE_COOKIE'),

    /*
    |--------------------------------------------------------------------------
    | Chỉ Có Quyền Truy Cập HTTP
    |--------------------------------------------------------------------------
    |
    | Việc đặt giá trị này thành true sẽ ngăn JavaScript truy cập vào
    | giá trị của cookie và cookie sẽ chỉ có thể truy cập thông qua
    | giao thức HTTP. Khả năng bạn nên vô hiệu hóa tùy chọn này là rất thấp.
    |
    */

    'http_only' => env('SESSION_HTTP_ONLY', true),

    /*
    |--------------------------------------------------------------------------
    | Cookie Same-Site
    |--------------------------------------------------------------------------
    |
    | Tùy chọn này xác định cách cookie của bạn hành xử khi có yêu cầu chéo trang
    | diễn ra, và có thể được sử dụng để giảm thiểu các cuộc tấn công CSRF. Theo mặc định,
    | chúng tôi sẽ đặt giá trị này thành "lax" để cho phép các yêu cầu chéo trang an toàn.
    |
    | Xem: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Set-Cookie#samesitesamesite-value
    |
    | Hỗ trợ: "lax", "strict", "none", null
    |
    */

    'same_site' => env('SESSION_SAME_SITE', 'lax'),

    
    /*
    |--------------------------------------------------------------------------
    | Cookie Phân Vùng
    |--------------------------------------------------------------------------
    |
    | Việc đặt giá trị này thành true sẽ gán cookie cho trang chính trong
    | bối cảnh chéo trang. Cookie phân vùng được trình duyệt chấp nhận
    | khi được đánh dấu "secure" và thuộc tính Same-Site được đặt là "none".
    |
    */

    'partitioned' => env('SESSION_PARTITIONED_COOKIE', false),

];
