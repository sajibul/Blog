@extends('layouts.backend')
@section('content')
@section('title','Subscriber')
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
                                <h2>Subscriber Information</h2>
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
                                           <th>Create_at</th>
                                           <th>Action</th>
                                       </tr>
                                   </thead>
                                   <tfoot>
                                       <tr>
                                         <th>Id</th>
                                         <th>Tittle</th>
                                         <th>Create_at</th>
                                         <th>Action</th>
                                       </tr>
                                   </tfoot>
                                   <tbody>
                                     @foreach($subscribe as $subscribeinfo)
                                       <tr>
                                           <td>{{$subscribeinfo->id}}</td>
                                           <td>{{$subscribeinfo->email}}</td>
                                           <td>{{$subscribeinfo->created_at}}</td>
                                           <td>
                                             <button type="button" name="button" onclick="subscribe({{$subscribeinfo->id}})"><i class="fa fa-trash fa-lg"></i></button>
                                             <form id="subscribe-{{$subscribeinfo->id}}" action="{{url('admin/subscribe/email/delete/'.$subscribeinfo->id)}}" method="post">
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
          function subscribe(id) {
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
    document.getElementById('subscribe-'+id).submit();
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
