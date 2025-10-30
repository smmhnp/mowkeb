@extends('adminBase.baseFormat')

@php
    if(isset($images) and isset($hero)){
        foreach($images as $image){
            if($image->url === $hero->photo){
                $photo_id = $image->id;
                $photo_name = $image->name;
            }
        }
    }
@endphp

@section('style')

    <link href="{{ asset('css/homeDesign.css') }}" rel="stylesheet">

@endsection

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            {{ $errors->first() }}
        </div>
    @endif

    <main class="main-content">
        <div class="page-title">
            <h2>مدیریت محتوای صفحه اصلی</h2>
        </div>

        <!-- content management -->
        <section class="admin-section">
            <div class="admin-tabs">
                <button class="tab-btn active" data-tab="hero">بخش هیرو</button>
                <button class="tab-btn" data-tab="breaking">خبر فوری</button>
                <button class="tab-btn" data-tab="featured">اخبار ویژه</button>
                <button class="tab-btn" data-tab="categories">دسته‌بندی‌ها</button>
            </div>

            <!-- hero tab management -->
            <div class="tab-content active" id="hero-tab">
                <div class="form-grid">
                    <form action="{{ route('HomeController.homeHeroManage') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="hero-title">عنوان اصلی</label>
                            <input name="title" type="text" id="hero-title" class="form-control" placeholder="عنوان بخش هیرو را وارد کنید" value="{{ $hero->title ?? ''}}">
                        </div>
                        <div class="form-group">
                            <label for="hero-subtitle">زیرعنوان</label>
                            <input name="subTitle" type="text" id="hero-subtitle" class="form-control" placeholder="زیرعنوان بخش هیرو را وارد کنید" value="{{ $hero->sub_title ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label for="hero-button-text">متن دکمه</label>
                            <input name="btnText" type="text" id="hero-button-text" class="form-control" placeholder="متن دکمه را وارد کنید" value="{{ $hero->btn_text ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label>تصویر هیرو</label>
                            <div class="gallery-section">
                                <div class="gallery-header">
                                    <div class="gallery-title">گالری تصاویر</div>
                                    <div class="gallery-actions">
                                        <a href="{{ route('MedaiControler.ImageGallery') }}" class="btn btn-outline btn-sm" onclick="openImageGallery()">
                                            <i class="fas fa-plus"></i>
                                            افزودن تصویر جدید
                                        </a>
                                    </div>
                                </div>
                                
                                <div class="gallery-grid" id="imageGallery">
                                    <!-- photo added by js -->
                                </div>
                                
                                @if(isset($hero) and $hero->photo)
                                    <div class="selected-image-preview active" id="selectedPreview">
                                        <strong>تصویر انتخاب شده:</strong>
                                        <div id="previewContainer">

                                            <div style="display: flex; align-items: center; gap: 15px; margin-top: 10px;">
                                                <img id="select" src="{{ $hero->photo ?? '' }}" alt="" class="preview-image">
                                                <input name="photo" type="hidden" value="{{ $hero->photo }}">
                                                <div>
                                                    <div><strong>{{ $photo_name ?? '' }}</strong></div>
                                                    <div style="font-size: 0.8rem; color: #666;">شناسه: {{ $photo_id ?? '' }}</div>
                                                    <button class="btn btn-outline btn-sm" onclick="deselectImage()" style="margin-top: 8px;">
                                                        <i class="fas fa-times"></i>
                                                        حذف انتخاب
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                @else
                                    <div class="selected-image-preview" id="selectedPreview">
                                        <strong>تصویر انتخاب شده:</strong>
                                        <div id="previewContainer"></div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="news-preview">
                        <h3 class="preview-title">
                            <i class="fas fa-eye"></i>
                            پیش‌نمایش بخش هیرو
                        </h3>
                        <div class="preview-content">
                            <h2 id="preview-hero-title">{{ $hero->title ?? '' }}</h2>
                            <p id="preview-hero-subtitle">{{ $hero->sub_title ?? '' }}</p>
                            <div class="btn btn-primary" id="preview-hero-button">
                                <i class="fas fa-newspaper"></i>
                                {{ $hero->btn_text ?? '' }}
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button class="btn btn-success">
                            <i class="fas fa-save"></i>
                            ذخیره تغییرات
                        </button>
                        <a href="{{ route('dashboard') }}" class="btn btn-outline">
                            <i class="fas fa-times"></i>
                            انصراف
                        </a>
                    </div>
                </form>
            </div>

            <!-- force article management -->
            <div class="tab-content" id="breaking-tab">
                <form action="{{ route('HomeController.homeSpecialStore') }}" method="post">
                    @csrf
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="breaking-text">متن خبر فوری</label>
                            <input name="title" type="text" id="breaking-text" class="form-control" placeholder="متن خبر فوری را وارد کنید" value="{{ $special->title ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label for="breaking-status">وضعیت نمایش</label>
                            <select name="status" id="breaking-status" class="form-control">
                                @if($special->status ?? '' === 'active')
                                    <option value="active">فعال</option>
                                    <option value="inactive">غیرفعال</option>
                                @else
                                    <option value="inactive">غیرفعال</option>
                                    <option value="active">فعال</option>
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="news-preview">
                        <h3 class="preview-title">
                            <i class="fas fa-eye"></i>
                            پیش‌نمایش خبر فوری
                        </h3>
                        <div class="preview-content">
                            <div style="background: linear-gradient(135deg, var(--danger), var(--warning)); color: white; padding: 15px; border-radius: 8px; display: flex; align-items: center; gap: 15px;">
                                <div style="background: rgba(255, 255, 255, 0.2); padding: 5px 12px; border-radius: 6px; font-weight: 700;">خبر فوری</div>
                                <div style="flex: 1; font-weight: 600;" id="preview-breaking-text">{{ $special->title ?? '' }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button class="btn btn-success">
                            <i class="fas fa-save"></i>
                            ذخیره تغییرات
                        </button>
                        <a href="{{ route('dashboard') }}" class="btn btn-outline">
                            <i class="fas fa-times"></i>
                            انصراف
                        </a>
                    </div>
                </form>
            </div>

            <!-- special article management -->
            <div class="tab-content" id="featured-tab">
                <div class="form-group">
                    <form action="{{ route('HomeController.homeArticleStore') }}" method="post">
                        @csrf
                        <label>انتخاب اخبار ویژه</label>
                        
                        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 15px; margin-top: 10px;">
                            
                            @foreach($articles as $article)
                                @if($article->tag === "special")
                                    <div style="background: rgba(255, 255, 255, 0.3); padding: 15px; border-radius: 8px;">
                                        <div style="display: flex; gap: 10px; align-items: flex-start;">
                                            <input type="checkbox" name="article_ids[]" value="{{ $article->id ?? '' }}">
                                            <div>
                                                <label for="news1" style="font-weight: 600; cursor: pointer;">{{$article->name ?? ''}}</label>
                                                <div style="font-size: 0.8rem; color: #666; margin-top: 5px;">بازدید {{$article->view ?? ''}}</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                        </div>

                        <div class="form-actions">
                            <button class="btn btn-success">
                                <i class="fas fa-save"></i>
                                ذخیره تغییرات
                            </button>
                            <a href="{{ route('dashboard') }}" class="btn btn-outline">
                                <i class="fas fa-times"></i>
                                انصراف
                            </a>
                        </div>

                    </form>
                </div>
            </div>

            <!-- navbar management -->
            <div class="tab-content" id="categories-tab">
                <form action="{{ route('HomeController.homeCategoryStore') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="cat1-name">دسته‌بندی 1 - نام</label>
                        <select name="first" id="cat1-name" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="cat2-name">دسته‌بندی ۲ - نام</label>
                        <select name="seconde" id="cat2-name" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>                    
                    </div>

                    <div class="form-group">
                        <label for="cat3-name">دسته‌بندی ۳ - نام</label>
                        <select name="third" id="cat3-name" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select> 
                    </div>

                    <div class="form-group">
                        <label for="cat4-name">دسته‌بندی ۴ - نام</label>
                        <select name="fourth" id="cat4-name" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select> 
                    </div>

                    <div class="form-actions">
                        <button class="btn btn-success">
                            <i class="fas fa-save"></i>
                            ذخیره تغییرات
                        </button>
                        <button class="btn btn-outline">
                            <i class="fas fa-times"></i>
                            انصراف
                        </button>
                    </div>
                </fomr>
            </div>
        </section>
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

        // مدیریت تب‌ها
        const tabBtns = document.querySelectorAll('.tab-btn');
        const tabContents = document.querySelectorAll('.tab-content');

        tabBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                // حذف کلاس active از همه تب‌ها
                tabBtns.forEach(b => b.classList.remove('active'));
                tabContents.forEach(c => c.classList.remove('active'));
                
                // اضافه کردن کلاس active به تب انتخاب شده
                btn.classList.add('active');
                const tabId = btn.getAttribute('data-tab');
                document.getElementById(`${tabId}-tab`).classList.add('active');
            });
        });

        // به‌روزرسانی پیش‌نمایش بخش هیرو
        const heroTitle = document.getElementById('hero-title');
        const heroSubtitle = document.getElementById('hero-subtitle');
        const heroButtonText = document.getElementById('hero-button-text');
        
        const previewHeroTitle = document.getElementById('preview-hero-title');
        const previewHeroSubtitle = document.getElementById('preview-hero-subtitle');
        const previewHeroButton = document.getElementById('preview-hero-button');

        heroTitle.addEventListener('input', () => {
            previewHeroTitle.textContent = heroTitle.value;
        });

        heroSubtitle.addEventListener('input', () => {
            previewHeroSubtitle.textContent = heroSubtitle.value;
        });

        heroButtonText.addEventListener('input', () => {
            previewHeroButton.innerHTML = `<i class="fas fa-newspaper"></i> ${heroButtonText.value}`;
        });

        // به‌روزرسانی پیش‌نمایش خبر فوری
        const breakingText = document.getElementById('breaking-text');
        const previewBreakingText = document.getElementById('preview-breaking-text');

        breakingText.addEventListener('input', () => {
            previewBreakingText.textContent = breakingText.value;
        });

        // گالری تصاویر
        const imageGallery = document.getElementById('imageGallery');
        const selectedPreview = document.getElementById('selectedPreview');
        const previewContainer = document.getElementById('previewContainer');
        const select = document.getElementById('select');
        // نمونه تصاویر برای گالری
        const sampleImages = [
            @foreach($images as $iamge)
                { id: '{{$image->id}}', url: '{{$iamge->url}}', name: '{{$image->alt}}' },
            @endforeach
        ];

        let selectedImage = null;

        // بارگذاری تصاویر در گالری
        function loadGalleryImages() {
            imageGallery.innerHTML = '';
            
            sampleImages.forEach(image => {
                const galleryItem = document.createElement('div');

                if(image.url === "{{ $hero->photo ?? '' }}"){
                    galleryItem.className = 'gallery-item selected';
                } else {
                    galleryItem.className = 'gallery-item';
                }

                galleryItem.setAttribute('data-image-id', image.id);
                

                galleryItem.innerHTML = `
                    <img class="" src="${image.url}" alt="${image.name}" loading="lazy">
                    <div class="select-overlay">
                        <i class="fas fa-check"></i>
                    </div>
                `;
                
                galleryItem.addEventListener('click', () => selectImage(image, galleryItem));
                imageGallery.appendChild(galleryItem);
            });
        }

        // انتخاب تصویر
        function selectImage(image, element) {
            // حذف انتخاب از همه تصاویر
            document.querySelectorAll('.gallery-item').forEach(item => {
                item.classList.remove('selected');
            });
            
            // انتخاب تصویر جدید
            element.classList.add('selected');
            selectedImage = image;
            
            // نمایش پیش‌نمایش
            showSelectedPreview(image);
        }

        // نمایش پیش‌نمایش تصویر انتخاب شده
        function showSelectedPreview(image) {
            previewContainer.innerHTML = `
                <div style="display: flex; align-items: center; gap: 15px; margin-top: 10px;">
                    <img id="select" src="${image.url}" alt="${image.name}" class="preview-image">
                    <input name="photo" type="hidden" value="${image.url}" >
                    <div>
                        <div><strong>${image.name}</strong></div>
                        <div style="font-size: 0.8rem; color: #666;">شناسه: ${image.id}</div>
                        <button class="btn btn-outline btn-sm" onclick="deselectImage()" style="margin-top: 8px;">
                            <i class="fas fa-times"></i>
                            حذف انتخاب
                        </button>
                    </div>
                </div>
            `;
            
            selectedPreview.classList.add('active');
        }

        // حذف انتخاب تصویر
        function deselectImage() {
            selectedImage = null;
            document.querySelectorAll('.gallery-item').forEach(item => {
                item.classList.remove('selected');
            });
            selectedPreview.classList.remove('active');
            previewContainer.innerHTML = '';
        }

        // بارگذاری اولیه گالری
        loadGalleryImages();

        // بستن منو با کلیک روی لینک‌ها
        document.querySelectorAll('.menu a').forEach(link => {
            link.addEventListener('click', function() {
                if (window.innerWidth <= 992) {
                    sidebar.classList.remove('active');
                    overlay.classList.remove('active');
                }
            });
        });
    </script>

@endsection