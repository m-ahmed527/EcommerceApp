@extends('screens.layout.app')
@section('content')
    <div class="container col-md-4 mt-4">
        @if (\session()->has('message'))
            {{ session()->get('message')}}
        @endif
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-3">
                <div>
                    <label  class="form-label">First Name</label>
                    <input type="text" name='name' class="form-control">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label  class="form-label">Last Name</label>
                    <input type="text" name='last_name' class="form-control">
                    @error('last_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control"
                        id="exampleInputEmail1"aria-describedby="emailHelp">
                    {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                </div>

            </div>

            <div class="mb-3">

                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control">
                @error('password_confirmation')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            {{-- <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div> --}}
            <button type="submit" class="btn btn-primary mt-3">Register</button>
        </form>
    </div>
@endsection
