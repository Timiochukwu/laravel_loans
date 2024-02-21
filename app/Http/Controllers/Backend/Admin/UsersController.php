<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function allUsers(){

        $users = User::latest()->get();
        return view("admin.users.all_users", compact("users"));
    }
    public function deleteUser(User $user){
        $user->delete();
        toastr()->success("User deleted succesfully!","Congrats");
        return redirect()->back();
    }

    public function userDetails($id){
        $user = User::findOrFail($id);
        return view('admin.users.user_details', compact('user'));
    }

    public function toggleRole(Request $request, $id){
        $user = User::findOrFail($id);
        $user->role = ($request->has('role')) ? 'admin' : 'user';
        $user->save();
        toastr()->success("User Role Updated Succesfully!","Congrats");
        return redirect()->back();

    }
    public function toggleStatus(Request $request, $id){
        $user = User::findOrFail($id);
        $user->status = ($request->has("status")) ? 'active' :"inactive";
        $user->save();
        toastr()->success("User Status Updated Succesfully!","Congrats");
        return redirect()->back();
}



}