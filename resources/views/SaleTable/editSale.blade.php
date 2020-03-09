@extends('pharmacyManagement')

@section('title')
Edit Sale
@endsection

@section('content')
	<!-- if medicine quantity isn't available in store -->
	@if ($message = Session::get('warning'))
        <div class="alert alert-warning alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
    @endif
	<div class="container">
		<br/>
		<div class="page-header">
			<h1>Edit Sale</h1>
			<a href="/allSales" class="btn btn-primary">
		        View All Sales
		    </a>
		</div>
		<br/>
		<form action='/editSale/{{$sale->id}}/updateSale' method='POST'>
			@csrf
			<div class="form-group {{ $errors->has('sale_date') ? 'has-error' : '' }}">
				<label for="sale_date" class="control-label">Date:</label>
				<input type='date' name='sale_date' class="form-control" value="{{$sale->sale_date}}"/>
				<span class="text-danger">{{ $errors->first('sale_date') }}</span>
			</div>
			<br>
			<div class="form-group {{ $errors->has('sale_time') ? 'has-error' : '' }}">
				<label for="sale_time" class="control-label">Time:</label>
				<input type='time' name='sale_time' class="form-control" value="{{$sale->sale_time}}"/>
				<span class="text-danger">{{ $errors->first('sale_time') }}</span>
			</div>
			<br>
			<div class="form-group {{ $errors->has('sale_totalprice') ? 'has-error' : '' }}">
				<label for="sale_totalprice" class="control-label">Total Price:</label>
				<input type='text' name='sale_totalprice' class="form-control" value="{{$sale->sale_totalprice}}"/>
				<span class="text-danger">{{ $errors->first('sale_totalprice') }}</span>
			</div>
			<br>			
			<div class="form-group {{ $errors->has('sale_pharmacist') ? 'has-error' : '' }}">
                <label for="sale_pharmacist" class="control-label">Pharmacist:</label>
                <select class="form-control" name="sale_pharmacist">
                    @foreach($pharmacists as $pharmacist)
                    	@if ($currentPharmacistName == $pharmacist->pharmacist_firstname.' '.$pharmacist->pharmacist_lastname)
                        	<option value="{{$pharmacist->id}}" selected>{{$pharmacist->pharmacist_firstname}} {{$pharmacist->pharmacist_lastname}}</option>
                        @else
						    <option value="{{$pharmacist->id}}">{{$pharmacist->pharmacist_firstname}} {{$pharmacist->pharmacist_lastname}}</option>
						@endif
                    @endforeach
                </select>
                <span class="text-danger">{{ $errors->first('sale_pharmacist') }}</span>
            </div>
			<br>
			<div class="form-group {{ $errors->has('sale_list') ? 'has-error' : '' }}">
				<label for="sale_list" class="control-label">List:</label>
				<textarea type='text' name='sale_list' class="form-control">{{$sale->sale_list}}</textarea>
				<span class="text-danger">{{ $errors->first('sale_list') }}</span>
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