@extends('user.layouts.app')
@section('content')
    <style>
        .table> :not(caption)>tr>th {
            padding: 0.625rem 1.5rem .625rem !important;
            background-color: #6a6e51 !important;
        }

        .table>tr>td {
            padding: 0.625rem 1.5rem .625rem !important;
        }

        .table-bordered> :not(caption)>tr>th,
        .table-bordered> :not(caption)>tr>td {
            border-width: 1px 1px;
            border-color: #6a6e51;
        }

        .table> :not(caption)>tr>td {
            padding: .8rem 1rem !important;
        }

        .bg-success {
            background-color: #40c710 !important;
        }

        .bg-danger {
            background-color: #f44032 !important;
        }

        .bg-warning {
            background-color: #f5d700 !important;
            color: #000;
        }
    </style>
    <main class="pt-90">
        <main class="pt-90" style="padding-top: 0px;">
            <div class="mb-4 pb-4"></div>
            <section class="my-account container">
                <h2 class="page-title">Lịch sử mua</h2>
                <div class="row">
                    <div class="col-lg-2">
                        <ul class="account-nav">
                            @include('user.layouts.component.sidebarUser')
                        </ul>
                    </div>

                    <div class="col-lg-10">
                        <div class="products-grid row row-cols-2 row-cols-md-3" id="products-grid">
                            @foreach ($orders as $order)
                                @foreach ($order->orderDetails as $orderDetail)
                                    <div class="product-card-wrapper">
                                        <div class="product-card mb-3 mb-md-4 mb-xxl-5">
                                            <div class="pc__img-wrapper">
                                                <a href="{{ route('product.detail', $orderDetail->product->slug) }}">
                                                    <img loading="lazy"
                                                        src="{{ asset('uploads/products/product/'.$orderDetail->product->image) }}" width="330"
                                                        height="400" alt="{{ $orderDetail->product->name }}"
                                                        class="pc__img">
                                                </a>
                                            </div>

                                            <div class="pc__info position-relative">
                                                <p class="pc__category">
                                                    {{ $orderDetail->product->productCategory->name ?? 'Không có danh mục' }}
                                                </p>
                                                <h6 class="pc__title">
                                                    <a href="{{ route('product.detail', $orderDetail->product->slug) }}">
                                                        {{ $orderDetail->product->name }}
                                                    </a>
                                                </h6>
                                                <div class="product-card__price d-flex">
                                                    @if ($orderDetail->product->price_sale == null)
                                                        <span class="money price">{{ number_format($orderDetail->product->price) }} VNĐ</span>
                                                    @else
                                                        <span class="money price-old">{{ number_format($orderDetail->product->price) }} VNĐ</span>
                                                        <span class="money price">{{ number_format($orderDetail->product->price_sale) }} VNĐ</span>
                                                    @endif
                                                </div>
                                                <div class="product-card__review d-flex align-items-center">
                                                    <div class="reviews-group d-flex">
                                                        <svg class="review-star" viewBox="0 0 9 9"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <use href="#icon_star" />
                                                        </svg>
                                                        <svg class="review-star" viewBox="0 0 9 9"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <use href="#icon_star" />
                                                        </svg>
                                                        <svg class="review-star" viewBox="0 0 9 9"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <use href="#icon_star" />
                                                        </svg>
                                                        <svg class="review-star" viewBox="0 0 9 9"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <use href="#icon_star" />
                                                        </svg>
                                                        <svg class="review-star" viewBox="0 0 9 9"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <use href="#icon_star" />
                                                        </svg>
                                                    </div>
                                                    <span class="reviews-note text-lowercase text-secondary ms-1">{{ $orderDetail->product->view }}
                                                        lượt xem</span>
                                                </div>

                                                <button
                                                    class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist"
                                                    title="Add To Wishlist">
                                                    <svg width="16" height="16" viewBox="0 0 20 20" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <use href="#icon_heart" />
                                                    </svg>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>

                        <div class="divider"></div>
                        <div class="flex items-center justify-between flex-wrap gap-10 wgp-pagination">
                            {{ $orders->withQueryString()->links('pagination::bootstrap-5') }}
                        </div>
                    </div>

                </div>
            </section>
        </main>
    @endsection
