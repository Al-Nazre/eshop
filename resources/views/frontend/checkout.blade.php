@extends('layouts.masterfront')

@section('title', 'Checkout')

@section('content')
<div class="container mt-3">
<form action="{{url('place-order')}}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <h6>Basic Details</h6>
                    <hr>
                    <div class="checkout-form row">
                        <div class="col-md-6">
                            <label for="">First Name</label>
                            <input type="text" class="form-control" name='fname' value="{{Auth::user()->name}}" placeholder="Enter First Name">
                        </div>
                        <div class="col-md-6">
                            <label for="">Last Name</label>
                            <input type="text" class="form-control" name='lname' value="{{Auth::user()->lname}}" placeholder="Enter Last Name">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Email</label>
                            <input type="text" class="form-control" name='email' value="{{Auth::user()->email}}" placeholder="Enter Email">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Phone Number</label>
                            <input type="text" class="form-control" name='phone' value="{{Auth::user()->phone}}" placeholder="Enter Phone Number">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Address 1</label>
                            <input type="text" class="form-control" name='address1' value="{{Auth::user()->address1}}" placeholder="Enter Address 1">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Address 2</label>
                            <input type="text" class="form-control" name='address2' value="{{Auth::user()->address2}}" placeholder="Enter Address 2">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">City</label>
                            <input type="text" class="form-control" name='city' value="{{Auth::user()->city}}" placeholder="Enter City">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">State</label>
                            <input type="text" class="form-control" name='state' value="{{Auth::user()->state}}" placeholder="Enter State">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Country</label>
                            <input type="text" class="form-control" name='country' value="{{Auth::user()->country}}" placeholder="Enter Country">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">PIN Code</label>
                            <input type="text" class="form-control" name='pincode' value="{{Auth::user()->pincode}}" placeholder="Enter Zip Code">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <h6>Order Details</h6>
                    <hr>
                    <table class = "table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <body>
                            @php
                                $total = 0;
                            @endphp
                            @foreach($cartItems as $item)
                            <tr>
                                <td>{{$item->product->name}}</td>
                                <td>{{$item->prod_qty}}</td>
                                <td>{{$item->product->selling_price}}/-</td>
                            </tr>
                            @php
                                $total += $item->product->selling_price * $item->prod_qty
                            @endphp
                            @endforeach
                        </body>
                    </table>
                    <hr>
                    <div class="col-md-6">
                        <h6>Total Price: BDT {{$total}}/-</h6>
                        <input type="hidden" value="{{$total}}" name="total_price">
                    </div>
                    <hr>
                    <button class="btn btn-primary float-end">Place Order</button>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
@endsection