<!DOCTYPE html>
<html lang="zh-TW">

<head>

    <?php
        $default_seo=\App\Seo::where('page','default')->first();
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

    <!-- csrf-token meta -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', $default_seo->title)</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <link rel="stylesheet" href="/css/layout_index.css">
    @yield('css')
</head>

<body>
    <nav id="main-nav" class="navbar navbar-expand-custom  navbar-dark">
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
                        <a class="dropdown-item" href="/office_member">辦公室成員</a>
                        <a class="dropdown-item" href="/results_report">成果報告</a>
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
                <li class="nav-item">
                    <a class="nav-link" href="#">課程專區</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/plan_results">成果專區</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/video">媒體頻道</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">微學分專區</a>
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

    <footer id="main-footer">
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
                            <a class="nav-link" href="#">目標願景</a>
                            <a class="nav-link" href="#">組織架構</a>
                            <a class="nav-link" href="#">USR委員會</a>
                            <a class="nav-link" href="#">辦公室成員</a>
                            <a class="nav-link" href="#">成果報告</a>
                        </nav>
                        <nav class="nav flex-column">
                            <a class="nav-link title" href="#">場域介紹</a>
                            <a class="nav-link" href="#">石岡</a>
                        </nav>
                        <nav class="nav flex-column">
                            <a class="nav-link title" href="#">最新消息</a>
                            <a class="nav-link" href="#">消息列表</a>
                        </nav>
                        <nav class="nav flex-column">
                            <a class="nav-link title" href="#">課程專區</a>
                        </nav>
                        <nav class="nav flex-column">
                            <a class="nav-link title" href="#">成果專區</a>
                        </nav>
                        <nav class="nav flex-column">
                            <a class="nav-link title" href="#">媒體頻道</a>
                        </nav>
                        <nav class="nav flex-column">
                            <a class="nav-link title" href="#">微學分專區</a>
                        </nav>
                        <nav class="nav flex-column">
                            <a class="nav-link title" href="#">下載專區</a>
                        </nav>
                    </div>
                </div>

                <div class="col-12">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="information">
                                <p>學校地址</p>
                                <p>40201 台中市南區建國北路一段110號</p>
                            </div>
                            <div class="information">
                                <p>辦公室位置</p>
                                <p>正心樓12樓1201辦公室</p>
                            </div>
                            <div class="information">
                                <p>聯絡電話</p>
                                <p>04-24730022 #1321 #11343</p>
                            </div>
                            <div class="information">
                                <p>聯絡信箱</p>
                                <p>jenny60067@gmail.com、sylvialiutaiwan@gmail.com</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="social-links">
                                <a href="">
                                    <img src="/imgs/icons/youtube.svg" alt="youtubeLogo">
                                </a>
                                <a href="">
                                    <img src="/imgs/icons/instagram.svg" alt="instagramLogo">
                                </a>
                                <a href="">
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
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>


    @yield('js')

</body>

</html>