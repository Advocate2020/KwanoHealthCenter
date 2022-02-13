@extends('layouts.patient')

@section('content')
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="card" style="background-color: cornflowerblue">
                <div class="card-header">
                    <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
                        <!-- Credit card form tabs -->
                        <ul class="nav bg-light nav-pills rounded nav-fill mb-3">
                            <li class="nav-item"> <a  href="/patient/{{Auth::user()->id}}/request" class="nav-link active "><i class="fa fa-flask" aria-hidden="true"></i> Upcoming Tests </a> </li>
                            <li class="nav-item"> <a  href="/patient/{{Auth::user()->id}}/request/history" class="nav-link"> <i class="bi bi-card-checklist"></i> Test History </a> </li>
                        </ul>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Please note!</strong>
                                You can <b>ONL</b> request a test once you or your dependent/s is experiencing Covid-19 symptoms (<b>Most common symptoms:</b> fever, cough, tiredness, loss of taste or smell).
                                Your account will be blocked if you miss <b>TWO</b> appointments and you will have to visit the clinic to have it unblocked.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-between align-items-baseline">
                            <h1>Test Request</h1>
                            <a class="btn btn-success" href="/patient/{{Auth::user()->id}}/request/create">Request Test</a>
                        </div>
                    </div>
                    <hr style="border-top: 1px solid red">
                    <br>
                    @if($requests->isEmpty())
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
                                <caption>Recent Test Requests</caption>
                                <thead>
                                <tr>
                                    <th scope="col" class="">#</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($requests as $req)
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
                                        <td class="d-flex">
                                            <form action="{{ route('request.cancel', ['user' => auth()->user()->id,'request' => $req->requestID]) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm px-3" onclick="archiveFunction()">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            </form>
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
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script>
        function archiveFunction() {
            event.preventDefault(); // prevent form submit
            var form = event.target.form; // storing the form
            sweetAlert({
                    title: "Are you sure?",
                    text: "You will not be able to revert this action.",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel please!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm){
                    if (isConfirm) {
                        form.submit();          // submitting the form when user press yes
                    } else {
                        swal("Cancelled", "Phew that was close :)", "error");
                    }
                });
        }
    </script>
@endsection
