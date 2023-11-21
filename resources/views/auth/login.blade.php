@extends('screens.layout.app')
@section('content')



<div class="container col-md-4 mt-4" >
<form action="{{route('login')}}" method="POST">
    @csrf
    <div class="mb-3">
      <label class="form-label">Email address</label>
      <input name="email"  type="email" class="form-control" >
      @error('email')
        <span class="text-danger">{{$message}}</span>
      @enderror
      {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
    </div>
    <div class="mb-3">
      <label  class="form-label">Password</label>
      <input name="password" type="password" class="form-control" >
      @error('password')
      <span class="text-danger">{{$message}}</span>
    @enderror
    </div>
    {{-- <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div> --}}
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
  @endsection
