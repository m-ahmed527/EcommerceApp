@extends('screens.layout.app')
@section('content')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="card mt-3">
                <h3 class='text-center'>Product : {{strtoupper($product->name)}}</h3>
                <form action="{{ route('update.product', $product->slug )}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Name of Product</label>
                        <input type="text" placeholder="Name" name="name" class="form-control" value="{{$product->name}}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description" cols="30" rows="4" class="form-control" value="{{old('description')}}" >{{$product->description}}</textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" name="image" class="form-control">
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <img src="{{asset('images/'.$product->image)}}" height="50" width="50" alt="Error">
                    </div>
                    <button type="submit"  class="btn btn-dark">Update</button>
                    <a  href="{{route('products')}}"  type="submit" class="btn btn-dark" >Back</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
