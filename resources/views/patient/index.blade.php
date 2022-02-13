@extends('layouts.patient')

@section('content')
    <div class="card bg-success align-items-center">
        <header class="w3-container" style="padding-top:22px">
            <b><h1 class="note"></h1></b>
        </header>
    </div>
    <hr>
    <div class="w3-row-padding w3-margin-bottom">
        <div class="w3-quarter">
            <div class="w3-container w3-red w3-padding-16">
                <div class="w3-left"><i class="fa fa-flask w3-xxxlarge" aria-hidden="true"></i>
                </div>
                <div class="w3-right">
                    <h3>{{$NewRequests}}</h3>
                </div>
                <div class="w3-clear"></div>
                <h4>Test Requests</h4>
            </div>
        </div>
        <div class="w3-quarter">
            <div class="w3-container w3-blue w3-padding-16">
                <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
                <div class="w3-right">
                    <h3>{{$ClosedRequests}}</h3>
                </div>
                <div class="w3-clear"></div>
                <h4>Closed Tests</h4>
            </div>
        </div>
        <div class="w3-quarter">
            <div class="w3-container w3-teal w3-padding-16">
                <div class="w3-left"><i class="fa fa-share-alt w3-xxxlarge"></i></div>
                <div class="w3-right">
                    <h3>23</h3>
                </div>
                <div class="w3-clear"></div>
                <h4>Results</h4>
            </div>
        </div>
        <div class="w3-quarter">
            <div class="w3-container w3-orange w3-text-white w3-padding-16">
                <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
                <div class="w3-right">
                    <h3>{{$totalDepends}}</h3>
                </div>
                <div class="w3-clear"></div>
                <h4>Dapendents</h4>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-9 col-xxl-8">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive bg-white">
                                    <table class="table table-bordered table-hover">
                                        <caption>List of dependents</caption>
                                        <thead>
                                        <tr>
                                            <th scope="col" class="">#</th>
                                            <th scope="col">Dependent Name</th>
                                            <th scope="col">Dependent Surname</th>
                                            <th scope="col">Dependent Cellphone</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($dependents as $depend)
                                            <tr>
                                                <th scope="row">{{$depend->dependentID}}</th>
                                                <td>
                                                    {{ $depend->name}}
                                                </td>
                                                <td>
                                                    {{ $depend->surname}}
                                                </td>
                                                <td>
                                                    {{ $depend->phone}}
                                                </td>
                                            </tr>
                                        </tbody>
                                        @endforeach
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-xxl-4">
                <div class="row">
                    <div class="col-xl-12" style="margin-bottom: 10px">
                        <div class="card bg-primary">
                            <div class="card-body">
                                <div class="date-bx d-flex align-items-center">
                                    <h2 class="mb-0 mr-3">{{ date('d') }}</h2>
                                    <div>
                                        <p class="mb-0 text-white op7">Today</p>
                                        <span class="fs-24 text-white font-w600">{{ date('l') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header border-0 shadow-sm">
                                <h4 class="fs-20 text-black font-w600" style="color: black">Project Today</h4>
                            </div>
                            <div class="card-body">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#myTable').DataTable();
        });
    </script>
    <script>
        $('#myTable').DataTable({
            "bSearching": true,
            "scrollY": "350px",
            "scrollCollapse": true,
            "bSort": true,
            "bPaging": true
        });
    </script>
    <script type="text/javascript">
        var welcome;
        var date = new Date();
        var hour = date.getHours();
        var minute = date.getMinutes();
        var second = date.getSeconds();
        if (minute < 10) {
            minute = "0" + minute;
        }
        if (second < 10) {
            second = "0" + second;
        }
        if (hour < 12) {
            welcome = "GOOD MORNING";
        } else if (hour < 17) {
            welcome = "GOOD AFTERNOON";
        } else {
            welcome = "GOOD EVENING";
        }

        $('.note').append(welcome);

    </script>
    <script>
        $(document).ready(function(){
            $('table tr').each(function(){
                if($(this).find('td').eq(0).text() == '3'){
                    $(this).css('background','red');
                }
            });
        });
    </script>


@endsection
