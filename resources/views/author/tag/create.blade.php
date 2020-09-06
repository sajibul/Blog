@extends('layouts.inventory')
@section('invento')
@section('title','create Customer')
@push('css')

@endpush
<div class="col-md-12 admin-part pd0">
  <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-home"></i></a></li>
      <li><a href="#">@yield('title')</a></li>
    </ol>
    <form class="form-horizontal" action="{{url('inventory/customer/info/store')}}" method="post" enctype="multipart/form-data">
      @csrf
    <div class="col-md-12">
        <div class="panel panel-primary">
              <div class="panel-heading">
                  <div class="col-md-9 heading_title">
                      Add Customer
                   </div>
                   <div class="col-md-3 text-right">
                    <a href="{{url('inventory/customer/info/manage')}}" class="btn btn-sm btn btn-primary"><i class="fa fa-th"></i> All Information</a>
                  </div>
                  <div class="clearfix"></div>
              </div>
            <div class="panel-body">
              <div class="col-sm-12">
                <div class="row clearfix">
                     <div class="col-sm-4 col-md-6">
                       <label>Supplier ID</label>
                         <div class="form-group">
                             <div class="form-line">
                               @if($errors->has('supplierid'))
                                <span class="btn btn-danger">{{$errors->first('supplierid')}}</span>
                               @endif
                                 <input type="text" name="supplierid" class="form-control" placeholder="Supplier Id" />
                             </div>
                         </div>
                     </div>
                        <div class="col-sm-4 col-md-6">
                          <label>Customer_Name</label>
                            <div class="form-group">
                                <div class="form-line">
                                  @if($errors->has('customer'))
                                   <span class="btn btn-danger">{{$errors->first('customer')}}</span>
                                  @endif
                                    <input type="text" name="customer" class="form-control" placeholder="Customer Name" />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-6">
                          <label>Customer_Address</label>
                            <div class="form-group">
                                <div class="form-line">
                                  @if($errors->has('address'))
                                   <span class="btn btn-danger">{{$errors->first('address')}}</span>
                                  @endif
                                    <input type="text" name="address" class="form-control" placeholder="Customer Address" />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-6">
                          <label>Customer Phone One</label>
                            <div class="form-group">
                                <div class="form-line">
                                  @if($errors->has('phoneone'))
                                   <span class="btn btn-danger">{{$errors->first('phoneone')}}</span>
                                  @endif
                                    <input type="text" name="phoneone" class="form-control" placeholder="Phone One" />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-6">
                          <label>Customer Phone Two</label>
                            <div class="form-group">
                                <div class="form-line">
                                  @if($errors->has('phonetwo'))
                                   <span class="btn btn-danger">{{$errors->first('phonetwo')}}</span>
                                  @endif
                                    <input type="text" name="phonetwo" class="form-control" placeholder="Phone Two" />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-6">
                          <label>Customer Email</label>
                            <div class="form-group">
                                <div class="form-line">
                                  @if($errors->has('email'))
                                   <span class="btn btn-danger">{{$errors->first('email')}}</span>
                                  @endif
                                    <input type="text" name="email" class="form-control" placeholder="Eamil Address" />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-6">
                          <label>Status</label>
                            @if($errors->has('status'))
                             <span class="btn btn-danger">{{$errors->first('status')}}</span>
                            @endif
                           <div class="demo-checkbox">
                                 <input type="checkbox" name="status" id="basic_checkbox_2" class="filled-in"/>
                                 <label for="basic_checkbox_2">Check Status</label>
                           </div>
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
