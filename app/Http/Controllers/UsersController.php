<?php

namespace App\Http\Controllers;

use Session;
use App\User;
use App\Setting;
use App\Profile;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index')
                   ->with('users', User::all())
                   ->with('settings', Setting::first());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create')->with('settings', Setting::first());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('password'),
        ]);

        Profile::create([
            'user_id' => $user->id,
        ]);

        Session::flash('success', 'New User Created.');

        return redirect()->back();


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.users.show')
                   ->with('user', User::find($id))
                   ->with('settings', Setting::first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.users.edit')
                   ->with('user', User::find($id))
                   ->with('settings', Setting::first());
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
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'about' => 'nullable|string',
            'facebook' => 'nullable|url',
            'youtube' => 'nullable|url',
            'avatar' => 'nullable|image',
        ]);
        //

        $user = User::find($id);

        if($request->hasFile('avatar'))
        {
            $pic = $request->avatar;
            $pic_name = time().'.'.$pic->extension();
            $pic->move('uploads/avatars', $pic_name);
            $user->profile->avatar = 'uploads/avatars/'.$pic_name;
            $user->profile->save();
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->profile->about = $request->about;
        $user->profile->facebook = $request->facebook;
        $user->profile->youtube = $request->youtube;

        $user->save();
        $user->profile->save();

        Session::flash('success', 'User info Updated.');

        return redirect()->route('users');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $pic = $user->profile->avatar;

        if( !empty($pic) && $pic != 'uploads/avatars/avatar.png'){
            unlink($pic);
        }

        $user->profile->delete();
        $user->delete();

        Session::flash('success', 'User info deleted.');

        return redirect()->back();
    }

    public function admin($id)
    {
        $user = User::find($id);
        $user->admin = 1;
        $user->save();

        Session::flash('success', 'User permission changed successfully.');

        return redirect()->back();
    }

    public function not_admin($id)
    {
        $user = User::find($id);
        $user->admin = 0;
        $user->save();

        Session::flash('success', 'User permission changed successfully.');

        return redirect()->back();
    }
}
