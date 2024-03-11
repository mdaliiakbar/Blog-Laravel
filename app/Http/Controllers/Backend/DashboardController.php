<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\News;

class DashboardController extends Controller
{
    public function index(){

        $total_cat = Categories::count();
        $total_news = News::where("news_status",1)->count();
        $total_comments=0;
       
        return view("app.home",compact("total_cat","total_news","total_comments"));
    }
}
