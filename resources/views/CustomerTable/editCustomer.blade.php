@extends('pharmacyManagement')

@section('title')
Edit Customer
@endsection

@section('content')
	<div class="container">
		<br/>
		<div class="page-header">
			<h1>Edit Customer</h1>
			<a href="/allCustomers" class="btn btn-primary">
		        View All Customers..
		    </a>
		</div>
		<br/>
		<form action='/editCustomer/{{$customer->id}}/updateCustomer' method='POST'>
			@csrf
			<div class="form-group {{ $errors->has('customer_firstname') ? 'has-error' : '' }}">
				<label for="customer_firstname" class="control-label">Fisrt Name:</label>
				<input type='text' name='customer_firstname' class="form-control" id="customer_firstname" value="{{$customer->customer_firstname}}"/>
				<span class="text-danger">{{ $errors->first('customer_firstname') }}</span>
			</div>
			<br>
			<div class="form-group {{ $errors->has('customer_lastname') ? 'has-error' : '' }}">
				<label for="customer_lastname" class="control-label">Last Name:</label>
				<input type='text' name='customer_lastname' class="form-control" id="customer_lastname" value="{{$customer->customer_lastname}}"/>
				<span class="text-danger">{{ $errors->first('customer_lastname') }}</span>
			</div>
			<br>
			<div class="form-group {{ $errors->has('customer_city') ? 'has-error' : '' }}">
				<label for="customer_city" class="control-label">City:</label>
				<input type='text' name='customer_city' class="form-control" id="customer_city" value="{{$customer->customer_city}}"/>
				<span class="text-danger">{{ $errors->first('customer_city') }}</span>
			</div>
			<br>
			<div class="form-group {{ $errors->has('customer_street') ? 'has-error' : '' }}">
				<label for="customer_street" class="control-label">Street:</label>
				<input type='text' name='customer_street' class="form-control" id="customer_street" value="{{$customer->customer_street}}"/>
				<span class="text-danger">{{ $errors->first('customer_street') }}</span>
			</div>
			<br>
			<div class="form-group {{ $errors->has('customer_phone') ? 'has-error' : '' }}">
				<label for="customer_phone" class="control-label">Mobile No:</label>
				<input type='text' name='customer_phone' class="form-control" id="customer_phone" value="{{$customer->customer_phone}}"/>
				<span class="text-danger">{{ $errors->first('customer_phone') }}</span>
			</div>
			<br>
			<div class="text-center">
				<button type='submit' class="btn btn-success"/>Save Updates
				</button>
			</div>
		</form>
		<br/>
	</div>
@endsection
