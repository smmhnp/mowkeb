<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سایت خبری - صفحه اصلی</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary: #4361ee;
            --primary-light: #4895ef;
            --secondary: #3f37c9;
            --success: #4cc9f0;
            --danger: #f72585;
            --warning: #f8961e;
            --info: #4895ef;
            --light: #f8f9fa;
            --dark: #212529;
            --glass-bg: rgba(255, 255, 255, 0.25);
            --glass-border: rgba(255, 255, 255, 0.18);
            --shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.15);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Vazirmatn', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            color: var(--dark);
            min-height: 100vh;
            direction: rtl;
            overflow-x: hidden;
        }

        /* هدر سایت با افکت شیشه‌ای */
        .site-header {
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--glass-border);
            box-shadow: var(--shadow);
            padding: 0 20px;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .header-container {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            color: var(--dark);
        }

        .logo i {
            font-size: 28px;
            color: var(--primary);
        }

        .logo h1 {
            font-size: 24px;
            font-weight: 700;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 30px;
        }

        .nav-menu a {
            text-decoration: none;
            color: var(--dark);
            font-weight: 600;
            padding: 8px 16px;
            border-radius: 8px;
            transition: var(--transition);
            position: relative;
        }

        .nav-menu a:hover,
        .nav-menu a.active {
            color: var(--primary);
            background: rgba(255, 255, 255, 0.3);
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .search-box {
            position: relative;
            width: 300px;
        }

        .search-box input {
            width: 100%;
            padding: 10px 15px 10px 40px;
            border: none;
            background: rgba(255, 255, 255, 0.4);
            border-radius: 50px;
            font-size: 14px;
            transition: var(--transition);
        }

        .search-box input:focus {
            outline: none;
            background: rgba(255, 255, 255, 0.6);
        }

        .search-box i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary);
        }

        .auth-buttons {
            display: flex;
            gap: 10px;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background: var(--secondary);
        }

        .btn-outline {
            background: transparent;
            color: var(--primary);
            border: 2px solid var(--primary);
        }

        .btn-outline:hover {
            background: var(--primary);
            color: white;
        }

        .menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 24px;
            color: var(--primary);
            cursor: pointer;
            padding: 5px;
            border-radius: 5px;
            transition: var(--transition);
        }

        /* محتوای اصلی */
        .main-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 30px 20px;
        }

        .video-container {
            background: linear-gradient(45deg, var(--primary), var(--success));
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--shadow);
            margin-bottom: 30px;
            position: relative;
        }

        .video-placeholder {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
            padding: 20px;
        }

        .video-placeholder i {
            font-size: 4rem;
            margin-bottom: 20px;
        }

        .video-placeholder h3 {
            font-size: 1.8rem;
            margin-bottom: 10px;
        }

        .video-placeholder p {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        /* کارت‌های پوستر */
        .poster-cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 40px;
        }

        .poster-card {
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 15px;
            border: 1px solid var(--glass-border);
            box-shadow: var(--shadow);
            overflow: hidden;
            transition: var(--transition);
            aspect-ratio: 3/2;
            position: relative;
        }

        .poster-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }

        .poster-image {
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, var(--primary-light), var(--info));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2rem;
        }

        /* بخش توضیحات */
        .description-section {
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 20px;
            border: 1px solid var(--glass-border);
            box-shadow: var(--shadow);
            padding: 40px;
            margin-bottom: 40px;
        }

        .description-section h2 {
            font-size: 2rem;
            margin-bottom: 20px;
            color: var(--dark);
            text-align: center;
        }

        .description-section p {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #555;
            text-align: justify;
        }

        /* بخش هیرو */
        .hero-section {
            position: relative;
            overflow: hidden;
            border-radius: 20px;
            box-shadow: var(--shadow);
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 30px;
            align-items: center;
            padding: 40px;
            margin-bottom: 40px;
        }

        /* تصویر زمینه در لایه‌ی زیر */
        .hero-section::before {
            content: "";
            position: absolute;
            inset: 0;
            background: url('../cover.jpg') center/cover no-repeat;
            filter: blur(10px); /* تاری اصلاح شده */
            transform: scale(1.1); /* برای جلوه‌گری از لبه‌های تار */
            z-index: 0;
        }

        /* محتوای اصلی روی تصویر */
        .hero-section > * {
            position: relative;
            z-index: 1;
        }

        .hero-content h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: var(--light);
            line-height: 1.3;
        }

        .hero-content p {
            font-size: 1.1rem;
            color: var(--light);
            margin-bottom: 30px;
            line-height: 1.6;
        }

        .hero-image {
            background: linear-gradient(45deg, var(--primary), var(--success));
            border-radius: 15px;
            height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 4rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        /* دسته‌بندی‌ها */
        .categories-section {
            margin-bottom: 40px;
        }

        .section-title {
            font-size: 1.8rem;
            margin-bottom: 25px;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .categories-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .category-card {
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 15px;
            border: 1px solid var(--glass-border);
            box-shadow: var(--shadow);
            padding: 25px;
            text-align: center;
            transition: var(--transition);
            cursor: pointer;
        }

        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }

        .category-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            background: rgba(67, 97, 238, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            font-size: 24px;
            color: var(--primary);
        }

        .category-card h3 {
            font-size: 1.2rem;
            margin-bottom: 8px;
        }

        .category-card span {
            color: #666;
            font-size: 0.9rem;
        }

        /* اخبار برتر */
        .featured-news {
            margin-bottom: 40px;
        }

        .news-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 25px;
        }

        .news-card {
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 15px;
            border: 1px solid var(--glass-border);
            box-shadow: var(--shadow);
            overflow: hidden;
            transition: var(--transition);
        }

        .news-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }

        .news-image {
            width: 100%;
            height: 200px;
            background: linear-gradient(45deg, var(--primary), var(--success));
            position: relative;
        }

        .news-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: var(--primary);
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .news-content {
            padding: 20px;
        }

        .news-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
            font-size: 0.85rem;
            color: #666;
        }

        .news-category {
            background: rgba(67, 97, 238, 0.1);
            color: var(--primary);
            padding: 4px 10px;
            border-radius: 12px;
            font-weight: 600;
        }

        .news-title {
            font-size: 1.3rem;
            margin-bottom: 10px;
            line-height: 1.4;
        }

        .news-excerpt {
            color: #666;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .news-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 15px;
            border-top: 1px solid rgba(255, 255, 255, 0.3);
        }

        .news-author {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.9rem;
            color: #666;
        }

        .author-avatar {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 0.8rem;
            font-weight: bold;
        }

        /* خبر ویژه */
        .breaking-news {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            border-radius: 15px;
            margin-bottom: 40px;
            display: flex;
            align-items: center;
            gap: 20px;
            box-shadow: var(--shadow);
        }

        .breaking-badge {
            background: rgba(255, 255, 255, 0.2);
            padding: 8px 16px;
            border-radius: 8px;
            font-weight: 700;
            white-space: nowrap;
        }

        .breaking-text {
            flex: 1;
            font-weight: 600;
        }

        /* سایدبار */
        .layout-container {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 30px;
        }

        .sidebar {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .sidebar-widget {
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 15px;
            border: 1px solid var(--glass-border);
            box-shadow: var(--shadow);
            padding: 25px;
        }

        .widget-title {
            font-size: 1.3rem;
            margin-bottom: 20px;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .trending-list {
            list-style: none;
        }

        .trending-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
        }

        .trending-item:last-child {
            border-bottom: none;
        }

        .trending-number {
            background: var(--primary);
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.9rem;
        }

        .trending-content h4 {
            font-size: 0.95rem;
            margin-bottom: 4px;
            line-height: 1.4;
        }

        .trending-meta {
            font-size: 0.8rem;
            color: #666;
        }

        /* گالری تصاویر در سایدبار */
        .sidebar-gallery {
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 15px;
            border: 1px solid var(--glass-border);
            box-shadow: var(--shadow);
            padding: 20px;
            overflow: hidden;
        }

        .gallery-slider {
            position: relative;
            height: 300px;
            border-radius: 10px;
            overflow: hidden;
        }

        .gallery-slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 0.5s ease;
            background: linear-gradient(45deg, var(--primary-light), var(--info));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
        }

        .gallery-slide.active {
            opacity: 1;
        }

        .gallery-nav {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 15px;
        }

        .gallery-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: rgba(67, 97, 238, 0.3);
            cursor: pointer;
            transition: var(--transition);
        }

        .gallery-dot.active {
            background: var(--primary);
        }

        /* منوی کشویی شیشه‌ای */
        .mobile-menu {
            position: fixed;
            top: 0;
            right: -100%;
            width: 280px;
            height: 100vh;
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-left: 1px solid var(--glass-border);
            box-shadow: -5px 0 25px rgba(0, 0, 0, 0.1);
            z-index: 1001;
            transition: right 0.3s ease;
            padding: 80px 25px 25px;
            overflow-y: auto;
        }

        .mobile-menu.active {
            right: 0;
        }

        .mobile-nav {
            list-style: none;
            margin-bottom: 30px;
        }

        .mobile-nav li {
            margin-bottom: 10px;
        }

        .mobile-nav a {
            display: block;
            padding: 12px 15px;
            color: var(--dark);
            text-decoration: none;
            border-radius: 8px;
            transition: var(--transition);
        }

        .mobile-nav a:hover,
        .mobile-nav a.active {
            background: rgba(255, 255, 255, 0.3);
            color: var(--primary);
        }

        .mobile-overlay {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            display: none;
        }

        .mobile-overlay.active {
            display: block;
        }

        .close-menu {
            position: absolute;
            top: 20px;
            left: 20px;
            background: none;
            border: none;
            font-size: 24px;
            color: var(--danger);
            cursor: pointer;
        }

        /* فوتر */
        .site-footer {
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-top: 1px solid var(--glass-border);
            box-shadow: 0 -5px 20px rgba(0, 0, 0, 0.1);
            margin-top: 60px;
            padding: 40px 20px;
        }

        .footer-container {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
        }

        .footer-col h3 {
            font-size: 1.3rem;
            margin-bottom: 20px;
            color: var(--dark);
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 10px;
        }

        .footer-links a {
            color: #666;
            text-decoration: none;
            transition: var(--transition);
        }

        .footer-links a:hover {
            color: var(--primary);
            padding-right: 5px;
        }

        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .social-links a {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--dark);
            text-decoration: none;
            transition: var(--transition);
        }

        .social-links a:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-3px);
        }

        .copyright {
            text-align: center;
            padding-top: 30px;
            margin-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.3);
            color: #666;
        }

        /* ریسپانسیو */
        @media (max-width: 1200px) {
            .hero-section {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .hero-image {
                height: 200px;
            }

            .hero-image{
                display: none;
            }
        }

        @media (max-width: 992px) {
            .layout-container {
                grid-template-columns: 1fr;
            }

            .nav-menu {
                display: none;
            }

            .menu-toggle {
                display: block;
            }

            .search-box {
                width: 200px;
            }

            .header-actions.mobile-hidden {
                display: none;
            }
             
            .hero-image{
                display: none;
            }

            .sidebar {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 20px;
                align-items: start;
            }
            
            .sidebar-widget,
            .sidebar-gallery {
                margin-bottom: 0;
            }
            
            .gallery-slider {
                height: 250px;
            }
         
            .categories-section {
                margin-top: 40px;
            }
        }

        @media (max-width: 768px) {
            .hero-content h2 {
                font-size: 2rem;
            }

            .news-grid {
                grid-template-columns: 1fr;
            }

            .categories-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .search-box {
                width: 150px;
            }

            .breaking-news {
                flex-direction: column;
                text-align: center;
                gap: 10px;
            }

            .poster-cards {
                grid-template-columns: 1fr;
            }
            .hero-image,
            .breaking-badge,
            .poster-cards{
                display: none;
            }

            .sidebar {
                grid-template-columns: 1fr;
                gap: 30px;
            }
            
            .gallery-slider {
                height: 300px;
            }
        }

        @media (max-width: 576px) {
            .header-container {
                flex-wrap: wrap;
                gap: 15px;
            }

            .logo h1 {
                font-size: 20px;
            }

            .search-box {
                display: none;
            }

            .auth-buttons {
                display: none;
            }

            .hero-section {
                padding: 25px;
            }

            .hero-content h2 {
                font-size: 1.7rem;
            }

            .categories-grid {
                grid-template-columns: 1fr;
            }

            .section-title {
                font-size: 1.5rem;
            }

            .description-section {
                padding: 25px;
            }

            .description-section h2 {
                font-size: 1.5rem;
            }
            
            .hero-image,
            .breaking-badge,
            .poster-cards{
                display: none;
            }

            .description-section{
                margin-bottom: 0;
            }
        }

        .image-news {
            position: relative;
        }

        .special-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: rgba(67, 97, 238, 0.1);
            color: var(--primary);
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            z-index: 2;
        }
    </style>

