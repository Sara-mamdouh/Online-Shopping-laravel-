@extends("layouts.app")
@section("titel")
<title> create</title>
@endsection
@section("content")

<form action="{{ route("products.store")}}" method="post" class="container mt-4">
  @csrf
  {{-- <div class="mb-3">
    <label for="product_id" class="form-label">ID</label>
    <input type="text" class="form-control" id="product_id" name="id">
  </div> --}}
  <div class="mb-3">
    <label for="product_name" class="form-label">name</label>
    <input type="text" class="form-control" id="product_name" name="name">
  </div>
  @error("name")
    <div class="alert alert-danger">
      {{$message}}
    </div>
  @enderror
  <div class="mb-3">
    <label for="product_price" class="form-label">price</label>
    <input type="text" class="form-control" id="product_price" name="price">
  </div>
  @error("price")
    <div class="alert alert-danger">
      {{$message}}
    </div>
  @enderror
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
