@extends('backend.master')

@section('title' , 'Article Management')

@section('sub-title')
<div class="section-header">
  <h1>Article</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="{{Route('home')}}">Dashboard</a></div>
    <div class="breadcrumb-item">Article</div>
  </div>
</div>
<div class="form-group bg-white row mb-4 p-1">
  <ul class="nav nav-pills mr-auto">
    <li class="nav-item">
    <a class="nav-link" href="{{Route('post.index')}}" data-toggle="tooltip" title="grid view"><i class="fas fa-th-large"></i></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{Route('list')}}" data-toggle="tooltip" title="list view"><i class="fas fa-list-ul"></i></a>
    </li>
  </ul>
</div>
@endsection

@section('content')
<section class="section-body">
  <div class="row mb-3">
    @foreach($posts as $post => $result)
    <div class="col-12 col-sm-6 col-md-6 col-lg-3" id="articleContainer">
      <article class="article article-style-b">
        <div class="article-header">
          <div class="article-image" data-background="{{asset('public/uploads/posts/'.$result->photo)}}">
          </div>
        </div>
        <div class="article-details">
          <div class="article-title">
            <div><h4><a id="articleTitle" href="{{route('content-detail',$result->slug)}}">{{$result->title}}</a></h4></div>
            <p>{{ Str::limit(strip_tags($result->content), 30) }}</p>
            <div class="article-cta">
              @if (strlen(strip_tags($result->content)) > 30)
                <a href="{{route('content-detail',$result->slug)}}">Read More <i class="fas fa-chevron-right"></i></a>
              @endif
            </div>
          @if (Auth::user()->level == 'admin')
          <div class="article-user">
          <img width="40" height="40"  class="rounded-circle" alt="{{$result->user->image}}" src="{{asset('public/uploads/user/'.$result->user->photo)}}">
            <div class="article-user-details">
              <div class="user-detail-name">
                <a href="#">{{$result->user->name}}</a>
              </div>
              <div class="text-job">Web Developer</div>
            </div>
          </div>
          @endif
          <div class="mt-3 text-left">
            <form action="{{Route('post.destroy', $result->id)}}" method="POST">
              @csrf
              @method('DELETE')
              <a href="{{Route('post.edit' , $result->id)}}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="edit"><i class="fas fa-edit"></i></a>
              <button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" title="delete"><i class="fas fa-trash"></i></button>
            </form>
          </div>
        </div>
      </article>
    </div>
    @endforeach
  </div>
</section>

{{$posts->links()}}
<script>
  const msg = '{{ Session::get('alert') }}';
  const exist = '{{ Session::has('alert')}}';

  if(exist){
    Notiflix.Report.Success( 'Success', '<label class="text-center">'+msg+'</label>'); 
  }

</script>
@endsection