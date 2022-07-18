@extends("layout")

@section("content")
<h1>Your Order Has Been Placed </h1>
<h2> Please see below Receipt for Confirmation</h2>

<table>
    <tr>
        <th>Car Name</th>
        <th> Price($)</th>
        <th> Quantity</th>
        <th> Car Total($)</th>
    </tr>
@php
$total = 0
@endphp    
@foreach ($orders as $order)

<tr>
    <th>{{ $order->name }}</th>
    <th>{{ $order->adress }}</th>
    <th>{{ $order->pivot->orderQty }}</th>
    <th>{{ $order->pivot->orderQty}}</th>
    {{$total += $order->pivot->orderQty }}

</tr>    
@endforeach
<tr>
    <th colspan="3">Total($)</th>
    <th>{{$total}}</th>

</tr>
</table>
@endsection