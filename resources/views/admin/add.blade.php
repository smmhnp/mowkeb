@extends('adminBase.baseFormat')

@section('style')

    <link href="{{ asset('css/addArticle.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <style>
        :root {
            --primary: #4361ee;
            --primary-light: #4895ef;
            --secondary: #3f37c9;
            --success: #4cc9f0;
            --danger: #f72585;
            --warning: #f8961e;
            --info: #4895ef;
            --light: #f8f9fa;
            --dark: #212529;
            --glass-bg: rgba(255, 255, 255, 0.25);
            --glass-border: rgba(255, 255, 255, 0.18);
            --shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.15);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Vazirmatn', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            color: var(--dark);
            min-height: 100vh;
            padding: 50px 20px;
            direction: rtl;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 16px;
            border: 1px solid var(--glass-border);
            box-shadow: var(--shadow);
            padding: 30px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--dark);
        }

        /* استایل عمومی Select2 */
        .select2-container--default .select2-selection--single,
        .select2-container--default .select2-selection--multiple {
            background: rgba(255, 255, 255, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 8px;
            transition: var(--transition);
        }

        .select2-container--default .select2-selection--single:focus,
        .select2-container--default .select2-selection--multiple:focus {
            outline: none;
            border-color: var(--primary);
            background: rgba(255, 255, 255, 0.5);
        }

        /* استایل Single Select */
        .select2-container--default .select2-selection--single {
            height: 45px;
            padding: 8px 15px;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: var(--dark);
            line-height: 28px;
            padding: 0;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 43px;
            left: 15px;
            right: auto;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow b {
            border-color: var(--primary) transparent transparent transparent;
        }

        /* استایل Multiple Select */
        .select2-container--default .select2-selection--multiple {
            min-height: 45px;
            padding: 5px 10px;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 20px;
            padding: 5px 12px;
            margin: 3px;
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            color: white;
            margin-left: 5px;
            order: 2;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover {
            color: rgba(255, 255, 255, 0.8);
        }

        /* استایل input جستجو */
        .select2-container--default .select2-search--inline .select2-search__field {
            color: var(--dark);
            margin-top: 5px;
            padding: 5px;
            background: transparent;
            border: none;
            box-shadow: none;
        }

        .select2-container--default .select2-search--inline .select2-search__field::placeholder {
            color: rgba(0, 0, 0, 0.5);
        }

        /* استایل Dropdown عمومی */
        .select2-container--default .select2-results__option--highlighted[aria-selected] {
            background: var(--primary);
            color: white;
        }

        .select2-container--default .select2-results__option[aria-selected=true] {
            background: rgba(67, 97, 238, 0.1);
            color: var(--primary);
        }

        .select2-dropdown {
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid var(--glass-border);
            border-radius: 8px;
            box-shadow: var(--shadow);
        }

        .select2-container--default .select2-search--dropdown .select2-search__field {
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 6px;
            background: rgba(255, 255, 255, 0.3);
            padding: 8px 12px;
            margin-bottom: 10px;
        }

        /* استایل برای حالت‌های مختلف */
        .select2-container--default.select2-container--focus .select2-selection--single,
        .select2-container--default.select2-container--focus .select2-selection--multiple {
            border-color: var(--primary);
            background: rgba(255, 255, 255, 0.5);
        }

        .select2-container--default.select2-container--open .select2-selection--single,
        .select2-container--default.select2-container--open .select2-selection--multiple {
            border-color: var(--primary);
        }

        /* استایل برای گزینه‌های با آیکون */
        .select2-icon-option {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 12px;
        }

        .select2-icon-option i {
            width: 20px;
            text-align: center;
            color: var(--primary);
        }

        /* استایل برای تصاویر در dropdown */
        .select2-image-option {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 15px;
        }

        .select2-image-option img {
            width: 50px;
            height: 40px;
            border-radius: 6px;
            object-fit: cover;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .select2-image-option .image-info {
            display: flex;
            flex-direction: column;
        }

        .select2-image-option .image-name {
            font-weight: 600;
            color: var(--dark);
        }

        .select2-image-option .image-details {
            font-size: 0.8rem;
            color: #666;
        }

        /* استایل برای گزینه‌های انتخاب شده با تصویر */
        .select2-selection__choice__image {
            width: 20px;
            height: 20px;
            border-radius: 3px;
            object-fit: cover;
            margin-left: 5px;
        }

        /* ریسپانسیو */
        @media (max-width: 768px) {
            .form-row {
                grid-template-columns: 1fr;
            }
            
            .container {
                padding: 20px;
            }
            
            .select2-image-option {
                flex-direction: column;
                align-items: flex-start;
                gap: 8px;
            }
            
            .select2-image-option img {
                width: 100%;
                height: 80px;
            }
        }
    </style>

@endsection

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            {{ $errors->first() }}
        </div>
    @endif

        <main class="main-content">
            <div class="page-title">
                <h2>نوشتن مطلب جدید</h2>
                <div>
                    <a href="{{ route('ArticleController.articleManager') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i>
                        انصراف
                    </a>
                </div>
            </div>

            <div class="article-form">
                <form id="new-article-form" action="{{ route('ArticleController.addArticleStore') }}" method="POSt">
                    @csrf

                    <div class="form-row">
                        <div class="form-group">
                            <label for="title">عنوان مطلب <span class="required">*</span></label>
                            <input name="title" type="text" id="title" class="form-control" placeholder="عنوان جذاب و کوتاه وارد کنید" required>
                        </div>
                        <div class="form-group">
                            <label for="category">دسته‌بندی <span class="required">*</span></label>
                            <select name="category" id="category" class="form-control" required>
                                <option value="">انتخاب دسته‌بندی</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="content" class="col-sm-2 control-label">محتوا <span class="required">*</span></label>
                        <div class="col-sm-12">
                            <textarea name="content" class="form-control" rows="10" id="content" placeholder="متن کامل خبر را اینجا بنویسید..."></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="summary">خلاصه مطلب</label>
                        <textarea name="summary" id="summary" class="form-control" 
                                maxlength="200"
                                placeholder="خلاصه کوتاهی از مطلب بنویسید (حداکثر 200 کاراکتر)"></textarea>
                        <div class="char-count">0/200</div>
                    </div>
 
                    <div class="form-row">
                        <div class="form-group">
                            <label for="tags">کلمات کلیدی</label>
                            <select name="tag" id="tags" class="form-control select2">
                                <option value="special">ویژه</option>
                                <option value="normal">معمولی</option>
                            </select>                        
                        </div>
                        <div class="form-group">
                            <label for="status">وضعیت</label>
                            <select name="status" id="status" class="form-control select2">
                                <option value="allow">مجاز</option>
                                <option value="unauthorized">غیر مجاز</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="video">ویدیو</label>
                            <select name="video" id="video" class="form-control select2">
                                <option value="">انتخاب ویدیو</option>
                                @foreach($videos as $video)
                                    <option value="{{ $video->id }}">{{ $video->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="cover">تصویر اصلی</label>
                            <select name="cover" id="cover" class="form-control select2">
                                <option value="">انتخاب تصویر</option>
                                @foreach($images as $image)
                                    <option value="{{ $image->url }}" data-image="{{ asset('storage/' . $image->url) }}">{{ $image->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="images">انتخاب تصاویر</label>
                        <select name="images[]" id="images" class="form-control select2" multiple>
                            @foreach($images as $image)
                                <option value="{{ $image->id }}" data-image="{{ asset('storage/' . $image->url) }}">{{ $image->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-paper-plane"></i>
                            انتشار مطلب
                        </button>
                    </div>
                </form>
            </div>
        </main>

@endsection


@section('script')

    <script>
        $(document).ready(function() {
            const select2Config = {
                language: "fa",
                dir: "rtl",
                width: '100%',
                allowClear: true
            };

            $('#video').select2({
                ...select2Config,
                placeholder: "ویدیو مورد نظر را انتخاب کنید",
                templateResult: formatIconOption,
                templateSelection: formatIconSelection
            });

            $('#cover').select2({
                ...select2Config,
                placeholder: "تصویر شاخص را انتخاب کنید",
                templateResult: formatImageOption,
                templateSelection: formatImageSelection
            });

            $('#images').select2({
                ...select2Config,
                closeOnSelect: false,
                templateResult: formatImageOption,
                templateSelection: formatImageSelection
            });


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

            $('#images').on('select2:select', function (e) {
                var selectedData = e.params.data;
                var imageUrl = $(e.params.data.element).data('image');
                
                if (imageUrl) {
                    var $choice = $('.select2-selection__choice[title="' + selectedData.text + '"]');
                    $choice.prepend('<img src="' + imageUrl + '" class="select2-selection__choice__image">');
                }
            });

            $(document).on('select2:open', function(e) {
                const selectId = e.target.id;
                document.querySelector(`.select2-search__field[aria-controls="select2-${selectId}-results"]`).focus();
            });
        });
    </script>

    <script>

        document.addEventListener("DOMContentLoaded", function() {
            const textarea = document.getElementById('summary');
            const counter = document.querySelector('.char-count');
            const max = 200;

            textarea.addEventListener('input', () => {
                const length = textarea.value.length;
                counter.textContent = `${length}/${max}`;
                counter.classList.toggle('exceeded', length > max);
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

    </script>

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

@endsection

