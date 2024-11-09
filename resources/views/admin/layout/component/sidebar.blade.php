<div class="section-menu-left">
    <div class="box-logo">
        <a href="{{ route('dashboard.index')}}" id="site-logo-inner">
            <img class="" id="logo_header" alt="" src="{{ asset('images/logo/logo.jpg') }}"
                data-light="{{ asset('images/logo/logo.jpg') }}" data-dark="{{ asset('images/logo/logo.jpg') }}">
        </a>
        <div class="button-show-hide">
            <i class="icon-menu-left"></i>
        </div>
    </div>
    <div class="center">
        <div class="center-item">
            <div class="center-heading">Main Home</div>
            <ul class="menu-list">
                <li class="menu-item">
                    <a href="{{ route('dashboard.index') }}" class="">
                        <div class="icon"><i class="icon-grid"></i></div>
                        <div class="text">Dashboard</div>
                    </a>
                </li>
            </ul>
        </div>
        <div class="center-item">
            <ul class="menu-list">
                <li class="menu-item has-children">
                    <a href="javascript:void(0);" class="menu-item-button">
                        <div class="icon"><i class="icon-file"></i></div>
                        <div class="text">Bài viết</div>
                    </a>
                    <ul class="sub-menu">
                        <li class="sub-menu-item">
                            <a href="{{ route('postCategory.index') }}" class="">
                                <div class="text">Danh mục bài viết</div>
                            </a>
                        </li>
                        <li class="sub-menu-item">
                            <a href="{{ route('post.index') }}" class="">
                                <div class="text">Bài viêt</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item has-children">
                    <a href="javascript:void(0);" class="menu-item-button">
                        <div class="icon"><i class="icon-file"></i></div>
                        <div class="text">Showrooms</div>
                    </a>
                    <ul class="sub-menu">
                        <li class="sub-menu-item">
                            <a href="{{ route('showroomcategory.index') }}" class="">
                                <div class="text">Danh Sách Showrooms</div>
                            </a>
                        </li>
                        <li class="sub-menu-item">
                            <a href="{{route('Kho.index')}}" class="">
                                <div class="text">Sản Phẩm Trong Kho Tổng</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item ">
                    <a href="{{ route('Kho.index')}}" class="menu-item-button">
                        <div class="icon"><i class="icon-layers"></i></div>
                        <div class="text">Kho</div>
                    </a>
                </li>
                <li class="menu-item ">
                    <a href="{{ route('banner.index')}}" class="menu-item-button">
                        <div class="icon"><i class="icon-layers"></i></div>
                        <div class="text">Banner</div>
                    </a>
                </li>
                <li class="menu-item has-children">
                    <a href="javascript:void(0);" class="menu-item-button">
                        <div class="icon"><i class="icon-shopping-cart"></i></div>
                        <div class="text">Sản phẩm</div>
                    </a>
                    <ul class="sub-menu">
                        <li class="sub-menu-item">
                            <a href="{{ route('productCategory.index')}}" class="">
                                <div class="text">Danh mục sản phẩm</div>
                            </a>
                        </li>
                        <li class="sub-menu-item">
                            <a href="{{ route('product.index')}}" class="">
                                <div class="text">Sản phẩm</div>
                            </a>
                        </li>
                        <li class="sub-menu-item">
                            <a href="{{ route('brand.index')}}" class="">
                                <div class="text">Thương hiệu</div>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="menu-item has-children">
                    <a href="javascript:void(0);" class="menu-item-button">
                        <div class="icon"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        </div>
                        <div class="text">Đơn hàng</div>
                    </a>
                    <ul class="sub-menu">
                        <li class="sub-menu-item">
                            <a href="{{ route('order.index') }}" class="">
                                <div class="text">Tất cả đơn hàng</div>
                            </a>
                        </li>
                        <li class="sub-menu-item">
                            <a href="{{ route('order.pending') }}" class="">
                                <div class="text">Đơn hàng chưa duyệt</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item">
                    <a href="settings.html" class="">
                        <div class="icon"><i class="icon-settings"></i></div>
                        <div class="text">Settings</div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
