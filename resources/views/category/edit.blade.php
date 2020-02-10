@extends('backend.master')

@section('title' , 'Category')

@section('sub-title')
<div class="section-header">
  <h1>Category</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="{{Route('category.index')}}">Categories list</a></div>
    <div class="breadcrumb-item">Edit Category</div>
  </div>
</div>
@endsection

@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{Route('category.index')}}" class="btn btn-icon" data-toggle="tooltip" title="back"><i class="fas fa-arrow-left"></i></a>
                    <h4>back to the list of category</h4>
                  </div>
                <div class="text-center card-header">
                    <h4 class="card-title">Edit Category</h4>
                </div>
                <div class="card-body p-0">
                    <form action="{{Route('category.update' , $categories->id)}}" method="POST" id="form">
                        @csrf
                        @method('PUT')
                        <div class="container p-3">
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category's Name </label>
                                <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$categories->name}}" required>
                                @error('name')
                                  <small class="text-danger">{{$message}}</small>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button class="form-control btn btn-success">Update Category's <i class="fas fa-paper-plane"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection