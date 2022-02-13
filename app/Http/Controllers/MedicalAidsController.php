<?php

namespace App\Http\Controllers;

use App\Address;
use App\City;
use App\Fund;
use App\Medical;

use App\Suburb;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MedicalAidsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function list(User $user)
    {
        $medical = Medical::all();

        return view('admin.medicalAid.show',compact('user','medical'));

    }
    public function create()
    {
        $medical = new Medical();
        return view('admin.medicalAid.create',compact('medical'));

    }

    public function store()
    {
        $this->authorize('create', Medical::class);

        $medicals = Medical::create($this->validateRequest());

        $medical = Medical::all();

        return view('admin.medicalAid.show', compact('medical'));
    }
    public function edit($id)
    {
        $medId = request('medical');

        $medical = Medical::where('id', $medId)->firstOrFail();
        return view('admin.medicalAid.edit', compact('medical'));
    }
    public function update($id)
    {
        $data = request()->validate([
            'name' => 'required'

        ]);

        $medicals =  DB::table('medicals')
            ->where('id', request('medical'))
            ->update(['name' =>  request('name')]);



        $medical = Medical::all();
        return view('admin.medicalAid.show', compact('medical'));
    }
    private function validateRequest()
    {
        return request()->validate([
            'name' => 'required',

        ]);
    }
}
