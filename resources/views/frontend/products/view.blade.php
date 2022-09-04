@extends('layouts.masterfront')
@section('title', $product->name)
    

@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0"><a href="{{url("/category")}}">Collections</a> / <a href="{{url('/category/'.$product->category->slug)}}">{{$product->category->name}}</a> / {{$product->name}}</h6>
    </div>
</div>

<div class="container">
    <div class="card shadow prod-data">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 border-light">
                    <img src="{{asset('assets/uploads/product/'.$product->image)}}" alt="" class="w-100">
                </div>
                <div class="col-md-8">
                    <h2 class="mb-0">
                        {{$product->name}}
                        @if ($product->trending == 1)
                            <label style="fontt-size:16px;" class="float-end badge bg-danger trending_tag">Tending</label>  
                        @endif
                        
                    </h2>

                    <hr>
                    <label class="me-3">Original Price : <s>BDT {{$product->original_price}}</s></label>
                    <label class="f2-bold">Selling Price : BDT {{$product->selling_price}}</label>
                    <p class="mt-3">
                        {{$product->small_descrip}}
                    </p>
                    <hr>
                    @if($product->qty > 0)
                    
                        <label class="badge bg-success">In stock</label>
                    
                    @else
                    
                        <label class="badge bg-danger">Out of stock</label>
                    
                    @endif
                    <div class="row mt-2">
                        <div class="col-md-2">
                            <input type="hidden" value='{{$product->id}}' class="prod-id">
                            <label for="Quantity">Quantity</label>
                            <div class="input-group text-center mb-3">
                                <button class="input-group-text decrement-btn">-</button>
                                <input class="form-control qty-input text-center" type="text" name = "quantity" value="1"/>
                                <button class="input-group-text increment-btn">+</button>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <br/>
                            <button type="button" class="btn btn-success me-3  float-start">Add to Wishlist <i class="fa fa-heart"></i></button>
                            <button type="button" class="btn btn-primary me-3 addCartBtn float-start">Add to Cart <i class="fa fa-shopping-cart"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <h2 class="mb-0">Description</h2>
            <p class="mt-3">
                    {{$product->description}}
            </p>
        </div>
    </div>
</div>
@endsection

