@extends('clientBase.baseFormat')

@section('style')

    <link href="{{ asset('css/home.css') }}" rel="stylesheet">

@endsection

@section('content')

    <main class="main-container">
        <!-- بخش هیرو -->
        <section class="hero-section">
            <div class="hero-content">
                <h2>تازه‌ترین اخبار ایران و جهان را با ما دنبال کنید</h2>
                <p>دریافت سریع و مطمئن آخرین اخبار از معتبرترین منابع خبری. تحلیل‌های تخصصی و گزارش‌های ویژه از مهم‌ترین رویدادهای روز.</p>
                <button class="btn btn-primary">
                    <i class="fas fa-newspaper"></i>
                    مشاهده آخرین اخبار
                </button>
            </div>
            <div class="hero-image">
                <i class="fas fa-globe"></i>
            </div>
        </section>

        <!-- خبر فوری -->
        <div class="breaking-news">
            <div class="breaking-badge">خبر فوری</div>
            <div class="breaking-text">سخنگوی دولت: رشد اقتصادی در سه ماهه اول سال به ۴.۲ درصد رسید</div>
        </div>

        <!-- دسته‌بندی‌ها -->
        <section class="categories-section">
            <h2 class="section-title">
                <i class="fas fa-folder"></i>
                دسته‌بندی‌های خبری
            </h2>
            <div class="categories-grid">
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-landmark"></i>
                    </div>
                    <h3>سیاسی</h3>
                    <span>۲۴۵ خبر جدید</span>
                </div>
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3>اقتصادی</h3>
                    <span>۱۸۷ خبر جدید</span>
                </div>
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-palette"></i>
                    </div>
                    <h3>فرهنگی</h3>
                    <span>۹۸ خبر جدید</span>
                </div>
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-futbol"></i>
                    </div>
                    <h3>ورزشی</h3>
                    <span>۳۲۱ خبر جدید</span>
                </div>
            </div>
        </section>

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
                        <!-- خبر ۱ -->
                        <article class="news-card">
                            <div class="news-image">
                                <span class="news-badge">ویژه</span>
                            </div>
                            <div class="news-content">
                                <div class="news-meta">
                                    <span class="news-category">سیاسی</span>
                                    <span>۲ ساعت پیش</span>
                                </div>
                                <h3 class="news-title">اجلاس سران کشورهای منطقه با موضوع امنیت خلیج فارس</h3>
                                <p class="news-excerpt">سران کشورهای حاشیه خلیج فارس در اجلاس ویژه‌ای در ریاض گرد هم آمدند تا درباره مسائل امنیتی منطقه گفتگو کنند.</p>
                                <div class="news-footer">
                                    <div class="news-author">
                                        <div class="author-avatar">م</div>
                                        <span>محمد رضایی</span>
                                    </div>
                                    <span>۱,۲۴۵ بازدید</span>
                                </div>
                            </div>
                        </article>

                        <!-- خبر ۲ -->
                        <article class="news-card">
                            <div class="news-image">
                                <span class="news-badge">اقتصادی</span>
                            </div>
                            <div class="news-content">
                                <div class="news-meta">
                                    <span class="news-category">اقتصادی</span>
                                    <span>۴ ساعت پیش</span>
                                </div>
                                <h3 class="news-title">رشد ۱۵ درصدی صادرات غیرنفتی در سه ماهه اول سال</h3>
                                <p class="news-excerpt">بر اساس آمارهای رسمی، صادرات غیرنفتی کشور در سه ماهه اول امسال نسبت به مدت مشابه سال گذشته ۱۵ درصد رشد داشته است.</p>
                                <div class="news-footer">
                                    <div class="news-author">
                                        <div class="author-avatar">ف</div>
                                        <span>فاطمه کریمی</span>
                                    </div>
                                    <span>۹۸۷ بازدید</span>
                                </div>
                            </div>
                        </article>

                        <!-- خبر ۳ -->
                        <article class="news-card">
                            <div class="news-image">
                                <span class="news-badge">ورزشی</span>
                            </div>
                            <div class="news-content">
                                <div class="news-meta">
                                    <span class="news-category">ورزشی</span>
                                    <span>۶ ساعت پیش</span>
                                </div>
                                <h3 class="news-title">قهرمانی تیم ملی والیبال در مسابقات آسیایی</h3>
                                <p class="news-excerpt">تیم ملی والیبال ایران با پیروزی در فینال مسابقات قهرمانی آسیا، برای چهارمین بار قهرمان این رقابت‌ها شد.</p>
                                <div class="news-footer">
                                    <div class="news-author">
                                        <div class="author-avatar">ع</div>
                                        <span>علی محمدی</span>
                                    </div>
                                    <span>۲,۳۴۱ بازدید</span>
                                </div>
                            </div>
                        </article>
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