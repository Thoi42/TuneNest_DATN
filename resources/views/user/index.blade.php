@extends('user.layouts.app')
@section('content')
<style>
    .swiper-slide {
    width: 1100px;
}
</style>
<main>

    <section class="swiper-container js-swiper-slider swiper-number-pagination slideshow" data-settings='{
        "autoplay": {
          "delay": 5000
        },
        "slidesPerView": 1,
        "effect": "fade",
        "loop": true
      }'>
      <div class="swiper-wrapper">
    <div class="swiper-slide">
        <div class="overflow-hidden position-relative h-100">
            <div class="slideshow-character position-absolute bottom-0 pos_right-center">
                <img loading="lazy" src="{{ asset($banner->image ?? 'path/to/default/image.jpg') }}" width="542" height="733"
                    alt="Woman Fashion 1"
                    class="slideshow-character__img animate animate_fade animate_btt animate_delay-9 w-auto h-auto" />
                <div class="character_markup type2">
                    <p
                        class="text-uppercase font-sofia mark-grey-color animate animate_fade animate_btt animate_delay-10 mb-0">
                        Tunenest</p>
                </div>
            </div>
            <div class="slideshow-text container position-absolute start-50 top-50 translate-middle">
                <h6 class="text_dash text-uppercase fs-base fw-medium animate animate_fade animate_btt animate_delay-3">
                    Hàng Mới Nhập</h6>
                <h2 class="h1 fw-normal mb-0 animate animate_fade animate_btt animate_delay-5">{{$banner->title?? 'Đang Cập Nhật'}}</h2>
                <h2 class="h1 fw-bold animate animate_fade animate_btt animate_delay-5">{{$banner->strong_title ?? 'Đang Cập Nhật'}}</h2>
                <a href="#"
                    class="btn-link btn-link_lg default-underline fw-medium animate animate_fade animate_btt animate_delay-7">Shop
                    Now</a>
            </div>
        </div>
    </div>

    <div class="swiper-wrapper">
    @if ($banners && count($banners) > 0)
        @foreach ($banners as $banner)
        <div class="swiper-slide">
            <div class="overflow-hidden position-relative h-100">
                <div class="slideshow-character position-absolute bottom-0 pos_right-center">
                    <img loading="lazy" src="{{ asset($banner->image ?? 'path/to/default/image.jpg') }}" width="400" height="733"
                        alt="{{ $banner->title ?? 'Đang Cập Nhật' }}"
                        class="slideshow-character__img animate animate_fade animate_btt animate_delay-9 w-auto h-auto" />
                    <div class="character_markup">
                        <p class="text-uppercase font-sofia fw-bold animate animate_fade animate_rtl animate_delay-10">{{ $banner->title ?? 'Đang Cập Nhật' }}</p>
                    </div>
                </div>
                <div class="slideshow-text container position-absolute start-50 top-50 translate-middle">
                    <h6 class="text_dash text-uppercase fs-base fw-medium animate animate_fade animate_btt animate_delay-3">
                        {{ $banner->subtitle ?? 'Hàng Mới Nhập' }}</h6>
                    <h2 class="h1 fw-normal mb-0 animate animate_fade animate_btt animate_delay-5">{{ $banner->title ?? 'Đang Cập Nhật' }}</h2>
                    <h2 class="h1 fw-bold animate animate_fade animate_btt animate_delay-5">{{ $banner->strong_title ?? 'Đang Cập Nhật' }}</h2>
                    <a href="#"
                        class="btn-link btn-link_lg default-underline fw-medium animate animate_fade animate_btt animate_delay-7">Shop
                        Now</a>
                </div>
            </div>
        </div>
        @endforeach
    @else
    <div class="swiper-slide">
        <div class="overflow-hidden position-relative h-100">
            <div class="slideshow-character position-absolute bottom-0 pos_right-center">
                <img loading="lazy" src="{{ asset('path/to/default/image.jpg') }}" width="400" height="690"
                    alt="Đang Cập Nhật"
                    class="slideshow-character__img animate animate_fade animate_rtl animate_delay-10 w-auto h-auto" />
            </div>
            <div class="slideshow-text container position-absolute start-50 top-50 translate-middle">
                <h6 class="text_dash text-uppercase fs-base fw-medium animate animate_fade animate_btt animate_delay-3">
                    Ưu Đãi Mới</h6>
                <h2 class="h1 fw-normal mb-0 animate animate_fade animate_btt animate_delay-5">Đang Cập Nhật</h2>
                <h2 class="h1 fw-bold animate animate_fade animate_btt animate_delay-5">Đang Cập Nhật</h2>
                <a href="#"
                    class="btn-link btn-link_lg default-underline fw-medium animate animate_fade animate_btt animate_delay-7">Shop
                    Now</a>
            </div>
        </div>
    </div>
    @endif
