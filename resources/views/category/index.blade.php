@extends('backend.master')

@section('title' , 'Category')

@section('sub-title')
<div class="section-header">
  <h1>Category</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="{{Route('home')}}">Dashboard</a></div>
    <div class="breadcrumb-item">Category</div>
  </div>
</div>
@endsection

@section('content')

<div class="section-body">
  <div class="row">
    <div class="col-12 col-md-3 col-lg-3">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Add New Category</h4>
        </div>
        <div class="card-body p-0">
        <form action="{{Route('category.store')}}" method="POST" id="form">
            @csrf
            <div class="container p-3">
                <div class="form-group">
                    <label>Category's Name :</label>
                    <input class="form-control @error('name') is-invalid @enderror" name="name" required>
                    @error('name')
                      <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                  <button class="form-control btn btn-primary">Save Category's <i class="fas fa-paper-plane"></i></button>
                </div>
            </div>
        </form>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-9 col-lg-9">
      <div class="card">
        <div class="card-header">
          <h4>List of Category</h4>
        </div>
        <div class="card-body p-2">
          <div class="table-responsive">
            <table id="myTable" class="table table-sm table-hover" id="myTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @foreach ($categories as $category => $result)
                <tbody>
                    <tr>
                        <td>{{$category + $categories->firstitem()}}</td>
                        <td>{{$result->name }}</td>
                        <td>
                          <form action="{{Route('category.destroy', $result->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{Route('category.edit' , $result->id)}}" class="btn btn-sm btn-success" data-toggle="tooltip" title="edit"><i class="fas fa-edit"></i></a>
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
        {{$categories->links()}}
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  const msg = '{{ Session::get('alert') }}';
  const exist = '{{ Session::has('alert')}}';

  if(exist){
    Notiflix.Report.Success( 'Success', '<label class="text-center">'+msg+'</label>'); 
  }

</script>
@endsection