@extends('screens.layout.app')
@section('content')
    <div class="container">
        <table class="table table-hover mt-3">
            <thead>
                <tr>
                    <th>S.no</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td><img src="{{ asset('images/' . $product->image) }}" alt="" height="50" width="50"></td>
                        <td>
                    <a href="{{route('show.product',$product->slug)}}" class="btn btn-dark">Show</a>
                    <a href="{{route('edit.product',$product->slug)}}" class="btn btn-dark">Edit</a>
                    <a href="{{route('delete.product',$product->slug)}}" class="btn btn-danger">Delete</a></td>

                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
@endsection
