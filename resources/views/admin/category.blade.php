@extends('adminBase.baseFormat')

@section('style')

    <link href="{{ asset('css/category.css') }}" rel="stylesheet">

@endsection

@section('content')

    <main class="main-content">
            <div class="page-title">
                <h2>مدیریت دسته‌بندی‌ها</h2>
                @if(Auth::user()->role != 'editor')
                    <a href="{{ route('CategoryController.addCategoryManager') }}" class="btn btn-primary" id="addCategoryBtn">
                        <i class="fas fa-plus"></i>
                        افزودن دسته‌بندی جدید
                    </a>
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
                                        <a href="{{ route('CategoryController.updateCategoryManager', ['slug' => $category->slug]) }}" class="action-btn"><i class="fas fa-edit"></i></a>
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