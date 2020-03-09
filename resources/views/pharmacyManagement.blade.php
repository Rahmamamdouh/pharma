<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('tags')
    <link href="{{asset('vendor')}}/bootstrap/css/bootstrap-theme.css" rel="stylesheet" />
    <!-- load js libs -->
    <script src="{{asset('vendor')}}/bootstrap/js/bootstrap.min.js"></script>
    
    <!-- logo -->
    <link rel="shortcut icon" href="{{asset('css/pharma.png')}}">
    
    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('vendor')}}/jquery/jquery.min.js"></script>
    <script src="{{asset('vendor')}}/bootstrap/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- validation function -->
    <script type="text/javascript" src="{{URL::asset('vendor')}}/jquery/forms.js"></script>

    <!-- validation -->
    <script>
        $(document).ready(function(){
            $('.search-file-btn').children("input").bind('change', function() {
                var fileName = '';
                fileName = $(this).val().split("\\").slice(-1)[0];
                $(this).parent().next("span").html(fileName);
            })
            $('#medicine_name, #medicine_companyname, #medicine_price, #medicine_description, #store_expire, #store_medicine_name, #type_name, #customer_firstname, #customer_lastname, #customer_city, #customer_street, #customer_phone, #pharmacist_firstname, #pharmacist_lastname, #pharmacist_salary, #pharmacist_startjob, #pharmacist_city, #pharmacist_street, #pharmacist_phone, #deliveryguy_firstname, #deliveryguy_lastname, #deliveryguy_salary, #deliveryguy_startjob, #deliveryguy_city, #deliveryguy_street, #deliveryguy_phone').on('keyup', function(){
                remove_error($(this).attr('id'));
            })
            $('#medicine_image').on('change', function(){
                remove_error('medicine_image');
            })
            function remove_error(field){
                $('#' + field)
                .parents('.form-group')
                .removeClass('has-error')
                .find('.text-danger')
                .html('');
            }
        })
    </script>

    <style>
        html, body{
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }
        .full-height{
            height: 100vh;
        }
        .flex-center{
            align-items: center;
            display: flex;
            justify-content: center;
        }
        .position-ref{
            position: relative;
        }
        .top-right{
            position: absolute;
            right: 10px;
            top: 18px;
        }
        .content{
            text-align: center;
        }
        .title{
            font-size: 84px;
        }
        .links>a{
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
        .m-b-md{
            margin-bottom: 30px;
        }
        div.blocktext{
            margin-left: auto;
            margin-right: auto;
            margin-center;
            width: 30em
        }        
        th{
            text-align: center;
        }
        .searchBar{
            width: 50%;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
          </button>
          <a class="navbar-brand" href="/index">Pharma</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li class="active"><a href="/allMedicines">Medicines</a></li>
            <li><a href="/allCustomers">Customers</a></li>
            <li><a href="/allTypes">Types</a></li>
            <li><a href="/allDeliveries">Deliveries</a></li>
            <li><a href="/allSales">Sales</a></li>
            <li><a href="/allStores">Store</a></li>
            @if((Auth::user()->usertype)=='admin')
                <li><a href="/allPharmacists">Pharmacists</a></li>
                <li><a href="/allDeliveryguys">Delivery Guys</a></li>
            @endif
            @guest
                <li><a href="/register">Register</a></li>
                <li><a href="/login">Login</a></li>
            @else
                <li><a href="/login">Logout</a></li>
            @endguest
          </ul>
        </div>
      </div>
    </nav>
    @yield('content')
</body>
</html>