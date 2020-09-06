@extends('layouts.fontend')
@section('title')
{{$post->post_tittle}}
@endsection
@push('css')
	<link href="{{asset('fontend')}}/single-post-1/css/styles.css" rel="stylesheet">

	<link href="{{asset('fontend')}}/single-post-1/css/responsive.css" rel="stylesheet">
	<style media="screen">
	.favorit_post{
		color: red;
	}
		.header-bg{
				height: 400px;
				width: 100%;
				background-size : cover;
				background-image: url({{asset('storage/postimage/'.$post->post_image)}});

		}
	</style>
@endpush
@section('content')
	<div class="header-bg">
	</div><!-- slider -->

	<section class="post-area section">
		<div class="container">

			<div class="row">

				<div class="col-lg-8 col-md-12 no-right-padding">

					<div class="main-post">

						<div class="blog-post-inner">

							<div class="post-info">

								<div class="left-area">
									<a class="avatar" href="#"><img src="{{asset('storage/profile/'.$post->user->user_picture)}}" alt="Profile Image"></a>
								</div>

								<div class="middle-area">
									<a class="name" href="#"><b>{{$post->user->name}}</b></a>
									<h6 class="date">on {{$post->created_at->diffForHumans()}}</h6>
								</div>

							</div><!-- post-info -->

							<h3 class="title"><a href="#"><b>{{$post->post_tittle}}</b></a></h3>

							<div class="para">
								{{ $post->post_body }}
							</div>
							<ul class="tags">
								@foreach($post->tages as $tag)
								<li><a href="#">{{$tag->tag_name}}</a></li>
								@endforeach
							</ul>
						</div><!-- blog-post-inner -->

						<div class="post-icons-area">
							<ul class="post-icons">
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

							<ul class="icons">
								<li>SHARE : </li>
								<li><a href="#"><i class="ion-social-facebook"></i></a></li>
								<li><a href="#"><i class="ion-social-twitter"></i></a></li>
								<li><a href="#"><i class="ion-social-pinterest"></i></a></li>
							</ul>
						</div>
					</div><!-- main-post -->
				</div><!-- col-lg-8 col-md-12 -->

				<div class="col-lg-4 col-md-12 no-left-padding">

					<div class="single-post info-area">

						<div class="sidebar-area about-area">
							<h4 class="title"><b>ABOUT AUTHOR</b></h4>
							<p>{{$post->user->user_about}}</p>
						</div>

						<div class="tag-area">

							<h4 class="title"><b>CATEGORY CLOUD</b></h4>
							<ul>
								@foreach($post->categories as $category)
								<li><a href="#">{{$category->categorie_name}}</a></li>
								@endforeach
							</ul>

						</div><!-- subscribe-area -->

					</div><!-- info-area -->

				</div><!-- col-lg-4 col-md-12 -->

			</div><!-- row -->

		</div><!-- container -->
	</section><!-- post-area -->


	<section class="recomended-area section">
		<div class="container">
			<div class="row">
@foreach($randompost as $random)
				<div class="col-lg-4 col-md-6">
					<div class="card h-100">
						<div class="single-post post-style-1">

							<div class="blog-image"><img src="{{asset('storage/postimage/'.$random->post_image)}}" alt="Blog Image"></div>

							<a class="avatar" href="#"><img src="{{asset('storage/profile/'.$random->user->user_picture)}}" alt="Profile Image"></a>

							<div class="blog-info">

								<h4 class="title"><a href="{{route('post.details',$random->post_tittle)}}"><b>How Did Van Gogh's Turbulent Mind Depict One of the Most Complex
								Concepts in Physics?</b></a></h4>

								<ul class="post-footer">
									<li>
									@guest
									<a href="#" onclick="toastr.info('Info', 'To add favorite list. You need to login first',{
										closeButton: true,
										progressBar: true,
									});"><i class="ion-heart"></i>{{$random->favorit_to_user->count()}}</a>
									@else
									<a href="#" onclick="document.getElementById('favorite-post-{{$random->id}}').submit()" class="{{ !Auth::user()->favorit_to_post->where('pivot.post_id',$random->id)->count() == 0 ? 'favorit_post' : ''}}"><i class="ion-heart"></i>{{$random->favorit_to_user->count()}}</a>
									<form id="favorite-post-{{$random->id}}" action="{{route('add.favoritepost',$random->id)}}" method="post" style="display:none">
										@csrf
									</form>
									@endguest
								</li>
								<li><a href="#"><i class="ion-chatbubble"></i>6</a></li>
								<li><a href="#"><i class="ion-eye"></i>{{$random->post_views}}</a></li>
								</ul>

							</div><!-- blog-info -->
						</div><!-- single-post -->
					</div><!-- card -->
				</div><!-- col-md-6 col-sm-12 -->
