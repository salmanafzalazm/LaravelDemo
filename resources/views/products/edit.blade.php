@extends('layouts.master')

@section('title', 'Edit Product')

@section('content')

{{-- Centered card that holds the form (same look as the create page) --}}
<div class="mx-auto max-w-lg rounded-xl bg-white p-8 shadow-md ring-1 ring-gray-200">

    {{-- Form heading --}}
    <h1 class="mb-6 text-2xl font-bold text-gray-800">Edit Product</h1>

    {{-- enctype is required so a new image file can be uploaded --}}
    <form action="{{ route('product.update', $product) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        {{-- HTML forms only support GET/POST, so we tell Laravel this is a PUT (update) request --}}
        @method('PUT')

        {{-- Name (old() keeps what the user typed if validation fails, otherwise shows the saved value) --}}
        <div>
            <label for="name" class="mb-1 block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required
                   class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
            @error('name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Description --}}
        <div>
            <label for="description" class="mb-1 block text-sm font-medium text-gray-700">Description</label>
            <textarea id="description" name="description" rows="4" required
                      class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">{{ old('description', $product->description) }}</textarea>
        </div>

        {{-- Price --}}
        <div>
            <label for="price" class="mb-1 block text-sm font-medium text-gray-700">Price ($)</label>
            <input type="number" id="price" name="price" step="0.01" value="{{ old('price', $product->price) }}" required
                   class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
            @error('price')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Image: show the current image, then allow uploading a new one --}}
        <div>
            <label for="image" class="mb-1 block text-sm font-medium text-gray-700">Image</label>

            @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                     class="mb-3 h-32 w-auto rounded-lg object-cover ring-1 ring-gray-200">
            @endif

            <input type="file" id="image" name="image" accept="image/*"
                   class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm file:mr-3 file:rounded-md file:border-0 file:bg-indigo-50 file:px-3 file:py-1 file:text-indigo-700">
        </div>

        {{-- Buttons: Cancel goes back to the list, Update submits the form --}}
        <div class="flex items-center justify-end gap-3 pt-2">
            <a href="{{ route('product.index') }}" class="text-sm text-gray-600 hover:text-gray-900">Cancel</a>
            <button type="submit" class="rounded-lg bg-indigo-600 px-5 py-2 text-sm font-semibold text-white shadow hover:bg-indigo-700">
                Update Product
            </button>
        </div>
    </form>
</div>
@endsection
