@extends('backend.master')

@section('title' , 'Users')

@section('sub-title')
<div class="section-header">
  <h1>Deleted Users</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="{{Route('user.index')}}">Users list</a></div>
    <div class="breadcrumb-item">Deleted Users</div>
  </div>
</div>
{{-- <div class="form-group bg-white row mb-4 p-1">
  <ul class="nav nav-pills mr-auto">
    <li class="nav-item">
    <a class="nav-link" href="{{Route('user.trashcan')}}" data-toggle="tooltip" title="grid view"><i class="fas fa-th-large"></i></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{Route('user.trashlist')}}" data-toggle="tooltip" title="list view"><i class="fas fa-list-ul"></i></a>
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Banned At</th>
                            <th>Photo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @foreach($users as $user => $result)
                    <tbody>
                        <tr>
                            <td>{{$user + $users->firstitem()}}</td>
                            <td>{{$result->name}}</td>
                            <td>{{$result->email}}</td>
                            <td>{{date('d M Y',strtotime($result->deleted))}}</td>
                            <td>
                                <div class="gallery" data-item-height="100">
                                    <div class="gallery-item rounded-circle" data-image="{{asset('public/uploads/user/'.$result->photo)}}" data-title="{{$result->photo}}"></div>
                                    <div class="gallery-item gallery-hide" data-image="{{asset('public/uploads/user/'.$result->photo)}}" data-title="{{$result->photo}}"></div>
                                </div>
                            </td>
                            <td>
                                <form action="{{Route('user.force-delete', $result->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{Route('user.restore' , $result->id)}}" class="btn btn-info btn-sm" data-toggle="tooltip" title="unban"><i class="fas fa-recycle"></i></a>
                                    <button onclick="return confirm('are you sure??')" type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" title="delete permanent"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>    
                        </tr>
                    </tbody>
                    @endforeach
                </table>
              </div>
            </div>
            <div class="card-footer text-right"> 
            {{$users->links()}}
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