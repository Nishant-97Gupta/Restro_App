@extends('layout')

@section('content')
<div>
     <h1>List of Restro In Shahdol</h1>
     <div class="container">
     
     @if(Session::get('status'))
     <div class="alert alert-success" role="alert">
<h4 class="alert-heading">Well done!</h4>
<p>{{Session::get('status')}}</p>
<hr>
<p class="mb-0"></p>
</div>
   
     @endif
<body>
   
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Name of Restro</th>
                    <th>Adress</th>
                    <th>Email</th>
                    <th>Owner_Name</th>
                    <th>Phone.No</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>
            @foreach($data as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->R_Name}}</td>
                    <td>{{$item->R_Address}}</td>
                    <td>{{$item->R_Email}}</td>
                    <td>{{$item->R_OwnerName}}</td>
                    <td>{{$item->R_Phone}}</td>
                    <td><a href="/delete/{{$item->id}}"><i class="fa fa-trash"></i></a>
                    <a href="/edit/{{$item->id}}"><i class="fa fa-edit"></i></a>
                </td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
@stop