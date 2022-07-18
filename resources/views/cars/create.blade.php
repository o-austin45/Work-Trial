@extends("layout")

@section("content")
<div class="wrapper">

    <h1>Add New Car</h1>
    @if(session()->has('warning'))
    {!! session()->get('warning') !!}
    @endif

   
    
    
        <form action="/api/cars/create" method="POST">
            @csrf
            <label for="Car Name"> Car name</label>
            <input type="text" id="carName" name="carName">
            <label for="manufacturer">Manufacturer</label>
            <input  type="text" id="manufacturer" name="manufacturer">
            <label for="top speed">Top Speed</label>
            <input type="number" id="topSpeed" name="topSpeed">
            <label for="number of seats">Numvber of Seats</label>
            <input type="number" id="seats" name="seats">
            <label for="number of doors">Number of Doors</label>
            <input type="number" id="doors" name="doors">
            <label for="fuelType">Fuel type</label>
            <select name="fuelType" id="fuelType">
                <option value="1">Petrol</option>
                <option value="2">Diesel</option>
                <option value="3">Electric</option>
            </select>
            <label for= "pass">Password</label>
            <input type="password" id="pass" name="password"
           minlength="8" required>    
            <input type="submit" value="Submit">
        </form>
    
    </div>   

@endsection