<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


@foreach($arr1 as  $arr )
    <h1 class="heading">{{$loop->index}}-{{$arr}}</h1>
  <img class="image"src={{$arr}}/>
@endforeach


</body>

</html>

<style>
.image{

    width:400px;
    height:200px;
    display:block;
    margin-left:auto;
    margin-right:auto;
    text-align:center;

}
.heading{
    justify-content:center;
    text-align:center;
}
</style>