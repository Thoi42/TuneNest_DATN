<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Brand;
use App\Models\ProductCategory;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $brands = Brand::all();
        $categories = ProductCategory::all();

        // Dữ liệu từ db.json
        $productsData = [
            [
                "category_id"=> 5,
                "name"=> "KAWAI ND-21",
                "image"=> "kawai-nd-21-dep-sang-trong-viet-thuong-music-450x471.jpg",
                "price"=> 99900000,
                "price_sale"=> 93000000,
                "description"=> '<h2><strong><a href="https://vietthuong.vn/dan-piano-kawai-nd-21.html">Đàn piano Kawai ND-21</a></strong> mang đến chất lượng âm thanh trong, mạnh và một sự ổn định tuyệt đối về kết cấu bề mặt bởi kỹ thuật bộ máy được sản xuất theo tiêu chuẩn của hãng Kawai – Nhật Bản.</h2>
<p>&nbsp;</p>
<p style="text-align:justify"><strong>KAWAI ND-21: GIÁ TRỊ VÔ SONG</strong></p>
<p style="text-align:justify">Kawai là một trong những nhà sản xuất piano nổi tiếng và đáng tin cậy nhất trên thế giới trong hơn 90 năm qua. Kawai Piano được biết đến là nhà sáng tạo, tiên phong đầy thiết thực với những cải tiến và ý tưởng độc đáo trong việc ứng dụng chất liệu mới, nghiên cứu mới trong chế tác Piano, nhưng vẫn luôn giữ được Giá trị Cốt lõi của mình - Sản phẩm Piano mẫu mực tiên tiến nhất.</p>
<ul>
    <li style="text-align:justify">&nbsp;Hỗ trợ đắc lực cho việc phát triển kỹ năng cảm âm</li>
    <li style="text-align:justify">&nbsp;Giúp người mới học kiểm soát lực ngón tay chính xác</li>
    <li style="text-align:justify">&nbsp;Kháng ẩm và kháng nhiệt, phù hợp với khí hậu Việt Nam</li>
    <li style="text-align:justify">&nbsp;Tuổi thọ đàn cao, tiết kiệm chi phí bảo trì</li>
    <li style="text-align:justify">&nbsp;Thiết kế Monochrome sang trọng, hài hòa với nhiều không gian</li>
</ul>
<p style="text-align:justify">&nbsp;</p>
<h2 style="text-align:justify"><img alt="" src="https://vietthuong.vn/upload/content/images/Kawai/kawai-nd-21-dep-sang-trong.jpg" style="height:667px; width:1000px"></h2>
<h3><strong>1. Thiết kế của Bản cộng hưởng (Soundboard)</strong></h3>
<p>Bản cộng hưởng Soundboard và sườn đàn là hai yếu tố quan trọng nhất làm nên âm thanh của một cây đàn piano. Bản cộng hưởng được làm từ gỗ rắn chắc, chắc chắn được lựa chọn cẩn thận và thử nghiệm một cách khoa học, để đạt tiêu chuẩn độ ngân của thanh âm tốt nhất. Nhờ đó tạo ra tiếng đàn hay hơn với âm vực chuẩn hơn.</p>
<p style="text-align:center"><img alt="" src="https://vietthuong.vn/upload/content/images/kawai-nd-21.jpg" style="height:500px; width:870px"></p>
<p>Bản cộng hưởng của đàn, độ dài của dây và số thanh gỗ xương sườn (ribs) được nâng tới mức tối đa để vượt hơn các thông số kỹ thuật của những đàn piano khác, và đem lại tiếng đàn mạnh mẽ và ngân vang hơn.&nbsp;Tấm Soundboard nằm thẳng, tạo sự đàn hồi, độ vang tốt. Có thể đàn các mức độ từ ppp (cực nhẹ) đến fff (cực mạnh) Âm thanh vang đều và thống nhất từ thấp lên cao Không có tạp âm.</p>
<p style="text-align:center"><img alt="" src="https://vietthuong.vn/upload/content/images/kawai-nd-21-1.jpg" style="height:526px; width:600px"></p>
<p>&nbsp;</p>
<h3><strong>2. Đàn Piano Kawai ND-21 với Bộ máy cực nhạy và búa đàn bền</strong></h3>
<p style="text-align:justify">Giá trị cốt lõi của Kawai ND-21 là tạo ra âm thanh tuyệt hảo, độ nhạy phím đàn, lực phản hồi từ bàn phím khi ngón tay chạm vào sẽ nhanh và nhạy hơn. Ngoài bản cộng hưởng được làm bằng gỗ vân sam rắn chắc, Kawai ND-21 còn sử dụng bộ máy đàn và búa đàn cực nhạy, kết hợp với những kỹ thuật thủ công tiên tiến trên thế giới. Nhờ đó, các nghệ sĩ piano cảm nhận được âm điệu và độ nhạy khi chạm vào từng phím đàn.</p>
<p style="text-align:center"><img alt="" src="https://vietthuong.vn/upload/content/images/kawai-nd-21-2.jpg" style="height:498px; width:600px"></p>
<p style="text-align:justify">Các thành phần cốt lõi trong bộ máy đàn được thiết kế với trọng lượng nhẹ hơn và cải tiến cấu trúc nhằm tối ưu hóa tốc độ, sự lặp lại và kiểm soát tốt hơn. Mọi chi tiết chính xác của bộ cơ được phân tích và điều chỉnh phù hợp nhằm tạo ra cảm giác thân mật giữa âm nhạc và nghệ sĩ. Độ nặng của phím đàn Kawai được so sánh với các Bộ máy cơ Upright Piano của các dòng thương hiệu cao cấp khác, giúp nghệ sĩ thực hiện các kỹ thuật piano dễ hơn và chính xác hơn.</p>
<p style="text-align:center"><img alt="" src="https://vietthuong.vn/upload/content/images/kawai-nd-21-3.jpg" style="height:413px; width:620px"></p>
<p style="text-align:justify">&nbsp;</p>
<h3><strong>3. Kawai ND-21 Kiểu dáng, thiết kế đẹp và hài hòa</strong></h3>
<p style="text-align:justify">Khác biệt với các loại nội thất khác, đàn piano luôn là điểm nhấn của sự sang trọng và quý phái. Được trang bị tinh tế với kim loại bạc và khung bảng cộng hưởng màu đen, Kawai ND-21 đã tạo được ấn tượng mang tính hiện đại nhưng vẫn tôn vinh nét đẹp văn hóa của bất kỳ không gian nào.</p>
<p style="text-align:center"><img alt="" src="https://vietthuong.vn/upload/content/images/kawai-nd-21-4.jpg" style="height:400px; width:600px"></p>
<p>Với&nbsp;kích thước upright piano phổ biến thông dụng (Cao: 121 cm; Ngang: 149 cm; Rộng: 58 cm) ND-21 sở hữu kiểu dáng trang nhã phù hợp với nhiều không gian sử dụng,&nbsp;hài hòa với mọi kiến trúc.</p>
<p style="text-align:center"><img alt="" src="https://vietthuong.vn/image/catalog/kawai/Upright/kich-thuoc-dan-piano-kawai-nd21.jpg" style="height:600px; width:600px"></p>
<h2>&nbsp;</h2>
<h3><strong>4. Chính sách bảo hành chính hãng khi mua Kawai ND-21 tại Việt Thương</strong></h3>
<p>Đảm bảo thời gian sử dụng lâu dài, không bị ảnh hưởng dưới tác động của nhiệt độ và độ ẩm của môi trường. Đàn piano Kawai ND21 được Việt Thương bảo hành 60 tháng với thời gian bảo trì như&nbsp;lên dây đàn, cân chỉnh pedal, phím đàn,... đúng thời hạn nên quý khách Yên Tâm sử dụng.</p>
<p style="text-align:center"><img alt="" src="https://vietthuong.vn/upload/content/images/Kawai/kawai-nd-21-dep-sang-trong-01.jpg" style="height:667px; width:1000px"></p>
<p><em><strong>&gt;&gt; Xem thêm những <a href="https://vietthuong.vn/dan-piano-upright.html">mẫu đàn piano cơ</a> tại cửa hàng Việt Thương Music</strong></em></p>

<form name="fOrderReview">
    <div class="left">Bạn có hài lòng với nội dung sản phẩm không?</div>
    <div class="right">
        <a id="feedback_btncg" class="good"><i class="iconfb-good"></i>Hài lòng</a>
        <a id="feedback_btncb" class="bad"><i class="iconfb-bad"></i>Không hài lòng</a>
    </div>
    <div class="clearfix"></div>
    <div id="frm_good" class="reason hidden">
        <textarea name="feedback_mg" placeholder="Bạn có góp ý gì thêm không? (không bắt buộc)" id="feedback_mg"></textarea>
        <a id="feedback_btng">Gửi góp ý</a>
    </div>
    <div class="clearfix"></div>
    <div id="frm_bad" class="reason hidden">
        <textarea name="feedback_mb" id="feedback_mb" placeholder="Điều gì khiến Bạn không hài lòng? (không bắt buộc)"></textarea>
        <div class="row_line_comment">
            <div class="item_line_comment">
                <input type="text" name="feedback_name" id="feedback_name" value="" class="input_name" placeholder="Tên*">
            </div>
            <div class="item_line_comment">
                <input type="text" name="feedback_phone" id="feedback_phone" value="" class="input_phone" placeholder="Số điện thoại*">
            </div>
        </div>
        <a id="feedback_btnb">Gửi góp ý</a>
    </div>
</form>

<h3><strong>Một số điều cần lưu ý:</strong></h3>
<ul>
    <li>Thời gian phản hồi thông thường từ 2-4 giờ trong giờ hành chính.</li>
    <li>Chúng tôi cam kết bảo mật thông tin khách hàng.</li>
</ul>
<p><strong>Cảm ơn bạn đã góp ý!</strong></p>
<p><strong>Xem thêm</strong></p>
<table border="1" cellpadding="0" cellspacing="0" style="width:100%">
    <tbody>
        <tr>
            <td><p>Bộ cơ</p></td>
            <td></td>
            <td><p>Tiêu chuẩn sản xuất của hãng Kawai – Nhật Bản</p></td>
        </tr>
        <tr>
            <td><p>Soundboard</p></td>
            <td></td>
            <td><p>Solid Spruce (Gỗ vân sam rắn chắc)</p></td>
        </tr>
        <tr>
            <td><p>Thanh gỗ sau lưng đàn</p></td>
            <td></td>
            <td><p>4 cái</p></td>
        </tr>
        <tr>
            <td><p>Bàn phím</p></td>
            <td></td>
            <td><p>Acrylic Phenol</p></td>
        </tr>
        <tr>
            <td><p>Pedal</p></td>
            <td></td>
            <td><p>3 cái (Soft, practice and sustain)</p></td>
        </tr>
        <tr>
            <td><p>Kích thước</p></td>
            <td></td>
            <td><p>Cao 121cm - Rộng 149cm - Dài 58cm</p></td>
        </tr>
        <tr>
            <td><p>Trọng lượng</p></td>
            <td></td>
            <td><p>215 kg</p></td>
        </tr>
        <tr>
            <td><p>Sản xuất</p></td>
            <td></td>
            <td><p>Indonesia</p></td>
        </tr>
    </tbody>
</table>

<iframe width="100%" height="580" src="https://www.youtube.com/embed?enablejsapi=1&amp;origin=https%3A%2F%2Fvietthuong.vn" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" data-gtm-yt-inspected-7172713_33="true" id="98271657" data-gtm-yt-inspected-22="true" title="YouTube video player"></iframe>
<!-- <div id="BSplugin0"><div> <script type="text/javascript"> jwplayer("BSplugin0").setup( { primary:"html5", width:"100%", height:"400", abouttext:"jwplayer 7", aspectratio:"16:9", image: "https://vietthuong.vn/upload/vt.png", skin:"five", sources:[{file:"", type:"mp4",label:"720"},] }); <script> -->
',
                "short_description"=> "Đàn piano Kawai ND-21 sở hữu chất lượng âm thanh mạnh mẽ, trong trẻo và cấu trúc bền vững. Đây là sự lựa chọn tuyệt vời cho người mới bắt đầu hoặc các nhạc sĩ chuyên nghiệp."
            ],
            [
                "category_id"=> 5,
                "name"=> "KAWAI K-15E",
                "image"=> "piano-kawai-k15e-450x471.jpg",
                "price"=> 91400000,
                "price_sale"=> 82000000,
                "description"=> '<h2 style="text-align:justify"><strong>Kawai K15E - Nhạc Cụ mang phong cách Âu Châu tạo ra âm thanh phong phú, trong trẻo, với chất lượng biểu diễn có thể sánh ngang với những chiếc đàn upright lớn hơn nhiều.</strong></h2>

<p style="text-align:justify">K-15E là sản phẩm tuyệt hảo để đưa khách hàng vào dòng sản phẩm K-Series cao cấp của KAWAI PIANO. Được trang bị Soundboard gỗ nguyên khối và bộ máy đàn Millenium II - ABS-Styran cực nhạy, làm cho các nghệ nhân và người chơi Piano rất yêu thích. Ngôn ngữ thiết kế theo hướng gọn gàng, thích hợp đặt trong phòng, lớp nhạc... với chất âm rõ ràng mà đầy đặn, đủ đáp lại mong muốn của người mới bắt đầu học Piano.</p>

<h3 style="text-align:justify"><strong>Một nền tảng vững chắc cho việc học Piano</strong></h3>

<p style="text-align:justify">Vào thời gian đầu lúc tập đàn, người học có thể không cần đến Grand Piano, một cây Upright là đủ đáp ứng, nhưng phải là Upright Piano đúng tiêu chuẩn kỹ thuật cao cấp, chứ không phải là một cây Upright đã gần hết niên hạn sử dụng, vì cây Piano đầu tiên để tập đàn được ví như một viên đá tảng vững chắc để xây nên một kết quả tốt nhất cho việc học.</p>

<p style="text-align:center">
    <img alt="Đàn Piano Kawai K15E" src="https://vietthuong.vn/upload/content/images/tuvanpiano_DSC9386.jpg" style="height:534px; width:800px">
</p>

<p style="text-align:justify">Để đảm bảo cho tính hiệu quả và trải nghiệm tốt nhất trong suốt quá trình học ngay từ ban đầu, người học phải có một cây Piano thực sự tin cậy, âm thanh đúng chuẩn, một cây Piano mà không chỉ hoạt động đúng theo ý muốn người chơi mà còn là sự tinh tế, thu hút theo cách có thể truyền cảm hứng cho người học, không làm cho người học nhàm chán. Đó là yếu tố quan trọng để KAWAI sản xuất ra model K-15E.</p>

<p style="text-align:center">
    <img alt="" src="https://vietthuong.vn/image/catalog/kawai/Upright/piano-kawai-k15e-01.jpg" style="height:600px; width:600px">
</p>

<p style="text-align:center"><em>Bộ máy đàn kháng ẩm kháng nhiệt, không biến dạng</em></p>

<p style="text-align:justify">K-15E có tất cả những gì mà người mới tập chơi Piano cần trong suốt quá trình học tập, dù là giải trí hay quyết định bước vào con đường chuyên ngành Âm Nhạc Cổ Điển. Một bộ máy đàn cực nhạy không bị biến dạng theo thời gian, một Soundboard nguyên khối mà không có một sản phẩm nào cùng phân khúc có được, 2 yếu tố cốt lõi để tạo nên sự thành công trong học đàn Piano.</p>

<p style="text-align:center">
    <img alt="" src="https://vietthuong.vn/image/catalog/kawai/Upright/piano-kawai-k15e-02.jpg" style="height:449px; width:600px">
</p>

<p style="text-align:center"><em>Kawai K-15E có Soundboard nguyên</em></p>

<h3 style="text-align:justify"><strong>ĐẶC ĐIỂM VƯỢT TRỘI</strong></h3>
<ul>
    <li style="text-align:justify">Exclusive ABS Styran Action Parts | Bộ máy đàn kháng ẩm kháng nhiệt, không biến dạng</li>
    <li style="text-align:justify">Solid Spruce Soundboard | Bảng Âm gỗ nguyên khối, cho ra âm thanh dày và mạnh</li>
    <li style="text-align:justify">Hard Maple Pinblock | Gỗ chốt đàn làm từ gỗ cứng, giúp dây đàn ổn định, ít xuống dây</li>
    <li style="text-align:justify">4 Back Posts | 4 trụ lưng đàn, giúp cấu trúc tổng thể vững chắc</li>
</ul>

<p style="text-align:justify">
    <strong>KẾT LUẬN:</strong><br>
    <em>Kawai K-15E có tất cả những gì mà người mới tập chơi piano cần trong suốt quá trình học tập, dù là giải trí hay quyết định bước vào con đường chuyên ngành. Một bộ máy đàn cực nhạy không bị biến dạng theo thời gian, một soundboard nguyên khối mà không có một sản phẩm nào cùng phân khúc có được, 2 yếu tố cốt lõi để tạo nên sự thành công trong học đàn piano.</em>
</p>

<form name="fOrderReview">
    <div class="left">Bạn có hài lòng với nội dung sản phẩm không?</div>
    <div class="right">
        <a id="feedback_btncg" class="good"><i class="iconfb-good"></i>Hài lòng</a>
        <a id="feedback_btncb" class="bad"><i class="iconfb-bad"></i>Không hài lòng</a>
    </div>
    <div id="frm_good" class="reason hidden">
        <textarea name="feedback_mg" placeholder="Bạn có góp ý gì thêm không? (không bắt buộc)" id="feedback_mg"></textarea>
        <a id="feedback_btng">Gửi góp ý</a>
    </div>
    <div id="frm_bad" class="reason hidden">
        <textarea name="feedback_mb" id="feedback_mb" placeholder="Điều gì khiến Bạn không hài lòng? (không bắt buộc)"></textarea>
        <div class="row_line_comment">
            <div class="item_line_comment">
                <input type="text" name="feedback_name" id="feedback_name" class="input_name" placeholder="Tên*">
            </div>
            <div class="item_line_comment">
                <input type="text" name="feedback_phone" id="feedback_phone" class="input_name" placeholder="Số điện thoại*">
            </div>
        </div>
        <a id="feedback_btnb">Gửi góp ý</a>
    </div>
    <div class="thankss hidden">Cảm ơn Bạn đã đánh giá!</div>
</form>

<p>&nbsp;</p>

<table cellspacing="0" style="width:100%">
    <tbody>
        <tr>
            <td><p>Height</p></td>
            <td><p>43.3" (110 cm)</p></td>
        </tr>
        <tr>
            <td><p>Width</p></td>
            <td><p>58.6" (149 cm)</p></td>
        </tr>
        <tr>
            <td><p>Depth</p></td>
            <td><p>23.2" (59 cm)</p></td>
        </tr>
        <tr>
            <td><p>Weight</p></td>
            <td><p>431 lbs (196 kg)</p></td>
        </tr>
        <tr>
            <td><p>Action</p></td>
            <td><p>Ultra-Responsive™ with ABS Styran Parts</p></td>
        </tr>
        <tr>
            <td><p>Hammer Felts</p></td>
            <td><p>MapleKawai-made felts</p></td>
        </tr>
        <tr>
            <td><p>Soundboard</p></td>
            <td><p>Solid Spruce</p></td>
        </tr>
        <tr>
            <td><p>Back Posts</p></td>
            <td><p>Four, Fully Laminated</p></td>
        </tr>
        <tr>
            <td><p>Pedals</p></td>
            <td><p>Damper, Practice, Soft</p></td>
        </tr>
        <tr>
            <td><p>Finishes</p></td>
            <td><p>Polished Ebony, Polished Mahogany, Snow White</p></td>
        </tr>
    </tbody>
</table>

<iframe width="100%" height="580" src="https://www.youtube.com/embed?enablejsapi=1&amp;origin=https%3A%2F%2Fvietthuong.vn" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
',
                "short_description"=> "Đàn piano Kawai K-15E, một sản phẩm xuất sắc giúp người dùng tiếp cận dòng K-Series cao cấp. Thiết kế tinh tế, âm thanh chuẩn xác."
            ],
            [
                "category_id"=> 5,
                "name"=> "KAWAI K-300",
                "image"=> "dan-piano-kawai-k300-mau-den-sang-trong-450x471.jpg",
                "price"=> 194700000,
                "price_sale"=> 182000000,
                "description"=> '<h2 style="text-align: justify;">
  <strong><a href="https://vietthuong.vn/dan-piano-kawai-k300.html">Đàn piano Kawai K300</a></strong> là sản phẩm tiêu biểu trong dòng K series của Kawai. Tiếp nối sự thành công của piano Kawai K3, model K3 đã đạt danh hiệu “Piano Acoustic” của năm trong 4 năm liên tiếp (2008 – 2011) do độc giả của tạp chí MMR tại Mỹ bình chọn.
</h2>

<p style="text-align: center;">
  <img src="https://vietthuong.vn/upload/content/images/Kawai/dan-piano-kawai-k300-mau-den-sang-trong.jpg" alt="Piano Kawai K300" style="height: 540px; width: 600px;">
</p>

<p style="text-align: justify;">
  Mời bạn tham khảo video review sản phẩm đàn piano Kawai K300 để có thêm thông tin:
</p>
<p style="text-align: center;">
  <iframe frameborder="0" height="380" src="https://www.youtube.com/embed/Lf3hS2fBQwg?enablejsapi=1&origin=https%3A%2F%2Fvietthuong.vn" width="600" title="Review Đàn Piano Kawai K300 | Thương hiệu piano Nhật Bản"></iframe>
</p>

<h3><strong>1. Cảm ứng phím đàn piano Kawai K300</strong></h3>
<p style="text-align: justify;">
  Sự hoạt động ổn định lâu dài của độ cảm ứng phím chỉ đạt được nhờ thiết kế thông minh cùng phương pháp và vật liệu tiên tiến.
</p>

<p style="text-align: center;">
  <img src="https://vietthuong.vn/upload/content/images/Kawai/Bo-may-dan-piano-kawai-Millennium-III-tong-the.jpg" alt="Bộ máy đàn piano Millennium III" style="height: 503px; width: 600px;">
</p>

<h4><strong>Bộ cơ đàn upright piano Millennium III</strong></h4>
<p style="text-align: justify;">
  Bộ phận của bộ máy cơ Millennium III được làm bằng ABS - Carbon, chất liệu tổng hợp từ sợi carbon và ABS styran, giúp bộ máy cơ hoạt động mạnh mẽ và ổn định hơn.
</p>

<p style="text-align: center;">
  <img src="https://vietthuong.vn/upload/content/images/Kawai/Bo-may-dan-piano-kawai-Millennium-III.jpg" alt="Bộ cơ Millennium III" style="height: 400px; width: 600px;">
</p>

<h4><strong>Giá đỡ bộ cơ bằng nhôm đúc áp lực</strong></h4>
<p style="text-align: justify;">
  Giá đỡ bộ cơ của piano Kawai K300 được đúc bằng nhôm và tạo độ vững chắc, tính ổn định cao.
</p>

<p style="text-align: center;">
  <img src="https://vietthuong.vn/upload/content/images/Kawai/gia-do-bo-co-bang-nhom-duc-ap-luc.jpg" alt="Giá đỡ bộ cơ bằng nhôm" style="height: 623px; width: 600px;">
</p>

<h4><strong>Độ dài phím đàn piano Kawai K300 được tăng thêm</strong></h4>
<p style="text-align: justify;">
  Độ dài phím được tăng để tạo ra phản ứng tốt từ gốc trong đến cạnh ngoài của bề mặt hoạt động phím.
</p>

<p style="text-align: center;">
  <img src="https://vietthuong.vn/upload/content/images/Kawai/do-dai-phim-dan-kawai-kseries-duoc-tang-them.jpg" alt="Độ dài phím đàn piano Kawai K300" style="height: 361px; width: 600px;">
</p>

<h3><strong>2. Âm thanh đàn piano Kawai K300</strong></h3>
<h4><strong>Bảng cộng hưởng bằng gỗ vân sam nguyên tấm gọt thon</strong></h4>
<p style="text-align: justify;">
  Bản cộng hưởng của piano Kawai K300 được làm từ gỗ vân sam cao cấp, giúp âm thanh vang rền và đầy đặn.
</p>

<p style="text-align: center;">
  <img src="https://vietthuong.vn/upload/content/images/Kawai/bang-cong-huong-go-van-sam-nguyen-khoi-kawai-k-series.jpg" alt="Bảng cộng hưởng gỗ vân sam" style="height: 227px; width: 600px;">
</p>

<h4><strong>Búa đàn với ghim hình chữ T và lõi gỗ gụ bọc nỉ hai bên</strong></h4>
<p style="text-align: justify;">
  Búa đàn piano dòng K sử dụng gỗ gụ nhẹ và nhạy, cùng lớp nỉ bọc dày giúp tạo âm thanh tuyệt vời.
</p>

<p style="text-align: center;">
  <img src="https://vietthuong.vn/upload/content/images/Kawai/bua-dan-piano-kawai-k-series.jpg" alt="Búa đàn piano Kawai K300" style="height: 497px; width: 600px;">
</p>

<h4><strong>Ngựa đàn piano</strong></h4>
<p style="text-align: justify;">
  Ngựa đàn truyền rung động dây đến bản cộng hưởng, giúp âm thanh mạnh mẽ và rõ ràng.
</p>

<p style="text-align: center;">
  <img src="https://vietthuong.vn/upload/content/images/Kawai/ngua-dan-piano-kawai-kseries.jpg" alt="Ngựa đàn piano Kawai K300" style="height: 372px; width: 600px;">
</p>

<h4><strong>Thanh viền phản âm Kawai K-300</strong></h4>
<p style="text-align: justify;">
  Thanh viền phản âm hỗ trợ âm thanh vang và khuyếch đại, tăng hiệu quả phát âm.
</p>

<p style="text-align: center;">
  <img src="https://vietthuong.vn/upload/content/images/Kawai/thanh-vien-phan-am-dan-piano-kawai-k-series.jpg" alt="Thanh viền phản âm Kawai K-300" style="height: 318px; width: 600px;">
</p>

<h3 style="text-align: justify;"><strong>3. Đàn piano Kawai K-300 thiết kế chắc chắn</strong></h3>
<h4><strong>Khung sắt theo công nghệ CAD mạnh mẽ</strong></h4>
<p style="text-align: justify;">
  Khung sắt piano Kawai K-series dùng công nghệ CAD, hỗ trợ soundboard ổn định và chắc chắn.
</p>

<p style="text-align: center;">
  <img src="https://vietthuong.vn/upload/content/images/Kawai/khung-dan-piano-kawai-kseries.jpg" alt="Khung sắt piano Kawai K300" style="height: 537px; width: 600px;">
</p>

<h4><strong>Tuning Pins – Chốt chỉnh dây đàn</strong></h4>
<p style="text-align: justify;">
  Chốt chỉnh dây của dòng K Series được làm từ thép chất lượng cao, giúp tăng vẻ đẹp và bảo vệ lâu dài.
</p>

<p style="text-align: center;">
  <img src="https://vietthuong.vn/upload/content/images/Kawai/Tuning-Pins-piano-kawai-k-series.jpg" alt="Chốt chỉnh dây đàn" style="height: 254px; width: 600px;">
</p>

<h4><strong>Pinblock Multi-Grip Kawai K300</strong></h4>
<p style="text-align: justify;">
  Pinblock Multi-Grip của Kawai được ghép nhiều lớp, giúp tăng sức mạnh và độ bền.
</p>

<p style="text-align: center;">
  <img src="https://vietthuong.vn/upload/content/images/Kawai/multi-grip-pinblock-kawai-kseries.jpg" alt="Pinblock Multi-Grip" style="height: 243px; width: 600px;">
</p>

<h4><strong>Thanh đỡ phím (keyslip) gia cố bằng thép</strong></h4>
<p style="text-align: justify;">
  Thanh đỡ phím được gia cố bằng thép để ngăn ngừa kẹt phím do thay đổi độ ẩm.
</p>

<p style="text-align: center;">
  <img src="https://vietthuong.vn/upload/content/images/Kawai/thanh-do-phim-keyslip-kawai-k-series.jpg" alt="Thanh đỡ phím" style="height: 509px; width: 600px;">
</p>

<h4><strong>Bệ đỡ phím (keybed) và thanh nối (braces)</strong></h4>
<p style="text-align: justify;">
  Keybed và braces giúp giảm rung lắc cho bề mặt phím, hỗ trợ các phím đàn hoạt động chính xác và ổn định.
</p>

<p style="text-align: center;">
  <img src="https://vietthuong.vn/upload/content/images/Kawai/kawai-kseries-keybed.jpg" alt="Bệ đỡ phím và thanh nối" style="height: 475px; width: 600px;">
</p>
',  
                "short_description"=> "Kawai K-300 kế thừa từ mẫu K3, từng đạt giải thưởng quốc tế, mang đến âm thanh ấn tượng và thiết kế mạnh mẽ, sang trọng."
            ],
            [
                "category_id"=> 5,
                "name"=> "KAWAI K-800",
                "image"=> "piano-kawai-k800-sang-trong-450x471.jpg",
                "price"=> 305600000,
                "price_sale"=> 285000000,
                "description"=> '<h2 style="text-align:justify"><strong><a href="https://vietthuong.vn/dan-piano-kawai-k800.html">Đàn Piano Kawai K800</a></strong>&nbsp;là cây đàn piano cơ thuộc dòng upright piano kawai K series của Nhật Bản, thiết kế với kiểu dáng thanh lịch, giai điệu ấm áp, chân thực. K800 được mệnh danh là cây đàn piano Upright cao cấp, được rất nhiều giới nhạc công, nghệ sĩ đánh giá cao và lựa chọn.</h2>

<h2 style="text-align:center">
    <img alt="" src="https://vietthuong.vn/image/catalog/kawai/Upright/dan-piano-kawai-k800-sang-trong.jpg" style="height:600px; width:600px">
</h2>

<h3 style="text-align:justify"><strong>1. Cảm ứng phím piano Kawai K-800</strong></h3>

<h4 style="text-align:justify"><strong>Bộ cơ đàn upright piano Millennium III</strong></h4>
<p style="text-align:justify">Các bộ phận của bộ cơ đàn upright piano Millennium III được làm bằng chất liệu ABS-Carbon, một loại vật liệu tổng hợp được tạo ra bởi sự pha trộn của sợi carbon và nhựa ABS Styran. ABS-Carbon rất cứng chắc, cho phép các bộ phận của bộ cơ trở nên nhẹ nhàng hơn mà không cần phải chịu nhiều lực. Kết quả là bộ cơ hoạt động mạnh hơn và nhanh hơn, nhờ đó mang lại hiệu quả cao hơn, khả năng kiểm soát tốt hơn cũng như độ ổn định tuyệt vời hơn so với các loại bộ cơ truyền thống hoàn toàn bằng gỗ.</p>
<p style="text-align:center">
    <img alt="" src="https://vietthuong.vn/upload/content/images/Kawai/Bo-may-dan-piano-kawai-Millennium-III-tong-the.jpg" style="height:400px; width:600px">
</p>

<h4 style="text-align:justify"><strong>Bề mặt bàn phím NEOTEX</strong></h4>
<p style="text-align:justify">Vật liệu bề mặt bàn phím NEOTEX độc quyền của Kawai được làm bằng sợi cellulose mang lại kết cấu tinh tế và mượt mà của ngà voi và gỗ mun tự nhiên, và được phủ lớp bề mặt silica bán xốp có khả năng hấp thụ các loại dầu tự nhiên và mồ hôi tay có thể gây trượt phím. NEOTEX ngăn ngừa sự rạn nứt và ngả màu qua nhiều năm sử dụng, đồng thời mang lại âm thanh bổng vút và tự nhiên để cho cảm giác nhất quán trên toàn bộ bàn phím.</p>
<p style="text-align:center">
    <img alt="" src="https://vietthuong.vn/upload/content/images/Kawai/be-mat-phim-kawai-k-series-voi-cong-nghe-neotex.jpg" style="height:203px; width:600px">
</p>

<h4 style="text-align:justify"><strong>Giá đỡ bộ cơ bằng nhôm đúc</strong></h4>
<p style="text-align:justify">Piano Kawai được đúc từ một khuôn cố định, những bộ phận của giá đỡ được đúc chính xác và giống hệt nhau trong mọi lần đúc. Dòng piano K-Series có 3 giá đỡ bằng nhôm đúc để cung cấp lực đỡ chắc chắn, nhất quán và ổn định cho bàn phím chuẩn xác theo thời gian.</p>
<p style="text-align:center">
    <img alt="" src="https://vietthuong.vn/upload/content/images/Kawai/gia-do-bo-co-bang-nhom-duc-ap-luc.jpg" style="height:623px; width:600px">
</p>

<h4 style="text-align:justify"><strong>Phím đàn dài hơn</strong></h4>
<p style="text-align:justify">Phím đàn dài hơn giúp chơi đàn dễ dàng hơn, đồng thời giúp bề mặt phím nhạy hơn khi chơi. Người chơi nhờ đó có thể kiểm soát tốt hơn và trình diễn hiệu quả hơn với nỗ lực ít hơn.</p>
<p style="text-align:center">
    <img alt="" src="https://vietthuong.vn/upload/content/images/Kawai/do-dai-phim-dan-kawai-k-series-duoc-tang-them.jpg" style="height:361px; width:600px">
</p>

<h3 style="text-align:justify"><strong>2. Âm thanh đàn piano Kawai K-800</strong></h3>

<h4 style="text-align:justify"><strong>Bảng cộng hưởng (soundboard) được làm bằng gỗ vân sam nguyên tấm gọt thon</strong></h4>
<p style="text-align:justify">Bảng cộng hưởng là bộ phận quan trọng nhất của cây đàn piano. Bộ phận này được dùng để biến sự rung động của các dây đàn thành những âm vang phong phú. Kawai chỉ sử dụng loại gỗ vân sam nguyên tấm có đường vân gỗ thẳng được cưa làm tư ghép lại với nhau. Từng tấm gỗ được gọt thon lại để tối ưu hóa khả năng tạo ra âm thanh. Chỉ riêng những điều ấy đã đáp ứng, thậm chí vượt quá, tiêu chuẩn dành cho đàn upright piano chuyên nghiệp.</p>
<p style="text-align:center">
    <img alt="" src="https://vietthuong.vn/upload/content/images/Kawai/bang-cong-huong-go-van-sam-nguyen-khoi-kawai-k-series.jpg" style="height:227px; width:600px">
</p>

<h4 style="text-align:justify"><strong>Trụ đàn piano Kawai chắc chắn chịu tốt lực cho khung đàn.</strong></h4>
<p style="text-align:center">
    <img alt="" src="https://vietthuong.vn/upload/content/images/Kawai/tru-dan-piano-kawai-k-series.jpg" style="height:379px; width:600px">
</p>

<h4 style="text-align:justify"><strong>Các búa đàn có ghim hình chữ T, lõi bằng gỗ gụ và được bọc nỉ hai bên</strong></h4>
<p style="text-align:justify">Búa đàn Piano Kawai K-800 được làm bằng gỗ gụ có trọng lượng nhẹ và cực kỳ nhạy. Chỉ trên những cây đàn chất lượng cao như dòng upright piano chuyên nghiệp K-Series, búa đàn mới được làm hoàn toàn bằng gỗ gụ. Tất cả búa đàn của dòng K-Series đều có ghim hình chữ T để giữ hình dạng búa và bọc thêm một lớp nỉ để hỗ trợ việc tạo ra các âm thanh tuyệt vời.</p>
<p style="text-align:center">
    <img alt="" src="https://vietthuong.vn/upload/content/images/Kawai/bua-dan-piano-kawai-k-series.jpg" style="height:497px; width:600px">
</p>

<h3 style="text-align:justify"><strong>3. Piano Kawai K800 có thiết kế chắc chắn</strong></h3>

<h4 style="text-align:justify"><strong>Khung sắt được thiết kế theo công nghệ CAD mạnh mẽ</strong></h4>
<p style="text-align:justify">Khung sắt bên trong đàn piano Kawai K-Series trên tất cả các dòng máy K Series, các soundboard được hỗ trợ bởi các khung sắt “sức mạnh phù hợp” độc quyền của Kawai. Những khung sắt này sử dụng công nghệ CAD tiên tiến nhất, thương hiệu piano Kawai hiệu chỉnh cường độ và khối lượng của tấm để phù hợp với thiết kế quy mô của từng model. Triết lý này đảm bảo một hội đồng mạnh mẽ, cân bằng trở lại hỗ trợ căng thẳng chuỗi và cung cấp một nền tảng vững chắc cho giai điệu nổi bật.</p>
<p style="text-align:center">
    <img alt="" src="https://vietthuong.vn/upload/content/images/Kawai/khung-dan-piano-kawai-kseries.jpg" style="height:537px; width:600px">
</p>

<h4 style="text-align:justify"><strong>Tuning Pins – Chốt chỉnh dây đàn</strong></h4>
<p style="text-align:justify">Các chốt chỉnh dây đàn K Series chỉnh chân được làm từ thép tốt nhất, máy-ren cho mô-men xoắn hai chiều tối đa và mạ niken để tăng cường vẻ đẹp và cung cấp bảo vệ lâu dài.</p>
<p style="text-align:center">
    <img alt="" src="https://vietthuong.vn/upload/content/images/Kawai/Tuning-Pins-piano-kawai-k-series.jpg" style="height:254px; width:600px">
</p>

<h4 style="text-align:justify"><strong>Pinblock Multi-Grip Kawai K800</strong></h4>
<p style="text-align:justify">Chốt pin Multi-Grip trên tất cả các cây đàn piano K Series được ghép nhiều lớp với tối thiểu 11 lớp của cây phong Bắc Mỹ cho sức mạnh tối đa và mô men xoắn nhất quán.</p>
<p style="text-align:center">
    <img alt="" src="https://vietthuong.vn/upload/content/images/Kawai/Pinblock-Multi-Grip-Kawai-K800.jpg" style="height:600px; width:600px">
</p>
',          
                "short_description"=> "Đàn piano Kawai K-800 nổi bật với thiết kế thanh lịch, âm thanh piano acoustic chất lượng cao, phù hợp cho những người yêu thích nghệ thuật âm nhạc."
            ],
            [
                "category_id"=> 6,
                "name"=> "KAWAI GL-10",
                "image"=> "GL10-Polished-Ebony-450x471.jpg",
                "price"=> 314800000,
                "price_sale"=> 295000000,
                "description"=> '<h2 style="text-align: justify"><strong><a href="https://vietthuong.vn/piano-kawai-gl-10.html">Đàn piano Kawai GL-10</a></strong> được thiết kế tỉ mỉ đến từng chi tiết có chất lượng âm thanh tuyệt vời. Piano Kawai GL-10 thuộc dòng "baby grand" được sản xuất và lắp ráp thủ công theo nguyên tắc cổ điển, sẽ là cây đàn phù hợp cho những cuộc thi âm nhạc, biểu diễn. Loại đàn này cũng được khá nhiều gia đình chọn lựa để trưng bày như một loại nội thất cao cấp và kết hợp tập luyện âm nhạc.</h2>

<p style="text-align: center"><img alt="" src="https://vietthuong.vn/image/catalog/kawaiGrand/dan-piano-kawai-GL10.jpg" style="height:600px; width:600px"></p>

<p style="text-align: justify">Với thực trạng không gian sống ngày càng thu hẹp hiện nay, hẳn chiếc đàn “baby grand” chính là sự lựa chọn thông minh được rất nhiều người nghĩ đến. Nếu như các tính năng của đàn không hề thua kém cây đàn lớn, mà lại tiết kiệm được chi phí, diện tích, không lý do gì chúng ta không cân nhắc phải không!</p>

<h3 style="text-align: justify"><strong>1. Cảm ứng phím đàn piano Kawai GL-10</strong></h3>

<h4 style="text-align: justify"><strong>Đàn piano Kawai GL-10 có bộ máy cơ Millennium III</strong></h4>
<p style="text-align: justify"><a href="https://vietthuong.vn/su-cai-tien-dot-pha-cua-bo-may-co-millennium-iii-action-o-piano-kawai"><strong>Bộ máy cơ Thiên niên kỷ III</strong></a> bao gồm các thành phần được làm bằng ABS-Carbon, vật liệu composite được tạo ra từ việc truyền sợi carbon vào hệ thống ABS Styran nổi tiếng của chúng tôi. ABS-Carbon cực kỳ vững chắc và cứng nhắc, cho phép tạo ra các bộ phận hành động nhẹ hơn mà không bị mất sức mạnh. Kết quả giúp cho đàn piano Kawai GL-10 hoạt động nhanh hơn, cung cấp nhiều quyền lực hơn, kiểm soát tốt hơn và ổn định hơn so với các tác vụ gỗ thông thường.</p>

<p style="text-align: center"><img alt="" src="https://vietthuong.vn/upload/content/images/Kawai-bo-may-MillenniumIII.jpg" style="height:509px; width:600px"></p>
<p style="text-align: center"><img alt="" src="https://vietthuong.vn/upload/content/images/kawai-bo-may-Millennium-III-cua-dan-piano-kawai-GL-series.jpg"></p>

<h4 style="text-align: justify"><strong>Phím đàn piano Kawai GL-10 được thiết kế dài hơn.</strong></h4>
<p style="text-align: justify">Chiều dài của mỗi phím <strong><em>đàn Kawai GL-10</em></strong> được tăng thêm để chơi dễ dàng hơn và gia tăng độ phản ứng từ phía trước đến phía sau cho bề mặt phím đàn. Phím đàn cũng được thiết kế với định hình hơi cao hơn để tối đa hóa độ cứng cáp nhằm truyền tải năng lượng lớn hơn.</p>

<p style="text-align: center"><img alt="" src="https://vietthuong.vn/upload/content/images/Kawai-phim-dan-dai.jpg" style="height:509px; width:600px"></p>
<p style="text-align: center"><img alt="" src="https://vietthuong.vn/upload/content/images/kawai-ban-phim-dan-piano-kawai-gl-series-duoc-thiet-ke-dai-hon.jpg"></p>

<h4 style="text-align: justify"><strong>Thanh đòn bẩy GL-10 làm bằng carbon độc quyền</strong></h4>
<p style="text-align: justify">Thanh đòn bẩy hình L là liên kết chủ chốt giữa phím đàn và búa đàn với chức năng kiểm soát cường độ và sự tái lập hoạt động của phím đàn. Thanh đòn bẩy Carbon là thiết kế độc quyền của Kawai với 2 chất liệu cấu thành: carbon và polyacetal. Bộ phận đặc biệt này được đúc như một chi tiết tách rời riêng biệt với thiết kế “Lõi Khoét Choãi” (Tapered Core) độc quyền của Kawai nhằm tối thiểu hóa trọng lượng, tối đa hóa sức mạnh định hướng và tối ưu hóa sự phản ứng. Với kết cấu bền vững khó phá hủy này, thanh đòn bẩy Carbon không bị uốn cong khi độ ẩm thay đổi và không cần bôi trơn; nhờ đó, giảm nhu cầu bảo dưỡng. Một kết cấu với tiếp xúc bề mặt cực nhỏ sẽ gia tăng đáng kể sự kiểm soát khi chơi những đoạn nhạc với cường độ nhẹ (pianissimo). Vì vậy, với những thuộc tính đặc biệt này, thanh đòn bẩy Carbon là bước cải tiến vượt trội hơn hẳn so với những thanh đòn bẩy làm từ gỗ được kết nối bằng keo trong hầu hết những cây đàn piano thông thường khác.</p>

<p style="text-align: center"><img alt="" src="https://vietthuong.vn/upload/content/images/Kawai-thanh-don-bay-carbon.jpg" style="height:166px; width:600px"></p>
<p style="text-align: center"><img alt="" src="https://vietthuong.vn/upload/content/images/Kawai-thanh-don-bay-kawai-gl-series.jpg"></p>

<h4 style="text-align: justify"><strong>Kawai GL-10 có giá đỡ bộ cơ bằng nhôm đúc áp lực</strong></h4>
<p style="text-align: justify">Được làm từ một khuôn mẫu, những giá đỡ bộ cơ đúc bằng phương pháp đúc áp lực được định hình giống nhau một cách chuẩn xác nhất. Dòng Grand Piano GL được thiết kế đặc trưng với 5 giá đỡ bằng nhôm đúc áp lực đã vạch ra thêm một thước đo cho độ vững chắc và tính ổn định của bộ máy cơ; qua đó đánh giá được tính chuẩn xác của độ cảm ứng phím theo thời gian. Thanh ngang cố định búa đàn (hammer rail) và thanh ngang cố định khớp nối (wippen rail) được khóa chặt vĩnh viễn nhằm duy trì hệ dung sai chuẩn xác của thiết kế bộ máy cơ và đảm bảo tính ổn định lâu dài.</p>

<p style="text-align: center"><img alt="" src="https://vietthuong.vn/upload/content/images/Kawai-gia-do-bo-co-bang-nhom-duc-ap-luc(1).jpg" style="height:465px; width:600px"></p>

<h4 style="text-align: justify"><strong>Bề mặt thanh ngang với thiết kế răng cưa</strong></h4>
<p style="text-align: justify">Toàn bộ bề mặt của thanh ngang cố định búa đàn được thiết kế răng cưa để giữ các mép búa đàn chắc chắn nhằm tối ưu hóa trật tự các búa đàn và tăng độ chính xác của búa khi gõ vào dây đàn.</p>

<p style="text-align: center"><img alt="SERRATED-RAIL-SURFACE-kawai-gl-series" src="https://vietthuong.vn/upload/content/images/Kawai-be-mat-thanh-ngang-voi-thiet-ke-rang-cua.jpg"></p>

<h3 style="text-align: justify"><strong>2. Âm thanh đàn piano Kawai GL-10</strong></h3>
<h4 style="text-align: justify"><strong>Bản cộng hưởng đàn piano Kawai GL-10 được thiết kế theo dạng hình chóp và được làm từ gỗ vân sam đặc.</strong></h4>
<p style="text-align: justify"><strong>Bản cộng hưởng</strong> là trái tim của một cây <a href="https://vietthuong.vn/dan-piano.html"><strong>đàn piano</strong></a>. Chức năng của bản cộng hưởng là chuyển đổi các rung động của dây đàn piano thành những âm thanh dày dặn và vang dội. Kawai chỉ sử dụng gỗ vân sam đặc rắn được xẻ theo phương xuyên tâm với các thớ gỗ thẳng để sản xuất bản cộng hưởng dòng GL. Mỗi một đường bào mòn tinh tế theo hình chóp nhọn đều cung cấp mức độ thích hợp cho sự biến động âm thanh cộng hưởng trong từng khu vực. Chỉ những bản cộng hưởng đáp ứng hoặc vượt các tiêu chuẩn khắt khe về độ cộng hưởng của Kawai mới được lựa chọn để sử dụng cho các cây đàn piano thuộc dòng <strong>piano Kawai GL</strong>.</p>

<p style="text-align: center"><img alt="" src="https://vietthuong.vn/upload/content/images/Kawai-Soundboard-GL.jpg" style="height:227px; width:600px"></p>
<p style="text-align: center"><img alt="" src="https://vietthuong.vn/upload/content/images/kawai-bang-cong-huong-dan-piano-kawai-GL-series.jpg"></p>

<h4 style="text-align: justify"><strong>Dây đàn piano Kawai GL-10 được làm từ thép carbon</strong></h4>
<p style="text-align: justify">Mỗi chiếc đàn piano Kawai GL-10 được trang bị dây đàn được làm từ thép carbon có độ bền cao và được tuyển chọn từ những tiêu chuẩn khắt khe nhằm đạt được tần số cộng hưởng hoàn hảo. Khả năng rung động mạnh mẽ giúp độ âm thanh trở nên trong trẻo, mạnh mẽ và phong phú hơn.</p>

<p style="text-align: center"><img alt="" src="https://vietthuong.vn/upload/content/images/Kawai-day-dan-piano-kawai-gl-series.jpg" style="height:474px; width:600px"></p>

<h4 style="text-align: justify"><strong>Chốt chặn cộng hưởng thiết kế cho âm thanh đặc trưng</strong></h4>
<p style="text-align: justify">Để tối ưu hóa mức độ cộng hưởng của âm thanh, chốt chặn cộng hưởng đã được thiết kế cho phép điều chỉnh. Các lỗ chốt được sắp xếp một cách tỉ mỉ và được làm từ đồng thau nhằm tăng cường sự cộng hưởng âm thanh của đàn piano. Hệ thống chốt chặn cộng hưởng này không chỉ giúp duy trì âm thanh của đàn một cách tự nhiên mà còn mang lại chất lượng âm thanh bền vững theo thời gian.</p>

<p style="text-align: center"><img alt="" src="https://vietthuong.vn/upload/content/images/Kawai-chot-chan-cong-huong.jpg" style="height:474px; width:600px"></p>

<h3 style="text-align: justify"><strong>3. Thiết kế kiểu dáng của đàn piano Kawai GL-10</strong></h3>
<h4 style="text-align: justify"><strong>Vẻ đẹp và sự tinh tế của đàn Kawai GL-10</strong></h4>
<p style="text-align: justify">Đàn Kawai GL-10 với thiết kế kiểu dáng thanh lịch, kết hợp hoàn hảo giữa sự tinh tế và hiện đại. Sự kết hợp giữa gỗ tự nhiên và công nghệ tiên tiến đã tạo ra một cây đàn piano hoàn hảo cho mọi không gian. Kiểu dáng “baby grand” mang lại vẻ đẹp vượt thời gian, chắc chắn sẽ là điểm nhấn trong ngôi nhà của bạn.</p>

<p style="text-align: center"><img alt="" src="https://vietthuong.vn/upload/content/images/kawai-gl10-baby-grand.jpg" style="height:480px; width:600px"></p>

<h4 style="text-align: justify"><strong>Thông số kỹ thuật đàn piano Kawai GL-10</strong></h4>
<p style="text-align: justify">Kích thước (dài x rộng x cao): 151 cm x 151 cm x 102 cm.<br>Trọng lượng: 254 kg.<br>Độ dài dây đàn: 227 cm.<br>Thời gian bảo hành: 5 năm.</p>

<p style="text-align: center"><img alt="" src="https://vietthuong.vn/upload/content/images/kawai-gl10-tech-specifications.jpg" style="height:480px; width:600px"></p>

<p style="text-align: justify">Đàn Kawai GL-10 chính là lựa chọn hoàn hảo cho những ai yêu thích âm nhạc và muốn sở hữu một cây đàn piano chất lượng cao trong không gian sống của mình. Liên hệ với <a href="https://vietthuong.vn">Vietthuong.vn</a> để nhận tư vấn chi tiết và trải nghiệm sản phẩm.</p>
',          
                "short_description"=> "Kawai GL-10 là một trong những cây baby grand piano nổi bật của Kawai, đem lại âm thanh tinh tế, thích hợp cho không gian nhỏ hoặc gia đình."
            ],
            [
                "category_id"=> 6,
                "name"=> "KAWAI GL-30",
                "image"=> "dan-piano-kawai-gl30-mau-den-450x471.jpg",
                "price"=> 425900000,
                "price_sale"=> 409000000,
                "description"=> '<h2 style="text-align: justify;"><strong><a href="https://vietthuong.vn/piano-kawai-gl-30.html">Đàn Piano Kawai GL-30</a></strong> là sản phẩm đàn piano mới trong đại gia đình piano Kawai. Piano Kawai GL-30 thuộc dòng "baby grand", được sản xuất và lắp ráp thủ công theo nguyên tắc cổ điển. Sự hoạt động ổn định trong khoảng thời gian dài của độ cảm ứng phím ở GL-30 chỉ có thể đạt được nhờ vào thiết kế thông minh cùng những phương pháp và vật liệu tiên tiến nhất. Loại đàn này phù hợp cho những cuộc thi âm nhạc, biểu diễn và cũng được nhiều gia đình chọn lựa để trưng bày như một loại nội thất cao cấp kết hợp tập luyện âm nhạc.</h2> <p style="text-align: center;"><img alt="" src="https://vietthuong.vn/upload/content/images/Kawai/kawai-gl-30-sang-trong.jpg" style="height: 1200px; width: 1200px;"></p> <h3 style="text-align: justify;"><strong>1. Cảm ứng phím đàn piano Kawai GL-30</strong></h3> <h4 style="text-align: justify;"><strong>Đàn piano Kawai GL-30 có bộ máy cơ Millennium III</strong></h4> <p style="text-align: justify;"><strong>Bộ máy cơ Thiên niên kỷ III</strong> bao gồm các thành phần được làm bằng ABS-Carbon, vật liệu composite được tạo ra từ việc truyền sợi carbon vào hệ thống ABS Styran nổi tiếng của chúng tôi. ABS-Carbon cực kỳ vững chắc và cứng nhắc, cho phép tạo ra các bộ phận hành động nhẹ hơn mà không bị mất sức mạnh. Kết quả giúp cho đàn piano Kawai GL-30 hoạt động nhanh hơn, cung cấp nhiều quyền lực hơn, kiểm soát tốt hơn và ổn định hơn so với các tác vụ gỗ thông thường.</p> <p style="text-align: center;"><img alt="" src="https://vietthuong.vn/upload/content/images/Kawai/bo-may-MillenniumIII.jpg" style="height: 509px; width: 600px;"></p> <h4 style="text-align: justify;"><strong>Phím đàn piano Kawai GL-30 được thiết kế dài hơn</strong></h4> <p style="text-align: justify;">Chiều dài của mỗi phím <strong><em>đàn Kawai GL-30</em></strong> được tăng thêm để chơi dễ dàng hơn và gia tăng độ phản ứng từ phía trước đến phía sau cho bề mặt phím đàn. Phím đàn cũng được thiết kế với định hình hơi cao hơn để tối đa hóa độ cứng cáp nhằm truyền tải năng lượng lớn hơn.</p> <p style="text-align: center;"><img alt="" src="https://vietthuong.vn/upload/content/images/Kawai/phim-dan-dai.jpg" style="height: 509px; width: 600px;"></p> <p style="text-align: center;"><img alt="" src="https://vietthuong.vn/upload/content/images/kawai/ban-phim-dan-piano-kawai-gl-series-duoc-thiet-ke-dai-hon.jpg"></p> <h4 style="text-align: justify;"><strong>Thanh đòn bẩy GL-30 làm bằng carbon độc quyền</strong></h4> <p style="text-align: justify;">Thanh đòn bẩy hình L là liên kết chủ chốt giữa phím đàn và búa đàn với chức năng kiểm soát cường độ và sự tái lập hoạt động của phím đàn. Thanh đòn bẩy Carbon là thiết kế độc quyền của Kawai với 2 chất liệu cấu thành: carbon và polyacetal. Bộ phận đặc biệt này được đúc như một chi tiết tách rời riêng biệt với thiết kế “Lõi Khoét Choãi” (Tapered Core) độc quyền của Kawai nhằm tối thiểu hóa trọng lượng, tối đa hóa sức mạnh định hướng và tối ưu hóa sự phản ứng. Với kết cấu bền vững khó phá hủy này, thanh đòn bẩy Carbon không bị uốn cong khi độ ẩm thay đổi và không cần bôi trơn; nhờ đó, giảm nhu cầu bảo dưỡng. Một kết cấu với tiếp xúc bề mặt cực nhỏ sẽ gia tăng đáng kể sự kiểm soát khi chơi những đoạn nhạc với cường độ nhẹ (pianissimo). Vì vậy, với những thuộc tính đặc biệt này, thanh đòn bẩy Carbon là bước cải tiến vượt trội hơn hẳn so với những thanh đòn bẩy làm từ gỗ được kết nối bằng keo trong hầu hết những cây đàn piano thông thường khác.</p> <p style="text-align: center;"><img alt="" src="https://vietthuong.vn/upload/content/images/kawai/thanh-don-bay-kawai-gl-series.jpg"></p> <p style="text-align: center;"><img alt="" src="https://vietthuong.vn/upload/content/images/Kawai/thanh-don-bay-carbon.jpg" style="height: 166px; width: 600px;"></p> <h4 style="text-align: justify;"><strong>Kawai GL-30 có giá đỡ bộ cơ bằng nhôm đúc áp lực</strong></h4> <p style="text-align: justify;">Được làm từ một khuôn mẫu, những giá đỡ bộ cơ đúc bằng phương pháp đúc áp lực được định hình giống nhau một cách chuẩn xác nhất. Dòng Grand Piano GL được thiết kế đặc trưng với 5 giá đỡ bằng nhôm đúc áp lực đã vạch ra thêm một thước đo cho độ vững chắc và tính ổn định của bộ máy cơ; qua đó đánh giá được tính chuẩn xác của độ cảm ứng phím theo thời gian. Thanh ngang cố định búa đàn (hammer rail) và thanh ngang cố định khớp nối (wippen rail) được khóa chặt vĩnh viễn nhằm duy trì hệ dung sai chuẩn xác của thiết kế bộ máy cơ và đảm bảo tính ổn định lâu dài.</p> <p style="text-align: center;"><img alt="" src="https://vietthuong.vn/upload/content/images/Kawai/gia-do-bo-co-bang-nhom-duc-ap-luc(1).jpg" style="height: 465px; width: 600px;"></p> <h4 style="text-align: justify;"><strong>Bề mặt thanh ngang với thiết kế răng cưa</strong></h4> <p style="text-align: justify;">Toàn bộ bề mặt của thanh ngang cố định búa đàn được thiết kế răng cưa để giữ các mép búa đàn chắc chắn nhằm tối ưu hóa trật tự các búa đàn và tăng độ chính xác của búa khi gõ vào dây đàn.</p> <p style="text-align: center;"><img alt="" src="https://vietthuong.vn/upload/content/images/Kawai/be-mat-thanh-ngang-voi-thiet-ke-rang-cua.jpg" style="height: 400px; width: 600px;"></p> <h3 style="text-align: justify;"><strong>2. Âm thanh đàn piano Kawai GL-30</strong></h3> <h4 style="text-align: justify;"><strong>Bản cộng hưởng đàn piano Kawai GL-30 được thiết kế theo dạng hình chóp và được làm từ gỗ vân sam đặc.</strong></h4> <p style="text-align: justify;"><strong>Bản cộng hưởng</strong> là trái tim của một cây <a href="https://vietthuong.vn/dan-piano.html"><strong>đàn piano</strong></a>. Chức năng của bản cộng hưởng là chuyển đổi các rung động của dây đàn piano thành những âm thanh dày dặn và vang dội. Kawai chỉ sử dụng gỗ vân sam đặc rắn được xẻ theo phương xuyên tâm với các thớ gỗ thẳng để sản xuất bản cộng hưởng dòng GL. Mỗi một đường bào mòn tinh tế theo hình chóp nhọn đều cung cấp mức độ thích hợp cho sự biến động âm thanh cộng hưởng trong từng khu vực. Chỉ những bản cộng hưởng đáp ứng hoặc vượt các tiêu chuẩn khắt khe về độ cộng hưởng của Kawai mới được lựa chọn để sử dụng cho các cây đàn piano thuộc dòng piano Kawai GL.</p> <p style="text-align: center;"><img alt="" src="https://vietthuong.vn/upload/content/images/Kawai/Soundboard-GL.jpg" style="height: 227px; width: 600px;"></p> <p style="text-align: center;"><img alt="" src="https://vietthuong.vn/upload/content/images/kawai/bang-cong-huong-dan-piano-kawai-GL-series.jpg"></p> <h4 style="text-align: justify;"><strong>Búa đàn được gia cố thêm lớp nỉ</strong></h4> <p style="text-align: justify;">Làm bằng gỗ thích, được gia cố thêm lớp nỉ dày (màu đỏ) ở giữa. Những cây đàn piano tốt nhất đều phải có thiết kế này. Điều này giúp bảo vệ búa đàn khỏi bong tróc và bị hư hao sau khoảng thời gian dài đập vào dây đàn.</p> <p style="text-align: center;"><img alt="" src="https://vietthuong.vn/upload/content/images/Kawai/bua-dan-gl-series.jpg" style="height: 466px; width: 600px;"></p> <h4 style="text-align: justify;"><strong>Chốt đàn được làm từ vật liệu sợi tổng hợp</strong></h4> <p style="text-align: justify;">Chốt đàn được chế tạo từ vật liệu sợi tổng hợp cao cấp với thiết kế hình trụ độc quyền, tạo ra âm thanh rõ ràng và bền bỉ hơn. Kawai là một trong số ít nhà sản xuất đàn piano sử dụng loại chốt này cho đàn của mình. Các chốt này có độ cứng tuyệt đối, giúp tăng cường âm thanh và giữ âm tốt hơn.</p> <p style="text-align: center;"><img alt="" src="https://vietthuong.vn/upload/content/images/Kawai/chot-dan-piano-kawai-gl-series.jpg" style="height: 466px; width: 600px;"></p> <h3 style="text-align: justify;"><strong>3. Thiết kế và hình dáng đàn piano Kawai GL-30</strong></h3> <h4 style="text-align: justify;"><strong>Thiết kế hình dáng đàn piano Kawai GL-30 có đường nét mềm mại.</strong></h4> <p style="text-align: justify;">Những dòng sản phẩm piano Kawai GL được thiết kế với những đường nét mềm mại và thanh thoát. Độ lớn của cây đàn, cùng với âm thanh trung thực và vẻ đẹp quyến rũ là những yếu tố thu hút các nhạc công trẻ và những người yêu thích đàn piano.</p> <p style="text-align: center;"><img alt="" src="https://vietthuong.vn/upload/content/images/Kawai/kawai-gl-30-so-1.jpg" style="height: 227px; width: 600px;"></p> <h4 style="text-align: justify;"><strong>Kawai GL-30 có độ bền vượt trội</strong></h4> <p style="text-align: justify;">Với chất liệu gỗ tốt nhất và thiết kế tinh tế, <strong>đàn piano Kawai GL-30</strong> có độ bền vượt trội. Hệ thống tiêu âm mang đến âm thanh êm dịu, nhờ vào việc kết hợp giữa công nghệ sản xuất và nghệ thuật thủ công truyền thống.</p> <p style="text-align: center;"><img alt="" src="https://vietthuong.vn/upload/content/images/Kawai/kawai-gl-30-so-2.jpg" style="height: 227px; width: 600px;"></p> <p style="text-align: justify;"><strong>Thông số kỹ thuật</strong></p> <ul> <li><strong>Thương hiệu:</strong> Kawai</li> <li><strong>Mã sản phẩm:</strong> GL-30</li> <li><strong>Kiểu dáng:</strong> Grand piano (đàn đại dương cầm)</li> <li><strong>Chất liệu:</strong> Gỗ vân sam đặc</li> <li><strong>Độ dài:</strong> 157 cm</li> <li><strong>Trọng lượng:</strong> 265 kg</li> <li><strong>Màu sắc:</strong> Đen bóng, màu gỗ tự nhiên</li> </ul> <p style="text-align: justify;">Với những đặc điểm nổi bật về âm thanh, cảm ứng phím, và thiết kế, <strong><a href="https://vietthuong.vn/piano-kawai-gl-30.html">đàn piano Kawai GL-30</a></strong> chắc chắn là một lựa chọn tuyệt vời cho các nhạc công cũng như những ai yêu thích âm nhạc.</p>',          
                "short_description"=> "Kawai GL-30 với thiết kế thông minh và vật liệu chất lượng cao, đảm bảo độ bền bỉ và ổn định trong thời gian dài sử dụng."
            ],
            [
                "category_id"=> 6,
                "name"=> "KAWAI GL-50",
                "image"=> "dan-piano-kawai-gl50-sang-trong-450x471.jpg",
                "price"=> 492900000,
                "price_sale"=> 469000000,
                "description"=> '<h2 style="margin-left:0px; margin-right:0px; text-align:justify">
    <strong><a href="https://vietthuong.vn/piano-kawai-gl-50.html">Đàn Piano Kawai GL-50</a></strong> là sản phẩm đàn piano mới trong đại gia đình piano Kawai. Kawai GL-50 với thế mạnh là cộng hưởng âm thanh bass lớn hơn, tăng cường âm thanh cho cây đàn piano Kawai GL-50. Với thiết kế hướng theo phong cách cổ điển và phím đàn dài hơn, cây đàn rất thích hợp trong các lớp học nhạc và phòng thu.
</h2>

<p style="text-align:center">
    <strong><img alt="Đàn Piano Kawai GL-50" src="https://vietthuong.vn/image/catalog/kawai/Grand/dan-piano-kawai-gl50-sang-trong.jpg" style="height:600px; width:600px"></strong>
</p>

<p style="text-align:justify">
    <strong><em>Lựa chọn hàng đầu về thiết kế</em></strong>
</p>

<p style="margin-left:0px; margin-right:0px; text-align:justify">
    Được coi là một thương hiệu luôn chú trọng trong việc đầu tư về sản phẩm, Kawai luôn kết hợp những điều tinh túy nhất trong công nghiệp thủ công và công nghệ tinh tiến hiện đại vào những cây đàn của mình. Đó là sự kết hợp hoàn hảo được Kawai chăm chút, cẩn trọng trong từng chi tiết của sản phẩm. Nhờ đó, những chiếc đàn của Kawai nói chung và Kawai GL-50 nói riêng luôn toát ra được vẻ sang trọng, đẹp tinh tế làm nổi bật ngôi nhà của bạn.
</p>

<p style="text-align:center">
    <img alt="Kích thước đàn piano Kawai GL-50" src="https://vietthuong.vn/image/catalog/kawai/Grand/kich-thuoc-dan-piano-kawai-gl50.jpg" style="height:600px; width:600px">
</p>

<h3 style="text-align:justify"><strong>1. Cảm ứng phím đàn piano Kawai GL50</strong></h3>

<h4 style="text-align:justify"><strong>Đàn piano Kawai GL50 có bộ máy cơ Millennium III</strong></h4>

<p style="text-align:justify">
    <strong>Bộ máy cơ Thiên niên kỷ III</strong> bao gồm các thành phần được làm bằng ABS-Carbon, vật liệu composite được tạo ra từ việc truyền sợi cacbon vào hệ thống ABS Styran nổi tiếng của chúng tôi. ABS-Carbon cực kỳ vững chắc và cứng nhắc, cho phép tạo ra các bộ phận hành động nhẹ hơn mà không bị mất sức mạnh. Kết quả giúp cho đàn piano Kawai GL-50 hoạt động nhanh hơn, cung cấp nhiều quyền lực hơn, kiểm soát tốt hơn và ổn định hơn so với các tác vụ gỗ thông thường.
</p>

<p style="text-align:center">
    <img alt="Bộ máy Millennium III" src="https://vietthuong.vn/upload/content/images/Kawai/bo-may-MillenniumIII.jpg" style="height:509px; width:600px">
    <img alt="Bộ máy Millennium III của đàn piano Kawai GL series" src="https://vietthuong.vn/upload/content/images/kawai/bo-may-Millennium-III-cua-dan-piano-kawai-GL-series.jpg">
</p>

<h4 style="text-align:justify"><strong>Phím đàn piano Kawai GL50 được thiết kế dài hơn.</strong></h4>

<p style="text-align:justify">
    Chiều dài của mỗi phím <strong><em>đàn Kawai GL50</em></strong> được tăng thêm để chơi dễ dàng hơn và gia tăng độ phản ứng từ phía trước đến phía sau cho bề mặt phím đàn. Phím đàn cũng được thiết kế với định hình hơi cao hơn để tối đa hóa độ cứng cáp nhằm truyền tải năng lượng lớn hơn.
</p>

<p style="text-align:center">
    <img alt="Phím đàn dài của Kawai GL50" src="https://vietthuong.vn/upload/content/images/Kawai/phim-dan-dai.jpg" style="height:509px; width:600px">
    <img alt="Bàn phím đàn piano Kawai GL series được thiết kế dài hơn" src="https://vietthuong.vn/upload/content/images/Kawai/ban-phim-dan-piano-kawai-gl-series-duoc-thiet-ke-dai-hon.jpg">
</p>

<h4 style="text-align:justify"><strong>Thanh đòn bẩy GL50 làm bằng carbon độc quyền</strong></h4>

<p style="text-align:justify">
    Thanh đòn bẩy hình L là liên kết chủ chốt giữa phím đàn và búa đàn với chức năng kiểm soát cường độ và sự tái lập hoạt động của phím đàn. Thanh đòn bẩy Carbon là thiết kế độc quyền của Kawai với 2 chất liệu cấu thành: carbon và polyacetal. Bộ phận đặc biệt này được đúc như một chi tiết tách rời riêng biệt với thiết kế “Lõi Khoét Choãi” (Tapered Core) độc quyền của Kawai nhằm tối thiểu hóa trọng lượng, tối đa hóa sức mạnh định hướng và tối ưu hóa sự phản ứng. Với kết cấu bền vững khó phá hủy này, thanh đòn bẩy Carbon không bị uốn cong khi độ ẩm thay đổi và không cần bôi trơn; nhờ đó, giảm nhu cầu bảo dưỡng. Một kết cấu với tiếp xúc bề mặt cực nhỏ sẽ gia tăng đáng kể sự kiểm soát khi chơi những đoạn nhạc với cường độ nhẹ (pianissimo). Vì vậy, với những thuộc tính đặc biệt này, thanh đòn bẩy Carbon là bước cải tiến vượt trội hơn hẳn so với những thanh đòn bẩy làm từ gỗ được kết nối bằng keo trong hầu hết những cây đàn piano thông thường khác.
</p>

<p style="text-align:center">
    <img alt="Thanh đòn bẩy Kawai GL series" src="https://vietthuong.vn/upload/content/images/Kawai/thanh-don-bay-kawai-gl-series.jpg">
    <img alt="Thanh đòn bẩy carbon" src="https://vietthuong.vn/upload/content/images/Kawai/thanh-don-bay-carbon.jpg" style="height:166px; width:600px">
</p>

<h4 style="text-align:justify"><strong>Kawai GL50 có giá đỡ bộ cơ bằng nhôm đúc áp lực</strong></h4>

<p style="text-align:justify">
    Được làm từ một khuôn mẫu, những giá đỡ bộ cơ đúc bằng phương pháp đúc áp lực được định hình giống nhau một cách chuẩn xác nhất. Dòng Grand Piano GL được thiết kế đặc trưng với 5 giá đỡ bằng nhôm đúc áp lực đã vạch ra thêm một thước đo cho độ vững chắc và tính ổn định của bộ máy cơ; qua đó đánh giá được tính chuẩn xác của độ cảm ứng phím theo thời gian. Thanh ngang cố định búa đàn (hammer rail) và thanh ngang cố định khớp nối (wippen rail) được khóa chặt vĩnh viễn nhằm duy trì hệ dung sai chuẩn xác của thiết kế bộ máy cơ và đảm bảo tính ổn định lâu dài.
</p>

<p style="text-align:center">
    <img alt="Giá đỡ bộ cơ bằng nhôm đúc áp lực" src="https://vietthuong.vn/upload/content/images/Kawai/gia-do-bo-co-bang-nhom-duc-ap-luc(1).jpg">
</p>

<h4 style="text-align:justify"><strong>Bề mặt thanh ngang với thiết kế răng cưa</strong></h4>

<p style="text-align:justify">
    Toàn bộ bề mặt của thanh ngang cố định búa đàn được thiết kế răng cưa để giữ các mép búa đàn chắc chắn nhằm tối ưu hóa trật tự các búa đàn và tăng độ chính xác của búa khi gõ vào dây đàn.
</p>

<p style="text-align:center">
    <img alt="Bề mặt thanh ngang với thiết kế răng cưa" src="https://vietthuong.vn/upload/content/images/Kawai/be-mat-thanh-ngang-voi-thiet-ke-rang-cua.jpg">
</p>

<h3 style="text-align:justify"><strong>2. Âm thanh đàn piano Kawai GL50</strong></h3>

<h4 style="text-align:justify"><strong>Bản cộng hưởng đàn piano Kawai GL50 được thiết kế theo dạng hình chóp và được làm từ gỗ vân sam đặc.</strong></h4>

<p style="text-align:justify">
    <strong>Bản cộng hưởng</strong> là trái tim của một cây <a href="https://vietthuong.vn/dan-piano.html"><strong>đàn piano</strong></a>. Chức năng của bản cộng hưởng là chuyển đổi các rung động của dây đàn piano thành những âm thanh dày dặn và vang dội. Kawai chỉ sử dụng <strong>gỗ vân sam đặc</strong> cho các bản cộng hưởng của mình nhằm tạo ra âm thanh phong phú và cuốn hút cho cây đàn. Hơn nữa, thiết kế hình chóp giúp các dây đàn được phân bố hợp lý, mang đến âm thanh tốt hơn cho Kawai GL50. 
</p>

<p style="text-align:center">
    <img alt="Bản cộng hưởng đàn piano Kawai GL50" src="https://vietthuong.vn/upload/content/images/Kawai/ban-cong-huong-dan-piano-kawai-gl50.jpg">
</p>

<h4 style="text-align:justify"><strong>Hệ thống dây đàn</strong></h4>

<p style="text-align:justify">
    Kawai GL50 được trang bị <strong>dây đàn chất lượng cao</strong> và một phần dây đánh trên búa đàn giúp âm thanh rõ ràng hơn. Được trang bị hệ thống dây chất lượng nhất, âm thanh trong trẻo và đầy sống động đã làm cho Kawai GL50 trở thành lựa chọn lý tưởng cho những người đam mê âm nhạc và những nhạc công chuyên nghiệp.
</p>

<p style="text-align:center">
    <img alt="Hệ thống dây đàn piano Kawai GL50" src="https://vietthuong.vn/upload/content/images/Kawai/he-thong-day-dan-piano-kawai-gl50.jpg">
</p>

<h4 style="text-align:justify"><strong>Những đặc điểm nổi bật của đàn Kawai GL50</strong></h4>

<p style="text-align:justify">
    <strong><em>1. Kawai GL50 cho âm thanh mạnh mẽ</em></strong> với sự cộng hưởng từ chất liệu gỗ vân sam.
</p>

<p style="text-align:justify">
    <strong><em>2. Kawai GL50 có độ nhạy phím cao</em></strong> với các phím đàn được làm từ chất liệu chuyên dụng.
</p>

<p style="text-align:justify">
    <strong><em>3. Thiết kế sang trọng</em></strong> với kiểu dáng chóp giúp âm thanh tỏa ra không gian một cách tự nhiên.
</p>

<p style="text-align:center">
    <img alt="Đàn piano Kawai GL50 sang trọng" src="https://vietthuong.vn/upload/content/images/Kawai/dan-piano-kawai-gl50-sang-trong.jpg" style="height:509px; width:600px">
</p>

<h3 style="text-align:justify"><strong>3. Mua đàn piano Kawai GL50 ở đâu?</strong></h3>

<p style="text-align:justify">
    Hãy đến với <strong><a href="https://vietthuong.vn/dan-piano.html">Vietthuong.vn</a></strong> để trải nghiệm những sản phẩm chất lượng từ Kawai. Đội ngũ nhân viên chuyên nghiệp của chúng tôi sẵn sàng hỗ trợ bạn tìm kiếm cây đàn piano hoàn hảo nhất cho mình. 
</p>
',          
                "short_description"=> "GL-50 là cây grand piano hoàn hảo cho các lớp học và phòng thu âm, mang đến trải nghiệm âm thanh và cảm xúc tuyệt vời cho người chơi."
            ],
            [
                "category_id"=> 5,
                "name"=> "ROLAND RP-30",
                "image"=> "dan-piano-dien-roland-rp30-chinh-hang-01",
                "price"=> 21760000,
                "price_sale"=> 16500000,
                "description"=> '<h2 style="text-align:center"><strong>ĐÀN PIANO ĐIỆN VỚI TONE VÀ NHỮNG TÍNH NĂNG ĐỒNG HÀNH CÙNG TRẺ TRONG NHỮNG BƯỚC ĐI ĐẦU TIÊN ĐẾN VỚI ÂM NHẠC</strong></h2>
<p style="text-align:justify">Bạn muốn cho con bạn có những bước đi đầu tiên thuận lợi nhất trên con đường trở thành một nghệ sĩ piano nhưng thật khó để động viên bọn trẻ chơi piano khi có quá nhiều thứ gây xao nhãng như smartphone, games, TV,... Cây piano điện dành cho người chơi ở mức độ nhập môn của thương hiệu <strong>Roland</strong>, <a href="https://vietthuong.vn/roland-rp-30"><strong>piano RP30</strong></a> là một cây đàn dễ chơi và với mức giá hợp lí bạn sẽ có thể mang âm nhạc về chính ngôi nhà của mình. Cây đàn cho phép bạn lựa chọn 15 tone nhạc tùy chỉnh để tăng thêm nguồn cảm hứng, những chức năng hỗ trợ việc luyện tập giúp cho việc học đàn trở nên thư thái và hứng thú hơn và khung đàn bằng gỗ sẽ trang hoàng cho ngôi nhà bạn trong một khoảng thời gian rất dài.</p>
<p style="text-align:center"><img alt="" src="https://vietthuong.vn/upload/content/images/CasioPiano/dan-piano-dien-roland-rp30-h04.jpg" style="height:400px; width:600px"></p>
<p style="text-align:center"><em>Chất lượng âm thanh piano Roland RP-30 được nhiều người công nhận và đánh giá cao, lí tưởng cho việc luyện tập và học đàn.</em></p>
<ul>
    <li style="text-align:justify">Phím đàn với độ nhạy và độ chính xác cao giúp cải thiện kĩ năng của trẻ.</li>
    <li style="text-align:justify">Được trang bị ba bàn đạp để chơi những giai điệu cổ điển một cách chuẩn xác.</li>
    <li style="text-align:justify">Hộp đàn bằng gỗ tô điểm cho vẻ sang trọng khiến đàn trở thành một vật trang trí đẹp mắt cho ngôi nhà bạn.</li>
    <li style="text-align:justify">Bộ 15 tone nhạc được lựa chọn kĩ lưỡng để tạo động lực cho trẻ luyện tập mỗi ngày.</li>
    <li style="text-align:justify">Chức năng sử dụng headphone cho phép luyện tập mọi lúc mà không phải làm phiền những người xung quanh.</li>
</ul>

<h2 style="text-align:center"><img alt="" src="https://vietthuong.vn/upload/content/images/CasioPiano/dan-piano-dien-roland-rp30-pedal.jpg" style="height:400px; width:600px"></h2>

<h3 style="text-align:justify"><strong>1. Những tone nhạc piano chuẩn xác để khơi nguồn cảm hứng và tạo động lực cho trẻ.</strong></h3>
<p style="text-align:justify">Chẳng có gì gây chán nản bằng những giai điệu nhạt nhẽo thiếu sức sống khi mới tập chơi piano. Nhưng khi người chơi tiếp cận với những tone nhạc ấn tượng cùng những phím đàn nhanh nhạy phía dưới ngón tay, họ sẽ cảm nhận được cây đàn và sẽ hứng thú hơn trong việc luyện tập. Mặc dù có mức giá phù hợp cho người mới tập chơi nhưng cây Roland RP30 vẫn được trang bị những tone nhạc giàu cảm xúc kế thừa từ những mẫu đàn cao cấp đi trước và được rất nhiều người đánh giá cao. Những tone nhạc chuẩn xác còn rất lí tưởng cho việc luyện tập hằng ngày và cho cả những bước tiến trong quá trình phát triển kĩ năng của trẻ nhỏ.</p>
<p style="text-align:center"><img alt="" src="https://vietthuong.vn/upload/content/images/CasioPiano/dan-piano-dien-roland-rp30-h01.jpg" style="height:400px; width:600px"></p>

<h3 style="text-align:justify"><strong>2. Bàn phím và bàn đạp với độ nhạy cao hỗ trợ cho con bạn trong việc cải thiện kĩ thuật chơi đàn.</strong></h3>
<p style="text-align:justify">Trong suốt quá trình phát triển từ những nốt nhạc đơn lẻ chơi tới một màn diễn độc tấu và xa hơn nữa, một cây đàn piano để tạo cảm hứng cho trẻ nhỏ mỗi khi trẻ đạt được bước tiến là điều cần thiết. Với chất lượng âm thanh và bộ cảm biến được kế thừa từ những mẫu đàn cao cấp trước, cây RP-30 có thể biến người mới bắt đầu trở thành một nhạc sĩ nhờ bàn phím siêu nhạy, búa gõ chính xác, bàn phím trắng ngà đem đến mọi sắc thái nhạc mỗi khi trẻ chạm vào phím đàn, cổ vũ cho trẻ chơi nhạc với đam mê và tìm ra giai điệu của bản thân mình. Cây RP30 cũng sẽ bám sát quá trình phát triển kĩ năng chơi đàn của trẻ cùng với bàn đạp sustain, bàn đạp soft và bàn đạp sostenuto để có thể đạt sự chính xác cao khi chơi những bài nhạc cổ điển.</p>
<p style="text-align:center"><img alt="" src="https://vietthuong.vn/upload/content/images/CasioPiano/dan-piano-dien-roland-rp30-h02.jpg" style="height:441px; width:600px"></p>

<h3 style="text-align:justify"><strong>3. Hộp đàn bằng gỗ khiến cho ngôi nhà của bạn càng thêm nổi bật</strong></h3>
<p style="text-align:justify">Có thể bạn đã cân nhắc mua về cho ngôi nhà bạn một cây đàn piano cổ điển nhưng lại quyết định không làm vậy vì cây đàn sẽ tốn nhiều không gian trong nhà khiến cho ngôi nhà bạn trở nên chật chội. Với thiết kế nhỏ gọn và kín đáo cùng hộp đàn gỗ đàn cao cấp, cây Roland RP30 sẽ trở thành một vật trang trí hoàn hảo vừa thu hút ánh nhìn vừa kích thích ngón tay của người xem.</p>

<h3 style="text-align:justify"><strong>4. Có 15 loại âm thanh được tích hợp trong đàn để động viên trẻ sáng tạo và mày mò thử nghiệm những điều mới</strong></h3>
<p style="text-align:justify">Trẻ nhỏ sẽ sớm trở nên nhàm chán với những tone nhạc đơn điệu của một cây đàn cổ điển và lại tìm đến những trò vui trên smartphone hay video game. Hãy chọn cây Roland RP-30 để chúng luôn hứng thú với việc học đàn. Với những bài học và những bản nhạc cổ điển, cây đàn piano này có thể linh hoạt chuyển đổi giữa ba loại âm acoustic thỏa mãn những thính giả dù là khó tính nhất. Nhưng điểm nhấn ở cây RP-30 đó là cây đàn cho phép trẻ trở nên sáng tạo với tổng cộng 15 tone nhạc bao gồm âm piano điện, organ, đàn clavico hay đàn dây và nhiều hơn nữa. Điều này khiến cây RP30 trở thành một sự lựa chọn lí tưởng cho quá trình phát triển những cảm quan âm nhạc, đặc biệt hơn nữa là khi bạn có thể lựa chọn để chơi hai tone cùng lúc trên cây đàn (ví dụ như âm piano và đàn dây).</p>

<h3 style="text-align:justify"><strong>5. Chế độ âm lượng tùy chỉnh và chơi đàn với headphone</strong></h3>
<p style="text-align:justify">Bạn sẽ không biết khi nào thì nguồn cảm hứng sẽ đến, nhưng âm thanh từ những cây đàn cổ điển lại quá lớn và có thể làm phiền những người xung quanh nên bạn không thể thể hiện nguồn cảm hứng ấy ra. Nhưng với cây Roland RP30, trẻ có thể tùy thích chơi đàn bất cứ lúc nào nhờ âm lượng loa có thể tùy chỉnh và chức năng phát âm qua headphone giúp đàn không trở nên quá ồn ào. Ngoài ra đàn còn được trang bị một máy đánh nhịp giúp giữ cho trẻ tập trung và đảm bảo không gì có thể làm xao nhãng quá trình luyện tập của trẻ.</p>
<p style="text-align:center"><img alt="" src="https://vietthuong.vn/upload/content/images/CasioPiano/dan-piano-dien-roland-rp30-h03.jpg" style="height:544px; width:600px"></p>

<p style="text-align:justify"><strong><em>&gt;&gt; Xem thêm những mẫu đàn piano điện Roland mới nhất tại Việt Thương Music: <a href="https://vietthuong.vn/dan-piano-roland.html">https://vietthuong.vn/dan-piano-roland.html</a></em></strong></p>
',          
                "short_description"=> "RP-30 được thiết kế với phím đàn nhạy bén, chính xác, phù hợp cho người mới tập chơi. Ba bàn đạp tiêu chuẩn giúp nâng cao kỹ năng và cảm nhận âm nhạc."
            ],
            [
                "category_id"=> 6,
                "name"=> "KAWAI GX-3",
                "image"=> "kawai-gx-3-1-450x471.jpg",
                "price"=> 577800000,
                "price_sale"=> null,
                "description"=> '<p style="text-align:justify">Được tung ra thị trường vào năm 2013, Kawai GX series là dòng grand piano gần nhất của hãng nhạc cụ Kawai nổi tiếng. Dòng piano này được thiết kế dựa vào dòng RX series nhưng bộ máy đàn dài hơn, kỹ thuật lắp các block gỗ lên dây khác và lớp khung gỗ dày hơn. Dòng GX grand piano có 6 kích cỡ khác nhau với cùng các tính năng để lựa chọn.</p> <p style="text-align:center"><img alt="" src="https://vietthuong.vn/image/catalog/kawaiGrand/kawai-gx-3-mau-den.jpg" style="height:600px; width:600px"></p> <p style="text-align:justify">GX-3 gây ấn tượng với một vẻ ngoài sang trọng và trang nghiêm, cùng với đó là giai điệu khác biệt gợi lên những phẩm chất của một cây đại dương cầm và còn hơn thế nữa. Với giai điệu nổi bật và độ cảm ứng tinh tế nằm gọn trong một kích thước linh hoạt, GX-3 là sự lựa chọn ưa thích của các chuyên gia.</p> <h3 style="text-align:justify"><strong>Bộ máy cơ Thiên Niên Kỷ III (Millennium III Action)</strong></h3> <p style="text-align:justify">Máy đàn: Millennium III® là bộ máy đàn piano được sản xuất từ các thành phần làm bằng ABS-Carbon, một loại vật liệu tổng hợp được tạo ra bởi Carbon và ABS Styran. ABS-Carbon rất cứng và vững chắc cho phép các thành phần bộ máy đàn hoạt động nhẹ nhàng linh hoạt. Với khả năng truyền lực cao, bộ máy đàn (action) Millennium III hoạt động mạnh hơn và nhanh hơn, mang lại khả năng kiểm soát tốt hơn, mạnh mẽ hơn và ổn định cao hơn so với các loại bộ cơ (action) bằng gỗ thông thường.</p> <p style="text-align:center"><img alt="" src="https://vietthuong.vn/upload/content/images/KawaiMillenniumIII-gx.jpg" style="height:342px; width:600px"></p> <h3 style="text-align:justify"><strong>Phím đàn dài hơn làm từ gỗ vân sam</strong></h3> <p style="text-align:justify">Chiều dài của phím đàn thiết kế dài hơn và bằng gỗ Vân Sam (Spruce): Chiều dài tổng thể của mỗi phím đàn (Key) được thiết kế dài hơn làm cho khả năng chơi nhạc dễ dàng hơn và đem lại cảm giác phím phong phú cho sự biểu cảm ngón đàn. Với gỗ Vân Sam (spruce) là nguyên liệu cực kỳ lý tưởng với trọng lượng nhẹ và rất chắc, giúp tăng độ nhạy và đồng nhất của phím đàn được duy trì qua nhiều năm sử dụng, đồng thời hỗ trợ tối ưu cho sự truyền tải mọi sắc thái tinh tế nhất trong biểu diễn.</p> <p style="text-align:center"><img alt="" src="https://vietthuong.vn/upload/content/images/Kawai/phim-dan-gx.jpg" style="height:509px; width:600px"></p> <h3 style="text-align:justify"><strong>Bề mặt phím NEOTEX</strong></h3> <p style="text-align:justify">Chất liệu bề mặt phím NEOTEX độc quyền của Kawai được làm từ sợi cellulose, mang lại sự láng mịn và giảm thiểu việc sử dụng nguyên vật liệu tự nhiên (ngà voi và gỗ mun). Bên cạnh đó, bề mặt phím còn được phủ bên trên với chất liệu silica-bán-lỗ giúp hấp thụ các loại dầu tự nhiên và mồ hôi từ bàn tay. Kể từ khi NEOTEX được sử dụng thay cho nguyên vật liệu tự nhiên và khô ráp, độ cảm nhận bàn phím được nhất quán trên toàn bộ bàn phím. NEOTEX chống nứt và phai màu qua nhiều năm sử dụng. Ngoài ra, NEOTEX còn là vật liệu chống tĩnh điện giúp ngăn chặn sự tích tụ của bụi bẩn, mang lại một bề mặt phím đẹp đẽ và bền bỉ với những khả năng đặc biệt.</p> <p style="text-align:center"><img alt="" src="https://vietthuong.vn/upload/content/images/Kawai/neotex-gx.jpg" style="height:509px; width:600px"></p> <h3 style="text-align:justify"><strong>Sự thiết lập chắc chắn cho hoạt động phím đàn</strong></h3> <p style="text-align:justify">Thanh ngang cố định búa đàn là "xương sống" của bộ máy cơ đàn piano. Búa đàn dòng GX Series làm bằng nhôm bền, được ép đùn với thiết kế Dầm-Đôi (Dual-Beam Design) độc quyền của Kawai, mang lại sức mạnh và sự ổn định. Cả 2 thanh ngang cố định búa đàn và thanh nang cố định đòn bẩy (wippen) được khóa vĩnh viễn cố định một chỗ để đảm bảo các dung sai chính xác của thiết kế bộ máy cơ và duy trì độ cảm ứng phím nhất quán cùng với tuổi thọ cây đàn piano. Toàn bộ bề mặt của thanh ngang cố định búa đàn được thiết kế răng cưa để giữ mỗi mép búa an toàn, nhằm tối ưu hóa sự sắp xếp cố định của các búa đàn, trong khi các mép búa bám chặt vào bề mặt được làm bằng nhựa PBT cho phép các ốc vít của bộ máy cơ duy trì độ chắc chắn mà không bị co lại hay nở ra. Tất cả những tính năng thiết kế tỉ mỉ bao gồm cơ cấu cứng cáp của piano dòng GX Series nhằm đảm bảo độ chính xác hoạt động của phím đàn theo thời gian.</p> <p style="text-align:center"><img alt="" src="https://vietthuong.vn/upload/content/images/Kawai/dual-Duplex-Scale.jpg" style="height:166px; width:600px"></p> <h3 style="text-align:justify"><strong>Bản cộng hưởng hình chóp được làm từ gỗ vân sam đặc</strong></h3> <p style="text-align:justify">Bản cộng hưởng là trái tim của một cây đàn piano. Chức năng của bản cộng hưởng là chuyển đổi các rung động của dây đàn piano thành những âm thanh dày dặn và vang dội. Kawai chỉ sử dụng gỗ vân sam đặc rắn được xẻ theo phương xuyên tâm với các thớ gỗ thẳng để sản xuất bản cộng hưởng dòng GX. Mỗi một đường bào mòn tinh tế theo hình chóp nhọn đều cung cấp mức độ thích hợp cho sự biến động âm thanh cộng hưởng trong từng khu vực. Chỉ những bản cộng hưởng đáp ứng hoặc vượt các tiêu chuẩn khắt khe về độ cộng hưởng của Kawai mới được lựa chọn để sử dụng cho các cây đàn piano thuộc dòng GX.</p> <p style="text-align:center"><img alt="" src="https://vietthuong.vn/upload/content/images/bang-cong-huong-gx-2.jpg"> <img alt="" src="https://vietthuong.vn/upload/content/images/Kawai/soundboard-kawai-gx-piano.jpg" style="height:503px; width:600px"></p> <h3 style="text-align:justify"><strong>Hệ thống CORE</strong></h3> <p style="text-align:justify">CORE là từ viết tắt của "Hội tụ nhằm tối ưu hóa năng lượng phản hồi". Hội tụ là cách mà những trung tâm sức mạnh của piano - vành đàn, khung đàn và dầm dưới - tất cả đều tập trung vào một điểm chính tại trung tâm của piano. Chính sự tập trung này tạo ra một "CORE" nền tảng vô cùng mạnh mẽ nhằm tối đa hóa khả năng phản xạ của vành đàn bên trong, nhờ đó, tạo ra âm thanh có sức mạnh và độ vang nổi bật.</p> <p style="text-align:center"><img alt="" src="https://vietthuong.vn/upload/content/images/Kawai/he-thong-core-gx.jpg" style="height:459px; width:600px"></p> <h3 style="text-align:justify"><strong>Vành bên trong gỗ lai (Vành Konsei Katagi)</strong></h3> <p style="text-align:justify">Vành đàn độc quyền Konsei Katagi sử dụng sự pha trộn của các loại gỗ đặc biệt để đạt được một sự cân bằng lý tưởng của âm thanh. Đối với vành bên trong, gỗ cứng với những lỗ nhỏ cung cấp độ sáng cao và viền cong được thiết kế xen kẽ bằng những thớ gỗ cứng dày đặc với những lỗ lớn, cung cấp độ ấm áp và đầy đặn. Sức mạnh tổng hợp của các loại gỗ có cấu trúc khác nhau tạo ra những giai điệu mạnh mẽ, phong phú và đa dạng - đó là dấu hiệu của đàn piano Kawai.</p> <p style="text-align:center"><img alt="" src="https://vietthuong.vn/upload/content/images/Kawai/vanh-ben-trong-gx.jpg" style="height:509px; width:600px"></p> <h3 style="text-align:justify"><strong>Ngựa đàn được ép theo chiều dọc</strong></h3> <p style="text-align:justify">Ngựa đàn thực hiện nhiệm vụ chuyển giao sức lực từ dây đàn xuống bản cộng hưởng, truyền tải những âm thanh hay nhất của âm thanh tạo ra từ sự phản hồi của gỗ, đồng thời tối đa hóa hiệu suất âm thanh của đàn piano. Mỗi ngựa đàn được làm từ gỗ bạch dương ép theo chiều dọc và thường sử dụng cấu trúc 3 chân. Với thiết kế đặc biệt, ngựa đàn mang lại sức mạnh và độ đồng nhất cho âm thanh phát ra từ đàn piano.</p> <p style="text-align:center"><img alt="" src="https://vietthuong.vn/upload/content/images/Kawai/dua-dan-gx.jpg" style="height:509px; width:600px"></p> <h3 style="text-align:justify"><strong>Chất lượng đàn tuyệt hảo qua thiết kế chắc chắn</strong></h3> <p style="text-align:justify">Dòng GX Series Grand Piano được thiết kế chắc chắn với các thanh gỗ ổn định, tất cả được gắn liền với nhau để mang đến sự vững chãi và tính ổn định cao. Chất lượng âm thanh không chỉ nằm ở những chi tiết kĩ thuật, mà còn ở chính sự kết hợp giữa yếu tố thiết kế và vật liệu cùng với sự tỉ mỉ trong sản xuất, cho ra đời một sản phẩm hoàn hảo.</p> <p style="text-align:center"><img alt="" src="https://vietthuong.vn/upload/content/images/Kawai/gx2.jpg" style="height:450px; width:600px"></p> <h3 style="text-align:justify"><strong>Thông số kỹ thuật</strong></h3> <ul> <li>Độ dài: 188 cm</li> <li>Độ rộng: 148 cm</li> <li>Cao: 101 cm</li> <li>Trọng lượng: 370 kg</li> <li>Có 88 phím</li> <li>Thích hợp cho các loại nhạc cụ như dương cầm, dương cầm kỹ thuật số.</li> </ul> <p style="text-align:justify">Kawai GX-3 Grand Piano là lựa chọn hoàn hảo cho những ai yêu thích âm nhạc và đang tìm kiếm một sản phẩm piano chất lượng cao để trải nghiệm.</p>',          
                "short_description"=> "Kawai GX-3 với dáng vẻ sang trọng và âm thanh đặc trưng của đại dương cầm, lý tưởng cho biểu diễn chuyên nghiệp và không gian cao cấp."
            ],
            [
                "category_id"=> 3,
                "name"=> "CORDOBA C1M 02685",
                "image"=> "cordoba-c1m-02685-450x471.jpg",
                "price"=> 4310000,
                "price_sale"=> 3520000,
                "description"=> '<p><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif">Córdoba C1M là cây đàn guitar dây nylon hoàn hảo cho học sinh ở mọi trình độ và hoàn toàn có thể sử dụng trong lớp học hoặc ở nhà. Thoải mái và dễ chơi, đây là cây đàn đầu tiên tuyệt vời với giá cả phải chăng.</span></span></p>
<p style="text-align:center"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><img alt="" src="https://vietthuong.vn/image/catalog/cordoba/cordoba-c1m-02685.jpg" style="height:800px; width:800px"></span></span></p>
<p><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif">Mỗi chiếc C1M đều được chế tạo với mặt trên bằng vân sam, mặt sau và hai bên bằng gỗ gụ, cần thoải mái, thanh mảnh, hình hoa thị khảm truyền thống và lớp phủ bằng polyurethane mờ. Giống như tất cả các nhạc cụ Córdoba, các mẫu C1M có dây Savarez cao cấp và thanh giàn có thể điều chỉnh để tạo độ ổn định cho cần suốt đời.</span></span></p>

<form name="fOrderReview"> 
    <div class="left">Bạn có hài lòng với nội dung sản phẩm không?
        <div> 
            <div class="right"> 
                <a id="feedback_btncg" class="good"><i class="iconfb-good"></i> Hài lòng</a> 
                <a id="feedback_btncb" class="bad"><i class="iconfb-bad"></i> Không hài lòng</a> 
            </div> 
        </div>
        <div class="clearfix">
            <div id="frm_good" class="reason hidden"> 
                <textarea name="feedback_mg" placeholder="Bạn có góp ý gì thêm không? (không bắt buộc)" id="feedback_mg"></textarea> 
                <a id="feedback_btng">Gửi góp ý</a> 
            </div>
            <div id="frm_bad" class="reason hidden"> 
                <textarea name="feedback_mb" id="feedback_mb" placeholder="Điều gì khiến Bạn không hài lòng? (không bắt buộc)"></textarea> 
            </div> 
            <div class="row_line_comment"> 
                <div class="item_line_comment"> 
                    <input type="text" name="feedback_name" id="feedback_name" value="" class="input_name" placeholder="Tên*"> 
                </div>
                <div class="item_line_comment"> 
                    <input type="text" name="feedback_phone" id="feedback_phone" value="" class="input_name" placeholder="Số điện thoại*"> 
                </div>
                <div class="clearfix">
                    <a id="feedback_btnb">Gửi góp ý</a> 
                </div>
            </div> 
        </div>
        <div class="thankss hidden">Cảm ơn Bạn đã đánh giá!</div>
    </div>
</form>

<p><a href="#">Xem thêm</a></p>

<iframe width="100%" height="580" src="https://www.youtube.com/embed?enablejsapi=1&amp;origin=https%3A%2F%2Fvietthuong.vn" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen title="YouTube video player"></iframe>
',          
                "short_description"=> "Córdoba C1M, cây đàn guitar nylon cổ điển hoàn hảo cho học sinh và người mới chơi, thiết kế tối giản nhưng chất lượng vượt trội."
            ],
            [
                "category_id"=> 4,
                "name"=> "CORDOBA C1M-CE",
                "image"=> "cordoba-C1M-CE-01-450x471.jpg",
                "price"=> 7790000,
                "price_sale"=> 6750000,
                "description"=> '<h2><strong>Fender CD-60S là cây đàn guitar lý tưởng cho những người đang tìm kiếm chiếc Dreadnought chất lượng cao, giai điệu chuẩn và khả năng chơi tuyệt vời với mức giá phải chăng. Guitar CD-60S thích hợp cho những buổi dã ngoại, quán cà phê... và thích hợp cho phong cách Fender cổ điển.</strong></h2>

<h2><strong>Thiết kế chuyên nghiệp</strong></h2>
<p><strong><img alt="" src="https://vietthuong.vnuploadcontentimagesfender-cd-60s-2.jpg" style="height:502px; width:750px"></strong></p>

<p>Guitar Fender CD-60S nổi bật với thiết kế đẹp mắt. Đàn có dáng Dreadnought, thùng đàn lớn cho tiếng đàn to, ấm và đầy hơn, phù hợp cho các bạn chơi đệm và dùng pick. Cây đàn là một trong những mẫu Guitar phổ biến nhất của <strong>thương hiệu Fender&nbsp;ở mức giá tầm trung.</strong></p>

<p>Đàn guitar CD-60S là sự lựa chọn lý tưởng cho những người chơi đang tìm kiếm một chiếc dreadnought giá cả phải chăng chất lượng cao với giai điệu và khả năng chơi tuyệt vời.</p>

<p>Fender CD-60S hoàn hảo cho những buổi dã ngoại, lửa trại hoặc quán cà phê — bất cứ nơi nào bạn chơi theo phong cách Fender cổ điển.</p>

<h2><strong>Mặt trước được được làm bằng gỗ Spruce</strong></h2>
<p>Mặt trước&nbsp;Fender CD-60S được làm bằng gỗ Spruce chắc chắn. Đặc tính của gỗ Spruce là rất cứng và nhẹ, có tốc độ truyền âm thanh, độ vang rất cao, giai điệu rõ ràng, phản ứng tốt với bất kỳ phong cách chơi acoustic nào.</p>
<p><img alt="" src="https://vietthuong.vnuploadcontentimagesfender-cd-60s-3.jpg" style="height:275px; width:700px"></p>

<h2><strong>Mặt sau và bên hông</strong></h2>
<p>Mặt sau và bên hông được làm từ gỗ mahogany, cho âm thanh rất rõ ràng với trebles chuẩn và tầm trung. Âm thanh ấm và hợp với nhạc fingerpickers, blues.</p>
<p><img alt="" src="https://vietthuong.vnuploadcontentimagesfender-cd-60s4.jpg" style="height:267px; width:700px"></p>

<h2><strong>Điều khiển cổ đàn dễ dàng</strong></h2>
<p>Với các cạnh có ngón tay lăn thoải mái, cổ của chiếc guitar này tạo ra cảm giác thoải mái vô cùng, lý tưởng cho người bắt đầu chơi hoặc những người chưa có nhiều kinh nghiệm.</p>

<form name="fOrderReview">
    <div class="left">Bạn có hài lòng với nội dung sản phẩm không?
        <div>
            <div class="right">
                <a id="feedback_btncg" class="good"><i class="iconfb-good"></i> Hài lòng</a>
                <a id="feedback_btncb" class="bad"><i class="iconfb-bad"></i> Không hài lòng</a>
                <div class="clearfix">
                    <div id="frm_good" class="reason hidden">
                        <textarea name="feedback_mg" placeholder="Bạn có góp ý gì thêm không? (không bắt buộc)" id="feedback_mg"></textarea>
                        <a id="feedback_btng">Gửi góp ý</a>
                    </div>
                    <div id="frm_bad" class="reason hidden">
                        <textarea name="feedback_mb" id="feedback_mb" placeholder="Điều gì khiến Bạn không hài lòng? (không bắt buộc)"></textarea>
                        <div class="row_line_comment">
                            <div class="item_line_comment">
                                <input type="text" name="feedback_name" id="feedback_name" value="" class="input_name" placeholder="Tên*">
                                <div>
                                    <input type="text" name="feedback_phone" id="feedback_phone" value="" class="input_name" placeholder="Số điện thoại*">
                                    <div>
                                        <a id="feedback_btnb">Gửi góp ý</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="thankss hidden">Cảm ơn Bạn đã đánh giá!</div>
            </div>
        </div>
    </div>
</form>

<h2>Xem thêm</h2>

<table border="1" cellspacing="0">
    <tbody>
        <tr>
            <td><strong>BODY</strong></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Body Back</td>
            <td></td>
            <td>Laminated Mahogany</td>
        </tr>
        <tr>
            <td>Body Sides</td>
            <td></td>
            <td>Laminated Mahogany</td>
        </tr>
        <tr>
            <td>Body Top</td>
            <td></td>
            <td>Laminated Spruce</td>
        </tr>
        <tr>
            <td>Body Finish</td>
            <td></td>
            <td>Gloss Polyurethane</td>
        </tr>
        <tr>
            <td>Body Shape</td>
            <td></td>
            <td>Dreadnought</td>
        </tr>
        <tr>
            <td>Bracing</td>
            <td></td>
            <td>Scalloped X</td>
        </tr>
        <tr>
            <td>Rosette</td>
            <td></td>
            <td>White Pearloid Acrylic</td>
        </tr>
        <tr>
            <td><strong>NECK</strong></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Neck Material</td>
            <td></td>
            <td>Mahogany</td>
        </tr>
        <tr>
            <td>Neck Binding</td>
            <td></td>
            <td>NA</td>
        </tr>
        <tr>
            <td>Neck Finish</td>
            <td></td>
            <td>Gloss</td>
        </tr>
        <tr>
            <td>Neck Shape</td>
            <td></td>
            <td>“C” Shape</td>
        </tr>
        <tr>
            <td>Scale Length</td>
            <td></td>
            <td>25.3’’ (643 mm)</td>
        </tr>
        <tr>
            <td>Fingerboard Material</td>
            <td></td>
            <td>Rosewood</td>
        </tr>
        <tr>
            <td>Fingerboard Radius</td>
            <td></td>
            <td>11.81’’ (300 mm)</td>
        </tr>
        <tr>
            <td>Number of Frets</td>
            <td></td>
            <td>20</td>
        </tr>
        <tr>
            <td>Nut Material</td>
            <td></td>
            <td>Graph Tech Nubone</td>
        </tr>
        <tr>
            <td>Nut Width</td>
            <td></td>
            <td>1.69’’ (43 mm)</td>
        </tr>
        <tr>
            <td>Position Inlays</td>
            <td></td>
            <td>Pearloid Dots</td>
        </tr>
        <tr>
            <td>Truss Rod</td>
            <td></td>
            <td>Dual-Action</td>
        </tr>
        <tr>
            <td><strong>HARDWARE</strong></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Bridge</td>
            <td></td>
            <td>Rosewood With Compensated Grap Tech Nubone Saddle</td>
        </tr>
        <tr>
            <td>Bridge Pins</td>
            <td></td>
            <td>White with Black Dots</td>
        </tr>
        <tr>
            <td>Hardware Finish</td>
            <td></td>
            <td>Chrome</td>
        </tr>
        <tr>
            <td>Tuning machines</td>
            <td></td>
            <td>Die-Cast</td>
        </tr>
        <tr>
            <td>Pickguard</td>
            <td></td>
            <td>1-Ply Black</td>
        </tr>
        <tr>
            <td><strong>MISCELLANEOUS</strong></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Strings</td>
            <td></td>
            <td>Fender Dura-Tone 880L (.012-.052 Gauge)</td>
        </tr>
        <tr>
            <td>Case</td>
            <td></td>
            <td>Optional</td>
        </tr>
        <tr>
            <td>Country of Origin</td>
            <td></td>
            <td>China</td>
        </tr>
    </tbody>
</table>

<p>&nbsp;</p>
<iframe width="100%" height="580" src="https://www.youtube.com/embed?enablejsapi=1&amp;origin=https%3A%2F%2Fvietthuong.vn" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" data-gtm-yt-inspected-7172713_33="true" id="942673987" data-gtm-yt-inspected-22="true" title="YouTube video player"></iframe> <!-- <div id="BSplugin0"></div> <script type="textjavascript"> jwplayer("BSplugin0").setup( { primary:"html5", width:"100%", height:"400", abouttext:"jwplayer 7", aspectratio:"16:9", image: "https:vietthuong.vnuploadvt.png", skin:"five", sources:[{file:"", type:"mp4",label:"720"},] }); </script> -->',          
                "short_description" => "Cordoba C1M-CE là cây guitar cổ điển dáng khuyết, âm thanh sâu lắng, chất liệu gỗ bền đẹp, lý tưởng cho những ai yêu thích phong cách cổ điển."
            ],
            [
                "category_id"=> 3,
                "name"=> "FENDER CD-60S",
                "image"=> "fender-cd-60s-450x471.jpg",
                "price"=> 6350000,
                "price_sale"=> 5650000,
                "description"=> '<p style="text-align: justify;">
    <span style="font-size: 14px; font-family: Arial, Helvetica, sans-serif;">Crossroads bày tỏ sự tôn kính đối với phong cách và âm thanh của các nhạc cụ cổ điển từ năm 1930 của Mỹ. Những năm 30 là khoảng thời gian khó khăn trên khắp nước Mỹ với cuộc Đại suy thoái khiến các cộng đồng phải quỳ gối và cuộc chiến và nỗi đau của nghèo đói và nạn đói được ghi lại trong các tạp chí và nhật ký và tất nhiên là trong bài hát, trên khắp đất nước. Một số người hiện được coi là những nhạc sĩ giỏi nhất và có ảnh hưởng nhất trên thế giới đã tạo ra một âm thanh nhịp nhàng trong suốt những năm đó và hát lên những rắc rối của họ, một âm thanh mà ngày nay chúng ta nghĩ là nhạc blues.</span>
</p>

<p style="text-align: justify;">
    <span style="font-size: 14px; font-family: Arial, Helvetica, sans-serif;">Những cây đàn guitar được sử dụng để chơi loại nhạc này không được trang trí lộng lẫy hay được trang trí lộng lẫy bằng những lớp sơn mài đắt tiền, chúng rất đơn giản và hoạt động tốt, nhưng trong nhiều trường hợp, những cây đàn này vẫn được chế tạo khá chính xác cho ngày nay. Với một chi phí thực sự đáng kể đối với các nhạc sĩ vào thời đó, điều đó có nghĩa là những cây đàn guitar của thời đại này phải chơi tốt và tồn tại trong một thời gian dài, thường phải được truyền qua các thế hệ trong gia đình.</span>
</p>

<p style="text-align: justify;">
    <span style="font-size: 14px; font-family: Arial, Helvetica, sans-serif;">Để tạo ra một nhạc cụ khơi dậy những giá trị truyền thống vốn thường bị bỏ qua trong xã hội hiện đại của chúng ta, chúng tôi tại Tanglewood đã phải nhờ đến sự phục vụ của một thợ làm đàn rất đặc biệt, không ai khác chính là Michael Sanden, người đứng sau Tanglewood Masterdesign. Michael là người sáng tạo ra công ty Sanden Guitar ở Thụy Điển, và hiện là cố vấn thiết kế chính cho Tanglewood Guitars.</span>
</p>

<h2 style="text-align: justify;">
    <span style="font-size: 14px; font-family: Arial, Helvetica, sans-serif;"><strong>ĐÀN GUITAR TANGLEWOOD TWCR DCE&nbsp;CROSSROADS DREADNOUGHT ACOUSTIC</strong></span>
</h2>

<p style="text-align: justify;">
    <span style="font-size: 14px; font-family: Arial, Helvetica, sans-serif;">Đàn guitar acoustic&nbsp;Tanglewood TWCR DCE&nbsp;được thiết kế với chất liệu chính là gỗ&nbsp;Mahogany, với nhiều tính năng vượt trội là lựa chọn lý tưởng cho nhiều nghệ sĩ Guitar.</span>
</p>

<p style="text-align: center;">
    <img alt="" src="https://vietthuong.vn/image/catalog/tanglewood/tanglewood-twcrdce.jpg" style="height: 800px; width: 800px">
</p>

<h3 style="text-align: justify;">
    <span style="font-size: 14px; font-family: Arial, Helvetica, sans-serif;"><strong>Cây guitar acoustic dáng dreadnought</strong></span>
</h3>

<p style="text-align: justify;">
    <span style="font-size: 14px; font-family: Arial, Helvetica, sans-serif;">Đàn guitar Tanglewood TWCR DCE&nbsp;có dáng dreadnought khuyết (cutaway). Thùng đàn lớn cho tiếng đàn to, ấm và đầy hơn, phù hợp cho lối chơi strumming.</span>
</p>

<h3 style="text-align: justify;">
    <span style="font-size: 14px; font-family: Arial, Helvetica, sans-serif;"><strong>Phần lớn đàn làm bằng gỗ&nbsp;mahogany</strong></span>
</h3>

<p style="text-align: justify;">
    <span style="font-size: 14px; font-family: Arial, Helvetica, sans-serif;">Mặt trước, lưng, hông và cần đàn&nbsp;Guitar Acoustic Tanglewood TWCR DCE&nbsp;được làm từ chất liệu mahogany, đặc biệt gỗ làm mặt đàn được tuyển chọn vô cùng kỹ lưỡng và cẩn thận. Mahogany là một loại gỗ bền với thời gian, không bị cong vênh hay nứt nẻ. Thớ gỗ mịn, đẹp, ít co giãn, tất cả tạo nên một sự sang trọng, giá trị cho chiếc guitar acoustic này.&nbsp;Hơn nữa, gỗ mahogany có xu hướng nở dần ra theo thời gian. Vì vậy, khi sử dụng chiếc guitar này, người chơi sẽ cảm nhận được sự tròn đầy của âm thanh qua thời gian, đây có lẽ là đặc điểm nổi bật nhất thu hút người tiêu dùng của sản phẩm.</span>
</p>

<h3 style="text-align: justify;">
    <span style="font-size: 14px; font-family: Arial, Helvetica, sans-serif;"><strong>Các tính năng nổi bật khác</strong></span>
</h3>

<p style="text-align: justify;">
    <span style="font-size: 14px; font-family: Arial, Helvetica, sans-serif;">Mặt phím và ngựa đàn được làm từ gỗ Rosewood cho âm thanh ấm áp và cảm giác thoải mái cho người chơi.&nbsp;</span>
</p>

<p style="text-align: justify;">
    <span style="font-size: 14px; font-family: Arial, Helvetica, sans-serif;">Cây đàn được trang bị hệ thống Tanglewood TW-EX4 EQ cho âm thanh mạnh mẽ và điều chỉnh dễ dàng theo từng phong cách và hiệu suất của người chơi.&nbsp;</span>
</p>

<h3 style="text-align: justify;">
    <span style="font-size: 14px; font-family: Arial, Helvetica, sans-serif;"><strong>Giá đàn guitar Tanglewood TWCR DCE rất phải chăng</strong></span>
</h3>

<p style="text-align: justify;">
    <span style="font-size: 14px; font-family: Arial, Helvetica, sans-serif;">Tanglewood TWCR DCE là cây đàn lý tưởng dành cho những ai đang tìm kiếm cây đàn chất lượng với mức giá vừa phải. Đây chính là sự lựa chọn tuyệt vời dành cho bạn, bất kể bạn là người mới học hay là tay chơi guitar có nhiều kinh nghiệm.</span>
</p>

<form name="fOrderReview">
    <div class="left">Bạn có hài lòng với nội dung sản phẩm không?</div>
    <div class="right">
        <a id="feedback_btncg" class="good"><i class="iconfb-good"></i> Hài lòng</a>
        <a id="feedback_btncb" class="bad"><i class="iconfb-bad"></i> Không hài lòng</a>
    </div>
    <div class="clearfix"></div>

    <div id="frm_good" class="reason hidden">
        <textarea name="feedback_mg" placeholder="Bạn có góp ý gì thêm không? (không bắt buộc)" id="feedback_mg"></textarea>
        <a id="feedback_btng">Gửi góp ý</a>
    </div>

    <div id="frm_bad" class="reason hidden">
        <textarea name="feedback_mb" id="feedback_mb" placeholder="Điều gì khiến Bạn không hài lòng? (không bắt buộc)"></textarea>
        <div class="row_line_comment">
            <div class="item_line_comment">
                <input type="text" name="feedback_name" id="feedback_name" value="" class="input_name" placeholder="Tên*">
            </div>
            <div class="item_line_comment">
                <input type="text" name="feedback_phone" id="feedback_phone" value="" class="input_name" placeholder="Số điện thoại*">
            </div>
            <div>
                <a id="feedback_btnb">Gửi góp ý</a>
            </div>
        </div>
    </div>
</form>

<div class="thankss hidden">Cảm ơn Bạn đã đánh giá!</div>

<table border="1" cellspacing="0">
    <tbody>
        <tr>
            <td><strong>SHAPE</strong></td>
            <td>Dreadnought Cutaway</td>
        </tr>
        <tr>
            <td><strong>TOP:</strong></td>
            <td>Hand Selected Genuine Mahogany</td>
        </tr>
        <tr>
            <td><strong>BACK:</strong></td>
            <td>Mahogany</td>
        </tr>
        <tr>
            <td><strong>SIDES:</strong></td>
            <td>Mahogany</td>
        </tr>
        <tr>
            <td><strong>NECK (MATERIAL):</strong></td>
            <td>Mahogany</td>
        </tr>
        <tr>
            <td><strong>FINGERBOARD:</strong></td>
            <td>Rosewood</td>
        </tr>
        <tr>
            <td><strong>BRIDGE:</strong></td>
            <td>Rosewood</td>
        </tr>
        <tr>
            <td><strong>STRING:</strong></td>
            <td>Light Gauge</td>
        </tr>
        <tr>
            <td><strong>PICKUP:</strong></td>
            <td>Tanglewood TW-EX4 EQ</td>
        </tr>
        <tr>
            <td><strong>FINISH:</strong></td>
            <td>Natural Satin</td>
        </tr>
        <tr>
            <td><strong>COLOR:</strong></td>
            <td>Brown</td>
        </tr>
    </tbody>
</table>
<iframe width="100%" height="580" src="https://www.youtube.com/embed?enablejsapi=1&amp;origin=https%3A%2F%2Fvietthuong.vn" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" data-gtm-yt-inspected-7172713_33="true" id="8561344" data-gtm-yt-inspected-22="true" title="YouTube video player"></iframe> <!-- <div id="BSplugin0"></div> <script type="textjavascript"> jwplayer("BSplugin0").setup( { primary:"html5", width:"100%", height:"400", abouttext:"jwplayer 7", aspectratio:"16:9", image: "https:vietthuong.vnuploadvt.png", skin:"five", sources:[{file:"", type:"mp4",label:"720"},] }); </script> ',          
                "short_description" => "Fender CD-60S là cây guitar dreadnought mạnh mẽ với âm thanh to và ấm, hoàn hảo cho người chơi đệm hát và sử dụng pick."
            ],
            [
                "category_id"=> 3,
                "name"=> "TANGLEWOOD TWBB SDE",
                "image"=> "tanglewoodguitars-twbbsde-01-450x471.jpg",
                "price"=> 6030000,
                "price_sale"=> null,
                "description"=> '<p style="text-align:justify"><strong>Kapok D118-AC: Guitar giá tốt cho người mới</strong></p>
<p style="text-align:justify">Đàn guitar Kapok D-118AC thuộc phân khúc giá rẻ, phù hợp túi tiền với người mới bắt đầu cần một cây đàn làm quen hay những bạn học sinh, sinh viên có điều kiện kinh tế còn hạn chế. Kapok luôn đảm bảo các công đoạn sản xuất đều thực hiện theo quy trình và được kiểm soát chất lượng gắt gao nhằm đảm bảo tuổi thọ đàn và chất lượng âm thanh đạt chuẩn.</p>
<p style="text-align:center"><img alt="" src="https://vietthuong.vn/upload/content/images/1a-thaiKapok-D-118AC-2.jpg" style="width:1050px; height:auto;"></p>
<p style="text-align:justify"><strong>Âm thanh đạt chuẩn</strong></p>
<p style="text-align:justify">Chất lượng âm thanh đạt chuẩn nhờ các bộ phận được làm từ những chất gỗ ổn định và được xử lý công nghiệp. Kapok D-118AC thích hợp với nhiều phong cách chơi acoustic khác nhau như hard strumming, fast flatpicking hay delicate fingerpicking.</p>
<ul>
    <li style="text-align:justify">Mặt đàn bằng gỗ spruce ép cao cấp. Gỗ Spruce ép là loại gỗ có độ bền cao và rất dẻo dai, thường được sử dụng phổ biến để làm mặt đàn nhờ có tốc độ truyền âm thanh, độ vang rất tốt và giai điệu rõ ràng.</li>
    <li style="text-align:justify">Lưng và hông đàn làm từ gỗ Linden laminated (gỗ ép) chất lượng cao, mang đến âm sắc cực kỳ ấn tượng.</li>
    <li style="text-align:justify">Mặt phím và ngựa đàn bằng gỗ Rosewood, mang lại cảm giác thoải mái và lướt êm cho người chơi, góp phần tạo nên âm thanh ngọt ngào, ấm áp.</li>
</ul>
<p style="text-align:justify"><strong>Thiết kế hài hòa</strong></p>
<p style="text-align:justify">Guitar Kapok D-118AC nổi bật với thiết kế hài hòa, màu sắc bắt mắt. Thiết kế nhỏ gọn tiện dụng, thích hợp cho tập luyện hoặc biểu diễn ở bất kỳ môi trường nào mà không gây ra sự bất tiện. Kapok D-118AC nổi bật về thiết kế so với các guitar cùng phân khúc nhờ lớp sơn bóng đẹp khiến D-118AC trông thật tuyệt vời dưới ánh đèn sân khấu.</p>
<p style="text-align:justify">Mặt phím và ngựa đàn bằng gỗ Rosewood. Viền đàn bằng nhựa ABS làm cho chiếc đàn này trở nên chất lượng hơn.</p>
<p style="text-align:justify"><em>Thỏa mãn cảm giác chơi guitar và đáp ứng được âm thanh mà bạn muốn hướng tới! Gọi ngay <a href="tel:1800 6715">1800 6715</a> hoặc để lại SĐT để được tư vấn về Kapok D118AC.</em></p>

<form name="fOrderReview">
    <div class="left">Bạn có hài lòng với nội dung sản phẩm không?</div>
    <div class="right">
        <a id="feedback_btncg" class="good">Hài lòng</a>
        <a id="feedback_btncb" class="bad">Không hài lòng</a>
    </div>
    <div class="clearfix"></div>
    <div id="frm_good" class="reason hidden">
        <textarea name="feedback_mg" placeholder="Bạn có góp ý gì thêm không? (không bắt buộc)"></textarea>
        <a id="feedback_btng">Gửi góp ý</a>
    </div>
    <div id="frm_bad" class="reason hidden">
        <textarea name="feedback_mb" placeholder="Điều gì khiến Bạn không hài lòng? (không bắt buộc)"></textarea>
        <input type="text" name="feedback_name" placeholder="Tên*">
        <input type="text" name="feedback_phone" placeholder="Số điện thoại*">
        <a id="feedback_btnb">Gửi góp ý</a>
    </div>
    <div class="thankss hidden">Cảm ơn Bạn đã đánh giá!</div>
</form>

<iframe width="100%" height="580" src="https://www.youtube.com/embed/jbmKMJI34SU?enablejsapi=1&amp;origin=https%3A%2F%2Fvietthuong.vn" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen title="Sao Em Vô Tình Cover (Jack) Guitar Kapok D118AC Tốt nhất cho sinh viên mới học chơi"></iframe>
',          
                "short_description"=> "Tanglewood TWBB SDE, guitar acoustic với mặt gỗ chọn lọc, kiểu dáng đẹp, tiếng đàn ấm áp phù hợp với mọi trình độ chơi."
            ],
            [
                "category_id"=> 3,
                "name"=> "TANGLEWOOD TWCR DCE CROSSROADS DREADNOUGHT ACOUSTIC",
                "image"=> "tanglewood-twcrdce-450x471.jpg",
                "price"=> 4140000,
                "price_sale"=> 3540000,
                "description"=> '<p style="text-align:justify">
    <strong>Đàn Guitar Kapok LD-14</strong> là model đàn giá thấp, đảm bảo chất lượng chuẩn cho người mới chơi.
</p>

<p style="text-align:justify">
    Kapok LD-14 thuộc phân khúc guitar phổ thông với âm cộng hưởng tốt, thiết kế chắc chắn và giá bán hợp lý. Sản phẩm có lớp sơn bóng đẹp, cần đàn làm từ gỗ mahogany, lưng và hông đàn bằng gỗ laminated chất lượng cao, mang đến âm sắc ấn tượng.
</p>

<p style="text-align:center">
    <img alt="Kapok LD-14" src="https://vietthuong.vn/uploadimages/suzuki/Untitled-1.jpg" style="width:1050px; height:1097px">
</p>

<p style="text-align:justify">
    Đây là một trong số ít guitar acoustic dưới 2 triệu đồng, có âm cộng hưởng tốt và âm thanh đồng đều, phù hợp với người chơi không chuyên.
</p>

<p style="text-align:justify">
    Guitar Kapok LD-14 có ngoại hình bắt mắt, thùng đàn size 4 dài 104 cm, ngựa và ngăn phím làm từ gỗ phong, viền đàn bằng nhựa ABS. Người chơi có thể sử dụng cho các buổi du ngoạn và nhiều thể loại nhạc như cổ điển, country, jazz, ballad, flamenco.
</p>

<form name="fOrderReview">
    <div class="left">Bạn có hài lòng với nội dung sản phẩm không?</div>
    <div class="right">
        <a id="feedback_btncg" class="good">Hài lòng</a>
        <a id="feedback_btncb" class="bad">Không hài lòng</a>
    </div>
    <div class="clearfix"></div>
    <div id="frm_good" class="reason hidden">
        <textarea name="feedback_mg" placeholder="Bạn có góp ý gì thêm không? (không bắt buộc)"></textarea>
        <a id="feedback_btng">Gửi góp ý</a>
    </div>
    <div id="frm_bad" class="reason hidden">
        <textarea name="feedback_mb" placeholder="Điều gì khiến Bạn không hài lòng? (không bắt buộc)"></textarea>
        <input type="text" name="feedback_name" placeholder="Tên*">
        <input type="text" name="feedback_phone" placeholder="Số điện thoại*">
        <a id="feedback_btnb">Gửi góp ý</a>
    </div>
    <div class="thankss hidden">Cảm ơn Bạn đã đánh giá!</div>
</form>

<table border="1" cellpadding="0" cellspacing="0">
    <tbody>
        <tr><td>Tên sản phẩm</td><td>Kapok LD-14 44</td></tr>
        <tr><td>Mã sản phẩm</td><td>LD-14 44</td></tr>
        <tr><td>Hãng sản xuất</td><td>Kapok</td></tr>
        <tr><td>Lên dây</td><td>Gỗ Linden (laminated)</td></tr>
        <tr><td>Cần đàn</td><td>Gỗ Mahogany</td></tr>
        <tr><td>Ngăn phím</td><td>Gỗ Phong</td></tr>
        <tr><td>Lưng</td><td>Gỗ Linden (laminated)</td></tr>
        <tr><td>Hông</td><td>Gỗ Linden (laminated)</td></tr>
        <tr><td>Ngựa</td><td>Gỗ Phong</td></tr>
        <tr><td>Sơn</td><td>Độ bóng cao</td></tr>
        <tr><td>Viền</td><td>Nhựa ABS</td></tr>
        <tr><td>Kích thước</td><td>104.14 cm</td></tr>
    </tbody>
</table>

<p>Tiêu chuẩn chất lượng: ISO 9001:2008</p>
<p>* Hệ thống quản lý chất lượng được áp dụng cho việc thiết kế, sản xuất và dịch vụ kèm theo của các dòng sản phẩm guitar KAPOK.</p>
<p>* Nguồn gỗ được xử lý ở nhiệt độ cao giúp tăng độ bền, chống côn trùng và nấm mốc.</p>

<iframe width="100%" height="580" src="https://www.youtube.com/embed?enablejsapi=1&amp;origin=https%3A%2F%2Fvietthuong.vn" frameborder="0" allowfullscreen title="YouTube video player"></iframe>
',          
                "short_description"=> "TWCR DCE là cây guitar electro-acoustic chất lượng, thiết kế đẹp mắt và gỗ mahogany chất lượng cao."
            ],
            [
                "category_id"=> 3,
                "name"=> "KAPOK D-118AC",
                "image"=> "Kapok-D-118AC-1-400x400-450x471.jpg",
                "price"=> 2720000,
                "price_sale"=> 2100000,
                "description"=> '<p style="text-align:justify">
    <strong><a href="https://vietthuong.vn/dan-guitar-suzuki-sdg-6-nl-model.html">Đàn Guitar Suzuki SDG-6NL</a></strong> là đàn guitar Acoustic chính hãng do thương hiệu guitar nổi tiếng Suzuki sản xuất, đây là loại đàn thông dụng và phổ biến dành cho lứa tuổi học sinh, sinh viên, người mới tập chơi guitar chọn lựa.
</p>

<p style="text-align:justify">
    <img alt="Đàn Guitar Suzuki SDG-6NL" src="https://vietthuong.vn/upload/content/images/sdg%206.jpg" style="height:731px; width:700px">
</p>

<p style="text-align:justify">
    <strong>Đàn Guitar Suzuki SDG-6NL</strong> với cấu tạo thông dụng, cần đàn được gia công kỹ lưỡng, giữ độ thẳng cho cần, điều này sẽ giúp giảm nhẹ lực bấm đàn cho người chơi, đặc biệt đối với người mới sử dụng, tập đánh đàn guitar, lực ngón tay yếu nên chọn đàn guitar SDG-6PK.
</p>

<p style="text-align:justify">
    <strong>Đàn Guitar Suzuki SDG-6NL</strong> là dòng sản phẩm mới của Suzuki, dòng đàn chú trọng về âm thanh, thùng đàn được thiết kế dày tạo âm thanh trong và vang, điều này giúp người chơi cảm nhận âm thanh một cách tốt nhất.
</p>

<p style="text-align:justify">&nbsp;</p>

<p><span style="font-size:16px"><strong>Bài viết được quan tâm:&nbsp;</strong></span></p>
<ul>
    <li><a href="https://vietthuong.vn/goi-y-dia-diem-mua-dan-guitar-uy-tin-tai-tp-ho-chi-minh.html" id="link-noi-bo" rel="noopener" target="_blank">Mua guitar suzuki ở đâu uy tín</a></li>
    <li><a href="https://vietthuong.vn/dan-guitar-suzuki-sdg-6-nl-model.html" id="link-noi-bo" rel="noopener" target="_blank">Đàn guitar suzuki sdg-6 nl model</a></li>
    <li><a href="https://vietthuong.vn/dan-guitar-suzuki-sdg-15-nl.html" id="link-noi-bo" rel="noopener" target="_blank">Đàn guitar suzuki sdg-15 nl</a></li>
    <li><a href="https://vietthuong.vn/dan-guitar-suzuki-sdg-45ce-nl.html" id="link-noi-bo" rel="noopener" target="_blank">Đàn guitar suzuki sdg-45ce nl</a></li>
    <li><a href="https://vietthuong.vn/dan-guitar-suzuki-acoustic.html" id="link-noi-bo" rel="noopener" target="_blank">Đàn guitar suzuki acoustic chính hãng</a></li>
    <li><a href="https://vietthuong.vn/guitar-suzuki-thuong-hieu-nhat-ban" id="link-noi-bo" rel="noopener" target="_blank">Đàn guitar suzuki có tốt không</a></li>
</ul>
',          
                "short_description"=> "Kapok D-118AC với thiết kế nhỏ gọn, phù hợp cho người mới bắt đầu với mức giá phải chăng và chất lượng âm thanh ổn định."
            ],
            [
                "category_id"=> 3,
                "name"=> "KAPOK LD-14",
                "image"=> "kapok-ld-14-1-400x400-450x471.jpg",
                "price"=> 2190000,
                "price_sale"=> null,
                "description"=> '<div class="product-description">
    <p>Protégé by Córdoba C1M-CE là cây đàn guitar dây nylon được lựa chọn hàng đầu cho sinh viên ở mọi trình độ và hoàn toàn phù hợp cho cả lớp học và gia đình. Thoải mái và dễ chơi, đây là cây đàn đầu tiên tuyệt vời với giá cả phải chăng.</p>
    <p style="text-align:center">
        <img alt="Córdoba C1M-CE" src="https://vietthuong.vnuploadcontentimages/Cordobacordoba-C1M-CE-04.jpg" style="height:455px; width:800px">
    </p>
    <p>C1M-CE có Cutaway để dễ dàng tiếp cận các phím đàn cao hơn và hệ thống khuếch đại Cordoba GP-2. Mỗi chiếc Protégé C1M-CE đều được chế tạo với mặt trên bằng vân sam, mặt sau và hai bên bằng gỗ gụ, cần thon gọn, thoải mái, hoa thị khảm truyền thống và lớp hoàn thiện bằng polyurethane mờ.</p>
    <p style="text-align:center">
        <img alt="Córdoba C1M-CE" src="https://vietthuong.vnuploadcontentimages/Cordobacordoba-C1M-CE-06.jpg" style="height:455px; width:800px">
    </p>
    <p>Giống như tất cả các nhạc cụ Córdoba, các mẫu C1M-CE có dây Savarez cao cấp và một thanh giàn có thể điều chỉnh để tạo độ ổn định cho cần suốt đời.</p>
    <p style="text-align:center">
        <img alt="Córdoba C1M-CE" src="https://vietthuong.vnuploadcontentimages/Cordobacordoba-C1M-CE-05.jpg" style="height:455px; width:800px">
    </p>
</div>

<div class="product-feedback">
    <form name="fOrderReview">
        <div class="left">Bạn có hài lòng với nội dung sản phẩm không?</div>
        <div class="right">
            <a id="feedback_btncg" class="good">Hài lòng</a>
            <a id="feedback_btncb" class="bad">Không hài lòng</a>
        </div>
        <div class="clearfix">
            <div id="frm_good" class="reason hidden">
                <textarea name="feedback_mg" placeholder="Bạn có góp ý gì thêm không? (không bắt buộc)" id="feedback_mg"></textarea>
                <a id="feedback_btng">Gửi góp ý</a>
            </div>
            <div id="frm_bad" class="reason hidden">
                <textarea name="feedback_mb" id="feedback_mb" placeholder="Điều gì khiến Bạn không hài lòng? (không bắt buộc)"></textarea>
                <div class="row_line_comment">
                    <div class="item_line_comment">
                        <input type="text" name="feedback_name" id="feedback_name" value="" class="input_name" placeholder="Tên*">
                    </div>
                    <div class="item_line_comment">
                        <input type="text" name="feedback_phone" id="feedback_phone" value="" class="input_name" placeholder="Số điện thoại*">
                    </div>
                    <a id="feedback_btnb">Gửi góp ý</a>
                </div>
            </div>
        </div>
        <div class="errorss"></div>
        <div class="thankss hidden">Cảm ơn Bạn đã đánh giá!</div>
    </form>
</div>

<div class="additional-info">
    <p>Xem thêm</p>
</div>

<table style="width:100%">
    <tbody>
        <tr>
            <th scope="row">psid</th>
            <td>12</td>
        </tr>
        <tr>
            <th scope="row">Replacement Tuning Machine - Treble</th>
            <td>05706 - Cordoba Tuner Filigree Lyre GLD wPRL BS BTN Treble</td>
        </tr>
        <tr>
            <th scope="row">pcid</th>
            <td>1</td>
        </tr>
        <tr>
            <th scope="row">Tuning Machines Vendor &amp; Model</th>
            <td>Alice AO-020B1</td>
        </tr>
        <tr>
            <th scope="row">Tuning Machine Ratio</th>
            <td>14:1</td>
        </tr>
        <tr>
            <th scope="row">Tuning Machine Buttons</th>
            <td>Pearl White</td>
        </tr>
        <tr>
            <th scope="row">Electronics Vendor &amp; Model</th>
            <td>Cordoba GP-2 with Volume and Tone Control</td>
        </tr>
        <tr>
            <th scope="row">Pickup Type</th>
            <td>Undersaddle Piezo</td>
        </tr>
        <tr>
            <th scope="row">Battery Pack</th>
            <td>Battery Box - 9V</td>
        </tr>
        <tr>
            <th scope="row">Battery Pack Installation Location</th>
            <td>Lower Bout Treble Side</td>
        </tr>
        <tr>
            <th scope="row">Waist Width</th>
            <td>241mm (9 1/2")</td>
        </tr>
        <tr>
            <th scope="row">Target Instrument Weight</th>
            <td>3 lbs 3 oz (1.5 kg)</td>
        </tr>
        <tr>
            <th scope="row">Number of Strings</th>
            <td>6</td>
        </tr>
        <tr>
            <th scope="row">Tuning</th>
            <td>E-A-D-G-B-E</td>
        </tr>
        <tr>
            <th scope="row">Replacement Tuning Machine - Bass</th>
            <td>05707 - Cordoba Tuner Filigree Lyre GLD wPRL BS BTN Bass</td>
        </tr>
        <tr>
            <th scope="row">Headstock Logo</th>
            <td>Cordoba Arches Logo - Pearloid</td>
        </tr>
        <tr>
            <th scope="row">Replacement Tuning Machine Button</th>
            <td>N/A</td>
        </tr>
        <tr>
            <th scope="row">Replacement Truss Rod Cover</th>
            <td>N/A</td>
        </tr>
        <tr>
            <th scope="row">Replacement Truss Rod Wrench</th>
            <td>008-0000-001 - Truss Rod Wrench 4mm Allen Key</td>
        </tr>
        <tr>
            <th scope="row">Replacement Nut</th>
            <td>01052 - Cordoba Nut Composite 6 String Guitar 50mm x 6mm</td>
        </tr>
        <tr>
            <th scope="row">Replacement Pickguard</th>
            <td>N/A</td>
        </tr>
        <tr>
            <th scope="row">Replacement Saddle</th>
            <td>03508 - Cordoba Saddle Plastic 80mm x 3mm</td>
        </tr>
        <tr>
            <th scope="row">Replacement Battery Box &amp; Output Jack</th>
            <td>05013 - Cordoba Pickup Part Fishman Battery Box Output Jack Unit</td>
        </tr>
        <tr>
            <th scope="row">Replacement Case</th>
            <td>N/A</td>
        </tr>
        <tr>
            <th scope="row">Replacement Gig Bag</th>
            <td>N/A</td>
        </tr>
        <tr>
            <th scope="row">Compatible Case 1</th>
            <td>ACHUMPR-04072 - HumiCase Protégé Classical</td>
        </tr>
        <tr>
            <th scope="row">Compatible Case 2</th>
            <td>03754 - Cordoba Humidified Archtop Wood Case CLFL Full Size Brown</td>
        </tr>
        <tr>
            <th scope="row">Compatible Case 3</th>
            <td>ACCORGB-03780 - Cordoba Polyfoam Case Classical Full Size</td>
        </tr>
        <tr>
            <th scope="row">Compatible Gig Bag 1</th>
            <td>ACCASIB-03543 - Cordoba Deluxe Gig Bag Classical Full Size</td>
        </tr>
        <tr>
            <th scope="row">Fret Dimensions</th>
            <td>2.0mm (W) x 1.1mm (H)</td>
        </tr>
        <tr>
            <th scope="row">Nut String Spacing</th>
            <td>42mm</td>
        </tr>
        <tr>
            <th scope="row">Headplate</th>
            <td>Composite</td>
        </tr>
        <tr>
            <th scope="row">Fingerboard Material</th>
            <td>Rosewood</td>
        </tr>
        <tr>
            <th scope="row">Bridge Material</th>
            <td>Rosewood</td>
        </tr>
        <tr>
            <th scope="row">Saddle Material</th>
            <td>Plastic</td>
        </tr>
        <tr>
            <th scope="row">Fingerboard Radius</th>
            <td>Flat</td>
        </tr>
        <tr>
            <th scope="row">Bridge String Spacing</th>
            <td>52mm</td>
        </tr>
        <tr>
            <th scope="row">Recommended Strings</th>
            <td>Savarez 520R (Normal Tension)</td>
        </tr>
    </tbody>
</table>
<iframe width="100%" height="580" src="https://www.youtube.com/embed?enablejsapi=1&amp;origin=https%3A%2F%2Fvietthuong.vn" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" data-gtm-yt-inspected-7172713_33="true" id="98271657" data-gtm-yt-inspected-22="true" title="YouTube video player"></iframe> <!-- <div id="BSplugin0"><div> <script type="textjavascript"> jwplayer("BSplugin0").setup( { primary:"html5", width:"100%", height:"400", abouttext:"jwplayer 7", aspectratio:"16:9", image: "https:vietthuong.vnuploadvt.png", skin:"five", sources:[{file:"", type:"mp4",label:"720"},] }); <script> -->',          
                "short_description"=> "Kapok LD-14 là cây guitar phổ thông, với lớp sơn bóng đẹp, cần đàn làm từ gỗ mahogany, mang lại vẻ ngoài và âm thanh nổi bật."
            ],
            [
                "category_id"=> 3,
                "name"=> "SUZUKI SDG-6NL",
                "image"=> "Suzuki-SDG-6NL-1-270x270-450x471.jpg",
                "price"=> 3426000,
                "price_sale"=> 2650000,
                "description"=> '<h2 style="text-align: justify"><strong>Đàn guitar acoustic Tanglewood TWBB-SDE là mẫu đàn thiết kế đẹp, âm thanh chất lượng trong tầm giá 6 triệu. Thực sự bạn sẽ không tin vào chất lượng âm thanh và khả năng chơi với mức giá này.</strong></h2>

<p style="text-align: center">
    <img alt="" src="https://vietthuong.vn/image/catalog/tanglewood/tanglewoodguitars-twbbsde-01.jpg" style="height: 800px; width: 800px">
</p>

<ul>
    <li>Tanglewood Blackbird:<br>
        &nbsp;&nbsp;&nbsp;* Dựa trên sự thành công trên toàn cầu của Crossroad<br>
        &nbsp;&nbsp;&nbsp;* Tiếp tục lấy cảm hứng nhưng là vào những năm 1940 – 1950 tại Hoa Kỳ với nghệ nhân làm đàn Michael Saden cùng tập thể Tanglewood<br>
        &nbsp;&nbsp;&nbsp;* Đặc điểm cung cấp âm trầm chặt chẽ và âm cao phong phú<br>
        &nbsp;&nbsp;&nbsp;* Premium Plus EQ sẵn sàng cung cấp âm thanh cho sân khấu<br>
        &nbsp;&nbsp;&nbsp;* Lớp sơn làm nên thương hiệu như Crossroad hiện tại là màu than khói “Smokestack Black”<br>
        &nbsp;&nbsp;&nbsp;* Cùng 2 sản phẩm có mặt ở Việt Nam là TWBB-SD-E và TWBB-SFCE
    </li>
</ul>

<p style="text-align: center">
    <img alt="" src="https://vietthuong.vn/image/catalog/tanglewood/tanglewoodguitars-twbbsde-02.jpg" style="height: 800px; width: 800px">
</p>

<p style="text-align: center">
    <img alt="" src="https://vietthuong.vn/upload/content/images/Tanglewood/Tanglewood-TWBB-SD-E-1.jpg" style="height: 600px; width: 539px">
</p>

<p style="text-align: center">
    <img alt="" src="https://vietthuong.vn/upload/content/images/Tanglewood/Tanglewood-TWBB-SD-E-2.jpg" style="height: 600px; width: 452px">
</p>

<p style="text-align: center">
    <img alt="" src="https://vietthuong.vn/upload/content/images/Tanglewood/Tanglewood-TWBB-SD-E-3.jpg" style="height: 600px; width: 392px">
</p>

<p style="text-align: center">
    <img alt="" src="https://vietthuong.vn/upload/content/images/Tanglewood/Tanglewood-TWBB-SD-E-4.jpg" style="height: 600px; width: 429px">
</p>

<form name="fOrderReview">
    <div class="left">Bạn có hài lòng với nội dung sản phẩm không?</div>
    <div class="right">
        <a id="feedback_btncg" class="good"><i class="iconfb-good"></i> Hài lòng</a>
        <a id="feedback_btncb" class="bad"><i class="iconfb-bad"></i> Không hài lòng</a>
    </div>
    
    <div class="clearfix"></div>

    <div id="frm_good" class="reason hidden">
        <textarea name="feedback_mg" placeholder="Bạn có góp ý gì thêm không? (không bắt buộc)" id="feedback_mg"></textarea>
        <a id="feedback_btng">Gửi góp ý</a>
    </div>

    <div class="clearfix"></div>

    <div id="frm_bad" class="reason hidden">
        <textarea name="feedback_mb" id="feedback_mb" placeholder="Điều gì khiến Bạn không hài lòng? (không bắt buộc)"></textarea>
        <div class="row_line_comment">
            <div class="item_line_comment">
                <input type="text" name="feedback_name" id="feedback_name" value="" class="input_name" placeholder="Tên*">
            </div>
            <div class="item_line_comment">
                <input type="text" name="feedback_phone" id="feedback_phone" value="" class="input_name" placeholder="Số điện thoại*">
            </div>
        </div>
        <a id="feedback_btnb">Gửi góp ý</a>
    </div>

    <div class="clearfix"></div>

    <div class="errorss"></div>
</form>

<div class="thankss hidden">Cảm ơn Bạn đã đánh giá!</div>

<h3>Xem thêm</h3>

<table style="width: 100%">
    <tbody>
        <tr>
            <td>TYPE</td>
            <td>Electro Acoustic with Built in Tuner</td>
        </tr>
        <tr>
            <td>SHAPE</td>
            <td>Slope Shoulder Dreadnought</td>
        </tr>
        <tr>
            <td>TOP</td>
            <td>Hand Selected Mahogany</td>
        </tr>
        <tr>
            <td>BACK</td>
            <td>Mahogany</td>
        </tr>
        <tr>
            <td>SIDES</td>
            <td>Mahogany</td>
        </tr>
        <tr>
            <td>FINGERBOARD</td>
            <td>Techwood</td>
        </tr>
        <tr>
            <td>BRIDGE</td>
            <td>Techwood</td>
        </tr>
        <tr>
            <td>STRINGS</td>
            <td>Bronze Light</td>
        </tr>
        <tr>
            <td>ELECTRONICS</td>
            <td>Tanglewood Premium Plus</td>
        </tr>
        <tr>
            <td>FINISH</td>
            <td>Smokestack Black Satin</td>
        </tr>
        <tr>
            <td>Full Specification</td>
            <td>TWBBSDE</td>
        </tr>
    </tbody>
</table>

<iframe width="100%" height="580" src="https://www.youtube.com/embed?enablejsapi=1&amp;origin=https%3A%2F%2Fvietthuong.vn" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
',              
                "short_description"=> "Suzuki SDG-6NL, cây guitar dành cho sinh viên với giá hợp lý, kiểu dáng đẹp và âm thanh tuyệt vời, lý tưởng cho người mới bắt đầu."
            ],
            [
                "category_id"=> 4,
                "name"=> "GUITAR CLASSIC CORDOBA FUSION 5 KÈM BAG GUCLCOR-05407",
                "image"=> "guitar-classic-cordoba-fusion-5-kem-bag-guclcor-05407-450x471.jpg",
                "price"=> 13100000,
                "price_sale"=> null,
                "description"=> '<h2 style="text-align:justify"><strong><a href="https://vietthuong.vn/guitar-classic-cordoba-fusion-5-kem-bag-guclcor-05407" target="_blank">Guitar Classic Cordoba FUSION 5</a> được thiết kế dáng Cutaway giúp người chơi dễ dàng bấm ở các ngăn cao, hợp âm cuối một cách dễ dàng, vừa tăng thêm tính thẩm mỹ cho cây đàn. Mặt top của đàn là gỗ nguyên tấm Solid mang đến âm thanh trong trẻo, ấm áp, vang hơn góp phần cân bằng giữa âm Bass và âm Treble.</strong></h2>
<p style="text-align:center"><img alt="" src="https://vietthuongshop.vn/image/catalog2-san-pham/dan-guitar/cordoba-classic/guitar-classic-cordoba-fusion-5-kem-bag-guclcor-05407-02.jpg" style="height:800px; width:800px"></p>
<p style="text-align:justify">Đàn Guitar Classic Cordoba FUSION 5 được sản xuất vào năm 2021, là model mới nhất của thương hiệu nổi tiếng Cordoba. Thuộc series Fusion – dòng guitar có dây nylon chất lượng cao của hãng. Thiết kế đẹp mắt, nhỏ gọn so với những dòng cổ điển khác chỉ với 48mm rất dễ bấm, là lựa chọn hoàn hảo cho những ai có bàn tay nhỏ muốn chuyển từ đàn dây sắt qua đàn dây nylon.</p>
<p style="text-align:center"><img alt="" src="https://vietthuongshop.vn/image/catalog2-san-pham/dan-guitar/cordoba-classic/guitar-classic-cordoba-fusion-5-kem-bag-guclcor-05407.jpg" style="height:800px; width:800px"></p>
<p style="text-align:justify">Điểm mới của đàn là được trang bị hệ thống EQ Fishman bên trong khung đàn, không gây ảnh hưởng đến chất lượng của thùng đàn và độ vang của âm thanh.</p>
<p style="text-align:justify"><u><em><strong>Những điểm nổi bật về cây đàn Guitar Classic Cordoba FUSION 5</strong></em></u></p>
<ul>
    <li style="text-align:justify">Thiết kế đẹp mắt, nhỏ gọn, tiện lợi.</li>
    <li style="text-align:justify">Hệ thống EQ Fishman Presys II hiện đại – loại EQ nổi tiếng hiện nay trên thế giới.</li>
    <li style="text-align:justify">Âm thanh cổ điển pha lẫn hiện đại, trong trẻo, trầm ấm, vang dội vô cùng tuyệt vời, tạo cảm hứng cho người chơi giúp họ dễ dàng tạo ra những nốt nhạc một cách “phiêu” nhất.</li>
    <li style="text-align:justify">Dây đàn nylon Savarez “xịn” không làm đau tay và bộ khóa inox cao cấp, sang trọng, chống rỉ sét.</li>
    <li style="text-align:justify">Cordoba Fusion 5 sử dụng chất liệu gỗ tốt, mang đến âm thanh có độ ổn định tốt và bộ bền rất cao.</li>
    <li style="text-align:justify">Nằm trong phân khúc giá trên 10 triệu đồng đây được xem là cây đàn cao cấp có giá thành hợp lý phù hợp cho mọi đối tượng sử dụng khác nhau.</li>
</ul>
<p style="text-align:center"><img alt="" src="https://vietthuongshop.vn/image/catalog2-san-pham/dan-guitar/cordoba-classic/guitar-classic-cordoba-fusion-5-kem-bag-guclcor-05407-3.jpg"><img alt="" src="https://vietthuongshop.vn/image/catalog2-san-pham/dan-guitar/cordoba-classic/guitar-classic-cordoba-fusion-5-kem-bag-guclcor-05407-03.jpg" style="height:800px; width:800px"></p>
<p style="text-align:justify">Đàn Guitar Classic Cordoba FUSION 5 là sự lựa chọn tuyệt vời đối với những mới bắt đầu chơi đàn, các phụ huynh và cả người chơi đàn chuyên nghiệp. Nó là động lực cho người mới không thể ngừng tập đàn giúp họ có thể tiến bộ nhanh chóng. Nguồn cảm hứng bất tận cho người chơi khi biểu diễn cũng như thu âm với âm thanh chất lượng. Ngoài ra, đây cũng sẽ là món quà vô cùng tuyệt vời của các bậc phụ huynh dành tặng cho con yêu của mình.</p>

<form name="fOrderReview">
    <div class="left">Bạn có hài lòng với nội dung sản phẩm không?
        <div>
            <div class="right">
                <a id="feedback_btncg" class="good"><i class="iconfb-good"></i>Hài lòng</a>
                <a id="feedback_btncb" class="bad"><i class="iconfb-bad"></i>Không hài lòng</a>
            </div>
        </div>
    </div>
    <div class="clearfix">
        <div>
            <div id="frm_good" class="reason hidden">
                <textarea name="feedback_mg" placeholder="Bạn có góp ý gì thêm không? (không bắt buộc)" id="feedback_mg"></textarea>
                <a id="feedback_btng">Gửi góp ý</a>
            </div>
            <div class="clearfix">
                <div>
                    <div id="frm_bad" class="reason hidden">
                        <textarea name="feedback_mb" id="feedback_mb" placeholder="Điều gì khiến Bạn không hài lòng? (không bắt buộc)"></textarea>
                        <div class="row_line_comment">
                            <div class="item_line_comment">
                                <input type="text" name="feedback_name" id="feedback_name" value="" class="input_name" placeholder="Tên*">
                                <div>
                                    <div class="item_line_comment">
                                        <input type="text" name="feedback_phone" id="feedback_phone" value="" class="input_name" placeholder="Số điện thoại*">
                                        <div>
                                            <a id="feedback_btnb">Gửi góp ý</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="errorss">
                        <div>
                            <form>
                                <div class="thankss hidden">Cảm ơn Bạn đã đánh giá!</div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

Xem thêm

<table style="width:100%">
    <tbody>
        <tr>
            <td>Back Binding</td>
            <td>Composite</td>
        </tr>
        <tr>
            <td>Soundboard Thickness</td>
            <td>2.8 – 3.0 mm</td>
        </tr>
        <tr>
            <td>Family</td>
            <td>Cutaway &amp; Electric</td>
        </tr>
        <tr>
            <td>Build</td>
            <td>Fusion</td>
        </tr>
        <tr>
            <td>Construction</td>
            <td>Solid Top</td>
        </tr>
        <tr>
            <td>Body Top</td>
            <td>Solid Spruce</td>
        </tr>
        <tr>
            <td>Top Bracing Pattern</td>
            <td>Fan</td>
        </tr>
        <tr>
            <td>Soundhole Diameter</td>
            <td>84mm (3 13″)</td>
        </tr>
        <tr>
            <td>Rosette</td>
            <td>Pearl Style Decal</td>
        </tr>
        <tr>
            <td>Top Binding</td>
            <td>Composite</td>
        </tr>
        <tr>
            <td>Side Purfling Inlay</td>
            <td>N/A</td>
        </tr>
        <tr>
            <td>Back and Sides Wood</td>
            <td>Mahogany</td>
        </tr>
        <tr>
            <td>Back Purfling Inlay</td>
            <td>N/A</td>
        </tr>
        <tr>
            <td>Neck Material</td>
            <td>Mahogany</td>
        </tr>
        <tr>
            <td>Scale Length</td>
            <td>650mm (25.6″)</td>
        </tr>
        <tr>
            <td>Neck Shape</td>
            <td>C Shape</td>
        </tr>
        <tr>
            <td>Nut Width</td>
            <td>48mm (1 78″)</td>
        </tr>
        <tr>
            <td>Neck Thickness 1st Fret&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td>21mm</td>
        </tr>
        <tr>
            <td>Neck Thickness 9th Fret</td>
            <td>23mm</td>
        </tr>
        <tr>
            <td>Fingerboard Radius</td>
            <td>Flat</td>
        </tr>
        <tr>
            <td>Fingerboard Material</td>
            <td>Composite</td>
        </tr>
        <tr>
            <td>Number of Frets</td>
            <td>20</td>
        </tr>
        <tr>
            <td>Nut Material</td>
            <td>Graphite</td>
        </tr>
        <tr>
            <td>Bridge Material</td>
            <td>Composite</td>
        </tr>
        <tr>
            <td>String Material</td>
            <td>Nylon</td>
        </tr>
        <tr>
            <td>Electronics</td>
            <td>Fishman Presys II</td>
        </tr>
        <tr>
            <td>Strings</td>
            <td>Savarez</td>
        </tr>
        <tr>
            <td>Finish</td>
            <td>Polyurethane</td>
        </tr>
        <tr>
            <td>Price</td>
            <td>9.900.000 VNĐ</td>
        </tr>
        <tr>
            <td>Weight</td>
            <td>2.2kg</td>
        </tr>
    </tbody>
</table>
<iframe width="100%" height="580" src="https://www.youtube.com/embed?enablejsapi=1&amp;origin=https%3A%2F%2Fvietthuong.vn" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" data-gtm-yt-inspected-7172713_33="true" id="20181419" data-gtm-yt-inspected-22="true" title="YouTube video player"></iframe> <!-- <div id="BSplugin0"></div> <script type="textjavascript"> jwplayer("BSplugin0").setup( { primary:"html5", width:"100%", height:"400", abouttext:"jwplayer 7", aspectratio:"16:9", image: "https:vietthuong.vnuploadvt.png", skin:"five", sources:[{file:"", type:"mp4",label:"720"},] }); </script> ',              
                "short_description"=> "Cordoba Fusion 5, cây guitar classic thiết kế dáng cutaway hiện đại, dễ dàng tiếp cận các phím cao, đi kèm túi đựng chuyên nghiệp."
            ]
        ];
        

        foreach ($productsData as $data) {
            Product::create([
                'category_id' => $data['category_id'],
                'brand_id' => $brands->random()->id,
                'name' => $data['name'],
                'image' => $data['image'],
                'price' => $data['price'],
                'price_sale' => $data['price_sale'],
                'view' => $faker->numberBetween(0, 1000),
                'short_description' => $data['short_description'],
                
                'description' => $data['description'],
                'publish' => 2,
                'slug' => Str::slug($data['name']),
            ]);
        }
    }
}
