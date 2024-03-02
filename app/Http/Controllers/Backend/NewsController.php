<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Tags;
use Image;

class NewsController extends Controller
{
    public $source;
    public $destination_resize_path;
    public $destination_origin_path;
    public $keep_origin = true;
    public $width = 350;
    public $height = null;
    public $isWatermark = false;
    public $watermarkSource;

    public function index(){
        return view("app.news.index");
    }

    public function add(){
        $tags = Tags::all();
        $categories = Categories::all();
        return view("app.news.add", compact('tags','categories'));
    }

    public function news(Request $request)
    {
        $columns = array(
            0 => 'id',
            1 => 'title',
            2 => 'category_id',
            3 => 'news_date'
        );

        $filter_status = $request->input('search.filter_status');
        $filter_type = $request->input('search.filter_type');

        $where =array();

        if($filter_status){
            $where = array_merge($where,["news_status"=>$filter_status]);
        }
        if($filter_type){
            $where = array_merge($where,["news_type"=>$filter_type]);
        }
        $totalData = News::query()->where($where)->count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $posts = News::query();

            if($where){
                $posts = $posts->where($where);
            }
            $posts = $posts->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        } else {
            $search = $request->input('search.value');

            $posts = News::query()->where('title', '=', "{$search}");

            if($where){
                $posts = $posts->where($where);
            }
            $posts = $posts
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = count($posts);
        }

        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $nestedData = array();

                $nestedData[] = $post->id;
                $nestedData[] = $post->title;
                $nestedData[] = $post->category->title;
                $nestedData[] = $post->news_date;
                $nestedData[] = $post->news_type==1?"News":"Events";
                $nestedData[] = $post->news_status==2?"Draft":"Published";
                $nestedData[] =
                    '<form style="display:inline;" action="'.(route("news-del")).'" method="post" onsubmit="return confirm_delete()">
                        <div class="btn-group align-middle">
                        <a href="' . route("news-edit",$post->id).  '" class="btn btn-primary btn-sm badge">
                    <span class="ft-edit"></span> Edit</a>
                    '.(csrf_field()).' <input type="hidden" name="id" value="'.($post->id).'">
                    <button class="deleteData btn btn-danger btn-sm badge"><span class="ft-delete"></span> Delete</button></div></form>';
                $data[] = $nestedData;
            }
        }

        $json_data = [
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        ];

        return response()->json($json_data);
    }

    public function save(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'body' => ['required'],
            'news_date' => ['required'],
        ]);

        $folderName=date("Ym");

        $picture=$thumbnail=[];
        $folder="documents/news/$folderName/thumbnail/";
        $folder2="documents/news/$folderName/";
        $images=$request->file('picture');

        if($images){
            $directory = public_path($folder);
            if(!is_dir($directory)){
                mkdir($directory,0777,true);
            }
            foreach ($images as $image) {
                $img = Image::make($image);
                $img->save(public_path($folder2).$image->getClientOriginalName());
                $picture[]=$folder2.$image->getClientOriginalName();
                $img->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $fileName = explode('.',$image->getClientOriginalName())[0];
                $extension = $image->getClientOriginalExtension();
                $newFileName = $fileName.'_'.time().'.'.$extension;

                $thumbnail[]=$folder.$newFileName;
                $imageUrl = $directory.$newFileName;
                $img->save($imageUrl);
            }


        }

        if($request->save==1){
            $news = News::create([
                "title"=>$request->title,
                "body"=>$request->body,
                "news_type"=>$request->news_type,
                "news_date"=>$request->news_date,
                "category_id"=>$request->category_id,
                "news_status"=>$request->news_status,
                "tag_id"=>$request->tag ? implode(",",$request->tag):'',
                "created_by"=>auth()->user()->id,
                "picture"=>implode(",",$picture),
                "thumbnail"=>implode(",",$thumbnail)
            ]);
        } else {
            $news = News::find($request->id);
            $news->title = $request->title;
            $news->body = $request->body;
            $news->category_id = $request->category_id;
            $news->news_type = $request->news_type;
            $news->news_date = $request->news_date;
            $news->news_status = $request->news_status;
            $news->tag_id = $request->tag ? implode(",",$request->tag):'';
            $news->updated_by = auth()->user()->id;
            if($picture){
                if($news->picture){
                    foreach (explode(',',$news->picture) as $file) {
                        if(file_exists(public_path($file))){
                            unlink(public_path($file));
                        }
                    }
                    foreach (explode(',',$news->thumbnail) as $file) {
                        if(file_exists(public_path($file))){
                            unlink(public_path($file));
                        }
                    }
                }
                $news->picture = implode(",",$picture);
                $news->thumbnail = implode(",",$thumbnail);
            }
            $news->save();
        }

        if($news) {
            return back()->with(["msg"=>"Successfully saved."]);
        } else {
            return back()->withErrors(["msg"=>"Failed to save! Please try again."]);
        }
    }

    public function edit($id)
    {
        $news = News::find($id);
        $tags = Tags::all();
        $categories = Categories::all();
        return view("app.news.edit", compact('news','tags','categories'));
    }

    public function delete(Request $request)
    {
        $news = News::find($request->id);
        if($news){
            if($news->delete()){
                return back()->with(["msg"=>"Successfully deleted."]);
            }else{
                return back()->withErrors(["msg"=>"Failed to delete! Please try again."]);
            }
        }else{
            return back()->withErrors(["msg"=>"Failed to delete! Please try again."]);
        }
    }


}
