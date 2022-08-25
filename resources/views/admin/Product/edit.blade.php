@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
          <h4> Update Product </h4>
        </div>
    <div class="card-body">
        <form action="{{url('update-product/'.$product->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row">
                
                
                <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="GroupSelect01">Category</label>
                </div>
                <select class="custom-select"  name="cate_id" id="GroupSelect01">
                <option value="{{$product->category->id}}">{{$product->category->name}}</option>
                @foreach ($category as $item )
                   <option value="{{$item->id}}">{{ $item->name }}</option> 
                @endforeach
                </select>
                
                </div>
                
                
                <div class="col-md-6 mb-3">
                    <label for="">Name</label>
                    <input type="text" value="{{$product->name}}" class="form-control" name="name">
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="">Slug</label>
                    <input type="text" value="{{$product->slug}}" class="form-control" name="slug">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Small Description</label>
                    <textarea name="small_descrip" rows="3" class="form-control">{{$product->small_descrip}}</textarea>
                </div>

                <div class="col-md-12 mb-3">
                    <label for="">Description</label>
                    <textarea name="description" rows="3" class="form-control">{{$product->description}}</textarea>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="">Original Price</label>
                    <input type="number" value="{{$product->original_price}}" class="form-control" name="original_price">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="">Selling Price</label>
                    <input type="number" value="{{$product->selling_price}}" class="form-control" name="selling_price">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="">Quantity</label>
                    <input type="number" value="{{$product->qty}}" class="form-control" name="qty">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="">Tax</label>
                    <input type="number" value="{{$product->tax}}" class="form-control" name="tax">
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="">Status</label>
                    <input type="checkbox" {{$product->status == 1 ? 'checked':''}} name="status" >
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="">Trending</label>
                    <input type="checkbox" {{$product->trending == 1 ? 'checked':''}} name="trending">
                </div>
                
                <div class="col-md-12 mb-3">
                    <label for="">Meta Title</label> 
                    <input type="text" value="{{$product->meta_title}}" class="form-control" name="meta_title">
                </div>
                
                <div class="col-md-12 mb-3">
                    <label for="">Meta Keywords</label>
                    <textarea name="meta_keywords" rows="3" class="form-control">{{$product->meta_keywords}}</textarea> 
                </div>
                
                <div class="col-md-12 ab-3">
                    <label for="">Meta Description</label> 
                    <textarea name="meta_descrip" rows="3" class="form-control">{{$product->meta_descrip}}</textarea>
                </div>
                @if ($product->image)
                <img src="{{ asset('assets/uploads/product/'.$product->image)}}" class="ctg-img" alt="product Image">
                    
                @endif
                <div class="col-md-12">
                    <input type="file" name="image" class="form-control">
                </div>
                
                <div class="col-md-12"> 
                    <button type="submit" class="Ebtn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>

@endsection