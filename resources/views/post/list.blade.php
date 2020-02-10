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
{{-- <div class="form-group bg-white row mb-4 p-1">
  <ul class="nav nav-pills mr-auto">
    <li class="nav-item">
    <a class="nav-link" href="{{Route('post.index')}}" data-toggle="tooltip" title="grid view"><i class="fas fa-th-large"></i></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{Route('list')}}" data-toggle="tooltip" title="list view"><i class="fas fa-list-ul"></i></a>
    </li>
  </ul>
</div> --}}
@endsection

@section('content')
<div class="row">
        <div class="card col-12">
            <div class="card-body pl-0 pr-0">
              <div class="table-responsive">
                <table class="table table-md table-hover" id="myTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            @if (Auth::user()->level == 'admin')
                            <th>Author</th>
                            @endif
                            <th>Created At</th>
                            <th>Thumbnail</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @foreach($posts as $post => $result)
                    <tbody>
                        <tr>
                            <td>{{$post + $posts->firstitem()}}</td>
                            <td><a href="{{route('content-detail',$result->slug)}}">{{$result->title}}</a></td>
                            @if (Auth::user()->level == 'admin')
                            <td>{{$result->user->name}}</td>
                            @endif
                            <td>{{date('l, d F Y',strtotime($result->created_at))}}</td>
                            <td>
                                <div class="gallery" data-item-height="100">
                                    <div class="gallery-item" data-image="{{asset('public/uploads/posts/'.$result->photo)}}" data-title="{{$result->photo}}"></div>
                                    <div class="gallery-item gallery-hide" data-image="{{asset('public/uploads/posts/'.$result->photo)}}" data-title="{{$result->photo}}"></div>
                                </div>
                            </td>
                            <td>
                              <form action="{{Route('post.destroy', $result->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="{{Route('post.edit' , $result->id)}}" class="btn btn-sm btn-success" data-toggle="tooltip" title="edit"><i class="fas fa-edit"></i></a>
                                <button type="submit" onclick="return confirm('are you sure??')" class="btn btn-sm btn-danger" data-toggle="tooltip" title="delete"><i class="fas fa-trash"></i></button>
                              </form>
                            </td>    
                        </tr>
                    </tbody>
                    @endforeach
                </table>
              </div>
            </div>
            <div class="card-footer text-right"> 
            {{$posts->links()}}
            </div>
        </div>
    </div>
<script>
  const msg = '{{ Session::get('alert') }}';
  const exist = '{{ Session::has('alert')}}';

  if(exist){
    Notiflix.Notify.Success(msg);
  }
</script>
@endsection