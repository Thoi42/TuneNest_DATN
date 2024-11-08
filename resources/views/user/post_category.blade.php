@extends('user.layouts.app')
@section('content')
    <main class="pt-90">
        <div class="breadcrumbs">
            <div class="container">
                <ul>
                    <li><a href="{{ route('home.index') }}">Trang chủ</a> <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </li>
                    <li><a href="{{ route('post.category',$categories->parent->slug) }}">{{ $categories->parent->name }}</a><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                    <li><a href="#">{{ $categories->name }}</a></li>
                </ul>
            </div>
        </div>

        <section class="post-single container">
                <h3 class="mb-4">{{ $categories->name }}</h3>
                @foreach ($posts as $post)
                    <div class="row mt-3">
                        <div class="col-lg-9 cl-l">
                            <div class="row post-category">
                                <div class="col-3">
                                    <div class="image">
                                        <a href="">
                                            <img src="{{ asset('uploads/posts/posts/' . $post->image  ) }}" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="post-category-content">
                                        <a href="{{ route('post.detail',$post->slug) }}" class="title">
                                            <h3>{{ $post->title }}</h3>
                                        </a>
                                        <a href="{{ route('post.detail',$post->slug) }}" class="post-category-description">
                                            <p>{!! $post->description !!}</p>
                                        </a>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <span><i class="fa-regular fa-eye"></i> {{ $post->view }}</span>
                                            <a href="{{ route('post.detail',$post->slug) }}"><span>Xem chi tiết</span> <i class="fa-solid fa-angle-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 cl-r"></div>
                </div>
                @endforeach
               
               <div class="flex items-center justify-between flex-wrap gap-10 wgp-pagination">
                {{ $posts->appends(request()->all())->links('pagination::bootstrap-5') }}
                </div>
        </section>
    </main>
@endsection
