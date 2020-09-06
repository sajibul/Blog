<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\User;
use Storage;
use Image;
use Auth;
use Hash;
class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
       // echo "setting";
         return view('author.settings.settings');
     }

     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
         //
     }

     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function profile(Request $request)
     {
         $this->validate($request,[

         ],[

         ]);

         $user=User::findOrFail(Auth::id());
         $image=$request->file('user_picture');

           if(isset($image)){

             $imageName='author_user_image_'.uniqid().'-'.time().'.'.$image->getClientOriginalExtension();

             if(!Storage::disk('public')->exists('profile')){
                 Storage::disk('public')->makeDirectory('profile');
             }
             if(Storage::disk('public')->exists('profile/'.$user->user_picture)){
                 Storage::disk('public')->delete('profile/'.$user->user_picture);
             }
             Image::make($image)->resize(500,500)->save(public_path('storage/profile/'.$imageName));
           }else{
             $imageName=$user->user_picture;
           }

           $user->name=$request->name;
           $user->username=$request->username;
           $user->user_about=$request->user_about;
           $user->user_picture=$imageName;
           $user->save();
           Toastr::info('Success', 'User information update success');
           return back();
     }

     /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function password(Request $request)
     {
       $this->validate($request,[
         'old_password'=>'required',
         'password'=>'required|confirmed',
       ],[

       ]);


       $haspassword=Auth::user()->password;
       if(Hash::check($request->old_password,$haspassword)){

          if(!Hash::check($request->password,$haspassword)){
             $user=User::findOrFail(Auth::id());
             $user->password=Hash::make($request->password);
             $user->save();
             Toastr::info('Success', 'User password update success');
             Auth::logout();
             return back();
          }else {
            Toastr::Error('Error', 'New password can not be same as old password','Error');
            return back();
          }
       }else {
         Toastr::danger('Error', 'Current password does not match');
         return back();
       }
         // $user=User::findOrFail(Auth::id());

     }

    
    public function destroy($id)
    {
        //
    }
}
