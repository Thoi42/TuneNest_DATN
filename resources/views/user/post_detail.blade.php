@extends('user.layouts.app')
@section('content')
    <main class="pt-90">
        <div class="breadcrumbs">
            <div class="container">
                <ul>
                    <li><a href="{{ route('home.index') }}">Trang chủ</a> <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </li>
                    <li><a href="#">{{ $post->title }}</a></li>
                </ul>
            </div>
        </div>
        <section class="post-single container">
            <div class="post-detail-cover row">
                <div class="col-lg-9">
                    <h3 class="title">{{ $post->title }}</h3>
                    <div class="meta_news">
                        <span class="date_add"> {{ date('d/m/Y', strtotime($post->created_at)) }}</span>
                        <span class="viewed"><i class="fa fa-eye" aria-hidden="true"></i> 92</span>
                    </div>
                    <div class="description_singer">
                        {!! $post->content !!}
                    </div>
                    {{-- album post --}}
                    <div class="title3">Albums</div>
                    <div class="custom-carousel">
                        <div class="carousel-inner">
                            @foreach($post->albums as $index => $album)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <img src="{{ $album->path }}" alt="{{ $album->title }}" />
                                    <div class="carousel-caption">
                                        <h5>{{ $album->title }}</h5>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    
                        <button class="carousel-control prev" onclick="moveSlide(-1)">❮</button>
                        <button class="carousel-control next" onclick="moveSlide(1)">❯</button>
                    </div>
                    
                  
                    {{-- end album post --}}
                </div>
                <div class="col-lg-3">
                    <div class="box">
                        <div class="title3 ">Mẹo quan tâm</div>

                        <div class="list-news list_news_top list_ad_top">
                          @foreach ($postWidgets as $item)
                            <div class="item">
                                <div class="item_l">
                                    <div class="image"><a
                                            href="{{ route('post.detail', $item->slug) }}"><img
                                                src="{{ asset('uploads/posts/posts/' . $item->image) }}"
                                                alt="{{ $post->title }}"
                                                title="{{ $post->title }}"></a></div>
                                </div>
                                <div class="item_r">
                                    <div class="caption">
                                        <div class="name"><a
                                                href="{{ route('post.detail', $item->slug) }}">
                                                <h3>{{ $post->title }}</h3>
                                                <span class="date_add"> {{ date('d/m/Y', strtotime($post->created_at)) }}</span>
                                            </a></div>
                                    </div>
                                </div>
                            </div>
                          @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="posts-carousel container pt-90">
          <div class="news_related">
            <div class="title3">Tin liên quan</div>
            <div class="list_news">
            <div class="row">
              @foreach ($postWidgets as $item)
                <div class="col-md-6">
                  <div class="item">
                    <div class="row">
                      <div class="col-md-4">
                    <div class="image"><a href="{{ route('post.detail', $item->slug) }}"><img src="{{ asset('uploads/posts/posts/' . $item->image) }}" alt="{{ $item->title }}" title="{{ $item->title }}"></a></div>
                    </div>
                    <div class="col-md-8">
                      <div class="caption">
                        <div class="name"><a href="{{ route('post.detail', $item->slug) }}"><h3 style="font-size: 18px">{{ $item->title }}</h3></a></div>
                        <div class="meta_news"><span class="date_add">{{ date('d/m/Y', strtotime($post->created_at)) }}</span><span class="viewed"><i class="fa fa-eye" aria-hidden="true"></i> 32</span></div>
                        <div class="description">{!! $item->description !!}</div>
                      </div>
                    </div>
                  </div>
                  </div>   
                </div>
              @endforeach
          </div>
          </div>
        </div>

        </section><!-- /.posts-carousel container -->
    </main>
@endsection
@section('scripts')
<script>
  document.addEventListener("DOMContentLoaded", function () {
    let currentIndex = 0;
    const slides = document.querySelectorAll(".inner article");
    const totalSlides = slides.length;
    const sliderWrapper = document.querySelector(".slider-wrapper");
    const dots = document.querySelectorAll(".slider-dot-control span");

    // Hàm chuyển slide
    function goToSlide(index) {
        currentIndex = (index + totalSlides) % totalSlides;
        sliderWrapper.style.transform = `translateX(-${currentIndex * 100}%)`;
        updateDots();
    }

    // Cập nhật điểm nhấn chấm tròn
    function updateDots() {
        dots.forEach((dot, index) => {
            dot.classList.toggle("active", index === currentIndex);
        });
    }

    // Điều khiển nút prev/next
    document.getElementById("prevSlide").addEventListener("click", function () {
        goToSlide(currentIndex - 1);
    });

    document.getElementById("nextSlide").addEventListener("click", function () {
        goToSlide(currentIndex + 1);
    });

    // Điều khiển chấm tròn để chuyển đến slide
    dots.forEach((dot, index) => {
        dot.addEventListener("click", () => {
            goToSlide(index);
        });
    });

    // Khởi tạo chấm tròn ban đầu
    updateDots();
});

</script>
@endsection