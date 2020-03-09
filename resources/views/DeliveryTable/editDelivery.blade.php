@extends('pharmacyManagement')

@section('title')
Edit Delivery
@endsection

@section('content')
	<div class="container">
		<br/>
		<div class="page-header">
			<h1>Edit Delivery</h1>
			<a href="/allDeliveries" class="btn btn-primary">
		        View All Deliveries
		    </a>
		</div>
		<br/>
		<form action='/editDelivery/{{$delivery->id}}/updateDelivery' method='POST'>
			@csrf				
			<div class="form-group">
				<label for="delivery_date" class="control-label">Date:</label>
				<input type='date' name='delivery_date' class="form-control" value="{{$delivery->delivery_date}}"/>
			</div>
			<br>
			<div class="form-group">
				<label for="delivery_time" class="control-label">Time:</label>
				<input type='time' name='delivery_time' class="form-control" value="{{$delivery->delivery_time}}"/>
			</div>
			<br>
			<div class="form-group">
				<label for="delivery_totalprice" class="control-label">Total Price:</label>
				<input type='text' name='delivery_totalprice' class="form-control" value="{{$delivery->delivery_totalprice}}"/>
			</div>
			<br>
			<div class="form-group">
                <label for="delivery_pharmacist" class="control-label">Pharmacist:</label>
                <select class="form-control" name="delivery_pharmacist">
                    @foreach($pharmacists as $pharmacist)
                    	@if ($currentPharmacistName == $pharmacist->pharmacist_firstname.' '.$pharmacist->pharmacist_lastname)
                        	<option value="{{$pharmacist->id}}" selected>{{$pharmacist->pharmacist_firstname}} {{$pharmacist->pharmacist_lastname}}</option>
                        @else
						    <option value="{{$pharmacist->id}}">{{$pharmacist->pharmacist_firstname}} {{$pharmacist->pharmacist_lastname}}</option>
						@endif
                    @endforeach
                </select>
            </div>
            <br>
            <div class="form-group">
                <label for="delivery_customer" class="control-label">Customer:</label>
                <select class="form-control" name="delivery_customer">
                    @foreach($customers as $customer)
                    	@if ($currentCustomerName == $customer->customer_firstname.' '.$customer->customer_lastname)
                        	<option value="{{$customer->id}}" selected>{{$customer->customer_firstname}} {{$customer->customer_lastname}}
                        @else
						    <option value="{{$customer->id}}">{{$customer->customer_firstname}} {{$customer->customer_lastname}}
						@endif
                    @endforeach
                </select>
            </div>
            <br>
            <div class="form-group">
                <label for="delivery_deliveryguy" class="control-label">Delivery Guy:</label>
                <select class="form-control" name="delivery_deliveryguy">
                    @foreach($deliveryguys as $deliveryguy)
                    	@if ($currentDeliveryguyName == $deliveryguy->deliveryguy_firstname.' '.$deliveryguy->deliveryguy_lastname)
                        	<option value="{{$deliveryguy->id}}" selected>{{$deliveryguy->deliveryguy_firstname}} {{$deliveryguy->deliveryguy_lastname}}</option>
                        @else
						    <option value="{{$deliveryguy->id}}">{{$deliveryguy->deliveryguy_firstname}} {{$deliveryguy->deliveryguy_lastname}}</option>
						@endif
                    @endforeach
                </select>
            </div>
			<br>
			<div class="form-group {{ $errors->has('delivery_list') ? 'has-error' : '' }}">
				<label for="delivery_list" class="control-label">List:</label>
				<textarea type='text' name='delivery_list' class="form-control">{{$delivery->delivery_list}}</textarea>
				<span class="text-danger">{{ $errors->first('delivery_list') }}</span>
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