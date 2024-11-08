@foreach ($products as $product)
<div class="product-card-wrapper">
  <div class="product-card mb-3 mb-md-4 mb-xxl-5">
    <div class="pc__img-wrapper">
      <div class="swiper-container background-img js-swiper-slider" data-settings='{"resizeObserver": true}'>
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <a href="{{ route('product.detail', $product->id) }}"><img loading="lazy" src="{{ asset($product->image) }}" width="330"
                height="400" alt="{{ $product->name }}" class="pc__img"></a>
          </div>
        </div>
      </div>
      <button
        class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside"
        data-aside="cartDrawer" title="Thêm vào giỏ hàng">Thêm vào giỏ hàng</button>
    </div>

    <div class="pc__info position-relative">
      <p class="pc__category">{{ $product->category->name }}</p>
      <h6 class="pc__title"><a href="{{ route('product.detail', $product->id) }}">{{ $product->name }}</a></h6>
      <div class="product-card__price d-flex">
        <span class="money price">{{ number_format($product->price) }} VNĐ</span>
      </div>
      <div class="product-card__review d-flex align-items-center">
        <div class="reviews-group d-flex">
          @for ($i = 0; $i < 5; $i++)
            <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
              <use href="#icon_star" />
            </svg>
          @endfor
        </div>
        <span class="reviews-note text-lowercase text-secondary ms-1">{{ $product->view }} lượt xem</span>
      </div>

      <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist"
        title="Thêm vào danh sách yêu thích">
        <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
          <use href="#icon_heart" />
        </svg>
      </button> 
    </div>
  </div>
</div>
@endforeach

