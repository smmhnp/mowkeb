@extends('clientBase.baseFormat')

@section('style')

    <link href="{{ asset('css/home.css') }}" rel="stylesheet">

@endsection

@section('content')

    <main class="main-container">
        <!-- بخش هیرو -->
        <section class="hero-section">
            <div class="hero-content">
                <h2>{{ $hero->title }}</h2>
                <p>{{ $hero->sub_title }}</p>
                <button class="btn btn-primary">
                    <i class="fas fa-newspaper"></i>
                    {{ $hero->btn_text }}
                </button>
            </div>
            <div class="hero-image" style="background-image: url('{{ $hero->photo }}'); background-size: cover"></div>
        </section>

        <!-- خبر فوری -->
        @if($special->status == 'active')
            <div class="breaking-news">
                <div class="breaking-badge">خبر فوری</div>
                <div class="breaking-text">{{ $special->title }}</div>
            </div>
        @endif

        <div class="layout-container">
            <!-- محتوای اصلی -->
            <div class="main-content">
                <!-- اخبار برتر -->
                <section class="featured-news">
                    <h2 class="section-title">
                        <i class="fas fa-fire"></i>
                        داغ‌ترین اخبار
                    </h2>
                    <div class="news-grid">
                        @foreach($articles as $article)

                            <article class="news-card">
                                <div class="news-image" style="background-image: url('{{ $article->cover }}'); background-size: cover">
                                    <span class="special-badge">ویژه</span>
                                </div>

                                <div class="news-content">
                                    <div class="news-meta">
                                        <span class="news-category">{{ $article->category->name }}</span>
                                        <span>{{ jDate($article->created_at)->ago() }}</span>
                                    </div>
                                    <h3 class="news-title">{{ $article->name }}</h3>
                                    <p class="news-excerpt">{{ $article->summery }}</p>
                                    <div class="news-footer">
                                        <div class="news-author">
                                            <div class="author-avatar"></div>
                                            <span>{{ $article->user->fname . " " . $article->user->lname }}</span>
                                        </div>
                                        <span>{{ $article->view }} بازدید</span>
                                    </div>
                                </div>
                            </article>

                        @endforeach
                    </div>
                </section>
            </div>

            <!-- سایدبار -->
            <aside class="sidebar">
                <!-- پربازدیدترین‌ها -->
                <div class="sidebar-widget">
                    <h3 class="widget-title">
                        <i class="fas fa-chart-line"></i>
                        پربازدیدترین‌ها
                    </h3>
                    <ul class="trending-list">
                        <li class="trending-item">
                            <div class="trending-number">۱</div>
                            <div class="trending-content">
                                <h4>تغییرات کابینه در هفته آینده</h4>
                                <div class="trending-meta">سیاسی - ۵,۲۴۱ بازدید</div>
                            </div>
                        </li>
                        <li class="trending-item">
                            <div class="trending-number">۲</div>
                            <div class="trending-content">
                                <h4>افتتاح خط تولید جدید خودروسازی</h4>
                                <div class="trending-meta">اقتصادی - ۴,۸۷۶ بازدید</div>
                            </div>
                        </li>
                        <li class="trending-item">
                            <div class="trending-number">۳</div>
                            <div class="trending-content">
                                <h4>نتایج قرعه کشی لیگ قهرمانان آسیا</h4>
                                <div class="trending-meta">ورزشی - ۴,۱۲۳ بازدید</div>
                            </div>
                        </li>
                        <li class="trending-item">
                            <div class="trending-number">۴</div>
                            <div class="trending-content">
                                <h4>جشنواره بین المللی فیلم فجر</h4>
                                <div class="trending-meta">فرهنگی - ۳,۹۸۷ بازدید</div>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- خبرنامه -->
                <div class="sidebar-widget">
                    <h3 class="widget-title">
                        <i class="fas fa-envelope"></i>
                        خبرنامه
                    </h3>
                    <p style="margin-bottom: 15px; color: #666;">با عضویت در خبرنامه، آخرین اخبار را در ایمیل خود دریافت کنید</p>
                    <div class="search-box" style="width: 100%;">
                        <input type="email" placeholder="آدرس ایمیل شما">
                    </div>
                    <button class="btn btn-primary" style="width: 100%; margin-top: 15px;">
                        <i class="fas fa-paper-plane"></i>
                        عضویت در خبرنامه
                    </button>
                </div>
            </aside>
        </div>

        <!-- دسته‌بندی‌ها -->
        <section class="categories-section">
            <h2 class="section-title">
                <i class="fas fa-folder"></i>
                دسته‌بندی‌های
            </h2>
            <div class="categories-grid">
                @foreach($categories as $category)
                    <div class="category-card">
                        <div class="category-icon">
                            <i class="fas fa-landmark"></i>
                        </div>
                        <h3>{{ $category->name }}</h3>
                    </div>
                @endforeach
            </div>
        </section>

    </main>

@endsection

@section('script')

    <script>
        // مدیریت منوی موبایل
        const menuToggle = document.getElementById('menuToggle');
        const mobileMenu = document.getElementById('mobileMenu');
        const mobileOverlay = document.getElementById('mobileOverlay');
        const closeMenu = document.getElementById('closeMenu');

        function openMobileMenu() {
            mobileMenu.classList.add('active');
            mobileOverlay.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeMobileMenu() {
            mobileMenu.classList.remove('active');
            mobileOverlay.classList.remove('active');
            document.body.style.overflow = '';
        }

        menuToggle.addEventListener('click', openMobileMenu);
        closeMenu.addEventListener('click', closeMobileMenu);
        mobileOverlay.addEventListener('click', closeMobileMenu);

        // بستن منو با کلیک روی لینک‌ها
        document.querySelectorAll('.mobile-nav a').forEach(link => {
            link.addEventListener('click', closeMobileMenu);
        });

        // مدیریت ریسپانسیو
        window.addEventListener('resize', function() {
            if (window.innerWidth > 992) {
                closeMobileMenu();
            }
        });
    </script>

@endsection