@extends('templates.master')

@section('title', 'Edit Cart')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('stylesheets/details.css') }}">
@endsection

@section('content')
    <div id="product-details">
        <img src="{{ Storage::url($product->detail->image) }}" alt="{{ $product->name }}">
    
        <div id="details-right">
            <h3>{{ $product->name }}</h3>
            
            <div>
                <h4>
                    <span class="material-icons-round">
                        sell
                    </span>
                    Price
                </h4>
                <p>IDR {{ $product->detail->price }}</p>
            </div>
        
            <div>
                <h4>
                    <span class="material-icons-round">
                        description
                    </span>
                    Description
                </h4>
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
    </div>
@endsection
