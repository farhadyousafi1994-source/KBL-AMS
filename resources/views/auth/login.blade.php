<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ورود | KBL ERP</title>
    <link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/bootstrap-rtl/dist/css/bootstrap-rtl.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <style>
        body { min-height: 100vh; background: linear-gradient(135deg, rgba(18,53,91,.93), rgba(31,143,139,.9)), url('{{ asset('images/itck.png') }}') center/cover no-repeat; font-family: Tahoma, Arial, sans-serif; }
        .login-shell { min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 30px; }
        .login-card { width: 100%; max-width: 980px; background: rgba(255,255,255,.96); border-radius: 28px; overflow: hidden; box-shadow: 0 30px 80px rgba(0,0,0,.28); }
        .login-brand { background: linear-gradient(180deg, #12355b, #0b2038); color: #fff; padding: 48px 38px; min-height: 480px; }
        .login-form { padding: 48px 42px; }
        .form-control { height: 48px; border-radius: 14px; border: 1px solid #d7e0ea; box-shadow: none; }
        .btn-login { height: 48px; border-radius: 14px; background: linear-gradient(135deg, #2563eb, #14b8a6); border: 0; font-weight: 800; }
        .feature { margin-top: 18px; color: #dbeafe; }
        .feature i { margin-left: 8px; }
    </style>
</head>
<body>
<div class="login-shell">
    <div class="login-card row">
        <div class="col-md-5 login-brand">
            <h1 style="font-weight:800;">KBL ERP</h1>
            <h3>سیستم جامع مدیریت دارایی و ذمت</h3>
            <p style="opacity:.9;margin-top:20px;line-height:1.9;">ورود امن برای کاربران با نقش‌های user، admin و super_admin. دسترسی‌ها پس از ورود بر اساس صلاحیت شما تنظیم می‌شود.</p>
            <div class="feature"><i class="fa fa-dashboard"></i> داشبورد مدیریتی حرفه‌ای</div>
            <div class="feature"><i class="fa fa-search"></i> جستجو و راپورهای پیشرفته</div>
            <div class="feature"><i class="fa fa-lock"></i> نقش‌ها و سطح دسترسی</div>
        </div>
        <div class="col-md-7 login-form">
            <h2 style="font-weight:800;margin-top:0;">ورود به سیستم</h2>
            <p class="text-muted">ایمیل و رمز عبور خود را وارد کنید.</p>
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label>ایمیل</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="name@example.com" required autofocus>
                </div>
                <div class="form-group">
                    <label>رمز ورود</label>
                    <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" name="remember"> مرا به خاطر بسپار</label>
                </div>
                <button type="submit" class="btn btn-primary btn-login btn-block"><i class="fa fa-sign-in"></i> ورود به سیستم</button>
                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">رمز عبور را فراموش کرده‌اید؟</a>
                @endif
            </form>
        </div>
    </div>
</div>
</body>
</html>
