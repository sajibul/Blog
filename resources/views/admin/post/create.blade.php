@extends('layouts.backend')
@section('content')
@section('title','create post')
@push('css')
<link href="{{asset('backend')}}/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet">
<!-- Multi Select Css -->
    <!-- <link href="{{asset('backend')}}/plugins/multi-select/css/multi-select.css" rel="stylesheet"> -->
@endpush
  <div class="container-fluid">
    <form class="" action="{{url('admin/post')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="row clearfix">
        <div class="col-md-12 col-sm-12 col-xs-12 col-offset-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
                  <div class="col-md-9 heading_title">
                      <h4>Add Post</h4>
                   </div>
                   <div class="col-md-3 text-right">
                    <a href="{{url('admin/post')}}" class="btn btn-sm btn btn-primary"><i class="fa fa-th"></i> All Information</a>
                  </div>
                  <div class="clearfix"></div>
              </div>
            </div>
        </div>
      </div>
      <div class="row clearfix">
        <div class="col-md-8 col-sm-4">
          <div class="card">
            <div class="header">
              <strong>Add New Post</strong>
            </div>

            <div class="body">
              <div class="form-group form-float">
                <div class="form-line">
                  <label for="" class="form-level">Tittle</label>
                  @if($errors->has('tittle'))
                   <span class="btn btn-danger">{{$errors->first('tittle')}}</span>
                  @endif
                    <input type="text" name="tittle" value="" class="form-control">
                </div>
              </div>
              <div class="form-group form-float">
                <div class="form-line">
                  @if($errors->has('picture'))
                   <span class="btn btn-danger">{{$errors->first('picture')}}</span>
                  @endif
                    <input type="file" name="picture" value="" class="form-control">
                    <label for="picture" class="form-level">Image</label>
                </div>
              </div>
              <div class="form-group">
                @if($errors->has('status'))
                 <span class="btn btn-danger">{{$errors->first('status')}}</span>
                @endif
                  <input type="checkbox" id="publish" name="status" class="filled-in" value="1">
                  <label for="publish">Status</label>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-4 col-sm-6">
          <div class="card">
            <div class="header">
              <strong>Select Category && Tag</strong>
            </div>
            <div class="body">
                  <div class="form-group form-float">
                    <div class="form-line  {{ $errors->has('categorie') ? 'focused error' : ''}}">
                      <label for="">Select Category</label>
                      @if($errors->has('categorie'))
                       <span class="btn btn-danger">{{$errors->first('categorie')}}</span>
                      @endif
                      <select name="categorie[]" id="category" class="form-control show-tick" multiple>
                        @foreach($categoryinfo as $categores)
                        <option value="{{$categores->id}}">{{$categores->categorie_name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group form-float">
                    <div class="form-line {{$errors->has('tages') ? 'focused error' : ''}}">
                      <label for="">Select Tag</label>
                      @if($errors->has('tages'))
                       <span class="btn btn-danger">{{$errors->first('tages')}}</span>
                      @endif
                      <select name="tages[]" id="tag" class="form-control show-tick" multiple>
                        @foreach($taginfo as $tages)
                        <option value="{{$tages->id}}">{{$tages->tag_name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary" name="btnSave" value="save" >save</button>
                  <a href="{{route('post.index')}}" class="btn btn-danger">Back</a>
                  <hr>
            </div>
          </div>
        </div>
      </div>
      <div class="row clearfix">
        <div class="col-md-12 col-sm-12">
          <div class="card">
            <div class="header">
            <strong>Body</strong>
            </div>
            <div class="body">
              @if($errors->has('body'))
               <span class="btn btn-danger">{{$errors->first('body')}}</span>
              @endif
              <textarea name="body" rows="8" cols="80" class="form-control"></textarea>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
@endsection
@push('js')
<!-- Select Plugin Js -->
<script src="{{asset('backend')}}/plugins/bootstrap-select/js/bootstrap-select.js"></script>
<!-- Multi Select Plugin Js -->
    <!-- <script src="{{asset('backend')}}/plugins/multi-select/js/jquery.multi-select.js"></script> -->
@endpush
