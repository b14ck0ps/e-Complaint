@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title text-center">Archive</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>
                                    ID
                                </th>
                                <th>
                                    Complainant Name
                                </th>
                                <th>
                                    Handled By
                                </th>
                                <th>
                                    Assigned To
                                </th>
                                <th>
                                    Investigator
                                </th>
                                <th>
                                    Case Filed
                                </th>
                                <th>
                                    Last Updated
                                </th>
                                <th>
                                    Action
                                </th>
                            </thead>
                            <tbody>
                                @foreach ($archive as $archive)
                                    <tr>
                                        <td>
                                            {{ $archive->id }}
                                        </td>
                                        <td>
                                            {{ $archive->complaint_type }}
                                        </td>
                                        <td>
                                            {{ $archive->handle_by }}
                                        </td>
                                        <td>
                                            {{ $archive->assign_to }}
                                        </td>
                                        <td>
                                            {{ $archive->investigator }}
                                        </td>
                                        <td>
                                            {{ $archive->created_at }}
                                        </td>
                                        <td>
                                            {{ $archive->updated_at }}
                                        </td>
                                        <td>
                                            <a href="/complain/{{ $archive->id }}" class="btn btn-success">Details</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
