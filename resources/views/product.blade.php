@extends('templates.master')

@section('title', 'Product Details')

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
                        category
                    </span>
                    Category
                </h4>
                <p>{{ $product->category->name }}</p>
            </div>

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
                        <div class="error-container">
                            <label for="error" class="error-label">
                                <span class="material-icons-round">
                                    warning
                                </span>
                                {{ $errors->add->first() }}
                            </label>
                        </div>
                    @endif
                @endif
            @endauth
        </div>
    </div>
@endsection
