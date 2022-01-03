@extends('templates.master')

@section('title', 'Transaction History')

@section('content')
    <h2>My Transaction History</h2>

    <div>

        @if (count($user->transactions))            
            <div class="transaction-item">
                @foreach ($transactions as $transaction)
                    <div>
                        <p>
                            {{ $transaction->created_at }}
                        </p>
                    </div>
                    @foreach ($transaction->transactionDetails as $transactionDetail)
                        <div class="product-details">
                            <div id="product-image-wrapper">
                                <img src="{{ Storage::url($products->find($transactionDetail->pivot->product_id)->detail->image) }}" alt="{{ $products->find($transactionDetail->pivot->product_id)->name }}">
                            </div>
        
                            <div>
                                <h3>
                                    {{ $products->find($transactionDetail->pivot->product_id)->name }}
                                </h3>
        
                                <p>
                                    Price: {{ $products->find($transactionDetail->pivot->product_id)->detail->price }}
                                </p>
        
                                <p>
                                    x{{ $transactionDetail->pivot->quantity }} pcs
                                </p>
        
                                <p>
                                    Subtotal:
                                    {{ $transactionDetail->pivot->subtotal }}
                                </p>
                            </div>
                        </div>
                    @endforeach
        
                    <div>
                        <p>
                            Total Price: {{ $transaction->total }}
                        </p>
                    </div>
                @endforeach
            </div>
        @else
            <p>No transactions have been made</p>
            <a href="/cart">
                <button>My Cart</button>
            </a>
        @endif
    </div>
@endsection
