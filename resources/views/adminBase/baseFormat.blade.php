<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پنل مدیریت - سایت خبری</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* استایل شیشه‌ای برای alert */
        .glass-alert {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            padding: 15px 25px;
            border-radius: 15px;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.2);
            color: white;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
            min-width: 300px;
            max-width: 500px;
            z-index: 9999;
            animation: fadeInOut 4s ease forwards;
        }

        /* رنگ‌بندی */
        .glass-success {
            background: rgba(72, 217, 123, 0.2);
            border-color: rgba(72, 217, 123, 0.4);
        }

        .glass-error {
            background: rgba(242, 72, 72, 0.2);
            border-color: rgba(242, 72, 72, 0.4);
        }

        /* آیکون‌ها */
        .glass-alert i {
            font-size: 20px;
        }

        /* انیمیشن ورود و خروج */
        @keyframes fadeInOut {
            0% { opacity: 0; transform: translateX(-50%) translateY(-20px); }
            10% { opacity: 1; transform: translateX(-50%) translateY(0); }
            90% { opacity: 1; transform: translateX(-50%) translateY(0); }
            100% { opacity: 0; transform: translateX(-50%) translateY(-20px); }
        }
    </style>

    @yield('style')

</head>
<body>

    <div class="admin-container">
        @if (session('success'))
            <div class="glass-alert glass-success">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="glass-alert glass-error">
                <i class="fas fa-exclamation-circle"></i>
                {{ $errors->first() }}
            </div>
        @endif

        @include('adminBase.nav')    

        <!-- محتوای اصلی -->
        @yield('content')

    </div>

    <!-- overlay برای بستن منو در موبایل -->
    <div class="overlay" id="overlay"></div>

    @yield('script')
</body>
</html>