@extends("layouts.app")
@section("titel")
<title> index</title>
@endsection
@section("content")
{{-- @if(session()->has("requestStatus"))
<div class="text-center alert alert-success">
  {{session('requestStatus')}}
</div>
@endif --}}
@if(session()->has("requestStatus"))

<div x-data="{ open: true }" x-init="setTimeout(()=>open=false,3000)">
    <div x-show="open" class="text-center alert alert-success">
      {{session('requestStatus')}}
    </div>  
</div>
@endif


<form class="d-flex mt-4" role="search" action="{{route('products.index')}}" method="get">
  <input type="text" class="form-control me-2" name="q" aria-label="search" placeholder="search">
  <button class="btn btn-outline-primary me-2 ms-2" type="submit">Search</button>
</form>

<div class="text-center mt-4">
  <div>
    <a href="{{route("products.create")}}" class="btn btn-success">add product</a>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#ID</th>
        <th scope="col">Name</th>
        <th scope="col">Price</th>
        <th scope="col">image</th>
        <th scope="col">created_at</th>
        <th scope="col">updated_at</th>
        <th scope="col">Acctions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($products as $product)
      <tr>
        <th scope="row">{{$product->id}}</th>
        <td>{{$product->name}}</td>
        <td>{{$product->price}}</td>
        <td>{{$product->photo}}</td>////////////
        <td>{{$product->created_at}}</td>
        <td>{{$product->updated_at}}</td>

        <td>
          <a href="{{ route("products.show",$product->id)}}" class="btn btn-outline-primary">view</a>
          <a href="{{ route("products.edit",$product->id)}}" class="btn btn-outline-success">edit</a>
        
          <button  type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$product->id}}">delete</button>

        </td>
      </tr>  
      <!-- Modal -->


{{-- 
      <div class="modal fade" id="exampleModal{{ $product->id }}" tabindex="-1"
        aria-labelledby="exampleModalLabel{{ $product['id'] }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content"> --}}

                {{-- <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel{{ $product['id'] }}">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div> --}}
                {{-- <div class="modal-body">
                    Are you sure??
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <form action="{{route("products.destroy",$product->id)}}"
                        method="POST">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete" class="btn btn-danger">
                    </form>
                </div>
            </div>
        </div>
    </div> --}}


<div class="modal fade" id="exampleModal{{ $product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $product['id'] }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        are you sure
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <form action="{{route("products.destroy",$product->id)}}" method="post" style="display: inline">
          @csrf
          @method("delete")
          <input type="submit" value="Delete" class="btn btn-danger">

        </form>
      </div>
    </div>
  </div>
</div>
      @endforeach
    </tbody>
  </table>
   
  

  <!-- Button trigger modal -->


<div>
   {{$products->links()}}

</div>
@endsection