@endforeach
			</div><!-- row -->

		</div><!-- container -->
	</section>

	<section class="comment-section">
		<div class="container">
			<h4><b>POST COMMENT</b></h4>
			<div class="row">

				<div class="col-lg-8 col-md-12">
					<div class="comment-form">
						@guest
							<p><a href="{{route('login')}}">For post a new comment. You need to login first</a></p>
						@else
						<form action="{{route('comment.store',$post->id)}}" method="post">
							@csrf
							<div class="row">
								<div class="col-sm-12">
									<textarea name="comment" rows="2" class="text-area-messge form-control"
										placeholder="Enter your comment" aria-required="true" aria-invalid="false"></textarea >
								</div><!-- col-sm-12 -->
								<div class="col-sm-12">
									<button class="submit-btn" type="submit" id="form-submit"><b>POST COMMENT</b></button>
								</div><!-- col-sm-12 -->

							</div><!-- row -->
						</form>
						@endguest
					</div><!-- comment-form -->

					<h4><b>COMMENTS({{$post->comment->count()}})</b></h4>
					@foreach($post->comment as $comment)
					<div class="commnets-area">

						<div class="comment">

							<div class="post-info">

								<div class="left-area">
									<a class="avatar" href="#"><img src="{{asset('storage/profile/'.$comment->user->user_picture)}}" alt="Profile Image"></a>
								</div>

								<div class="middle-area">
									<a class="name" href="#"><b>{{$comment->user->name}}</b></a>
									<h6 class="date">{{$comment->created_at->diffForHumans()}}</h6>
								</div>

								<div class="right-area">
									<!-- <h5 class="reply-btn" ><a href="#" onclick="document.getElementById(reply-{{$comment->id}}).show"><b></b></a></h5> -->
									<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">REPLY</button>
									<!-- Modal -->
									<form class="" action="{{route('reply.store',$comment->id)}}" method="post">
										@csrf
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">REPLY</h4>
      </div>
      <div class="modal-body">
        <textarea name="comment_reply" rows="2" cols="55"></textarea>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-default">submit</button>
      </div>
    </div>

  </div>
</div>
	</form>
									<p></p>
								</div>

							</div><!-- post-info -->

							<p>{{$comment->comment}}</p>

						</div>

						@foreach($replyInfo as $reply)
						@if($comment->id == $reply->comment_id)
						<div class="comment">
							<h5 class="reply-for">Reply for <a href="#"><b>{{$reply->user->name}} </b></a></h5>

							<div class="post-info">
								<div class="left-area">
									<a class="avatar" style="width:100px;" href="#"><img src="{{asset('storage/profile/'.$reply->user->user_picture)}}" alt="Profile Image"></a>
								</div>

								<div class="middle-area">
									<a class="name" href="#"><b>{{$reply->user->name}}</b></a>
									<h6 class="date">on Sep 29, 2017 at 9:48 am</h6>
								</div>

								<div class="right-area">
									<h5 class="reply-btn" ><a href="#"><b>REPLY</b></a></h5>
								</div>

							</div><!-- post-info-->

							<p>{{$reply->comment_reply}}</p>
						</div>
						@endif
						@endforeach
					</div><!-- commnets-area -->
					@endforeach
					<a class="more-comment-btn" href="#"><b>VIEW MORE COMMENTS</a>

				</div><!-- col-lg-8 col-md-12 -->

			</div><!-- row -->

		</div><!-- container -->
	</section>

@endsection

@push('js')

@endpush
