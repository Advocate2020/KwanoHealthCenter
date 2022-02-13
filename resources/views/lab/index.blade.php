@extends('layouts.lab')

@section('content')
    <div class="card bg-success align-items-center">
        <header class="w3-container" style="padding-top:22px">
            <b><h1 class="note"></h1></b>
        </header>
    </div>
    <hr>
@endsection
@section('scripts')
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
@endsection
