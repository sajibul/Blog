@extends('layouts.backend')
@section('content')
<a class="btn btn-danger wave-effect" href="{{url('admin/batch/info/manage')}}">Back</a>
<div class="col-sm-4 col-md-6">
  <label>Status</label>
    @if($errors->has('status'))
     <span class="btn btn-danger">{{$errors->first('status')}}</span>
    @endif
   <div class="demo-checkbox">
         <input type="checkbox" name="status" id="basic_checkbox_2" class="filled-in"  {{$categries->publication_status==1 ? 'checked' : '' }}  />
         <label for="basic_checkbox_2">Filled In</label>
   </div>
</div>
<br>
<br>
<a href="#"></a>
<div class="row clearfix">
   <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
       <div class="card">
           <div class="header">
               <h2>
                  Batch Name
               </h2><strong></strong>
           </div>
           <div class="body">
              {{$batchinfo->batche_name}}
             </div>
           </div>
       </div>
   <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
       <div class="card">
           <div class="header bg-green">
               <h2>
                 Class Name
               </h2>
           </div>
           <div class="body">
                <span class="label bg-cyan">{{$classinfo->first()->class_name}}</span>

           </div>
       </div>
       <div class="card">
           <div class="header bg-red">
               <h2>
                 Shift Name
               </h2>
           </div>
           <div class="body">
              <span class="label bg-green">{{$shiftinfo->first()->shift_name}}</span>

           </div>
       </div>
   </div>
</div>
  @endsection
