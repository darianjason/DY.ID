@extends('templates.master')

@section('title', 'Transaction History')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('stylesheets/transactions.css') }}">
@endsection

@section('content')
    <h2>My Transaction History</h2>

    <div id="transactions">
        @if (count($user->transactions))
            @foreach ($transactions as $transaction)
                <div class="transaction-container">
                    <p class="transaction-date">
                        {{ $transaction->created_at }}
                    </p>

                    @foreach ($transaction->transactionDetails as $transactionDetail)
                        <div class="transaction-item">
                            <img src="{{ Storage::url($products->find($transactionDetail->pivot->product_id)->detail->image) }}" alt="{{ $products->find($transactionDetail->pivot->product_id)->name }}">

                            <div class="details-right">
                                <h3>
                                    {{ $products->find($transactionDetail->pivot->product_id)->name }}
                                </h3>

                                <p>
                                    Price: IDR {{ $products->find($transactionDetail->pivot->product_id)->detail->price }}
                                </p>

                                <p>
                                    x{{ $transactionDetail->pivot->quantity }} pcs
                                </p>

                                <p class="subtotal">
                                    IDR {{ $transactionDetail->pivot->subtotal }}
                                </p>
                            </div>
                        </div>
                    @endforeach

                    <p class="total-price">
                        Total Price: IDR {{ $transaction->total }}
                    </p>
                </div>
            @endforeach
        @else
            <p>No transactions have been made</p>
            <a href="/cart">
                <button>My Cart</button>
            </a>
        @endif
    </div>
@endsection
