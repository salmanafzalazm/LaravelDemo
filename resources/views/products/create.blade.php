<h2>Create Product</h2>


<form action="{{route('product.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
     <label for="name">Name:</label>
     <input type="text" name="name" id="name" required value="{{ old('name')}}">
     @error('name')
     <div class="error" style="color: red;"> {{$message}}</div>
     @enderror
    </div>
     <div>
     <label for="description">Description:</label>
     <textarea id="description" name="description" required></textarea>
    </div>
   <div>
     <label for="price">Price:</label>
     <input  type="number" id="price" name="price" step="0.01" required>
      @error('price')
     <div class="error" style="color: red;"> {{$message}} </div>
          @enderror
    </div>
      <div>
     <label for="image">Image:</label>
     <input  type="file" id="image" name="image" accept="image/*">
    </div>

    <button type="submit">Create Product</button>
</form>
