@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-center " style="margin-top: 10vh">
        <div class="d-flex">
            {{-- left side --}}
            <div class="card mr-2" style="width: 25rem;">
                <img class="p-5 rounded-circle" src="https://via.placeholder.com/500" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text">
                    <h4>Rahim Mia</h4>
                    <h6>Dhaka Metropolitan</h6>
                    <div class="d-flex">
                        <p class="font-weight-bold mr-1">Tel:</p>
                        <p>017123654789</p>
                    </div>
                    <div class="d-flex">
                        <p class="font-weight-bold mr-1">Email:</p>
                        <p>rahim@gmail.com</p>
                    </div>
                    </p>
                    <div class="d-flex justify-content-center "><a class="btn btn-info" href="/edit">Edit</a></div>
                </div>
            </div>
            {{-- right side --}}
            <div class="card" style="width: 60rem">
                <h4 class="p-4">All Complaints</h4>
                <div class="card-body">
                    <p class="card-text">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Complaint type</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Handle By</th>
                                    <th scope="col">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Theft</td>
                                    <td>
                                        <span class="badge-pill badge-secondary">processing</span>
                                    </td>
                                    <td>QRFT</td>
                                    <td>11/25/2022</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Aggression</td>
                                    <td>
                                        <span class="badge-pill badge-warning">Investigation</span>
                                    </td>
                                    <td>QRFT</td>
                                    <td>11/30/2022</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Others</td>
                                    <td>
                                        <span class="badge-pill badge-success">Processed</span>
                                    </td>
                                    <td>Cyber Police</td>
                                    <td>10/01/2022</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
