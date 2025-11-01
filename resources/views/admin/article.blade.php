@extends('adminBase.baseFormat')

@section('style')

    <link href="{{ asset('css/manageArticle.css') }}" rel="stylesheet">

@endsection

@section('content')

    <main class="main-content">
        <div class="page-title">
            <h2>مدیریت مقالات</h2>
            <a href="{{ route('ArticleController.addArticleManager') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i>
                مقاله جدید
            </a>
        </div>

        <!-- بخش فیلترها -->
        <section class="filters-section">
            <div class="filter-row">
                <div class="form-group">
                    <label for="category">دسته‌بندی</label>
                    <select id="category" class="form-control">
                        <option value="">همه دسته‌بندی‌ها</option>
                        <option value="1">سیاسی</option>
                        <option value="2">اقتصادی</option>
                        <option value="3">فرهنگی</option>
                        <option value="4">ورزشی</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">وضعیت</label>
                    <select id="status" class="form-control">
                        <option value="">همه وضعیت‌ها</option>
                        <option value="published">منتشر شده</option>
                        <option value="draft">پیش‌نویس</option>
                        <option value="pending">در انتظار تایید</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="date">تاریخ انتشار</label>
                    <input type="date" id="date" class="form-control">
                </div>
            </div>
            <div class="filter-row">
                <div class="form-group">
                    <label for="search">جستجو در مقالات</label>
                    <input type="text" id="search" class="form-control" placeholder="عنوان یا محتوای مقاله...">
                </div>
                <div class="form-group" style="display: flex; align-items: flex-end;">
                    <button class="btn btn-outline" style="margin-left: 10px;">
                        <i class="fas fa-filter"></i>
                        اعمال فیلتر
                    </button>
                    <button class="btn btn-outline">
                        <i class="fas fa-redo"></i>
                        بازنشانی
                    </button>
                </div>
            </div>
        </section>

        <!-- جدول مقالات -->
        <section class="articles-table">
            <div class="table-header">
                <div class="table-title">لیست مقالات ({{ $count }} مقاله)</div>
                <div class="table-actions">
                    <button class="btn btn-outline btn-sm">
                        <i class="fas fa-download"></i>
                        خروجی Excel
                    </button>
                </div>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>تصویر</th>
                        <th>عنوان مقاله</th>
                        <th>دسته‌بندی</th>
                        <th>نویسنده</th>
                        <th>تاریخ ایجاد</th>
                        <th>وضعیت</th>
                        <th>عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($articles as $article)
                        <tr>
                            <td>
                                <img src="{{ asset('storage/' . $article->cover) }}" alt="{{ $article->name }}" class="article-image">
                            </td>
                            <td>{{ $article->name }}</td>
                            <td>{{ $article->category->name }}</td>
                            <td>{{ $article->user->fname . " " . $article->user->lname }}</td>
                            <td>{{ jDate($article->created_at)->ago() }}</td>
                            <td><span class="status-badge status-published">{{ status($article->status) }}</span></td>
                            <td>
                                <div class="action-buttons">
                                    <a href="#" class="action-btn view" title="مشاهده">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('ArticleController.updateArticleManager', ['id' => $article->id]) }}" class="action-btn edit" title="ویرایش">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @if(Auth::user()->role == 'super_admin')
                                        <a href="#" class="action-btn delete-btn" data-id="{{ $article->id }}" title="حذف">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            <div class="pagination-wrapper mt-4">
               {{ $articles->links() }}
           </div>           
        </section>
    </main>

@endsection

@section('script')

    <script>

        document.querySelectorAll('.delete-btn').forEach(btn => {
            btn.addEventListener('click', e => {
                e.preventDefault();

                const id = btn.getAttribute('data-id');
                const row = btn.closest('tr');

                if (confirm('آیا از حذف این مقاله مطمئن هستید؟')) {
                    fetch(`/admin/delete/${id}`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(res => res.ok ? res.json() : Promise.reject())
                    .then(response => {
                        row.style.transition = "opacity 0.3s ease";
                        row.style.opacity = "0";
                        setTimeout(() => row.remove(), 300);
                    })
                    .catch(() => alert('خطا در حذف مقاله'));
                }
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

        // مدیریت عملیات جدول
        document.querySelectorAll('.action-btn.delete').forEach(btn => {
            btn.addEventListener('click', function() {
                if (confirm('آیا از حذف این مقاله اطمینان دارید؟')) {
                    // کد حذف مقاله
                    const row = this.closest('tr');
                    row.style.opacity = '0.5';
                    setTimeout(() => {
                        row.remove();
                    }, 500);
                }
            });
        });

        document.querySelectorAll('.action-btn.view').forEach(btn => {
            btn.addEventListener('click', function() {
                // کد مشاهده مقاله
                alert('مشاهده مقاله');
            });
        });

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