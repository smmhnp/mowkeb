@extends('adminBase.baseFormat')

@section('style')

        <link href="{{ asset('css/galery.css') }}" rel="stylesheet">

@endsection

@section('content')
   
    <main class="main-content">
        <div class="page-title">
            <h2>گالری تصاویر</h2>
            @if(Auth::user()->role != 'editor')
                <a href="{{ route('MedaiControler.ImageManager') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i>
                    افزودن تصویر جدید
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
                    <p>کل تصاویر</p>
                </div>
            </div>
        </div>

        <!-- فیلترها و جستجو -->
        <div class="gallery-filters">
            <div class="filter-row">
                <div class="form-group">
                    <label for="search">جستجوی تصویر</label>
                    <input type="text" id="search" class="form-control" placeholder="عنوان یا شناسه تصویر...">
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

        <!-- گالری تصاویر -->
        <div class="gallery-section">
            <h3 class="section-title">
                <i class="fas fa-video"></i>
                همه تصاویر
            </h3>
            <div class="gallery-grid" id="videoGallery">
                @foreach($images as $image)
                    <div class="video-card"
                        data-url="{{ asset('storage/' . $image->url) }}"
                        data-title="{{ $image->name }}" 
                        data-description="{{ $image->description }}" 
                        data-alt="{{ $image->alt }}" 
                        data-date="{{ jDate($image->created_at)->format('Y/m/d') }}">
                        
                        <div class="video-thumbnail">
                            <img src="{{ asset('storage/' . $image->url) }}" alt="{{ $image->alt }}">
                            <div class="play-overlay">
                                
                            </div>
                        </div>
                        <div class="video-info">
                            <div class="video-header">
                                <div class="video-title">{{ $image->name }}</div>
                                <div class="video-actions">
                                    @if(Auth::user()->role != 'editor')
                                        <a href="{{ route('MedaiControler.UpdateImageStore', ['image' => $image->id]) }}" class="action-btn edit-btn" title="ویرایش">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        @if(Auth::user()->role == 'super_admin')
                                            <a href="#" class="action-btn delete-btn" data-id="{{ $image->id }}" title="حذف">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        @endif
                                    @endif
                                </div>
                            </div>
                            <div class="video-stats">
                                <div class="stat">
                                    <i class="fas fa-calendar"></i>
                                    <span>{{ jDate($image->created_at)->ago() }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="pagination-wrapper mt-4">
                    {{ $images->links() }}
                </div>
            </div>
        </div>
    </main>

    <!-- مودال نمایش تصویر -->
    <div class="modal" id="videoModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>مشاهده تصویر</h3>
                <button class="close-modal" id="closeModal">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <img class="modal-video" controls id="modalVideo" alt="">
                <div class="modal-info">
                    
                    <div style="color: white; margin-bottom: 10px;">
                        <h4 style="margin-bottom: 10px;">آموزش کامل طراحی وب سایت ریسپانسیو</h4>
                        <p style="opacity: 0.8; font-size: 14px; line-height: 1.6;">
                            در این ویدیو به صورت کامل با مفاهیم طراحی وب سایت ریسپانسیو آشنا می‌شوید 
                            و یاد می‌گیرید چگونه سایت‌هایی بسازید که در تمام دستگاه‌ها به خوبی نمایش داده شوند.
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
        document.querySelectorAll('.delete-btn').forEach(btn => {
            btn.addEventListener('click', e => {
                e.preventDefault();
                const id = btn.getAttribute('data-id');
                const card = btn.closest('.video-card');

                if (confirm('آیا از حذف این تصویر مطمئن هستید؟')) {
                    fetch(`/admin/delete/image/${id}`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
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

        // مدیریت مودال ویدیو
        const videoModal = document.getElementById('videoModal');
        const closeModal = document.getElementById('closeModal');
        const modalVideo = document.getElementById('modalVideo');
        const videoCards = document.querySelectorAll('.video-card');

        // باز کردن مودال با کلیک روی کارت ویدیو
        videoCards.forEach(card => {
            card.addEventListener('click', function(e) {
                if (!e.target.closest('.video-actions')) {
                    openVideoModal(this);
                }
            });
        });


        function openVideoModal(card) {
            const imageUrl = card.dataset.url;
            const imageTitle = card.dataset.title;
            const imageDesc = card.dataset.description;
            const imageAlt = card.dataset.alt;
            const imageDate = card.dataset.date;

            // مقداردهی به عناصر داخل مودال
            modalVideo.src = imageUrl;
            document.querySelector('.modal-info h4').textContent = imageTitle;
            document.querySelector('.modal-info p').textContent = imageDesc;
            document.querySelector('.modal-stat-value').textContent = imageDate;
            document.querySelector('.modal-video').setAttribute('alt', imageAlt);

            videoModal.classList.add('active');
        }

        // بستن مودال
        function closeVideoModal() {
            videoModal.classList.remove('active');
            modalVideo.pause();
            modalVideo.currentTime = 0;
        }

        closeModal.addEventListener('click', closeVideoModal);

        // بستن مودال با کلیک خارج از آن
        videoModal.addEventListener('click', function(e) {
            if (e.target === videoModal) {
                closeVideoModal();
            }
        });

        document.querySelectorAll('.delete-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                const videoId = this.closest('.video-card').dataset.videoId;
                const videoTitle = this.closest('.video-card').querySelector('.video-title').textContent;
            });
        });

        // اضافه کردن افکت شیشه‌ای پویا
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.stat-card, .video-card, .gallery-filters, .gallery-section, .sidebar, .header');
            
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
