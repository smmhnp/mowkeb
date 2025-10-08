<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پنل مدیریت - سایت خبری</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
 
    @yield('style')

</head>
<body>
    <div class="admin-container">
        @include('adminBase.nav')    

        <!-- محتوای اصلی -->
        @yield('content')

    </div>

    <!-- overlay برای بستن منو در موبایل -->
    <div class="overlay" id="overlay"></div>

    @yield('script')
</body>
</html>