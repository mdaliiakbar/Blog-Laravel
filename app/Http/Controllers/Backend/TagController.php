<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tags;
use DB;

class TagController extends Controller
{
    public function index(){
        return view("app.tag.index");
    }

    public function add(){
        return view("app.tag.add");
    }

    public function tags(Request $request)
    {
        $columns = array(
            0 => 'tags.id',
            1 => 'tags.title'
        );

        $totalData = Tags::query()->count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $posts = DB::table(DB::raw("tags"))
            //$posts = DB::table(DB::raw("news,tags"))
                ->select(DB::raw("tags.*, count(tags.id) as total"))
                //->whereRaw('FIND_IN_SET(tags.id, news.tag_id)')
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->groupBy("tags.id")
                ->get();
        } else {
            $search = $request->input('search.value');
            //$posts =  DB::table(DB::raw("news,tags"))
            $posts =  DB::table(DB::raw("tags"))
                ->select(DB::raw("tags.*, count(tags.id) as total"))
               // ->whereRaw('FIND_IN_SET(tags.id, news.tag_id)')
                ->where('tags.title', 'like', "%{$search}%");
            $posts = $posts
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->groupBy("tags.id")
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
                $nestedData[] = $post->status==2?"Draft":"Published";
                $nestedData[] =
                    '<form style="display:inline;" action="'.(route("news-del")).'" method="post" onsubmit="return confirm_delete()">
                        <div class="align-middle">
                        <a href="' . route("tag-edit",$post->id).  '" class="btn btn-primary btn-sm badge">
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
            $tag = Tags::create([
                "title"=>$request->title,
                "status"=>$request->status,
                "meta"=>$request->meta
            ]);
        } else {
            $tag = Tags::find($request->id);
            $tag->title = $request->title;
            $tag->status = $request->status;
            $tag->meta = $request->meta;
            $tag->save();
        }

        if($tag) {
            return back()->with(["msg"=>"Successfully saved."]);
        } else {
            return back()->withErrors(["msg"=>"Failed to save! Please try again."]);
        }
    }

    public function edit($id)
    {
        $tag = Tags::find($id);
        return view("app.tag.edit", compact('tag'));
    }

    public function delete(Request $request)
    {
        $news = Tags::find($request->id);
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
