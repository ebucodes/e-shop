<!-- sidebar -->
<div class="cr-sidebar-overlay"></div>
<div class="cr-sidebar" data-mode="light">
    <div class="cr-sb-logo">
        <a href="{{ route('homePage') }}" class="sb-full"><img
                src="{{ asset('account/assets/img/logo/full-logo.png') }}" alt="logo"></a>
        <a href="{{ route('homePage') }}" class="sb-collapse"><img
                src="{{ asset('account/assets/img/logo/collapse-logo.png') }}" alt="logo"></a>
    </div>
    <div class="cr-sb-wrapper">
        <div class="cr-sb-content">
            <ul class="cr-sb-list">
                @if (auth()->user()->role == 'admin')
                <li class="cr-sb-item">
                    <a href="{{ route('adminDashboard') }}" class="cr-page-link">
                        <i class="ri-radio-button-line"></i>
                        <span class="condense">
                            <span class="hover-title">Dashboard</span>
                        </span>
                    </a>
                </li>
                <li class="cr-sb-item">
                    <a href="buttons.html" class="cr-page-link">
                        <i class="ri-account-circle-fill"></i><span class="condense"><span
                                class="hover-title">Admin</span></span></a>
                </li>
                <li class="cr-sb-item">
                    <a href="{{ route('categoryIndex') }}" class="cr-page-link">
                        <i class="ri-bar-chart-grouped-line"></i>
                        <span class="condense">
                            <span class="hover-title">Category</span>
                        </span>
                    </a>

                </li>
                <li class="cr-sb-item">
                    <a href="{{ route('subCategoryIndex') }}" class="cr-page-link">
                        <i class="ri-bar-chart-grouped-line"></i>
                        <span class="condense">
                            <span class="hover-title">Sub Category
                            </span>
                        </span>
                    </a>
                </li>
                <li class="cr-sb-item">
                    <a href="{{ route('allLogs') }}" class="cr-page-link">
                        <i class="ri-file-text-line"></i><span class="condense"><span class="hover-title">All
                                Logs</span></span></a>
                </li>
                @elseif (auth()->user()->role == 'seller')
                <li class="cr-sb-item">
                    <a href="{{ route('sellerDashboard') }}" class="cr-page-link">
                        <i class="ri-radio-button-line"></i>
                        <span class="condense">
                            <span class="hover-title">Dashboard</span>
                        </span>
                    </a>
                </li>
                <li class="cr-sb-item">
                    <a href="{{ route('productIndex') }}" class="cr-page-link">
                        <i class="ri-bar-chart-grouped-line"></i>
                        <span class="condense">
                            <span class="hover-title">Products</span>
                        </span>
                    </a>

                </li>
                <li class="cr-sb-item">
                    <a href="{{ route('subCategoryIndex') }}" class="cr-page-link">
                        <i class="ri-bar-chart-grouped-line"></i>
                        <span class="condense">
                            <span class="hover-title">Order History
                            </span>
                        </span>
                    </a>
                </li>
                @elseif (auth()->user()->role == 'buyer')

                @endif

                <li class="cr-sb-item">
                    <a href="{{ route('logOut') }}" class="cr-page-link">
                        <i class="ri-logout-circle-r-line"></i>
                        <span class="condense">
                            <span class="hover-title">Sign Out</span>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>