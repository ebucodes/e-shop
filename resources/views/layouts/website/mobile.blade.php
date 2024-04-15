<div class="cr-sidebar-overlay"></div>
<div id="cr_mobile_menu" class="cr-side-cart cr-mobile-menu">
    <div class="cr-menu-title">
        <span class="menu-title">My Menu</span>
        <button type="button" class="cr-close">×</button>
    </div>
    <div class="cr-menu-inner">
        <div class="cr-menu-content">
            <ul>
                <li class="dropdown drop-list">
                    <a href="{{ route('homePage') }}">Home</a>
                </li>
                <li class="dropdown drop-list">
                    <span class="menu-toggle"></span>
                    <a href="javascript:void(0)" class="dropdown-list">Categories</a>
                    <ul class="sub-menu">
                        @foreach ($categories as $category)
                        <li>
                            <a href="{{ route('productsPage',['category'=>$category->id] ) }}">{{
                                $category->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                {{-- <li class="dropdown drop-list">
                    <span class="menu-toggle"></span>
                    <a href="javascript:void(0)" class="dropdown-list">product</a>
                    <ul class="sub-menu">
                        <li><a href="product-left-sidebar.html">product Left sidebar</a></li>
                        <li><a href="product-right-sidebar.html">product Right sidebar</a></li>
                        <li><a href="product-full-width.html">Product Full Width </a></li>
                    </ul>
                </li> --}}
                <li class="dropdown drop-list">
                    <span class="menu-toggle"></span>
                    <a href="javascript:void(0)" class="dropdown-list">Pages</a>
                    <ul class="sub-menu">
                        <li>
                            <a href="{{ route('aboutUs') }}">About Us</a>
                        </li>
                        <li>
                            <a href="{{ route('contactUs') }}">Contact Us</a>
                        </li>
                        <li>
                            <a href="{{ route('faq') }}">Faq</a>
                        </li>
                        <li>
                            <a href="{{ route('policy') }}">Policy</a>
                        </li>
                    </ul>
                </li>
                {{-- <li class="dropdown drop-list">
                    <span class="menu-toggle"></span>
                    <a href="javascript:void(0)" class="dropdown-list">Blog</a>
                    <ul class="sub-menu">
                        <li><a href="blog-left-sidebar.html">Left Sidebar</a></li>
                        <li><a href="blog-right-sidebar.html">Right Sidebar</a></li>
                        <li><a href="blog-full-width.html">Full Width</a></li>
                        <li><a href="blog-detail-left-sidebar.html">Detail Left Sidebar</a></li>
                        <li><a href="blog-detail-right-sidebar.html">Detail Right Sidebar</a></li>
                        <li><a href="blog-detail-full-width.html">Detail Full Width</a></li>
                    </ul>
                </li> --}}
            </ul>
        </div>
    </div>
</div>
