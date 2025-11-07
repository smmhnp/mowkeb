@extends('clientBase.baseFormat')

@section('style')

    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

@endsection

@section('content')

    <main class="main-container">
        <!-- بخش ویدیو و کارت‌ها -->
        
        <!-- بخش هیرو -->
        <section class="hero-section">
            <div class="hero-content">
                <h2>نهضت جهانی هر شب جمعه مثل اربعین</h2>
                <p>شب های جمعه٬ شب های زیارتی امام حسین علیه‌سلام نام ایشان را در محلات زنده کنیم</p>
            </div>
            <div class="hero-image" style="background-image: url('http://localhost:8000/storage/images/1762059350_66598480-9352-l__2990.jpg'); background-size: cover"></div>
        </section>

        <!-- خبر فوری -->
        <div class="breaking-news">
            <div class="breaking-badge">خبر فوری</div>
            <div class="breaking-text">متن تستی برای خبر ویژه</div>
        </div>
        
        <div class="layout-container">
            <!-- محتوای اصلی -->
            <div class="main-content">
                <!-- اخبار برتر -->

                <section class="video-section">
                    <div class="video-container">
                       <div id="99771696769"><script type="text/JavaScript" src="https://www.aparat.com/embed/jhj60bp?data[rnddiv]=99771696769&data[responsive]=yes"></script></div>
                    </div>

                    <!-- کارت‌های پوستر -->
                    <div class="poster-cards">
                        <div class="poster-card">
                            <div class="poster-image">
                                <i class="fas fa-mosque"></i>
                            </div>
                        </div>
                        <div class="poster-card">
                            <div class="poster-image">
                                <i class="fas fa-quran"></i>
                            </div>
                        </div>
                        <div class="poster-card">
                            <div class="poster-image">
                                <i class="fas fa-hands-helping"></i>
                            </div>
                        </div>
                    </div>

                    <!-- بخش توضیحات -->
                    <div class="description-section">
                        <h2>درباره نهضت مثل اربعین</h2>
                        <p>
                            نهضت "مثل اربعین" یک حرکت خودجوش مردمی است که با هدف زنده نگه داشتن فرهنگ عاشورایی و 
                            گسترش ارزش‌های انسان‌ساز قیام اباعبدالله الحسین (ع) در سراسر جهان شکل گرفته است. 
                            این نهضت هر شب جمعه با برگزاری مراسم زیارت، برنامه‌های فرهنگی و فعالیت‌های خیرخواهانه، 
                            تلاش می‌کند تا پیام عاشورا را به گوش جهانیان برساند و جامعه‌ای بر اساس ارزش‌های الهی بسازد.
                        </p>
                        <p style="margin-top: 15px;">
                            شرکت در این نهضت برای همه آزاد است و هرکس می‌تواند به فراخور توانایی‌های خود در 
                            بخش‌های مختلف از جمله موکب‌داری، برنامه‌ریزی فرهنگی، فعالیت‌های رسانه‌ای و خدمات 
                            خیرخواهانه مشارکت کند.
                        </p>
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
                        <div class="gallery-slide active">
                            <i class="fas fa-mosque"></i>
                            <span>تصویر ۱</span>
                        </div>
                        <div class="gallery-slide">
                            <i class="fas fa-quran"></i>
                            <span>تصویر ۲</span>
                        </div>
                        <div class="gallery-slide">
                            <i class="fas fa-hands-helping"></i>
                            <span>تصویر ۳</span>
                        </div>
                        <div class="gallery-slide">
                            <i class="fas fa-users"></i>
                            <span>تصویر ۴</span>
                        </div>
                    </div>
                    <div class="gallery-nav">
                        <div class="gallery-dot active" data-slide="0"></div>
                        <div class="gallery-dot" data-slide="1"></div>
                        <div class="gallery-dot" data-slide="2"></div>
                        <div class="gallery-dot" data-slide="3"></div>
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
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-landmark"></i>
                    </div>
                    <h3>موکب‌مغازه‌ای</h3>
                </div>
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-landmark"></i>
                    </div>
                    <h3>موکب‌ماشینی</h3>
                </div>
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-landmark"></i>
                    </div>
                    <h3>موکب‌قرآنی</h3>
                </div>
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-landmark"></i>
                    </div>
                    <h3>کارناوال</h3>
                </div>
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