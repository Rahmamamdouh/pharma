@extends('pharmacyManagement')

@section('title')
All Medicines
@endsection

@section('content')
<script>
function loadMedicines(letters){
    $.ajax({
      url:"{{route ('searchedMedicines')}}",
      method:"GET",
      data:{letters:letters},
      success:function(result){
        $('#allMedicines').remove();
        $('#filteredMedicines').html(result);
      }
    });
}
function loadLetters(index){
    let letters=index.value;
    loadMedicines(letters);
}
</script>
    <div class="container">
        <br/>
        <div class="page-header">
            <h1>All Medicines</h1>
            <div class="container">
                <div class="row">
                    <div class="col-xl-3">
                        <a href="/newMedicine" class="btn btn-success">
                            Add New Medicine..
                        </a>
                    </div>
                    <br>
                    <div class="col-xl-3">
                        <a href="/expireMedicine" class="btn btn-info">
                            Nearly Expired Medicines..
                        </a>
                    </div>
                    <br/>
                    <!-- search -->
                    <div class="col-xl-6">
                        <div class="form-group has-feedback has-search searchBar">
                            <span class="glyphicon glyphicon-search form-control-feedback"></span>
                            <input type="text" class="form-control" placeholder="Search.." name="search" id="search" onkeyup="loadLetters(this)">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br/>    
        <div class="content">            
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>A.C.</th>
                        <th>Company</th>
                        <th>Price</th>
                        <th>Type</th>
                        <th>Description</th>
                        <th>Total Amount</th>
                        <th>Image</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="filteredMedicines"></tbody>
                <tbody id="allMedicines">
                    @foreach($medicines as $medicine)
                        <tr>
                            <td>{{$medicine->medicine_name}}</td>
                            @if($medicine->medicine_ac)
                            <td>{{$medicine->medicine_ac}}</td>
                            @else
                            <td></td>
                            @endif
                            <td>{{$medicine->medicine_companyname}}</td>
                            <td>{{$medicine->medicine_price}}</td>
                            <td>{{$medicineType[((int)$medicine->type_id)]}}</td>
                            <td>{{$medicine->medicine_description}}</td>
                            <td>{{$medicine->medicine_totalamount}}</td>
                            <td>
                                <img src="/img/{{$medicine->medicine_image}}" width="100px"/>
                            </td>
                            <td>
                                <a href="/deleteMedicine/{{$medicine->id}}" class="btn btn-danger">Delete</a>
                            </td>
                            <td>
                                <a href="/editMedicine/{{$medicine->id}}" class="btn btn-warning">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>          
        <br/>
    </div>
    <div class="blocktext">
        {{$medicines->links()}}
    </div>
@endsection