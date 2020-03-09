@extends('pharmacyManagement')

@section('title')
Add New Customer
@endsection

@section('content')
<!-- @if(count($errors))
	<div class="alert alert-danger">
		<strong>Whoops!</strong> There were some problems with your input.
		<br/>
		<ul>
			@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif -->
	<div class="container">
		<br/>
		<div class="page-header">
			<h1>Add New Customer</h1>
			<a href="/allCustomers" class="btn btn-primary">
		        View All Customers..
		    </a>
		</div>
		<br/>
		<form action='/allCustomers' method='POST'>
			@csrf
			<div class="form-group {{ $errors->has('customer_firstname') ? 'has-error' : '' }}">
				<label for="customer_firstname" class="control-label">Fisrt Name:</label>
				<input type='text' name='customer_firstname' class="form-control" id="customer_firstname" value="{{ old('customer_firstname') }}"/>
				<span class="text-danger">{{ $errors->first('customer_firstname') }}</span>
			</div>
			<br>
			<div class="form-group {{ $errors->has('customer_lastname') ? 'has-error' : '' }}">
				<label for="customer_lastname" class="control-label">Last Name:</label>
				<input type='text' name='customer_lastname' class="form-control" id="customer_lastname" value="{{ old('customer_lastname') }}"/>
				<span class="text-danger">{{ $errors->first('customer_lastname') }}</span>
			</div>
			<br>
			<div class="form-group {{ $errors->has('customer_city') ? 'has-error' : '' }}">
				<label for="customer_city" class="control-label">City:</label>
				<input type='text' name='customer_city' class="form-control" id="customer_city" value="{{ old('customer_city') }}"/>
				<span class="text-danger">{{ $errors->first('customer_city') }}</span>
			</div>
			<br>
			<div class="form-group {{ $errors->has('customer_street') ? 'has-error' : '' }}">
				<label for="customer_street" class="control-label">Street:</label>
				<input type='text' name='customer_street' class="form-control" id="customer_street" value="{{ old('customer_street') }}"/>
				<span class="text-danger">{{ $errors->first('customer_street') }}</span>
			</div>
			<br>
			<div class="form-group {{ $errors->has('customer_phone') ? 'has-error' : '' }}">
				<label for="customer_phone" class="control-label">Mobile No:</label>
				<input type='text' name='customer_phone' class="form-control" id="customer_phone" value="{{ old('customer_phone') }}"/>
				<span class="text-danger">{{ $errors->first('customer_phone') }}</span>
			</div>
			<br>
			<div class="text-center">
				<button type='submit' class="btn btn-success"/>Add Newe Customer
				</button>
			</div>
		</form>
		<br/>
	</div>
@endsection
