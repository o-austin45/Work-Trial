@extends("layout")

@section("content")

</div>
@php $total = 0 @endphp
@foreach((array) session('cart') as $id => $details)
    @php $total += $details['price'] * $details['quantity'] @endphp
@endforeach
<div class="total">
  
</div>
</div>
@if(session('cart'))
<table>
    <tr>
        <th>Car Name</th>
        <th> Price($)</th>
        <th> Quantity</th>
        <th> Car Total($)</th>
    </tr>
@foreach(session('cart') as $id => $details)
    <div class="row cart-detail">
        </div>
        <div class="price-and-quantity">
          
            <tr>
                <th>{{ $details['name'] }}</th>
                <th>{{ $details['price'] }}</th>
                <th>{{ $details['quantity'] }}</th>
                <th>{{ $details['quantity'] *$details['price']}}</th>
                

                <th><a href="{{ route('remove.from.cart', $details["id"]) }}" class="btn btn-warning btn-block text-center" role="button">Remove Car</a> </th>
                <th><a href="{{ route('decrease.quantity', $details["id"]) }}" class="btn btn-warning btn-block text-center" role="button">Decrease Quantity</a> </th>
                <th><a href="{{ route('increase.quantity', $details["id"]) }}" class="btn btn-warning btn-block text-center" role="button">Increase Quantity</a> </th>
            </tr>
            

          
        </div>
    </div>
@endforeach
<tr>
    <th colspan="3">Total($)</th>
    <th>{{$total}}</th>

</tr>
</table>
@endif

@if(session('cart'))
<form action="/api/cars/order" method="POST">
<label for="name"> Enter your Name</label>
<input type="text" id="name" name="name">
<label for="address">Enter your Adress</label>
<input type="text" id="address" name="address"> 
<label for="date">Enter Desired Delivery Date</label>
<input type="date" id="date" name="date">  
@foreach(session('cart') as $id => $details)
<input type="hidden" value="{{$details["quantity"]}}" name="{{$details["id"]}}">
@endforeach
<input type="submit" value="Place Order">
@endif


@endsection
