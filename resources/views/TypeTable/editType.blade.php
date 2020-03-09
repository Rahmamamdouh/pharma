@extends('pharmacyManagement')

@section('title')
Edit Type
@endsection

@section('content')
	<div class="container">
		<br/>
		<div class="page-header">
			<h1>Edit Medicine Type</h1>
			<a href="/allTypes" class="btn btn-primary">
		        View All Types..
		    </a>
		</div>
		<br/>
		<form action='/editType/{{$type->id}}/updateType' method='POST'>
			@csrf
			<div class="form-group {{ $errors->has('type_name') ? 'has-error' : '' }}">
				<label for="type_name" class="control-label">Medicine Type:</label>
				<input type='text' name='type_name' class="form-control" id="type_name" value="{{$type->type_name}}"/>
				<span class="text-danger">{{ $errors->first('type_name') }}</span>
			</div>
			<div class="text-center">
				<button type='submit' class="btn btn-success"/>Save Updates
				</button>
			</div>
		</form>
		<br/>
	</div>
@endsection