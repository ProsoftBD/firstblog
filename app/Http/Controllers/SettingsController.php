<?php

namespace App\Http\Controllers;

use Session;
use App\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return view('admin.settings.settings')->with('settings', Setting::first());
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'favicon'=>'nullable|image|max:500',
            'site_name' => 'required|string|max:255',
            'site_about' => 'required|string|max:255',
            'contact_number' => 'required|max:11|regex:/(01)[0-9]{9}/',
            'contact_email' => 'required|email|max:155',
            'available_time' => 'required|string|max:255',
            'street_address' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);


        $s = Setting::first();
        // $s->favicon = $request->favicon;
        if ($request->hasFile('favicon')) {

            if($s->favicon != "uploads/favicon/favicon.ico"){
                unlink($s->favicon);
            }

            $newFavicon = $request->favicon;
            $faviocnName = time(). '.'. $newFavicon->extension();
            $newFavicon->move('uploads/favicon/', $faviocnName);
            $s->favicon = 'uploads/favicon/'.$faviocnName;
            $s->save();
        }
        $s->site_name = $request->site_name;
        $s->site_about = $request->site_about;
        $s->contact_email = $request->contact_email;
        $s->contact_number = $request->contact_number;
        $s->available_time = $request->available_time;
        $s->street_address = $request->street_address;
        $s->address = $request->address;

        $s->save();

        Session::flash('success', 'Settings Updated !');

        return redirect()->back();

    }
}
