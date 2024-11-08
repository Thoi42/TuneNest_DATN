<section class="products-grid container">
    <h2 class="section-title text-center mb-3 pb-xl-3 mb-xl-4">Tin tức - Sự kiện</h2>

    <div class="row post-index">
        @foreach ($posts as $item)
        <div class="item col-lg-3 mb-4">
            <div class="image">
              <a href="{{ route('post.detail', $item->slug) }}"><img class="img-fluid" src="{{ asset('uploads/posts/posts/' . $item->image) }}" alt=""></a>
            </div>
            <div class="caption">
                <div class="title">
                  <h4> <a href="{{ route('post.detail', $item->slug) }}">{{ $item->title }}</a></h4>
                </div>
                <div class="description">
                    <span>
                      {!! $item->description !!}
                    </span>
                </div>
            </div>
            <div class="btn-readnews">
                <a href="{{ route('post.detail', $item->slug) }}">Xem ngay</a>
            </div>
            
        </div>
        @endforeach
    </div><!-- /.row -->
    
    {{-- <div class="text-center mt-2">
      <a class="btn-link btn-link_lg default-underline text-uppercase fw-medium" href="#">Load More</a>
    </div> --}}
  </section>