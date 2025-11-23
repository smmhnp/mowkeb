   <!-- header -->
    <header class="site-header">
        <div class="header-container">
            <a href="{{ route('HomeController.index') }}" class="logo">
                <i class="fas fa-newspaper"></i>
                <h1>مثل اربعین</h1>
            </a>

            <nav class="nav-desktop">
                <ul class="nav-menu">
                    <li><a href="/" class="{{ request()->routeIs('HomeController.index') ? 'active' : '' }}">خانه</a></li>
                    @foreach($category as $title)
                        <li>
                            <a href="/show/{{ $title->slug }}" class="{{ request()->is('show/'.$title->slug) ? 'active' : '' }}">
                                {{ $title->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </nav>
            <button class="menu-toggle" id="menuToggle">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </header>

    <!-- mobile menu -->
    <div class="mobile-overlay" id="mobileOverlay"></div>
    <div class="mobile-menu" id="mobileMenu">
        <div class="logo-nav">
            <i class="fas fa-newspaper"></i>
            <h1>پنل مدیریت</h1>
        </div>
        <ul class="mobile-nav">
            <li><a href="/" class="{{ request()->routeIs('HomeController.index') ? 'active' : '' }}">خانه</a></li>
            @foreach($category as $title)
                <li>
                    <a href="/show/{{ $title->slug }}" class="{{ request()->is('show/'.$title->slug) ? 'active' : '' }}">
                        <i class="{{ $title->icon }}"></i>
                        {{ $title->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>