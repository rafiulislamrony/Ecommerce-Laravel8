<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Auth;
use App\Models\User;

class IndexController extends Controller
{
    public function index(){
        return view('frontend.index');
    }
    public function UserLogout(){
        Auth::logout();
        return Redirect()->route('login');
    }
    public function UserProfile(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.user_profile', compact('user'));
    }
    public function UserProfileStore(Request $request){
        $data = User::findOrFail(Auth::user()->id);

        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');

            // Unlink the previous image file if it exists
            if($data->profile_photo_path && file_exists(public_path('upload/user_images/' . $data->profile_photo_path))) {
                @unlink(public_path('upload/user_images/' . $data->profile_photo_path));
            }

            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/user_images'), $filename);
            $data->profile_photo_path = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'User Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route('dashboard')->with($notification);
    }
}
