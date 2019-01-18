<?php

namespace App\Http\Controllers;

use Auth;
use Image;
use Session;
use App\Profile;
use App\Setting;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.profiles.index')
                   ->with('user', Auth::user())
                   ->with('settings', Setting::first());
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('admin.profiles.edit')
                   ->with('user', Auth::user())
                   ->with('settings', Setting::first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'about' => 'nullable|string',
            'facebook' => 'nullable|url',
            'youtube' => 'nullable|url',
            'avatar' => 'nullable|image|max:2000'
        ]);

        $user = Auth::user();

        if($request->hasFile('avatar'))
        {
            $oldPic = $user->profile->avatar;
            if($oldPic != 'uploads/avatars/avatar.png')
            {
                unlink($oldPic);
            }
            $pic = $request->avatar;
            $pic_name = time().'.'.$pic->extension();
            $path = public_path('uploads/avatars/'.$pic_name);
            Image::make($pic)->resize(210,210)->save($path);
            $user->profile->avatar = 'uploads/avatars/'.$pic_name;
            $user->profile->save();
        }

        $user->name = $request->name;
        $user->profile->about = $request->about;
        $user->profile->facebook = $request->facebook;
        $user->profile->youtube = $request->youtube;

        $user->save();
        $user->profile->save();

        Session::flash('success', 'User info Updated.');

        return redirect()->route('profiles');

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
