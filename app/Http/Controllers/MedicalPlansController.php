<?php

namespace App\Http\Controllers;

use App\Medical;
use App\Plan;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MedicalPlansController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function list(User $user)
    {
        $plans = DB::table('medicals')
             ->select('medicals.name','plans.name as plan_name','plans.id as plan_id')
            ->join('plans', 'plans.medical_id', '=', 'medicals.id')
            ->get();
        return view('admin.medicalPlans.show',compact('user','plans'));

    }
    public function create(User $user)
    {
        $medicals = Medical::all()->sortBy('name');

        return view('admin.medicalPlans.create', compact('user','medicals'));

    }

    public function store(User $user)
    {
        $data = request()->validate([
            'medical_id' => 'required',
            'name' => 'required'

        ]);

        $plan = new Plan();
        $plan->medical_id = request('medical_id');
        $plan->name = request('name');


        $plan->save();

        $plans = DB::table('medicals')
            ->select('medicals.name','plans.name as plan_name','plans.id as plan_id')
            ->join('plans', 'plans.medical_id', '=', 'medicals.id')
            ->get();

        return view('admin.medicalPlans.show', compact('user','plans'));
    }
    public function edit($id)
    {
        $planId = request('plan');

        $medical = Plan::where('id', $planId)->firstOrFail();
        $medicals = Medical::all()->sortBy('name');
        return view('admin.medicalPlans.edit', compact('medical','medicals'));
    }
    public function update($id)
    {
        $data = request()->validate([
            'medical_id' => 'required',
            'name' => 'required'

        ]);

        $medical =  DB::table('plans')
            ->where('id', request('plan'))
            ->update(['name' =>  request('name'),'medical_id' =>  request('medical_id')]);



        $plans = DB::table('medicals')
            ->select('medicals.name','plans.name as plan_name','plans.id as plan_id')
            ->join('plans', 'plans.medical_id', '=', 'medicals.id')
            ->get();

        return view('admin.medicalPlans.show', compact('plans'));
    }
}
