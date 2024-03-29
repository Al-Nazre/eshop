@extends('layouts.masterfront')

@section('title')
    Welcome to E Shop
@endsection

@section('content')
    @include('layouts.inc.slider')

   <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Featured Products</h2>
             <div class="owl-carousel featured-carousel owl-theme">
                    @foreach ($featured_products as $item)
                        <div class="item">
                            <div class="card">
                                <a href="{{url('/category/'.$item->category->slug.'/'.$item->slug)}}">
                                <div class="ratio ratio-16x9">
                                    <img style="object-fit: contain;" src="{{asset('assets/uploads/product/'.$item->image)}}" alt=" product image">
                                </div>
                                <div class="card-body">
                                    <h5>{{$item->name}}</h5>
                                    <span class="float-start">{{$item->selling_price}}</span>
                                    <span class="float-end"><s>{{$item->original_price}}</s></span>
                                </div>
                                </a>
                            </div>
                    </div>
                    
                    @endforeach
                </div>
              </div>
            </div>
        </div>
    
     <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Trending Category</h2>
             <div class="owl-carousel featured-carousel owl-theme">
                    @foreach ($trending_category as $item)
                        <div class="item">
                                <div class="card">
                                    <a href="{{url('/category/'.$item->slug)}}">
                                    <div class="ratio ratio-16x9">
                                        <img style="object-fit: contain;" src="{{asset('assets/uploads/category/'.$item->image)}}" alt=" product image">
                                    </div>
                                    <div class="card-body">
                                        <h5>{{$item->name}}</h5>
                                        <p>
                                            {{$item->description}}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    
                    @endforeach
                </div>
              </div>
            </div>
        </div>
    
    
@endsection

@section('scripts')
    <script>
        $('.featured-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4 
        }
    }
})
    </script>
@endsection