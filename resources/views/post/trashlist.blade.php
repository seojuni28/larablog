@extends('backend.master')

@section('title' , 'Article')

@section('sub-title')
<div class="section-header">
  <h1>Article</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="{{Route('post.index')}}">Articles</a></div>
    <div class="breadcrumb-item">Deleted Articles</div>
  </div>
</div>
{{-- <div class="form-group bg-white row mb-4 p-1">
  <ul class="nav nav-pills mr-auto">
    <li class="nav-item">
    <a class="nav-link" href="{{Route('post.trashcan')}}" data-toggle="tooltip" title="grid view"><i class="fas fa-th-large"></i></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{Route('post.trashlist')}}" data-toggle="tooltip" title="list view"><i class="fas fa-list-ul"></i></a>
    </li>
  </ul>
</div> --}}
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
                            <th>Title</th>
                            <th>Author</th>
                            <th>Deleted At</th>
                            <th>Thumbnail</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @foreach($posts as $post => $result)
                    <tbody>
                        <tr>
                            <td>{{$post + $posts->firstitem()}}</td>
                            <td>{{$result->title}}</td>
                            <td>{{$result->user->name}}</td>
                            <td>{{date('d M Y',strtotime($result->deleted_at))}}</td>
                            <td>
                                <div class="gallery" data-item-height="100">
                                    <div class="gallery-item" data-image="{{asset('public/uploads/posts/'.$result->photo)}}" data-title="{{$result->photo}}"></div>
                                    <div class="gallery-item gallery-hide" data-image="{{asset('public/uploads/posts/'.$result->photo)}}" data-title="{{$result->photo}}"></div>
                                </div>
                            </td>
                            <td>
                            <form action="{{Route('post.force-delete', $result->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{Route('post.restore' , $result->id)}}" class="btn btn-info btn-sm" data-toggle="tooltip" title="restore"><i class="fas fa-recycle"></i></a>
                                    <button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" title="delete permanent"><i class="fas fa-trash"></i></button>
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
// Live Search
  function myFunction(){
  let input, filter, table, tr, td, i;

  input = document.getElementById("myInput");
  filter  = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for(i = 1;i < tr.length; i++){
    tr[i].style.display = "none";
    td = tr[i].getElementsByTagName("td");
    for(let j = 0;j < td.length; j++){
      cell = tr[i].getElementsByTagName("td")[j];
      if(cell){
        if(cell.innerHTML.toUpperCase().indexOf(filter) > -1){
          tr[i].style.display = "";
          break;
        }
      }
    }
  }
}
</script>
@endsection