<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use DB;

class CategoryController extends Controller
{
    public function index(){
        return view("app.category.index");
    }

    public function add(){
        return view("app.category.add");
    }

    public function newsList(){
        return response()->json(Categories::all());
    }

    public function category(Request $request)
    {
        $columns = array(
            0 => 'categories.id',
            1 => 'categories.title'
        );

        $where =array();

        $totalData = Categories::query()->count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $posts = Categories::select(DB::raw("categories.*,count(news.category_id) total"))
                ->leftJoin("news","news.category_id","=","categories.id")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->groupBy("news.category_id")
                ->get();
        } else {
            $search = $request->input('search.value');
            $posts = Categories::select(DB::raw("categories.*,count(news.category_id) total"))
                ->leftJoin("news","news.category_id","=","categories.id")
                ->where('categories.title', 'like', "%{$search}%");
            $posts = $posts
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->groupBy("news.category_id")
                ->get();

            $totalFiltered = count($posts);
        }

        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $nestedData = array();

                $nestedData[] = $post->id;
                $nestedData[] = $post->title;
                $nestedData[] = $post->total;
                $nestedData[] = $post->news_status==2?"Draft":"Published";
                $nestedData[] =
                    '<form style="display:inline;" action="'.(route("news-del")).'" method="post" onsubmit="return confirm_delete()">
                        <div class="align-middle">
                        <a href="' . route("category-edit",$post->id).  '" class="btn btn-primary btn-sm badge">
                    <span class="ft-edit"></span> Edit</a>
                    '.(csrf_field()).' <input type="hidden" name="id" value="'.($post->id).'">
                    </div></form>';
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
        ]);

        if($request->save==1){
            $cat = Categories::create([
                "title"=>$request->title,
                "details"=>$request->body,
                "meta"=>$request->meta,
                "status"=>$request->news_status
            ]);
        } else {
            $cat = Categories::find($request->id);
            $cat->title = $request->title;
            $cat->details = $request->body;
            $cat->status = $request->status;
            $cat->meta = $request->meta;
            $cat->save();
        }

        if($cat) {
            return back()->with(["msg"=>"Successfully saved."]);
        } else {
            return back()->withErrors(["msg"=>"Failed to save! Please try again."]);
        }
    }

    public function edit($id)
    {
        $cat = Categories::find($id);
        return view("app.category.edit", compact('cat'));
    }

    public function delete(Request $request)
    {
        $news = Categories::find($request->id);
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
