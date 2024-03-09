@extends("layouts.app")
@section("titel")
<title> create</title>
@endsection
@section("content")

<div class="container mt-4">
  <form action="{{ route("products.update" ,$product["id"])}}" method="post">
    @csrf
    @method("put")
    <div class="mb-3">
      <label for="product_id" class="form-label">ID</label>
      <input type="text" class="form-control" id="product_id" name="id" value="{{ $product["id"]}}">
    </div>
    <div class="mb-3">
      <label for="product_name" class="form-label">name</label>
      <input type="text" class="form-control" id="product_name" name="name" value="{{ $product["name"]}}">
    </div>
    <div class="mb-3">
      <label for="product_price" class="form-label">price</label>
      <input type="text" class="form-control" id="product_price" name="price" value="{{ $product["price"]}}">
    </div>
    
    <button type="submit" class="btn btn-primary">update</button>
  </form>
  
</div>

@endsection
