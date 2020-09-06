@extends('layouts.backend')
@section('content')
@section('title','Post')
@push('css')

@endpush
<div class="row clearfix">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                 <ol class="breadcrumb">
                     <li><a href="#"><i class="fa fa-home"></i></a></li>
                     <li><a href="#">@yield('title')</a></li>
                   </ol>
                   <div class="card">
                       <div class="header">
                         <div class="panel-heading">
                            <div class="col-md-9 heading_title">
                                <h2>Pending Post Information  <span class="btn btn-success">{{$postInfo->count()}}</span> </h2>
                             </div>
                             <div class="col-md-3 text-right">
                             	<!-- <a href="{{route('post.create')}}" class="btn btn-sm btn btn-primary"><i class="fa fa-plus-circle"></i> Add Information</a> -->
                            </div>
                            <div class="clearfix"></div>
                        </div>
                       </div>
                       <div class="body">
                         <div class="float-right">
                           <a href="#" class="btn btn-primary ">Print</a>
                           <a href="#" class="btn btn-primary float-right">Excel</a>
                           <hr>
                         </div>
                           <div class="table-responsive">
                               <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                   <thead>
                                       <tr>
                                           <th>Id</th>
                                           <th>Tittle</th>
                                           <th>Author</th>
                                           <th>views</th>
                                           <th>Image</th>
                                           <th>Is_Approve</th>
                                           <th>Status</th>
                                           <th>Create_at</th>
                                           <th>Action</th>
                                       </tr>
                                   </thead>
                                   <tfoot>
                                       <tr>
                                         <th>Id</th>
                                         <th>Tittle</th>
                                         <th>Author</th>
                                         <th>views</th>
                                         <th>Image</th>
                                         <th>Is_Approve</th>
                                         <th>Status</th>
                                         <th>Create_at</th>
                                         <th>Action</th>
                                       </tr>
                                   </tfoot>
                                   <tbody>
                                     @foreach($postInfo as $allpost)
                                       <tr>
                                           <td>{{$allpost->id}}</td>
                                           <td>{{Str::limit($allpost->post_tittle,20)}}</td>
                                           <td>{{$allpost->user()->first()->name}}</td>
                                           <td>{{$allpost->post_views}}</td>
                                           <td><img src="{{asset('storage/postimage/'.$allpost->post_image)}}" alt="" style="width:100px"></td>
                                           <td>
                                             @if($allpost->is_approve==1)
                                                <button type="button" class="btn btn-success" name="button" onclick="post({{$allpost->id}})">Approve</button>
                                                <form id="post-{{$allpost->id}}" action="{{url('admin/post/pending/'.$allpost->id)}}" method="post">
                                                  @csrf
                                                  @method('PUT')
                                                </form>
                                              @else
                                              <button type="button"  class="btn btn-danger" name="button" onclick="post({{$allpost->id}})">Pending</button>
                                                <form id="post-{{$allpost->id}}" action="{{url('admin/post/approved/'.$allpost->id)}}" method="post">
                                                  @csrf
                                                  @method('PUT')
                                                </form>
                                              @endif
                                            </td>
                                           <td>
                                           @if($allpost->post_status==1)
                                              <a href="#" class="btn btn-success">Published</a>
                                            @else
                                            <a href="#" class="btn btn-danger">Pending</a>
                                            @endif
                                           </td>
                                           <td>{{$allpost->created_at}}</td>
                                           <td>
                                             <a href="{{url('admin/post/'.$allpost->id)}}"><i class="fa fa-plus-square fa-lg"></i></a>
                                             <a href="{{url('admin/post/'.$allpost->id.'/edit')}}"><i class="fa fa-pencil-square fa-lg"></i></a>
                                             <button type="button" name="button" onclick="post({{$allpost->id}})"><i class="fa fa-trash fa-lg"></i></button>
                                             <form id="post-{{$allpost->id}}" action="{{url('admin/post/'.$allpost->id)}}" method="post">
                                               @csrf
                                               @method('Delete')
                                             </form>
                                           </td>
                                       </tr>
                                       @endforeach
                                   </tbody>
                               </table>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
@endsection
@push('js')
   <script type="text/javascript">
          function post(id) {
            const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false,
})

swalWithBootstrapButtons.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes, delete it!',
  cancelButtonText: 'No, cancel!',
  reverseButtons: true
}).then((result) => {
  if (result.value) {
    event.preventDefault();
    document.getElementById('post-'+id).submit();
  } else if (
    // Read more about handling dismissals
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire(
      'Cancelled',
      'Your imaginary file is safe :)',
      'error'
    )
  }
})
          }
   </script>
@endpush
