@extends('templates.master')

@section('title', 'Product Details')

@section('content')
    <div id="product-details">
        <div id="product-image-wrapper">
            <img src="{{ Storage::url($product->detail->image) }}" alt="{{ $product->name }}">
        </div>

        <div id="details-right">
            <h3>{{ $product->name }}</h3>

            <h4>Category:</h4>
            <p>{{ $product->category->name }}</p>

            <h4>Price:</h4>
            <p>{{ $product->detail->price }}</p>

            <h4>Description:</h4>
            <p>{{ $product->detail->description }}</p>

            @guest
                <a href="/login">
                    <button>Log in to buy</button>
                </a>
            @endguest

            @auth
                @if (Auth::user()->role == 'member')
                    <form action="/product/{{ $product->id }}" enctype="multipart/form-data" method="POST">
                        @csrf

                        <label for="quantity">Quantity</label>
                        <input type="number" name="quantity" id="quantity">

                        <button type="submit">Add to cart</button>
                    </form>

                    @if ($errors->hasBag('add'))
                        <div class="error-wrapper">
                            <label for="error" class="error-label">
                                {{ $errors->add->first() }}
                            </label>
                        </div>
                    @endif
                @endif
            @endauth
        </div>
    </div>
@endsection
