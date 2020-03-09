@extends('master')
@section('main-content')
  <div class="site-blocks-cover" style="background-image: url('images/hero_1.jpg');">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 mx-auto order-lg-2 align-self-center">
          <div class="site-block-cover-content text-center">
            <h2 class="sub-title" style="font-size: 20px; color: white; background: black">Effective Medicine, New Medicine Everyday</h2>
            <h1 style="font-size: 100px; color: black">Welcome To Pharma</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="site-section">
    <div class="container">
      <div class="row">
        <div class="title-section text-center col-12">
          <h2 class="text-uppercase">Popular Products</h2>
        </div>
      </div>
      <div class="row">
        <?php $counter=0; ?>
          @foreach($medicines as $medicine)
        <?php if($counter==3) break; ?>
  			<div class="col-sm-6 col-lg-4 text-center item mb-4">
          <a href="shop-single.html">
            <img src="/img/{{$medicine->medicine_image}}" alt="Image" width="300px">
          </a>
          <h3 class="text-dark">
            <a href="shop-single.html">{{$medicine->medicen_name}}</a>
          </h3>
          <p class="price">{{$medicine->medicine_price}} L.E</p>
        </div>
        <?php $counter++; ?>
  		    @endforeach
      </div>
      <div class="row mt-5">
        <div class="col-12 text-center">
          <a href="/store" class="btn btn-primary px-4 py-3">View All Products</a>
        </div>
      </div>
    </div>
  </div>
@endsection