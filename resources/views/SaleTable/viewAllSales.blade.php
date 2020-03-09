@extends('pharmacyManagement')

@section('title')
All Sales
@endsection

@section('content')
    <div class="container">
        <br/>
        <div class="page-header">
            <h1>All Sales</h1>
            <a href="/newSale" class="btn btn-success">
                Add New Sale..
            </a>
        </div>
        <br/>     
        <div class="content">            
            <table class="table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Total Price</th>
                        <th>Pharmacist Name</th>
                        <th>List</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sales as $sale)
                        <tr>
                            <td>{{$sale->sale_date}}</td>
                            <td>{{$sale->sale_time}}</td>
                            <td>{{$sale->sale_totalprice}}</td>
                            <td>
                                @foreach($pharmacistName[((int)$sale->pharmacist_id)] as $val)
                                    {{$val}} 
                                @endforeach
                            </td>
                            <td>{{$sale->sale_list}}</td>
                            <td>
                                <a href="/deleteSale/{{$sale->id}}" class="btn btn-danger">Delete</a>
                            </td>
                            <td>
                                <a href="/editSale/{{$sale->id}}" class="btn btn-warning">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>          
        <br/>
    </div>
    <div class="blocktext">
        {{$sales->links()}}
    </div>
@endsection