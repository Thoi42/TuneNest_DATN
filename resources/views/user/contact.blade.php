@extends('user.layouts.app')
@section('content')
    <main class="pt-90">
        <div class="mb-4 pb-4"></div>
        <section class="contact-us container">
            <div class="mw-930">
                <h2 class="page-title">LIÊN HỆ VỚI CHÚNG TÔI</h2>
            </div>
        </section>

        <hr class="mt-2 text-secondary " />
        <div class="mb-4 pb-4"></div>

        <section class="contact-us container">
            <div class="mw-930 row">
                <div class="contact-us__form col-lg-6 col-sm-6">
                    <form name="contact-us-form" class="needs-validation" novalidate="" method="POST">
                        <h3 class="mb-5">Liên Hệ Với Chúng Tôi</h3>
                        <div class="form-floating my-4">
                            <input type="text" class="form-control" name="name" placeholder="Tên *" required="">
                            <label for="contact_us_name">Tên *</label>
                            <span class="text-danger"></span>
                        </div>
                        <div class="form-floating my-4">
                            <input type="text" class="form-control" name="phone" placeholder="Số điện thoại *" required="">
                            <label for="contact_us_name">Số điện thoại *</label>
                            <span class="text-danger"></span>
                        </div>
                        <div class="form-floating my-4">
                            <input type="email" class="form-control" name="email" placeholder="Địa chỉ email *" required="">
                            <label for="contact_us_name">Địa chỉ email *</label>
                            <span class="text-danger"></span>
                        </div>
                        <div class="my-4">
                            <textarea class="form-control form-control_gray" name="comment" placeholder="Tin nhắn của bạn" cols="30" rows="8" required=""></textarea>
                            <span class="text-danger"></span>
                        </div>
                        <div class="my-4">
                            <button type="submit" class="btn btn-primary">Gửi</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 col-sm-6 map">
                    <h3>Địa chỉ kho tổng TuneNest</h3>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7836.888243204607!2d106.6265813!3d10.853786!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752b6c59ba4c97%3A0x535e784068f1558b!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEZQVCBQb2x5dGVjaG5pYw!5e0!3m2!1sen!2s!4v1730710965232!5m2!1sen!2s" width="100%" height="80%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </section>

        {{-- <section class="contact-us container mw-930">
            <h3 class="mw-930">Bản Đồ Địa Điểm</h3>
            <div id="mw-930"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7836.888243204607!2d106.6265813!3d10.853786!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752b6c59ba4c97%3A0x535e784068f1558b!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEZQVCBQb2x5dGVjaG5pYw!5e0!3m2!1sen!2s!4v1730710965232!5m2!1sen!2s" width="100%" height="auto" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
        </section> --}}
    </main>
@endsection
