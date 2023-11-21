@extends('screens.layout.app')
@section('content')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="card mt-3">
                <form action="{{route('store.product')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Name of Product</label>
                        <input type="text" placeholder="Name" name="name" class="form-control" value="{{old('name')}}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description" cols="30" rows="4" class="form-control">{{old('description')}}</textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" name="image" class="form-control" value="{{old('image')}}">
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button  class="btn btn-dark">Submit</button>
                    <a  href="{{route('index')}}"  class="btn btn-dark" >Back</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
