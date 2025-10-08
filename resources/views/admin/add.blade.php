@extends('adminBase.baseFormat')

@section('style')

        <link href="{{ asset('css/addArticle.css') }}" rel="stylesheet">

@endsection

@section('content')

        <main class="main-content">
            <div class="page-title">
                <h2>نوشتن مطلب جدید</h2>
                <div>
                    <button class="btn btn-secondary">
                        <i class="fas fa-times"></i>
                        انصراف
                    </button>
                    <button class="btn btn-primary">
                        <i class="fas fa-save"></i>
                        انتشار مطلب
                    </button>
                </div>
            </div>

            <div class="article-form">
                <form id="new-article-form">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="title">عنوان مطلب <span class="required">*</span></label>
                            <input type="text" id="title" class="form-control" placeholder="عنوان جذاب و کوتاه وارد کنید" required>
                        </div>
                        <div class="form-group">
                            <label for="category">دسته‌بندی <span class="required">*</span></label>
                            <select id="category" class="form-control" required>
                                <option value="">انتخاب دسته‌بندی</option>
                                <option value="1">سیاسی</option>
                                <option value="2">اقتصادی</option>
                                <option value="3">فرهنگی</option>
                                <option value="4">ورزشی</option>
                                <option value="5">بین‌الملل</option>
                                <option value="6">علم و تکنولوژی</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="summary">خلاصه مطلب</label>
                        <textarea id="summary" class="form-control" placeholder="خلاصه کوتاهی از مطلب بنویسید (حداکثر 200 کاراکتر)"></textarea>
                        <div class="char-count">0/200</div>
                    </div>

                    <div class="form-group">
                        <label for="content">محتوای اصلی <span class="required">*</span></label>
                        <textarea id="content" class="form-control" placeholder="متن کامل خبر را اینجا بنویسید..." required></textarea>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="tags">کلمات کلیدی</label>
                            <input type="text" id="tags" class="form-control" placeholder="کلمات کلیدی را با کاما جدا کنید">
                        </div>
                        <div class="form-group">
                            <label for="author">نویسنده</label>
                            <input type="text" id="author" class="form-control" value="مدیر سیستم" readonly>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="publish-date">تاریخ انتشار</label>
                            <input type="datetime-local" id="publish-date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="status">وضعیت</label>
                            <select id="status" class="form-control">
                                <option value="published">منتشر شده</option>
                                <option value="draft">پیش‌نویس</option>
                                <option value="pending">در انتظار بررسی</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>تصویر شاخص <span class="required">*</span></label>
                        <div class="file-upload">
                            <label for="featured-image" class="file-upload-label">
                                <i class="fas fa-cloud-upload-alt"></i>
                                <span>برای آپلود تصویر کلیک کنید یا آن را اینجا رها کنید</span>
                                <span class="file-info">فرمت‌های مجاز: JPG, PNG, GIF (حداکثر 5MB)</span>
                            </label>
                            <input type="file" id="featured-image" class="file-upload-input" accept="image/*" required>
                            <div class="image-preview">
                                <img id="preview" src="#" alt="پیشنمایش تصویر">
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary">
                            <i class="fas fa-save"></i>
                            ذخیره پیش‌نویس
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-paper-plane"></i>
                            انتشار مطلب
                        </button>
                    </div>
                </form>
            </div>
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

        // مدیریت آپلود فایل و پیش‌نمایش تصویر
        document.getElementById('featured-image').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const preview = document.getElementById('preview');
            const previewContainer = document.querySelector('.image-preview');
            
            if (file) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    previewContainer.style.display = 'block';
                }
                
                reader.readAsDataURL(file);
                
                // به روز رسانی متن اطلاع‌رسانی
                const fileInfo = document.querySelector('.file-info');
                fileInfo.textContent = `فایل انتخاب شده: ${file.name} (${(file.size / 1024 / 1024).toFixed(2)} MB)`;
            }
        });

        // مدیریت تعداد کاراکترهای خلاصه مطلب
        document.getElementById('summary').addEventListener('input', function() {
            const charCount = this.value.length;
            document.querySelector('.char-count').textContent = `${charCount}/200`;
            
            if (charCount > 200) {
                this.value = this.value.substring(0, 200);
                document.querySelector('.char-count').textContent = '200/200 - حداکثر تعداد کاراکتر';
                document.querySelector('.char-count').style.color = 'var(--danger)';
            } else {
                document.querySelector('.char-count').style.color = '#666';
            }
        });

        // مدیریت ارسال فرم
        document.getElementById('new-article-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // در اینجا می‌توانید کد ارسال فرم به سرور را اضافه کنید
            alert('مطلب با موفقیت منتشر شد!');
            // اینجا می‌توانید فرم را ریست کنید یا کاربر را به صفحه دیگری هدایت کنید
        });

        // تنظیم تاریخ پیش‌فرض به امروز
        const now = new Date();
        const year = now.getFullYear();
        const month = String(now.getMonth() + 1).padStart(2, '0');
        const day = String(now.getDate()).padStart(2, '0');
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        
        document.getElementById('publish-date').value = `${year}-${month}-${day}T${hours}:${minutes}`;
    </script>

@endsection

