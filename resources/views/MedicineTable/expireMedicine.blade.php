@extends('pharmacyManagement')

@section('title')
Nearly Expired Medicines
@endsection

@section('content')
	<div class="container">
		<br/>
		<div class="page-header">
			<h1>Nearly Expired Medicines</h1>
			<a href="/allMedicines" class="btn btn-primary">
		        View All Medicines
		    </a>
		</div>
		<br/>
		<div class="content">            
		    <table class="table">
				<thead>
		            <tr>
		                <th>Name</th>
		                <th>Expire</th>
		                <th></th>
		                <th></th>
		            </tr>
		        </thead>
		        <tbody id="allMedicines">
		            @foreach($stores as $store)
		                <tr>                            
                            <td>{{$medicineArray[(int)($store->medicine_id)]}}</td>
                            <td>{{$store->store_expire}}</td>
                            <td>
                                <a href="/deleteStore/{{$store->id}}" class="btn btn-danger">Delete</a>
                            </td>
                            <td>
                                <a href="/editStore/{{$store->id}}" class="btn btn-warning">Edit</a>
                            </td>
                        </tr>
		            @endforeach
		        </tbody>
		    </table>
		</div>
		<br/>
	</div>
@endsection
