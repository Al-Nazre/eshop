@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
           <h4>Products page</h4> 
        </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Selling Price</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
        @foreach ($products as $item)
            <tbody>
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->category->name }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->selling_price }}</td>
                    <td>
                        <img src="{{ asset('assets/uploads/product/'.$item->image)}}" class="ctg-img" alt="Image Here">
                    </td>
                    <td>
                        <a href = "{{ url('edit-product/'.$item->id)}}" class="btn btn-primary">Edit</a>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong{{ $item->id }}">Delete</button>
                    </td>
                    <!--Pop up Modal -->
                    <div class="modal fade" id="exampleModalLong{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        
                        <div class="modal-body">
                            Are you sure?
                        </div>
                        <div class="modal-footer">
                            <a href="{{url('delete-product/'.$item->id)}}" type="button" class="btn btn-primary">Delete</a>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        </div>
                    </div>
                    </div>
                </tr>
            </tbody>
        @endforeach

        </table>
    </div>
@endsection