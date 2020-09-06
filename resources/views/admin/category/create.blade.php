@extends('layouts.backend')
@section('content')
@section('title','create Category')
@push('css')

@endpush
<div class="col-md-12 admin-part pd0">
  <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-home"></i></a></li>
      <li><a href="#">@yield('title')</a></li>
    </ol>
    <form class="form-horizontal" action="{{route('categorie.store')}}" method="post" enctype="multipart/form-data">
      @csrf
    <div class="col-md-12">
        <div class="panel panel-primary">
              <div class="panel-heading">
                  <div class="col-md-9 heading_title">
                      Add Category
                   </div>
                   <div class="col-md-3 text-right">
                    <a href="{{url('inventory/category/manage')}}" class="btn btn-sm btn btn-primary"><i class="fa fa-th"></i> All Information</a>
                  </div>
                  <div class="clearfix"></div>
              </div>
            <div class="panel-body">
              <div class="col-sm-12">
                <div class="row clearfix">
                     <div class="col-sm-4 col-md-6">
                       <label>Categorie_Name</label>
                         <div class="form-group">
                             <div class="form-line">
                               @if($errors->has('category'))
                                <span class="btn btn-danger">{{$errors->first('category')}}</span>
                               @endif
                                 <input type="text" name="category" class="form-control" placeholder="Category Name" />
                             </div>
                         </div>
                     </div>
                     <!-- <div class="col-sm-4 col-md-6"> -->
                       <div class="col-sm-6">
                         <label>Publication_Status</label>
                                   <select class="form-control show-tick" name="status">
                                       <option value="">--Select Status--</option>
                                       <option value="1">Active</option>
                                       <option value="2">inactive</option>
                                   </select>
                               </div>
                     </div>
                 </div>
              </div>
      </div>

          <div class="panel-footer text-center">
            <button class="btn btn-sm btn-primary">REGISTRATION</button>
          </div>
        </div>
      </div><!--col-md-12 end-->
    </form>
</div><!--admin-part end-->
</div><!--row end-->
</div><!--container-fluid end-->
  @endsection
@push('js')

@endpush
