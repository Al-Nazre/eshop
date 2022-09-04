@extends('layouts.masterfront')

@section('title')
    Category
@endsection

@section('content')
<div class="py-5">
    <div class="container">
        <div class="row">
            <h1>
                All Categories
            </h1>
            <div class="col-md-12">
                <div class="row">
                    @foreach ($category as $item)
                         <div class="col-md-4 mb-3">
                            <a href="{{url('/category/'.$item->slug)}}">
                                <div class="card">
                                    <div class="ratio ratio-16x9">
                                    <img style="object-fit: contain;" src="{{asset('assets/uploads/category/'.$item->image)}}" alt="">
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