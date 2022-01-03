@extends('templates.master')

@section('title', 'Edit Product')

@section('content')
    <h2>Edit Product</h2>

    <form action="/products/{{ $product->id }}" enctype="multipart/form-data" method="POST" id="edit-product-form">
        @method('PATCH')
        @csrf

        <div>
            <label for="product-name">Product Name</label>
            <input type="text" name="name" id="product-name">
        </div>

        <div>
            <label for="product-description">Product Description</label>
            <textarea name="description" id="product-description"></textarea>
        </div>

        <div>
            <label for="product-price">Product Price</label>
            <input type="number" name="price" id="product-price">
        </div>

        <div>
            <label for="product-category">Product Category</label>
            <select name="category" id="product-category">
                <option selected disabled>Select</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="product-image">Product Image</label>
            <input type="file" name="image" id="product-image">
        </div>

        <button type="submit">Save</button>
    </form>

    @if ($errors->hasBag('update'))
        <div class="error-wrapper">
            <label for="error" class="error-label">
                {{ $errors->update->first() }}
            </label>
        </div>
    @endif
@endsection
