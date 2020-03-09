@extends('pharmacyManagement')

@section('title')
All Cusomers
@endsection

@section('content')
    <div class="container">
        <br/>
        <div class="page-header">
            <h1>All Customers</h1>
            <a href="/newCustomer" class="btn btn-success">
                Add New Customer..
            </a>
        </div>
        <br/>     
        <div class="content">            
            <table class="table">
                <thead>
                    <tr>
                        <th style="text-align: center">Name</th>
                        <th style="text-align: center">Address</th>
                        <th style="text-align: center">Phone</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $customer)
                        <tr>
                            <td>
                                {{$customer->customer_firstname}}
                                {{$customer->customer_lastname}}
                            </td>
                            <td>
                                {{$customer->customer_street}}-
                                {{$customer->customer_city}}
                            </td>
                            <td>{{$customer->customer_phone}}</td>
                            <td>
                                <a href="/deleteCustomer/{{$customer->id}}" class="btn btn-danger">Delete</a>
                            </td>
                            <td>
                                <a href="/editCustomer/{{$customer->id}}" class="btn btn-warning">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>          
        <br/>
    </div>
    <div class="blocktext">
        {{$customers->links()}}
    </div>
@endsection