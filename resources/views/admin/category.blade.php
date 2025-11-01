@extends('adminBase.baseFormat')

@section('style')

    <link href="{{ asset('css/category.css') }}" rel="stylesheet">

@endsection

@section('content')

    <main class="main-content">
            <div class="page-title">
                <h2>مدیریت دسته‌بندی‌ها</h2>
                @if(Auth::user()->role != 'editor')
                    <button class="btn btn-primary" id="addCategoryBtn">
                        <i class="fas fa-plus"></i>
                        افزودن دسته‌بندی جدید
                    </button>
                @endif
            </div>

            <div class="stats-cards">
                <div class="stat-card total-categories">
                    <div class="stat-icon">
                        <i class="fas fa-folder"></i>
                    </div>
                    <div class="stat-info">
                        <h3>{{ count($categories) }}</h3>
                        <p>کل دسته‌بندی‌ها</p>
                    </div>
                </div>
                <div class="stat-card articles-in-categories">
                    <div class="stat-icon">
                        <i class="fas fa-newspaper"></i>
                    </div>
                    <div class="stat-info">
                        <h3>۱,۲۴۷</h3>
                        <p>مطلب در دسته‌بندی‌ها</p>
                    </div>
                </div>
            </div>

            <div class="categories-table">
                <h3 class="section-title">
                    <i class="fas fa-list"></i>
                    لیست دسته‌بندی‌ها
                </h3>
                <table>
                    <thead>
                        <tr>
                            <th>دسته‌بندی</th>
                            <th>آدرس</th>
                            <th>تعداد مطالب</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>
                                    <div style="display: flex; align-items: center; gap: 10px;">
                                        <div class="category-icon">
                                            <i class="fas fa-globe"></i>
                                        </div>
                                        <div>
                                            <div style="font-weight: 600;">{{ $category->name }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $category->slug }}</td>
                                <td>۲۴۵</td>
                                <td>
                                    <div class="action-buttons">
                                        @if(Auth::user()->role == 'super_admin')
                                            <form action="{{ route('CategoryController.deleteCategoryManager') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="catrgory_id" value="{{ $category->id }}">
                                                <button class="action-btn delete-btn" title="حذف">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    </main>

    <!-- مودال افزودن دسته‌بندی -->
    <div class="modal" id="categoryModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>افزودن دسته‌بندی جدید</h3>
                <button class="close-modal" id="closeModal">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form action="{{ route('CategoryController.addCategoryManager') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="categoryName">نام دسته‌بندی <span style="color: var(--danger);">*</span></label>
                    <input name="name" type="text" id="categoryName" class="form-control" placeholder="نام دسته‌بندی را وارد کنید" required>
                </div>
                <div class="form-group">
                    <label for="categorySlug">آدرس دسته‌بندی <span style="color: var(--danger);">*</span></label>
                    <input name="slug" type="text" id="categorySlug" class="form-control" placeholder="آدرس یکتا برای دسته‌بندی" required>
                    <div style="font-size: 12px; color: #666; margin-top: 5px;">آدرس باید به انگلیسی و بدون فاصله باشد</div>
                </div>
                <div class="modal-actions">
                    <button type="submit" class="btn btn-primary">
                        ذخیره دسته‌بندی
                    </button>
                </div>
            </form>
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

        // مدیریت مودال
        const addCategoryBtn = document.getElementById('addCategoryBtn');
        const categoryModal = document.getElementById('categoryModal');
        const closeModal = document.getElementById('closeModal');
        const cancelBtn = document.getElementById('cancelBtn');
        const categoryForm = document.getElementById('categoryForm');

        // باز کردن مودال
        addCategoryBtn.addEventListener('click', function() {
            categoryModal.classList.add('active');
        });

        // بستن مودال
        function closeCategoryModal() {
            categoryModal.classList.remove('active');
            categoryForm.reset();
        }

        closeModal.addEventListener('click', closeCategoryModal);
        cancelBtn.addEventListener('click', closeCategoryModal);

        // بستن مودال با کلیک خارج از آن
        categoryModal.addEventListener('click', function(e) {
            if (e.target === categoryModal) {
                closeCategoryModal();
            }
        });

        // مدیریت ارسال فرم
        categoryForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const categoryName = document.getElementById('categoryName').value;
            const categorySlug = document.getElementById('categorySlug').value;
            
            // در اینجا می‌توانید کد ارسال فرم به سرور را اضافه کنید
            console.log('دسته‌بندی جدید:', {
                name: categoryName,
                slug: categorySlug
            });
            
            alert(`دسته‌بندی "${categoryName}" با موفقیت اضافه شد!`);
            closeCategoryModal();
            
            // اینجا می‌توانید دسته‌بندی جدید را به جدول اضافه کنید
        });

        // اضافه کردن افکت شیشه‌ای پویا
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.stat-card, .categories-table, .sidebar, .header, .modal-content');
            
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