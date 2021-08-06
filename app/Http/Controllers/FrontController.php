<?php

namespace App\Http\Controllers;

use App\Article;
use App\ImageNews;
use App\PlanArticle;
use App\PlanPage;
use App\Seo;
use App\Links;
use App\Slider;
use App\WebCount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

class FrontController extends Controller
{

    public function __construct()
    {
        $this->index='front.index';
        $this->activity_calendar='front.activity_calendar';

    }

    //首頁
    public function index()
    {
        $this->addWebCount();

        $seo=Seo::where('page','index')->first();
        $news=Article::where('type',1)->OrderBy('date','desc')->take(5)->get();
        $banners=Slider::OrderBy('sort','desc')->get();

        $links = Links::OrderBy('sort','desc')->get();

        return view($this->index,compact('seo','news','banners','links'));
    }

    public function plan_cp(Request $request)
    {
        $this->addWebCount();

        $route_name = Route::currentRouteName();
        switch ($route_name){
            case 'plan_vision':
                $PlanPageID = 1;
                break;
            case 'organization':
                $PlanPageID = 2;
                break;
            case 'usr_committee':
                $PlanPageID = 3;
                break;
            case 'office_member':
                $PlanPageID = 4;
                break;
            case 'results_report':
                $PlanPageID = 5;
                break;
            case 'shi_gang':
                $PlanPageID = 6;
                break;
        }

        $page = PlanPage::find($PlanPageID);
        return view('front._cp',compact('page'));
    }

    //article view
    public function article_view(Request $request)
    {
        $user_ip = $this->getUserIP();
        $value = Session::get('userIp');
        if($value==null){
            WebCount::create(['ip'=>$user_ip]);
            session(['userIp' => '$user_ip']);
        }

        $route_name = Route::currentRouteName();

        switch ($route_name){
            case 'front_news':
                $article_type = 1;
                break;

            case 'front_plan_results':
                $article_type = 2;
                break;

            case 'front_video':
                $article_type = 4;
                break;

            case 'front_honors':
                $article_type = 3;
                break;

            case 'front_downloads':
                $article_type = 5;
                break;

            case 'front_highlight':
                $article_type = 6;
                break;

            case 'front_other':
                $article_type = 7;
                break;

            case 'front_promote':
                $article_type = 8;
                break;
        }



        $seo=Seo::where('page','news')->first();
        $banners=Slider::OrderBy('sort','desc')->get();
        $imgnews=ImageNews::where('type', 2)->OrderBy('sort','desc')->get();
        foreach ($imgnews as $list){
            $list -> image_url = json_decode($list -> image_url,true);
        }

        $q = Article::where('type',$article_type);

        if($article_type==5){
            $q->with('download_files');
        }

        if($request->all_check == 'on'){
            if ($request->has('years') && $request->years!=null)
            {
                // simple where here or another scope, whatever you like
                $o_years=$request->years;
                $years=(int)str_replace(' ', '', $o_years);
                $q->whereYear('date', '=', $years+1911);
            }

            if ($request->has('plans') && $request->plans!=null)
            {
                $q->where('plan_type', $request->get('plans'));
            }

            if ($request->has('key_words') && $request->key_words!=null)
            {
                $q->where('title','LIKE', '%'.$request->get('key_words').'%');
            }

            if ($request->has('start_date') && $request->start_date!=null)
            {
                $q->where('date', '>=',  $request->get('start_date'));
            }

            if ($request->has('end_date') && $request->end_date!=null)
            {
                $q->where('date', '<=',  $request->get('end_date'));
            }
        }else{

            $q->where(function ($q) use ($request){
                if ($request->has('years') && $request->years!=null)
                {
                    // simple where here or another scope, whatever you like
                    $o_years=$request->years;
                    $years=(int)str_replace(' ', '', $o_years);

                    $q->orWhere(function ($q) use ($years){
                        $q->whereYear('date', '=', $years+1911);
                    });
                }

                if ($request->has('plans') && $request->plans!=null)
                {
                    $q->orwhere('plan_type', $request->get('plans'));
                }

                if ($request->has('key_words') && $request->key_words!=null)
                {
                    $q->orwhere('title','LIKE', '%'.$request->get('key_words').'%');
                }

                if ($request->has('start_date') && $request->start_date!=null)
                {
                    $q->orwhere('date', '>=',  $request->get('start_date'));
                }

                if ($request->has('end_date') && $request->end_date!=null)
                {
                    $q->orwhere('date', '<=',  $request->get('end_date'));
                }
            });
        }

        $articles =  $q->orderBy('top','desc')->orderBy('date','desc')->paginate(15);

        return view('front.article_view',compact('seo','articles','route_name'));
    }

    //article detail
    public function article_detail(Request $request,$id)
    {
        $user_ip = $this->getUserIP();
        $value = Session::get('userIp');
        if($value==null){
            WebCount::create(['ip'=>$user_ip]);
            session(['userIp' => '$user_ip']);
        }

        $route_name = Route::currentRouteName();

        $article = Article::find($id);

        $seo=Seo::where('page','news')->first();
        $banners=Slider::OrderBy('sort','desc')->get();
        $imgnews=ImageNews::where('type', 2)->OrderBy('sort','desc')->get();
        foreach ($imgnews as $list){
            $list -> image_url = json_decode($list -> image_url,true);
        }

        return view('front.article_detail',compact('seo','route_name','article'));
    }

    //活動行事曆
    public function activity_calendar()
    {
        $user_ip = $this->getUserIP();
        $value = Session::get('userIp');
        if($value==null){
            WebCount::create(['ip'=>$user_ip]);
            session(['userIp' => '$user_ip']);
        }

        $seo=Seo::where('page','activity_calendar')->first();
        $banners=Slider::OrderBy('sort','desc')->get();
        $imgnews=ImageNews::where('type', 2)->OrderBy('sort','desc')->get();
        foreach ($imgnews as $list){
            $list -> image_url = json_decode($list -> image_url,true);
        }
        return view($this->activity_calendar,compact('seo','banners','imgnews'));
    }

    
    function addWebCount()
    {
        $user_ip = $this->getUserIP();
        $value = Session::get('userIp');
        if($value==null){
            WebCount::create(['ip'=>$user_ip]);
            session(['userIp' => '$user_ip']);
        }
    }
    

    function getUserIP()
    {
        if (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } elseif (isset($_SERVER['HTTP_X_FORWARDED'])) {
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        } elseif (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        } elseif (isset($_SERVER['HTTP_FORWARDED'])) {
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        } elseif (isset($_SERVER['REMOTE_ADDR'])) {
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        } else {
            $ipaddress = 'UNKNOWN';
        }
        return $ipaddress;
    }
}