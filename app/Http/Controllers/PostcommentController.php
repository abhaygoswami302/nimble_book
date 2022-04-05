<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Postcomment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostcommentController extends Controller
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
    public function store(Request $request)
    {
        $username = User::where('id', '=', $request->user_id)->first();
        Postcomment::create(array_merge($request->all() , ['username' => $username->name] ));

        $comments = Postcomment::where('post_id', '=', $request->post_id)->get();

        $notification = new Notification();
        $notification->user_id = $request->user_id;
        $notification->message = ucfirst(Auth::user()->name) . " Commented on your post. ";
        $notification->post_id =  $request->post_id;
        $notification->save();

        return redirect()->route('post.show', $request->post_id)
                ->with(['success'=> 'New Comment Inserted Successfully', 'comments' => $comments]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Postcomment  $postcomment
     * @return \Illuminate\Http\Response
     */
    public function show(Postcomment $postcomment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Postcomment  $postcomment
     * @return \Illuminate\Http\Response
     */
    public function edit(Postcomment $postcomment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Postcomment  $postcomment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Postcomment $postcomment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Postcomment  $postcomment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Postcomment $postcomment)
    {
        //
    }
}
