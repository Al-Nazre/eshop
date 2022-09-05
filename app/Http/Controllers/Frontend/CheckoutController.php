<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    function index()
    {
        $old_cartItems = Cart::where('user_id', Auth::id())->get();
        foreach($old_cartItems as $item)
        {
            if(!Product::where('id', $item->prod_id)->where('qty','>=',$item->prod_qty)->exists())
            {
                $removeItem = Cart::where('user_id',Auth::id())->where('prod_id', $item->prod_id)->first();
                $removeItem->delete();
            }
        }

        $cartItems = Cart::where('user_id',Auth::id())->get();
        return view('frontend.checkout', compact('cartItems'));
    }

    function placeOrder(Request $request)
    {
        $order = new Order;
        $order->user_id = Auth::id();
        $order->total_price = $request->input('total_price');
        $order->fname = $request->input('fname');
        $order->lname = $request->input('lname');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address1 = $request->input('address1');
        $order->address2 = $request->input('address2');
        $order->city = $request->input('city');
        $order->state = $request->input('state');
        $order->country = $request->input('country');
        $order->pincode = $request->input('pincode');
        $order->tracking_no = 'order'.rand(111,9999);
        $order->save();

        $cartItems = Cart::where('user_id',Auth::id())->get();
        foreach ($cartItems as $item) 
        {
        // one way to store input value
                $orderItem = new OrderItem;
                $orderItem->order_id = $order->id;
                $orderItem->prod_id = $item->prod_id;
                $orderItem->qty = $item->prod_qty;
                $orderItem->price = $item->product->selling_price;
                $orderItem->save();

        // Another way to store input value
                // OrderItem::crate([
                //     'order_id' => $order->id,
                //     'prod_id' => $item->prod_id,
                //     'qty' => $item->prod_qty,
                //     'price' => $item->product->selling_price,
                // ];)

        // updating product qty after placing order
                $product = Product::where('id', $item->prod_id)->first();
                $product->qty = $product->qty - $item->prod_qty;
                $product->update();
        }

        if(Auth::user()->address1 == NULL)
        {
            Auth::user()->name = $request->input('fname');
            Auth::user()->lname = $request->input('lname');
            Auth::user()->phone = $request->input('phone');
            Auth::user()->address1 = $request->input('address1');
            Auth::user()->address2 = $request->input('address2');
            Auth::user()->city = $request->input('city');
            Auth::user()->state = $request->input('state');
            Auth::user()->country = $request->input('country');
            Auth::user()->pincode = $request->input('pincode');
            Auth::user()->update();
        }
    
        Cart::destroy($cartItems);
        
         return redirect('/')->with('status','Ordered Successfully!');;
    }
}
