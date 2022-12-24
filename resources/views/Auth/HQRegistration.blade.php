@extends('layouts.app')
@section('content')
    <div class="row mt-1">
        <div class="col-3 m-auto border rounded p-5">
            <form method="POST" action="/hq/register" enctype="multipart/form-data">
                @csrf
                <h4 class="text-center">Registration</h4>
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">E-mail</label>
                    <input type="email" class="form-control" name="email">
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input type="number" class="form-control" name="phone">
                    @error('phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Date Of Birth</label>
                    <input type="date" class="form-control" name="dob">
                    @error('dob')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <input type="text" class="form-control" name="address">
                    @error('address')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">National ID</label>
                    <input type="number" class="form-control" name="nid">
                    @error('nid')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password">
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Password Confirmation</label>
                    <input type="password" class="form-control" name="password_confirmation">
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 form-check">
                </div>

                <div class="mb-3">
                    <label class="form-label ">Profile Picture</label>
                    <input type="file" class="form-control" name="profile_pic">
                    @error('profile_pic')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex align-items-center">
                    <button type="submit" class="btn btn-primary">Register</button>
                    <a style="margin-left: 130px" href="/login">Already has an Account?</a>
                </div>
            </form>
        </div>
    </div>
@endsection
