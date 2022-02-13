@extends('layouts.nurse')

@section('content')
    <div class="row pb-4">
        <div class="col-12 d-flex justify-content-between align-items-baseline">
            <h1 class="p-b-3">Select Favourite Suburbs</h1>
            <a href="/nurse/{{Auth::user()->id}}/favourites" class="btn btn-primary">< Back</a>
        </div>
    </div>



    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="myTable">
            <caption>List of suburbs</caption>
            <thead>
            <tr>
                <th>#</th>
                <th>Suburb name</th>
                <th>suburb code</th>
                <th>City</th>
                <th>Add favourite</th>
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
                        {{ $suburb->cityname ?? false}}
                    </td>
                    <td>
                        <form action="{{ route('favourites.store', ['user' => auth()->user()->id,'suburb' => $suburb->id]) }}" method="post">
                            @csrf
                        <button type="submit" class="btn btn-primary btn-sm px-3">
                            <i class="fas fa-plus"></i>
                        </button>
                        </form>
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
