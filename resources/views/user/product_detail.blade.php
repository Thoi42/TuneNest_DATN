@extends('user.layouts.app')
@section('content')
    <main class="container" style="width:800px; margin:0 auto; padding-top: 100px;">
        <div class="product-single__comments-list">
            @forelse($comments as $comment)
                <div class="product-single__comments-item">
                    <div class="customer-avatar">
                        <img loading="lazy" src="assets/images/avatar.jpg" alt="" />
                    </div>
                    <div class="customer-review">
                        <div class="customer-name">
                            <h6>{{ $comment->customer->name }}</h6>
                        </div>
                        <div class="reviews-group d-flex">
                            @for ($i = 1; $i <= 5; $i++)
                                <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"
                                    fill="{{ $i <= $comment->rating ? '#FFD700' : '#ccc' }}">
                                    <use href="#icon_star" />
                                </svg>
                            @endfor
                        </div>
                        <div class="review-date">{{ $comment->created_at->format('F d, Y') }}</div>
                        <div class="review-text">
                            <p>{{ $comment->comment }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <p>Chưa có đánh giá về sản phẩm. Giúp TuneNest biết về cảm nhận của bạn về sản phẩm</p>
            @endforelse
        </div>

        <div class="product-single__review-form">
            @if (Auth::guard('customer')->check())
                <form method="POST" action="{{ route('product.comment', ['proId' => $product->id]) }}">
                    @csrf
                    <h5>Hãy trở thành người đầu tiên bình luận về sản phẩm này“{{ $product->name }}”</h5>
                    <div class="select-star-rating">
                        <label>Đánh giá *</label>
                        <span class="star-rating">
                            @for ($i = 1; $i <= 5; $i++)
                                <svg class="star-rating__star-icon" width="12" height="12" fill="#ccc"
                                    viewBox="0 0 12 12" data-rating="{{ $i }}"
                                    onclick="document.getElementById('form-input-rating').value = {{ $i }};">
                                    <path
                                        d="M11.1429 5.04687C11.1429 4.84598 10.9286 4.76562 10.7679 4.73884L7.40625 4.25L5.89955 1.20312C5.83929 1.07589 5.72545 0.928571 5.57143 0.928571C5.41741 0.928571 5.30357 1.07589 5.2433 1.20312L3.73661 4.25L0.375 4.73884C0.207589 4.76562 0 4.84598 0 5.04687C0 5.16741 0.0870536 5.28125 0.167411 5.3683L2.60491 7.73884L2.02902 11.0871C2.02232 11.1339 2.01563 11.1741 2.01563 11.221C2.01563 11.3951 2.10268 11.5558 2.29688 11.5558C2.39063 11.5558 2.47768 11.5223 2.56473 11.4754L5.57143 9.89509L8.57813 11.4754C8.65848 11.5223 8.75223 11.5558 8.84598 11.5558C9.04018 11.5558 9.12054 11.3951 9.12054 11.221C9.12054 11.1741 9.12054 11.1339 9.11384 11.0871L8.53795 7.73884L10.9688 5.3683C11.0558 5.28125 11.1429 5.16741 11.1429 5.04687Z" />
                                </svg>
                            @endfor
                        </span>
                        <input type="hidden" id="form-input-rating" name="rating" value="1" />
                        <!-- Giá trị mặc định là 1 -->
                    </div>
                    <div class="mb-4">
                        <textarea id="form-input-review" class="form-control form-control_gray" placeholder="Bình luận về sản phẩm ..." cols="30"
                            rows="8" name="comment"></textarea>
                        @error('comment')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-action">
                        <button type="submit" class="btn btn-primary">Bình Luận</button>
                    </div>
                </form>
            @else
                <div class="alert alert-danger">
                    <strong>Bạn cần <a href="{{ route('customer.login') }}">đăng nhập</a> để bình luận</strong>
                </div>
            @endif
        </div>
    </main>
@endsection
