<?php

namespace App\Http\Controllers;

use App\Suburb;
use App\City;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class SuburbsController extends Controller
{
    protected function authenticated($user)
    {




    }
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list()
    {

        $cities = City::all();
        $suburbs = Suburb::all();
        return view('admin.suburb.show', compact('suburbs', 'cities'));
    }

    public function create()
    {
        $cities = City::all();
        return view('admin.suburb.create',compact('cities'));
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required|min:3',
            'code' => 'required|min:4', 'max:4',
            'city_id' => 'required'
        ]);


        $suburb = new Suburb();
        $suburb->suburbname = request('name');
        $suburb->code = request('code');
        $suburb->city_id = request('city_id');
        $suburb->save();


        $suburbs = Suburb::all();
        return view('admin.suburb.show')->with('suburbs', $suburbs)->with('message', 'New Suburb Added Successfully');



    }

}
