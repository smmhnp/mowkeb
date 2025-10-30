@extends('adminBase.baseFormat')

@section('style')

        <link href="{{ asset('css/addVideo.css') }}" rel="stylesheet">

@endsection

@section('content')

        <main class="main-content">
            <div class="page-title">
                <h2>آپلود ویدیو جدید</h2>
                <button class="btn btn-secondary">
                    <i class="fas fa-video"></i>
                    مشاهده گالری ویدیو
                </button>
            </div>

            <div class="upload-container">
                <!-- ناحیه آپلود -->
                <div class="upload-area" id="uploadArea">
                    <div class="upload-icon">
                        <i class="fas fa-video"></i>
                    </div>
                    <div class="upload-text">
                        <h3>ویدیوی خود را اینجا رها کنید</h3>
                        <p>یا برای انتخاب فایل کلیک کنید</p>
                        <button class="browse-btn">انتخاب فایل ویدیو</button>
                    </div>
                    <input type="file" id="fileInput" class="file-input" accept="video/*">
                </div>

                <!-- پیش‌نمایش ویدیو -->
                <div class="preview-container" id="previewContainer">
                    <h3 class="preview-title">
                        <i class="fas fa-eye"></i>
                        پیش‌نمایش ویدیو
                    </h3>
                    <video id="videoPreview" class="video-preview" controls>
                        مرورگر شما از تگ ویدیو پشتیبانی نمی‌کند.
                    </video>
                    <div class="video-info" id="videoInfo">
                        <div class="info-row">
                            <span class="info-label">نام فایل:</span>
                            <span id="fileName">-</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">اندازه:</span>
                            <span id="fileSize">-</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">مدت زمان:</span>
                            <span id="fileDuration">-</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">نوع فایل:</span>
                            <span id="fileType">-</span>
                        </div>
                    </div>
                </div>

                <!-- فرم اطلاعات ویدیو -->
                <div class="video-form">
                    <div class="form-section">
                        <h3 class="section-title">
                            <i class="fas fa-info-circle"></i>
                            اطلاعات ویدیو
                        </h3>
                        
                        <div class="form-group">
                            <label for="videoName">نام ویدیو <span class="required">*</span></label>
                            <input type="text" id="videoName" class="form-control" placeholder="نام توصیفی برای ویدیو وارد کنید" required>
                            <div class="form-hint">این نام در گالری نمایش داده می‌شود</div>
                        </div>

                        <div class="form-group">
                            <label for="videoId">شناسه ویدیو (ID) <span class="required">*</span></label>
                            <input type="text" id="videoId" class="form-control" placeholder="شناسه یکتا برای ویدیو" required>
                            <div class="form-hint">شناسه باید به انگلیسی و بدون فاصله باشد</div>
                        </div>

                        <div class="form-group">
                            <label for="videoUrl">لینک ویدیو <span class="required">*</span></label>
                            <input type="url" id="videoUrl" class="form-control" placeholder="https://example.com/video-id" required>
                            <div class="form-hint">لینک کامل ویدیو از پلتفرم اشتراک ویدیو</div>
                        </div>

                        <div class="form-group">
                            <label>پلتفرم ویدیو</label>
                            <div class="platform-options">
                                <div class="platform-option selected" data-platform="youtube">
                                    <div class="platform-icon youtube-icon">
                                        <i class="fab fa-youtube"></i>
                                    </div>
                                    <span>YouTube</span>
                                </div>
                                <div class="platform-option" data-platform="vimeo">
                                    <div class="platform-icon vimeo-icon">
                                        <i class="fab fa-vimeo"></i>
                                    </div>
                                    <span>Vimeo</span>
                                </div>
                                <div class="platform-option" data-platform="aparat">
                                    <div class="platform-icon aparat-icon">
                                        <i class="fas fa-video"></i>
                                    </div>
                                    <span>Aparat</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" id="resetBtn">
                            <i class="fas fa-redo"></i>
                            بازنشانی
                        </button>
                        <button type="submit" class="btn btn-primary" id="uploadBtn">
                            <i class="fas fa-upload"></i>
                            آپلود ویدیو
                        </button>
                    </div>
                </div>
            </div>

            <!-- گالری ویدیوها -->
            <div class="gallery-section">
                <h3 class="section-title">
                    <i class="fas fa-video"></i>
                    ویدیوهای اخیر
                </h3>
                <div class="gallery-grid">
                    <div class="gallery-item">
                        <div class="video-thumbnail">
                            <i class="fas fa-play play-icon"></i>
                        </div>
                        <div class="gallery-info">
                            <div class="gallery-name">آموزش طراحی وب سایت</div>
                            <div class="gallery-id">VID_001</div>
                            <div class="video-meta">
                                <span>۱۵:۳۰</span>
                                <span class="platform-badge">YouTube</span>
                            </div>
                        </div>
                    </div>
                    <div class="gallery-item">
                        <div class="video-thumbnail">
                            <i class="fas fa-play play-icon"></i>
                        </div>
                        <div class="gallery-info">
                            <div class="gallery-name">گزارش خبری ویژه</div>
                            <div class="gallery-id">VID_002</div>
                            <div class="video-meta">
                                <span>۰۸:۴۵</span>
                                <span class="platform-badge">Aparat</span>
                            </div>
                        </div>
                    </div>
                    <div class="gallery-item">
                        <div class="video-thumbnail">
                            <i class="fas fa-play play-icon"></i>
                        </div>
                        <div class="gallery-info">
                            <div class="gallery-name">مصاحبه با کارشناس اقتصادی</div>
                            <div class="gallery-id">VID_003</div>
                            <div class="video-meta">
                                <span>۲۲:۱۵</span>
                                <span class="platform-badge">Vimeo</span>
                            </div>
                        </div>
                    </div>
                    <div class="gallery-item">
                        <div class="video-thumbnail">
                            <i class="fas fa-play play-icon"></i>
                        </div>
                        <div class="gallery-info">
                            <div class="gallery-name">مراسم افتتاحیه پروژه جدید</div>
                            <div class="gallery-id">VID_004</div>
                            <div class="video-meta">
                                <span>۱۲:۲۰</span>
                                <span class="platform-badge">YouTube</span>
                            </div>
                        </div>
                    </div>
                </div>
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

        // مدیریت آپلود ویدیو
        const uploadArea = document.getElementById('uploadArea');
        const fileInput = document.getElementById('fileInput');
        const previewContainer = document.getElementById('previewContainer');
        const videoPreview = document.getElementById('videoPreview');
        const fileName = document.getElementById('fileName');
        const fileSize = document.getElementById('fileSize');
        const fileDuration = document.getElementById('fileDuration');
        const fileType = document.getElementById('fileType');
        const resetBtn = document.getElementById('resetBtn');
        const uploadBtn = document.getElementById('uploadBtn');
        const platformOptions = document.querySelectorAll('.platform-option');

        // انتخاب پلتفرم
        platformOptions.forEach(option => {
            option.addEventListener('click', function() {
                platformOptions.forEach(opt => opt.classList.remove('selected'));
                this.classList.add('selected');
            });
        });

        // رویدادهای درگ و دراپ
        uploadArea.addEventListener('dragover', function(e) {
            e.preventDefault();
            uploadArea.classList.add('dragover');
        });

        uploadArea.addEventListener('dragleave', function() {
            uploadArea.classList.remove('dragover');
        });

        uploadArea.addEventListener('drop', function(e) {
            e.preventDefault();
            uploadArea.classList.remove('dragover');
            const files = e.dataTransfer.files;
            if (files.length > 0) {
                handleFileSelect(files[0]);
            }
        });

        // انتخاب فایل از طریق کلیک
        fileInput.addEventListener('change', function(e) {
            if (e.target.files.length > 0) {
                handleFileSelect(e.target.files[0]);
            }
        });

        // مدیریت فایل انتخاب شده
        function handleFileSelect(file) {
            if (!file.type.match('video.*')) {
                alert('لطفاً فقط فایل ویدیویی انتخاب کنید!');
                return;
            }

            const reader = new FileReader();
            
            reader.onload = function(e) {
                videoPreview.src = e.target.result;
                
                // نمایش اطلاعات فایل
                fileName.textContent = file.name;
                fileSize.textContent = formatFileSize(file.size);
                fileType.textContent = file.type;
                
                // محاسبه مدت زمان ویدیو
                videoPreview.addEventListener('loadedmetadata', function() {
                    const duration = videoPreview.duration;
                    fileDuration.textContent = formatDuration(duration);
                });
                
                // پر کردن خودکار فیلدها
                document.getElementById('videoName').value = file.name.replace(/\.[^/.]+$/, "");
                document.getElementById('videoId').value = generateVideoId(file.name.replace(/\.[^/.]+$/, ""));
                
                // نمایش پیش‌نمایش
                previewContainer.style.display = 'block';
            };
            
            reader.readAsDataURL(file);
        }

        // فرمت کردن سایز فایل
        function formatFileSize(bytes) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB', 'GB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
        }

        // فرمت کردن مدت زمان
        function formatDuration(seconds) {
            const minutes = Math.floor(seconds / 60);
            const remainingSeconds = Math.floor(seconds % 60);
            return `${minutes}:${remainingSeconds.toString().padStart(2, '0')}`;
        }

        // تولید شناسه ویدیو
        function generateVideoId(text) {
            return 'VID_' + text
                .toUpperCase()
                .replace(/[^A-Z0-9]/g, '')
                .substring(0, 8) + 
                '_' + 
                Math.random().toString(36).substring(2, 8).toUpperCase();
        }

        // بازنشانی فرم
        resetBtn.addEventListener('click', function() {
            fileInput.value = '';
            previewContainer.style.display = 'none';
            videoPreview.src = '';
            document.getElementById('videoName').value = '';
            document.getElementById('videoId').value = '';
            document.getElementById('videoUrl').value = '';
            
            // بازنشانی انتخاب پلتفرم
            platformOptions.forEach(opt => opt.classList.remove('selected'));
            document.querySelector('.platform-option[data-platform="youtube"]').classList.add('selected');
        });

        // آپلود ویدیو
        uploadBtn.addEventListener('click', function() {
            const videoName = document.getElementById('videoName').value;
            const videoId = document.getElementById('videoId').value;
            const videoUrl = document.getElementById('videoUrl').value;
            const selectedPlatform = document.querySelector('.platform-option.selected').dataset.platform;
            
            if (!fileInput.files[0]) {
                alert('لطفاً یک فایل ویدیویی انتخاب کنید!');
                return;
            }
            
            if (!videoName || !videoId || !videoUrl) {
                alert('لطفاً فیلدهای ضروری را پر کنید!');
                return;
            }
            
            // در اینجا می‌توانید کد آپلود به سرور را اضافه کنید
            console.log('آپلود ویدیو:', {
                name: videoName,
                id: videoId,
                url: videoUrl,
                platform: selectedPlatform,
                file: fileInput.files[0]
            });
            
            alert(`ویدیو "${videoName}" با موفقیت آپلود شد!`);
            resetBtn.click();
        });

        // اضافه کردن افکت شیشه‌ای پویا
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.upload-container, .video-form, .gallery-item, .sidebar, .header');
            
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
