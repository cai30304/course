@extends('layouts.default_index')

@section('title',$seo->title)
@section('keywords',$seo->keywords)
@section('description',$seo->description)

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css">
    <link rel="stylesheet" href="/css/index.css">
@endsection

@section('content')
<?php
    $default_website_setting=\App\WebsiteStyleSetting::find(1);
?>

<section id="main-section" style="background-image:url({{$main_section_bg->background_link}});@if($main_section_bg->background_size == '0') background-size: cover @endif">
    <section id="banner" class="position-relative">
        <div class="swiper-container bannerSwiper">
            <div class="swiper-wrapper">
                @foreach($banners as $banner)
                    <div class="swiper-slide">
                        <a href="{{$banner->slider_a_href}}"><img class="img-fluid" src="{{$banner->slider_url}}" alt="{{$banner->slider_alt}}"></a>
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="title">
                        <h3>About Us</h3>
                        <h2>關於我們</h2>
                    </div>
                    <div class="context-left">
                        <p>
                        {{$about->description}}
                        </p>
                    </div>
                    <a href="/plan_vision" class="btn btn-sm btn-dark btn-more">更多資訊</a>
                </div>
                <div class="col-md-6">
                    <div class="title">
                        <h3>Goal</h3>
                        <h2>USR理念</h2>
                    </div>
                    <div class="context-right">
                        {!!$about_2->description!!}
                    </div>
                </div>
            </div>
        </div>
    </section>

</section>

