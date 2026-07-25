<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/ico">

    <title>سیستم ذمت کارمندان پوهنتون کابل</title>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">

    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Bootstrap -->
    <link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/bootstrap-rtl/dist/css/bootstrap-rtl.min.css') }}" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- NProgress -->
    <link href="{{ asset('vendors/nprogress/nprogress.css') }}" rel="stylesheet">

    <!-- Bootstrap Progressbar -->
    <link href="{{ asset('vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">

    <!-- iCheck -->
    <link href="{{ asset('vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">

    <!-- Date Range Picker -->
    <link href="{{ asset('vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">

    <!-- DataTables -->
    <link href="{{ asset('vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom Theme -->
    <link href="{{ asset('build/css/custom.min.css') }}" rel="stylesheet">

</head>

<body class="nav-md">

<div class="container body">

    <div class="main_container">

        <!-- ============================= -->
        <!-- SIDEBAR -->
        <!-- ============================= -->

        <div class="col-md-3 left_col hidden-print">

            <div class="left_col scroll-view">

                <!-- Logo / Title -->

                <div class="navbar nav_title" style="border: 0;">

                    <a href="{{ url('home') }}" class="site_title">
                        <span>ریاست پوهنتون کابل</span>
                    </a>

                </div>

                <div class="clearfix"></div>


                <!-- ============================= -->
                <!-- USER PROFILE -->
                <!-- ============================= -->

                <div class="profile clearfix">

                    <div class="profile_info">

                        <span>خوش آمدید،</span>

                        @auth
                            <h2>{{ Auth::user()->name }}</h2>
                        @else
                            <h2>مهمان</h2>
                        @endauth

                    </div>

                </div>


                <br>


                <!-- ============================= -->
                <!-- SIDEBAR MENU -->
                <!-- ============================= -->

                @include('layout.sidebar')


                <!-- ============================= -->
                <!-- SIDEBAR FOOTER -->
                <!-- ============================= -->

                <div class="sidebar-footer hidden-small">

                    <a data-toggle="tooltip"
                       data-placement="top"
                       title="تنظیمات">

                        <span class="glyphicon glyphicon-cog"
                              aria-hidden="true"></span>

                    </a>


                    <a data-toggle="tooltip"
                       data-placement="top"
                       title="تمام صفحه"
                       onclick="toggleFullScreen();">

                        <span class="glyphicon glyphicon-fullscreen"
                              aria-hidden="true"></span>

                    </a>


                    <a data-toggle="tooltip"
                       data-placement="top"
                       title="قفل"
                       class="lock_btn">

                        <span class="glyphicon glyphicon-eye-close"
                              aria-hidden="true"></span>

                    </a>


                    @auth

                    <a data-toggle="tooltip"
                       data-placement="top"
                       title="خروج"
                       href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

                        <span class="glyphicon glyphicon-off"
                              aria-hidden="true"></span>

                    </a>

                    @endauth

                </div>

            </div>

        </div>


        <!-- ============================= -->
        <!-- LOGOUT FORM -->
        <!-- ============================= -->

        @auth

        <form id="logout-form"
              action="{{ route('logout') }}"
              method="POST"
              style="display: none;">

            {{ csrf_field() }}

        </form>

        @endauth


        <!-- ============================= -->
        <!-- TOP NAVIGATION -->
        <!-- ============================= -->

        <div class="top_nav hidden-print">

            <div class="nav_menu">

                <nav>

                    <!-- Menu Toggle -->

                    <div class="nav toggle">

                        <a id="menu_toggle">

                            <i class="fa fa-bars"></i>

                        </a>

                    </div>


                    <ul class="nav navbar-nav navbar-right">


                        <!-- ============================= -->
                        <!-- USER MENU -->
                        <!-- ============================= -->

                        @auth

                        <li>

                            <a href="javascript:;"
                               class="user-profile dropdown-toggle"
                               data-toggle="dropdown"
                               aria-expanded="false">

                                {{ Auth::user()->name }}

                                <span class="fa fa-angle-down"></span>

                            </a>


                            <ul class="dropdown-menu dropdown-usermenu pull-left">

                                <li>

                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

                                        <span class="glyphicon glyphicon-off"
                                              aria-hidden="true"></span>

                                        خروج

                                    </a>

                                </li>

                            </ul>

                        </li>

                        @endauth


                        <!-- ============================= -->
                        <!-- LANGUAGE SWITCHER -->
                        <!-- ============================= -->

                        <li class="nav-item dropdown">

                            <a class="nav-link dropdown-toggle"
                               href="#"
                               id="navbarDropdownMenuLink"
                               data-toggle="dropdown"
                               aria-haspopup="true"
                               aria-expanded="false">

                                @php

                                    $languages = Config::get('languages', []);

                                    $currentLocale = App::getLocale();

                                    $currentLanguage = $languages[$currentLocale] ?? $currentLocale;

                                    /*
                                    |--------------------------------------------------------------------------
                                    | Fix for htmlspecialchars() array error
                                    |--------------------------------------------------------------------------
                                    | If the language configuration returns an array,
                                    | use the 'name' value instead of printing the array.
                                    |--------------------------------------------------------------------------
                                    */

                                    if (is_array($currentLanguage)) {
                                        $currentLanguage = $currentLanguage['name']
                                            ?? $currentLanguage['label']
                                            ?? $currentLanguage['title']
                                            ?? $currentLocale;
                                    }

                                @endphp

                                {{ $currentLanguage }}

                            </a>


                            <div class="dropdown-menu"
                                 aria-labelledby="navbarDropdownMenuLink">

                                @foreach ($languages as $lang => $language)

                                    @if ($lang != $currentLocale)

                                        @php

                                            /*
                                            |--------------------------------------------------------------------------
                                            | Fix language array
                                            |--------------------------------------------------------------------------
                                            */

                                            if (is_array($language)) {

                                                $languageLabel = $language['name']
                                                    ?? $language['label']
                                                    ?? $language['title']
                                                    ?? $lang;

                                            } else {

                                                $languageLabel = $language;

                                            }

                                        @endphp


                                        <a class="dropdown-item"
                                           href="{{ route('lang.switch', $lang) }}">

                                            {{ $languageLabel }}

                                        </a>

                                    @endif

                                @endforeach

                            </div>

                        </li>

                    </ul>

                </nav>

            </div>

        </div>


        <!-- ============================= -->
        <!-- PAGE CONTENT -->
        <!-- ============================= -->

        <div class="right_col"
             role="main">

            <div>

                <div class="col-md-13 col-sm-13 col-xs-13">

                    <div class="x_panel">

                        <div class="x_content">

                            <p class="text-muted font-13 m-b-30"></p>


                            <div class="container">

                                @yield('content')

                            </div>


                        </div>

                    </div>

                </div>

            </div>

        </div>


        <!-- ============================= -->
        <!-- FOOTER -->
        <!-- ============================= -->

        <footer class="hidden-print">

            <table width="95%"
                   border="0"
                   align="center">

                <tr>

                    <td height="35"
                        align="center"
                        valign="middle">

                        <span class="style2">

                            <br>

                            All Rights Reserved | KCIT

                            <br>

                            Developed by Farhad Yousafi

                            <br>

                        </span>

                    </td>

                </tr>

            </table>

        </footer>


    </div>


    <!-- ============================= -->
    <!-- LOCK SCREEN -->
    <!-- ============================= -->

    <div id="lock_screen">

        <table>

            <tr>

                <td>

                    <div class="clock"></div>

                    <span class="unlock">

                        <span class="fa-stack fa-5x">

                            <i class="fa fa-square-o fa-stack-2x fa-inverse"></i>

                            <i id="icon_lock"
                               class="fa fa-lock fa-stack-1x fa-inverse"></i>

                        </span>

                    </span>

                </td>

            </tr>

        </table>

    </div>


