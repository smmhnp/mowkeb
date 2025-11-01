        <!-- navbar -->
        <header class="header">
            <div class="header-right">
                <div class="user-info">
                    <div class="user-avatar"></div>

                    <div class="user-info" id="logoutTrigger" style="cursor: pointer;">
                        <div class="user-name">{{ $auth->fname . " " . $auth->lname }}</div>
                        <small class="user-role">({{ role($auth->role) }})</small>
                    </div>

                    <form id="logoutForm" action="{{ route('UserController.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <script>
                        document.getElementById('logoutTrigger').addEventListener('click', function() {
                            if (confirm('آیا می‌خواهید خارج شوید؟')) {
                                document.getElementById('logoutForm').submit();
                            }
                        });
                    </script>

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
                
                <li><a href="{{ route('DashboardController.dashboard') }}" class="{{ request()->routeIs('DashboardController.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-home"></i>داشبورد</a>
                </li>
                
                @if(Auth::user()->role != 'user')
                    @if(Auth::user()->role == 'super_admin')
                        <li><a href="{{ route('HomeController.homeManeger') }}" class="{{ request()->routeIs('HomeController.homeManeger') ? 'active' : '' }}">
                            <i class="fas fa-cog"></i>صفحه اصلی</a>
                        </li>
                    @endif
                    <li><a href="{{ route('ArticleController.articleManager') }}" class="{{ request()->routeIs('ArticleController.articleManager') ? 'active' : '' }}">
                        <i class="fas fa-edit"></i>مقالات</a>
                    </li>
                    @if(Auth::user()->role != 'user')
                        <li><a href="{{ route('CategoryController.categoryManager') }}" class="{{ request()->routeIs('CategoryController.categoryManager') ? 'active' : '' }}">
                            <i class="fas fa-folder"></i>دسته‌بندی‌ها</a>
                        </li>
                    @endif
                    @if(Auth::user()->role == 'super_admin')
                        <li><a href="{{ route('UserController.userManager') }}" class="{{ request()->routeIs('UserController.userManager') ? 'active' : '' }}">
                            <i class="fas fa-users"></i>کاربران</a>
                        </li>
                    @endif
                    <li><a href="{{ route('MedaiControler.ImageGallery') }}" class="{{ request()->routeIs('MedaiControler.ImageGallery') ? 'active' : '' }}">
                        <i class="fas fa-image"></i>تصاویر</a>
                    </li>
                    
                    <li><a href="{{ route('MedaiControler.VideoGallery') }}" class="{{ request()->routeIs('MedaiControler.VideoGallery') ? 'active' : '' }}">
                        <i class="fas fa-video"></i>ویدیوها</a>
                    </li>
                @endif
            </ul>
        </aside>