</head>
<body>
    <!-- header -->
    <header class="site-header">
        <div class="header-container">
            <a href="http://localhost:8000" class="logo">
                <i class="fas fa-newspaper"></i>
                <h1>مثل اربعین</h1>
            </a>

            <nav class="nav-desktop">
                <ul class="nav-menu">
                    <li><a href="/" class="active">خانه</a></li>
                    <li><a href="/show/mm" class="">موکب‌مغازه‌ای</a></li>
                    <li><a href="/show/mma" class="">موکب‌ماشینی</a></li>
                    <li><a href="/show/mq" class="">موکب‌قرآنی</a></li>
                    <li><a href="/show/ka" class="">کارناوال</a></li>
                </ul>
            </nav>
            <button class="menu-toggle" id="menuToggle">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </header>

    <!-- mobile menu -->
    <div class="mobile-overlay" id="mobileOverlay"></div>
    <div class="mobile-menu" id="mobileMenu">
        <button class="close-menu" id="closeMenu">
            <i class="fas fa-times"></i>
        </button>
        <ul class="mobile-nav">
            <li><a href="/" class="active">خانه</a></li>
            <li><a href="/show/mm" class="">موکب‌مغازه‌ای</a></li>
            <li><a href="/show/mma" class="">موکب‌ماشینی</a></li>
            <li><a href="/show/mq" class="">موکب‌قرآنی</a></li>
            <li><a href="/show/ka" class="">کارناوال</a></li>
        </ul>
    </div>
    
    <main class="main-container">
        <!-- بخش ویدیو و کارت‌ها -->
        
        <!-- بخش هیرو -->
        <section class="hero-section">
            <div class="hero-content">
                <h2>نهضت جهانی هر شب جمعه مثل اربعین</h2>
                <p>شب های جمعه٬ شب های زیارتی امام حسین علیه‌سلام نام ایشان را در محلات زنده کنیم</p>
            </div>
            <div class="hero-image" style="background-image: url('http://localhost:8000/storage/images/1762059350_66598480-9352-l__2990.jpg'); background-size: cover"></div>
        </section>

        <!-- خبر فوری -->
        <div class="breaking-news">
            <div class="breaking-badge">خبر فوری</div>
            <div class="breaking-text">متن تستی برای خبر ویژه</div>
        </div>
        
        <div class="layout-container">
            <!-- محتوای اصلی -->
            <div class="main-content">
                <!-- اخبار برتر -->

                <section class="video-section">
                    <div class="video-container">
                       <div id="99771696769"><script type="text/JavaScript" src="https://www.aparat.com/embed/jhj60bp?data[rnddiv]=99771696769&data[responsive]=yes"></script></div>
                    </div>

                    <!-- کارت‌های پوستر -->
                    <div class="poster-cards">
                        <div class="poster-card">
                            <div class="poster-image">
                                <i class="fas fa-mosque"></i>
                            </div>
                        </div>
                        <div class="poster-card">
                            <div class="poster-image">
                                <i class="fas fa-quran"></i>
                            </div>
                        </div>
                        <div class="poster-card">
                            <div class="poster-image">
                                <i class="fas fa-hands-helping"></i>
                            </div>
                        </div>
                    </div>

                    <!-- بخش توضیحات -->
                    <div class="description-section">
                        <h2>درباره نهضت مثل اربعین</h2>
                        <p>
                            نهضت "مثل اربعین" یک حرکت خودجوش مردمی است که با هدف زنده نگه داشتن فرهنگ عاشورایی و 
                            گسترش ارزش‌های انسان‌ساز قیام اباعبدالله الحسین (ع) در سراسر جهان شکل گرفته است. 
                            این نهضت هر شب جمعه با برگزاری مراسم زیارت، برنامه‌های فرهنگی و فعالیت‌های خیرخواهانه، 
                            تلاش می‌کند تا پیام عاشورا را به گوش جهانیان برساند و جامعه‌ای بر اساس ارزش‌های الهی بسازد.
                        </p>
                        <p style="margin-top: 15px;">
                            شرکت در این نهضت برای همه آزاد است و هرکس می‌تواند به فراخور توانایی‌های خود در 
                            بخش‌های مختلف از جمله موکب‌داری، برنامه‌ریزی فرهنگی، فعالیت‌های رسانه‌ای و خدمات 
                            خیرخواهانه مشارکت کند.
                        </p>
                    </div>
                </section>

            </div>

            <!-- سایدبار -->
            <aside class="sidebar">
                <!-- پربازدیدترین‌ها -->
                <div class="sidebar-widget">
                    <h3 class="widget-title">
                        <i class="fas fa-chart-line"></i>
                        پربازدیدترین‌ها
                    </h3>
                    <ul class="trending-list">
                        <li class="trending-item">
                            <div class="trending-number">۱</div>
                            <div class="trending-content">
                                <h4>تغییرات کابینه در هفته آینده</h4>
                                <div class="trending-meta">سیاسی - ۵,۲۴۱ بازدید</div>
                            </div>
                        </li>
                        <li class="trending-item">
                            <div class="trending-number">۲</div>
                            <div class="trending-content">
                                <h4>افتتاح خط تولید جدید خودروسازی</h4>
                                <div class="trending-meta">اقتصادی - ۴,۸۷۶ بازدید</div>
                            </div>
                        </li>
                        <li class="trending-item">
                            <div class="trending-number">۳</div>
                            <div class="trending-content">
                                <h4>نتایج قرعه کشی لیگ قهرمانان آسیا</h4>
                                <div class="trending-meta">ورزشی - ۴,۱۲۳ بازدید</div>
                            </div>
                        </li>
                        <li class="trending-item">
                            <div class="trending-number">۴</div>
                            <div class="trending-content">
                                <h4>جشنواره بین المللی فیلم فجر</h4>
                                <div class="trending-meta">فرهنگی - ۳,۹۸۷ بازدید</div>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- گالری تصاویر -->
                <div class="sidebar-gallery">
                    <h3 class="widget-title">
                        <i class="fas fa-images"></i>
                        گالری تصاویر
                    </h3>
                    <div class="gallery-slider">
                        <div class="gallery-slide active">
                            <i class="fas fa-mosque"></i>
                            <span>تصویر ۱</span>
                        </div>
                        <div class="gallery-slide">
                            <i class="fas fa-quran"></i>
                            <span>تصویر ۲</span>
                        </div>
                        <div class="gallery-slide">
                            <i class="fas fa-hands-helping"></i>
                            <span>تصویر ۳</span>
                        </div>
                        <div class="gallery-slide">
                            <i class="fas fa-users"></i>
                            <span>تصویر ۴</span>
                        </div>
                    </div>
                    <div class="gallery-nav">
                        <div class="gallery-dot active" data-slide="0"></div>
                        <div class="gallery-dot" data-slide="1"></div>
                        <div class="gallery-dot" data-slide="2"></div>
                        <div class="gallery-dot" data-slide="3"></div>
                    </div>
                </div>
            </aside>
        </div>

        <!-- دسته‌بندی‌ها -->
        <section class="categories-section">
            <h2 class="section-title">
                <i class="fas fa-folder"></i>
                دسته‌بندی‌های
            </h2>
            <div class="categories-grid">
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-landmark"></i>
                    </div>
                    <h3>موکب‌مغازه‌ای</h3>
                </div>
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-landmark"></i>
                    </div>
                    <h3>موکب‌ماشینی</h3>
                </div>
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-landmark"></i>
                    </div>
                    <h3>موکب‌قرآنی</h3>
                </div>
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-landmark"></i>
                    </div>
                    <h3>کارناوال</h3>
                </div>
            </div>
        </section>

    </main>

        
    <!-- فوتر -->
    <footer class="site-footer">
        <div class="footer-container">
            <div class="footer-col">
                <h3>درباره ما</h3>
                <p style="color: #666; line-height: 1.6;">اربعین تنها یک روز در سال نیست، یک روش زندگی است. این نهضت، دعوتی است برای همه انسان ها تا در هر کجای جهان، هر شب جمعه با هر نیت خیری، قدمی برداریم تا شاهد برکات اربعین به صورت هفتگی باشیم.</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-telegram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
            <div class="footer-col">
                <h3>چگونه مشارکت کنیم؟</h3>
                <p style="color: #666; line-height: 1.6;">موکب دار شو!<br>سهم تو در این جریان عشق چیه؟</p>
            </div>
            <div class="footer-col">
                <h3>دسته‌بندی‌ها</h3>
                <ul class="footer-links">
                    <li><a href="mm">موکب‌مغازه‌ای</a></li>
                    <li><a href="mma">موکب‌ماشینی</a></li>
                    <li><a href="mq">موکب‌قرآنی</a></li>
                    <li><a href="ka">کارناوال</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h3>تماس با ما</h3>
                <ul class="footer-links">
                    <li><i class="fas fa-map-marker-alt"></i> مشهد ........</li>
                    <li><i class="fas fa-phone"></i> ۰۵۱-۱۲۳۴۵۶۷۸</li>
                    <li><i class="fas fa-envelope"></i> info@news-site.com</li>
                </ul>
            </div>
        </div>
        <div class="copyright">
            © ۱۴۰۴ مثل اربعین . تمامی حقوق محفوظ است.
        </div>
    </footer>
    
    <script>
        // مدیریت منوی موبایل
        const menuToggle = document.getElementById('menuToggle');
        const mobileMenu = document.getElementById('mobileMenu');
        const mobileOverlay = document.getElementById('mobileOverlay');
        const closeMenu = document.getElementById('closeMenu');

        function openMobileMenu() {
            mobileMenu.classList.add('active');
            mobileOverlay.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeMobileMenu() {
            mobileMenu.classList.remove('active');
            mobileOverlay.classList.remove('active');
            document.body.style.overflow = '';
        }

        menuToggle.addEventListener('click', openMobileMenu);
        closeMenu.addEventListener('click', closeMobileMenu);
        mobileOverlay.addEventListener('click', closeMobileMenu);

        // بستن منو با کلیک روی لینک‌ها
        document.querySelectorAll('.mobile-nav a').forEach(link => {
            link.addEventListener('click', closeMobileMenu);
        });

        // مدیریت ریسپانسیو
        window.addEventListener('resize', function() {
            if (window.innerWidth > 992) {
                closeMobileMenu();
            }
        });

        // اسلایدشوی گالری تصاویر
        let currentSlide = 0;
        const slides = document.querySelectorAll('.gallery-slide');
        const dots = document.querySelectorAll('.gallery-dot');
        const totalSlides = slides.length;

        function showSlide(n) {
            // مخفی کردن همه اسلایدها
            slides.forEach(slide => slide.classList.remove('active'));
            dots.forEach(dot => dot.classList.remove('active'));
            
            // نمایش اسلاید جاری
            currentSlide = (n + totalSlides) % totalSlides;
            slides[currentSlide].classList.add('active');
            dots[currentSlide].classList.add('active');
        }

        function nextSlide() {
            showSlide(currentSlide + 1);
        }

        // کلیک روی دات‌ها
        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                showSlide(index);
            });
        });

        // تغییر خودکار اسلایدها هر 3 ثانیه
        setInterval(nextSlide, 3000);

        // نمایش اولین اسلاید
        showSlide(0);
    </script>

</body>
</html>