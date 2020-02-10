@extends('backend.master')

@section('title' , 'Users')

@section('css')
<style>
  .container {
    width: 50%;
    position: relative;
    text-align: left;
  }
  
  .image {
    opacity: 1;
    display: block;
    width: 100%;
    height: 120px;
    border-radius: 50%; 
    transition: .5s ease;
    backface-visibility: hidden;
  }
  
  .middle {
    transition: .5s ease;
    opacity: 0;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    text-align: center;
  }
  
  .container:hover .image {
    opacity: 0.3;
  }
  
  .container:hover .middle {
    opacity: 1;
  }
  
  .text {
    color: grey;
    font-size: 16px;
    font-weight: bold;
    padding: 16px 32px;
    border-radius: 50%;
  }
  </style>
@endsection

@section('sub-title')
<div class="section-header">
  <h1>Users</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="{{Route('home')}}">Dashboard</a></div>
    <div class="breadcrumb-item">Users</div>
  </div>
</div>
@endsection

@section('content')
        <div class="row">
          <div class="col-12 col-md-12 col-lg-4">
            <div class="card p-3">
              <div class="container mt-2 mb-2">
                <img src="{{asset('public/uploads/user/'.$user->photo)}}" id="image-preview" alt="Avatar" class="image">
                <div class="middle">
                  <label class="text @error('photo') is-invalid @enderror" onclick="input()">choose photo</label>
                  @error('photo')
                    <small class="text-danger">{{$message}}</small>
                  @enderror
                </div>
              </div>
              <div class="profile-widget-description">
              <div class="profile-widget-name">
                <label class="font-weight-bold">{{$user->name}}</label>
                <div class="text-muted d-inline font-weight-normal">
                  <div class="slash"></div>{{$user->job}}</div>
                <div><label>{!! $user->bio !!}</label></div>
                  <hr>
                </div>
              </div>
            <div><i class="fas fa-envelope"></i> {{$user->email}}</div>
            <div><i class="fas fa-phone"></i> {{$user->phone}}</div>
            <div><i class="fas fa-map-marker-alt"></i> {{$user->address }}</div>
            <div><i class="fas fa-city"></i> {{$user->city }}</div>
            </div>
          </div>
          <div class="col-12 col-md-12 col-lg-8">
            <div class="card">
            <form method="post" class="needs-validation" action="{{Route('update-profile')}}" enctype="multipart/form-data">
                @csrf
                <input class="d-none" name="photo" type="file" id="image-source" onchange="previewImage();"></input>
                <div class="card-header">
                  <h4>Edit Profile</h4>
                </div>
                <div class="card-body">
                    <div class="row">                               
                      <div class="form-group col-md-7 col-12">
                        <label>Name</label>
                      <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}">
                      @error('name')
                      <small class="text-danger">{{$message}}</small>
                      @enderror
                    </div>
                      <div class="form-group col-md-5 col-12">
                        <label>City</label>
                        <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{$user->city}}">
                        @error('city')
                          <small class="text-danger">{{$message}}</small>
                        @enderror
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-7 col-12">
                        <label>Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}">
                        @error('email')
                          <small class="text-danger">{{$message}}</small>
                        @enderror
                      </div>
                      <div class="form-group col-md-5 col-12">
                        <label>Phone</label>
                        <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{$user->phone}}">
                        @error('phone')
                          <small class="text-danger">{{$message}}</small>
                        @enderror
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-7 col-12">
                        <label>Address</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{$user->address}}">
                        @error('address')
                          <small class="text-danger">{{$message}}</small>
                        @enderror
                      </div>
                      <div class="form-group col-md-5 col-12">
                        <label>Job</label>
                        <input type="text" class="form-control @error('job') is-invalid @enderror" name="job" value="{{$user->job}}">
                        @error('job')
                          <small class="text-danger">{{$message}}</small>
                        @enderror
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-12">
                        <label>Bio</label>
                        <textarea class="form-control @error('bio') is-invalid @enderror summernote-simple" name="bio">{{$user->bio}}</textarea>
                        @error('bio')
                          <small class="text-danger">{{$message}}</small>
                        @enderror
                      </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                  <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
              </form>
            </div>
          </div>
        </div>
  
<script>
  const msg = '{{ Session::get('alert') }}';
  const exist = '{{ Session::has('alert')}}';

  if(exist){
    Notiflix.Report.Success( 'Success', '<label class="text-center">'+msg+'</label>'); 
  }

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