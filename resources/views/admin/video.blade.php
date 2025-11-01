@extends('adminBase.baseFormat')

@section('style')
    <link href="{{ asset('css/galery.css') }}" rel="stylesheet">
    <style>
        .modal {
            display: none;
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0,0,0,0.8);
            z-index: 9999;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .modal.active {
            display: flex;
        }
        .modal-content {
            background: #1a1a1a;
            border-radius: 16px;
            width: 100%;
            max-width: 800px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0,0,0,0.3);
        }
        .modal-header {
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #333;
        }
        .modal-header h3 {
            margin: 0;
            color: #fff;
            font-size: 1.5rem;
        }
        .close-modal {
            background: none;
            border: none;
            color: #aaa;
            font-size: 1.5rem;
            cursor: pointer;
        }
        .close-modal:hover { color: #fff; }
        .modal-body {
            padding: 20px;
        }
        #modalVideoPlayer {
            width: 100%;
            height: 400px;
            background: #000;
            border-radius: 12px;
            overflow: hidden;
            margin-bottom: 15px;
        }
        #modalVideoPlayer iframe {
            width: 100%;
            height: 100%;
            border: none;
        }
        .play-overlay {
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0,0,0,0.4);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: 0.3s;
        }
        .video-card:hover .play-overlay {
            opacity: 1;
        }
        .play-overlay i {
            font-size: 3rem;
            color: rgba(255,255,255,0.8);
        }
    </style>
@endsection

@section('content')
    <main class="main-content">
        <div class="page-title">
            <h2>گالری ویدیوها</h2>
            @if(Auth::user()->role != 'editor')
                <a href="{{ route('MedaiControler.VideoManager') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i>
                    افزودن ویدیو جدید
                </a>
            @endif
        </div>

        <!-- آمار کلی -->
        <div class="stats-cards">
            <div class="stat-card total-videos">
                <div class="stat-icon">
                    <i class="fas fa-video"></i>
                </div>
                <div class="stat-info">
                    <h3>{{ $count }}</h3>
                    <p>کل ویدیوها</p>
                </div>
            </div>
        </div>

        <!-- فیلترها و جستجو -->
        <div class="gallery-filters">
            <div class="filter-row">
                <div class="form-group">
                    <label for="search">جستجوی ویدیو</label>
                    <input type="text" id="search" class="form-control" placeholder="عنوان یا شناسه ویدیو...">
                </div>
                <div class="form-group">
                    <label for="sort">مرتب‌سازی بر اساس</label>
                    <select id="sort" class="form-control">
                        <option value="newest">جدیدترین</option>
                        <option value="oldest">قدیمی‌ترین</option>
                        <option value="views">بیشترین بازدید</option>
                        <option value="name">نام</option>
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" style="height: 40px;">
                        <i class="fas fa-filter"></i>
                        اعمال فیلتر
                    </button>
                </div>
            </div>
        </div>

        <!-- گالری ویدیوها -->
        <div class="gallery-section">
            <h3 class="section-title">
                <i class="fas fa-video"></i>
                همه ویدیوها
            </h3>
            <div class="gallery-grid" id="videoGallery">
                @foreach($videos as $video)
                    <div class="video-card"
                        data-url="{{ $video->link }}"
                        data-title="{{ $video->name }}"
                        data-date="{{ jDate($video->created_at)->format('Y/m/d') }}">
                        
                        <div class="video-thumbnail" id="{{ $video->aparatID }}">
                            <script type="text/JavaScript" src="{{ $video->link }}"></script>
                        </div>
                        <div class="video-info">
                            <div class="video-header">
                                <div class="video-title">{{ $video->name }}</div>
                                <div class="video-actions">
                                    @if(Auth::user()->role != 'editor')
                                        <a href="{{ route('MedaiControler.UpdateVideoStore', ['video' => $video->id]) }}" class="action-btn edit-btn" title="ویرایش">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        @if(Auth::user()->role == 'super_admin')
                                            <a href="#" class="action-btn delete-btn" data-id="{{ $video->id }}" title="حذف">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        @endif
                                    @endif
                                </div>
                            </div>
                            <div class="video-stats">
                                <div class="stat">
                                    <i class="fas fa-calendar"></i>
                                    <span>{{ jDate($video->created_at)->ago() }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="pagination-wrapper mt-4">
                {{ $videos->links() }}
            </div>
        </div>
    </main>

    <!-- مودال نمایش ویدیو -->
    <div class="modal" id="videoModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>مشاهده ویدیو</h3>
                <button class="close-modal" id="closeModal">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="modal-info">
                    <div class="modalVideo"></div>
                    <div style="color: white; margin-bottom: 10px;">
                        <h4 style="margin-bottom: 10px;"></h4>
                        <p style="opacity: 0.8; font-size: 14px; line-height: 1.6;">
                            <!-- توضیحات ویدیو در این بخش نمایش داده می‌شود. -->
                        </p>
                    </div>
                    <div class="modal-stats">
                        <div class="modal-stat">
                            <div class="modal-stat-value"></div>
                            <div class="modal-stat-label">تاریخ آپلود</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>

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

        document.querySelectorAll('.delete-btn').forEach(btn => {
            btn.addEventListener('click', e => {
                e.preventDefault();
                e.stopPropagation();
                const id = btn.getAttribute('data-id');
                const card = btn.closest('.video-card');

                if (confirm('آیا از حذف این تصویر مطمئن هستید؟')) {
                    fetch(`/admin/delete/video/${id}`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(res => res.ok ? res.json() : Promise.reject())
                    .then(() => {
                        card.style.transition = "opacity 0.3s ease";
                        card.style.opacity = "0";
                        setTimeout(() => card.remove(), 300);
                    })
                    .catch(() => alert('خطا در حذف تصویر'));
                }
            });
        });

        // مدیریت مودال
        const videoModal = document.getElementById('videoModal');
        const closeModal = document.getElementById('closeModal');
        const modalVideo = document.querySelector('.modalVideo');
        const videoCards = document.querySelectorAll('.video-card');

        function getAparatIframeUrl(embedUrl) {
            const match = embedUrl.match(/\/embed\/([a-zA-Z0-9]+)/);
            if (match && match[1]) {
                const videoHash = match[1];
                return `https://www.aparat.com/video/video/embed/videohash/${videoHash}/vt/frame`;
            }
            return embedUrl;
        }

        videoCards.forEach(card => {
            card.addEventListener('click', function(e) {
                if (!e.target.closest('.video-actions')) {
                    const videoUrl = getAparatIframeUrl(this.dataset.url);
                    const videoTitle = this.dataset.title;
                    const videoDate = this.dataset.date;

                    modalVideo.innerHTML = `<iframe src="${videoUrl}" width="100%" height="400" frameborder="0" allowfullscreen style="border:none;"></iframe>`;
                    document.querySelector('.modal-info h4').textContent = videoTitle;
                    document.querySelector('.modal-stat-value').textContent = videoDate;

                    videoModal.classList.add('active');
                }
            });
        });

        // بستن مودال
        closeModal.addEventListener('click', () => {
            videoModal.classList.remove('active');
            modalVideo.innerHTML = '';
        });

        videoModal.addEventListener('click', e => {
            if (e.target === videoModal) {
                videoModal.classList.remove('active');
                modalVideo.innerHTML = '';
            }
        });

        // افکت شیشه‌ای (اختیاری)
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.stat-card, .video-card, .gallery-filters, .gallery-section');
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