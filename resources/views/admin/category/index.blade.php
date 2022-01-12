@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
           <h4>category page</h4> 
        </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
        @foreach ($category as $item)
            <tbody>
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>
                        <img src="{{ asset('assets/uploads/category/'.$item->image)}}" class="ctg-img" alt="Image Here">
                    </td>
                    <td>
                        <button class="btn btn-primary">Edit</button>
                        <button class="btn btn-primary">Delete</button>
                    </td>
                </tr>
            </tbody>
        @endforeach

        </table>
    </div>
@endsection