@extends('pharmacyManagement')

@section('title')
Add New Medicine to Store
@endsection

@section('content')
	<div class="container">
		<br/>
		<div class="page-header">
			<h1>Add New Medicine to Store</h1>
			<a href="/allStores" class="btn btn-primary">
		        View All Medicines in Store
		    </a>
		</div>
		<br/>
		<form action='/allStores' method='POST'>
			@csrf
			<div class="form-group {{ $errors->has('store_medicine_name') ? 'has-error' : '' }}">
                <label for="store_medicine_name" class="control-label">Medicine Name:</label>
                <select class="form-control" id="store_medicine_name" name="store_medicine_name">
                    @foreach($medicines as $medicine)
                        <option value="{{$medicine->id}}">{{$medicine->medicine_name}}</option>
                    @endforeach
                </select>
                <span class="text-danger">{{ $errors->first('store_medicine_name') }}</span>
            </div>
			<br>
			<div class="form-group {{ $errors->has('store_expire') ? 'has-error' : '' }}">
				<label for="store_expire" class="control-label">Medicine Expire:</label>
				<input type='date' name='store_expire' class="form-control" id="store_expire" value="{{ old('store_expire') }}"/>
				<!-- value="2022-03-15" -->
				<span class="text-danger">{{ $errors->first('store_expire') }}</span>
			</div>
			<br>
			<div class="text-center">
				<button type='submit' class="btn btn-success"/>Add New Medicine
				</button>
			</div>
		</form>
		<br/>
	</div>
@endsection
