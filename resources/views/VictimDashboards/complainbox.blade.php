@extends('layouts.app')
@section('content')
    <div style="margin-top: 10vh;">
        <div class="col-9 border rounded m-auto p-5">
            <div class="col-3">
                <form action="" method="get">
                    <div class="mb-3">
                        <label class="form-label">Enter Complain Type</label>
                        <input type="text" class="form-control" style="width: 30rem">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Briefly Describe Your Complain Here</label>
                        <textarea type="text" class="form-control" style="width: 70rem;" rows="5"> </textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Attachment:</label>
                        <input class="form-control" type="file">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Anonymous Identity</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Complaint</button>
                </form>
            </div>
        </div>
    </div>
@endsection
