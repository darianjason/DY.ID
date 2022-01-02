@extends('templates.master')

@section('title', 'Add Product')

@section('content')
    <h2>Add New Product</h2>

    <form action="/products" enctype="multipart/form-data" method="POST" id="add-product-form">
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

        <button type="submit">Add</button>
    </form>

    @if ($errors->hasBag('insert'))
        <div class="error-wrapper">
            <label for="error" class="error-label">
                {{ $errors->insert->first() }}
            </label>
        </div>
    @endif
@endsection
