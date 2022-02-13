<?php

namespace App\Http\Controllers;

use App\City;
use App\Depend;
use App\MainMember;
use App\Medical;
use App\Plan;
use App\Suburb;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PatientsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(User $user)
    {
        $user = User::findOrFail($user);
        $userID = Auth::user()->id;
        $name = MainMember::where('memberID',$userID)->pluck('name')->first();
        $surname = MainMember::where('memberID',$userID)->pluck('surname')->first();
        $ClosedRequests = DB::table('requests')
            ->select('requestDate','requestTime','status','requestID')
            ->where('requestorID', '=',$userID)
            ->where('status', '=','Closed')
            ->count();

        $NewRequests = DB::table('requests')
            ->select('requestDate','requestTime','status','requestID')
            ->where('requestorID', '=',$userID)
            ->whereIn('status', ['New','Scheduled'])
            ->count();

        $totalDepends = Depend::where('memberID',$userID)->count();

        $dependents = DB::table('depends')
            ->select('surname','name','dependentID', 'phone')
            ->where('memberID', '=',$userID)
            ->orderBy('dependentID','ASC')
            ->get();

        return view('patient.index', compact('user','name','surname','totalDepends','ClosedRequests','NewRequests','dependents'));
    }

    public function show(User $user)
    {
        $user = User::findOrFail($user);
        $userID = Auth::user()->id;
        $name = MainMember::where('memberID',$userID)->pluck('name')->first();
        $surname = MainMember::where('memberID',$userID)->pluck('surname')->first();
        $patient = MainMember::where('memberID',$userID)->first();
        $medicals = Medical::all();
        $suburbs = Suburb::all();
        $cities = City::all();
        return view('patient.profile.show', compact('user','name','surname','patient','medicals','suburbs','cities'));
    }
    public function update(User $user)
    {
        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'idNumber' => ['required', 'string', 'min:13','max:13'],
            'phone' => ['required', 'string', 'min:10'],
            'datepicker' => 'required',
            'usertype' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'med_id' => 'required',
            'plan_id' => 'required',
            'suburb' => 'required',
            'medNumber' => 'required',
            'address1' => ['required', 'string', 'max:255'],
            'address2' => ['string', 'max:255']
        ]);

        $user =  DB::table('users')
            ->where('id', $user->id)
            ->update(['email' =>  request('email'),'password' =>  request('password')]);

        $userID = Auth::user()->id;

        $patient = DB::table('patients')
                ->where('memberID', $userID)
                ->update([
                    'name' =>  request('name'),
                    'surname' =>  request('surname'),
                    'idNumber' => request('idNumber'),
                    'phone' => request('phone'),
                    'dob' => request('datepicker'),
                    'medical_id' => request('med_id'),
                    'plan_id' => request('plan_id'),
                    'medical_number' => request('medNumber'),
                    'addressLine1' => request('address1'),
                    'addressLine2' => request('address2'),
                    'suburb_id' => request('suburb')
                ]);



        $name = MainMember::where('memberID',$userID)->pluck('name')->first();
        $surname = MainMember::where('memberID',$userID)->pluck('surname')->first();
        return view('patient.index', compact('user','name','surname'));
    }

}
