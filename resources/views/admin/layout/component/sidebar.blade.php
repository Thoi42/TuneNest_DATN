<div class="section-menu-left">
    <div class="box-logo">
        <a href="index.html" id="site-logo-inner">
            <img class="" id="logo_header" alt="" src="{{ asset('images/logo/logo.png') }}"
                data-light="images/logo/logo.png" data-dark="images/logo/logo.png">
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
                            <a href="{{ route('postCatagory.index') }}" class="">
                                <div class="text">Danh mục bài viết</div>
                            </a>
                        </li>
                        <li class="sub-menu-item">
                            <a href="products.html" class="">
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
                            <a href="products.html" class="">
                                <div class="text">Thống Kê Showrooms</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item has-children">
                    <a href="javascript:void(0);" class="menu-item-button">
                        <div class="icon"><i class="icon-file"></i></div>
                        <div class="text">Banner</div>
                    </a>
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