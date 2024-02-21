<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function index()
    {
        return view("admin.dashboard");
    }
    public function profile()
    {
        return view("admin.profile.view");
    }
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:100'],
            'phone' => ['required', 'max:100'],
            'image' => ['image', 'max:2048']
        ]);
        $user = Auth::user();

        if ($request->hasFile('image')) {
            if (File::exists(public_path($user->image))) {
                File::delete(public_path($user->image));
            }
            $image = $request->image;
            $imageName = rand() . '_' . $image->getClientOriginalName();
            $image->move(public_path('upload'), $imageName);

            $path = '/upload/' . $imageName;

            $user->image = $path;
        }
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->save();

        toastr()->success('Profile has been updated succesfully!', 'Congrats');
        return redirect()->back();
    }

    public function updatePassword()
    {
        return view('admin.password.view');

    }

    
    public function storePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', 'min:8']
        ]);

        $request->user()->update([
            'password' => bcrypt($request->password)
        ]);
        //set a success toast, with a title
        toastr()->success('Password has been updated succesfully!', 'Congrats');
        return redirect()->back();

    }

    
}
