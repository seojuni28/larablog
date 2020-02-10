@extends('frontend.master')

@section('content')
@foreach ($post as $item)
<div id="post-header" class="page-header m-0">
    <div class="page-header-bg" style="background: url({{asset('public/uploads/posts/'.$item->photo)}}) no-repeat center center fixed; 
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="post-category">
                    <a href="category.html">{{$item->category->name}}</a>
                    </div>
                <h1>{{$item->title}}</h1>
                    <ul class="post-meta">
                    <li><a href="{{route('detail-profile',$item->user->id)}}">{{$item->user->name}}</a></li>
                    <li>{{date('l, d F Y', strtotime($item->created_at))}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-8">
					<!-- post share -->
					<div class="section-row">
						<div class="addthis_inline_share_toolbox"></div><!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e3957010e8f7bdd"></script>
					</div>
					<!-- /post share -->

					<!-- post content -->
					<div class="section-row">
                        <h3>{{$item->title}}</h3>
                        <img src="{{asset('public/uploads/posts/'.$item->photo)}}" width="100%" style="max-height:400px;max-width:800px;">
                        <p style="margin-top:30px;">{!! $item->content !!}</p>
					</div>
					<!-- /post content -->

					<!-- post tags -->
					<div class="section-row">
						<div class="post-tags">
                         <ul>
							@foreach ($item->tags as $tag)
						 		<li class="badge badge-secondary"><a href="{{route('tagged-article',$tag->slug)}}">{{ $tag->name }}</a></li>
							@endforeach
						 </ul>
						</div>
					</div>
					<!-- post author -->
					<div class="section-row">
						<div class="section-title">
                        <h3 class="title">About <a href="{{route('detail-profile',$item->user->id)}}">{{$item->user->name}}</a></h3>
						</div>
						<div class="author media">
							<div class="media-left">
								<a href="{{route('detail-profile',$item->user->id)}}">
                                <img class="author-img" width="50%" style="height:100px;max-height:100px" src="{{asset('public/uploads/user/'.$item->user->photo)}}" alt="">
								</a>
							</div>
							<div class="media-body">
                            <p>{!! $item->user->bio !!}</p>
							</div>
						</div>
					</div>
					<div>
                </div>
                @endforeach
			</div>
				<div class="col-md-4">
					<!-- category widget -->
					<div class="aside-widget">
						<div class="section-title">
							<h2 class="title">Categories</h2>
						</div>
						<div class="category-widget">
							<ul>
                                @foreach ($categories as $item)
                                <li><a href="{{route('categoried-article',$item->slug)}} ">{{$item->name}} <span>{{$item->countpost->count() }}</span></a></li>
                                @endforeach
							</ul>
						</div>
					</div>
					<!-- post widget -->
					<div class="aside-widget">
						<div class="section-title">
							<h2 class="title">Another Posts</h2>
						</div>
						<!-- post -->
						@foreach ($populars as $item)
                        <div class="post post-widget">
							<a class="post-img" href="{{route('content-detail',$item->slug)}}"><img src="{{asset('public/uploads/posts/'.$item->photo)}}" alt=""></a>
							<div class="post-body">
								<div class="post-category">
                                <a href="category.html">{{$item->category->name}}</a>
								</div>
                            <h3 class="post-title"><a href="{{route('content-detail',$item->slug)}}">{{$item->title}}</a></h3>
							</div>
						</div>
                        @endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection