@extends('backend.master')

@section('title' , 'Article')

@section('sub-title')
<div class="section-header">
  <h1>Deleted Article</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="{{Route('post.index')}}">Articles list</a></div>
    <div class="breadcrumb-item">Deleted Article</div>
  </div>
</div>
<div class="form-group bg-white row mb-4 p-1">
  <ul class="nav nav-pills mr-auto">
    <li class="nav-item">
    <a class="nav-link" href="{{Route('post.trashcan')}}" data-toggle="tooltip" title="grid view"><i class="fas fa-th-large"></i></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{Route('post.trashlist')}}" data-toggle="tooltip" title="list view"><i class="fas fa-list-ul"></i></a>
    </li>
  </ul>
</div>
@endsection

@section('content')
<div class="row">
  @foreach($posts as $post => $result)
  <div class="col-12 col-sm-6 col-md-6 col-lg-3">
    <article class="article article-style-b">
      <div class="article-header">
        <div class="article-image" data-background="{{asset('public/uploads/posts/'.$result->photo)}}">
        </div>
      </div>
      <div class="article-details">
        <div class="article-title">
          <h2><a class="text-primary">{{$result->title}}</a></h2>
        </div>
        <p>{{ Str::limit(strip_tags($result->content), 30) }}</p>
        @if (Auth::user()->level == 'admin')
        <div class="article-user">
          <img alt="image" src="">
          <div class="article-user-details">
            <div class="user-detail-name">
              <a href="#">{{$result->user->name}}</a>
            </div>
            <div class="text-job">Web Developer</div>
          </div>
        </div>
        @endif
        <div class="mt-3 text-left">
          <form action="{{Route('post.force-delete', $result->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <a href="{{Route('post.restore' , $result->id)}}" class="btn btn-info btn-sm" data-toggle="tooltip" title="restore"><i class="fas fa-recycle"></i></a>
            <button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" title="delete permanent"><i class="fas fa-trash"></i></button>
          </form>
        </div>
      </div>
    </article>
  </div>
  @endforeach
</div>
{{$posts->links()}}
<script>
  const msg = '{{ Session::get('alert') }}';
  const exist = '{{ Session::has('alert')}}';

  if(exist){
    Notiflix.Notify.Success(msg);
  }
</script>
@endsection