@extends('master')

@section('search-bar')
  <script>
    function loadMedicines(letters){
        $.ajax({
          url:"{{route ('filteredMedicines')}}",
          method:"GET",
          data:{letters:letters,storeORcart:'cart'},
          success:function(result){
            $('#medicines_area').remove();
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
  <div class="bg-light py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0">
          <!-- page path -->
          <a href="/index">Home</a>
          <span class="mx-2 mb-0">/</span> 
          <strong class="text-black">Cart</strong>
        </div>
      </div>
    </div>
  </div>
  <br>
  <!-- if medicine quantity isn't available in store -->
  @if ($message = Session::get('warning'))
  <div align=center>
    <div class="alert alert-warning alert-block text-center" style="width: 800px">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
  </div>
  @endif
  <div class="site-section">
    <div class="container">
      @if ($numberOfItemsInCart == 0)
        <div class="text-center">
          <h2>Your cart is empty..</h2>
          <a href="/store">
            <button style="width: 400px; margin: auto;" class="btn btn-primary btn-md btn-block">Start Shopping</button>
          </a>
        </div>
      @else
      <div class="row mb-5">
        <form class="col-md-12" method="post">
          <div class="site-blocks-table">
            <!-- cart table -->
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th class="product-thumbnail">Image</th>
                  <th class="product-name">Product</th>
                  <th class="product-price">Price</th>
                  <th class="product-quantity">Quantity</th>
                  <th class="product-total">Total</th>
                  <th class="product-remove">Remove</th>
                </tr>
              </thead>
              <tbody id="load_product"></tbody>
              <tbody id="medicines_area">
                @foreach($carts as $cart)
                <tr>
                  <td class="product-thumbnail">
                    <img src="/img/{{$medicineArray[((int)$cart->medicine_id)]['image']}}" alt="Image" class="img-fluid">
                  </td>
                  <td class="product-name">
                    <h2 class="h5 text-black">{{$medicineArray[((int)$cart->medicine_id)]['name']}}</h2>
                  </td>
                  <td>{{$cart->cart_single_price}}</td>
                  <td>
                    <div class="input-group mb-3" style="max-width: 120px;">
                      <div class="input-group-prepend">
                        <button class="btn btn-outline-primary js-btn-minus" type="button" onclick="minus(this)">&minus;</button>
                      </div>
                      <input type="text" class="form-control text-center onchange" value="{{$cart->cart_quantity}}" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                      <div class="input-group-append">
                        <button class="btn btn-outline-primary js-btn-plus" type="button" onclick="plus(this)">&plus;</button>
                      </div>
                    </div>
                  </td>
                  <td>{{$cart->cart_total_price}}</td>
                  <td>
                    <a href="/deleteFromCart/{{$cart->id}}" class="btn btn-danger">X</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </form>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="row mb-5">
            <div class="col-md-6">
              <a href="/emptyCart">
                <button class="btn btn-primary btn-md btn-block">Empty Cart</button>
              </a>
            </div>
            <div class="col-md-6">
              <a href="/store">
                <button class="btn btn-outline-primary btn-md btn-block">Continue Shopping</button>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 pl-5">
          <div class="row justify-content-end">
            <div class="col-md-7">
              <div class="row">
                <div class="col-md-12 text-right border-bottom mb-5">
                  <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                </div>
              </div>
              <div class="row mb-5">
                <div class="col-md-6">
                  <span class="text-black">Total</span>
                </div>
                <div class="col-md-6 text-right">
                  <strong class="text-black" id="totalPrice">{{$totalPrice}}</strong>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <button class="btn btn-primary btn-lg btn-block" onclick="window.location='/checkout'">Proceed To Checkout</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endif
    </div>
  </div>
@endsection
