@extends('adminBase.baseFormat')

@section('style')

    <link href="{{ asset('css/homeDesign.css') }}" rel="stylesheet">

@endsection

@section('content')

    <main class="main-content">
        <div class="page-title">
            <h2>مدیریت محتوای صفحه اصلی</h2>
            <button class="btn btn-primary">
                <i class="fas fa-eye"></i>
                پیش‌نمایش سایت
            </button>
        </div>

        <!-- بخش مدیریت محتوا -->
        <section class="admin-section">
            <div class="admin-tabs">
                <button class="tab-btn active" data-tab="hero">بخش هیرو</button>
                <button class="tab-btn" data-tab="breaking">خبر فوری</button>
                <button class="tab-btn" data-tab="featured">اخبار ویژه</button>
                <button class="tab-btn" data-tab="categories">دسته‌بندی‌ها</button>
            </div>

            <!-- تب بخش هیرو -->
            <div class="tab-content active" id="hero-tab">
                <div class="form-grid">
                    <div class="form-group">
                        <label for="hero-title">عنوان اصلی</label>
                        <input type="text" id="hero-title" class="form-control" placeholder="عنوان بخش هیرو را وارد کنید" value="تازه‌ترین اخبار ایران و جهان را با ما دنبال کنید">
                    </div>
                    <div class="form-group">
                        <label for="hero-subtitle">زیرعنوان</label>
                        <input type="text" id="hero-subtitle" class="form-control" placeholder="زیرعنوان بخش هیرو را وارد کنید" value="دریافت سریع و مطمئن آخرین اخبار از معتبرترین منابع خبری">
                    </div>
                    <div class="form-group">
                        <label for="hero-button-text">متن دکمه</label>
                        <input type="text" id="hero-button-text" class="form-control" placeholder="متن دکمه را وارد کنید" value="مشاهده آخرین اخبار">
                    </div>
                    <div class="form-group">
                        <label for="hero-image">تصویر هیرو</label>
                        <div class="image-upload">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <p>برای آپلود تصویر کلیک کنید</p>
                            <small>فرمت‌های مجاز: JPG, PNG, GIF (حداکثر 5MB)</small>
                        </div>
                    </div>
                </div>

                <div class="news-preview">
                    <h3 class="preview-title">
                        <i class="fas fa-eye"></i>
                        پیش‌نمایش بخش هیرو
                    </h3>
                    <div class="preview-content">
                        <h2 id="preview-hero-title">تازه‌ترین اخبار ایران و جهان را با ما دنبال کنید</h2>
                        <p id="preview-hero-subtitle">دریافت سریع و مطمئن آخرین اخبار از معتبرترین منابع خبری. تحلیل‌های تخصصی و گزارش‌های ویژه از مهم‌ترین رویدادهای روز.</p>
                        <button class="btn btn-primary" id="preview-hero-button">
                            <i class="fas fa-newspaper"></i>
                            مشاهده آخرین اخبار
                        </button>
                    </div>
                </div>

                <div class="form-actions">
                    <button class="btn btn-success">
                        <i class="fas fa-save"></i>
                        ذخیره تغییرات
                    </button>
                    <button class="btn btn-outline">
                        <i class="fas fa-times"></i>
                        انصراف
                    </button>
                </div>
            </div>

            <!-- تب خبر فوری -->
            <div class="tab-content" id="breaking-tab">
                <div class="form-grid">
                    <div class="form-group">
                        <label for="breaking-text">متن خبر فوری</label>
                        <input type="text" id="breaking-text" class="form-control" placeholder="متن خبر فوری را وارد کنید" value="سخنگوی دولت: رشد اقتصادی در سه ماهه اول سال به ۴.۲ درصد رسید">
                    </div>
                    <div class="form-group">
                        <label for="breaking-status">وضعیت نمایش</label>
                        <select id="breaking-status" class="form-control">
                            <option value="active">فعال</option>
                            <option value="inactive">غیرفعال</option>
                        </select>
                    </div>
                </div>

                <div class="news-preview">
                    <h3 class="preview-title">
                        <i class="fas fa-eye"></i>
                        پیش‌نمایش خبر فوری
                    </h3>
                    <div class="preview-content">
                        <div style="background: linear-gradient(135deg, var(--danger), var(--warning)); color: white; padding: 15px; border-radius: 8px; display: flex; align-items: center; gap: 15px;">
                            <div style="background: rgba(255, 255, 255, 0.2); padding: 5px 12px; border-radius: 6px; font-weight: 700;">خبر فوری</div>
                            <div style="flex: 1; font-weight: 600;" id="preview-breaking-text">سخنگوی دولت: رشد اقتصادی در سه ماهه اول سال به ۴.۲ درصد رسید</div>
                        </div>
                    </div>
                </div>

                <div class="form-actions">
                    <button class="btn btn-success">
                        <i class="fas fa-save"></i>
                        ذخیره تغییرات
                    </button>
                    <button class="btn btn-outline">
                        <i class="fas fa-times"></i>
                        انصراف
                    </button>
                </div>
            </div>

            <!-- تب اخبار ویژه -->
            <div class="tab-content" id="featured-tab">
                <div class="form-group">
                    <label>انتخاب اخبار ویژه</label>
                    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 15px; margin-top: 10px;">
                        <div style="background: rgba(255, 255, 255, 0.3); padding: 15px; border-radius: 8px;">
                            <div style="display: flex; gap: 10px; align-items: flex-start;">
                                <input type="checkbox" id="news1" checked>
                                <div>
                                    <label for="news1" style="font-weight: 600; cursor: pointer;">اجلاس سران کشورهای منطقه با موضوع امنیت خلیج فارس</label>
                                    <div style="font-size: 0.8rem; color: #666; margin-top: 5px;">۲ ساعت پیش - ۱,۲۴۵ بازدید</div>
                                </div>
                            </div>
                        </div>
                        <div style="background: rgba(255, 255, 255, 0.3); padding: 15px; border-radius: 8px;">
                            <div style="display: flex; gap: 10px; align-items: flex-start;">
                                <input type="checkbox" id="news2" checked>
                                <div>
                                    <label for="news2" style="font-weight: 600; cursor: pointer;">رشد ۱۵ درصدی صادرات غیرنفتی در سه ماهه اول سال</label>
                                    <div style="font-size: 0.8rem; color: #666; margin-top: 5px;">۴ ساعت پیش - ۹۸۷ بازدید</div>
                                </div>
                            </div>
                        </div>
                        <div style="background: rgba(255, 255, 255, 0.3); padding: 15px; border-radius: 8px;">
                            <div style="display: flex; gap: 10px; align-items: flex-start;">
                                <input type="checkbox" id="news3">
                                <div>
                                    <label for="news3" style="font-weight: 600; cursor: pointer;">قهرمانی تیم ملی والیبال در مسابقات آسیایی</label>
                                    <div style="font-size: 0.8rem; color: #666; margin-top: 5px;">۶ ساعت پیش - ۲,۳۴۱ بازدید</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-actions">
                    <button class="btn btn-success">
                        <i class="fas fa-save"></i>
                        ذخیره تغییرات
                    </button>
                    <button class="btn btn-outline">
                        <i class="fas fa-times"></i>
                        انصراف
                    </button>
                </div>
            </div>

            <!-- تب دسته‌بندی‌ها -->
            <div class="tab-content" id="categories-tab">
                <div class="form-grid">
                    <div class="form-group">
                        <label for="cat1-name">دسته‌بندی ۱ - نام</label>
                        <input type="text" id="cat1-name" class="form-control" value="سیاسی">
                    </div>
                    <div class="form-group">
                        <label for="cat1-count">دسته‌بندی ۱ - تعداد اخبار</label>
                        <input type="number" id="cat1-count" class="form-control" value="245">
                    </div>
                    <div class="form-group">
                        <label for="cat2-name">دسته‌بندی ۲ - نام</label>
                        <input type="text" id="cat2-name" class="form-control" value="اقتصادی">
                    </div>
                    <div class="form-group">
                        <label for="cat2-count">دسته‌بندی ۲ - تعداد اخبار</label>
                        <input type="number" id="cat2-count" class="form-control" value="187">
                    </div>
                    <div class="form-group">
                        <label for="cat3-name">دسته‌بندی ۳ - نام</label>
                        <input type="text" id="cat3-name" class="form-control" value="فرهنگی">
                    </div>
                    <div class="form-group">
                        <label for="cat3-count">دسته‌بندی ۳ - تعداد اخبار</label>
                        <input type="number" id="cat3-count" class="form-control" value="98">
                    </div>
                    <div class="form-group">
                        <label for="cat4-name">دسته‌بندی ۴ - نام</label>
                        <input type="text" id="cat4-name" class="form-control" value="ورزشی">
                    </div>
                    <div class="form-group">
                        <label for="cat4-count">دسته‌بندی ۴ - تعداد اخبار</label>
                        <input type="number" id="cat4-count" class="form-control" value="321">
                    </div>
                </div>

                <div class="form-actions">
                    <button class="btn btn-success">
                        <i class="fas fa-save"></i>
                        ذخیره تغییرات
                    </button>
                    <button class="btn btn-outline">
                        <i class="fas fa-times"></i>
                        انصراف
                    </button>
                </div>
            </div>
        </section>
    </main>

