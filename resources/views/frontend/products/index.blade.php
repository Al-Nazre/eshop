@extends('layouts.masterfront')

@section('title')
    Products
@endsection

@section('content')

<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0"><a href="{{url("/category")}}">Collections</a> / {{$category->name}}</h6>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="row">
            <h1>
                {{$category->name}}
            </h1>
            <div class="col-md-12">
                <div class="row">
                    @foreach ($products as $product)
                         <div class="col-md-4 mb-3">
                            <a href="">
                                <div class="card">
                                    <a href="{{url('/category/'.$category->slug.'/'.$product->slug)}}">
                                        <div class="ratio ratio-16x9">
                                            <img style="object-fit: contain;" src="{{asset('assets/uploads/product/'.$product->image)}}" alt="Product Image">
                                        </div>
                                        <div class="card-body">
                                            <h5>{{$product->name}}</h5>
                                        <span class="float-start">{{$product->selling_price}}</span>
                                            <span class="float-end"><s>{{$product->original_price}}</s></span>
                                        </div>
                                    </a>
                                </div>
                            </a>
                        </div>
                    @endforeach
                
            </div>
        </div>
    </div>
</div>
    
@endsection