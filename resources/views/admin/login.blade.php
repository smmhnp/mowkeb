<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ورود به سیستم - سایت خبری</title>
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
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: var(--dark);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            direction: rtl;
        }

        .login-container {
            width: 100%;
            max-width: 420px;
        }

        .login-card {
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 20px;
            border: 1px solid var(--glass-border);
            box-shadow: var(--shadow);
            padding: 40px 30px;
            text-align: center;
            transition: var(--transition);
        }

        .login-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }

        .logo {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-bottom: 30px;
            color: white;
        }

        .logo i {
            font-size: 32px;
        }

        .logo h1 {
            font-size: 28px;
            font-weight: 700;
        }

        .login-header {
            margin-bottom: 30px;
        }

        .login-header h2 {
            font-size: 24px;
            color: white;
            margin-bottom: 10px;
        }

        .login-header p {
            color: rgba(255, 255, 255, 0.8);
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: right;
        }

        .input-group {
            position: relative;
            margin-bottom: 5px;
        }

        .input-group i {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.7);
        }

        .form-control {
            width: 100%;
            padding: 15px 45px 15px 15px;
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 10px;
            color: white;
            font-size: 16px;
            transition: var(--transition);
        }

        .form-control:focus {
            outline: none;
            background: rgba(255, 255, 255, 0.3);
            border-color: rgba(255, 255, 255, 0.5);
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            font-size: 14px;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
            color: rgba(255, 255, 255, 0.8);
        }

        .remember-me input {
            width: 16px;
            height: 16px;
        }

        .forgot-password {
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            transition: var(--transition);
        }

        .forgot-password:hover {
            color: white;
            text-decoration: underline;
        }

        .btn {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 600;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            font-size: 16px;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background: var(--secondary);
            transform: translateY(-2px);
        }

        .btn-google {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.3);
            margin-top: 15px;
        }

        .btn-google:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        .login-footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
        }

        .login-footer p {
            color: rgba(255, 255, 255, 0.8);
            font-size: 14px;
        }

        .login-footer a {
            color: white;
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
        }

        .login-footer a:hover {
            text-decoration: underline;
        }

        .error-message {
            color: #ff6b6b;
            font-size: 14px;
            text-align: right;
            margin-top: 5px;
            display: none;
        }

        /* دکمه بازگشت به صفحه اصلی */
        .back-to-home {
            position: absolute;
            top: 20px;
            right: 20px;
        }

        .back-btn {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.3);
            padding: 10px 15px;
            border-radius: 8px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: var(--transition);
            font-size: 14px;
        }

        .back-btn:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        /* ریسپانسیو */
        @media (max-width: 480px) {
            .login-card {
                padding: 30px 20px;
            }

            .logo h1 {
                font-size: 24px;
            }

            .login-header h2 {
                font-size: 20px;
            }

            .form-options {
                flex-direction: column;
                gap: 10px;
                align-items: flex-start;
            }

            .back-to-home {
                position: relative;
                top: 0;
                right: 0;
                margin-bottom: 20px;
                text-align: center;
            }

            .back-btn {
                width: 100%;
                justify-content: center;
            }
        }

        /* انیمیشن‌ها */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-card {
            animation: fadeIn 0.6s ease-out;
        }

        /* استایل برای حالت loading */
        .btn.loading {
            position: relative;
            color: transparent;
        }

        .btn.loading::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            border: 2px solid transparent;
            border-top: 2px solid white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>

    <div class="login-container">
        <div class="login-card">

            <div class="login-header">
                <h2>ورود به حساب کاربری</h2>
            </div>

            <form id="loginForm" action="{{ route('login') }}" method="post">
                @csrf

                <div class="form-group">
                    <div class="input-group">
                        <i class="fas fa-user"></i>
                        <input name="email" type="text" class="form-control" id="username" placeholder="نام کاربری یا ایمیل" required>
                    </div>
                    <div class="error-message" id="usernameError">نام کاربری را وارد کنید</div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <i class="fas fa-lock"></i>
                        <input name="password" type="password" class="form-control" id="password" placeholder="رمز عبور" required>
                    </div>
                    <div class="error-message" id="passwordError">رمز عبور را وارد کنید</div>
                </div>

                <div class="form-options">
                    <label class="remember-me">
                        <input name="remember" type="checkbox" id="remember">
                        مرا به خاطر بسپار
                    </label>
                    <a href="#" class="forgot-password">رمز عبور را فراموش کرده‌اید؟</a>
                </div>

                <button type="submit" class="btn btn-primary" id="loginBtn">
                    <i class="fas fa-sign-in-alt"></i>
                    ورود به سیستم
                </button>
            </form>
        </div>
    </div>

</body>
</html>