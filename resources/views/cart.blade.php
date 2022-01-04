@extends('templates.master')

@section('title', 'My Cart')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('stylesheets/cart.css') }}">
@endsection

@section('content')
    <h2>My Cart</h2>

    <div>
        @if (count($user->cart))
            @foreach ($user->cart as $product)
                <div class="cart-item">
                    <img src="{{ Storage::url($product->detail->image) }}" alt="{{ $product->name }}">

                    <div class="details-right">
                        <h3>
                            {{ $product->name }}
                        </h3>

                        <div>
                            <p>
                                Price: IDR {{ $product->detail->price }}
                            </p>
    
                            <p>
                                x{{ $user->cart()->find($product->id)->pivot->quantity }} pcs
                            </p>
    
                            <p>
                                Subtotal: IDR {{ $user->cart()->find($product->id)->pivot->quantity * $product->detail->price }}
                            </p>
                        </div>

                        <div class="button-group">
                            <a href="/cart/edit/{{ $product->id }}">
                                <button id="button-edit">Edit</button>
                            </a>

                            <form action="/cart/{{ $product->id }}" enctype="multipart/form-data" method="POST">
                                @method('DELETE')
                                @csrf

                                <button type="submit">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

            <div id="bottom">
                <p>
                    Total Price: IDR 
                    <?php
                    $totalPrice = 0;
                    
                    foreach ($user->cart as $product) {
                        $totalPrice += $user->cart()->find($product->id)->pivot->quantity * $product->detail->price;
                    }
                    
                    echo $totalPrice;
                    ?>
                </p>

                <form action="/cart" enctype="multipart/form-data" method="post">
                    @csrf

                    <button type="submit">Check Out</button>
                </form>
            </div>
        @else
            <p>Cart is empty</p>
            <a href="/">
                <button>Find Products</button>
            </a>
        @endif
    </div>
@endsection
