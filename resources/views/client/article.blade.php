@extends('clientBase.baseFormat')

@section('style')

    <link href="{{ asset('css/article.css') }}" rel="stylesheet">

@endsection

@section('content')

    <main class="main-container">
        <!-- مسیر ناوبری -->
        <div class="breadcrumb">
            <a href="{{ route('HomeController.index') }}">خانه</a>
            <span>/</span>
            <a href="">{{ $article->category->name }}</a>
            <span>/</span>
            <span>{{ $article->name }}</span>
        </div>

        <div class="layout-container">
            <!-- محتوای اصلی مقاله -->
            <div class="main-content">
                <article class="article-container">
                    <!-- هدر مقاله -->
                    <div class="article-header">
                        <h1 class="article-title">{{ $article->name }}</h1>
                        <div class="article-meta">
                            <span class="article-category">{{ $article->category->name }}</span>
                            <div class="article-info">
                                <div class="article-author">
                                    <div class="author-avatar"></div>
                                    <span>{{ $article->user->fname . " " . $article->user->lname }}</span>
                                </div>
                                <span> • </span>
                                <span>{{ jDate($article->created_at)->ago() }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- بخش ویدیو -->
                    <div class="video-section">
                        <div id="{{ $article->video->aparatID }}">
                            <script type="text/JavaScript" src="{{ $article->video->link }}"></script>
                        </div>
                    </div>

                    <!-- بخش متن مقاله -->
                    <div class="article-content">
                        <div class="article-text">
                            <h3>خلاصه مطالب</h3>
                            {{ $article->summery }}
                            <h3>توضیحات تکمیلی</h3>
                            {!! $article->content !!}
                        </div>
                    </div>

                    <!-- بخش تصاویر -->
                    <div class="article-images">
                        <h3 class="widget-title">
                            <i class="fas fa-images"></i>
                            گالری تصاویر
                        </h3>
                        <div class="images-grid">
                            @foreach($article->images as $image)
                                <div class="image-item">
                                    <img src="{{ asset('storage/' . $image->url) }}" alt="{{ $image->name }}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </article>
            </div>

            <!-- سایدبار -->
            <aside class="sidebar">
                <!-- اخبار مرتبط -->
                <div class="sidebar-widget">
                    <h3 class="widget-title">
                        <i class="fas fa-link"></i>
                        اخبار مرتبط
                    </h3>
                    <ul class="news-list">
                        <li class="news-item">
                            <div class="news-image">
                                <i class="fas fa-newspaper"></i>
                            </div>
                            <div class="news-content">
                                <h4>دیدار وزیر خارجه ایران با همتای عمانی خود</h4>
                                <div class="news-meta">سیاسی - ۴۵ دقیقه پیش</div>
                            </div>
                        </li>
                        <li class="news-item">
                            <div class="news-image">
                                <i class="fas fa-newspaper"></i>
                            </div>
                            <div class="news-content">
                                <h4>برگزاری مانور مشترک دریایی در خلیج فارس</h4>
                                <div class="news-meta">نظامی - ۲ ساعت پیش</div>
                            </div>
                        </li>
                        <li class="news-item">
                            <div class="news-image">
                                <i class="fas fa-newspaper"></i>
                            </div>
                            <div class="news-content">
                                <h4>تأثیر تحولات منطقه‌ای بر بازار نفت</h4>
                                <div class="news-meta">اقتصادی - ۳ ساعت پیش</div>
                            </div>
                        </li>
                        <li class="news-item">
                            <div class="news-image">
                                <i class="fas fa-newspaper"></i>
                            </div>
                            <div class="news-content">
                                <h4>گفتگوهای دوجانبه ایران و قطر در زمینه انرژی</h4>
                                <div class="news-meta">سیاسی - ۵ ساعت پیش</div>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- پربازدیدترین‌ها -->
                <div class="sidebar-widget">
                    <h3 class="widget-title">
                        <i class="fas fa-chart-line"></i>
                        پربازدیدترین‌ها
                    </h3>
                    <ul class="news-list">
                        <li class="news-item">
                            <div class="news-image">
                                <i class="fas fa-newspaper"></i>
                            </div>
                            <div class="news-content">
                                <h4>تغییرات کابینه در هفته آینده</h4>
                                <div class="news-meta">سیاسی - ۵,۲۴۱ بازدید</div>
                            </div>
                        </li>
                        <li class="news-item">
                            <div class="news-image">
                                <i class="fas fa-newspaper"></i>
                            </div>
                            <div class="news-content">
                                <h4>افتتاح خط تولید جدید خودروسازی</h4>
                                <div class="news-meta">اقتصادی - ۴,۸۷۶ بازدید</div>
                            </div>
                        </li>
                        <li class="news-item">
                            <div class="news-image">
                                <i class="fas fa-newspaper"></i>
                            </div>
                            <div class="news-content">
                                <h4>نتایج قرعه کشی لیگ قهرمانان آسیا</h4>
                                <div class="news-meta">ورزشی - ۴,۱۲۳ بازدید</div>
                            </div>
                        </li>
                    </ul>
                </div>

            </aside>
        </div>
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