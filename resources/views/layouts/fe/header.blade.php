<header>
    <div class="header-top">
        <div class="container">
            <ul class="header-social-container">
                <li>
                    <a href="javascript:void(0)" class="social-link">
                        <ion-icon name="logo-facebook"></ion-icon>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="social-link">
                        <ion-icon name="logo-twitter"></ion-icon>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="social-link">
                        <ion-icon name="logo-instagram"></ion-icon>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="social-link">
                        <ion-icon name="logo-linkedin"></ion-icon>
                    </a>
                </li>
            </ul>
            <div class="header-alert-news">
                <p>
                    <b>Promo Voucher Diskon</b>
                    Hingga Rp.10.000,-
                </p>
            </div>
            <div class="header-top-actions">
                <select name="currency">
                    <option value="idr">IDR &#82;&#112;</option>
                    <option value="usd">USD &dollar;</option>
                </select>
                <select name="language">
                    <option value="id_ID">Indonesia</option>
                    <option value="en_US">English</option>
                </select>
            </div>
        </div>
    </div>

    <div class="header-main">
        <div class="container">
            <a href="javascript:void(0)" class="header-logo">
                <img src="{{ asset('images/logo_default.png') }}" alt="{{ config('app.name', 'Laravel') }}" width="250" height="100">
            </a>
            <form class="header-search-container">
                <input type="search" name="search" class="search-field" placeholder="Enter your product name...">
                <button class="search-btn">
                    <ion-icon name="search-outline"></ion-icon>
                </button>
            </form>
            <div class="header-user-actions">
                <button class="action-btn" onclick="location.href='{{ route('fe.profile') }}';">
                    <ion-icon name="person-outline"></ion-icon>
                </button>

                <button class="action-btn" onclick="location.href='{{ route('fe.wishlist') }}';">
                    <ion-icon name="heart-outline"></ion-icon>
                    <span class="count">{{ \Setting::getWishlistCount() }}</span>
                </button>

                <button class="action-btn" onclick="location.href='{{ route('fe.cart') }}';">
                    <ion-icon name="bag-handle-outline"></ion-icon>
                    <span class="count">{{ \Setting::getCartCount() }}</span>
                </button>
            </div>
        </div>
    </div>

    <nav class="desktop-navigation-menu">
        <div class="container">
            <ul class="desktop-menu-category-list">
                <li class="menu-category">
                    <a href="{{ route('fe.index') }}" class="menu-title">Home</a>
                </li>
                <li class="menu-category">
                    <a href="{{ route('fe.category') }}" class="menu-title">Categories</a>
                    <div class="dropdown-panel">
                        @foreach (\Setting::getCategories() as $category)
                            <ul class="dropdown-panel-list">
                                <li class="menu-title">
                                    <a href="{{ route('fe.category_detail', $category->id) }}">{{ $category->name }}</a>
                                    @if ($category->children)
                                        @foreach ($category->children as $child)
                                            <li class="panel-list-item">
                                                <a href="{{ route('fe.category_detail', $child->id) }}">{{ $child->name }}</a>
                                            </li>
                                        @endforeach
                                    @endif
                                </li>
                            </ul>
                        @endforeach
                    </div>
                </li>
                <li class="menu-category">
                    <a href="{{ route('fe.contact') }}" class="menu-title">Contact Us</a>
                </li>
                @auth
                    @if (auth()->user()->hasRole('admin'))
                        <li class="menu-category">
                            <a href="{{ route('admin.dashboard') }}" class="menu-title">Dashboard</a>
                        </li>
                    @else
                        <li class="menu-category">
                            <a href="{{ route('fe.history') }}" class="menu-title">History</a>
                        </li>
                        <li class="menu-category">
                            <a href="{{ route('logout') }}" class="menu-title" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        </li>
                    @endif
                @endauth
            </ul>
        </div>
    </nav>

    <div class="mobile-bottom-navigation">
        <button class="action-btn" onclick="location.href='{{ route('fe.index') }}';">
            <ion-icon name="home-outline"></ion-icon>
        </button>
        <button class="action-btn" onclick="location.href='{{ route('fe.cart') }}';">
            <ion-icon name="bag-handle-outline"></ion-icon>
            <span class="count">0</span>
        </button>
        <button class="action-btn" onclick="location.href='{{ route('fe.wishlist') }}';">
            <ion-icon name="heart-outline"></ion-icon>
            <span class="count">0</span>
        </button>
        <button class="action-btn" onclick="location.href='{{ route('fe.contact') }}';">
            <ion-icon name="call-outline"></ion-icon>
        </button>
        <button class="action-btn" onclick="location.href='{{ route('fe.profile') }}';">
            <ion-icon name="person-outline"></ion-icon>
        </button>
    </div>

    <nav class="mobile-navigation-menu  has-scrollbar" data-mobile-menu>
        <div class="menu-top">
            <h2 class="menu-title">Menu</h2>
            <button class="menu-close-btn" data-mobile-menu-close-btn>
                <ion-icon name="close-outline"></ion-icon>
            </button>
        </div>
        <ul class="mobile-menu-category-list">
            <li class="menu-category">
                <a href="{{ route('fe.index') }}" class="menu-title">Home</a>
            </li>
            <li class="menu-category">
                <a href="{{ route('fe.category') }}" class="menu-title">Categories</a>
            </li>
            <li class="menu-category">
                <a href="{{ route('fe.contact') }}" class="menu-title">Contact Us</a>
            </li>
        </ul>

        <div class="menu-bottom">
            <ul class="menu-category-list">
                <li class="menu-category">
                    <button class="accordion-menu" data-accordion-btn>
                        <p class="menu-title">Language</p>
                        <ion-icon name="caret-back-outline" class="caret-back"></ion-icon>
                    </button>
                    <ul class="submenu-category-list" data-accordion>
                        <li class="submenu-category">
                            <a href="javascript:void(0)" class="submenu-title">Indonesia</a>
                        </li>
                        <li class="submenu-category">
                            <a href="javascript:void(0)" class="submenu-title">English</a>
                        </li>
                    </ul>
                </li>
                <li class="menu-category">
                    <button class="accordion-menu" data-accordion-btn>
                        <p class="menu-title">Currency</p>
                        <ion-icon name="caret-back-outline" class="caret-back"></ion-icon>
                    </button>
                    <ul class="submenu-category-list" data-accordion>
                        <li class="submenu-category">
                            <a href="javascript:void(0)" class="submenu-title">IDR &#82;&#112;</a>
                        </li>
                        <li class="submenu-category">
                            <a href="javascript:void(0)" class="submenu-title">USD &dollar;</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <ul class="menu-social-container">
                <li>
                    <a href="javascript:void(0)" class="social-link">
                        <ion-icon name="logo-facebook"></ion-icon>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="social-link">
                        <ion-icon name="logo-twitter"></ion-icon>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="social-link">
                        <ion-icon name="logo-instagram"></ion-icon>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="social-link">
                        <ion-icon name="logo-linkedin"></ion-icon>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>
