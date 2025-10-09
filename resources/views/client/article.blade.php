@extends('clientBase.baseFormat')

@section('style')

    <link href="{{ asset('css/article.css') }}" rel="stylesheet">

@endsection

@section('content')

    <main class="main-container">
        <!-- مسیر ناوبری -->
        <div class="breadcrumb">
            <a href="#">خانه</a>
            <span>/</span>
            <a href="#">اخبار سیاسی</a>
            <span>/</span>
            <span>اجلاس سران کشورهای منطقه با موضوع امنیت خلیج فارس</span>
        </div>

        <div class="layout-container">
            <!-- محتوای اصلی مقاله -->
            <div class="main-content">
                <article class="article-container">
                    <!-- هدر مقاله -->
                    <div class="article-header">
                        <h1 class="article-title">اجلاس سران کشورهای منطقه با موضوع امنیت خلیج فارس</h1>
                        <div class="article-meta">
                            <span class="article-category">سیاسی</span>
                            <div class="article-info">
                                <span>۲ ساعت پیش</span>
                                <span> • </span>
                                <span>۱,۲۴۵ بازدید</span>
                                <span> • </span>
                                <div class="article-author">
                                    <div class="author-avatar">م</div>
                                    <span>محمد رضایی</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- بخش ویدیو -->
                    <div class="video-section">
                        <div class="video-container">
                            <div class="video-placeholder">
                                <i class="fas fa-play-circle"></i>
                                <p>ویدیوی خبری اجلاس سران منطقه</p>
                                <small>برای پخش ویدیو کلیک کنید</small>
                            </div>
                        </div>
                    </div>

                    <!-- بخش متن مقاله -->
                    <div class="article-content">
                        <div class="article-text">
                            <p>سران کشورهای حاشیه خلیج فارس در اجلاس ویژه‌ای در ریاض گرد هم آمدند تا درباره مسائل امنیتی منطقه گفتگو کنند. این نشست با حضور مقامات ارشد ۸ کشور منطقه برگزار شد و موضوعات مختلفی از جمله امنیت دریایی، همکاری‌های اقتصادی و مسائل زیست‌محیطی مورد بحث قرار گرفت.</p>
                            
                            <h3>بررسی چالش‌های امنیتی</h3>
                            <p>در این اجلاس، شرکت‌کنندگان بر ضرورت تقویت همکاری‌های منطقه‌ای برای مقابله با چالش‌های مشترک تأکید کردند. وزیر امور خارجه عربستان در سخنرانی خود گفت: "امنیت خلیج فارس برای همه کشورهای منطقه حیاتی است و ما باید با همکاری یکدیگر، ثبات و امنیت این آبراه مهم را تضمین کنیم."</p>
                            
                            <p>وی افزود: "ما در منطقه با چالش‌های متعددی روبرو هستیم که تنها از طریق همکاری و تفاهم متقابل قابل حل هستند. اجلاس امروز گامی مهم در جهت تحکیم روابط و ایجاد زمینه‌های همکاری بیشتر است."</p>
                            
                            <h3>توافق‌های امضا شده</h3>
                            <p>همچنین در این نشست، توافقنامه‌های متعددی در زمینه‌های مختلف از جمله سرمایه‌گذاری مشترک، توسعه زیرساخت‌ها و مقابله با تهدیدات سایبری به امضا رسید. این توافق‌ها گام مهمی در جهت تحکیم روابط بین کشورهای منطقه محسوب می‌شود.</p>
                            
                            <p>یکی از مهم‌ترین این توافق‌ها، پروتکل همکاری امنیتی است که به موجب آن کشورهای عضو متعهد به تبادل اطلاعات و همکاری در زمینه مقابله با تروریسم و جرائم سازمان یافته شده‌اند.</p>
                        </div>
                    </div>

                    <!-- بخش تصاویر -->
                    <div class="article-images">
                        <h3 class="widget-title">
                            <i class="fas fa-images"></i>
                            گالری تصاویر
                        </h3>
                        <div class="images-grid">
                            <div class="image-item">
                                <i class="fas fa-image"></i>
                            </div>
                            <div class="image-item">
                                <i class="fas fa-image"></i>
                            </div>
                            <div class="image-item">
                                <i class="fas fa-image"></i>
                            </div>
                        </div>
                    </div>

                    <!-- دکمه‌های اشتراک -->
                    <div class="share-section">
                        <div class="share-title">اشتراک این خبر:</div>
                        <div class="share-buttons">
                            <a href="#" class="share-btn telegram">
                                <i class="fab fa-telegram"></i>
                            </a>
                            <a href="#" class="share-btn whatsapp">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                            <a href="#" class="share-btn twitter">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="share-btn linkedin">
                                <i class="fab fa-linkedin"></i>
                            </a>
                        </div>
                    </div>
                </article>

                <!-- بخش نظرات -->
                <section class="comments-section">
                    <h2 class="comments-title">
                        <i class="fas fa-comments"></i>
                        نظرات کاربران
                    </h2>
                    
                    <div class="comment-form">
                        <h3 style="margin-bottom: 15px;">ثبت نظر جدید</h3>
                        <div class="form-group">
                            <label for="name">نام</label>
                            <input type="text" id="name" class="form-control" placeholder="نام شما">
                        </div>
                        <div class="form-group">
                            <label for="email">ایمیل</label>
                            <input type="email" id="email" class="form-control" placeholder="ایمیل شما">
                        </div>
                        <div class="form-group">
                            <label for="comment">نظر شما</label>
                            <textarea id="comment" class="form-control" placeholder="نظر خود را بنویسید..."></textarea>
                        </div>
                        <button class="btn btn-primary">ارسال نظر</button>
                    </div>
                </section>
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