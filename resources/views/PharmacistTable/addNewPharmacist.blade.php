@extends('pharmacyManagement')

@section('title')
    Add New Pharmacist
@endsection

@section('content')
    <div class="container">
        <br/>
        <div class="page-header">
            <h1>Add New Pharmacist</h1>
            <a href="/allPharmacists" class="btn btn-primary">
                View All Pharmacists..
            </a>
        </div>
        <br/>
        <form action='/allPharmacists' method='POST'>
            @csrf
            <div class="form-group {{ $errors->has('pharmacist_firstname') ? 'has-error' : '' }}">
                <label for="pharmacist_firstname" class="control-label">First Name:</label>
                <input type='text' name='pharmacist_firstname' class="form-control" id="pharmacist_firstname" value="{{ old('pharmacist_firstname') }}"/>
                <span class="text-danger">{{ $errors->first('pharmacist_firstname') }}</span>
            </div>
            <br>
            <div class="form-group {{ $errors->has('pharmacist_lastname') ? 'has-error' : '' }}">
                <label for="pharmacist_lastname" class="control-label">Last Name:</label>
                <input type='text' name='pharmacist_lastname' class="form-control" id="pharmacist_lastname" value="{{ old('pharmacist_lastname') }}"/>
                <span class="text-danger">{{ $errors->first('pharmacist_lastname') }}</span>
            </div>
            <br>
            <div class="form-group {{ $errors->has('pharmacist_email') ? 'has-error' : '' }}">
                <label for="pharmacist_email" class="control-label">Email:</label>
                <input type='text' name='pharmacist_email' class="form-control" id="pharmacist_email" value="{{ old('pharmacist_email') }}"/>
                <span class="text-danger">{{ $errors->first('pharmacist_email') }}</span>
            </div>
            <br>
            <div class="form-group {{ $errors->has('pharmacist_salary') ? 'has-error' : '' }}">
                <label for="pharmacist_salary" class="control-label">Salary:</label>
                <input type='number' name='pharmacist_salary' class="form-control" id="pharmacist_salary" value="{{ old('pharmacist_salary') }}"/>
                <span class="text-danger">{{ $errors->first('pharmacist_salary') }}</span>
            </div>
            <br>
            <div class="form-group {{ $errors->has('pharmacist_startjob') ? 'has-error' : '' }}">
                <label for="pharmacist_startjob" class="control-label">Start Job Date:</label>
                <input type='date' name='pharmacist_startjob' class="form-control" id="pharmacist_startjob" value="{{ old('pharmacist_startjob') }}"/>
                <span class="text-danger">{{ $errors->first('pharmacist_startjob') }}</span>
            </div>
            <br>
            <div class="form-group {{ $errors->has('pharmacist_city') ? 'has-error' : '' }}">
                <label for="pharmacist_city" class="control-label">City:</label>
                <input type='text' name='pharmacist_city' class="form-control" id="pharmacist_city" value="{{ old('pharmacist_city') }}"/>
                <span class="text-danger">{{ $errors->first('pharmacist_city') }}</span>
            </div>
            <br>
            <div class="form-group {{ $errors->has('pharmacist_street') ? 'has-error' : '' }}">
                <label for="pharmacist_street" class="control-label">Street:</label>
                <input type='text' name='pharmacist_street' class="form-control" id="pharmacist_street" value="{{ old('pharmacist_street') }}"/>
                <span class="text-danger">{{ $errors->first('pharmacist_street') }}</span>
            </div>
            <br>
            <div class="form-group {{ $errors->has('pharmacist_phone') ? 'has-error' : '' }}">
                <label for="pharmacist_phone" class="control-label">Mobile No:</label>
                <input type='text' name='pharmacist_phone' class="form-control" id="pharmacist_phone" value="{{ old('pharmacist_phone') }}"/>
                <span class="text-danger">{{ $errors->first('pharmacist_phone') }}</span>
            </div>
            <br>
            <div class="text-center">
                <button type='submit' class="btn btn-success"/>Add New Pharmacist
                </button>
            </div>
        </form>
        <br/>
    </div>
@endsection