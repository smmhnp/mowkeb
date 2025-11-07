@extends('clientBase.baseFormat')

@section('style')

    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

@endsection

@section('content')

    <main class="main-container">
        
        <!-- بخش هیرو -->
        <section class="hero-section">
            <div class="hero-content">
                <h2>{{ $hero->title }}</h2>
                <p>{{ $hero->sub_title }}</p>
            </div>
            <div class="hero-image" style="background-image: url('{{ asset('storage/' . $hero->photo) }}'); background-size: cover;"></div>
        </section>

        <!-- خبر فوری -->
        <div class="breaking-news">
            <div class="breaking-badge">خبر فوری</div>
            <div class="breaking-text">{{ $special->title }}</div>
        </div>
        
        <div class="layout-container">
            <!-- محتوای اصلی -->
            <div class="main-content">
                <!-- اخبار برتر -->

                <section class="video-section">
                    <div class="video-container">
                       <div id="{{ $media->video->aparatID }}">
                            <script type="text/JavaScript" src="{{ $media->video->link }}"></script>
                        </div>
                    </div>

                    <!-- کارت‌های پوستر -->
                    <div class="poster-cards">
                        <div class="poster-card">
                            <div class="poster-image">
                                <img class="poster-img" src="{{ asset('storage/' . $media->first) }}">
                            </div>
                        </div>
                        <div class="poster-card">
                            <div class="poster-image">
                                <img class="poster-img" src="{{ asset('storage/' . $media->second) }}">
                            </div>
                        </div>
                        <div class="poster-card">
                            <div class="poster-image">
                                <img class="poster-img" src="{{ asset('storage/' . $media->third) }}">
                            </div>
                        </div>
                    </div>

                    <!-- بخش توضیحات -->
                    <div class="description-section">
                        <h2>{{ $content->title }}</h2>
                        
                        {!! $content->content !!}
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

                <!-- گالری تصاویر -->
                <div class="sidebar-gallery">
                    <h3 class="widget-title">
                        <i class="fas fa-images"></i>
                        گالری تصاویر
                    </h3>
                    <div class="gallery-slider">
                        @foreach($gallery as $index => $image)
                            <div class="gallery-slide" {{ $index === 0 ? 'active' : '' }}>
                                <img src="{{ asset('storage/' . $image->image) }}">
                            </div>
                        @endforeach
                    </div>
                    <div class="gallery-nav">
                        @foreach($gallery as $index => $image)
                            <div class="gallery-dot" {{ $index === 0 ? 'active' : '' }} data-slide="{{ $image->id }}"></div>
                        @endforeach
                    </div>
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

        // اسلایدشوی گالری تصاویر
        let currentSlide = 0;
        const slides = document.querySelectorAll('.gallery-slide');
        const dots = document.querySelectorAll('.gallery-dot');
        const totalSlides = slides.length;

        function showSlide(n) {
            // مخفی کردن همه اسلایدها
            slides.forEach(slide => slide.classList.remove('active'));
            dots.forEach(dot => dot.classList.remove('active'));
            
            // نمایش اسلاید جاری
            currentSlide = (n + totalSlides) % totalSlides;
            slides[currentSlide].classList.add('active');
            dots[currentSlide].classList.add('active');
        }

        function nextSlide() {
            showSlide(currentSlide + 1);
        }

        // کلیک روی دات‌ها
        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                showSlide(index);
            });
        });

        // تغییر خودکار اسلایدها هر 3 ثانیه
        setInterval(nextSlide, 3000);

        // نمایش اولین اسلاید
        showSlide(0);
    </script>

@endsection