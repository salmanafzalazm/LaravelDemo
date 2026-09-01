


<h2>Edit Product</h2>

{{-- @dd($product) --}}
<form action="{{route('product.update', $product) }}" method="post" enctype="multipart/form-data">

    @csrf
    @method('PUT')
    <div>
     <label for="name">Name:</label>
     <input type="text" name="name" id="name" value="{{ $product->name}}" required>
       @error('name')
     <div class="error" style="color: red; " >{{$message}}</div>
     @enderror
    </div>
     <div>
     <label for="description">Description:</label>
     <textarea id="description" name="description" required>{{ $product->description}}</textarea>
    </div>
   <div>
     <label for="price">Price:</label>
     <input  type="number" id="price" name="price" step="0.01" value="{{ $product->price}}" required>
       @error('price')
     <div class="error" style="color: red;" >{{$message}}</div>
     @enderror
    </div>
      <div>
     <label for="image">Image:</label>

@if ($product->image)
    <img style = "background-color : #000000 ; height:100px ; width: auto " src="{{asset('storage/' . $product->image)}}"  alt="{{$product->image}}">

@endif

     <input  type="file" id="image" name="image" accept="image/*">
    </div>

    <button type="submit" style="background: rgb(255, 230, 0);">Update Product</button>
</form>
