@extends('templates.master')

@section('title', 'Edit Cart')

@section('content')
    <div id="product-details">
        <div id="product-image-wrapper">
            <img src="{{ Storage::url($product->detail->image) }}" alt="{{ $product->name }}">
        </div>
    
        <div id="details-right">
            <h3>{{ $product->name }}</h3>
        
            <h4>Price:</h4>
            <p>{{ $product->detail->price }}</p>
        
            <h4>Description:</h4>
            <p>{{ $product->detail->description }}</p>
        </div>

        <form action="/cart/{{ $product->id }}" enctype="multipart/form-data" method="POST">
            @method('PATCH')
            @csrf

            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" id="quantity">
            
            <button type="submit">Save</button>
        </form>

        @if ($errors->hasBag('edit'))
            <div class="error-wrapper">
                <label for="error" class="error-label">
                    {{ $errors->edit->first() }}
                </label>
            </div>
        @endif
    </div>
@endsection
