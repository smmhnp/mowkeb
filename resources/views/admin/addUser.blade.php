@extends('adminBase.baseFormat')

@section('style')

        <link href="{{ asset('css/addUser.css') }}" rel="stylesheet">

@endsection

@section('content')

        <main class="main-content">
            <div class="page-title">
                <h2>افزودن کاربر جدید</h2>
                <div>
                    <button class="btn btn-secondary">
                        <i class="fas fa-arrow-right"></i>
                        بازگشت به لیست کاربران
                    </button>
                </div>
            </div>

            <div class="user-form-container">
                <form id="new-user-form">
                    <!-- بخش اطلاعات پایه -->
                    <div class="form-section">
                        <h3 class="section-title">
                            <i class="fas fa-user"></i>
                            اطلاعات پایه کاربر
                        </h3>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="firstName">نام <span class="required">*</span></label>
                                <input type="text" id="firstName" class="form-control" placeholder="نام کاربر را وارد کنید" required>
                            </div>
                            <div class="form-group">
                                <label for="lastName">نام خانوادگی <span class="required">*</span></label>
                                <input type="text" id="lastName" class="form-control" placeholder="نام خانوادگی کاربر را وارد کنید" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="username">نام کاربری <span class="required">*</span></label>
                                <input type="text" id="username" class="form-control" placeholder="نام کاربری منحصر به فرد" required>
                                <div class="form-hint">نام کاربری باید بین ۳ تا ۲۰ کاراکتر باشد</div>
                            </div>
                            <div class="form-group">
                                <label for="email">ایمیل <span class="required">*</span></label>
                                <input type="email" id="email" class="form-control" placeholder="example@domain.com" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="phone">شماره تلفن</label>
                                <input type="tel" id="phone" class="form-control" placeholder="09xxxxxxxxx">
                            </div>
                            <div class="form-group">
                                <label for="birthDate">تاریخ تولد</label>
                                <input type="date" id="birthDate" class="form-control">
                            </div>
                        </div>
                    </div>

                    <!-- بخش آپلود آواتار -->
                    <div class="form-section">
                        <h3 class="section-title">
                            <i class="fas fa-image"></i>
                            آواتار کاربر
                        </h3>
                        
                        <div class="avatar-upload">
                            <div class="avatar-preview">
                                <i class="fas fa-user"></i>
                                <img id="avatarPreview" src="#" alt="پیشنمایش آواتار">
                            </div>
                            <div class="file-upload">
                                <label for="avatar" class="file-upload-label">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    <span>برای آپلود تصویر کلیک کنید</span>
                                    <span class="form-hint">فرمت‌های مجاز: JPG, PNG (حداکثر 2MB)</span>
                                </label>
                                <input type="file" id="avatar" class="file-upload-input" accept="image/*">
                            </div>
                        </div>
                    </div>

                    <!-- بخش امنیت و دسترسی -->
                    <div class="form-section">
                        <h3 class="section-title">
                            <i class="fas fa-shield-alt"></i>
                            امنیت و دسترسی
                        </h3>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="password">رمز عبور <span class="required">*</span></label>
                                <input type="password" id="password" class="form-control" placeholder="رمز عبور قوی وارد کنید" required>
                                <div class="form-hint">رمز عبور باید حداقل ۸ کاراکتر و شامل حروف و اعداد باشد</div>
                            </div>
                            <div class="form-group">
                                <label for="confirmPassword">تکرار رمز عبور <span class="required">*</span></label>
                                <input type="password" id="confirmPassword" class="form-control" placeholder="تکرار رمز عبور" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="role">نقش کاربری <span class="required">*</span></label>
                                <select id="role" class="form-control" required>
                                    <option value="">انتخاب نقش</option>
                                    <option value="admin">مدیر سیستم</option>
                                    <option value="editor">ویرایشگر</option>
                                    <option value="author">نویسنده</option>
                                    <option value="user">کاربر عادی</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status">وضعیت حساب <span class="required">*</span></label>
                                <select id="status" class="form-control" required>
                                    <option value="active">فعال</option>
                                    <option value="inactive">غیرفعال</option>
                                    <option value="pending">در انتظار تایید</option>
                                </select>
                            </div>
                        </div>

                        <div class="checkbox-group">
                            <input type="checkbox" id="sendWelcomeEmail">
                            <label for="sendWelcomeEmail">ارسال ایمیل خوشامدگویی به کاربر</label>
                        </div>

                        <div class="checkbox-group">
                            <input type="checkbox" id="forcePasswordChange">
                            <label for="forcePasswordChange">اجبار به تغییر رمز عبور در اولین ورود</label>
                        </div>
                    </div>

                    <!-- بخش اطلاعات اضافی -->
                    <div class="form-section">
                        <h3 class="section-title">
                            <i class="fas fa-info-circle"></i>
                            اطلاعات اضافی
                        </h3>
                        
                        <div class="form-group">
                            <label for="bio">بیوگرافی</label>
                            <textarea id="bio" class="form-control" rows="4" placeholder="توضیح مختصری درباره کاربر..."></textarea>
                            <div class="form-hint">حداکثر ۵۰۰ کاراکتر</div>
                        </div>

                        <div class="form-group">
                            <label for="website">وبسایت</label>
                            <input type="url" id="website" class="form-control" placeholder="https://example.com">
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary">
                            <i class="fas fa-times"></i>
                            انصراف
                        </button>
                        <button type="reset" class="btn btn-secondary">
                            <i class="fas fa-redo"></i>
                            بازنشانی فرم
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-user-plus"></i>
                            ایجاد کاربر جدید
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

        // مدیریت آپلود آواتار
        document.getElementById('avatar').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const preview = document.getElementById('avatarPreview');
            const previewIcon = document.querySelector('.avatar-preview i');
            
            if (file) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                    previewIcon.style.display = 'none';
                }
                
                reader.readAsDataURL(file);
            }
        });

        // اعتبارسنجی فرم
        document.getElementById('new-user-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            
            if (password !== confirmPassword) {
                alert('رمز عبور و تکرار آن مطابقت ندارند!');
                document.getElementById('confirmPassword').classList.add('error');
                return;
            }
            
            if (password.length < 8) {
                alert('رمز عبور باید حداقل ۸ کاراکتر باشد!');
                document.getElementById('password').classList.add('error');
                return;
            }
            
            // در اینجا می‌توانید کد ارسال فرم به سرور را اضافه کنید
            alert('کاربر جدید با موفقیت ایجاد شد!');
            // اینجا می‌توانید فرم را ریست کنید یا کاربر را به صفحه دیگری هدایت کنید
        });

        // اضافه کردن افکت شیشه‌ای پویا
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.user-form-container, .sidebar, .header');
            
            cards.forEach(card => {
                card.addEventListener('mousemove', function(e) {
                    const rect = this.getBoundingClientRect();
                    const x = e.clientX - rect.left;
                    const y = e.clientY - rect.top;
                    
                    this.style.setProperty('--mouse-x', `${x}px`);
                    this.style.setProperty('--mouse-y', `${y}px`);
                });
            });
        });
    </script>

@endsection

