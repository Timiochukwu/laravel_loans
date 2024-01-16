<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function index()
    {
        return view('user.dashboard');
    }
    public function profile()
    {
        return view('user.profile.view');
    }
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:100'],
            'phone' => ['required', 'max:100'],
            'email' => ['required', 'max:100'],
            'image' => ['image', 'max:2048'],
        ]);
        $user = Auth::user();

        if($request->hasFile('image')){
            if(File::exists(public_path($user->image))){
                File::delete(public_path($user->image));
            }
            $image = $request->image;
            $imageName = rand().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('upload'), $imageName);
            $path = '/upload/' .$imageName;

            $user->image = $path;
        }
        $user->Name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->save();

        return redirect()->back();
    }
    public function updatePassword()
    {
        return view('user.password.view');
    }

    public function storePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password'=> ['required', 'confirmed', 'min:8']
        ]);
        $request->user()->update([
            'password' => bcrypt($request->password)
        ]);
        //set a success toast, with a title
        // toastr()->success('Password has been updated succesfully!', 'Congrats');
        return redirect()->back();

    }
}
