@extends('layouts.master')
@section('title', 'Laravel-Test || Login')
@section('main-content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                @include('layouts.notification')
            </div>
        </div>
        <form class="form" method="post" action="{{ url('/login') }}">
            {{ csrf_field() }}
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" required="required" class="form-control" value="{{ old('email') }}"
                    placeholder="Enter email">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="password" required="required"
                    value="{{ old('password') }}" placeholder="Enter Password">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">เข้าสู่ระบบ</button>
            <small id="emailHelp" class="form-text text-muted">E-mail: admin@gmail.com</small>
            <small id="emailHelp" class="form-text text-muted">Password: admin@gmail.com</small>
        </form>
    </div>

@endsection
