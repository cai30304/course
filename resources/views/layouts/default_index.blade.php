<!DOCTYPE html>
<html lang="zh-TW">

<head>

    <?php
        $default_seo=\App\Seo::where('page','default')->first();
        $default_website_setting=\App\WebsiteStyleSetting::find(1);
        $default_website_info=\App\WebsiteInfoSetting::find(1);
        $countNumbers=\App\WebCount::pluck('ip');
        $countNumbers=count($countNumbers->toArray())+ 5000;
    ?>


    <meta charset="utf-8">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="keywords" content="@yield('keywords', $default_seo->keywords)"/>
    <meta name="description" content="@yield('description', $default_seo->description)"/>
    <meta property="og:url"           content="@yield('og_url', '')"/>
    <meta property="og:type"          content="@yield('og_type', 'website')" />
    <meta property="og:site_name"     content="@yield('og:site_name','')" />
    <meta property="og:title"         content="@yield('og_title','')" />
    <meta property="og:description"   content="@yield('og_description','')" />
    <meta property="og:image"         content="@yield('og_image', '')" />

    <link rel="shortcut icon" href="/imgs/msys_1026_3326442_12910.png" type="image/x-icon">
    <link rel="icon" href="/imgs/msys_1026_3326442_12910.png" type="image/x-icon">
    <link rel="bookmark" href="/imgs/msys_1026_3326442_12910.png" type="image/x-icon">
    <link rel="apple-touch-icon-precomposed" href="/imgs/msys_1026_3326442_12910.png">


    <!-- csrf-token meta -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', $default_seo->title)</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/css/swiper.min.css" />
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js" integrity="sha512-Tn2m0TIpgVyTzzvmxLNuqbSJH3JP8jm+Cy3hvHrW7ndTDcJ1w5mBiksqDBb8GpE2ksktFvDB/ykZ0mDpsZj20w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet" href="/css/layout_index.css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-K6EFFCQWNR"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-K6EFFCQWNR');
    </script>
    
    @yield('css')
</head>

<body>
    <nav id="main-nav" class="navbar navbar-expand-custom navbar-dark" @if($default_website_setting && $default_website_setting->main_navbar_bg_color != null) style="background-color: {{$default_website_setting->main_navbar_bg_color}} !important" @endif>
        <a class="navbar-brand" href="/">
            <img src="/imgs/logo.png" alt="中山醫學大學Logo">
            <h1>大學社會責任推動辦公室</h1>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink1" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        USR辦公室
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink1">
                        <a class="dropdown-item" href="/plan_vision">目標願景</a>
                        <a class="dropdown-item" href="/organization">組織架構</a>
                        <a class="dropdown-item" href="/usr_committee">USR委員會</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink2" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        場域介紹
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                        <a class="dropdown-item" href="/plan_location">石岡</a>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/news">最新消息</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink3" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        課程專區
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink3">
                        <a class="dropdown-item" href="/course">通識課程</a>
                        <a class="dropdown-item" href="/course2">微學分課程</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/plan_results">成果專區</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/video">媒體頻道</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/micro-course">微學分專區</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/downloads">下載專區</a>
                </li>
            </ul>
        </div>
    </nav>

    <div id="main">
        @yield('content')
    </div>

    <footer id="main-footer" @if($default_website_setting && $default_website_setting->footer_bg_color != null) style="background-color: {{$default_website_setting->footer_bg_color}} !important" @endif>
        <div class="container" id="main-footer-container">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 col-md">
                            <a class="brand" href="/">
                                <img src="/imgs/logo.png" alt="中山醫學大學Logo">
                                <h2>大學社會責任推動辦公室</h2>
                            </a>
                        </div>
                        <div class="col-auto">
                            <span>瀏覽人數 :</span>
                            <span>{{$countNumbers}}</span>
                        </div>
                    </div>
                </div>

                <div class="d-none d-md-block col-12">
                    <div class="footer-links">
                        <nav class="nav flex-column">
                            <a class="nav-link title" href="#">USR辦公室</a>
                            <a class="nav-link" href="/plan_vision">目標願景</a>
                            <a class="nav-link" href="/organization">組織架構</a>
                            <a class="nav-link" href="/usr_committee">USR委員會</a>
                        </nav>
                        <nav class="nav flex-column">
                            <a class="nav-link title" href="#">場域介紹</a>
                            <a class="nav-link" href="/plan_location">石岡</a>
                        </nav>
                        <nav class="nav flex-column">
                            <a class="nav-link title" href="#">最新消息</a>
                            <a class="nav-link" href="/news">消息列表</a>
                        </nav>
                        <nav class="nav flex-column">
                            <a class="nav-link title" href="#">課程專區</a>
                            <a class="nav-link" href="/course">通識課程</a>
                            <a class="nav-link" href="/course2">微學分課程</a>
                        </nav>
                        <nav class="nav flex-column">
                            <a class="nav-link title" href="/plan_results">成果專區</a>
                        </nav>
                        <nav class="nav flex-column">
                            <a class="nav-link title" href="/video">媒體頻道</a>
                        </nav>
                        <nav class="nav flex-column">
                            <a class="nav-link title" href="/micro-course">微學分專區</a>
                        </nav>
                        <nav class="nav flex-column">
                            <a class="nav-link title" href="/downloads">下載專區</a>
                        </nav>
                    </div>
                </div>

                <div class="col-12">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="information">
                                <p>學校地址</p>
                                <p>{{$default_website_info->address}}</p>
                            </div>
                            <div class="information">
                                <p>辦公室位置</p>
                                <p>{{$default_website_info->office_location}}</p>
                            </div>
                            <div class="information">
                                <p>聯絡電話</p>
                                <p>{{$default_website_info->tel}}</p>
                            </div>
                            <div class="information">
                                <p>聯絡信箱</p>
                                <p>{{$default_website_info->mail}}</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="social-links">
                                <a href="https://www.facebook.com/csmu.usr">
                                    <img src="/imgs/icons/facebook.svg" alt="facebookLogo">
                                </a>
                            </div>
                            <div class="copyright">
                                <p>中山醫學大學 大學社會責任推動辦公室 <span>©</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!-- Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.min.js"></script>
    @yield('js')
</body>

</html>