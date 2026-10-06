@extends('layouts.master')

@section('title', 'Products')

@section('content')

{{-- Success message (shown after create / update / delete) --}}
@if (session('success'))
    <div class="mb-6 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-green-800">
        {{ session('success') }}
    </div>
@endif

{{-- Page heading + Add Product button --}}
<div class="mb-6 flex items-center justify-between">
    <h1 class="text-2xl font-bold text-gray-800">Product Listing</h1>
    <a href="{{ route('product.create') }}"
       class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow hover:bg-indigo-700">
        + Add Product
    </a>
</div>

{{-- Products list: a responsive grid of cards (1 column on phone, 2 on tablet, 3 on desktop) --}}
<ul class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">

    @forelse ($products as $product)
        {{-- One product card --}}
        <li class="flex flex-col overflow-hidden rounded-xl bg-white shadow-md ring-1 ring-gray-200 transition hover:shadow-lg">

            {{-- Product image (grey placeholder if there is no image) --}}
            @if ($product->image)
                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="h-48 w-full object-cover">
            @else
                <div class="flex h-48 w-full items-center justify-center bg-gray-100 text-gray-400">No image</div>
            @endif

            {{-- Product details: name, description, price --}}
            <div class="flex flex-1 flex-col p-4">
                <h2 class="text-lg font-semibold text-gray-800">{{ $product->name }}</h2>
                <p class="mt-1 flex-1 text-sm text-gray-600">{{ $product->description }}</p>
                <p class="mt-3 text-xl font-bold text-indigo-600">${{ number_format($product->price, 2) }}</p>
            </div>

            {{-- Action buttons: Edit and Delete --}}
            <div class="flex gap-2 border-t border-gray-100 p-4">
                <a href="{{ route('product.edit', $product) }}"
                   class="rounded-md bg-yellow-400 px-3 py-1.5 text-sm font-medium text-gray-900 hover:bg-yellow-500">
                    Edit
                </a>

                <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            onclick="return confirm('Are you sure you want to delete this product?')"
                            class="rounded-md bg-red-500 px-3 py-1.5 text-sm font-medium text-white hover:bg-red-600">
                        Delete
                    </button>
                </form>
            </div>
        </li>
    @empty
        {{-- Shown when there are no products --}}
        <li class="col-span-full py-12 text-center text-gray-500">No products yet. Click "Add Product" to create one.</li>
    @endforelse

</ul>
@endsection
