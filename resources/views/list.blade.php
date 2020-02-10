@extends('frontend.master')

@section('content')
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-8">
                @foreach ($post as $item)
                <div class="post post-row">
                    <a class="post-img" href="{{route('content-detail',$item->slug)}}"><img src="{{asset('public/uploads/posts/'.$item->photo)}}" style="max-width:500px;max-height:300px;"></a>
                    <div class="post-body">
                        <div class="post-category">
                        <a href="{{route('categoried-article',$item->category->slug)}}">{{$item->category->name}}</a>
                        </div>
                    <h3 class="post-title"><a href="{{route('content-detail',$item->slug)}}">{{$item->title }}</a></h3>
                        <ul class="post-meta">
                        <li><a href="{{route('detail-profile',$item->user->id)}}">{{$item->user->name}}</a></li>
                        <li>{{ date('l, d F Y',strtotime($item->created_at)) }}</li>
                        </ul>
                    <p>{!! substr(strip_tags($item->content), 0, 80) !!}</p>
                    <label><a href="{{route('content-detail',$item->slug)}}"> {{ strlen(strip_tags($item->content)) > 50 ? "Read More" : "" }}</a></label>
                    </div>
                </div>
                @endforeach
                <div class="text-center">
                    {{$post->links() }}
                </div>
            </div>

            <div class="col-md-4">
                <div class="aside-widget">
                    <div class="section-title">
                        <h2 class="title">Categories</h2>
                    </div>
                    <div class="category-widget">
                        <ul>
							@foreach ($categories as $category)
							<li><a href="{{route('categoried-article',$category->slug)}}">{{$category->name }} <span>{{$category->countpost->count() }}</span></a></li>
							@endforeach
						</ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

@endsection