@endsection


@section('script')

    <script>
        // مدیریت منوی کشویی
        const menuToggle = document.getElementById('menuToggle');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        menuToggle.addEventListener('click', function() {
            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');
        });

        overlay.addEventListener('click', function() {
            sidebar.classList.remove('active');
            overlay.classList.remove('active');
        });

        // مدیریت تب‌ها
        const tabBtns = document.querySelectorAll('.tab-btn');
        const tabContents = document.querySelectorAll('.tab-content');

        tabBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                // حذف کلاس active از همه تب‌ها
                tabBtns.forEach(b => b.classList.remove('active'));
                tabContents.forEach(c => c.classList.remove('active'));
                
                // اضافه کردن کلاس active به تب انتخاب شده
                btn.classList.add('active');
                const tabId = btn.getAttribute('data-tab');
                document.getElementById(`${tabId}-tab`).classList.add('active');
            });
        });

        // به‌روزرسانی پیش‌نمایش بخش هیرو
        const heroTitle = document.getElementById('hero-title');
        const heroSubtitle = document.getElementById('hero-subtitle');
        const heroButtonText = document.getElementById('hero-button-text');
        
        const previewHeroTitle = document.getElementById('preview-hero-title');
        const previewHeroSubtitle = document.getElementById('preview-hero-subtitle');
        const previewHeroButton = document.getElementById('preview-hero-button');

        heroTitle.addEventListener('input', () => {
            previewHeroTitle.textContent = heroTitle.value;
        });

        heroSubtitle.addEventListener('input', () => {
            previewHeroSubtitle.textContent = heroSubtitle.value;
        });

        heroButtonText.addEventListener('input', () => {
            previewHeroButton.innerHTML = `<i class="fas fa-newspaper"></i> ${heroButtonText.value}`;
        });

        // به‌روزرسانی پیش‌نمایش خبر فوری
        const breakingText = document.getElementById('breaking-text');
        const previewBreakingText = document.getElementById('preview-breaking-text');

        breakingText.addEventListener('input', () => {
            previewBreakingText.textContent = breakingText.value;
        });

        // مدیریت آپلود تصویر
        const imageUpload = document.querySelector('.image-upload');
        
        imageUpload.addEventListener('click', () => {
            alert('قابلیت آپلود تصویر در این نسخه دمو فعال نیست. در نسخه کامل سیستم، این قابلیت به طور کامل پیاده‌سازی خواهد شد.');
        });

        // بستن منو با کلیک روی لینک‌ها
        document.querySelectorAll('.menu a').forEach(link => {
            link.addEventListener('click', function() {
                if (window.innerWidth <= 992) {
                    sidebar.classList.remove('active');
                    overlay.classList.remove('active');
                }
            });
        });
    </script>

@endsection