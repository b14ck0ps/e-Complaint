@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-center " style="margin-top: 10vh">
        <div class="d-flex">
            {{-- left side --}}
            <div class="card mr-2" style="width: 25rem;">
                <img class="p-5 rounded-circle"
                    @if ($user->profile_pic == null) src={{ asset('img/default_avater.jpg') }}
                @else
                src={{ asset('storage/' . $user->profile_pic) }} @endif
                    alt="Profile Picture">
                <div class="card-body">
                    <p class="card-text">
                    <h4> {{ $user->name }} </h4>
                    <h6>{{ $user->address }} </h6>
                    <div class="d-flex">
                        <p class="font-weight-bold mr-1">Tel:</p>
                        <p>{{ $user->phone }} </p>
                    </div>
                    <div class="d-flex">
                        <p class="font-weight-bold mr-1">Email:</p>
                        <p>{{ $user->email }} </p>
                    </div>
                    </p>
                    <div class="d-flex justify-content-center "><a class="btn btn-info" href="/edit">Edit</a></div>
                </div>
            </div>
            {{-- right side --}}
            <div class="card" style="width: 60rem">
                <h4 class="p-4">All Users</h4>
                <div class="card-body">
                    <p class="card-text">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Account Created</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <th scope="row">{{ $user->id }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->type }}</td>
                                        <td>{{ $user->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
