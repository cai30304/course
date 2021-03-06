<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="/imgs/msys_1026_3326442_12910.png" type="image/x-icon">
    <link rel="icon" href="/imgs/msys_1026_3326442_12910.png" type="image/x-icon">
    <link rel="bookmark" href="/imgs/msys_1026_3326442_12910.png" type="image/x-icon">
    <link rel="apple-touch-icon-precomposed" href="/imgs/msys_1026_3326442_12910.png">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    {{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">

    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/layouts.css">
    <link rel="stylesheet" href="/css/table.css">
    <style>
        .card-title {
            font-size: 20px;
            margin-bottom: 0;
        }
        .sidebar_arrow {
            position: relative;
        }
        .sidebar .nav-item .collapse {
            z-index: 9999999;
        }

        .fa-angle-down {
            position: absolute;
            margin-left: 10px;
            right: 30px;
            top: calc(50% + 7px);
            font-size: 1.2em;
            color: #4C443C;
            transform: translateY(-50%)
        }

        #content {
            padding: 0;
        }

        .nav-item i {
            min-width: 16px;
        }

        .collapse-item.active {
            background-color: #eaecf4;
        }

        body {
            color: #51525d;
        }
        @media(max-width:360px){
            .maintenance{
                line-height: 1;
                font-size: 10px;
            }
        }

        @media(max-width: 540px){
            thead tr.tr-only-hide th{
                width: 100% !important;
            }
        }

    </style>
    @yield('css')
</head>
<body>
<div id="app">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/micro-course">
                    <div class="sidebar-brand-icon">
                        <i class="fas fa-book"></i>
                    </div> 
                    <div class="sidebar-brand-text mx-3">??????????????????<br>USR????????????</div>
                </a>
                


                @if(Auth::check() && Auth::user()->role === 'admin')
                <!-- Divider -->
                <hr class="sidebar-divider">
                <!-- Heading -->
                <div class="sidebar-heading">
                    USR
                </div>


                <li class="nav-item">
                    <a class="nav-link collapsed py-2" href="#" data-toggle="collapse" data-target="#website_setting">
                        <i class="fas fa-file-signature"></i>
                        <span>????????????</span>
                    </a>
                    <div id="website_setting" class="collapse">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="/micro-course/website_style_setting">
                                ????????????
                            </a>
                            <a class="collapse-item" href="/micro-course/index_background_setting">
                                ?????????????????????
                            </a>
                            <a class="collapse-item" href="/micro-course/website_info_setting">
                                ??????????????????
                            </a>
                        </div>
                    </div>
                </li>

                {{-- <li class="nav-item">
                    <a class="nav-link collapsed py-2" href="/micro-course/website_style_setting">
                        <i class="fas fa-file-signature"></i>
                        <span>??????????????????</span>
                    </a>
                </li> --}}

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed py-2" href="/micro-course/seo">
                        <i class="fas fa-address-card"></i>
                        <span>SEO??????</span>
                    </a>
                </li>

                <!-- Nav Item - Pages Collapse Menu -->
                    <li class="nav-item">
                        <a class="nav-link collapsed py-2" href="#" data-toggle="collapse" data-target="#collapse_1">
                            <i class="fas fa-file-signature"></i>
                            <span>??????????????????</span>
                        </a>
                        <div id="collapse_1" class="collapse">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <a class="collapse-item" href="/micro-course/banner">
                                    ???????????????
                                </a>

                                <a class="collapse-item" href="/micro-course/about">
                                    ????????????
                                </a>
                                <a class="collapse-item" href="/micro-course/links">
                                    ????????????
                                </a>
                            </div>
                        </div>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link collapsed py-2" href="#" data-toggle="collapse" data-target="#collapse_2">
                            <i class="fas fa-file-signature"></i>
                            <span>USR?????????????????????</span>
                        </a>
                        <div id="collapse_2" class="collapse">
                            <div class="bg-white py-2 collapse-inner rounded">
                                    <a class="collapse-item" href="/micro-course/plan_page/1">
                                        ????????????
                                    </a>

                                    <a class="collapse-item" href="/micro-course/plan_page/2">
                                        ????????????
                                    </a>

                                    <a class="collapse-item" href="/micro-course/plan_page/3">
                                        USR?????????
                                    </a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed py-2" href="#" data-toggle="collapse" data-target="#collapse_plan_location">
                            <i class="fas fa-file-signature"></i>
                            <span>??????????????????</span>
                        </a>
                        <div id="collapse_plan_location" class="collapse">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <a class="collapse-item" href="/micro-course/plan_page/6">
                                    ??????
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed py-2" href="/micro-course/news">
                            <i class="fas fa-file-signature"></i>
                            <span>????????????????????????</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed py-2" href="/micro-course/article_course">
                            <i class="fas fa-file-signature"></i>
                            <span>????????????????????????</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed py-2" href="/micro-course/result">
                            <i class="fas fa-file-signature"></i>
                            <span>????????????????????????</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link collapsed py-2" href="/micro-course/video">
                            <i class="fas fa-file-signature"></i>
                            <span>????????????????????????</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed py-2" href="/micro-course/download">
                            <i class="fas fa-file-signature"></i>
                            <span>????????????????????????</span>
                        </a>
                    </li>
                @endif
    
    {{-- ????????? --}}
            @if(Auth::check() && Auth::user()->role === 'admin')
            <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    ???????????????(?????????)
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed py-2" href="/micro-course/dashboard">
                        <i class="fas fa-file-signature"></i>
                        <span>?????????</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed py-2" href="/micro-course/white_list">
                        <i class="fas fa-file-signature"></i>
                        <span>???????????????</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed pt-2 pb-3" href="#" data-toggle="collapse" data-target="#collapse_mail">
                        <i class="fas fa-file-signature"></i>
                        <span>????????????</span>
                    </a>
                    <div id="collapse_mail" class="collapse">
                        <div class="bg-white py-2 collapse-inner rounded">
                            
                            <a class="collapse-item" href="/micro-course/mail">
                                ????????????
                            </a>
                            <a class="collapse-item" href="/micro-course/mail_backup">
                                ????????????
                            </a>
                        </div>
                    </div>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link collapsed py-2" href="/micro-course/class_announcement">
                        <i class="fas fa-file-signature"></i>
                        <span>??????????????????</span>
                    </a>
                </li> --}}
                {{-- <li class="nav-item">
                    <a class="nav-link collapsed py-2" href="/micro-course/tutorial">
                        <i class="fas fa-file-signature"></i>
                        <span>??????????????????</span>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link collapsed pt-2 pb-3" href="#" data-toggle="collapse" data-target="#collapse_class">
                        <i class="fas fa-file-signature"></i>
                        <span>????????????</span>
                    </a>
                    <div id="collapse_class" class="collapse">
                        <div class="bg-white py-2 collapse-inner rounded">

                                <a class="collapse-item" href="/micro-course/tutorial">
                                    ??????????????????
                                </a>

                                <a class="collapse-item" href="/micro-course/class">
                                    ????????????
                                </a>

                                <a class="collapse-item" href="/micro-course/class_review">
                                    ????????????
                                </a>

                                <a class="collapse-item" href="/micro-course/fail">
                                    ??????????????????
                                </a>
                        </div>
                    </div>
                </li>
                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed py-2" href="/micro-course/course">
                        <i class="fas fa-file-signature"></i>
                        <span>??????????????????</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed pt-2 pb-3" href="#" data-toggle="collapse" data-target="#collapse_request">
                        <i class="fas fa-file-signature"></i>
                        <span>????????????</span>
                    </a>
                    <div id="collapse_request" class="collapse">
                        <div class="bg-white py-2 collapse-inner rounded">

                                <a class="collapse-item" href="/micro-course/request">
                                    ?????????
                                </a>

                                <a class="collapse-item" href="/micro-course/request/success">
                                    ?????????
                                </a>

                                <a class="collapse-item" href="/micro-course/request/failed">
                                    ?????????
                                </a>
                        </div>
                    </div>
                </li>
            @endif


                {{-- ????????? --}}
                @if(Auth::check() && Auth::user()->role === 'teacher')
                <!-- Divider -->
                    <hr class="sidebar-divider">
    
                    <!-- Heading -->
                    <div class="sidebar-heading">
                        ???????????????(?????????)
                    </div>
    
                    <!-- Nav Item - Pages Collapse Menu -->
                    <li class="nav-item">
                        <a class="nav-link py-2 pt-3 collapsed" href="/micro-course/dashboard">
                            <i class="fas fa-file-signature"></i>
                            <span>?????????</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed pt-2 pb-3" href="#" data-toggle="collapse" data-target="#collapse_class">
                            <i class="fas fa-file-signature"></i>
                            <span>????????????</span>
                        </a>
                        <div id="collapse_class" class="collapse">
                            <div class="bg-white py-2 collapse-inner rounded">
                                    <a class="collapse-item" href="/micro-course/teacher/class">
                                        ????????????
                                    </a>
    
                                    {{-- <a class="collapse-item" href="/micro-course/teacher/class_review">
                                        ????????????
                                    </a> --}}
    
                                    <a class="collapse-item" href="/micro-course/teacher/fail">
                                        ???????????????
                                    </a>
                            </div>
                        </div>
                    </li>
                @endif

            {{-- ????????? --}}
            @if(Auth::check() && Auth::user()->role === 'student')
            <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    ???????????????(?????????)
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link py-2 pt-3 collapsed" href="/micro-course/dashboard">
                        <i class="fas fa-file-signature"></i>
                        <span>?????????</span>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link py-2 collapsed" href="/micro-course/student/class_announcement">
                        <i class="fas fa-file-signature"></i>
                        <span>????????????</span>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link py-2 collapsed" href="#" data-toggle="collapse" data-target="#collapse_10">
                        <i class="fas fa-users"></i>
                        <span>??????</span>
                    </a>
                    <div id="collapse_10" class="collapse">
                        <div class="bg-white py-2 collapse-inner rounded">
                                <a class="collapse-item"
                                    href="/micro-course/student/course">
                                    ????????????
                                </a>
                        </div>
                    </div>
                </li>
                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link py-2 pt-3 collapsed" href="/micro-course/student/course_records">
                        <i class="fas fa-file-signature"></i>
                        <span>????????????</span>
                    </a>
                </li>
            @endif

            <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button type="button" class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

            </ul>
            <!-- End of Sidebar -->


    <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button  type="button" id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto align-items-center">
                        @if(Auth::check())
                            <li class="nav-item">
                            </li>

                            <div class="topbar-divider d-none d-sm-block"></div>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{Auth::user()->name}}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a href="#" class="dropdown-item"><i class="fa fa-user"
                                            style="margin-right: 7px;"></i>??????????????????</a>
                                    <a href="#" class="dropdown-item"><i class="fa fa-cog"
                                            style="margin-right: 5px;"></i>????????????</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out-alt" style="margin-right: 5px;"></i>??????
                                    </a>
                                </div>
                            </li>
                        @endif
                     </a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                     </form>
                    </ul>

                </nav>

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div id="content" class="pb-3">
                    @yield('content')
                </div>

            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="topbar">
        <div class="container">
            <button type="button" id="sidebarCollapse" class="btn btn-info">
                <i class="fas fa-align-left"></i>
                <span>Toggle Sidebar</span>
            </button>

            <div class="navbar-brand">
                ??????????????????USR????????????
            </div>

            @if(Auth::check())
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{Auth::user()->name}}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out-alt" style="margin-right: 5px;"></i>??????
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </form>
                        </div>
                    </li>
                </ul>
            @endif
        </div>
    </nav> -->
</div>

<!-- Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/4.8.0/echarts.common.js"></script> --}}
<script src="/js/sb-admin-2.js"></script>
<script>
    {{--  init tooltip  --}}
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

    var width = $(window).width();

    if(width < 1200){
        //??????????????????
        $("body").addClass("sidebar-toggled");
        $("#accordionSidebar").addClass("toggled");
    }
</script>
@yield('js')
</body>
</html>

