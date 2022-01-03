<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function cart()
    {
        $user = User::find(Session::get('userID'));

        return view('cart', compact('user'));
    }

    public function addToCart(Request $request, $id)
    {   
        $rules = [
            'quantity' => 'required|gt:0'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator, 'add');
        }

        $user = User::find(Session::get('userID'));
        $productID = $id;
        $quantity = $request->quantity;

        if (!$user->cart()->where('product_id', $productID)->exists()) {
            $user->cart()->attach($productID, ['quantity' => $quantity]);
        }
        else {
            $oldQuantity = $user->cart()->find($productID)->pivot->quantity;

            $user->cart()->updateExistingPivot($productID, [
                'quantity' => $oldQuantity += $quantity
            ]);
        }

        return redirect('/');
    }

    public function editProductPage($id)
    {
        $user = User::find(Session::get('userID'));
        $product = $user->cart()->find($id);

        return view('edit-cart', compact('user', 'product'));
    }

    public function editProduct(Request $request, $id)
    {
        $rules = [
            'quantity' => 'required|gt:0'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator, 'edit');
        }

        $user = User::find(Session::get('userID'));
        $productID = $id;

        $user->cart()->updateExistingPivot($productID, [
            'quantity' => $request->quantity
        ]);

        return redirect('/cart');
    }

    public function removeProduct($id)
    {
        $user = User::find(Session::get('userID'));
        $productID = $id;

        $user->cart()->detach($productID);

        return redirect('/cart');
    }
}
