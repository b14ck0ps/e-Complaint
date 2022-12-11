@extends('layouts.app')
@section('content')
    <div style="margin-top: 10vh;">
        <div class="col-9 border rounded m-auto p-5">
            <div class="col-3">
                <form action="/complain" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Enter Complain Type</label>
                        <input type="text" class="form-control" style="width: 30rem" name="complaint_type">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Briefly Describe Your Complain Here</label>
                        <textarea type="text" class="form-control" style="width: 70rem;" rows="5" name="description"> </textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Attachment:</label>
                        <input class="form-control" type="file" name="attachment1">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" name="anonymous">
                        <label class="form-check-label">Anonymous Identity</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Complaint</button>
                </form>
            </div>
        </div>
    </div>
@endsection
