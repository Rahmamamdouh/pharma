@extends('pharmacyManagement')

@section('title')
    All Pharmacists
@endsection

@section('content')
    <div class="container">
        <br/>
        <div class="page-header">
            <h1>View All Pharmacists</h1>
            <a href="/newPharmacist" class="btn btn-primary">
                Add New Pharmacist..
            </a>
        </div>
        <br/>
        <br/>     
        <div class="content">            
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Salary</th>
                        <th>Address</th>
                        <th>Start Job</th>
                        <th>Phone</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pharmacists as $pharmacist)
                        <tr>
                            <td>
                                {{$pharmacist->pharmacist_firstname}}
                                {{$pharmacist->pharmacist_lastname}}
                            </td>
                            <td>
                                {{$pharmacist->pharmacist_email}}
                            </td>
                            <td>
                                {{$pharmacist->pharmacist_salary}}
                            </td>
                            <td>
                                {{$pharmacist->pharmacist_city}}
                                {{$pharmacist->pharmacist_street}}
                            </td>
                            <td>
                                {{$pharmacist->pharmacist_startjob}}
                            </td>
                            <td>
                                {{$pharmacist->pharmacist_phone}}
                            </td>
                            <td>
                                <a href="/deletePharmacist/{{$pharmacist->id}}" class="btn btn-danger">Delete</a>
                            </td>
                            <td>
                                <a href="/editPharmacist/{{$pharmacist->id}}" class="btn btn-warning">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>          
        <br/>
    </div>
    <div class="blocktext">
        {{$pharmacists->links()}}
    </div>
@endsection
