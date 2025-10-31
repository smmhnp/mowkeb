<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>دسترسی ممنوع - ۴۰۳</title>
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
            background: linear-gradient(135deg, #ff6b6b 0%, #f72585 100%);
            color: var(--light);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            direction: rtl;
            overflow-x: hidden;
        }

        .error-container {
            display: flex;
            align-items: center;
            gap: 50px;
            max-width: 1200px;
            width: 100%;
        }

        .error-visual {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .error-content {
            flex: 1;
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: 24px;
            border: 1px solid var(--glass-border);
            box-shadow: var(--shadow);
            padding: 40px;
            position: relative;
            overflow: hidden;
        }

        .error-content::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255,255,255,0.1), transparent);
            transform: rotate(45deg);
            animation: shimmer 3s infinite;
        }

        @keyframes shimmer {
            0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
            100% { transform: translateX(100%) translateY(100%) rotate(45deg); }
        }

        .error-code {
            font-size: 12rem;
            font-weight: 900;
            background: linear-gradient(135deg, #fff, #f0f0f0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1;
            text-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            margin-bottom: 20px;
        }

        .error-icon {
            font-size: 8rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 30px;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        .error-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            color: white;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        .error-message {
            font-size: 1.2rem;
            line-height: 1.8;
            margin-bottom: 30px;
            color: rgba(255, 255, 255, 0.9);
        }

        .error-details {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 30px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .error-details h3 {
            margin-bottom: 15px;
            font-size: 1.3rem;
            display: flex;
            align-items: center;
            gap: 10px;
            color: white;
        }

        .error-details ul {
            list-style: none;
            text-align: right;
        }

        .error-details li {
            margin-bottom: 10px;
            padding-right: 25px;
            position: relative;
            color: rgba(255, 255, 255, 0.9);
        }

        .error-details li:before {
            content: "•";
            position: absolute;
            right: 0;
            color: rgba(255, 255, 255, 0.8);
            font-size: 1.5rem;
        }

        .action-buttons {
            display: flex;
            gap: 15px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }

        .btn {
            padding: 12px 30px;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            font-weight: 600;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            font-size: 1rem;
            flex: 1;
            min-width: 200px;
            justify-content: center;
        }

        .btn-primary {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: 2px solid rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(10px);
        }

        .btn-primary:hover {
            background: rgba(255, 255, 255, 0.3);
            border-color: rgba(255, 255, 255, 0.5);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .btn-outline {
            background: transparent;
            color: white;
            border: 2px solid rgba(255, 255, 255, 0.3);
        }

        .btn-outline:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: rgba(255, 255, 255, 0.5);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .security-info {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            padding: 20px;
            margin-top: 20px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
        }

        .security-info p {
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 10px;
            font-size: 0.9rem;
        }

        .countdown {
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.8);
            text-align: center;
            margin-top: 15px;
        }

        .floating-elements {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }

        .floating-element {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: floatAround 20s infinite linear;
        }

        .floating-element:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }

        .floating-element:nth-child(2) {
            width: 120px;
            height: 120px;
            top: 60%;
            right: 10%;
            animation-delay: -5s;
        }

        .floating-element:nth-child(3) {
            width: 60px;
            height: 60px;
            bottom: 20%;
            left: 20%;
            animation-delay: -10s;
        }

        @keyframes floatAround {
            0%, 100% {
                transform: translate(0, 0) rotate(0deg);
            }
            25% {
                transform: translate(100px, -50px) rotate(90deg);
            }
            50% {
                transform: translate(50px, -100px) rotate(180deg);
            }
            75% {
                transform: translate(-50px, -50px) rotate(270deg);
            }
        }

        /* ریسپانسیو */
        @media (max-width: 1024px) {
            .error-container {
                gap: 30px;
            }
            
            .error-code {
                font-size: 10rem;
            }
            
            .error-icon {
                font-size: 6rem;
            }
        }

        @media (max-width: 768px) {
            .error-container {
                flex-direction: column;
                text-align: center;
                gap: 30px;
            }
            
            .error-visual {
                order: 1;
            }
            
            .error-content {
                order: 2;
            }
            
            .error-code {
                font-size: 8rem;
            }
            
            .error-title {
                font-size: 2rem;
            }
            
            .error-message {
                font-size: 1.1rem;
            }
            
            .action-buttons {
                flex-direction: column;
            }
            
            .btn {
                min-width: auto;
            }
            
            .error-details {
                text-align: center;
            }
            
            .error-details ul {
                text-align: center;
            }
            
            .error-details li {
                padding-right: 0;
                padding-left: 20px;
            }
            
            .error-details li:before {
                right: auto;
                left: 0;
            }
        }

        @media (max-width: 480px) {
            .error-code {
                font-size: 6rem;
            }
            
            .error-icon {
                font-size: 4rem;
            }
            
            .error-title {
                font-size: 1.5rem;
            }
            
            .error-content {
                padding: 30px 20px;
            }
            
            .action-buttons {
                gap: 10px;
            }
            
            .btn {
                padding: 10px 20px;
                font-size: 0.9rem;
            }
            
            .error-details {
                padding: 15px;
            }
        }

        @media (max-width: 360px) {
            .error-code {
                font-size: 5rem;
            }
            
            .error-title {
                font-size: 1.3rem;
            }
            
            .error-message {
                font-size: 1rem;
            }
        }

        /* انیمیشن قفل */
        .lock-animation {
            display: inline-block;
            animation: lockShake 3s infinite;
        }

        @keyframes lockShake {
            0%, 100% { transform: rotate(0deg); }
            25% { transform: rotate(-5deg); }
            75% { transform: rotate(5deg); }
        }
    </style>
</head>
<body>
    <div class="floating-elements">
        <div class="floating-element"></div>
        <div class="floating-element"></div>
        <div class="floating-element"></div>
    </div>

    <div class="error-container">
        <div class="error-visual">
            <div class="error-code">۴۰۳</div>
            <div class="error-icon">
                <div class="lock-animation">
                    <i class="fas fa-ban"></i>
                </div>
            </div>
        </div>
        
        <div class="error-content">
            <h1 class="error-title">دسترسی ممنوع!</h1>
            
            <p class="error-message">
                متأسفیم! شما اجازه دسترسی به این صفحه را ندارید.
                این ممکن است به دلیل محدودیت‌های سطح دسترسی یا مسائل امنیتی باشد.
            </p>

            <div class="error-details">
                <h3><i class="fas fa-exclamation-triangle"></i> دلایل احتمالی:</h3>
                <ul>
                    <li>عدم داشتن مجوز لازم برای مشاهده این صفحه</li>
                    <li>تلاش برای دسترسی به بخش مدیریتی</li>
                    <li>محدودیت IP یا منطقه جغرافیایی</li>
                    <li>نیاز به احراز هویت بیشتر</li>
                </ul>
            </div>

            <div class="action-buttons">
                <a href="/" class="btn btn-primary">
                    <i class="fas fa-home"></i>
                    بازگشت به صفحه اصلی
                </a>
                <a href="#" class="btn btn-outline" onclick="history.back()">
                    <i class="fas fa-arrow-right"></i>
                    بازگشت به صفحه قبل
                </a>
                <a href="/contact" class="btn btn-outline">
                    <i class="fas fa-envelope"></i>
                    تماس با پشتیبانی
                </a>
            </div>

            <div class="security-info">
                <p><i class="fas fa-shield-alt"></i> این رویداد برای بررسی امنیتی ثبت شد</p>
                <div class="countdown" id="countdown">
                    انتقال خودکار به صفحه اصلی در <span id="countdown-number">۱۰</span> ثانیه
                </div>
            </div>
        </div>
    </div>

    <script>
        // شمارش معکوس برای انتقال خودکار
        let countdown = 10;
        const countdownElement = document.getElementById('countdown-number');
        const countdownContainer = document.getElementById('countdown');

        const countdownInterval = setInterval(() => {
            countdown--;
            countdownElement.textContent = countdown;
            
            if (countdown <= 0) {
                clearInterval(countdownInterval);
                // window.location.href = '/';
                countdownContainer.innerHTML = '<i class="fas fa-spinner fa-spin"></i> در حال انتقال...';
                setTimeout(() => {
                    window.location.href = '/';
                }, 1000);
            }
        }, 1000);

        // متوقف کردن شمارش معکوس در صورت تعامل کاربر
        document.addEventListener('click', function() {
            clearInterval(countdownInterval);
            countdownContainer.innerHTML = 'شمارش معکوس متوقف شد';
            countdownContainer.style.opacity = '0.6';
        });

        document.addEventListener('keypress', function() {
            clearInterval(countdownInterval);
            countdownContainer.innerHTML = 'شمارش معکوس متوقف شد';
            countdownContainer.style.opacity = '0.6';
        });

        // انیمیشن برای المان‌های شناور
        document.addEventListener('DOMContentLoaded', function() {
            const floatingElements = document.querySelectorAll('.floating-element');
            
            floatingElements.forEach((element, index) => {
                element.style.animationDelay = `-${index * 5}s`;
            });

            // مدیریت ریسپانسیو داینامیک
            function handleResize() {
                const container = document.querySelector('.error-container');
                if (window.innerWidth <= 768) {
                    container.style.flexDirection = 'column';
                } else {
                    container.style.flexDirection = 'row';
                }
            }

            window.addEventListener('resize', handleResize);
            handleResize(); // فراخوانی اولیه

            // لاگ امنیتی
            console.warn('🚫 دسترسی غیرمجاز به صفحه ۴۰۳ - زمان: ' + new Date().toLocaleString('fa-IR'));
            console.info('📍 IP: ' + (window.returnCitySN ? window.returnCitySN.cip : 'N/A'));
        });

        // افکت‌های تعاملی
        const errorCard = document.querySelector('.error-content');
        
        errorCard.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px) scale(1.02)';
        });
        
        errorCard.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    </script>
</body>
</html>