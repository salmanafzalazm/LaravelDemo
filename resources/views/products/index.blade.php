

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>
<body>

@if (session('success'))
<div class="alert alert-success" >
    {{ session('success') }}
</div>

@endif


<h1>Product Listing <a href="{{ route('product.create')}}" class="btn btn-success"> Add Product </a> </h1>

<ul>
@foreach ( $products as $product )

<li>
<h2>{{$product->name}}</h2>
<p>{{$product->description}}</p>
<p>Price: ${{number_format($product->price, 2)}}</p>

@if ($product->image)
{{-- <img style = "background-color : #000000 ; height:100px ; width: auto " src="{{asset('storage/' . $product->image)}}" alt="{{$product->image}}">     --}}
<img style = "background-color : #000000 ; height:100px ; width: auto " src="{{$product->image}}" alt="{{$product->image}}">
@endif
{{-- edit --}}
<a href="{{route('product.edit',$product) }}">Edit</a>
{{-- delet --}}
<form action="{{ route('product.destroy', $product->id) }}" method="POST" style="display: inline;" >
    @csrf
    @method('DELETE')
     <button type="submit" onclick="return confirm('Are you sure you want to delete this product?')" > Delete </button>


</form>

</li>



@endforeach


</ul>


</body>
</html>
