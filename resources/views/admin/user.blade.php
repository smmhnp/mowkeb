@extends('adminBase.baseFormat')

@section('style')

        <link href="{{ asset('css/user.css') }}" rel="stylesheet">

@endsection

@section('content')

    <main class="main-content">
        <div class="page-title">
            <h2>مدیریت کاربران</h2>
            <button class="btn btn-primary">
                <i class="fas fa-user-plus"></i>
                کاربر جدید
            </button>
        </div>

        <div class="stats-cards">
            <div class="stat-card total-users">
                <div class="stat-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-info">
                    <h3>۳,۴۵۸</h3>
                    <p>کل کاربران</p>
                </div>
            </div>
            <div class="stat-card active-users">
                <div class="stat-icon">
                    <i class="fas fa-user-check"></i>
                </div>
                <div class="stat-info">
                    <h3>۲,۹۸۷</h3>
                    <p>کاربران فعال</p>
                </div>
            </div>
            <div class="stat-card new-users">
                <div class="stat-icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <div class="stat-info">
                    <h3>۱۲۴</h3>
                    <p>کاربران جدید (امروز)</p>
                </div>
            </div>
            <div class="stat-card admins">
                <div class="stat-icon">
                    <i class="fas fa-user-shield"></i>
                </div>
                <div class="stat-info">
                    <h3>۸</h3>
                    <p>مدیران سیستم</p>
                </div>
            </div>
        </div>

        <div class="users-filters">
            <div class="filter-row">
                <div class="form-group">
                    <label for="search">جستجوی کاربر</label>
                    <input type="text" id="search" class="form-control" placeholder="نام کاربری یا ایمیل...">
                </div>
                <div class="form-group">
                    <label for="role">نقش کاربر</label>
                    <select id="role" class="form-control">
                        <option value="">همه نقش‌ها</option>
                        <option value="admin">مدیر</option>
                        <option value="editor">ویرایشگر</option>
                        <option value="user">کاربر عادی</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">وضعیت</label>
                    <select id="status" class="form-control">
                        <option value="">همه وضعیت‌ها</option>
                        <option value="active">فعال</option>
                        <option value="inactive">غیرفعال</option>
                        <option value="banned">مسدود شده</option>
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" style="height: 40px;">
                        <i class="fas fa-filter"></i>
                        اعمال فیلتر
                    </button>
                </div>
            </div>
        </div>

        <div class="users-table">
            <h3 class="section-title">
                <i class="fas fa-list"></i>
                لیست کاربران
            </h3>
            <table>
                <thead>
                    <tr>
                        <th>کاربر</th>
                        <th>ایمیل</th>
                        <th>نقش</th>
                        <th>وضعیت</th>
                        <th>تاریخ عضویت</th>
                        <th>عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div style="display: flex; align-items: center; gap: 10px;">
                                <div class="user-avatar-small">م</div>
                                <div>
                                    <div style="font-weight: 600;">مدیر سیستم</div>
                                    <div style="font-size: 12px; color: #666;">@admin</div>
                                </div>
                            </div>
                        </td>
                        <td>admin@example.com</td>
                        <td><span class="role admin">مدیر</span></td>
                        <td><span class="status active">فعال</span></td>
                        <td>۱۴۰۲/۰۱/۱۵</td>
                        <td>
                            <div class="action-buttons">
                                <button class="action-btn edit-btn" title="ویرایش">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-btn delete-btn" title="حذف">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div style="display: flex; align-items: center; gap: 10px;">
                                <div class="user-avatar-small">ف</div>
                                <div>
                                    <div style="font-weight: 600;">فاطمه کریمی</div>
                                    <div style="font-size: 12px; color: #666;">@fatemeh_k</div>
                                </div>
                            </div>
                        </td>
                        <td>fatemeh@example.com</td>
                        <td><span class="role editor">ویرایشگر</span></td>
                        <td><span class="status active">فعال</span></td>
                        <td>۱۴۰۲/۰۳/۲۲</td>
                        <td>
                            <div class="action-buttons">
                                <button class="action-btn edit-btn" title="ویرایش">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-btn delete-btn" title="حذف">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div style="display: flex; align-items: center; gap: 10px;">
                                <div class="user-avatar-small">م</div>
                                <div>
                                    <div style="font-weight: 600;">محمد رضایی</div>
                                    <div style="font-size: 12px; color: #666;">@mohammad_r</div>
                                </div>
                            </div>
                        </td>
                        <td>mohammad@example.com</td>
                        <td><span class="role user">کاربر عادی</span></td>
                        <td><span class="status inactive">غیرفعال</span></td>
                        <td>۱۴۰۲/۰۴/۱۰</td>
                        <td>
                            <div class="action-buttons">
                                <button class="action-btn edit-btn" title="ویرایش">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-btn delete-btn" title="حذف">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div style="display: flex; align-items: center; gap: 10px;">
                                <div class="user-avatar-small">ز</div>
                                <div>
                                    <div style="font-weight: 600;">زهرا احمدی</div>
                                    <div style="font-size: 12px; color: #666;">@zahra_a</div>
                                </div>
                            </div>
                        </td>
                        <td>zahra@example.com</td>
                        <td><span class="role user">کاربر عادی</span></td>
                        <td><span class="status banned">مسدود شده</span></td>
                        <td>۱۴۰۲/۰۲/۱۸</td>
                        <td>
                            <div class="action-buttons">
                                <button class="action-btn edit-btn" title="ویرایش">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-btn delete-btn" title="حذف">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div style="display: flex; align-items: center; gap: 10px;">
                                <div class="user-avatar-small">ع</div>
                                <div>
                                    <div style="font-weight: 600;">علی محمدی</div>
                                    <div style="font-size: 12px; color: #666;">@ali_m</div>
                                </div>
                            </div>
                        </td>
                        <td>ali@example.com</td>
                        <td><span class="role editor">ویرایشگر</span></td>
                        <td><span class="status active">فعال</span></td>
                        <td>۱۴۰۲/۰۵/۰۵</td>
                        <td>
                            <div class="action-buttons">
                                <button class="action-btn edit-btn" title="ویرایش">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-btn delete-btn" title="حذف">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
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
            const cards = document.querySelectorAll('.stat-card, .users-filters, .users-table, .sidebar, .header');
            
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
