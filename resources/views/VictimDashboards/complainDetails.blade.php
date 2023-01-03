@extends('layouts.app')
@section('content')
    <div class="card mx-auto" style="width: 60rem; margin-top: 30px;">
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
            @if ($comments != null)
                <div class="d-flex justify-content-between">
                    <div>
                        <p><strong>Case Updates:</strong></p>
                        @foreach ($comments as $comment)
                            <div class="card p-2 mb-1" style="width: 800px">
                                <p><strong>Invesigator: </strong>{{ $comment->investigaor }}</p>
                                <p><strong>Details: </strong>{{ $comment->comment }}</p>
                                <p class="text-right">{{ date('M j, Y, g:i a', strtotime($comment->created_at)) }}</p>
                            </div>
                        @endforeach
                        @if ($comments->hasPages())
                            <div class="pagination-wrapper d-flex justify-content-center mt-3">
                                {{ $comments->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            @endif
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
                        <div class="form-group justify-content-center align-items-center">
                            <select class="form-control" name="assign_to">
                                <option value="Quick Reactoin Force">Quick Reactoin Force</option>
                                <option value="Quick Reaction Team">Quick Reaction Team</option>
                            </select>
                            <select class="form-control mt-2" name="investigator">
                                @foreach ($agents as $agent)
                                    <option value="{{ $agent->name }}">{{ $agent->name }}</option>
                                @endforeach
                            </select>
                            <input type="hidden" name="id" value="{{ $complain->id }}">
                            <button type="submit" class="btn btn-primary mt-2">Assign</button>
                        </div>
                    </form>
                </div>
            @endif
            @if (auth()->user()->type == 'HQ' && $complain->status != 'Complete')
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
            @if (auth()->user()->type == 'SPECIAL_AGENT' || auth()->user()->type == 'QR_AGENT')
                <div style="max-width: 300px">
                    <form action="/comment" method="POST">
                        @csrf
                        <p>Updates about this case</p>
                        <div class="form-group">
                            <textarea name="comment" id="" cols="37" rows="3"></textarea>
                            <input type="hidden" name="complain_id" value="{{ $complain->id }}">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </form>
                </div>
            @endif
            <div class="d-flex justify-content-between align-items-center">
                <a href="{{ url()->previous() }}">Back</a>
                @if (auth()->user()->type == 'SPECIAL_AGENT' || auth()->user()->type == 'QR_AGENT')
                    <form action="/case/complete" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $complain->id }}">
                        <button type="submit" class="btn btn-success" href="">Complete case</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
