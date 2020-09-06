@extends('layouts.fontend')
@section('title','POSTS')
@push('css')
  <link href="{{asset('fontend')}}/category/css/styles.css" rel="stylesheet">

	<link href="{{asset('fontend')}}/category/css/responsive.css" rel="stylesheet">
	<style media="screen">
	.favorit_post{
		color: red;
	}
		.header-bg{
				height: 400px;
				width: 100%;
				background-size : cover;
				background-image: url();

		}
	</style>
@endpush
@section('content')
<div class="slider display-table center-text">
  <h1 class="title display-table-cell"><b>ALL POSTS</b></h1>
</div><!-- slider -->

<section class="blog-area section">
  <div class="container">

    <div class="row">
@foreach($allpost as $post)
      <div class="col-lg-4 col-md-6">
        <div class="card h-100">
          <div class="single-post post-style-1">

            <div class="blog-image"><img src="{{asset('storage/postimage/'.$post->post_image)}}" alt="Blog Image"></div>

            <a class="avatar" href="#"><img src="{{asset('storage/profile/'.$post->user->user_picture)}}" alt="Profile Image"></a>

            <div class="blog-info">

              <h4 class="title"><a href="{{route('post.details',$post->post_tittle)}}"><b>How Did Van Gogh's Turbulent Mind Depict One of the Most Complex
              Concepts in Physics?</b></a></h4>

              <ul class="post-footer">
                <li>
									@guest
									<a href="#" onclick="toastr.info('Info', 'To add favorite list. You need to login first',{
										closeButton: true,
										progressBar: true,
									});"><i class="ion-heart"></i>{{$post->favorit_to_user->count()}}</a>
									@else
									<a href="#" onclick="document.getElementById('favorite-post-{{$post->id}}').submit()" class="{{ Auth::user()->favorit_to_post->where('pivot.post_id',$post->id)->count() == 0 ? 'favorit_post' : ''}}"><i class="ion-heart"></i>{{$post->favorit_to_user->count()}}</a>
									<form id="favorite-post-{{$post->id}}" action="{{route('add.favoritepost',$post->id)}}" method="post" style="display:none">
										@csrf
									</form>
									@endguest
								</li>
								<li><a href="#"><i class="ion-chatbubble"></i>6</a></li>
								<li><a href="#"><i class="ion-eye"></i>{{$post->post_views}}</a></li>
              </ul>

            </div><!-- blog-info -->
          </div><!-- single-post -->
        </div><!-- card -->
      </div><!-- col-lg-4 col-md-6 -->
@endforeach
    </div><!-- row -->
{{ $allpost->links() }}

  </div><!-- container -->
</section><!-- section -->


@endsection

@push('js')

@endpush
