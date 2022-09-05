@extends('layouts.masterfront')

@section('title', 'Cart')

@section('content')

    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{url("/")}}">Home
                </a> / 
                <a href="{{url('cart')}}">Cart
                </a> / 
            </h6>
        </div>
    </div>

    <div class="container my-5">
        <div class="card shadow">
            <div class="card-body">
                @php
                    $total = 0;
                @endphp
                @foreach ($cartItems as $item)
                 <div class="row prod-data">
                    <div class="col-md-2 my-auto">
                        <img src="{{asset('assets/uploads/product/'.$item->product->image)}}" style="object-fit: contain;" height="70px" width="70px" alt="Product Image">
                    </div>
                    <div class="col-md-3 my-auto">
                        <h6>{{$item->product->name}}</h6>
                    </div>
                    <div class="col-md-2 my-auto">
                        <h6>BDT {{$item->product->selling_price}}</h6>
                    </div>
                    <div class="col-md-3 my-auto">
                         <input type="hidden" value="{{$item->prod_id}}" class="prod-id">

                         @if($item->product->qty > $item->prod_qty)

                            <label for="Quantity">Quantity</label>
                            <div class="input-group text-center mb-3">
                                <button class="input-group-text change-qty decrement-btn">-</button>
                                <input class="form-control qty-input text-center" type="text" name = "quantity" value="{{$item->prod_qty}}"/>
                                <button class="input-group-text change-qty increment-btn">+</button>
                            </div>
                            @php
                                $total += $item->product->selling_price * $item->prod_qty
                            @endphp

                            @elseif($item->product->qty == $item->prod_qty)

                            <label for="Quantity">Quantity</label>
                            <div class="input-group text-center mb-3">
                                <button class="input-group-text change-qty decrement-btn">-</button>
                                <input class="form-control qty-input text-center" type="text" name = "quantity" value="{{$item->prod_qty}}"/>
                                <button class="input-group-text stock-out">+</button>
                            </div>
                            @php
                                $total += $item->product->selling_price * $item->prod_qty
                            @endphp

                          @else

                          <h6>Out of stock</h6>

                          @endif
                    </div>
                    <div class="col-md-2 my-auto">
                        <button class="btn btn-danger delete-cart-item">remove</button>
                    </div>
                </div>   
                
                @endforeach
               
            </div> 
               <div class="card-footer">
                    <h6>
                        Total Price: BDT  {{$total}} 
                     <a href="{{url('/checkout')}}" class="btn-outline-success btn float-end">Proceed to checkout</a>   
                    </h6>
                   
                </div>
        </div>
    </div>
@endsection
