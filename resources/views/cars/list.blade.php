@extends("layout")

@section("content")

<cars :cars ="'{{$cars}}'" ></cars>

<form action ="/api/cars/search" method="POST">
    @csrf
    <input type="text" name="search" placeholder= "search for car and/or manufacturer">
    <input type="submit" value="Submit">


</form    
@endsection