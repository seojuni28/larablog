@extends('backend.master')

@section('title' , 'Article')

@section('sub-title')
<div class="section-header">
  <h1>Article</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="{{Route('post.index')}}">Articles list</a></div>
    <div class="breadcrumb-item">Edit Article</div>
  </div>
</div>
@endsection

@section('content')

<div class="col-12">
    <div class="card">
      <div class="card-header">
        <a href="{{Route('post.index')}}" class="btn btn-icon" data-toggle="tooltip" title="back"><i class="fas fa-arrow-left"></i></a>
        <h4>back to the list of articles</h4>
      </div>
      <div class="card-body">
        <form action="{{Route('post.update' , $post->id)}}" enctype="multipart/form-data" method="post">
          @csrf
          @method('PUT')
          <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
            <div class="col-sm-12 col-md-7">
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$post->title}}" required>
              @error('title')
                <small class="text-danger">{{$message}}</small>
              @enderror
            </div>
          </div>
          <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
            <div class="col-sm-12 col-md-7">
              <select class="form-control select2 @error('category_id') is-invalid @enderror" name="category_id">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? 'selected' : '' }} required>{{ $category->name }}</option>
                @endforeach
              </select>
              @error('category_id')
                      <small class="text-danger">{{$message}}</small>
              @enderror
            </div>
          </div>
          <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tags</label>
            <div class="col-sm-12 col-md-7">
              <select multiple class="form-control select2 @error('tags') is-invalid @enderror" name="tags[]" required>
                @foreach ($tags as $tag)
                <option value="{{ $tag->id }}" 
                  @foreach ($post->tags as $item)
                      @if ($tag->id == $item->id)
                          selected
                      @endif
                  @endforeach>{{ $tag->name }}</option>
                @endforeach
              </select>
              @error('tags')
                      <small class="text-danger">{{$message}}</small>
              @enderror
            </div>
          </div>
          <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
            <div class="col-sm-12 col-md-7">
              <textarea class="summernote @error('content') is-invalid @enderror" name="content">{{$post->content}}</textarea>
              @error('content')
                <small class="text-danger">{{$message}}</small>
              @enderror
            </div>
          </div>
          <div class="form-group row mb-4 p-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail</label>
            <div class="col-sm-12 col-md-7 position-relative text-center p-0" style="height:200px;border:2px dashed grey; border-radius:5px;background-color:lightgrey;">
              <label class="position-absolute btn btn-secondary bold" onclick="input()" style="transform: translate(-50%, -50%);-ms-transform: translate(-50%, -50%);top: 50%;left: 50%; opacity:.75;">CHOOSE IMAGE</label>
              <img id="image-preview" height="196px" style="left:-50px;object-fit: cover;" width="100%">
              @error('photo')
                <small class="text-danger">{{$message}}</small>
              @enderror
            </div>
            <input type="file" name="photo" id="image-source" class="d-none" onchange="previewImage();">
          </div>
          <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
            <div class="col-sm-12 col-md-7">
              <button type="submit" class="form-control btn btn-success">Update Post <i class="fas fa-fw fa-paper-plane"></i></button>
            </div>
          </div>
        </form>
      </div>
    </div>
</div>
<script>
	function input(){
		document.getElementById("image-source").click();
	}

	function previewImage() {
    document.getElementById("image-preview").style.display = "block";
    var oFReader = new FileReader();
     oFReader.readAsDataURL(document.getElementById("image-source").files[0]);

    oFReader.onload = function(oFREvent) {
      document.getElementById("image-preview").src = oFREvent.target.result;
    };
  };
</script>
@endsection