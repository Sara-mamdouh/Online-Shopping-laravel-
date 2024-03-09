@extends("layouts.app")
@section("titel")
<title> index</title>
@endsection
@section("content")
<div class="text-center mt-4">
  <div>
    <a href="{{route("products.create")}}" class="btn btn-success">add product</a>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th scope="col"># ID</th>
        <th scope="col">Name</th>
        <th scope="col">Price</th>
        <th scope="col">created_at</th>
        <th scope="col">Acctions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($products as $product)
      <tr>
        <th scope="row">{{$product["id"]}}</th>
        <td>{{$product["name"]}}</td>
        <td>{{$product["price"]}}</td>
        <td>{{$product["created_at"]}}</td>
        <td>
          <a href="{{ route("products.show",$product["id"])}}" class="btn btn-outline-primary">view</a>
          <a href="{{ route("products.edit",$product["id"])}}" class="btn btn-outline-success">edit</a>
          <form action="{{ route("products.destroy" ,$product["id"])}}" method="post" style="display: inline">
            @csrf
            @method("delete")
            <button  class="btn btn-outline-danger">delete</button>

          </form>

        </td>
      </tr>  
      @endforeach
    </tbody>
  </table>
   
@endsection