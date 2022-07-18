@extends("layout")

@section("content")

<animal :id="'{{$id}}'" :animaldata="'{{$animal}}'"></animal>

@endsection