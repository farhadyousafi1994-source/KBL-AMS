@extends('layout.master')

@section('content')
<div class="erp-hero" dir="rtl">
    <div class="row">
        <div class="col-md-8">
            <h1 style="margin-top:0;font-weight:800;">داشبورد سیستم جامع ERP ذمت و دارایی</h1>
            <p style="font-size:16px;opacity:.92;">مدیریت کارمندان، اجناس، ذمت‌ها، راپورها، کاربران، نقش‌ها و صلاحیت‌ها در یک محیط حرفه‌ای و سریع.</p>
            <div class="erp-actions">
                <a href="{{ url('employee') }}" class="btn btn-light"><i class="fa fa-user-plus"></i> ثبت کارمند</a>
                <a href="{{ url('stock') }}" class="btn btn-info"><i class="fa fa-cubes"></i> ثبت جنس</a>
                <a href="{{ url('report') }}" class="btn btn-success"><i class="fa fa-search"></i> جستجوی پیشرفته و راپور</a>
                @if(Auth::user()->type === 'super_admin')
                    <a href="{{ url('auth.userprofile') }}" class="btn btn-warning"><i class="fa fa-lock"></i> نقش و صلاحیت</a>
                @endif
            </div>
        </div>
        <div class="col-md-4 text-center hidden-sm hidden-xs">
            <i class="fa fa-line-chart" style="font-size:105px;opacity:.28;margin-top:15px;"></i>
        </div>
    </div>
</div>

<div class="row" dir="rtl">
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="erp-card">
            <span class="icon"><i class="fa fa-users"></i></span>
            <div class="value">{{ number_format($countemploy) }}</div>
            <strong>مجموع کارمندان</strong>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="erp-card">
            <span class="icon"><i class="fa fa-user-circle"></i></span>
            <div class="value">{{ number_format($usercount) }}</div>
            <strong>مجموع کاربران</strong>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="erp-card">
            <span class="icon"><i class="fa fa-archive"></i></span>
            <div class="value">{{ number_format($item_quantity) }}</div>
            <strong>تعداد اجناس</strong>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="erp-card">
            <span class="icon"><i class="fa fa-money"></i></span>
            <div class="value">{{ number_format($item_cost) }}</div>
            <strong>مجموع مبلغ اجناس</strong>
        </div>
    </div>
</div>

<div class="row" style="margin-top:24px;" dir="rtl">
    <div class="col-md-8">
        <div class="erp-card">
            <h3 style="margin-top:0;"><i class="fa fa-search"></i> جستجو و فیلتر سریع</h3>
            <p class="text-muted">برای پیدا کردن کارمند، جنس یا ذمت از لینک‌های زیر استفاده کنید. جدول‌ها با قابلیت جستجو، مرتب‌سازی، خروجی Excel/PDF و چاپ فعال شده‌اند.</p>
            <a href="{{ url('employee') }}" class="btn btn-primary"><i class="fa fa-search"></i> جستجوی کارمندان</a>
            <a href="{{ url('stock') }}" class="btn btn-primary"><i class="fa fa-search-plus"></i> جستجوی اجناس</a>
            <a href="{{ url('unasset') }}" class="btn btn-primary"><i class="fa fa-filter"></i> جستجوی ذمت‌ها</a>
        </div>
    </div>
    <div class="col-md-4">
        <div class="erp-card">
            <h3 style="margin-top:0;"><i class="fa fa-shield"></i> نقش فعلی</h3>
            <p>کاربر: <strong>{{ Auth::user()->name }}</strong></p>
            <p>صلاحیت: <span class="label label-info">{{ Auth::user()->type }}</span></p>
            <p class="text-muted">دسترسی منوها بر اساس نقش کاربر مدیریت می‌شود.</p>
        </div>
    </div>
</div>
@endsection
