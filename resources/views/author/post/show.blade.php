@extends('layouts.backend')
@section('content')
    <div class="container-fluid">
      <a class="btn btn-danger wave-effect" href="{{route('post.index')}}">Back</a>

      @if($postInfo->is_approve==false)
        <button type="button" class="btn btn-danger pull-right" name="button">
            <i class="material-icons">done</i>
            <span>Pending</span>
        </button>
      @else
      <button type="button" class="btn btn-success pull-right" disabled>
          <i class="material-icons">done</i>
          <span>Approved</span>
      </button>
      @endif
      <br>
      <br>
      <div class="row clearfix">
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header">
              <h2>
                  {{$postInfo->post_tittle}}
                  <small>Posted By <strong> <a href="#">{{$postInfo->user->name}}</a> </strong> on {{$postInfo->created_at->toFormattedDateString()}} </small>
              </h2>
            </div>
            <div class="body">
              <div class="form-group form-float">
                <div class="form-line">
                  <h2>{{$postInfo->post_body}}</h2>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="card">
              <div class="header">
                <h2>Category</h2>
              </div>
              <div class="body">
                  @foreach($postInfo->categories as $post)
                    <span class="label bg-cyan">{{$post->categorie_name}}</span>
                  @endforeach
              </div>
            </div>
            <div class="card">
              <div class="header">
                <h2>Tag</h2>
              </div>
              <div class="body">
                  @foreach($postInfo->tages as $post)
                    <span class="label bg-cyan">{{$post->tag_name}}</span>
                  @endforeach
              </div>
            </div>
            <div class="card">
              <div class="header">
                <h2>Feature Image</h2>
              </div>
              <div class="body">
                  <img class="img-responsive thumbnail" src="{{asset('storage/postimage/'.$postInfo->post_image)}}" alt="">
              </div>
            </div>
        </div>
      </div>
    </div>
  @endsection
