<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Post;
use App\Models\Profile;
use App\Models\profile_user;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = Profile::all();
        return view('profile.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Profile::create($request->all());
        return redirect()->route('profile.index')->with('success', 'New Profile Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile = Profile::where('id', '=', $id)->first();
    
        $users = User::all();
        $count = 0;
        foreach ($users as $key => $user) {
            $pivots = $user->profiles()->where('profile_id', '=', $profile->id)->get();
            foreach ($pivots as $key => $p) {
                $count++;
            }
        }

        $user = User::where('email', '=', $profile->email)->first();
        $photos = Photo::where('user_id', '=', $user->id)->get();
        $posts = Post::where('user_id', '=', $user->id)->get();

        return view('profile.show', compact('profile', 'count', 'photos', 'posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = Profile::where('id', '=', $id)->first();
        return view('profile.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $profile = Profile::where('id', '=', $id)->first();

        $profile->name = $request->name;
        $profile->address = $request->address;
        $profile->designation = $request->designation;
        $profile->education = $request->education;
        $profile->description = $request->description;
        $profile->save();

        return redirect()->route('profile.show', $profile->id)->with('success', 'Profile Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
