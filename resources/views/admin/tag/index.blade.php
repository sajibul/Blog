@extends('layouts.backend')
@section('content')
@section('title','Tag Information')
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
                                <h2>Tag Information</h2>
                             </div>
                             <div class="col-md-3 text-right">
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                <i class="fa fa-plus-circle"></i> Add Information</a>
                              </button>
                              <!-- Modal -->
                              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Add Tag</h5>
                                      <hr>
                                    </div>
                                    <div class="modal-body">
                                      <form class="form-horizontal" action="{{route('tag.store')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                                <div class="col-md-12 col-sm-12">
                                                  <div class="row clearfix">
                                                       <div class="col-md-6 col-sm-6">
                                                         <div class="col-sm-2">
                                                           <label class="col-md-3 text-right">Tag_Name</label>
                                                         </div>
                                                           <div class="form-group">
                                                               <div class="form-line">
                                                                 @if($errors->has('tag'))
                                                                  <span class="btn btn-danger">{{$errors->first('tag')}}</span>
                                                                 @endif
                                                                   <input type="text" name="tag" class="form-control" placeholder="Tag Name" />
                                                               </div>
                                                           </div>
                                                       </div>
                                                       </div>
                                                   </div>
                                    </div>
                                    <hr>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-primary">submit</button>
                                    </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                       </div>
                       <div class="body">
                           <div class="table-responsive">
                               <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                   <thead>
                                       <tr>
                                           <th>Tag Id</th>
                                           <th>Tag Name</th>
                                           <th>Action</th>
                                       </tr>
                                   </thead>
                                   <tfoot>
                                       <tr>
                                         <th>Tag Id</th>
                                         <th>Tag Name</th>
                                         <th>Action</th>
                                       </tr>
                                   </tfoot>
                                   <tbody>
                                     @foreach($taginfo as $tag)
                                       <tr>
                                           <td>{{$tag->id}}</td>
                                           <td>{{$tag->tag_name}}</td>
                                           <td>
                                             <a href="{{route('tag.edit',$tag->id)}}"><i class="fa fa-pencil-square fa-lg"></i></a>
                                             <button type="button" name="button" onclick="Tag({{$tag->id}})"><i class="fa fa-trash fa-lg"></i></button>
                                             <form id="tag-{{$tag->id}}" action="{{route('tag.destroy',$tag->id)}}" method="post">
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
          function Tag(tag_id) {
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
    document.getElementById('tag-'+tag_id).submit();
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
