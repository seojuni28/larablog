@extends('frontend.master')

@section('content')
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div id="hot-post" class="row hot-post">
			<div class="col-md-8 hot-post-left">
				<!-- post -->
				@forelse ($thumbnails as $random)
				<div class="post post-thumb">
					<a class="post-img" href="{{route('content-detail',$random->slug)}}"><img src="{{asset('public/uploads/posts/'.$random->photo)}}" width="auto" height="508px"></a>
						<div class="post-body">
							<div class="post-category">
							<a href="{{route('categoried-article',$random->category->slug)}}">{{$random->category->name}}</a>
							</div>
							<h3 class="post-title title-lg"><a href="{{route('content-detail',$random->slug)}}">{{$random->title}}</a></h3>
							<ul class="post-meta">
							<li><a href="{{route('detail-profile',$random->user->id)}}">{{$random->user->name}}</a></li>
							<li>{{date('l, d F Y', strtotime($random->created_at))}}</li>
							</ul>
						</div>
					</div>
				@empty
				No data
				@endforelse
				<!-- /post -->
			</div>
			<div class="col-md-4 hot-post-right">
					@forelse ($randoms as $random)
					<div class="post post-thumb">
					<a class="post-img" href="{{route('content-detail',$random->slug)}}"><img src="{{asset('public/uploads/posts/'.$random->photo)}}" width="auto" height="250px"></a>
					<div class="post-body">
						<div class="post-category">
						<a href="{{route('categoried-article',$random->category->slug)}}">{{$random->category->name}}</a>
						</div>
					<h3 class="post-title"><a href="{{route('content-detail',$random->slug)}}">{{$random->title}}</a></h3>
						<ul class="post-meta">
						<li><a href="{{route('detail-profile',$random->user->id)}}">{{$random->user->name}}</a></li>
						<li>{{date('l, d F Y', strtotime($random->created_at))}}</li>
						</ul>
					</div>
				</div>
				@empty
				No data
				@endforelse
				<!-- /post -->
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-8">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="section-title">
							<h2 class="title">New</h2>
						</div>
					</div>
					@forelse ($posts as $post)
					<div class="col-md-6">
						<div class="post">
						<a class="post-img" href="{{route('content-detail',$post->slug)}}"><img src="{{asset('public/uploads/posts/'.$post->photo)}}" width="300px" height="250px"></a>
							<div class="post-body">
								<div class="post-category">
								<a href="{{route('categoried-article',$post->slug)}}">{{$post->category->name}}</a>
								</div>
									<h3><a href="{{route('content-detail',$post->slug)}}">{{$post->title}}</a></h3>
								<ul class="post-meta">
								<li><a href="{{route('detail-profile',$post->user->id)}}">{{$post->user->name}}</a></li>
								<li>{{$post->created_at->diffForHumans() }}</li>
								</ul>
							</div>
						</div>
					</div>
					@empty
						No data
					@endforelse
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="section-title">
							<h2 class="title">Articles</h2>
						</div>
					</div>
					@forelse ($all as $post)
					<div class="col-md-6">
						<div class="post">
						<a class="post-img" href="{{route('content-detail',$post->slug)}}"><img src="{{asset('public/uploads/posts/'.$post->photo)}}" width="300px" height="250px"></a>
							<div class="post-body">
								<div class="post-category">
								<a href="{{route('categoried-article',$post->slug)}}">{{$post->category->name}}</a>
								</div>
									<h3><a href="{{route('content-detail',$post->slug)}}">{{$post->title}}</a></h3>
								<ul class="post-meta">
								<li><a href="{{route('detail-profile',$post->user->id)}}">{{$post->user->name}}</a></li>
								<li>{{$post->created_at->diffForHumans() }}</li>
								</ul>
							</div>
						</div>
					</div>
					@empty
						No data
					@endforelse
				</div>
				<div class="text-center">
				{{$posts->links() }}
				</div>
			</div>
			<div class="col-md-4">
				<div class="aside-widget">
					<div class="section-title">
						<h2 class="title">Categories</h2>
					</div>
					<div class="category-widget">
						<ul>
							@forelse ($categories as $category)
							<li><a href="{{route('categoried-article',$category->slug)}}">{{$category->name }} <span>{{$category->countpost->count() }}</span></a></li>
							@empty
								No data
							@endforelse
						</ul>
					</div>
				</div>
		</div>
	</div>
</div>
@endsection