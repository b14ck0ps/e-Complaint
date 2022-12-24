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
                    <p> <strong>Created:</strong> {{ date('F j, Y, g:i a', strtotime($complain->created_at)) }}</p>
                    <p><strong>Details: </strong>{{ $complain->description }}</p>
                </div>
                <div>
                    <img height="400px" src={{ asset('storage/' . $complain->attachment1) }} alt="">
                    @if ($complain->attachment1 != null)
                        <p class="mt-3 text-center"><strong>Attachment</strong></p>
                    @else
                        <p class="mt-3 text-center"><strong>No Attachment</strong></p>
                    @endif
                </div>
            </div>
            <hr>
            @if (auth()->user()->type == 'CYBER_POLICE')
                <div style="max-width: 300px">
                    <form action="/sendcomplain" method="POST">
                        @csrf
                        <p>Send Complaint TO</p>
                        <div class="form-group d-flex justify-content-center align-items-center">
                            <select class="form-control" name="handle_by">
                                <option value="Police Station">Police Station</option>
                                <option value="Police HQ">Police HQ</option>
                            </select>
                            <input type="hidden" name="id" value="{{ $complain->id }}">
                            <button type="submit" class="btn btn-primary ml-2">Send</button>
                        </div>
                    </form>
                </div>
            @endif
            @if (auth()->user()->type == 'POLICE')
                <div style="max-width: 300px">
                    <form action="/assignTask" method="POST">
                        @csrf
                        <p>Assign Task TO</p>
                        <div class="form-group d-flex justify-content-center align-items-center">
                            <select class="form-control" name="assign_to">
                                <option value="Quick Reactoin Force">Quick Reactoin Force</option>
                                <option value="Quick Reaction Team">Quick Reaction Team</option>
                            </select>
                            <input type="hidden" name="id" value="{{ $complain->id }}">
                            <button type="submit" class="btn btn-primary ml-2">Assign</button>
                        </div>
                    </form>
                </div>
            @endif
            @if (auth()->user()->type == 'HQ')
                <div style="max-width: 300px">
                    <form action="/assignAgent" method="POST">
                        @csrf
                        <p>Assign Special Agent</p>
                        <div class="form-group d-flex justify-content-center align-items-center">
                            <select class="form-control" name="investigator">
                                @foreach ($agents as $agent)
                                    <option value="{{ $agent->name }}">{{ $agent->name }}</option>
                                @endforeach
                            </select>
                            <input type="hidden" name="id" value="{{ $complain->id }}">
                            <button type="submit" class="btn btn-primary ml-2">Assign</button>
                        </div>
                    </form>
                </div>
            @endif
            <a href="{{ url()->previous() }}">Back</a>
        </div>
    </div>
@endsection
