@extends('master')

@section('search-bar')
  <script>
  function loadMedicines(letters){
      $.ajax({
        url:"{{route ('filteredMedicines')}}",
        method:"GET",
        data:{letters:letters,storeORcart:'store'},
        success:function(result){
          $('.medicines_area').remove();
          $('#load_product').html(result);
        }
      });
  }
  function loadLetters(index){
      let letters=index.value;
      loadMedicines(letters);
  }
  </script>
  <a href="#" class="icons-btn d-inline-block js-search-open">
    <span class="icon-search"></span>
  </a>
@endsection

@section('main-content')
  <?php
    $minimum_range=0;
    $maximum_range=5000;
  ?>
  <script>
    let counter=0;
    $(document).ready(function(){
      //add new medicine to cart in store and shopsingle pages
      function addToCart(medicineID){
        $.ajax({
          url:"{{route ('addNewItemToCart')}}",
          method:"GET",
          data:{medicineID:medicineID},
          success:function(carts){
            $('#numberOfItemsInCart').html(carts);
          }
        });
      }
      //price range filter in store page
      $('#price_range').slider({
        range:true,
        //start range
        min:0,
        //end range
        max:5000,
        values:[<?php echo $minimum_range; ?>,<?php echo $maximum_range; ?>],
        slide:function(event, ui){
          $("#minimum_range").val(ui.values[0]);
          $("#maximum_range").val(ui.values[1]);
          //function call
          load_product(ui.values[0], ui.values[1]);
        }
      });
      function load_product(minimum_range, maximum_range){
        $.ajax({
          url:"{{route ('priceRange')}}",
          method:"GET",
          //data sent to controller
          data:{minimum_range:minimum_range, maximum_range:maximum_range},
          success:function(medicines){
            $('.medicines_area').remove();
            $('#load_product').html(medicines);
          }
        });
      }
    });

    //when the user clicks on div, open the popup
    //normal page
    function popupMessage(index){
      //get medicine id
      let alertHere=index.parentNode.parentNode.childNodes[7].childNodes[1].childNodes[2].id;
      showPopupMessage(alertHere);
    }
    //search page
    function popupMessageSearch(index){
      let alertHere=index.parentNode.childNodes[0].childNodes[1].id;
      showPopupMessage(alertHere);
    }
    function showPopupMessage(alertHere){
      //get this div
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
          <strong class="text-black">Store</strong>
        </div>
      </div>
    </div>
  </div>
  <div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12" align=center>
          @if(!Auth::user())
            <div class="text-center">
              <h2>You Must Login To Start Shopping..</h2>
              <a href="/login">
                <button style="width: 200px; margin: auto; font-size: 20px" class="btn btn-primary btn-md btn-block">Login</button>
              </a>
              <br>
            </div>
          @endif
        </div>
      </div>
      <div class="row">
        <div class="col-lg-9">
          <h3 class="mb-3 h6 text-uppercase text-black d-block">Filter by Price</h3>
          <div class="row">
            <div class="col-lg-2 text-center">
              <input type="text" name="minimum_range" id="minimum_range" class="form-control removeBorder" value="<?php echo $minimum_range; ?>"/>
            </div>
            <div class="col-lg-7">
              <div class="slider_range" style="padding-top:12px">
                <div id="price_range"></div>
              </div>
            </div>
            <div class="col-lg-3 text-center">
              <input type="text" name="maximum_range" id="maximum_range" class="form-control removeBorder" value="<?php echo $maximum_range; ?>"/>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <h3 class="mb-3 h6 text-uppercase text-black d-block">Filter by Reference</h3>
          <button type="button" class="btn btn-secondary btn-md dropdown-toggle px-4" id="dropdownMenuReference"
            data-toggle="dropdown">Reference</button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
            <a class="dropdown-item" href="/store">Relevance</a>
            <a class="dropdown-item" href="/a_zOrder">Name, A to Z</a>
            <a class="dropdown-item" href="/z_aOrder">Name, Z to A</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="/low_highPrice">Price, low to high</a>
            <a class="dropdown-item" href="/high_lowPrice">Price, high to low</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="load_product"></div>
  <div class="container medicines_area">
    <div class="row">
      @foreach($medicines as $medicine)
        <div class="col-sm-4 col-lg-4 text-center item mb-4 allMedicineInfo">
          <div class="row">
            <img src="/img/{{$medicine->medicine_image}}" alt="Image" height="400px">
          </div>
          <div class="row">
            <h3 class="text-dark">{{$medicine->medicine_name}}</h3>
          </div>
          <div class="row">
            <p class="price">{{$medicine->medicine_price}} L.E</p>
          </div>
          <div class="row">
            @if(Auth::user())
              <div class="popup" onclick="popupMessage(this)"><button class="btn btn-warning px-4 py-3" onclick="addToCart({{$medicine->id}})">Add To Cart</button>
                <span class="popuptext">Added To Cart!</span>
                <script>
                  //show popup here
                  $(".allMedicineInfo .popup:last span").attr({id:"myPopup"+counter});
                  counter++;
                </script>
              </div>
            @endif
            <a href="/shopSingle/{{$medicine->id}}" class="btn btn-primary px-4 py-3">Show</a>
          </div>

        </div>
      @endforeach
    </div>
  </div>
  <br><br>
  <div class="blocktext">
    {{$medicines->links()}}
  </div>
@endsection
