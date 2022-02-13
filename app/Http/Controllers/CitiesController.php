<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CitiesController extends Controller
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
        return view('admin.cities', compact('cities'));
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required|min:3'
        ]);

        $city = new City();
        $city->cityname = request('name');
        $city->save();

        return back()->with('message', 'New City Added');
    }
}
