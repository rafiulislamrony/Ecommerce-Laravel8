<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminProfileController extends Controller
{
    public function AdminProfile()
    {
        $adminData = Admin::find(1);
        return view('admin.admin_profile_view', compact('adminData'));
    }

    public function AdminProfileEdit()
    {
        $editData = Admin::find(1);
        return view('admin.admin_profile_edit', compact('editData'));
    }

    public function AdminProfileStore(Request $request)
    {
        $data = Admin::find(1);
        $data->name = $request->name;
        $data->email = $request->email;

        if($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');

            // Unlink the previous image file if it exists
            if($data->profile_photo_path && file_exists(public_path('upload/admin_images/' . $data->profile_photo_path))) {
                @unlink(public_path('upload/admin_images/' . $data->profile_photo_path));
            }

            $filename = date('YmdHi').$file->getClientOriginalExtension();
            $file->move(public_path('upload/admin_images'), $filename);
            $data->profile_photo_path = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.profile')->with($notification);
    }

    public function AdminChangePassword()
    {
        return view('admin.admin_change_password');
    }

    public function AdminUpdateChangePassword(Request $request)
    {

        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ],[
            'password.confirmed' => 'The password confirmation does not match.',
        ]);

        $hashedPassword = Admin::find(1)->password;

        if(Hash::check($request->oldpassword, $hashedPassword)) {
            $admin = Admin::find(1);
            $admin->password = Hash::make(trim($request->password));
            $admin->save();
            Auth::logout();
            return redirect()->route('admin.logout');
        }else {
            $notification = array(
                'message' => 'Old Password is Incorrect!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function AllUsers(){
        $users = User::latest()->get();
        return view('backend.user.all_user', compact('users'));

    }


}
