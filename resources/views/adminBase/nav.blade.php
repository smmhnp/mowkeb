        <!-- navbar -->
        <header class="header">
            <div class="header-right">
                <div class="user-info">
                    <div class="user-avatar">مدیر</div>
                    <div>
                        <div class="user-name">مدیر سیستم</div>
                        <small class="user-role">ادمین</small>
                    </div>
                </div>
            </div>
             <div class="header-left">
                <button class="menu-toggle" id="menuToggle">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="logo-mobile">
                    <i class="fas fa-newspaper"></i>
                </div>
            </div>
        </header>

        <!-- sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="logo">
                <i class="fas fa-newspaper"></i>
                <h1>پنل مدیریت</h1>
            </div>
            <ul class="menu">
                <li><a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="fas fa-home"></i>داشبورد</a>
                </li>

                <li><a href="{{ route('HomeController.homeManeger') }}" class="{{ request()->routeIs('HomeController.homeManeger') ? 'active' : '' }}">
                    <i class="fas fa-cog"></i>صفحه اصلی</a>
                </li>

                <li><a href="{{ route('HomeController.homeManeger') }}" class="{{ request()->routeIs('HomeController.homeManeger') ? 'active' : '' }}">
                    <i class="fas fa-edit"></i>مقالات</a>
                </li>

                <li><a href="{{ route('CategoryController.categoryManager') }}" class="{{ request()->routeIs('CategoryController.categoryManager') ? 'active' : '' }}">
                    <i class="fas fa-folder"></i>دسته‌بندی‌ها</a>
                </li>

                <li><a href="{{ route('UserController.userManager') }}" class="{{ request()->routeIs('UserController.userManager') ? 'active' : '' }}">
                    <i class="fas fa-users"></i>کاربران</a>
                </li>

                <li><a href="{{ route('iamge') }}" class="{{ request()->routeIs('iamge') ? 'active' : '' }}">
                    <i class="fas fa-image"></i>تصاویر</a>
                </li>
                
                <li><a href="{{ route('video') }}" class="{{ request()->routeIs('video') ? 'active' : '' }}">
                    <i class="fas fa-video"></i>ویدیوها</a>
                </li>
            </ul>
        </aside>