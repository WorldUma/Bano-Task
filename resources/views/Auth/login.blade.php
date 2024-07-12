@extends('layouts.app')
@section('name')
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-6">
                <h2 class="mb-4 text-center">Login</h2>
                <form action = "{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name = "email"aria-describedby="emailHelp">
                    </div>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name ="password">
                    </div>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>
                <div class="mt-3">
                    <p>Create an account? <a href="{{ route('register') }}">Register here</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
