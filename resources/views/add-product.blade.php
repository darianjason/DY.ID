@extends('templates.master')

@section('title', 'Add Product')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('stylesheets/form.css') }}">
@endsection

@section('content')
    <h2>Add New Product</h2>

    <form action="/products" enctype="multipart/form-data" method="POST" id="add-product-form" class="form">
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
        <div class="error-container">
            <label for="error" class="error-label">
                <span class="material-icons-round">
                    warning
                </span>
                {{ $errors->insert->first() }}
            </label>
        </div>
    @endif
@endsection
