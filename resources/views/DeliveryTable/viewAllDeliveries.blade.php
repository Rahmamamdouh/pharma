@extends('pharmacyManagement')

@section('title')
All Deliveries
@endsection

@section('content')
    <div class="container">
        <br/>
        <div class="page-header">
            <h1>All Delieveries</h1>
            <a href="/newDelivery" class="btn btn-success">
                Add New Delivery..
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
                        <th>Customer Name</th>
                        <th>Delivery Guy Name</th>
                        <th>List</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($deliveries as $delivery)
                        <tr>
                            <td>{{$delivery->delivery_date}}</td>
                            <td>{{$delivery->delivery_time}}</td>
                            <td>{{$delivery->delivery_totalprice}}</td>
                            <td>{{$pharmacistName[((int)$delivery->pharmacist_id)]}}</td>
                            <td>{{$customerName[((int)$delivery->customer_id)]}}</td>
                            @if(((int)$delivery->deliveryguy_id)>0)
                                <td>{{$deliveryguyName[((int)$delivery->deliveryguy_id)]}}</td>
                            @else
                                <td></td>
                            @endif
                            <td>{{$delivery->delivery_list}}</td>
                            <td>
                                <a href="/deleteDelivery/{{$delivery->id}}" class="btn btn-danger">Delete</a>
                            </td>
                            <td>
                                <a href="/editDelivery/{{$delivery->id}}" class="btn btn-warning">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>          
        <br/>
    </div>
    <div class="blocktext">
        {{$deliveries->links()}}
    </div>
@endsection