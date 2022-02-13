<?php

namespace App\Http\Controllers;

use App\City;
use App\Favourites;
use App\Nurse;
use App\NurseFavouriteSuburb;
use App\Suburb;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FavouritesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function index(User $user)
    {
        $userID = Auth::user()->id;
        $name = Nurse::where('nurseID',$userID)->pluck('name')->first();
        $surname = Nurse::where('nurseID',$userID)->pluck('surname')->first();


        $favs =  DB::table('nurse_favourite_suburbs')
            ->select('suburbname','code','cityname','suburbID')
            ->join('suburbs', 'suburbs.id', '=', 'nurse_favourite_suburbs.suburbID')
            ->join('cities', 'suburbs.city_id', '=', 'cities.id')
            ->where('nurseID', '=',$userID)
            ->get();

        return view('nurse.favs.index', compact('name','surname','favs'));
    }

    public function create()
    {
        $userID = Auth::user()->id;
        $name = Nurse::where('nurseID',$userID)->pluck('name')->first();
        $surname = Nurse::where('nurseID',$userID)->pluck('surname')->first();
        $suburbs = Suburb::all();

       $suburbs = DB::table('suburbs')
            ->select('suburbs.id','suburbname','code','cityname')
            ->join('cities', 'suburbs.city_id', '=', 'cities.id')
            ->orderBy('suburbname','ASC')
            ->get();

        return view('nurse.favs.create', compact('suburbs','name','surname'));
    }

    public function store(User $user)
    {
        $userID = Auth::user()->id;
        $name = Nurse::where('nurseID',$userID)->pluck('name')->first();
        $surname = Nurse::where('nurseID',$userID)->pluck('surname')->first();
        $nurse = DB::table('nurses')
            ->select('nurseID')
            ->where('nurseID','=',$userID)
            ->first();

        foreach($nurse as $key=>$n)
        {
            $favourite = new NurseFavouriteSuburb();
            $favourite->nurseID = (int)$n;
            $favourite->suburbID = request('suburb');
            $favourite->save();
        }

        $suburbs = DB::table('suburbs')
            ->select('suburbs.id','suburbname','code','cityname')
            ->join('cities', 'suburbs.city_id', '=', 'cities.id')
            ->get();

        return view('nurse.favs.create',compact('suburbs','name','surname'))->with('message','Suburb Added As Favourite');
    }

    public function destroy()
    {

        DB::table('nurse_favourite_suburbs')->where('suburbID', '=',request('favourite') )->delete();

        return back()->with('message', 'favourite deleted');
    }
}
