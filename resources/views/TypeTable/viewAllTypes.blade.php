@extends('pharmacyManagement')

@section('title')
All Types
@endsection

@section('content')
    <div class="container">
        <br/>
        <div class="page-header">
            <h1>All Types</h1>
            <a href="/newType" class="btn btn-success">
                Add New Type..
            </a>
        </div>
        <br/>     
        <div class="content">            
            <table class="table">
                <thead>
                    <tr>
                        <th>Type Name</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($types as $type)
                        <tr>
                            <td>
                                {{$type->type_name}}
                            </td>
                            <td>
                                <a href="/deleteType/{{$type->id}}" class="btn btn-danger">Delete</a>
                            </td>
                            <td>
                                <a href="/editType/{{$type->id}}" class="btn btn-warning">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>          
        <br/>
    </div>
    <div class="blocktext">
        {{$types->links()}}
    </div>
@endsection