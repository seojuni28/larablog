@extends('backend.master')

@section('title' , 'Users')

@section('sub-title')
<div class="section-header">
  <h1>Users</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="{{Route('home')}}">Dashboard</a></div>
    <div class="breadcrumb-item">Users</div>
  </div>
</div>
<div class="form-group bg-white row mb-4 p-1">
  <ul class="nav nav-pills mr-auto">
    <li class="nav-item">
    <a class="nav-link" href="{{Route('user.index')}}" data-toggle="tooltip" title="grid view"><i class="fas fa-th-large"></i></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{Route('user-list')}}" data-toggle="tooltip" title="list view"><i class="fas fa-list-ul"></i></a>
    </li>
  </ul>
</div>
@endsection

@section('content')
<div class="row">
        <div class="card col-12">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-md table-hover" id="myTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Join At</th>
                            <th>Status</th>
                            <th>Photo</th>
                            {{-- <th>Action</th> --}}
                        </tr>
                    </thead>
                    @foreach($users as $user => $result)
                    <tbody>
                        <tr>
                            <td>{{$user + $users->firstitem()}}</td>
                            <td><a href="{{route('user.show',$result->id)}}">{{$result->name}}</a></td>
                            <td>{{$result->email}}</td>
                            <td>{{date('d M Y',strtotime($result->created_at))}}</td>
                            <td>@if ($result->deleted_at)
                                  <div class="badge badge-danger">banned</div>
                                @elseif($result->email_verified_at == null)
                                  <div class="badge badge-primary">Not Actived</div>
                                @else
                                  <div class="badge badge-success">active</div>
                                @endif
                            </td>
                            <td>
                                <div class="gallery" data-item-height="100">
                                    <div class="gallery-item rounded-circle" data-image="{{asset('public/uploads/user/'.$result->photo)}}" data-title="{{$result->photo}}"></div>
                                    <div class="gallery-item gallery-hide" data-image="{{asset('public/uploads/user/'.$result->photo)}}" data-title="{{$result->photo}}"></div>
                                </div>
                            </td>
                            {{-- <td>
                              <form action="{{Route('user.destroy', $result->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-info btn-sm" href="{{Route('user.show',$result->id)}}" data-toggle="tooltip" title="user's detail"><i class="fas fa-id-badge"></i></a>
                                <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title="ban"><i class="fas fa-trash"></i></button>
                              </form>
                            </td>     --}}
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
// Live Seacrh
</script>
@endsection