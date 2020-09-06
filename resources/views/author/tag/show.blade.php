@extends('layouts.backend')
@section('content')
<a class="btn btn-danger wave-effect" href="{{route('tag.index')}}">Back</a>

<br>
<br>
<a href="#"></a>
<div class="row clearfix">
   <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
       <div class="card">
           <div class="header">
               <h2>
                  Tag Name
               </h2><strong></strong>
           </div>
           <div class="body">
              {{$tag->tag_name}}
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
                <span class="label bg-cyan"></span>

           </div>
       </div>
       <div class="card">
           <div class="header bg-red">
               <h2>
                 Shift Name
               </h2>
           </div>
           <div class="body">
              <span class="label bg-green"></span>

           </div>
       </div>
   </div>
</div>
  @endsection
