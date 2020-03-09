@extends('pharmacyManagement')

@section('title')
Edit Store
@endsection

@section('content')
	<div class="container">
		<br/>
		<div class="page-header">
			<h1>Edit Medicine in the Store</h1>
			<a href="/allStores" class="btn btn-primary">
		        View All Medicines in the Store
		    </a>
		</div>
		<br/>
		<form action='/editStore/{{$store->id}}/updateStore' method='POST'>
			@csrf
			<div class="form-group {{ $errors->has('store_medicine_name') ? 'has-error' : '' }}">
                <label for="store_medicine_name" class="control-label">Medicine Name:</label>
                <select class="form-control" id="store_medicine_name" name="store_medicine_name">
                    @foreach($medicines as $medicine)
                    	@if ($currentMedicine == $medicine->medicine_name)
                        	<option value="{{$medicine->id}}" selected>{{$medicine->medicine_name}}</option>
                        @else
                        	<option value="{{$medicine->id}}">{{$medicine->medicine_name}}</option>
                        @endif
                    @endforeach
                </select>
                <span class="text-danger">{{ $errors->first('store_medicine_name') }}</span>
            </div>
			<br>
			<div class="form-group {{ $errors->has('store_expire') ? 'has-error' : '' }}">
				<label for="store_expire" class="control-label">Medicine Expire:</label>
				<input type='date' name='store_expire' class="form-control" id="store_expire" value="{{$store->store_expire}}"/>
				<span class="text-danger">{{ $errors->first('store_expire') }}</span>
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