<section id="news-section" style="background-image:url({{$news_section_bg->background_link}});@if($news_section_bg->background_size == '0') background-size: cover @endif">
    <div class="container">
        <div class="news-nav">
            <div class="left-nav">
                <div class="title">
                    <h3>News</h3>
                    <h2>最新消息</h2>
                </div>
                <nav>
                    <a class="btn btn-sm btn-dark" href="#news-all">全部</a>
                    <a class="btn btn-sm btn-secondary" href="#news-type1">課程公告</a>
                    <a class="btn btn-sm btn-secondary" href="#news-type2">校內活動</a>
                    <a class="btn btn-sm btn-secondary" href="#news-type3">場域活動</a>
                    <a class="btn btn-sm btn-secondary" href="#news-type4">其他公告</a>
                    <a class="btn btn-sm btn-secondary" href="#news-type5">資訊轉知</a>
                </nav>
            </div>
            <div class="more">
                <a class="btn btn-link" href="/news">
                    全部消息
                    <img src="/imgs/icons/more.png" alt="more">
                </a>
            </div>
        </div>
        <div class="new-content active" id="news-all">
            <ul>
                @foreach($news as $new)
                    <li>
                        <div class="dateTypeLabel">
                            <span class="date">{{$new->date}}</span><span class="type">{{$new->plan_type}}</span>
                        </div>
                        <a href="/news/{{$new->id}}" class="title">{{$new->title}}</a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="new-content" id="news-type1">
            <ul>
                @foreach($news_type_1 as $new)
                    <li>
                        <div class="dateTypeLabel">
                            <span class="date">{{$new->date}}</span><span class="type">{{$new->plan_type}}</span>
                        </div>
                        <a href="/news/{{$new->id}}" class="title">{{$new->title}}</a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="new-content" id="news-type2">
            <ul>
                @foreach($news_type_2 as $new)
                    <li>
                        <div class="dateTypeLabel">
                            <span class="date">{{$new->date}}</span><span class="type">{{$new->plan_type}}</span>
                        </div>
                        <a href="/news/{{$new->id}}" class="title">{{$new->title}}</a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="new-content" id="news-type3">
            <ul>
                @foreach($news_type_3 as $new)
                    <li>
                        <div class="dateTypeLabel">
                            <span class="date">{{$new->date}}</span><span class="type">{{$new->plan_type}}</span>
                        </div>
                        <a href="/news/{{$new->id}}" class="title">{{$new->title}}</a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="new-content" id="news-type4">
            <ul>
                @foreach($news_type_4 as $new)
                    <li>
                        <div class="dateTypeLabel">
                            <span class="date">{{$new->date}}</span><span class="type">{{$new->plan_type}}</span>
                        </div>
                        <a href="/news/{{$new->id}}" class="title">{{$new->title}}</a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="new-content" id="news-type5">
            <ul>
                @foreach($news_type_5 as $new)
                    <li>
                        <div class="dateTypeLabel">
                            <span class="date">{{$new->date}}</span><span class="type">{{$new->plan_type}}</span>
                        </div>
                        <a href="/news/{{$new->id}}" class="title">{{$new->title}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>

<section id="schedule-section" style="background-image:url({{$schedule_section_bg->background_link}});@if($schedule_section_bg->background_size == '0') background-size: cover @endif">
    <div class="container">
        <div class="schedule-nav">
            <div class="title">
                <h3>USR Schedule</h3>
                <h2>USR行事曆</h2>
            </div>
            <nav>
                <a class="btn btn-primary" href="#calendar">課程公告</a>
                <a class="btn btn-dark" href="#calendar2">校內活動</a>
                <a class="btn btn-dark" href="#calendar3">場域活動</a>
            </nav>
        </div>
        <div class="schedule-content">
            <div id='calendar' class="mt-5 schedule-calendar active"></div>
            <div id='calendar2' class="mt-5 schedule-calendar"></div>
            <div id='calendar3' class="mt-5 schedule-calendar"></div>

            <div id="calendar_modal" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <i class="fas fa-spinner fa-spin"></i>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="video-section" style="background-image:url({{$video_section_bg->background_link}});@if($video_section_bg->background_size == '0') background-size: cover @endif">
    <div class="container">
        <div class="video-nav">
            <div class="title">
                <h3>Video</h3>
                <h2>影音中心</h2>
            </div>
            <div class="more">
                <a class="btn btn-link" href="/video">
                    所有影音
                    <img src="/imgs/icons/more.png" alt="more">
                </a>
            </div>
        </div>
        <div class="video-content">
            <div class="swiper-container videoSwiper">
                <div class="swiper-wrapper">
                    @foreach($videos as $video)
                    <div class="swiper-slide">
                        <a href="{{$video->content}}" target="_blank">
                            <div class="video-slide">
                                @foreach($video->download_files as $file)
                                    @if ($loop->first)
                                        <img class="video-img" src="{{$file->url}}" alt="">
                                    @endif
                                @endforeach
                                <div class="video-play">
                                    <img src="/imgs/icons/video-play.png" alt="">
                                </div>
                            </div>
                        </a>
                        <div class="dateTypeLabel">
                            <span class="date">{{$video->date}}</span>
                            <span class="type">{{$video->plan_type}}</span>
                        </div>
                        <div class="title">
                            <a href="{{$video->content}}" target="_blank">
                                {{$video->title}}
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="swiper-button-next">
                <img width="50" src="/imgs/icons/right-pagination.png" alt="next">
            </div>
            <div class="swiper-button-prev">
                <img width="50" src="/imgs/icons/left-pagination.png" alt="prev">
            </div>
        </div>
    </div>
</section>

<section id="download-section" style="background-image:url({{$download_section_bg->background_link}});@if($download_section_bg->background_size == '0') background-size: cover @endif">
    <div class="container">
        <div class="download-nav">
            <div class="title">
                <h3>Download</h3>
                <h2>檔案中心</h2>
            </div>

            <div class="more">
                <a class="btn btn-link" href="/downloads">
                    所有檔案
                    <img src="/imgs/icons/more.png" alt="more">
                </a>
            </div>
        </div>
        <div class="download-content">
            <ul>
                @foreach($downloads as $download)
                <li>
                    <div class="dateTypeLabel">
                        <span class="date">{{$download->date}}</span>
                    </div>
                    <span class="title">{{$download->title}}</span>
                    <span class="download">
                        @if(count($download->download_files)>0)
                            @foreach($download->download_files as $file)
                                <a style="margin-right: 5px" href="{{$file->url}}" download="{{$file->old_filename}}">
                                    @if($file->ext == 'docx' || $file->ext == 'doc' ||$file->ext == 'odt')
                                        <img class="img-fluid" width="40" src="/imgs/word-01.png" alt="中山醫學大學 USR計畫 下載icon">
                                    @elseif($file->ext == 'pdf')
                                        <img class="img-fluid" width="40" src="/imgs/pdf-01.png" alt="中山醫學大學 USR計畫 下載icon">
                                    @elseif($file->ext == 'jpg')
                                        <img class="img-fluid" width="40" src="/imgs/icon-jpg.png" alt="中山醫學大學 USR計畫 下載icon">
                                    @else
                                        <img class="img-fluid" width="40" src="/imgs/icon-download.png" alt="中山醫學大學 USR計畫 下載icon">
                                    @endif
                                </a>
                            @endforeach
                        @endif
                    </span>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>

<section id="links-section" @if($default_website_setting && $default_website_setting->more_navbar_bg_color != null) style="background-color: {{$default_website_setting->more_navbar_bg_color}} !important" @endif>
    <div class="container">
        <div class="swiper-container links-Swiper position-relative">
            <div class="swiper-wrapper">
                @foreach($links as $link)
                    <div class="swiper-slide">
                        <a class="title" href="{{$link->links_a_href}}">
                            <img src="{{$link->links_url}}" alt="{{$link->links_alt}}">
                            <p>
                                {{$link->links_alt}}
                            </p>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-next">
                <img width="15" src="/imgs/icons/right-pagination-white.png" alt="next">
            </div>
            <div class="swiper-button-prev">
                <img width="15" src="/imgs/icons/left-pagination-white.png" alt="next">
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.30.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.30.1/locale/zh-tw.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
<script>
    $(function() {
        $(".news-nav nav a").click(function(){
            event.preventDefault();
            $(".news-nav nav a").removeClass('btn-dark').addClass('btn-secondary');
            $(this).removeClass('btn-secondary').addClass('btn-dark');
            var newNavValue = $(this).attr('href');
            $('.new-content').removeClass('active');
            $(newNavValue).addClass('active');
        })

        $("#schedule-section nav a").click(function(){
            event.preventDefault();
            $("#schedule-section nav a").removeClass('btn-primary').addClass('btn-dark');
            $(this).removeClass('btn-dark').addClass('btn-primary');

            var newNavValue = $(this).attr('href');
            $('.schedule-calendar').removeClass('active');
            $(newNavValue).addClass('active');
        })


        // page is now ready, initialize the calendar...

        $('#calendar').fullCalendar({
            themeSystem: 'bootstrap4',
            header: {
                left: 'prev,next ',
                center: 'title',
                right: 'today'
            },
            events: '/calendar_api',
            eventClick: function(event) {
                if (event.id) {
                    $('.modal-body').html('<i class="fas fa-spinner fa-spin"></i>');
                    $('.modal-title').html(event.title);
                    $('#calendar_modal').modal('toggle');
                    $('.modal-body').load('/calendar_detail_api/'+event.id);
                    return false;
                }
            }
        })

        $('#calendar2').fullCalendar({
            themeSystem: 'bootstrap4',
            header: {
                left: 'prev,next ',
                center: 'title',
                right: 'today'
            },
            events: '/calendar_api2',
            eventClick: function(event) {
                if (event.id) {
                    $('.modal-body').html('<i class="fas fa-spinner fa-spin"></i>');
                    $('.modal-title').html(event.title);
                    $('#calendar_modal').modal('toggle');
                    $('.modal-body').load('/calendar_detail_api/'+event.id);
                    return false;
                }
            }
        })

        $('#calendar3').fullCalendar({
            themeSystem: 'bootstrap4',
            header: {
                left: 'prev,next ',
                center: 'title',
                right: 'today'
            },
            events: '/calendar_api3',
            eventClick: function(event) {
                if (event.id) {
                    $('.modal-body').html('<i class="fas fa-spinner fa-spin"></i>');
                    $('.modal-title').html(event.title);
                    $('#calendar_modal').modal('toggle');
                    $('.modal-body').load('/calendar_detail_api/'+event.id);
                    return false;
                }
            }
        })

    });

    
    
    var bannerSwiper = new Swiper(".bannerSwiper", {
        slidesPerView: 'auto',
        centeredSlides: true,
        spaceBetween: 40,
        loop: true,
        grabCursor: true,
        pagination: {
            el: ".bannerSwiper .swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".bannerSwiper .swiper-button-next",
            prevEl: ".bannerSwiper .swiper-button-prev",
        },
    });

    @if (count($videos)>0)
        var videoSwiper = new Swiper("#video-section .videoSwiper", {
            slidesPerView: 'auto',
            spaceBetween: 40,
            loop: true,
            navigation: {
                nextEl: ".video-content .swiper-button-next",
                prevEl: ".video-content .swiper-button-prev",
            },
        });
    @endif

    var linksswiper = new Swiper(".links-Swiper", {
        slidesPerView: 'auto',
        grabCursor: true,
        navigation: {
            nextEl: "#links-section .swiper-button-next",
            prevEl: "#links-section .swiper-button-prev",
        },
    });
</script>
@endsection
