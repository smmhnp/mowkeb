@extends('clientBase.baseFormat')

@section('style')
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="{{ asset('css/show.css') }}" rel="stylesheet">

@endsection

@section('content')
    
    <main class="main-container">
        <!-- بخش ویدیو و توضیحات -->
        <section class="hero-section hero-content">
            <div class="video-container">
                <div id="{{ $content->video->aparatID }}">
                    <script type="text/JavaScript" src="{{ $content->video->link }}"></script>
                </div>
            </div>
            <div>
                {{ $content->content }}
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

        // مدیریت دکمه‌های بخش ویدیو
        document.querySelector('.btn-primary').addEventListener('click', function() {
            const video = document.querySelector('video');
            video.play();
        });

        document.querySelector('.btn-outline').addEventListener('click', function() {
            alert('اطلاعات بیشتر درباره راهپیمایی اربعین');
        });
    </script>

@endsection