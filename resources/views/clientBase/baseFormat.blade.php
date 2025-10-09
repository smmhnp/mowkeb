<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سایت خبری - صفحه اصلی</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @yield('style')
</head>
<body>
    @include('clientBase.nav')

    @yield('content')
        
    @include('clientBase.footer')

    @yield('script')

</body>
</html>