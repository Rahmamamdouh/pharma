<!DOCTYPE html>
<html lang="en">
<head> 
  <title>Pharma</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Rubik:400,700|Crimson+Text:400,400i" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('fonts')}}/icomoon/style.css">
  <link rel="stylesheet" href="{{asset('css')}}/bootstrap.min.css">
  <link rel="stylesheet" href="{{asset('css')}}/magnific-popup.css">
  <link rel="stylesheet" href="{{asset('css')}}/jquery-ui.css">
  <link rel="stylesheet" href="{{asset('css')}}/owl.carousel.min.css">
  <link rel="stylesheet" href="{{asset('css')}}/owl.theme.default.min.css">
  <link rel="stylesheet" href="{{asset('css')}}/aos.css">
  <link rel="stylesheet" href="{{asset('css')}}/style.css">
  <link rel="shortcut icon" href="{{asset('css/pharma.png')}}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <script>
  $(document).ready(function(){
    //view cart counter in all pages
    load_items();
    function load_items(){
      $.ajax({
        url:"{{route ('cartItems')}}",
        method:"GET",
        success:function(response){
          $('#numberOfItemsInCart').html(response);
        }
      });
    } 

    // $('#customer_firstname, #customer_lastname, #customer_city, #customer_street, #customer_phone').on('keyup', function(){
    //   remove_error($(this).attr('id'));
    // })

    // function remove_error(field){
    //   $('#' + field)
    //   .parents('.form-group')
    //   .removeClass('has-error')
    //   .find('.text-danger')
    //   .html('');
    // }
    
  })

  //update cart data (total price) in cart page
  function updateCart(quantity,index,medicineName,minusORplus){
    $.ajax({
      url:"{{route ('updateCart')}}",
      method:"GET",
      data:{quantity:quantity,medicineName:medicineName,minusORplus:minusORplus},
      success:function(response){
        $('#totalPrice').html(response.totalPrice);
        index.parentNode.parentNode.parentNode.parentNode.childNodes[9].innerHTML=response.medicineTotalPrice;
      }
    });
  }
  function minus(index){
    //medicine quantity
    let quantity=index.parentNode.parentNode.childNodes[3].value;
    if(quantity==1){
      index.parentNode.parentNode.childNodes[3].value=2;
    }
    else{
      //medicine name
      medicineName=index.parentNode.parentNode.parentNode.parentNode.childNodes[3].childNodes[1].innerHTML;
      updateCart(quantity,index,medicineName,'minus');
    }
  }
  function plus(index){
    //medicine quantity
    let quantity=index.parentNode.parentNode.childNodes[3].value;
    //medicine name
    medicineName=index.parentNode.parentNode.parentNode.parentNode.childNodes[3].childNodes[1].innerHTML;
    updateCart(quantity,index,medicineName,'plus');
  }
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
  </script>


  <style>
    .col-md-8{
      margin-left: auto;
      margin-right: auto;
      margin-center;
    }
    .removeBorder{
      border: none transparent;
    }
    .slider_range{
      color: #51eaea;
      width:100%;
    }
    .ui-widget-content{
      border: 1px solid #51eaea;
    }
    .ui-widget-header{
      background: #51eaea;
    }
    .form-inline input{
      margin: 5px 10px 5px 0;
    }
    .blocktext{
        text-align: center;
        width: 40em
    }
    div.blocktext{
        margin-left: auto;
        margin-right: auto;
        margin: center;
        width: 15em;
    }
    b{
      color: black;
    }

    /* Popup container - can be anything you want */
    .popup{
      position: relative;
      display: inline-block;
      cursor: pointer;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    /* The actual popup body */
    .popup .popuptext{
      visibility: hidden;
      width: 160px;
      background-color: #4CA64C;
      color: #fff;
      text-align: center;
      border-radius: 6px;
      padding: 8px 0;
      position: absolute;
      z-index: 1;
      bottom: 125%;
      left: 50%;
      margin-left: -80px;
    }

    /* Popup arrow */
    .popup .popuptext::after{
      content: "";
      position: absolute;
      top: 100%;
      left: 50%;
      margin-left: -5px;
      border-width: 5px;
      border-style: solid;
      border-color: #4CA64C transparent transparent transparent;
    }

    /* Toggle this class - hide and show the popup */
    .popup .show{
      visibility: visible;
      -webkit-animation: fadeIn 1s;
      animation: fadeIn 1s;
    }

    /* Add animation (fade in the popup) */
    @-webkit-keyframes fadeIn{
      from {opacity: 0;} 
      to {opacity: 1;}
    }

    @keyframes fadeIn{
      from {opacity: 0;}
      to {opacity:1 ;}
    }





  </style>
</head>
<body ng-app="">
  <div class="site-wrap">
    <div class="site-navbar py-2">
      <div class="search-wrap">
        <div class="container">
          <a href="#" class="search-close js-search-close">
            <span class="icon-close2"></span>
          </a>
          <form action="#" method="post">
            <input type="text" class="form-control" placeholder="Search keyword.." onkeyup="loadLetters(this)">
          </form>
        </div>
      </div>
      <div class="container">
        <div class="d-flex align-items-center justify-content-between">
          <div class="logo">
            <div class="site-logo">
              <a href="/index" class="js-logo-clone">Pharma</a>
            </div>
          </div>
          <div class="main-nav d-none d-lg-block">
            <nav class="site-navigation text-right text-md-center" role="navigation">
              <ul class="site-menu js-clone-nav d-none d-lg-block">
                <li class="active"><a href="/index">Home</a></li>
                <li><a href="/about">About</a></li>
				        <li><a href="/service">Service</a></li>
                <li><a href="/store">Store</a></li>
                @if(Auth::user())
                  <li><a href="/cart">cart</a></li>
                @endif
                {{-- <li class="has-children">
                  <a href="#">Dropdown</a>
                  <ul class="dropdown">
                    <li><a href="#">Supplements</a></li>
                    <li class="has-children">
                      <a href="#">Vitamins</a>
                      <ul class="dropdown">
                        <li><a href="#">Supplements</a></li>
                        <li><a href="#">Vitamins</a></li>
                        <li><a href="#">Diet &amp; Nutrition</a></li>
                        <li><a href="#">Tea &amp; Coffee</a></li>
                      </ul>
                    </li>
                    <li><a href="#">Diet &amp; Nutrition</a></li>
                    <li><a href="#">Tea &amp; Coffee</a></li>
                  </ul>
                </li> --}}
        			@guest
            			<li><a href="/register">Register</a></li>
            			<li><a href="/login">Login</a></li>
            		@else
            			<li><a href="/login">Logout</a></li>
                    @endguest
              </ul>
            </nav>
          </div>
		  <div class="icons">
            <!-- search icon -->
            @yield('search-bar')
            <!-- cart icon -->
            @if(Auth::user())
              <a href="/cart" class="icons-btn d-inline-block bag">
                <span class="icon-shopping-bag"></span>
                <span class="number" id="numberOfItemsInCart"></span>
              </a>
            @endif
            <!-- menu icon -->
            <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none">
              <span class="icon-menu"></span>
            </a>
          </div>
        </div>
      </div>
    </div>
		@yield('main-content')
    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
            <div class="block-7">
              <h3 class="footer-heading mb-4">About Us</h3>
              <p>
                Pharmacy industry is one of the most strictly monitored and controlled industry. Our pharmacists and pharmacy providers also maintain the same high standard in their operations. Therfor, pharmacy staff is our most important resource.
              </p>
            </div>
          </div>
          <div class="col-lg-3 mx-auto mb-5 mb-lg-0">
            <h3 class="footer-heading mb-4">Quick Links</h3>
            <ul class="list-unstyled">
              <li><a href="/index">Home</a></li>
              <li><a href="/about">About</a></li>
              <li><a href="/store">Store</a></li>
              <li><a href="/cart">Cart</a></li>
            </ul>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="block-5 mb-5">
              <h3 class="footer-heading mb-4">Contact Info</h3>
              <ul class="list-unstyled">
                <li class="address">203 Fake St. Atlas, Aswan, Egypt</li>
                <li class="phone"><a href="tel://23923929210">+2 392 3929 210</a></li>
                <li class="email">pharma@gmail.com</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>
  <script src="{{asset('js')}}/jquery-3.3.1.min.js"></script>
  <script src="{{asset('js')}}/jquery-ui.js"></script>
  <script src="{{asset('js')}}/popper.min.js"></script>
  <script src="{{asset('js')}}/bootstrap.min.js"></script>
  <script src="{{asset('js')}}/owl.carousel.min.js"></script>
  <script src="{{asset('js')}}/jquery.magnific-popup.min.js"></script>
  <script src="{{asset('js')}}/aos.js"></script>
  <script src="{{asset('js')}}/main.js"></script>
</body>
</html>
