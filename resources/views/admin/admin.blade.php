@extends('adminBase.baseFormat')

@section('style')

    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

@endsection

@section('content')

    <main class="main-content" id="mainContent">
        <div class="page-title">
            <h2>داشبورد مدیریت</h2>
            <button class="btn btn-primary">
                <i class="fas fa-plus"></i>
                نوشتن مطلب جدید
            </button>
        </div>

        <div class="stats-cards">
            <div class="stat-card articles">
                <div class="stat-icon">
                    <i class="fas fa-newspaper"></i>
                </div>
                <div class="stat-info">
                    <h3>۱,۲۴۷</h3>
                    <p>تعداد مطالب</p>
                </div>
            </div>
            <div class="stat-card views">
                <div class="stat-icon">
                    <i class="fas fa-eye"></i>
                </div>
                <div class="stat-info">
                    <h3>۴۵,۸۲۱</h3>
                    <p>بازدید امروز</p>
                </div>
            </div>
            <div class="stat-card users">
                <div class="stat-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-info">
                    <h3>۳,۴۵۸</h3>
                    <p>کاربران ثبت‌نام شده</p>
                </div>
            </div>
            <div class="stat-card comments">
                <div class="stat-icon">
                    <i class="fas fa-comments"></i>
                </div>
                <div class="stat-info">
                    <h3>۱۲۴</h3>
                    <p>نظرات جدید</p>
                </div>
            </div>
        </div>

        <div class="recent-articles">
            <h3 class="section-title">
                <i class="fas fa-list"></i>
                آخرین مطالب
            </h3>
            <table>
                <thead>
                    <tr>
                        <th>عنوان مطلب</th>
                        <th>نویسنده</th>
                        <th>تاریخ انتشار</th>
                        <th>بازدید</th>
                        <th>وضعیت</th>
                        <th>عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>بررسی جدیدترین گوشی سامسونگ</td>
                        <td>محمد رضایی</td>
                        <td>۱۴۰۲/۰۵/۱۵</td>
                        <td>۱,۲۴۵</td>
                        <td><span class="status published">منتشر شده</span></td>
                        <td>
                            <button class="action-btn"><i class="fas fa-edit"></i></button>
                            <button class="action-btn"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>تحلیل بازار بورس امروز</td>
                        <td>فاطمه کریمی</td>
                        <td>۱۴۰۲/۰۵/۱۴</td>
                        <td>۲,۳۴۱</td>
                        <td><span class="status published">منتشر شده</span></td>
                        <td>
                            <button class="action-btn"><i class="fas fa-edit"></i></button>
                            <button class="action-btn"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>گزارش جامع از وضعیت آب و هوا</td>
                        <td>علی محمدی</td>
                        <td>۱۴۰۲/۰۵/۱۳</td>
                        <td>۱,۸۷۶</td>
                        <td><span class="status published">منتشر شده</span></td>
                        <td>
                            <button class="action-btn"><i class="fas fa-edit"></i></button>
                            <button class="action-btn"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>مقاله جدید در مورد هوش مصنوعی</td>
                        <td>زهرا احمدی</td>
                        <td>۱۴۰۲/۰۵/۱۲</td>
                        <td>۹۸۷</td>
                        <td><span class="status draft">پیش‌نویس</span></td>
                        <td>
                            <button class="action-btn"><i class="fas fa-edit"></i></button>
                            <button class="action-btn"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>

@endsection

@section('script')

    <script>
        // مدیریت منوی کشویی
        const menuToggle = document.getElementById('menuToggle');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        const mainContent = document.getElementById('mainContent');

        // تابع برای باز کردن منو
        function openMenu() {
            sidebar.classList.add('active');
            overlay.classList.add('active');
            mainContent.classList.add('menu-open');
            document.body.style.overflow = 'hidden'; // جلوگیری از اسکرول بدنه
        }

        // تابع برای بستن منو
        function closeMenu() {
            sidebar.classList.remove('active');
            overlay.classList.remove('active');
            mainContent.classList.remove('menu-open');
            document.body.style.overflow = ''; // بازگشت اسکرول بدنه
        }

        // رویداد کلیک روی دکمه منو
        menuToggle.addEventListener('click', function(e) {
            e.stopPropagation();
            if (sidebar.classList.contains('active')) {
                closeMenu();
            } else {
                openMenu();
            }
        });

        // رویداد کلیک روی overlay
        overlay.addEventListener('click', function() {
            closeMenu();
        });

        // رویداد کلیک روی لینک‌های منو (برای بستن منو در موبایل)
        document.querySelectorAll('.menu a').forEach(link => {
            link.addEventListener('click', function() {
                if (window.innerWidth <= 992) {
                    closeMenu();
                }
            });
        });

        // رویداد تغییر سایز پنجره
        window.addEventListener('resize', function() {
            if (window.innerWidth > 992) {
                // در دسکتاپ منو را ببند
                closeMenu();
            }
        });

        // اضافه کردن افکت شیشه‌ای پویا
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.stat-card, .recent-articles, .sidebar, .header');
            
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

        // جلوگیری از اسکرول وقتی منو باز است
        document.addEventListener('touchmove', function(e) {
            if (sidebar.classList.contains('active')) {
                e.preventDefault();
            }
        }, { passive: false });
    </script>

@endsection
