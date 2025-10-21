@extends('adminBase.baseFormat')

@php
    function role($inRole){
        switch ($inRole){
            case 'super_admin':
                $role = 'مدیر ارشد';
                break;
            case 'admin':
                $role = 'مدیر';
                break;
            case 'editor':
                $role = 'ویرایشگر';
                break;
            default:
                $role = 'کاربر';            
        }

        return $role;
    }

    function status($inStatus){
        switch ($inStatus){
            case 'active':
                $status = 'فعال';
                break;
            default:
                $status = 'غیرفعال';
                break;            
        }
        
        return $status;
    }

    function userCheck($users, $op, $data){
        $num = 0;
        foreach($users as $user){
            if($user->$op == $data){
                $num++;
            }
        }

        return $num;
    }
@endphp

@section('style')

        <link href="{{ asset('css/user.css') }}" rel="stylesheet">

@endsection

@section('content')

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                {{ $errors->first() }}
            </div>
        @endif
    <main class="main-content">
        <div class="page-title">
            <h2>مدیریت کاربران</h2>
            <a href="{{ route('UserController.addUserManager') }}" class="btn btn-primary">
                <i class="fas fa-user-plus"></i>
                کاربر جدید
            </a>
        </div>

        <div class="stats-cards">
            <div class="stat-card total-users">
                <div class="stat-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-info">
                    <h3>{{ count($users) }}</h3>
                    <p>کل کاربران</p>
                </div>
            </div>
            <div class="stat-card active-users">
                <div class="stat-icon">
                    <i class="fas fa-user-check"></i>
                </div>
                <div class="stat-info">
                    <h3>{{ userCheck($users, 'status', 'active') }}</h3>
                    <p>کاربران فعال</p>
                </div>
            </div>
            <div class="stat-card new-users">
                <div class="stat-icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <div class="stat-info">
                    <h3>{{ userCheck($users, 'role', 'super_admin') }}</h3>
                    <p>مدیران ارشد</p>
                </div>
            </div>
            <div class="stat-card admins">
                <div class="stat-icon">
                    <i class="fas fa-user-shield"></i>
                </div>
                <div class="stat-info">
                    <h3>{{ userCheck($users, 'role', 'admin') }}</h3>
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
                        <th>عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>
                                <div style="display: flex; align-items: center; gap: 10px;">
                                    <div class="user-avatar-small"></div>
                                    <div>
                                        <div style="font-weight: 600;">{{ $user->fname . " " . $user->lname }}</div>
                                        <div style="font-size: 12px; color: #666;">{{ role($user->role) }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td><span class="role admin">{{ role($user->role) }}</span></td>
                            <td><span class="status active">{{ status($user->status) }}</span></td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('UserController.updateUserManager', ['id' => $user->id]) }}" class="action-btn edit-btn" title="ویرایش">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('UserController.deleteUserManager') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                                        <button class="action-btn delete-btn" title="حذف">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
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
