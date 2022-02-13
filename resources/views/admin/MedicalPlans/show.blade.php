@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-baseline">
            <h1>Medical Aid Plan List</h1>
            <a class="btn btn-primary" href="/admin/{{auth()->user()->id}}/plans/create">Add Medical Plan</a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">Medical Aid</div>
        <div class="col-sm-4">Medical Plan</div>
    </div>
    <hr>



    @foreach($plans as $plan)
        <div class="row">
            <div class="col-4">
                {{ $plan->plan_id }}
            </div>
            <div class="col-4">

                <li><a href="{{ route('plan.edit', ['user' => auth()->user()->id,'plan' => $plan->plan_id]) }}">
                        {{ $plan->name }}
                    </a></li>



            </div>
            <div class="col-4">

                <li><a href="{{ route('plan.edit', ['user' => auth()->user()->id,'plan' => $plan->plan_id]) }}">
                        {{ $plan->plan_name }}
                    </a></li>



            </div>

        </div>
    @endforeach








@endsection
