@extends('frontend.master')

@section('css')
   <style>
      .link-article{
      color:blue;
    }
    .link-article:hover{
      color: black;
      text-decoration: underline;
    }
    #myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (Image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image (Image Text) - Same Width as the Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation - Zoom in the Modal */
.modal-content, #caption {
  animation-name: zoom;
  animation-duration: 0.6s;
}

@keyframes zoom {
  from {transform:scale(0)}
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
   </style>
@endsection

@section('content')
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-4">
        <div class="card">
        <img src="{{asset('public/uploads/user/'.$user->photo)}}" id="myImg" style="width:100%;border-radius:5px;">
          <div class="card-body" style="padding:5px;">
            <div class="profile-widget-description">
            <div class="profile-widget-name">
              <label class="font-weight-bold">{{$user->name}}</label>
              <div class="text-muted d-inline font-weight-normal">
                <div class="slash"></div>{{$user->job}}</div>
              <div>{{$user->bio}}</div>
              </div>
            </div>
            <hr>
          </div>
            <ul>
              <li>{{$user->email}}</li>
              <li>{{$user->phone}}</li>
              <li>{{$user->address }}</li>
              <li>{{$user->city }}</li>
            </ul>
        </div>
      </div>
      <div></div>
      <div class="col-lg-8 col-md-8">
        <div class="card">
          <div class="card-header">
              <h6 class="card-title">{{$user->name}}'s Articles</h6>
          </div>
          <div class="card-body">
            <ul class="list-group">
            @foreach ($posts as $post)
              <li class="list-group-item"><a href="{{route('content-detail',$post->slug)}}" class="link-article">{{$post->title}}</a> <span style="float:right;">{{date('l, d F Y', strtotime($post->created_at))}}</span></li>
            @endforeach
            </ul>
          </div>
        {{$posts->links()}}
      </div>
    </div>
  </div>
  <!-- The Modal -->
<div id="myModal" class="modal">

  <!-- The Close Button -->
  <span class="close">&times;</span>

  <!-- Modal Content (The Image) -->
  <img class="modal-content" id="img01" width="auto" style="max-height:450px">

  <!-- Modal Caption (Image Text) -->
  <div id="caption"></div>
</div>
</section>
<script>
// Get the modal
let modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
let img = document.getElementById("myImg");
let modalImg = document.getElementById("img01");
let captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
let span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}
</script>
@endsection