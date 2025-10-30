@extends('adminBase.baseFormat')

@section('style')

    <link href="{{ asset('css/addImage.css') }}" rel="stylesheet">

@endsection

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            {{ $errors->first() }}
        </div>
    @endif

    <main class="main-content">
        <div class="page-title">
            <h2>{{ isset($currentImage) ? 'ویرایش عکس' : 'آپلود عکس جدید' }}</h2>
            <a href="{{ route('MedaiControler.ImageGallery') }}" class="btn btn-secondary">
                <i class="fas fa-images"></i>
                مشاهده گالری
            </a>
        </div>

        <div class="upload-container">
            <form action="{{ isset($currentImage) ? route('MedaiControler.UpdateImageStore', ['image' => $currentImage->id]) : route('MedaiControler.ImageStore') }}" method="post" enctype="multipart/form-data">
                @csrf

                <!-- ناحیه آپلود -->
                <div class="upload-area" id="uploadArea">
                    <div class="upload-icon"><i class="fas fa-cloud-upload-alt"></i></div>
                    <div class="upload-text">
                        <h3>عکس خود را اینجا رها کنید</h3>
                        <p>یا برای انتخاب فایل کلیک کنید</p>
                        <a class="browse-btn">انتخاب فایل</a>
                    </div>
                    <input name="image" type="file" id="fileInput" class="file-input" accept="image/*">
                </div>

                <!-- پیش‌نمایش عکس -->
                <div class="preview-container" id="previewContainer" style="display: {{ isset($currentImage) ? 'block' : 'none' }}">
                    <h3 class="preview-title"><i class="fas fa-eye"></i> پیش‌نمایش عکس</h3>
                    <img id="imagePreview" class="image-preview" 
                        src="{{ isset($currentImage) ? asset('storage/' . $currentImage->url) : '#' }}" 
                        alt="{{ $currentImage->alt ?? 'پیش‌نمایش عکس' }}">
                    <div class="image-info">
                        <div class="info-row">
                            <span class="info-label">نام فایل:</span>
                            <span id="fileName">{{ $currentImage->name ?? '' }}</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">اندازه:</span>
                            <span id="fileSize">
                                {{ isset($currentImage->url) && file_exists(public_path('storage/' . $currentImage->url)) 
                                    ? number_format(filesize(public_path('storage/' . $currentImage->url)) / 1024, 2) . ' KB' 
                                    : '-' }}
                            </span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">ابعاد:</span>
                            <span id="fileDimensions">
                                {{ isset($currentImage->url) && file_exists(public_path('storage/' . $currentImage->url)) 
                                    ? implode(' × ', getimagesize(public_path('storage/' . $currentImage->url))) . ' px' 
                                    : '-' }}
                            </span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">نوع فایل:</span>
                            <span id="fileType">{{ isset($currentImage->url) ? pathinfo($currentImage->url, PATHINFO_EXTENSION) : '-' }}</span>
                        </div>
                    </div>
                </div>

                <!-- فرم اطلاعات عکس -->
                <div class="image-form">
                    <div class="form-section">
                        <h3 class="section-title"><i class="fas fa-info-circle"></i> اطلاعات عکس</h3>
                        
                        <div class="form-group">
                            <label for="imageName">نام عکس <span class="required">*</span></label>
                            <input name="name" type="text" id="imageName" class="form-control" value="{{ $currentImage->name ?? '' }}" placeholder="نام توصیفی برای عکس وارد کنید" required>
                            <div class="form-hint">این نام در گالری نمایش داده می‌شود</div>
                        </div>

                        <div class="form-group">
                            <label for="imageAlt">متن جایگزین (Alt) <span class="required">*</span></label>
                            <input name="alt" type="text" id="imageAlt" class="form-control" value="{{ $currentImage->alt ?? '' }}" placeholder="توضیح مختصر برای عکس" required>
                            <div class="form-hint">این متن برای سئو و دسترسی‌پذیری مهم است</div>
                        </div>

                        <div class="form-group">
                            <label for="imageDescription">توضیحات</label>
                            <textarea name="description" id="imageDescription" class="form-control" placeholder="توضیحات کامل درباره عکس...">{{ $currentImage->description ?? '' }}</textarea>
                            <div class="form-hint">این توضیحات در صفحه جزئیات عکس نمایش داده می‌شود</div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" id="resetBtn"><i class="fas fa-redo"></i> بازنشانی</button>
                        <button type="submit" class="btn btn-primary" id="uploadBtn"><i class="fas fa-upload"></i> ذخیره عکس</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- گالری عکس‌های اخیر -->
        <div class="gallery-section">
            <h3 class="section-title"><i class="fas fa-images"></i> عکس‌های اخیر</h3>
            <div class="gallery-grid">
                @foreach($images as $image)
                    <div class="gallery-item">
                        <img src="{{ asset('storage/' . $image->url) }}" alt="{{ $image->alt }}" class="gallery-image">
                        <div class="gallery-info">
                            <div class="gallery-name">{{ $image->name }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>

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

        const uploadArea = document.getElementById('uploadArea');
        const fileInput = document.getElementById('fileInput');
        const previewContainer = document.getElementById('previewContainer');
        const imagePreview = document.getElementById('imagePreview');
        const fileName = document.getElementById('fileName');
        const fileSize = document.getElementById('fileSize');
        const fileDimensions = document.getElementById('fileDimensions');
        const fileType = document.getElementById('fileType');
        const resetBtn = document.getElementById('resetBtn');

        // Drag & Drop
        uploadArea.addEventListener('dragover', e => { e.preventDefault(); uploadArea.classList.add('dragover'); });
        uploadArea.addEventListener('dragleave', () => uploadArea.classList.remove('dragover'));
        uploadArea.addEventListener('drop', e => {
            e.preventDefault(); uploadArea.classList.remove('dragover');
            if (e.dataTransfer.files.length > 0) handleFileSelect(e.dataTransfer.files[0]);
        });

        // File select
        fileInput.addEventListener('change', e => { if (e.target.files.length > 0) handleFileSelect(e.target.files[0]); });

        // Handle selected file
        function handleFileSelect(file){
            if(!file.type.match('image.*')) return alert('لطفاً فقط فایل تصویری انتخاب کنید!');

            const reader = new FileReader();
            reader.onload = e => {
                imagePreview.src = e.target.result;
                fileName.textContent = file.name;
                fileSize.textContent = formatFileSize(file.size);
                fileType.textContent = file.type;

                const img = new Image();
                img.onload = () => fileDimensions.textContent = `${img.width} × ${img.height} px`;
                img.src = e.target.result;

                document.getElementById('imageName').value = file.name.replace(/\.[^/.]+$/, "");
                document.getElementById('imageAlt').value = file.name.replace(/\.[^/.]+$/, "");

                previewContainer.style.display = 'block';
            };
            reader.readAsDataURL(file);
        }

        function formatFileSize(bytes){
            if(bytes===0) return '0 Bytes';
            const k = 1024, sizes=['Bytes','KB','MB','GB'], i=Math.floor(Math.log(bytes)/Math.log(k));
            return parseFloat((bytes/Math.pow(k,i)).toFixed(2))+' '+sizes[i];
        }

        // Reset form
        resetBtn.addEventListener('click', () => {
            fileInput.value = '';
            previewContainer.style.display = '{{ isset($currentImage) ? 'block' : 'none' }}';
            @if(isset($currentImage))
                imagePreview.src = "{{ asset('storage/' . $currentImage->url) }}";
                fileName.textContent = "{{ $currentImage->name }}";
                fileSize.textContent = "{{ number_format(filesize(public_path('storage/' . $currentImage->url)) / 1024, 2) }} KB";
                fileDimensions.textContent = "{{ implode(' × ', getimagesize(public_path('storage/' . $currentImage->url))) }} px";
                fileType.textContent = "{{ pathinfo($currentImage->url, PATHINFO_EXTENSION) }}";
            @else
                imagePreview.src = '#';
                fileName.textContent = '';
                fileSize.textContent = '';
                fileDimensions.textContent = '-';
                fileType.textContent = '-';
            @endif
        });
    </script>

@endsection
