@extends('adminBase.baseFormat')

@section('style')

        <link href="{{ asset('css/addUser.css') }}" rel="stylesheet">

@endsection

@section('content')


        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                {{ $errors->first() }}
            </div>
        @endif

        <main class="main-content">
            <div class="page-title">
                @if(isset($user))
                    <h2>ویرایش کاربر</h2>
                @else
                    <h2>افزودن کاربر جدید</h2>
                @endif
                <div>
                    <a href="{{ route('UserController.userManager') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-right"></i>
                        بازگشت به لیست کاربران
                    </a>
                </div>
            </div>

            <div class="user-form-container">
                @if(isset($user))
                <form action="{{ route('UserController.updateUserStore', ['user' => $user->id]) }}" method="post" id="new-user-form">
                @else
                <form action="{{ route('UserController.addUserStore') }}" method="post" id="new-user-form">
                @endif
                    @csrf
                    <div class="form-section">
                        <h3 class="section-title">
                            <i class="fas fa-user"></i>
                            اطلاعات پایه کاربر
                        </h3>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="firstName">نام <span class="required">*</span></label>
                                <input type="text" name="fname" id="firstName" class="form-control" value="{{ $user->fname ?? '' }}" placeholder="نام کاربر را وارد کنید" required>
                            </div>
                            <div class="form-group">
                                <label for="lastName">نام خانوادگی <span class="required">*</span></label>
                                <input type="text" name="lname" id="lastName" class="form-control" value="{{ $user->lname ?? '' }}" placeholder="نام خانوادگی کاربر را وارد کنید" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="username">نام کاربری <span class="required">*</span></label>
                                <input type="text" name="username" id="username" value="{{ $user->username ?? '' }}" class="form-control" placeholder="نام کاربری منحصر به فرد" required>
                                <div class="form-hint">نام کاربری باید بین ۳ تا ۲۰ کاراکتر باشد</div>
                            </div>
                            <div class="form-group">
                                <label for="email">ایمیل <span class="required">*</span></label>
                                <input type="email" name="email" id="email" value="{{ $user->email ?? '' }}" class="form-control" placeholder="example@domain.com" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-section">
                        <h3 class="section-title">
                            <i class="fas fa-shield-alt"></i>
                            امنیت و دسترسی
                        </h3>
                        
                        @if(!isset($user))
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="password">رمز عبور <span class="required">*</span></label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="رمز عبور قوی وارد کنید" required>
                                    <div class="form-hint">رمز عبور باید حداقل ۸ کاراکتر و شامل حروف و اعداد باشد</div>
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">تکرار رمز عبور <span class="required">*</span></label>
                                    <input type="password" name="password_confirmation" id="confirmPassword" class="form-control" placeholder="تکرار رمز عبور" required>
                                </div>
                            </div>
                        @endif

                        <div class="form-row">
                            <div class="form-group">
                                <label for="role">نقش کاربری <span class="required">*</span></label>
                                <select name="role" id="role" class="form-control" required>
                                    @if(isset($user))
                                        @switch ($user->role)
                                            @case ("user")
                                                <option value="user">کاربر</option>
                                                <option value="editor">ویرایشگر</option>
                                                <option value="admin">مدیر</option>
                                                <option value="super_admin">مدیر ارشد</option>
                                                @break

                                            @case ("editor)"    
                                                <option value="editor">ویرایشگر</option>
                                                <option value="user">کاربر</option>
                                                <option value="admin">مدیر</option>
                                                <option value="super_admin">مدیر ارشد</option>
                                                @break

                                            @case ("admin")
                                                <option value="admin">مدیر</option>
                                                <option value="editor">ویرایشگر</option>
                                                <option value="user">کاربر</option>
                                                <option value="super_admin">مدیر ارشد</option>
                                                @break

                                            @case ("super_admin")
                                                <option value="super_admin">مدیر ارشد</option>
                                                <option value="admin">مدیر</option>
                                                <option value="editor">ویرایشگر</option>
                                                <option value="user">کاربر</option>
                                                @break

                                            @default
                                                <option value="user">کاربر</option>
                                                <option value="editor">ویرایشگر</option>
                                                <option value="admin">مدیر</option>
                                                <option value="super_admin">مدیر ارشد</option>
                                        @endswitch
                                    @else
                                        <option value="user">کاربر</option>
                                        <option value="editor">ویرایشگر</option>
                                        <option value="admin">مدیر</option>
                                        <option value="super_admin">مدیر ارشد</option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status">وضعیت حساب <span class="required">*</span></label>
                                <select name="status" id="status" class="form-control" required>
                                    @if(isset($user->status))
                                        @if($user->status == 'active')
                                            <option value="active">فعال</option>
                                            <option value="inactive">غیرفعال</option>
                                        @else
                                            <option value="inactive">غیرفعال</option>
                                            <option value="active">فعال</option>
                                        @endif
                                    @else
                                        <option value="inactive">غیرفعال</option>
                                        <option value="active">فعال</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-user-plus"></i>
                            @if(isset($user))
                                ویرایش کاربر
                            @else
                                ایجاد کاربر جدید
                            @endif
                        </button>
                    </div>
                </form>
            </div>
        </main>

@endsection

@section('script')

    <script>
        // responsive menu
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

        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.user-form-container, .sidebar, .header');
            
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

