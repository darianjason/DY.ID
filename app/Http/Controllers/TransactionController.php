<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TransactionController extends Controller
{
    public function transactions()
    {
        $user = User::find(Session::get('userID'));
        $transactions = User::find($user->id)->transactions;
        $products = Product::all();

        return view('transactions', compact('user', 'transactions', 'products'));
    }

    public function checkout(Request $request)
    {
        $user = User::find(Session::get('userID'));

        $transaction = new Transaction();

        $transaction->user_id = $user->id;
        $transaction->total = 0;

        $transaction->save();
    
        // copy data from cart to transaction_details table
        foreach ($user->cart as $product) {
            $transaction->transactionDetails()->attach($product->id, [
                'quantity' => $user->cart()->find($product->id)->pivot->quantity,
                'subtotal' => $product->detail->price * $user->cart()->find($product->id)->pivot->quantity
            ]);

            // $user->transactions()->attach($product->id, ['quantity' => $user->cart()->find($product->id)->pivot->quantity]);
        }

        $total = 0;

        foreach ($transaction->transactionDetails as $transactionDetail) {
            $total += $transactionDetail->pivot->subtotal;
        }

        $transaction->total = $total;

        $transaction->save();

        // delete user's cart
        $user->cart()->detach();

        return redirect('/transactions');
    }
}
