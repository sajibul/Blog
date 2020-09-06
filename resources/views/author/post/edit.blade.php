@extends('layouts.backend')
@section('content')
@section('title','Edit post')
@push('css')
<link href="{{asset('backend')}}/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet">
<!-- Multi Select Css -->
    <!-- <link href="{{asset('backend')}}/plugins/multi-select/css/multi-select.css" rel="stylesheet"> -->
@endpush
  <div class="container-fluid">
    <form class="" action="{{route('post.update',$postInfo->id)}}" method="post" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="row clearfix">
        <div class="col-md-12 col-sm-12 col-xs-12 col-offset-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
                  <div class="col-md-9 heading_title">
                      <h4>Edit Post</h4>
                   </div>
                   <div class="col-md-3 text-right">
                    <a href="{{route('post.index')}}" class="btn btn-sm btn btn-primary"><i class="fa fa-th"></i> All Information</a>
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
              <strong>Edit New Post</strong>
            </div>

            <div class="body">
              <div class="form-group form-float">
                <div class="form-line">
                  <label for="" class="form-level">Tittle</label>
                    <input type="hidden" name="id" value="{{$postInfo->id}}" class="form-control">
                    <input type="text" name="tittle" value="{{$postInfo->post_tittle}}" class="form-control">
                </div>
              </div>
              <div class="form-group form-float">
                <div class="form-line  {{$errors->has('picture') ? 'focused error' : ''}}">
                    <input type="file" name="picture" value="" class="form-control">
                    <label for="picture" class="form-level">Image</label>
                    <img src="{{asset('storage/postimage/'.$postInfo->post_image)}}" alt="" style="width:100px">
                </div>
              </div>
              <div class="form-group">
                  <input type="checkbox" id="publish" name="status" class="filled-in" value="1" {{$postInfo->post_status==1 ? 'checked' : ''}}>
                  <label for="publish">Status</label>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-4 col-sm-6">
          <div class="card">
            <div class="header">
              <strong>Category && Tag</strong>
            </div>
            <div class="body">
                  <div class="form-group form-float">
                    <div class="form-line {{$errors->has('categorie') ? 'focused error' : ''}}">
                      <label for="">Select Category</label>
                      <select name="categorie[]" id="category" class="form-control show-tick" multiple>
                        @foreach($categoryinfo as $categores)
                        <option
                          @foreach($postInfo->categories as $postInfoes)
                            {{$postInfoes->id==$categores->id ? 'selected' : ''}}
                          @endforeach
                         value="{{$categores->id}}">{{$categores->categorie_name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group form-float">
                    <div class="form-line {{$errors->has('tages' ? 'focused error' : '')}}">
                      <label for="">Select Tag</label>
                      <select name="tages[]" id="tag" class="form-control show-tick" multiple>
                        @foreach($taginfo as $tages)
                        <option
                            @foreach($postInfo->tages as $postInfoes)
                              {{$postInfoes->id == $tages->id ? 'selected' : ''}}
                            @endforeach
                         value="{{$tages->id}}">{{$tages->tag_name}}</option>
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
              <textarea name="body" rows="8" cols="80" class="form-control">{{$postInfo->post_body}}</textarea>
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
