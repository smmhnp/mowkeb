@extends('adminBase.baseFormat')

@section('style')

    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

@endsection

@section('content')

    <main class="main-content" id="mainContent">
        <div class="page-title">
            <h2>داشبورد مدیریت</h2>
            @if(Auth::user()->role != 'user')
                <a href="{{ route('ArticleController.articleManager') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i>
                    نوشتن مطلب جدید
                </a>
            @endif
        </div>

        <div class="stats-cards">
            <div class="stat-card articles">
                <div class="stat-icon">
                    <i class="fas fa-newspaper"></i>
                </div>
                <div class="stat-info">
                    <h3>{{ $count['article'] }}</h3>
                    <p>تعداد مطالب</p>
                </div>
            </div>
            <div class="stat-card views">
                <div class="stat-icon">
                    <i class="fas fa-eye"></i>
                </div>
                <div class="stat-info">
                    <h3>{{ $count['image'] }}</h3>
                    <p>تعداد تصاویر</p>
                </div>
            </div>
            <div class="stat-card users">
                <div class="stat-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-info">
                    <h3>{{ $count['video'] }}</h3>
                    <p>تعداد ویدیوها</p>
                </div>
            </div>
            <div class="stat-card comments">
                <div class="stat-icon">
                    <i class="fas fa-comments"></i>
                </div>
                <div class="stat-info">
                    <h3>{{ $count['user'] }}</h3>
                    <p>تعداد کاربران</p>
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
                        <th>تاریخ ایجاد</th>
                        <th>وضعیت</th>
                        <th>عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($articles as $article)
                        <tr>
                            <td>{{ $article->name }}</td>
                            <td>{{ $article->user->fname . " " . $article->user->lname}}</td>
                            <td>{{ jDate($article->created_at)->ago() }}</td>
                            <td><span class="status published">{{ status($article->status) }}</span></td>
                            <td>
                                @if(Auth::user()->role != 'user')
                                    <a href="{{ route('ArticleController.updateArticleManager', ['id' => $article->id]) }}" class="action-btn"><i class="fas fa-edit"></i></a>
                                @endif
                                <a href="{{ route('ArticleController.showArticle', ['id' => $article->id]) }}" class="action-btn"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                   @endforeach
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
