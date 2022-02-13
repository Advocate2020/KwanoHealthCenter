@extends('layouts.admin')

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
                    <h3>52</h3>
                </div>
                <div class="w3-clear"></div>
                <h4>Test Requests</h4>
            </div>
        </div>
        <div class="w3-quarter">
            <div class="w3-container w3-blue w3-padding-16">
                <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
                <div class="w3-right">
                    <h3>99</h3>
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
                <h4>Patients</h4>
            </div>
        </div>
        <div class="w3-quarter">
            <div class="w3-container w3-orange w3-text-white w3-padding-16">
                <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
                <div class="w3-right">
                    <h3>{{$total}}</h3>
                </div>
                <div class="w3-clear"></div>
                <h4>Users</h4>
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
                            <div class="table-responsive">
                                <table class="table table-borderless display nowrap" id="myTable" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Suburb Name</th>
                                        <th>Postal Code</th>
                                        <th>City</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($suburbs as $suburb)
                                        <tr>
                                            <th>{{$suburb->id}}</th>
                                            <td>
                                                {{ $suburb->suburbname ?? false}}
                                            </td>
                                            <td>
                                                {{ $suburb->code ?? false}}
                                            </td>
                                            <td>
                                                {{ $suburb->city->cityname ?? false}}
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
                <div class="col-xl-12">
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
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
    <!-- Datepicker -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- Datatables -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript"
            src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.js">
    </script>
    <!-- Momentjs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#myTable').DataTable({
                "responsive":true,
                "bSearching": true,
                "scrollY": "350px",
                "scrollCollapse": true,
                "bSortable": true,
                "bPaging": true
            });
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
