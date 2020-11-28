<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\comment;
use Auth;

class commentController extends Controller
{
    public function index($id){
        $page_name = 'comments';
        $data = comment::with(['post'])->where('post_id',$id)->orderBy('id','DESC')->get();
        return view('admin.comment.list',compact('page_name','data'));
    }

    public function reply($id){
        $page_name="reply page";
        return view('admin.comment.reply',compact('page_name','id'));
    }

    public function store(request $request){
        $this->validate($request,[
            'comment'=>'required',
            'post_id' => 'required',
        ]);

        $comment = new comment();
        $comment ->name = Auth::user()->name;
        $comment ->status=0;
        $comment ->comment = $request->comment;
        $comment->post_id = $request->post_id;
        $comment->save();
        return redirect()->route('comment-list',['id'=>$request->post_id])->with('succes','comment replied successfully');

    }

    public function status($id){
        $comment=comment::find($id);
        if($comment->status===1){
            $comment->status=0;
        }else{
            $comment->status=1;
        }
        $comment->save();
        return redirect()->route('comment-list',['id'=>$comment->post_id])->with('succes','status changé avec success');

    }

}
