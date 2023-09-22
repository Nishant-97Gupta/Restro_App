@extends('layout')

@section('content')
<div>
     <h1>Add Rasturant</h1>

<body>
    <div class="container">
        
        <form  method="post" action="add"> 
            @csrf
            <div class="form-group">
                <label>Name Of Restro:</label>
                <input type="text" name="name" id="name" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label >Adress:</label>
                <input type="address" name="address" id="address" placeholder="Enter Address">
            </div>
            <div class="form-group">
                <label >Email:</label>
                <input type="email" name="email" id="email" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label >Owner_Name:</label>
                <input type="Oname" name="Oname" id="Oname" placeholder="Enter Owner name">
            </div>
            <div class="form-group">
                <label >Phone:</label>
                <input type="Phone" name="Phone" id="Phone" placeholder="Enter Phone">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

   
</body>
</html>



@stop