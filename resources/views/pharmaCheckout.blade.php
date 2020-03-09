@extends('master')
@section('main-content')
  <div class="bg-light py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0">
          <a href="/index">Home</a> <span class="mx-2 mb-0">/</span>
          <strong class="text-black">Checkout</strong>
        </div>
      </div>
    </div>
  </div>
  <div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-md-6 mb-5 mb-md-0">
          <h2 class="h3 mb-3 text-black">Billing Details</h2>
          <div class="p-3 p-lg-5 border" style="color: black; height: 500px">
            <form method="POST" action="/thankyou">
              @csrf
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group {{ $errors->has('customer_firstname') ? 'has-error' : '' }}">
                    <label for="customer_firstname" class="text-black">First Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="customer_firstname" name="customer_firstname" value="{{ old('customer_firstname') }}">
                    <span class="text-danger">{{ $errors->first('customer_firstname') }}</span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group {{ $errors->has('customer_lastname') ? 'has-error' : '' }}">
                    <label for="customer_lastname" class="text-black">Last Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="customer_lastname" name="customer_lastname" value="{{ old('customer_lastname') }}">
                    <span class="text-danger">{{ $errors->first('customer_lastname') }}</span>
                  </div>
                </div>
              </div>
              <div class="form-group row mb-5">
                <div class="col-md-12">
                  <div class="form-group {{ $errors->has('customer_phone') ? 'has-error' : '' }}">
                    <label for="customer_phone" class="text-black">Mobile No <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="customer_phone" name="customer_phone" placeholder="Mobile Number" value="{{ old('customer_phone') }}">
                    <span class="text-danger">{{ $errors->first('customer_phone') }}</span>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-6">
                  <div class="form-group {{ $errors->has('customer_city') ? 'has-error' : '' }}">
                    <label for="customer_city" class="text-black">City <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="customer_city" name="customer_city" value="{{ old('customer_city') }}">
                    <span class="text-danger">{{ $errors->first('customer_city') }}</span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group {{ $errors->has('customer_street') ? 'has-error' : '' }}">
                    <label for="customer_street" class="text-black">Street <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="customer_street" name="customer_street" value="{{ old('customer_street') }}">
                    <span class="text-danger">{{ $errors->first('customer_street') }}</span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <button class="btn btn-primary btn-lg btn-block" onclick="window.location='/thankyou'">Place Order</button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-6 mb-5 mb-md-0">
          <h2 class="h3 mb-3 text-black">Pharmacy Work Hours & Delivery Areas</h2>
          <div class="p-3 p-lg-5 border" style="color: black; height: 500px">
            <div class="row">
              <h4>Hours Of Operation</h4>
            </div>
            <div>
              Saturday – Thursday
              <li style="color: #51eaea">6:00 AM – 12:00 PM</li>
              Friday
              <li style="color: #51eaea">8:00 AM – 10:00 PM</li>
            </div>
            <br>
            <div class="row">
              <h4>Medication Delivery</h4>
            </div>
            <div>
              We deliver door-to-door in Aswan and we ship regionally throughout Egypt. Contact us today to see if your address falls within our compounding pharmacy medications delivery area.
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection