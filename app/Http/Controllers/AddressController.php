<?php

namespace App\Http\Controllers;

use App\MainMember;
use App\Patient;
use App\City;
use App\Suburb;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user)
    {
        $userID = Auth::user()->id;
        $name = MainMember::where('memberID',$userID)->pluck('name')->first();
        $surname = MainMember::where('memberID',$userID)->pluck('surname')->first();

        $patients = DB::table('main_members')
            ->select('addressLine1','addressLine2','suburbname','code','cityname')
            ->join('suburbs', 'main_members.suburb_id', '=','suburbs.id')
            ->join('cities', 'suburbs.city_id', '=','cities.id')
            ->where('memberID', $userID)
             ->get();


        return view('patient.address.show', compact('user','patients','name','surname'));
    }



    public function edit(User $user)
    {
        $suburbs = Suburb::all();
        $cities = City::all();
        $userID = Auth::user()->id;
        $name = MainMember::where('memberID',$userID)->pluck('name')->first();
        $surname = MainMember::where('memberID',$userID)->pluck('surname')->first();
        $addressLine1 = MainMember::where('memberID',$userID)->pluck('addressLine1')->first();
        $addressLine2 = MainMember::where('memberID',$userID)->pluck('addressLine2')->first();


        return view('patient.address.edit', compact('user','addressLine1','addressLine2','name','surname','suburbs','cities'));
    }
    public function update(User $user)
    {
        $userID = Auth::user()->id;
        $name = MainMember::where('memberID',$userID)->pluck('name')->first();
        $surname = MainMember::where('memberID',$userID)->pluck('surname')->first();

        $data = request()->validate([
            'suburb' => 'required',
            'address1' => ['required', 'string', 'max:255']


        ]);

        $patient =  DB::table('main_members')
            ->where('memberID', $userID)
            ->update(['addressLine1' =>  request('address1'),'addressLine2' =>  request('address2'),'suburb_id' => request('suburb')]);



        $patients = DB::table('main_members')
            ->select('addressLine1','addressLine2','suburbname','code','cityname')
            ->join('suburbs', 'main_members.suburb_id', '=','suburbs.id')
            ->join('cities', 'suburbs.city_id', '=','cities.id')
            ->where('memberID', $userID)
            ->get();

        return view('patient.address.show', compact('user','patients','name','surname'));
    }
    public function getsub($id)
    {
        $sub = Suburb::where('city_id',request('id'))->pluck('suburbname','id');
        return json_encode($sub);

    }
    public function getcode($id)
    {
        $code = Suburb::where('id',request('id'))->pluck('code');
        return json_encode($code);

    }


}
