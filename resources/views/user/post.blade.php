@extends('user.layouts.app')
@section('content')
    <main class="pt-90">
        <section class="post-single container">
            <div class="advisory_latest post_banner">
                @if (!empty($post_view->first()))
                <div class="row-10 post-view">
                    <div class="col-left">
                        <div class="item ">
                            <div class="image"><a
                                    href="https://vietthuong.vn/mo-rong-kho-tang-am-thanh-voi-bo-tieng-gx-10-va-cac-san-pham-boss-moi-nhat-tren-boss-exchange"><img
                                        src="{{ asset('uploads/posts/posts/' . $post_view->first()->image) }}"
                                        alt="Mở rộng kho tàng âm thanh với bộ tiếng GX-10 và các sản phẩm Boss mới nhất trên Boss Exchange"
                                        title="Mở rộng kho tàng âm thanh với bộ tiếng GX-10 và các sản phẩm Boss mới nhất trên Boss Exchange"></a>
                            </div>
                            <div class="caption">
                                <div class="name"><a
                                        href="https://vietthuong.vn/mo-rong-kho-tang-am-thanh-voi-bo-tieng-gx-10-va-cac-san-pham-boss-moi-nhat-tren-boss-exchange">
                                        <h3>{{ $post_view->first()->title }}</h3>
                                    </a></div>
                                <div class="description">{!! $post_view->first()->description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-right">
                        @php
                            $nextTwoPosts = $post_view->skip(1)->take(2);
                        @endphp
                        @foreach ($nextTwoPosts as $item)
                            <div class="item ">
                                <div class="image"><a
                                        href="https://vietthuong.vn/mo-rong-kho-tang-am-thanh-voi-bo-tieng-gx-10-va-cac-san-pham-boss-moi-nhat-tren-boss-exchange"><img
                                            src="{{ asset('uploads/posts/posts/' . $item->image) }}"
                                            alt="Mở rộng kho tàng âm thanh với bộ tiếng GX-10 và các sản phẩm Boss mới nhất trên Boss Exchange"
                                            title="Mở rộng kho tàng âm thanh với bộ tiếng GX-10 và các sản phẩm Boss mới nhất trên Boss Exchange"></a>
                                </div>
                                <div class="caption">
                                    <div class="name"><a
                                            href="https://vietthuong.vn/mo-rong-kho-tang-am-thanh-voi-bo-tieng-gx-10-va-cac-san-pham-boss-moi-nhat-tren-boss-exchange">
                                            <h3>{{ $item->title }}</h3>
                                        </a></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif
                <div class="category">
                    <ul class="menu-cate d-flex align-items-center justify-center">
                        @foreach ($postCategoriesParent as $category)
                        <li class="menu-cate-item">
                            <a href="{{ route('post.category',$category->slug ) }}">
                                <div class="text">{{ $category->name }}</div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
               <div class="row">
                    <div class="col-lg-12">
                        @foreach ($post_categories as $category)
                            <div class="list_advisory">
                                <h2 class="title_home2">{{ $category->name }}</h2>
                                <div class="xemtatca"><a class="post_category" href="{{ route('post.category.all',$category->slug ) }}">Xem tất cả</a></div>
                                <div class="row">  
                                    @foreach ($category->posts->where('publish',2)->take(4) as $post)
                                        <div class="col-md-3 list-post">
                                            <div class="item">
                                                <div class="image"><a href="{{ route('post.detail',$post->slug) }}">
                                                    <img src="{{ asset('uploads/posts/posts/'. $post->image) }}" alt="Ai nên chọn Casio CDP-S110?" title="Ai nên chọn Casio CDP-S110?"></a>
                                                </div>
                                                <div class="name">
                                                    <a href="{{ route('post.detail',$post->slug) }}">
                                                        <h3>{{ $post->title }}</h3>
                                                    </a>
                                                </div>
                                                <div class="read-more d-flex align-items-center justify-content-between">
                                                    <a href="{{ route('post.detail',$post->slug) }}">Đọc thêm</a>
                                                    <span>{{ date('d/m/Y', strtotime($post->created_at)) }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach 
                                </div>
                            </div>
                         @endforeach 
                    </div>   
               </div>
               <div class="flex items-center justify-between flex-wrap gap-10 wgp-pagination">
                {{ $post_categories->appends(request()->all())->links('pagination::bootstrap-5') }}
            </div>
        </section>
       
    </main>
@endsection
