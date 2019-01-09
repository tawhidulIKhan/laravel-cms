<?php

namespace App\Http\Controllers;

use App\Post;
use App\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$slug)
    {
        if(auth()->user() == null){
            Session::flash('type','danger');
            Session::flash('message','You are not registered user ..');
    
            return redirect()->route('post.single',$slug);
        }

        $validator = Validator::make($request->all(),[
            'content' => 'required'
        ]);

        if($validator->fails()){

            return redirect()->back()->withErrors($validator);
        }

        $post = Post::where('slug',$slug)->first();

        $replyExists = Reply::where(['post_id'=> $post->id,'content' => $request->content])->first();


        if($replyExists){
            Session::flash('type','danger');
            Session::flash('message','Reply Already exists');
    
            return redirect()->route('post.single',$slug);
        }


        
        $reply = Reply::create([
            'content' => $request->content,
            'post_id' => $post->id,
            'user_id' => auth()->user()->id,
            'reply_id' => null
        ]);

        
        return redirect()->route('post.single',$slug);

    }



    public function replyStore(Request $request,$slug,$id)
    {

        if(auth()->user() == null){
            Session::flash('type','danger');
            Session::flash('message','You are not registered user ..');
    
            return redirect()->route('post.single',$slug);
        }

        $validator = Validator::make($request->all(),[
            'content' => 'required'
        ]);

        if($validator->fails()){

            return redirect()->back()->withErrors($validator);
        }


        $replyExists = Reply::where(['id'=> $id,'content' => $request->content])->first();
        
        $post = Post::where('slug',$slug)->first();


        if($replyExists){
            Session::flash('type','danger');
            Session::flash('message','Reply Already exists');
    
            return redirect()->route('post.single',$slug);
        }


        
        $reply = Reply::create([
            'content' => $request->content,
            'post_id' => $post->id,
            'user_id' => auth()->user()->id,
            'reply_id' => $id
        ]);

        
        return redirect()->route('post.single',$slug);

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function show(Reply $reply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function edit(Reply $reply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reply $reply)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reply $reply)
    {
        //
    }
}
