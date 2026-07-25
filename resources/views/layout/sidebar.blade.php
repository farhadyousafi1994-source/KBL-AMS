<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>ERP Menu</h3>
        <ul class="nav side-menu">
            <li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> داشبورد</a></li>
            @if(Auth::user()->type !== 'user')
                <li><a href="{{ url('employee') }}"><i class="fa fa-user-plus"></i> ثبت کارمند</a></li>
                <li><a href="{{ url('stock') }}"><i class="fa fa-cubes"></i> ثبت جنس</a></li>
                <li><a href="{{ url('jointb') }}"><i class="fa fa-exchange"></i> ثبت ذمت</a></li>
            @endif
            <li><a href="{{ url('unasset') }}"><i class="fa fa-list-alt"></i> لست ذمت</a></li>
            <li><a href="{{ url('report') }}"><i class="fa fa-bar-chart"></i> راپور ها</a></li>
            @if(Auth::user()->type === 'super_admin')
                <li><a href="{{ url('auth.userprofile') }}"><i class="fa fa-users"></i> نقش‌ها و کاربران</a></li>
            @endif
        </ul>
    </div>
</div>
