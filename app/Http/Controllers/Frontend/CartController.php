<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use File;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    function addProduct(Request $request)
    {
        $product_id = $request->input('prod_id');
        $product_qty = $request->input('prod_qty');

        if (Auth::check())
        {
            $prod_check = Product::where('id', $product_id)->first();
            if($prod_check)
            {
                if(Cart::where('prod_id', $product_id)->where('user_id', Auth::id())->exists())
                {
                     return response()->json(['status'=>'Item is already added']);
                }
                else 
                {
                   $cartItem = new Cart;
                   $cartItem->prod_id = $product_id;
                   $cartItem->user_id = Auth::id();
                   $cartItem->prod_qty = $product_qty;
                   $cartItem->save();
                   return response()->json(['status'=> $prod_check->name.' added suuccessfully']);

                }
            }
        }
        else
        {
            return response()->json(['status'=>'Login First']);
        }

    }

    function viewCart()
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        return view('frontend.cart', compact('cartItems'));
    }

    function updateCart(Request $request)
    {
        $product_id = $request->input('prod_id');
        $product_qty  = $request->input('prod_qty');
        if(Auth::check())
        {
            if(Cart::where('prod_id',$product_id)->where('user_id', Auth::id())->exists())
            {
                $cartItem = Cart::where('prod_id',$product_id)->where('user_id', Auth::id())->first();
                $cartItem->prod_qty = $product_qty;
                $cartItem->update();
                return response()->json(['status'=> 'Quantity updated suuccessfully']);
            }
        }
    }

    function removeCartProduct(Request $request)
    {
        if (Auth::check())
        {
        $product_id = $request->input('product_id');
        if (Cart::where('prod_id', $product_id)->where('user_id', Auth::id())->exists())
        {
            $cartItem = Cart::where('prod_id', $product_id)->where('user_id', Auth::id())->first();
            $cartItem->delete();
            return response()->json(['status'=>'Item is deleted from the cart!']);
        }
        }
        else
        {
            return response()->json(['status'=>'Login First']);
        }
    }
}
