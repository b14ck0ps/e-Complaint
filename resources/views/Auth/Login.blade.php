@extends('layouts.app')
@section('content')
    <div class="row" style="margin-top: 20vh">
        <div class="col-3 m-auto border rounded p-5">
            <h4 class="text-center">Welcome</h4>
            @if (session('status'))
                <div class=" text-center alert alert-danger">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="/login">
                @csrf
                <div class="mb-3">
                    <label class="form-label">E-mail</label>
                    <input type="email" class="form-control" aria-describedby="emailHelp" name="email">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Remember me</label>
                    <a style="margin-left: 130px" href="/register">Need an account?</a>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
@endsection
