@extends('adminBase.baseFormat')

@section('style')

        <link href="{{ asset('css/addVideo.css') }}" rel="stylesheet">

@endsection

@section('content')

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                {{ $errors->first() }}
            </div>
        @endif

        <main class="main-content">
            <div class="page-title">
                <h2>آپلود ویدیو جدید</h2>
                <a href="{{ route('MedaiControler.VideoGallery') }}" class="btn btn-secondary">
                    <i class="fas fa-video"></i>
                    مشاهده گالری ویدیو
                </a>
            </div>

            <div class="upload-container">
                <form action="{{ isset($currentVideo) ? route('MedaiControler.UpdateVideoStore', ['video' => $currentVideo->id]) : route('MedaiControler.VideoStore') }}" method="post">
                @csrf
                <!-- فرم اطلاعات ویدیو -->
                <div class="video-form">
                    <div class="form-section">
                        <h3 class="section-title">
                            <i class="fas fa-info-circle"></i>
                            اطلاعات ویدیو
                        </h3>
                        
                        <div class="form-group">
                            <label for="videoName">لینک ویدیو<span class="required">*</span></label>
                            <input name="link" type="text" id="videoName" class="form-control" placeholder="لینک ویدیو وارد کنید" value="{{ $currentVideo->link ?? '' }}" required>
                            <div class="form-hint">شبیه به https://www.aparat.com/embed/flbw9u2?data[rnddiv]=81133435850&data[responsive]=yes</div>
                        </div>

                        <div class="form-group">
                            <label for="videoName">ششناسه ویدیو <span class="required">*</span></label>
                            <input name="aparatID" type="text" id="videoName" class="form-control" placeholder="شناسه ویدیو وارد کنید" value="{{ $currentVideo->aparatID ?? '' }}" required>
                            <div class="form-hint">شبیه به 81133435850</div>
                        </div>

                        <div class="form-group">
                            <label for="videoId">نام ویدیو<span class="required">*</span></label>
                            <input name="name" type="text" id="videoId" class="form-control" placeholder="نام ویدیو وارد کنید" value="{{ $currentVideo->name ?? '' }}" required>
                            <div class="form-hint">نام ویدیو را وارد کنید</div>
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
                    @foreach($videos as $video)
                        <div class="gallery-item">

                            <div class="video-thumbnail ">
                                <div id="{{ $video->aparatID }}">
                                    <script type="text/JavaScript" src="{{ $video->link }}"></script>
                                </div>
                            </div>

                            <div class="gallery-info">
                                <div class="gallery-name">{{ $video->name }}</div>
                                <div class="gallery-id">VID_{{ $video->id }}</div>
                                <div class="video-meta">
                                    <span>{{ jDate($video->created_at)->ago() }}</span>
                                    <span class="platform-badge">Aparat</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
