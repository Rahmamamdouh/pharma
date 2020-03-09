@extends('pharmacyManagement')

@section('title')
Add New Sale
@endsection

@section('content')
	<script>
		$(document).ready(function(){
	    	let counter=1;
	        $("#addMedicineLabel").on("click",function(){
	        	$("#lastDIV").append("<div></div>");
	        	$("#lastDIV div:last").attr({
	        		id:"outterDIV"+counter,
	        		class:"form-group"
	        	});
	        	$("#lastDIV div:last").append(`
    				<div class="form-inline">
        				<select class="form-control"></select>
				        <input type="number" class="form-control" value="1" min="1" max="5"/>
				        <input type="button" class="btn btn-danger deleteButton" onclick="deleteMedicineInput()" value="X">
    				</div>
    				<br>
	        	`);
	        	$("#lastDIV #outterDIV"+counter+" div select").attr("name","sale_medicine"+counter);
	        	$("#lastDIV #outterDIV"+counter+" div input:first").attr("name","medicine_quantity"+counter);

	        	@foreach($medicines as $medicine)
	        		$("#lastDIV #outterDIV"+counter+" div select").append("<option></option>");
	        		$("#lastDIV #outterDIV"+counter+" div select option:last").attr("value","{{$medicine->id}}");
					$("#lastDIV #outterDIV"+counter+" div select option:last").text("{{$medicine->medicine_name}}");
            	@endforeach
				counter++;
			});
			$(function(){     
				var d=new Date(),        
				h=d.getHours(),
				m=d.getMinutes();
				if(h<10)h='0'+h; 
				if(m<10)m='0'+m; 
				$('input[type="time"][value="now"]').attr({'value':h+':'+m});
			});
	    });
	    function deleteMedicineInput(){
			$("#lastDIV div").last().remove();
			$("#lastDIV div").last().remove();
		}
	</script>
	<!-- if medicine quantity isn't available in store -->
	@if ($message = Session::get('warning'))
        <div class="alert alert-warning alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
    @endif
    <!-- show all errors -->
	@if(count($errors))
		<div class="alert alert-danger">
			<strong>Whoops!</strong> There were some problems with your input.
			<br/>
			<ul>
				@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	<div class="container">
		<br/>
		<div class="page-header">
			<h1>Add New Sale</h1>
			<a href="/allSales" class="btn btn-primary">
		        View All Sale
		    </a>
		</div>
		<br/>
		<form action='/allSales' method='POST'>
			@csrf
			<div class="form-group {{ $errors->has('sale_date') ? 'has-error' : '' }}">
				<label for="sale_date" class="control-label">Date:</label>
				<input type="date" name="sale_date" class="form-control" value="<?= date("Y-m-d"); ?>"/>
				<span class="text-danger">{{ $errors->first('sale_date') }}</span>
			</div>
			<br>
			<div class="form-group {{ $errors->has('sale_time') ? 'has-error' : '' }}">
				<label for="sale_time" class="control-label">Time:</label>
				<input type="time" name="sale_time" class="form-control" value="now"/>
				<span class="text-danger">{{ $errors->first('sale_time') }}</span>
			</div>
			<br>			
			<div class="form-group {{ $errors->has('sale_pharmacist') ? 'has-error' : '' }}">
                <label for="sale_pharmacist" class="control-label">Pharmacist:</label>
                <select class="form-control" name="sale_pharmacist">
                    @foreach($pharmacists as $pharmacist)
                        <option value="{{$pharmacist->id}}">{{$pharmacist->pharmacist_firstname}} {{$pharmacist->pharmacist_lastname}}</option>
                    @endforeach
                </select>
                <span class="text-danger">{{ $errors->first('sale_pharmacist') }}</span>
            </div>            
			<br>
			<div class="form-group {{ $errors->has('sale_medicine0') ? 'has-error' : '' }}">
                <label for="sale_medicine0" class="control-label">Medicine:</label>
                <div class="form-inline">
	                <select class="form-control" name="sale_medicine0">
	                    @foreach($medicines as $medicine)
	                        <option value="{{$medicine->id}}">{{$medicine->medicine_name}}</option>
	                    @endforeach
	                </select>
	                <span class="text-danger">{{ $errors->first('sale_medicine0') }}</span>
	                <input type="number" class="form-control" value="1" min="1" max="5" name="medicine_quantity0"/>
	                <span class="text-danger">{{ $errors->first('medicine_quantity0') }}</span>
                </div>
            </div>            
			<br>
			<div id="lastDIV"></div>
			<a id="addMedicineLabel" class="btn btn-warning add">Add Medicine..</a>
			<br>
			<br>
			<div class="text-center">
				<button type="submit" class="btn btn-success"/>Add New Sale
				</button>
			</div>
		</form>
		<br/>
	</div>
@endsection