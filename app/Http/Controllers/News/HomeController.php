<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Categories;

class HomeController extends Controller
{
    public function index(){
        return view("news.home");
    }
    public function newsPost($cat,$news){
        $newsSlug=trim($news);
        $news = News::whereSlug($newsSlug)->get();
dd( $news);
        // return view("news.post");
    }

    public function newsCategory($cat){
        $catSlug=trim($cat);
        $category = Categories::whereSlug($catSlug)->first();
        $news = News::where("category_id",$category->id)->get();
dd( $news);
        // return view("news.post");
    }
}
