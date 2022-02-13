@extends('layouts.patient')

@section('content')
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="card" style="background-color: cornflowerblue">
                <div class="card-header">
                    <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
                        <!-- Credit card form tabs -->
                        <ul  class="nav bg-light nav-pills rounded nav-fill mb-3">
                            <li class="nav-item"> <a href="/patient/{{auth()->user()->id}}/request" class="nav-link"><i class="fa fa-flask" aria-hidden="true"></i> Upcoming Tests </a> </li>
                            <li class="nav-item"> <a  href="/patient/{{auth()->user()->id}}/request/history" class="nav-link active"> <i class="bi bi-card-checklist"></i> Test History </a> </li>
                        </ul>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Test Request History</strong>
                                All the test requests that you have made in the past will display here
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <hr style="border-top: 1px solid red">
                    <br>
                    @if($history->isEmpty())
                        <div class="row" style="display:block;">
                            <div class="col-md-12 col-md-offset-5">
                                <div class="nomembers">
                                    <div class="text-center empty" role="dialog" aria-modal="true">
                                        <div class="swal-title" style="">Sorry</div>
                                        <div class="swal-text" style="">
                                            Sorry, you have no active appointments available.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="table-responsive bg-white">
                            <table class="table table-bordered table-hover">
                                <caption>Past Test Requests</caption>
                                <thead>
                                <tr>
                                    <th scope="col" class="">#</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Status</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($history as $req)
                                    <tr>
                                        <th scope="row">{{$req->requestID}}</th>
                                        <td>
                                            {{ $req->requestDate}}
                                        </td>
                                        <td>
                                            {{ $req->requestTime}}
                                        </td>
                                        <td>
                                            {{ $req->status}}
                                        </td>

                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
