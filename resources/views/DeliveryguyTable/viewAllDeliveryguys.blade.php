@extends('pharmacyManagement')

@section('title')
    All Deliveryguys
@endsection

@section('content')
    <div class="container">
        <br/>
        <div class="page-header">
            <h1>View All Deliveryguys</h1>
            <a href="/newDeliveryguy" class="btn btn-primary">
                Add New Deliveryguy..
            </a>
        </div>
        <br/>
        <br/>     
        <div class="content">            
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Salary</th>
                        <th>Address</th>
                        <th>Start Job</th>
                        <th>Phone</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($deliveryguys as $deliveryguy)
                        <tr>
                            <td>
                                {{$deliveryguy->deliveryguy_firstname}}
                                {{$deliveryguy->deliveryguy_lastname}}
                            </td>
                            <td>
                                {{$deliveryguy->deliveryguy_salary}}
                            </td>
                            <td>
                                {{$deliveryguy->deliveryguy_city}}
                                -
                                {{$deliveryguy->deliveryguy_street}}
                            </td>
                            <td>
                                {{$deliveryguy->deliveryguy_startjob}}
                            </td>
                            <td>
                                {{$deliveryguy->deliveryguy_phone}}
                            </td>
                            <td>
                                <a href="/deleteDeliveryguy/{{$deliveryguy->id}}" class="btn btn-danger">Delete</a>
                            </td>
                            <td>
                                <a href="/editDeliveryguy/{{$deliveryguy->id}}" class="btn btn-warning">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>          
        <br/>
    </div>
    <div class="blocktext">
        {{$deliveryguys->links()}}
    </div>
@endsection
