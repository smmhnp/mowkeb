@extends('adminBase.baseFormat')

@section('style')

        <link href="{{ asset('css/addImage.css') }}" rel="stylesheet">

@endsection

@section('content')

        <main class="main-content">
            <div class="page-title">
                <h2>آپلود عکس جدید</h2>
                <button class="btn btn-secondary">
                    <i class="fas fa-images"></i>
                    مشاهده گالری
                </button>
            </div>

            <div class="upload-container">
                <!-- ناحیه آپلود -->
                <div class="upload-area" id="uploadArea">
                    <div class="upload-icon">
                        <i class="fas fa-cloud-upload-alt"></i>
                    </div>
                    <div class="upload-text">
                        <h3>عکس خود را اینجا رها کنید</h3>
                        <p>یا برای انتخاب فایل کلیک کنید</p>
                        <button class="browse-btn">انتخاب فایل</button>
                    </div>
                    <input type="file" id="fileInput" class="file-input" accept="image/*">
                </div>

                <!-- پیش‌نمایش عکس -->
                <div class="preview-container" id="previewContainer">
                    <h3 class="preview-title">
                        <i class="fas fa-eye"></i>
                        پیش‌نمایش عکس
                    </h3>
                    <img id="imagePreview" class="image-preview" src="#" alt="پیش‌نمایش عکس">
                    <div class="image-info" id="imageInfo">
                        <div class="info-row">
                            <span class="info-label">نام فایل:</span>
                            <span id="fileName">-</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">اندازه:</span>
                            <span id="fileSize">-</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">ابعاد:</span>
                            <span id="fileDimensions">-</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">نوع فایل:</span>
                            <span id="fileType">-</span>
                        </div>
                    </div>
                </div>

                <!-- فرم اطلاعات عکس -->
                <div class="image-form">
                    <div class="form-section">
                        <h3 class="section-title">
                            <i class="fas fa-info-circle"></i>
                            اطلاعات عکس
                        </h3>
                        
                        <div class="form-group">
                            <label for="imageName">نام عکس <span class="required">*</span></label>
                            <input type="text" id="imageName" class="form-control" placeholder="نام توصیفی برای عکس وارد کنید" required>
                            <div class="form-hint">این نام در گالری نمایش داده می‌شود</div>
                        </div>

                        <div class="form-group">
                            <label for="imageUrl">آدرس عکس <span class="required">*</span></label>
                            <input type="text" id="imageUrl" class="form-control" placeholder="آدرس یکتا برای عکس" required>
                            <div class="form-hint">آدرس باید به انگلیسی و بدون فاصله باشد</div>
                        </div>

                        <div class="form-group">
                            <label for="imageAlt">متن جایگزین (Alt) <span class="required">*</span></label>
                            <input type="text" id="imageAlt" class="form-control" placeholder="توضیح مختصر برای عکس" required>
                            <div class="form-hint">این متن برای سئو و دسترسی‌پذیری مهم است</div>
                        </div>

                        <div class="form-group">
                            <label for="imageDescription">توضیحات</label>
                            <textarea id="imageDescription" class="form-control" placeholder="توضیحات کامل درباره عکس..."></textarea>
                            <div class="form-hint">این توضیحات در صفحه جزئیات عکس نمایش داده می‌شود</div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" id="resetBtn">
                            <i class="fas fa-redo"></i>
                            بازنشانی
                        </button>
                        <button type="submit" class="btn btn-primary" id="uploadBtn">
                            <i class="fas fa-upload"></i>
                            آپلود عکس
                        </button>
                    </div>
                </div>
            </div>

            <!-- گالری عکس‌های آپلود شده -->
            <div class="gallery-section">
                <h3 class="section-title">
                    <i class="fas fa-images"></i>
                    عکس‌های اخیر
                </h3>
                <div class="gallery-grid">
                    <div class="gallery-item">
                        <img src="https://via.placeholder.com/300x200/4361ee/ffffff?text=Landscape" class="gallery-image" alt="منظره طبیعی">
                        <div class="gallery-info">
                            <div class="gallery-name">منظره کوهستان</div>
                            <div class="gallery-alt">منظره زیبای کوهستان در بهار</div>
                        </div>
                    </div>
                    <div class="gallery-item">
                        <img src="https://via.placeholder.com/300x200/f72585/ffffff?text=City" class="gallery-image" alt="شهر">
                        <div class="gallery-info">
                            <div class="gallery-name">نمای شهر</div>
                            <div class="gallery-alt">نمای شبانه شهر با چراغ‌های روشن</div>
                        </div>
                    </div>
                    <div class="gallery-item">
                        <img src="https://via.placeholder.com/300x200/4cc9f0/ffffff?text=Beach" class="gallery-image" alt="ساحل">
                        <div class="gallery-info">
                            <div class="gallery-name">ساحل دریا</div>
                            <div class="gallery-alt">ساحل شنی با امواج آرام</div>
                        </div>
                    </div>
                    <div class="gallery-item">
                        <img src="https://via.placeholder.com/300x200/f8961e/ffffff?text=Forest" class="gallery-image" alt="جنگل">
                        <div class="gallery-info">
                            <div class="gallery-name">جنگل سبز</div>
                            <div class="gallery-alt">جنگل انبوه با درختان بلند</div>
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

        // مدیریت آپلود عکس
        const uploadArea = document.getElementById('uploadArea');
        const fileInput = document.getElementById('fileInput');
        const previewContainer = document.getElementById('previewContainer');
        const imagePreview = document.getElementById('imagePreview');
        const fileName = document.getElementById('fileName');
        const fileSize = document.getElementById('fileSize');
        const fileDimensions = document.getElementById('fileDimensions');
        const fileType = document.getElementById('fileType');
        const resetBtn = document.getElementById('resetBtn');
        const uploadBtn = document.getElementById('uploadBtn');

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
            if (!file.type.match('image.*')) {
                alert('لطفاً فقط فایل تصویری انتخاب کنید!');
                return;
            }

            const reader = new FileReader();
            
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                
                // نمایش اطلاعات فایل
                fileName.textContent = file.name;
                fileSize.textContent = formatFileSize(file.size);
                fileType.textContent = file.type;
                
                // محاسبه ابعاد تصویر
                const img = new Image();
                img.onload = function() {
                    fileDimensions.textContent = `${img.width} × ${img.height} پیکسل`;
                };
                img.src = e.target.result;
                
                // پر کردن خودکار فیلدها
                document.getElementById('imageName').value = file.name.replace(/\.[^/.]+$/, "");
                document.getElementById('imageUrl').value = generateSlug(file.name.replace(/\.[^/.]+$/, ""));
                document.getElementById('imageAlt').value = file.name.replace(/\.[^/.]+$/, "");
                
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

        // تولید آدرس از نام فایل
        function generateSlug(text) {
            return text
                .toLowerCase()
                .replace(/[^a-z0-9 -]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-');
        }

        // بازنشانی فرم
        resetBtn.addEventListener('click', function() {
            fileInput.value = '';
            previewContainer.style.display = 'none';
            document.getElementById('imageName').value = '';
            document.getElementById('imageUrl').value = '';
            document.getElementById('imageAlt').value = '';
            document.getElementById('imageDescription').value = '';
        });

        // آپلود عکس
        uploadBtn.addEventListener('click', function() {
            const imageName = document.getElementById('imageName').value;
            const imageUrl = document.getElementById('imageUrl').value;
            const imageAlt = document.getElementById('imageAlt').value;
            const imageDescription = document.getElementById('imageDescription').value;
            
            if (!fileInput.files[0]) {
                alert('لطفاً یک عکس انتخاب کنید!');
                return;
            }
            
            if (!imageName || !imageUrl || !imageAlt) {
                alert('لطفاً فیلدهای ضروری را پر کنید!');
                return;
            }
            
            // در اینجا می‌توانید کد آپلود به سرور را اضافه کنید
            console.log('آپلود عکس:', {
                name: imageName,
                url: imageUrl,
                alt: imageAlt,
                description: imageDescription,
                file: fileInput.files[0]
            });
            
            alert(`عکس "${imageName}" با موفقیت آپلود شد!`);
            resetBtn.click();
        });

        // اضافه کردن افکت شیشه‌ای پویا
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.upload-container, .image-form, .gallery-item, .sidebar, .header');
            
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