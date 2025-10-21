@extends('adminBase.baseFormat')

@section('style')

    <link href="{{ asset('css/manageArticle.css') }}" rel="stylesheet">

@endsection

@section('content')

    <main class="main-content">
        <div class="page-title">
            <h2>مدیریت مقالات</h2>
            <button class="btn btn-primary">
                <i class="fas fa-plus"></i>
                مقاله جدید
            </button>
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
                <div class="table-title">لیست مقالات (۲۴۵ مقاله)</div>
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
                        <th>تاریخ انتشار</th>
                        <th>بازدید</th>
                        <th>وضعیت</th>
                        <th>عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <img src="https://images.unsplash.com/photo-1586339949216-35c2747cc36d?w=100&h=60&fit=crop" alt="مقاله ۱" class="article-image">
                        </td>
                        <td>اجلاس سران کشورهای منطقه با موضوع امنیت خلیج فارس</td>
                        <td>سیاسی</td>
                        <td>محمد رضایی</td>
                        <td>۱۴۰۲/۰۵/۱۵</td>
                        <td>۱,۲۴۵</td>
                        <td><span class="status-badge status-published">منتشر شده</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="action-btn view" title="مشاهده">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="action-btn edit" title="ویرایش">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-btn delete" title="حذف">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="https://images.unsplash.com/photo-1504711434969-e33886168f5c?w=100&h=60&fit=crop" alt="مقاله ۲" class="article-image">
                        </td>
                        <td>رشد ۱۵ درصدی صادرات غیرنفتی در سه ماهه اول سال</td>
                        <td>اقتصادی</td>
                        <td>فاطمه کریمی</td>
                        <td>۱۴۰۲/۰۵/۱۴</td>
                        <td>۲,۳۴۱</td>
                        <td><span class="status-badge status-published">منتشر شده</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="action-btn view" title="مشاهده">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="action-btn edit" title="ویرایش">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-btn delete" title="حذف">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="https://images.unsplash.com/photo-1495020689067-958852a7765e?w=100&h=60&fit=crop" alt="مقاله ۳" class="article-image">
                        </td>
                        <td>قهرمانی تیم ملی والیبال در مسابقات آسیایی</td>
                        <td>ورزشی</td>
                        <td>علی محمدی</td>
                        <td>۱۴۰۲/۰۵/۱۳</td>
                        <td>۱,۸۷۶</td>
                        <td><span class="status-badge status-published">منتشر شده</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="action-btn view" title="مشاهده">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="action-btn edit" title="ویرایش">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-btn delete" title="حذف">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div style="width: 60px; height: 40px; background: #f0f0f0; border-radius: 6px; display: flex; align-items: center; justify-content: center; color: #999;">
                                <i class="fas fa-image"></i>
                            </div>
                        </td>
                        <td>مقاله جدید در مورد هوش مصنوعی و آینده تکنولوژی</td>
                        <td>فناوری</td>
                        <td>زهرا احمدی</td>
                        <td>۱۴۰۲/۰۵/۱۲</td>
                        <td>۰</td>
                        <td><span class="status-badge status-draft">پیش‌نویس</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="action-btn view" title="مشاهده">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="action-btn edit" title="ویرایش">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-btn delete" title="حذف">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="https://images.unsplash.com/photo-1557804506-669a67965ba0?w=100&h=60&fit=crop" alt="مقاله ۵" class="article-image">
                        </td>
                        <td>گزارش جامع از وضعیت آب و هوا در فصل بهار</td>
                        <td>محیط زیست</td>
                        <td>رضا حسینی</td>
                        <td>۱۴۰۲/۰۵/۱۱</td>
                        <td>۹۸۷</td>
                        <td><span class="status-badge status-pending">در انتظار تایید</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="action-btn view" title="مشاهده">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="action-btn edit" title="ویرایش">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-btn delete" title="حذف">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- صفحه‌بندی -->
            <div class="pagination">
                <button class="page-btn">
                    <i class="fas fa-chevron-right"></i>
                </button>
                <button class="page-btn">۱</button>
                <button class="page-btn active">۲</button>
                <button class="page-btn">۳</button>
                <button class="page-btn">۴</button>
                <button class="page-btn">۵</button>
                <button class="page-btn">
                    <i class="fas fa-chevron-left"></i>
                </button>
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

        document.querySelectorAll('.action-btn.edit').forEach(btn => {
            btn.addEventListener('click', function() {
                // کد ویرایش مقاله
                alert('ویرایش مقاله');
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