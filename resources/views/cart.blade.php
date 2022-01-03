@extends('templates.master')

@section('title', 'My Cart')

@section('content')
    <h2>My Cart</h2>

    <div>
        @if (count($user->cart))
            @foreach ($user->cart as $product)
                <div class="cart-item">
                    <div id="product-image-wrapper">
                        <img src="{{ Storage::url($product->detail->image) }}" alt="{{ $product->name }}">
                    </div>

                    <div>
                        <h3>
                            {{ $product->name }}
                        </h3>

                        <p>
                            Price: {{ $product->detail->price }}
                        </p>

                        <p>
                            x{{ $user->cart()->find($product->id)->pivot->quantity }} pcs
                        </p>

                        <p>
                            Subtotal: {{ $user->cart()->find($product->id)->pivot->quantity * $product->detail->price }}
                        </p>

                        <div>
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

            <div>
                <p>
                    Total Price: 
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

                    <button type="submit">Check out</button>
                </form>
            </div>
        @else
            <p>Cart is empty</p>
            <a href="/">
                <button>Find products</button>
            </a>
        @endif
    </div>
@endsection
