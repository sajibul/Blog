@extends('layouts.backend')
@section('title','Settings')
@push('css')

@endpush
@section('content')
 <div class="container-fluid">
   <div class="block-header">
               <h2>TABS</h2>
           </div>
           <!-- Example Tab -->
           <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                   <div class="card">
                       <div class="header">
                           <h2>
                               User Inormation
                           </h2>
                       </div>
                       <div class="body">
                           <!-- Nav tabs -->
                           <ul class="nav nav-tabs tab-nav-right" role="tablist">
                               <li role="presentation" class="active"><a href="#profile" data-toggle="tab">Update Profile</a></li>
                               <li role="presentation"><a href="#password" data-toggle="tab">Password</a></li>
                           </ul>

                           <!-- Tab panes -->
                           <div class="tab-content">
                               <div role="tabpanel" class="tab-pane fade in active" id="profile">
                                   <b>Profile</b>
                            <form action="{{route('setting.profile')}}" method="post" enctype="multipart/form-data">
                              @csrf
                              @method('PUT')
                             <div class="row clearfix">
                                 <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                     <label for="name">Name</label>
                                 </div>
                                 <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                     <div class="form-group">
                                         <div class="form-line">
                                             <input type="text" name="name" class="form-control" value="{{Auth::user()->name}}">
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                     <label for="UserName">UserName</label>
                                 </div>
                                 <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                     <div class="form-group">
                                         <div class="form-line">
                                             <input type="text" name="username" class="form-control" value="{{Auth::user()->username}}">
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                     <label for="user_about">user_about</label>
                                 </div>
                                 <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                     <div class="form-group">
                                         <div class="form-line">
                                             <!-- <input type="text" id="user_about" class="form-control" value=""> -->
                                             <textarea class="form-control" name="user_about" rows="8" cols="80">{{Auth::user()->user_about}}</textarea>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="row clearfix">
                                 <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                     <label for="image_2">Image</label>
                                 </div>
                                 <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                     <div class="form-group">
                                         <div class="form-line">
                                             <input type="file" id="image_2" name="user_picture" class="form-control" placeholder="Enter your Image">
                                            <img src="{{asset('storage/profile/'.Auth::user()->user_picture)}}" alt="" style="width:100px">
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="row clearfix">
                                 <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                     <button type="submit" class="btn btn-primary m-t-15 waves-effect">update</button>
                                 </div>
                             </div>
                         </form>
                               </div>
                               <div role="tabpanel" class="tab-pane fade" id="password">
                                   <b>Password</b>
                                <form action="{{route('setting.password')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    @csrf
                                    @method('PUT')
                                <div class="row clearfix">
                                   <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                       <label for="old password">Old Password : </label>
                                   </div>
                                   <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                       <div class="form-group">
                                           <div class="form-line">
                                               <input type="password" name="old_password" id="old-password" class="form-control" placeholder="Enter your old password">
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <div class="row clearfix">
                                   <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                       <label for="password_2">New Password : </label>
                                   </div>
                                   <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                       <div class="form-group">
                                           <div class="form-line">
                                               <input type="password" name="password" id="password_2" class="form-control" placeholder="Enter your new password">
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <div class="row clearfix">
                                   <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                       <label for="password_2">Confirm Password : </label>
                                   </div>
                                   <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                       <div class="form-group">
                                           <div class="form-line">
                                               <input type="password" name="password_confirmation" id="confirm-password" class="form-control" placeholder="Enter your confirm password">
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <div class="row clearfix">
                                   <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                       <button type="submit" class="btn btn-primary m-t-15 waves-effect">update</button>
                                   </div>
                               </div>
                           </form>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           <!-- #END# Example Tab -->
 </div>
@endsection
@push('js')

@endpush