</div>


<!-- ============================= -->
<!-- JAVASCRIPT -->
<!-- ============================= -->

<!-- Bootstrap -->
<script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<!-- FastClick -->
<script src="{{ asset('vendors/fastclick/lib/fastclick.js') }}"></script>

<!-- NProgress -->
<script src="{{ asset('vendors/nprogress/nprogress.js') }}"></script>

<!-- Bootstrap Progressbar -->
<script src="{{ asset('vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>

<!-- iCheck -->
<script src="{{ asset('vendors/iCheck/icheck.min.js') }}"></script>

<!-- Moment -->
<script src="{{ asset('vendors/moment/min/moment.min.js') }}"></script>

<!-- Date Range Picker -->
<script src="{{ asset('vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

<!-- DataTables -->
<script src="{{ asset('vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>

<script src="{{ asset('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

<script src="{{ asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>

<script src="{{ asset('vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>

<script src="{{ asset('vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>

<script src="{{ asset('vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>

<script src="{{ asset('vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>

<script src="{{ asset('vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>

<script src="{{ asset('vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>

<script src="{{ asset('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>

<script src="{{ asset('vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>

<!-- JSZip -->
<script src="{{ asset('vendors/jszip/dist/jszip.min.js') }}"></script>

<!-- PDFMake -->
<script src="{{ asset('vendors/pdfmake/build/pdfmake.min.js') }}"></script>

<script src="{{ asset('vendors/pdfmake/build/vfs_fonts.js') }}"></script>

<!-- Custom Theme -->
<script src="{{ asset('build/js/custom.min.js') }}"></script>


</body>

</html>