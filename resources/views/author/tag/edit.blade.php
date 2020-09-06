@extends('layouts.backend')
@section('content')
@section('title','Edit Tag')
@push('css')

@endpush
<div class="col-md-12 admin-part pd0">
  <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-home"></i></a></li>
      <li><a href="#">@yield('title')</a></li>
    </ol>
    <form class="form-horizontal" action="{{route('tag.update',$tag->tag_id)}}" method="post" enctype="multipart/form-data">
      @csrf
      @method('PUT')
    <div class="col-md-12">
        <div class="panel panel-primary">
              <div class="panel-heading">
                  <div class="col-md-9 heading_title">
                      Update Tag
                   </div>
                   <div class="col-md-3 text-right">
                    <a href="{{route('tag.index')}}" class="btn btn-sm btn btn-primary"><i class="fa fa-th"></i> All Information</a>
                  </div>
                  <div class="clearfix"></div>
              </div>
            <div class="panel-body">
              <div class="col-sm-12">
                <div class="row clearfix">
                     <div class="col-sm-4 col-md-6">
                       <label>Tag_Name</label>
                         <div class="form-group">
                             <div class="form-line">
                               @if($errors->has('tag'))
                                <span class="btn btn-danger">{{$errors->first('tag')}}</span>
                               @endif
                                 <input type="hidden" name="id" class="form-control" value="{{$tag->tag_id}}" />
                                 <input type="text" name="tag" class="form-control" value="{{$tag->tag_name}}" />
                             </div>
                         </div>
                     </div>
                     </div>
                 </div>
              </div>
      </div>

          <div class="panel-footer text-center">
            <button class="btn btn-sm btn-primary">update</button>
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
