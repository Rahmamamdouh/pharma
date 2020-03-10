@extends('master')
@section('main-content')
  <script>
    //when the user clicks on div, open the popu
    function popupMessage(index){
      //get medicine id
      let alertHere=index.childNodes[2].id;
      var popup=document.getElementById(alertHere);
      //show message
      popup.classList.toggle("show");
      //every second show message
      var hideMessage=setInterval(hideMessage, 1500);
      function hideMessage(){
        //hide message
        popup.classList.toggle("show");
        //stop showing message
        clearInterval(hideMessage);
      }
    }
  </script>
  <div class="bg-light py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0">
          <a href="/index">Home</a>
          <span class="mx-2 mb-0">/</span>
          <a href="/store">Store</a>
          <span class="mx-2 mb-0">/</span>
          <strong class="text-black">{{$medicine->medicine_name}}</strong>
        </div>
      </div>
    </div>
  </div>
  <div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-md-5 mr-auto">
          <div class="border text-center">
            <img src="/img/{{$medicine->medicine_image}}" alt="Image" class="img-fluid p-5">
          </div>
        </div>
        <div class="col-md-6">
          <h2 class="text-black">{{$medicine->medicine_name}}</h2>
          <p>{{$medicine->medicine_description}}</p>
          <p>
            <strong class="text-primary h4">{{$medicine->medicine_price}} LE</strong>
          </p>
          <!-- popup message -->
          @if(Auth::user())
            <p>
              <div class="popup" onclick="popupMessage(this)"><button class="btn btn-warning px-4 py-3" onclick="addToCart({{$medicine->id}})">Add To Cart</button>
                <span class="popuptext" id="myPopup">Added To Cart!</span>
              </div>
            </p>
          @endif
        </div>
      </div>
    </div>
  </div>
@endsection
