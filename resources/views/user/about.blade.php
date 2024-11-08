@extends('user.layouts.app')
@section('content')
    <main class="pt-90">
        <div class="mb-4 pb-4"></div>
        <section class="contact-us container">
            <div class="mw-930">
                <h2 class="page-title">Về Chúng Tôi</h2>
            </div>

            <div class="about-us__content pb-5 mb-5">
                <p class="mb-5">
                    <img loading="lazy" class="w-100 h-auto d-block" src="{{ asset('uploads/banner/bannerAbout.png') }}"
                        width="1410" height="550" alt="Hình ảnh về TuneNest" />
                </p>
                <div class="mw-930">
                    <h3 class="mb-4">CÂU CHUYỆN CỦA CHÚNG TÔI</h3>
                    <p class="fs-6 fw-medium mb-4">Chúng tôi là một cửa hàng chuyên cung cấp nhạc cụ chất lượng cao, phục vụ
                        cho mọi đối tượng từ người mới bắt đầu đến những nhạc sĩ chuyên nghiệp. Với sứ mệnh mang âm nhạc đến
                        gần hơn với mọi người, chúng tôi cam kết cung cấp những sản phẩm tốt nhất.</p>
                    <p class="mb-4">Từ những ngày đầu thành lập, chúng tôi đã nỗ lực không ngừng để mang đến cho khách
                        hàng những sản phẩm và dịch vụ tốt nhất. Chúng tôi tin rằng âm nhạc có thể thay đổi cuộc sống và
                        chúng tôi muốn là một phần trong hành trình đó của bạn.</p>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h5 class="mb-3">Sứ Mệnh Của Chúng Tôi</h5>
                            <p class="mb-3">Mang đến cho khách hàng những nhạc cụ chất lượng cao và dịch vụ tận tâm nhất.
                            </p>
                        </div>
                        <div class="col-md-6">
                            <h5 class="mb-3">Tầm Nhìn Của Chúng Tôi</h5>
                            <p class="mb-3">Trở thành cửa hàng nhạc cụ hàng đầu tại Việt Nam, nơi mọi người có thể tìm
                                thấy niềm đam mê âm nhạc của mình.</p>
                        </div>
                    </div>
                </div>

                @foreach ($showrooms as $showroom)
                    <div class="mw-930 d-lg-flex align-items-lg-center">
                        @if ($showroom->id % 2 == 0)
                            <!-- Kiểm tra xem showroom có vị trí chẵn -->
                            <!-- Ảnh bên trái, nội dung bên phải -->
                            <div class="image-wrapper col-lg-6">
                                <img class="h-auto" loading="lazy"
                                    src="{{ asset('uploads/showrooms') }}/{{ $showroom->image }}" width="450"
                                    height="500" alt="Hình ảnh showroom">
                            </div>
                            <div class="content-wrapper col-lg-6 px-lg-4">
                                <h5 class="mb-3">{{ $showroom->name }}</h5>
                                <p>{{ $showroom->address }}</p>
                                <p>{{ $showroom->phone }}</p>
                            </div>
                        @else
                            <!-- Nếu showroom ở vị trí lẻ -->
                            <!-- Nội dung bên trái, ảnh bên phải -->
                            <div class="content-wrapper col-lg-6 px-lg-4">
                                <h5 class="mb-3">{{ $showroom->name }}</h5>
                                <p>{{ $showroom->address }}</p>
                                <p>{{ $showroom->phone }}</p>
                            </div>
                            <div class="image-wrapper col-lg-6">
                                <img class="h-auto" loading="lazy"
                                    src="{{ asset('uploads/showrooms') }}/{{ $showroom->image }}" width="450"
                                    height="500" alt="Hình ảnh showroom">
                            </div>
                        @endif
                    </div>
                @endforeach

            </div>
        </section>


    </main>
@endsection
