@extends("layouts.app")
@section("titel")
<title> product</title>
@endsection
@section("content")

<div class="text-center mt-4 ">

  <div class="card">
    <div class="card-header">
      {{$product->id}}
    </div>
    <div class="card-body">
      <blockquote class="blockquote mb-0">
        <p>    {{$product->name}}</p>
        <footer class="blockquote-footer">price : <cite title="Source Title">{{$product->price}}</cite></footer>
      </blockquote>
    </div>
  </div>
</div>
@endsection



















