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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <link href="{{ asset('css/homeDesign.css') }}" rel="stylesheet">    

@endsection

@section('content')

    <main class="main-content">
        <div class="page-title">
            <h2>مدیریت محتوای صفحه اصلی</h2>
        </div>

        <!-- مدیریت محتوا -->
        <section class="admin-section">
            <div class="admin-tabs">
                <button class="tab-btn active" data-tab="hero">بخش هیرو</button>
                <button class="tab-btn" data-tab="breaking">خبر فوری</button>
                <button class="tab-btn" data-tab="video">ویدیو و پوسترها</button>
                <button class="tab-btn" data-tab="description">متن توضیحات</button>
                <button class="tab-btn" data-tab="gallery">گالری تصاویر</button>
                <button class="tab-btn" data-tab="category">دسته بندی ها</button>
            </div>

            <!-- مدیریت بخش هیرو -->
            <div class="tab-content active" id="hero-tab">
                <form id="heroForm" action="{{ route('HomeController.homeHeroManage') }}" method="post">
                    @csrf

                    <div class="form-grid">
                        <div class="form-group">
                            <label for="hero-title">عنوان اصلی</label>
                            <input name="title" type="text" id="hero-title" class="form-control" placeholder="عنوان بخش هیرو را وارد کنید" value="{{ $hero->title }}">
                        </div>
                        <div class="form-group">
                            <label for="hero-image">تصویر هیرو</label>
                            <select name="photo" id="hero-image" class="form-control select2-image">
                                <option value=""></option>
                                @foreach($images as $image)
                                    <option value="{{ $image->url }}" data-image="{{ asset('storage/' . $image->url) }}" {{ $hero->photo == $image->url ? 'selected' : '' }}>{{ $image->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="hero-subtitle">زیرعنوان</label>
                        <textarea name="subTitle" type="text" id="hero-subtitle" class="form-control" placeholder="زیرعنوان بخش هیرو را وارد کنید">{{ $hero->sub_title }}"</textarea>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i>
                            ذخیره تغییرات
                        </button>
                        <a href="{{ route('DashboardController.dashboard') }}" class="btn btn-outline">
                            <i class="fas fa-times"></i>
                            انصراف
                        </a>
                    </div>
                </form>
            </div>

            <!-- مدیریت خبر فوری -->
            <div class="tab-content" id="breaking-tab">
                <form id="breakingForm" action="{{ route('HomeController.homeSpecialStore') }}" method="post">
                    @csrf

                    <div class="form-grid">
                        <div class="form-group">
                            <label for="breaking-text">متن خبر فوری</label>
                            <input name="title" type="text" id="breaking-text" class="form-control" placeholder="متن خبر فوری را وارد کنید" value="{{ $special->title }}">
                        </div>
                        <div class="form-group">
                            <label for="breaking-status">وضعیت نمایش</label>
                            <select name="status" id="breaking-status" class="form-control">
                                @if($special->status == 'active')
                                    <option value="active">فعال</option>
                                    <option value="inactive">غیرفعال</option>
                                @else
                                    <option value="inactive">غیرفعال</option>
                                    <option value="active">فعال</option>
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="preview-section">
                        <h3 class="preview-title">
                            <i class="fas fa-eye"></i>
                            پیش‌نمایش خبر فوری
                        </h3>
                        <div class="preview-content">
                            <div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 15px; border-radius: 8px; display: flex; align-items: center; gap: 15px;">
                                <div style="background: rgba(255, 255, 255, 0.2); padding: 5px 12px; border-radius: 6px; font-weight: 700;">خبر فوری</div>
                                <div style="flex: 1; font-weight: 600;" id="preview-breaking-text">متن تستی برای خبر ویژه</div>
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i>
                            ذخیره تغییرات
                        </button>
                        <a href="{{ route('DashboardController.dashboard') }}" class="btn btn-outline">
                            <i class="fas fa-times"></i>
                            انصراف
                        </a>
                    </div>
                </form>
            </div>

            <!-- مدیریت ویدیو و پوسترها -->
            <div class="tab-content" id="video-tab">
                <form id="videoForm" action="{{ route('HomeController.homeMediaStore') }}" method="post">
                    @csrf
                    
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="main-video">ویدیوی اصلی</label>
                            <select name="video" id="main-video" class="form-control select2-video">
                                <option value=""></option>
                                @foreach($videos as $video)
                                    <option value="{{ $video->id }}" data-icon="fas fa-play-circle">{{ $video->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="first-poster">تصویر پوستر اول</label>
                            <select name="first_poster" id="first-poster" class="form-control select2-image">
                                <option value=""></option>
                                @foreach($images as $image)
                                    <option value="{{ $image->url }}" data-image="{{ asset('storage/' . $image->url) }}" {{ $media->first == $image->url ? 'selected' : '' }}>{{ $image->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-grid">
                        <div class="form-group">
                            <label for="second-poster">تصویر پوستر دوم</label>
                            <select name="second_poster" id="second-poster" class="form-control select2-image">
                                <option value=""></option>
                                @foreach($images as $image)
                                    <option value="{{ $image->url }}" data-image="{{ asset('storage/' . $image->url) }}" {{ $media->second == $image->url ? 'selected' : '' }}>{{ $image->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="third-poster">تصویر پوستر سوم</label>
                            <select name="third_poster" id="third-poster" class="form-control select2-image">
                                <option value=""></option>
                                @foreach($images as $image)
                                    <option value="{{ $image->url }}" data-image="{{ asset('storage/' . $image->url) }}" {{ $media->third == $image->url ? 'selected' : '' }}>{{ $image->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i>
                            ذخیره تغییرات
                        </button>
                        <a href="{{ route('DashboardController.dashboard') }}" class="btn btn-outline">
                            <i class="fas fa-times"></i>
                            انصراف
                        </a>
                    </div>
                </form>
            </div>

            <!-- مدیریت متن توضیحات -->
            <div class="tab-content" id="description-tab">
                <form id="descriptionForm" action="{{ route('HomeController.homeContentStore') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="description-title">عنوان بخش توضیحات</label>
                        <input name="title" type="text" id="description-title" class="form-control" placeholder="عنوان بخش توضیحات را وارد کنید" value="{{ $content->title }}">
                    </div>

                    <div class="form-group">
                        <label for="content" class="col-sm-2 control-label">محتوا <span class="required">*</span></label>
                        <div class="col-sm-12">
                            <textarea name="content" class="form-control" rows="10" id="content" placeholder="متن کامل خبر را اینجا بنویسید...">{{ $content->content }}</textarea>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i>
                            ذخیره تغییرات
                        </button>
                        <a href="{{ route('DashboardController.dashboard') }}" class="btn btn-outline">
                            <i class="fas fa-times"></i>
                            انصراف
                        </a>
                    </div>
                </form>
            </div>

            <!-- مدیریت گالری تصاویر -->
            <div class="tab-content" id="gallery-tab">
                <form id="galleryForm" action="{{ route('HomeController.homeGalleryStore') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="sidebar-gallery">تصاویر گالری سایدبار (4 تصویر)</label>
                        <select name="gallery[]" id="sidebar-gallery" class="form-control select2-image" multiple>
                            <option value=""></option>
                            @foreach($images as $image)
                                @foreach($gallery as $select)
                                    <option value="{{ $image->url }}" data-image="{{ asset('storage/' . $image->url) }}" {{ $select->image == $image->url ? 'selected' : '' }}>{{ $image->name }}</option>
                                @endforeach
                            @endforeach
                        </select>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i>
                            ذخیره تغییرات
                        </button>
                        <a href="{{ route('DashboardController.dashboard') }}" class="btn btn-outline">
                            <i class="fas fa-times"></i>
                            انصراف
                        </a>
                    </div>
                </form>
            </div>

            <!-- مدیریت دسته بندی ها -->
            <div class="tab-content" id="category-tab">
                <form id="videoForm" action="{{ route('HomeController.homeCategoryStore') }}" method="post">
                    @csrf
                    
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="first">اولین دسته بندی</label>
                            <select name="first" id="first" class="form-control">
                                <option value=""></option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="seconde">دومین دسته بندی</label>
                            <select name="seconde" id="seconde" class="form-control">
                                <option value=""></option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-grid">
                        <div class="form-group">
                            <label for="third">سومین دسته بندی</label>
                            <select name="third" id="third" class="form-control">
                                <option value=""></option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="fourth">چهارمین دسته بندی</label>
                            <select name="fourth" id="fourth" class="form-control">
                                <option value=""></option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i>
                            ذخیره تغییرات
                        </button>
                        <a href="{{ route('DashboardController.dashboard') }}" class="btn btn-outline">
                            <i class="fas fa-times"></i>
                            انصراف
                        </a>
                    </div>
                </form>
            </div>

        </section>
    </main>

@endsection


@section('script')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/i18n/fa.js"></script>

    <script src="https://cdn.tiny.cloud/1/f9honjw4tl69xv44iiw05gpprha65nf80lfz1akc0zoaoqe0/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#content',
            directionality: 'rtl',
            height: 500,
            menubar: false,
            plugins: 'advlist autolink lists link image charmap print preview anchor',
            toolbar: 'undo redo | formatselect | bold italic backcolor | \
                    alignleft aligncenter alignright alignjustify | \
                    bullist numlist outdent indent | removeformat | help'
        });
    </script>

    <script>

        $(document).ready(function() {
            // پیکربندی عمومی Select2
            const select2Config = {
                language: "fa",
                dir: "rtl",
                width: '100%',
                allowClear: true
            };

            // Select2 برای تصاویر - همه المنت‌های با کلاس select2-image
            $('.select2-image').select2({
                ...select2Config,
                placeholder: "تصویر مورد نظر را انتخاب کنید",
                templateResult: formatImageOption,
                templateSelection: formatImageSelection
            });

            // Select2 برای ویدیوها
            $('.select2-video').select2({
                ...select2Config,
                placeholder: "ویدیو مورد نظر را انتخاب کنید",
                templateResult: formatIconOption,
                templateSelection: formatIconSelection
            });

            // تابع برای نمایش گزینه‌های با آیکون
            function formatIconOption(option) {
                if (!option.id) {
                    return option.text;
                }
                
                var iconClass = $(option.element).data('icon');
                var $option = $(
                    '<div class="select2-icon-option">' +
                    '<i class="' + iconClass + '"></i>' +
                    '<span>' + option.text + '</span>' +
                    '</div>'
                );
                
                return $option;
            }

            function formatIconSelection(option) {
                if (!option.id) {
                    return option.text;
                }
                return option.text;
            }

            // تابع برای نمایش گزینه‌های با تصویر
            function formatImageOption(option) {
                if (!option.id) {
                    return option.text;
                }
                
                var imageUrl = $(option.element).data('image');
                var $option = $(
                    '<div class="select2-image-option">' +
                    '<img src="' + imageUrl + '" />' +
                    '<div class="image-info">' +
                    '<div class="image-name">' + option.text + '</div>' +
                    '<div class="image-details">شناسه: ' + option.id + '</div>' +
                    '</div>' +
                    '</div>'
                );
                
                return $option;
            }

            function formatImageSelection(option) {
                if (!option.id) {
                    return option.text;
                }
                return option.text;
            }

            // اضافه کردن تصویر به گزینه‌های انتخاب شده برای همه selectهای تصویر
            $('.select2-image').on('select2:select', function (e) {
                var selectedData = e.params.data;
                var imageUrl = $(e.params.data.element).data('image');
                
                if (imageUrl) {
                    var $choice = $(this).parent().find('.select2-selection__choice[title="' + selectedData.text + '"]');
                    $choice.prepend('<img src="' + imageUrl + '" class="select2-selection__choice__image">');
                }
            });

            // تغییر تصویر پوسترها - برای هر پوستر جداگانه
            $('#first-poster').on('change', function() {
                updatePosterPreview(1, $(this).val());
            });

            $('#second-poster').on('change', function() {
                updatePosterPreview(2, $(this).val());
            });

            $('#third-poster').on('change', function() {
                updatePosterPreview(3, $(this).val());
            });

            // تابع برای به‌روزرسانی پیش‌نمایش پوسترها
            function updatePosterPreview(posterNumber, imageUrl) {
                const previewElement = $(`#preview-poster-${posterNumber}`);
                if (imageUrl) {
                    previewElement.html(`<img src="${imageUrl}" alt="پوستر ${posterNumber}" style="width: 100%; height: 100%; object-fit: cover; border-radius: 6px;">`);
                } else {
                    previewElement.html('<i class="fas fa-image"></i>');
                }
            }

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

            // به‌روزرسانی پیش‌نمایش‌ها
            $('#hero-title').on('input', function() {
                $('#preview-hero-title').text(this.value);
            });

            $('#hero-subtitle').on('input', function() {
                $('#preview-hero-subtitle').text(this.value);
            });

            $('#breaking-text').on('input', function() {
                $('#preview-breaking-text').text(this.value);
            });

            // تغییر تصویر هیرو
            $('#hero-image').on('change', function() {
                const selectedOption = $(this).find('option:selected');
                const imageUrl = selectedOption.data('image');
                if (imageUrl) {
                    $('#preview-hero-image').html(`<img src="${imageUrl}" alt="تصویر هیرو" style="max-width: 300px; border-radius: 8px;">`);
                }
            });

            // تغییر پوسترها
            $('#poster-images').on('change', function() {
                const selectedValues = $(this).val();
                const previewContainer = $('#preview-posters');
                previewContainer.empty();
                
                if (selectedValues) {
                    selectedValues.forEach(value => {
                        const option = $(this).find(`option[value="${value}"]`);
                        const imageUrl = option.data('image');
                        if (imageUrl) {
                            previewContainer.append(`
                                <div style="background: #e9ecef; height: 100px; border-radius: 6px; display: flex; align-items: center; justify-content: center; color: #6c757d;">
                                    <img src="${imageUrl}" style="width: 100%; height: 100%; object-fit: cover; border-radius: 6px;">
                                </div>
                            `);
                        }
                    });
                }
            });

            // مدیریت خروج
            $('#logoutLink, #logoutTrigger').on('click', function(e) {
                e.preventDefault();
                if (confirm('آیا می‌خواهید از سیستم خارج شوید؟')) {
                    alert('با موفقیت خارج شدید!');
                }
            });

            // بستن منو با کلیک روی لینک‌ها
            $('.menu a').on('click', function() {
                if (window.innerWidth <= 992) {
                    sidebar.classList.remove('active');
                    overlay.classList.remove('active');
                }
            });
        });
        
    </script>

@endsection