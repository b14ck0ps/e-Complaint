@extends('layouts.app')
@section('content')
    <div class="row mt-1">
        <div class="col-3 m-auto border rounded p-5">
            <form>
                <h4 class="text-center">Registration</h4>
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">E-mail</label>
                    <input type="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Date Of Birth</label>
                    <input type="date" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <input type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">National ID</label>
                    <input type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password Confirmation</label>
                    <input type="password" class="form-control">
                </div>
                <div class="mb-3 form-check">
                </div>
                <div class="d-flex align-items-center">
                    <button type="submit" class="btn btn-primary">Register</button>
                    <a style="margin-left: 130px" href="/login">Already has an Account?</a>
                </div>
            </form>
        </div>
    </div>
@endsection
