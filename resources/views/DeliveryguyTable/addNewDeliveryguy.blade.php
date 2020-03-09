@extends('pharmacyManagement')

@section('title')
    Add New Deliveryguy
@endsection

@section('content')
    <div class="container">
        <br/>
        <div class="page-header">
            <h1>Add New Deliveryguy</h1>
            <a href="/allDeliveryguys" class="btn btn-primary">
                View All Deliveryguys..
            </a>
        </div>
        <br/>
        <form action='/allDeliveryguys' method='POST'>
            @csrf
            <div class="form-group {{ $errors->has('deliveryguy_firstname') ? 'has-error' : '' }}">
                <label for="deliveryguy_firstname" class="control-label">First Name:</label>
                <input type='text' name='deliveryguy_firstname' class="form-control" id="deliveryguy_firstname" value="{{ old('deliveryguy_firstname') }}"/>
                <span class="text-danger">{{ $errors->first('deliveryguy_firstname') }}</span>
            </div>
            <br>
            <div class="form-group {{ $errors->has('deliveryguy_lastname') ? 'has-error' : '' }}">
                <label for="deliveryguy_lastname" class="control-label">Last Name:</label>
                <input type='text' name='deliveryguy_lastname' class="form-control" id="deliveryguy_lastname" value="{{ old('deliveryguy_lastname') }}"/>
                <span class="text-danger">{{ $errors->first('deliveryguy_lastname') }}</span>
            </div>
            <br>
            <div class="form-group {{ $errors->has('deliveryguy_salary') ? 'has-error' : '' }}">
                <label for="deliveryguy_salary" class="control-label">Salary:</label>
                <input type='text' name='deliveryguy_salary' class="form-control" id="deliveryguy_salary" value="{{ old('deliveryguy_salary') }}"/>
                <span class="text-danger">{{ $errors->first('deliveryguy_salary') }}</span>
            </div>
            <br>
            <div class="form-group {{ $errors->has('deliveryguy_startjob') ? 'has-error' : '' }}">
                <label for="deliveryguy_startjob" class="control-label">Start Job Date:</label>
                <input type='date' name='deliveryguy_startjob' class="form-control" id="deliveryguy_startjob" value="{{ old('deliveryguy_startjob') }}"/>
                <span class="text-danger">{{ $errors->first('deliveryguy_startjob') }}</span>
            </div>
            <br>
            <div class="form-group {{ $errors->has('deliveryguy_city') ? 'has-error' : '' }}">
                <label for="deliveryguy_city" class="control-label">City:</label>
                <input type='text' name='deliveryguy_city' class="form-control" id="deliveryguy_city" value="{{ old('deliveryguy_city') }}"/>
                <span class="text-danger">{{ $errors->first('deliveryguy_city') }}</span>
            </div>
            <br>
            <div class="form-group {{ $errors->has('deliveryguy_street') ? 'has-error' : '' }}">
                <label for="deliveryguy_street" class="control-label">Street:</label>
                <input type='text' name='deliveryguy_street' class="form-control" id="deliveryguy_street" value="{{ old('deliveryguy_street') }}"/>
                <span class="text-danger">{{ $errors->first('deliveryguy_street') }}</span>
            </div>
            <br>
            <div class="form-group {{ $errors->has('deliveryguy_phone') ? 'has-error' : '' }}">
                <label for="deliveryguy_phone" class="control-label">Mobile No:</label>
                <input type='text' name='deliveryguy_phone' class="form-control" id="deliveryguy_phone" value="{{ old('deliveryguy_phone') }}"/>
                <span class="text-danger">{{ $errors->first('deliveryguy_phone') }}</span>
            </div>
            <br>
            <div class="text-center">
                <button type='submit' class="btn btn-success"/>Add New Deliveryguy
                </button>
            </div>
        </form>
        <br/>
    </div>
@endsection