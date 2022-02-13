<?php

namespace App\Http\Controllers;

use App\Address;
use App\City;
use App\Nurse;
use App\Suburb;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user)
    {
        $nurse =  DB::table('nurses')
            ->select('nurses.id','user_id','suburbname','code','cityname')
            ->join('suburbs', 'suburbs.id', '=', 'nurses.suburb_id')
            ->join('cities', 'suburbs.city_id', '=', 'cities.id')
            ->where('user_id', '=',$user->id)
            ->get();
        return view('nurse.suburb.index', compact('user','nurse'));
    }

    public function create(User $user,Nurse $nurse)
    {
        $suburbs = Suburb::all();
        $cities = City::all();

        return view('nurse.suburb.create', compact('user','nurse','suburbs','cities'));
    }
    public function store(User $user)
    {
        $data = request()->validate([
            'suburb' => 'required'

        ]);

        $sub = new Nurse();
        $sub->user_id = $user->id;
        $sub->suburb_id = request('suburb');
        $sub->save();

        $nurse = Nurse::where('user_id',$user->id)->firstOrFail();
        return view('nurse.suburb.index', compact('user','nurse'));
    }


}
