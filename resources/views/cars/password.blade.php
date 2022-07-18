@extends("layout")

@section("content")
<div>
    <form action="/cars/password" method="POST">
        @csrf
    <label for="pass">Password (8 characters minimum):</label>
    <input type="password" id="pass" name="password"
           minlength="8" required>

    <input type="submit" value="Submit"> 
    </form>     
</div>
@endsection