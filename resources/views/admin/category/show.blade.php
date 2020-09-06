@extends('layouts.backend')
@section('content')
<a class="btn btn-danger wave-effect" href="{{url('admin/categorie')}}">Back</a>
<br>
<br>
<a href="#"></a>
<div class="row clearfix">
   <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
       <div class="card">
           <div class="header bg-green">
               <h2>
                 Categorie_Name
               </h2>
           </div>
           <div class="body">
                <span class="label bg-cyan"></span>
                  <h2>{{$categries->categorie_name}}</h2>
           </div>
       </div>
       <div class="card">
           <div class="header bg-red">
               <h2>
                  Category_image
               </h2>
           </div>
           <div class="body">
               <img src="{{asset('storage/category/banner/'.$categries->categorie_image)}}" alt="" style="height:100px">
             </div>
       </div>
   </div>
</div>
  @endsection
