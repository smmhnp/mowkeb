@extends('clientBase.baseFormat')

@section('style')

    <link href="{{ asset('css/categoryArticle.css') }}" rel="stylesheet">

@endsection

@section('content')

    <main class="main-container">

        <!-- بخش فیلترها -->
        <section class="filters-section">
            <div class="filter-row">
                <div class="form-group">
                    <label for="sort">مرتب‌سازی بر اساس</label>
                    <select id="sort" class="form-control">
                        <option value="newest">جدیدترین</option>
                        <option value="popular">پربازدیدترین</option>
                        <option value="featured">مقالات ویژه</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="date">تاریخ انتشار</label>
                    <select id="date" class="form-control">
                        <option value="">همه تاریخ‌ها</option>
                        <option value="today">امروز</option>
                        <option value="week">هفته جاری</option>
                        <option value="month">ماه جاری</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="author">نویسنده</label>
                    <select id="author" class="form-control">
                        <option value="">همه نویسندگان</option>
                        <option value="1">محمد رضایی</option>
                        <option value="2">فاطمه کریمی</option>
                        <option value="3">علی محمدی</option>
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-outline" style="width: 100%;">
                        <i class="fas fa-filter"></i>
                        اعمال فیلتر
                    </button>
                </div>
            </div>
        </section>

        <!-- شبکه مقالات -->
        <div class="articles-grid">
            @foreach($articles as $article)
                <article class="news-card">
                    <div class="news-image">
                        <img src="{{ asset('storage/' . $article->cover) }}" alt="مقاله سیاسی">
                        <div class="image-news">
                            @if($article->tag == 'special')
                                <span class="special-badge">ویژه</span>
                            @endif
                        </div>
                    </div>
                    <div class="news-content">
                        <div class="news-meta">
                            <span class="news-category">{{ $article->category->name }}</span>
                            <span>{{ jDate($article->created_at)->ago() }}</span>
                        </div>
                        <h3 class="news-title">{{ $article->name }}</h3>
                        <p class="news-excerpt">{{ $article->summery }}</p>
                        <div class="news-footer">
                            <div class="news-author">
                                <div class="author-avatar"></div>
                                <span>{{ $article->user->fname . " " . $article->user->lname }}</span>
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="pagination-wrapper mt-4">
            {{ $articles->links() }}
        </div>
    </main>

@endsection

@section('script')        

    <script>
        // مدیریت سایدبار موبایل
        const menuToggle = document.getElementById('menuToggle');
        const mobileSidebar = document.getElementById('mobileMenu');
        const mobileOverlay = document.getElementById('mobileOverlay');
        const closeMenu = document.getElementById('closeMenu');

        function openMobileMenu() {
            mobileSidebar.classList.add('active');
            mobileOverlay.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeMobileMenu() {
            mobileSidebar.classList.remove('active');
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

        // مدیریت فیلترها
        document.querySelectorAll('.form-control').forEach(select => {
            select.addEventListener('change', function() {
                console.log('فیلتر اعمال شد:', this.id, this.value);
            });
        });

        // مدیریت ریسپانسیو
        window.addEventListener('resize', function() {
            if (window.innerWidth > 992) {
                closeMobileMenu();
            }
        });
    </script>

@endsection