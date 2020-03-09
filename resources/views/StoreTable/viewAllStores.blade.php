@extends('pharmacyManagement')

@section('title')
All Stores
@endsection

@section('content')
    <div class="container">
        <br/>
        <div class="page-header">
            <h1>All Medicines in Store</h1>
            <a href="/newStore" class="btn btn-success">
                Add New Medicine To Store..
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
                <tbody>
                    @foreach($stores as $store)
                        <tr>                            
                            <td>{{$medicineArray[((int)$store->medicine_id)]}}</td>
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
    <div class="blocktext">
        {{$stores->links()}}
    </div>
@endsection