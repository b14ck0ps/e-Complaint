@extends('layouts.app')
@section('content')
    <div class="card mx-auto" style="width: 60rem; margin-top: 100px;">
        <div class="card-header d-flex flex-col justify-content-between">
            <p class="p-2"><strong>Type :</strong> {{ $complain->complaint_type }}</p>
            <p class="p-2"><strong>Privacy :</strong>
                {{ $complain->anonymous ? 'Anonymous' : 'Normal' }}
            </p>
        </div>
        <div class="card-body">
            <p class="card-text">
            <div>
                <p> <strong>Created:</strong> {{ $complain->created_at }}</p>
                <p><strong>Details: </strong>{{ $complain->description }}</p>
            </div>
            </p>
            <a href="/home">Back</a>
        </div>
    </div>
@endsection
