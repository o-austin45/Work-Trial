@extends("layout")

@section("content")

<car :manufacturer = "'{{$manufacturer}}'" :fueltype = "'{{$fueltype}}'" :cars ="'{{$cars}}'"></car>

<h3 class="btn-holder"><a href="{{ route('add.to.cart', $cars->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </h3>
<h3 class="btn-holder"><a href="{{ route('cart') }}" class="btn btn-warning btn-block text-center" role="button">Cart Page</a> </h3>

@endsection