</div>


      <div class="container">
        <div
          class="slideshow-pagination slideshow-number-pagination d-flex align-items-center position-absolute bottom-0 mb-5">
        </div>
      </div>
    </section>
    <div class="container mw-1620 bg-white border-radius-10">
      <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>
      <section class="category-carousel container">
        <h2 class="section-title text-center mb-3 pb-xl-2 mb-xl-4">Các thương hiệu</h2>

        <div class="position-relative">
          <div class="swiper-container js-swiper-slider" data-settings='{
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": 8,
              "slidesPerGroup": 1,
              "effect": "none",
              "loop": true,
              "navigation": {
                "nextEl": ".products-carousel__next-1",
                "prevEl": ".products-carousel__prev-1"
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 2,
                  "slidesPerGroup": 2,
                  "spaceBetween": 15
                },
                "768": {
                  "slidesPerView": 4,
                  "slidesPerGroup": 4,
                  "spaceBetween": 30
                },
                "992": {
                  "slidesPerView": 6,
                  "slidesPerGroup": 1,
                  "spaceBetween": 45,
                  "pagination": false
                },
                "1200": {
                  "slidesPerView": 8,
                  "slidesPerGroup": 1,
                  "spaceBetween": 60,
                  "pagination": false
                }
              }
            }'>
            <div class="swiper-wrapper">
              @foreach ($brands as $brand)
              <div class="swiper-slide">
                <img loading="lazy" class="w-100 h-auto mb-3" src="{{asset('uploads/brands/'.$brand->image)}}" width="124"
                  height="124" alt="{{ $brand->name }}" />
                <div class="text-center">
                  <a href="#" class="menu-link fw-medium">{{ $brand->name }}</a>
                </div>
              </div>
              @endforeach
            </div><!-- /.swiper-wrapper -->
          </div><!-- /.swiper-container js-swiper-slider -->

          <div
            class="products-carousel__prev products-carousel__prev-1 position-absolute top-50 d-flex align-items-center justify-content-center">
            <svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
              <use href="#icon_prev_md" />
            </svg>
          </div><!-- /.products-carousel__prev -->
          <div
            class="products-carousel__next products-carousel__next-1 position-absolute top-50 d-flex align-items-center justify-content-center">
            <svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
              <use href="#icon_next_md" />
            </svg>
          </div><!-- /.products-carousel__next -->
        </div><!-- /.position-relative -->
      </section>

      <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>

      <section class="hot-deals container">
        <h2 class="section-title text-center mb-3 pb-xl-3 mb-xl-4">Hot Deals</h2>
        <div class="row">
          <div
            class="col-md-6 col-lg-4 col-xl-20per d-flex align-items-center flex-column justify-content-center py-4 align-items-md-start">
            <h2>Giảm giá cuối năm</h2>
            <h2 class="fw-bold">Up to 60% Off</h2>

            <div class="position-relative d-flex align-items-center text-center pt-xxl-4 js-countdown mb-3"
              data-date="18-3-2024" data-time="06:50">
              <div class="day countdown-unit">
                <span class="countdown-num d-block"></span>
                <span class="countdown-word text-uppercase text-secondary">Days</span>
              </div>

              <div class="hour countdown-unit">
                <span class="countdown-num d-block"></span>
                <span class="countdown-word text-uppercase text-secondary">Hours</span>
              </div>

              <div class="min countdown-unit">
                <span class="countdown-num d-block"></span>
                <span class="countdown-word text-uppercase text-secondary">Mins</span>
              </div>

              <div class="sec countdown-unit">
                <span class="countdown-num d-block"></span>
                <span class="countdown-word text-uppercase text-secondary">Sec</span>
              </div>
            </div>

            <a href="#" class="btn-link default-underline text-uppercase fw-medium mt-3">View All</a>
          </div>
          <div class="col-md-6 col-lg-8 col-xl-80per">
            <div class="position-relative">
              <div class="swiper-container js-swiper-slider" data-settings='{
                  "autoplay": {
                    "delay": 5000
                  },
                  "slidesPerView": 4,
                  "slidesPerGroup": 4,
                  "effect": "none",
                  "loop": false,
                  "breakpoints": {
                    "320": {
                      "slidesPerView": 2,
                      "slidesPerGroup": 2,
                      "spaceBetween": 14
                    },
                    "768": {
                      "slidesPerView": 2,
                      "slidesPerGroup": 3,
                      "spaceBetween": 24
                    },
                    "992": {
                      "slidesPerView": 3,
                      "slidesPerGroup": 1,
                      "spaceBetween": 30,
                      "pagination": false
                    },
                    "1200": {
                      "slidesPerView": 4,
                      "slidesPerGroup": 1,
                      "spaceBetween": 30,
                      "pagination": false
                    }
                  }
                }'>
                <div class="swiper-wrapper">
                  @foreach ($product_price as $product)
                  <div class="swiper-slide product-card product-card_style3">
                    <div class="pc__img-wrapper">
                      <a href="{{ route('product.detail', $product->slug)}}">
                        <img loading="lazy" src="{{asset('/uploads/products/product/'.$product->image)}}" width="258" height="313"
                          alt="{{ $product->name }}" class="pc__img">
                        <img loading="lazy" src="{{asset('/uploads/products/product/'.$product->image)}}" width="258" height="313"
                          alt="{{ $product->name }}" class="pc__img pc__img-second">
                      </a>
                    </div>

                    <div class="pc__info position-relative">
                      <h6 class="pc__title"><a href="{{ route('product.detail', $product->slug) }}">{{ $product->name }}</a></h6>
                      <div class="product-card__price d-flex">
                       
                        @if ($product->price_sale > 0)
                        <span class="money price me-2"> 
                          {{ number_format($product->price_sale)}} VNĐ
                        </span>
                        <span class="money price text-secondary"><del>{{ number_format($product->price) }} VNĐ</del>
                        @else
                          {{ number_format($product->price)}} VNĐ
                        @endif
                        </span>
                      </div>

                      <div
                        class="anim_appear-bottom position-absolute bottom-0 start-0 d-none d-sm-flex align-items-center bg-body">
                        {{-- <form action="{{ route('cart.add',$product->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button class="btn-link btn-link_lg me-4 text-uppercase fw-medium"
                            data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
                          </form> --}}
                          <a href="#" data-url="{{ route('cart.add', $product->id )}}" class="btn-link btn-link_lg me-4 text-uppercase fw-medium add-to-cart"
                          data-aside="cartDrawer" title="Add To Cart">Add To Cart</a>

                          <a href="{{ route('product.detail', $product->slug) }}" class="btn-link btn-link_lg me-4 text-uppercase fw-medium" title="Quick view">
                            <span class="">Quick View</span>
                          </a>
                          <button class="pc__btn-wl bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                            <svg width="16" height="16" viewBox="0 0 20 20" fill="none"
                              xmlns="http://www.w3.org/2000/svg">
                              <use href="#icon_heart" />
                            </svg>
                          </button>
                        
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div><!-- /.swiper-wrapper -->
              </div><!-- /.swiper-container js-swiper-slider -->
            </div><!-- /.position-relative -->
          </div>
        </div>
      </section>

      <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>

      <section class="category-banner container">
        <h2 class="section-title text-center mb-3 pb-xl-3 mb-xl-4">Nhiều lượt xem nhất</h2>
        <div class="row">
          @foreach ($product_views as $product)
          <div class="col-md-6">
            <div class="category-banner__item border-radius-10 mb-5">
              <img loading="lazy" class="h-auto" src="{{asset('uploads/products/product/'.$product->image)}}" width="690" height="665"
                alt="{{ $product->name }}" />
              <div class="category-banner__item-mark">
                {{ $product->view }} Lượt xem
              </div>
              <div class="category-banner__item-content">
                <h3 class="mb-0">{{ $product->name }}</h3>
                <a href="#" class="btn-link default-underline text-uppercase fw-medium">Xem ngay</a>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </section>

      <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>

      <section class="products-grid container">
        <h2 class="section-title text-center mb-3 pb-xl-3 mb-xl-4">Top sản phẩm</h2>

        <div class="row">
          @foreach ($products as $product)
          <div class="col-6 col-md-4 col-lg-3">
            <div class="product-card product-card_style3 mb-3 mb-md-4 mb-xxl-5">
              <div class="pc__img-wrapper">
                <a href="{{ route('product.detail', $product->slug) }}">
                  <img loading="lazy" src="{{asset('uploads/products/product/'.$product->image)}}" width="330" height="400"
                    alt="{{ $product->name }}" class="pc__img">
                </a>
              </div>

              <div class="pc__info position-relative">
                <h6 class="pc__title">{{ $product->name }}</h6>
                <div class="product-card__price d-flex align-items-center">
                  @if ($product->price_sale == null)
                  <span class="money price text-secondary">{{ number_format($product->price) }} VNĐ</span>
                  @else
                  <span class="money price-old">{{ number_format($product->price) }} VNĐ</span>
                  <span class="money price text-secondary">{{ number_format($product->price_sale) }} VNĐ</span>
                  @endif
                </div>

                <div
                  class="anim_appear-bottom position-absolute bottom-0 start-0 d-none d-sm-flex align-items-center bg-body">
                  <button class="btn-link btn-link_lg me-4 text-uppercase fw-medium js-add-cart js-open-aside"
                    data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
                  <button class="btn-link btn-link_lg me-4 text-uppercase fw-medium js-quick-view"
                    data-bs-toggle="modal" data-bs-target="#quickView" title="Quick view">
                    <span class="d-none d-xxl-block">Quick View</span>
                    <span class="d-block d-xxl-none"><svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <use href="#icon_view" />
                      </svg></span>
                  </button>
                  <button class="pc__btn-wl bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                    <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_heart" />
                    </svg>
                  </button>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div><!-- /.row -->

        {{-- <div class="text-center mt-2">
          <a class="btn-link btn-link_lg default-underline text-uppercase fw-medium" href="#">Load More</a>
        </div> --}}
      </section>
    </div>

    <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>

  </main>

@endsection

