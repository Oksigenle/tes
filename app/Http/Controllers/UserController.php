<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function profile()
    {
        return view('profile', array('user' => Auth::user()));
    
    }

    public function update_avatar(Request $request)
    {
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time().'.'. $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300,300)->save( public_path('uploads/avatars/'.$filename) );

            $user = Auth::user();
            $user->avatar = $filename;
            $user->tanggal_lahir = $request->get('tanggal_lahir');
            $user->agama = $request->get('agama');
            $user->save();
        }

        return view('profile', array('user' => Auth::user()));
    }

    public function biodata()
    {
        return view('biodata');
    }
    public function Update_biodata(Request $request)
    {
        $request->validate([
            'tanggal_lahir'=>'required',
          ]);

        $user = Auth::user();
        $user->tanggal_lahir = $request->get('tanggal_lahir');
        $user->agama = $request->get('agama');
        $user->phone = $request->get('phone');

        $user->save();

        return view('profile', array('user' => Auth::user()));
    }
}
