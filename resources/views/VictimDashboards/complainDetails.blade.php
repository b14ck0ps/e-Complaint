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
            <div class="d-flex justify-content-between">
                <div>
                    <p> <strong>Created:</strong> {{ $complain->created_at }}</p>
                    <p><strong>Details: </strong>{{ $complain->description }}</p>
                </div>
                <div>
                    <img height="400px" src={{ asset('storage/' . $complain->attachment1) }} alt="">
                    <p class="mt-3 text-center"><strong>Attachment</strong></p>
                </div>
            </div>

            <a href="{{ url()->previous() }}">Back</a>
        </div>
    </div>
@endsection
