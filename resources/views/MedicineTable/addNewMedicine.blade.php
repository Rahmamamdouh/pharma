@extends('pharmacyManagement')

@section('title')
Add New Medicine
@endsection

@section('content')
<!-- <script>
	$(function(){
		$('#submit').on('click', function(){
			let hasErrors=false; 
			// let flag=0;
			if(!validate_name_number($('#medicine_name').val())){
				show_error('medicine_name', 'Invalid medicine name.');
				hasErrors=true;
			}
			if(!validate_name_number($('#medicine_companyname').val())){
				show_error('medicine_companyname', 'Invalid company name.');
				hasErrors=true;
			}
			if(!validate_number_no_limits($('#medicine_price').val())){
				show_error('medicine_price', 'Invalid price.');
				hasErrors=true;
			}
			@foreach ($types as $type)
				if($('#medicine_type')==($type->id)){
					flag=1;
				}
			@endforeach
			if(flag==0){
				show_error('medicine_type', 'Invalid type.');
				hasErrors=true;
			}
			
			if(!($('#medicine_description').val())){
				show_error('medicine_description', 'Invalid price.');
				hasErrors=true;
			}
			if(hasErrors) return false;
		})
		$('#medicine_name, #medicine_companyname, #medicine_price, #medicine_description').on('keyup', function(){
			remove_error($(this).attr('id'));
		})
	})
</script> -->
	<div class="container">
		<br/>
		<div class="page-header">
			<h1>Add New Medicine</h1>
			<a href="/allMedicines" class="btn btn-primary">
		        View All Medicines
		    </a>
		</div>
		<br/>
		<form action='/allMedicines' method='POST' enctype="multipart/form-data">
			@csrf
			<div class="form-group {{ $errors->has('medicine_name') ? 'has-error' : '' }}">
				<label for="medicine_name" class="control-label">Medicine:</label>
				<input type='text' name='medicine_name' class="form-control" id="medicine_name" value="{{ old('medicine_name') }}"/>
				<span class="text-danger">{{ $errors->first('medicine_name') }}</span>
			</div>
			<br>
			<div class="form-group {{ $errors->has('medicine_ac') ? 'has-error' : '' }}">
				<label for="medicine_ac" class="control-label">Active Constituent:</label>
				<input type='text' name='medicine_ac' class="form-control" id="medicine_ac" value="{{ old('medicine_ac') }}"/>
				<span class="text-danger">{{ $errors->first('medicine_ac') }}</span>
			</div>
			<br>
			<div class="form-group {{ $errors->has('medicine_companyname') ? 'has-error' : '' }}">
				<label for="medicine_companyname" class="control-label">Company:</label>
				<input type='text' name='medicine_companyname' class="form-control" id="medicine_companyname" value="{{ old('medicine_companyname') }}"/>
				<span class="text-danger">{{ $errors->first('medicine_companyname') }}</span>
			</div>
			<br>
			<div class="form-group {{ $errors->has('medicine_price') ? 'has-error' : '' }}">
				<label for="medicine_price" class="control-label">Price:</label>
				<input type="text" name="medicine_price" class="form-control" id="medicine_price" value="{{ old('medicine_price') }}"/>
				<span class="text-danger">{{ $errors->first('medicine_price') }}</span>
			</div>
			<br>
			<div class="form-group {{ $errors->has('medicine_type') ? 'has-error' : '' }}">
                <label for="medicine_type" class="control-label">Type:</label>
                <select class="form-control" name="medicine_type" id="medicine_type">
                    @foreach($types as $type)
                        <option value="{{$type->id}}">{{$type->type_name}}</option>
                    @endforeach
                </select>
                <span class="text-danger">{{ $errors->first('medicine_type') }}</span>
            </div>
			<br>
			<div class="form-group {{ $errors->has('medicine_description') ? 'has-error' : '' }}">
				<label for="medicine_description" class="control-label">Description:</label>
				<textarea type='text' name='medicine_description' class="form-control" id="medicine_description">{{ old('medicine_description') }}</textarea>
				<span class="text-danger">{{ $errors->first('medicine_description') }}</span>
			</div>
			<br>
			<div class="form-group {{ $errors->has('medicine_image') ? 'has-error' : '' }}">
				<label for="medicine_image" class="control-label">Image:</label>
				<br>
				<label for="medicine_image" class="control-label btn btn-primary search-file-btn">
			    	<input name="medicine_image" type="file" class="form-control" id="medicine_image" style="display:None;">
			    	<span style="color: white">Choose file</span>
				</label>
				<span id="current_image">No file selected</span>
				<br>
				<span class="text-danger">{{ $errors->first('medicine_image') }}</span>
			</div>
			<br>
			<div class="text-center">
				<button type='submit' id="submit" class="btn btn-success"/>Add New Medicine</button>
			</div>
		</form>
		<br/>
	</div>
@endsection
