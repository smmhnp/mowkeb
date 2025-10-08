@extends('adminBase.baseFormat')

@section('style')

    <link href="{{ asset('css/galery.css') }}" rel="stylesheet">

@endsection

@section('content')

    <main class="main-content">
        <div class="page-title">
            <h2>گالری ویدیوها</h2>
            <button class="btn btn-primary">
                <i class="fas fa-plus"></i>
                افزودن ویدیو جدید
            </button>
        </div>

        <!-- آمار کلی -->
        <div class="stats-cards">
            <div class="stat-card total-videos">
                <div class="stat-icon">
                    <i class="fas fa-video"></i>
                </div>
                <div class="stat-info">
                    <h3>۴۸</h3>
                    <p>کل ویدیوها</p>
                </div>
            </div>
            <div class="stat-card youtube-videos">
                <div class="stat-icon">
                    <i class="fab fa-youtube"></i>
                </div>
                <div class="stat-info">
                    <h3>۲۸</h3>
                    <p>ویدیوهای یوتیوب</p>
                </div>
            </div>
            <div class="stat-card vimeo-videos">
                <div class="stat-icon">
                    <i class="fab fa-vimeo"></i>
                </div>
                <div class="stat-info">
                    <h3>۱۲</h3>
                    <p>ویدیوهای ویمئو</p>
                </div>
            </div>
            <div class="stat-card aparat-videos">
                <div class="stat-icon">
                    <i class="fas fa-video"></i>
                </div>
                <div class="stat-info">
                    <h3>۸</h3>
                    <p>ویدیوهای آپارات</p>
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
                    <label for="platform">پلتفرم</label>
                    <select id="platform" class="form-control">
                        <option value="">همه پلتفرم‌ها</option>
                        <option value="youtube">YouTube</option>
                        <option value="vimeo">Vimeo</option>
                        <option value="aparat">آپارات</option>
                    </select>
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
                <!-- ویدیو ۱ -->
                <div class="video-card" data-video-id="VID_001">
                    <div class="video-thumbnail">
                        <img src="https://via.placeholder.com/400x225/4361ee/ffffff?text=Web+Design+Tutorial" alt="آموزش طراحی وب">
                        <div class="play-overlay">
                            <div class="play-icon">
                                <i class="fas fa-play"></i>
                            </div>
                        </div>
                        <div class="video-duration">۱۵:۳۰</div>
                    </div>
                    <div class="video-info">
                        <div class="video-header">
                            <div class="video-title">آموزش کامل طراحی وب سایت ریسپانسیو</div>
                            <div class="video-actions">
                                <button class="action-btn edit-btn" title="ویرایش">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-btn delete-btn" title="حذف">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                        <div class="video-meta">
                            <span class="video-id">VID_001</span>
                            <span class="platform-badge youtube-badge">YouTube</span>
                        </div>
                        <div class="video-stats">
                            <div class="stat">
                                <i class="fas fa-eye"></i>
                                <span>۱,۲۴۵ بازدید</span>
                            </div>
                            <div class="stat">
                                <i class="fas fa-calendar"></i>
                                <span>۱۴۰۲/۰۵/۱۵</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ویدیو ۲ -->
                <div class="video-card" data-video-id="VID_002">
                    <div class="video-thumbnail">
                        <img src="https://via.placeholder.com/400x225/f72585/ffffff?text=News+Report" alt="گزارش خبری">
                        <div class="play-overlay">
                            <div class="play-icon">
                                <i class="fas fa-play"></i>
                            </div>
                        </div>
                        <div class="video-duration">۰۸:۴۵</div>
                    </div>
                    <div class="video-info">
                        <div class="video-header">
                            <div class="video-title">گزارش ویژه از مراسم افتتاحیه پروژه ملی</div>
                            <div class="video-actions">
                                <button class="action-btn edit-btn" title="ویرایش">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-btn delete-btn" title="حذف">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                        <div class="video-meta">
                            <span class="video-id">VID_002</span>
                            <span class="platform-badge aparat-badge">آپارات</span>
                        </div>
                        <div class="video-stats">
                            <div class="stat">
                                <i class="fas fa-eye"></i>
                                <span>۲,۳۴۱ بازدید</span>
                            </div>
                            <div class="stat">
                                <i class="fas fa-calendar"></i>
                                <span>۱۴۰۲/۰۵/۱۴</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ویدیو ۳ -->
                <div class="video-card" data-video-id="VID_003">
                    <div class="video-thumbnail">
                        <img src="https://via.placeholder.com/400x225/4cc9f0/ffffff?text=Expert+Interview" alt="مصاحبه تخصصی">
                        <div class="play-overlay">
                            <div class="play-icon">
                                <i class="fas fa-play"></i>
                            </div>
                        </div>
                        <div class="video-duration">۲۲:۱۵</div>
                    </div>
                    <div class="video-info">
                        <div class="video-header">
                            <div class="video-title">مصاحبه اختصاصی با کارشناس برتر اقتصادی</div>
                            <div class="video-actions">
                                <button class="action-btn edit-btn" title="ویرایش">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-btn delete-btn" title="حذف">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                        <div class="video-meta">
                            <span class="video-id">VID_003</span>
                            <span class="platform-badge vimeo-badge">Vimeo</span>
                        </div>
                        <div class="video-stats">
                            <div class="stat">
                                <i class="fas fa-eye"></i>
                                <span>۸۷۶ بازدید</span>
                            </div>
                            <div class="stat">
                                <i class="fas fa-calendar"></i>
                                <span>۱۴۰۲/۰۵/۱۳</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ویدیو ۴ -->
                <div class="video-card" data-video-id="VID_004">
                    <div class="video-thumbnail">
                        <img src="https://via.placeholder.com/400x225/f8961e/ffffff?text=Tech+Review" alt="بررسی تکنولوژی">
                        <div class="play-overlay">
                            <div class="play-icon">
                                <i class="fas fa-play"></i>
                            </div>
                        </div>
                        <div class="video-duration">۱۲:۲۰</div>
                    </div>
                    <div class="video-info">
                        <div class="video-header">
                            <div class="video-title">بررسی جدیدترین گوشی هوشمند بازار</div>
                            <div class="video-actions">
                                <button class="action-btn edit-btn" title="ویرایش">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-btn delete-btn" title="حذف">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                        <div class="video-meta">
                            <span class="video-id">VID_004</span>
                            <span class="platform-badge youtube-badge">YouTube</span>
                        </div>
                        <div class="video-stats">
                            <div class="stat">
                                <i class="fas fa-eye"></i>
                                <span>۳,۴۵۲ بازدید</span>
                            </div>
                            <div class="stat">
                                <i class="fas fa-calendar"></i>
                                <span>۱۴۰۲/۰۵/۱۲</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- مودال نمایش ویدیو -->
    <div class="modal" id="videoModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>پخش ویدیو</h3>
                <button class="close-modal" id="closeModal">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <video class="modal-video" controls id="modalVideo">
                    مرورگر شما از تگ ویدیو پشتیبانی نمی‌کند.
                </video>
                <div class="modal-info">
                    <div class="modal-stats">
                        <div class="modal-stat">
                            <div class="modal-stat-value">۱,۲۴۵</div>
                            <div class="modal-stat-label">بازدید</div>
                        </div>
                        <div class="modal-stat">
                            <div class="modal-stat-value">۱۵:۳۰</div>
                            <div class="modal-stat-label">مدت زمان</div>
                        </div>
                        <div class="modal-stat">
                            <div class="modal-stat-value">۱۴۰۲/۰۵/۱۵</div>
                            <div class="modal-stat-label">تاریخ آپلود</div>
                        </div>
                    </div>
                    <div style="color: white;">
                        <h4 style="margin-bottom: 10px;">آموزش کامل طراحی وب سایت ریسپانسیو</h4>
                        <p style="opacity: 0.8; font-size: 14px; line-height: 1.6;">
                            در این ویدیو به صورت کامل با مفاهیم طراحی وب سایت ریسپانسیو آشنا می‌شوید 
                            و یاد می‌گیرید چگونه سایت‌هایی بسازید که در تمام دستگاه‌ها به خوبی نمایش داده شوند.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

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

        // مدیریت مودال ویدیو
        const videoModal = document.getElementById('videoModal');
        const closeModal = document.getElementById('closeModal');
        const modalVideo = document.getElementById('modalVideo');
        const videoCards = document.querySelectorAll('.video-card');

        // باز کردن مودال با کلیک روی کارت ویدیو
        videoCards.forEach(card => {
            card.addEventListener('click', function(e) {
                if (!e.target.closest('.video-actions')) {
                    const videoId = this.dataset.videoId;
                    openVideoModal(videoId);
                }
            });
        });

        function openVideoModal(videoId) {
            // در اینجا می‌توانید ویدیو واقعی را بارگذاری کنید
            modalVideo.src = `https://example.com/videos/${videoId}.mp4`;
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

        // مدیریت دکمه‌های ویرایش و حذف
        document.querySelectorAll('.edit-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                const videoId = this.closest('.video-card').dataset.videoId;
                alert(`ویرایش ویدیو: ${videoId}`);
                // اینجا می‌توانید به صفحه ویرایش هدایت شوید
            });
        });

        document.querySelectorAll('.delete-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                const videoId = this.closest('.video-card').dataset.videoId;
                const videoTitle = this.closest('.video-card').querySelector('.video-title').textContent;
                
                if (confirm(`آیا از حذف ویدیو "${videoTitle}" مطمئن هستید؟`)) {
                    // اینجا می‌توانید کد حذف ویدیو را اضافه کنید
                    this.closest('.video-card').style.display = 'none';
                    alert(`ویدیو "${videoTitle}" با موفقیت حذف شد!`);
                }
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
