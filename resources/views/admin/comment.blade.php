@extends('adminBase.baseFormat')

@section('style')

        <link href="{{ asset('css/comment.css') }}" rel="stylesheet">

@endsection

@section('content')

    <main class="main-content">
        <div class="page-title">
            <h2>مدیریت نظرات</h2>
            <button class="btn btn-primary">
                <i class="fas fa-sync-alt"></i>
                بروزرسانی لیست
            </button>
        </div>

        <!-- آمار کلی -->
        <div class="stats-cards">
            <div class="stat-card total-comments">
                <div class="stat-icon">
                    <i class="fas fa-comments"></i>
                </div>
                <div class="stat-info">
                    <h3>۱,۲۴۷</h3>
                    <p>کل نظرات</p>
                </div>
            </div>
            <div class="stat-card pending-comments">
                <div class="stat-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="stat-info">
                    <h3>۴۸</h3>
                    <p>نظرات در انتظار تایید</p>
                </div>
            </div>
            <div class="stat-card approved-comments">
                <div class="stat-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="stat-info">
                    <h3>۱,۱۵۶</h3>
                    <p>نظرات تایید شده</p>
                </div>
            </div>
            <div class="stat-card rejected-comments">
                <div class="stat-icon">
                    <i class="fas fa-times-circle"></i>
                </div>
                <div class="stat-info">
                    <h3>۴۳</h3>
                    <p>نظرات رد شده</p>
                </div>
            </div>
        </div>

        <!-- فیلترها و جستجو -->
        <div class="comments-filters">
            <div class="filter-row">
                <div class="form-group">
                    <label for="search">جستجوی نظرات</label>
                    <input type="text" id="search" class="form-control" placeholder="نام کاربر یا متن نظر...">
                </div>
                <div class="form-group">
                    <label for="status">وضعیت نظر</label>
                    <select id="status" class="form-control">
                        <option value="">همه وضعیت‌ها</option>
                        <option value="pending">در انتظار تایید</option>
                        <option value="approved">تایید شده</option>
                        <option value="rejected">رد شده</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="date">تاریخ</label>
                    <input type="date" id="date" class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" style="height: 40px;">
                        <i class="fas fa-filter"></i>
                        اعمال فیلتر
                    </button>
                </div>
            </div>
        </div>

        <!-- لیست نظرات -->
        <div class="comments-section">
            <h3 class="section-title">
                <i class="fas fa-list"></i>
                آخرین نظرات
            </h3>
            <div class="comments-list">
                <!-- نظر ۱ -->
                <div class="comment-card pending">
                    <div class="comment-header">
                        <div class="comment-user">
                            <div class="user-avatar-small">مح</div>
                            <div class="user-info-small">
                                <h4>محمد رضایی</h4>
                                <div class="user-email">mohammad@example.com</div>
                            </div>
                        </div>
                        <div class="comment-meta">
                            <div class="comment-date">۱۴۰۲/۰۵/۱۵ - ۱۴:۳۰</div>
                            <span class="status-badge status-pending">در انتظار تایید</span>
                        </div>
                    </div>
                    <div class="comment-article">
                        <div class="article-title">بررسی جدیدترین گوشی سامسونگ در بازار</div>
                        <a href="#" class="article-link">/article/samsung-new-phone-review</a>
                    </div>
                    <div class="comment-content">
                        مقاله بسیار عالی و کامل بود. من همین هفته این گوشی رو خریدم و واقعاً از عملکردش راضی هستم. باتری خیلی خوبی داره و دوربینش فوق العاده است. ممنون از بررسی دقیقتون.
                    </div>
                    <div class="comment-actions">
                        <button class="action-btn approve-btn">
                            <i class="fas fa-check"></i>
                            تایید نظر
                        </button>
                        <button class="action-btn reject-btn">
                            <i class="fas fa-times"></i>
                            رد نظر
                        </button>
                        <button class="action-btn reply-btn" data-comment-id="1">
                            <i class="fas fa-reply"></i>
                            پاسخ
                        </button>
                        <button class="action-btn delete-btn">
                            <i class="fas fa-trash"></i>
                            حذف
                        </button>
                    </div>
                </div>

                <!-- نظر ۲ -->
                <div class="comment-card approved">
                    <div class="comment-header">
                        <div class="comment-user">
                            <div class="user-avatar-small">ف</div>
                            <div class="user-info-small">
                                <h4>فاطمه کریمی</h4>
                                <div class="user-email">fatemeh@example.com</div>
                            </div>
                        </div>
                        <div class="comment-meta">
                            <div class="comment-date">۱۴۰۲/۰۵/۱۴ - ۱۰:۱۵</div>
                            <span class="status-badge status-approved">تایید شده</span>
                        </div>
                    </div>
                    <div class="comment-article">
                        <div class="article-title">تحلیل بازار بورس امروز</div>
                        <a href="#" class="article-link">/article/stock-market-analysis</a>
                    </div>
                    <div class="comment-content">
                        تحلیل بسیار خوبی بود. من به عنوان یک معامله گر حرفه‌ای می‌تونم بگم که پیش‌بینی‌های شما کاملاً درست بود. لطفاً ادامه بدید این تحلیل‌های بازار رو.
                    </div>
                    <div class="comment-actions">
                        <button class="action-btn reject-btn">
                            <i class="fas fa-times"></i>
                            لغو تایید
                        </button>
                        <button class="action-btn reply-btn" data-comment-id="2">
                            <i class="fas fa-reply"></i>
                            پاسخ
                        </button>
                        <button class="action-btn delete-btn">
                            <i class="fas fa-trash"></i>
                            حذف
                        </button>
                    </div>
                </div>

                <!-- نظر ۳ -->
                <div class="comment-card rejected">
                    <div class="comment-header">
                        <div class="comment-user">
                            <div class="user-avatar-small">ع</div>
                            <div class="user-info-small">
                                <h4>علی محمدی</h4>
                                <div class="user-email">ali@example.com</div>
                            </div>
                        </div>
                        <div class="comment-meta">
                            <div class="comment-date">۱۴۰۲/۰۵/۱۳ - ۱۶:۴۵</div>
                            <span class="status-badge status-rejected">رد شده</span>
                        </div>
                    </div>
                    <div class="comment-article">
                        <div class="article-title">گزارش جامع از وضعیت آب و هوا</div>
                        <a href="#" class="article-link">/article/weather-report</a>
                    </div>
                    <div class="comment-content">
                        این گزارش کاملاً اشتباه بود! پیش‌بینی شما برای بارندگی اصلاً درست نبود و باعث شد برنامه سفرم به هم بریزد.
                    </div>
                    <div class="comment-actions">
                        <button class="action-btn approve-btn">
                            <i class="fas fa-check"></i>
                            تایید نظر
                        </button>
                        <button class="action-btn reply-btn" data-comment-id="3">
                            <i class="fas fa-reply"></i>
                            پاسخ
                        </button>
                        <button class="action-btn delete-btn">
                            <i class="fas fa-trash"></i>
                            حذف
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- مودال پاسخ به نظر -->
    <div class="modal" id="replyModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>پاسخ به نظر</h3>
                <button class="close-modal" id="closeModal">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <form class="reply-form" id="replyForm">
                    <div class="form-group">
                        <label for="replyText">متن پاسخ</label>
                        <textarea id="replyText" placeholder="پاسخ خود را اینجا بنویسید..." required></textarea>
                    </div>
                    <div class="modal-actions">
                        <button type="button" class="btn btn-secondary" id="cancelReply">
                            انصراف
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-paper-plane"></i>
                            ارسال پاسخ
                        </button>
                    </div>
                </form>
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

        // مدیریت مودال پاسخ
        const replyModal = document.getElementById('replyModal');
        const closeModal = document.getElementById('closeModal');
        const cancelReply = document.getElementById('cancelReply');
        const replyForm = document.getElementById('replyForm');
        const replyButtons = document.querySelectorAll('.reply-btn');

        // باز کردن مودال پاسخ
        replyButtons.forEach(btn => {
            btn.addEventListener('click', function() {
                const commentId = this.dataset.commentId;
                openReplyModal(commentId);
            });
        });

        function openReplyModal(commentId) {
            replyModal.classList.add('active');
            // اینجا می‌توانید اطلاعات نظر را بارگذاری کنید
        }

        // بستن مودال
        function closeReplyModal() {
            replyModal.classList.remove('active');
            replyForm.reset();
        }

        closeModal.addEventListener('click', closeReplyModal);
        cancelReply.addEventListener('click', closeReplyModal);

        // بستن مودال با کلیک خارج از آن
        replyModal.addEventListener('click', function(e) {
            if (e.target === replyModal) {
                closeReplyModal();
            }
        });

        // ارسال پاسخ
        replyForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const replyText = document.getElementById('replyText').value;
            
            // در اینجا می‌توانید کد ارسال پاسخ به سرور را اضافه کنید
            console.log('ارسال پاسخ:', replyText);
            
            alert('پاسخ شما با موفقیت ارسال شد!');
            closeReplyModal();
        });

        // مدیریت دکمه‌های تایید و رد
        document.querySelectorAll('.approve-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const commentCard = this.closest('.comment-card');
                const userName = commentCard.querySelector('h4').textContent;
                
                if (confirm(`آیا از تایید نظر "${userName}" مطمئن هستید؟`)) {
                    commentCard.classList.remove('pending', 'rejected');
                    commentCard.classList.add('approved');
                    commentCard.querySelector('.status-badge').className = 'status-badge status-approved';
                    commentCard.querySelector('.status-badge').textContent = 'تایید شده';
                    alert('نظر با موفقیت تایید شد!');
                }
            });
        });

        document.querySelectorAll('.reject-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const commentCard = this.closest('.comment-card');
                const userName = commentCard.querySelector('h4').textContent;
                
                if (confirm(`آیا از رد نظر "${userName}" مطمئن هستید؟`)) {
                    commentCard.classList.remove('pending', 'approved');
                    commentCard.classList.add('rejected');
                    commentCard.querySelector('.status-badge').className = 'status-badge status-rejected';
                    commentCard.querySelector('.status-badge').textContent = 'رد شده';
                    alert('نظر با موفقیت رد شد!');
                }
            });
        });

        // مدیریت دکمه حذف
        document.querySelectorAll('.delete-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const commentCard = this.closest('.comment-card');
                const userName = commentCard.querySelector('h4').textContent;
                const commentText = commentCard.querySelector('.comment-content').textContent.substring(0, 50) + '...';
                
                if (confirm(`آیا از حذف نظر "${userName}" با متن "${commentText}" مطمئن هستید؟`)) {
                    commentCard.style.opacity = '0';
                    setTimeout(() => {
                        commentCard.remove();
                    }, 300);
                    alert('نظر با موفقیت حذف شد!');
                }
            });
        });

        // اضافه کردن افکت شیشه‌ای پویا
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.stat-card, .comment-card, .comments-filters, .comments-section, .sidebar, .header');
            
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
