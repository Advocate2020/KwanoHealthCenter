<?php

namespace App\Http\Controllers;

use App\Address;
use App\City;
use App\Depend;
use UxWeb\SweetAlert\SweetAlert;
use App\MainMember;
use App\Medical;
use App\Suburb;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class DependentsController extends Controller
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
        $id = MainMember::where('memberID',$userID)->pluck('memberID')->first();


        $dependents = DB::table('depends')
            ->select('surname','name','dependentID', 'phone')
            ->where('memberID', '=',$id)
            ->orderBy('dependentID','ASC')
            ->get();





        return view('patient.dependents.index', compact('name','surname','dependents'));
    }
    public function show()
    {
        $userID = Auth::user()->id;
        $name = MainMember::where('memberID',$userID)->pluck('name')->first();
        $surname = MainMember::where('memberID',$userID)->pluck('surname')->first();
        $dependent = Depend::where('dependentID', request('dependent'))->firstOrFail();
        return view('patient.dependents.show', compact('dependent','name','surname'));
    }
    public function create()
    {
        $userID = Auth::user()->id;
        $name = MainMember::where('memberID',$userID)->pluck('name')->first();
        $surname = MainMember::where('memberID',$userID)->pluck('surname')->first();
        $medicals = Medical::all();
        $suburbs = Suburb::all();
        $cities = City::all();
        return view('patient.dependents.create', compact('cities','suburbs','medicals','name','surname'));
    }
    public function store(User $user,Request $request)
    {

        $dependent = new Depend();

        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'idNumber' => ['required', 'string', 'min:13','max:13'],
            'phone' => ['required', 'string', 'min:10'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'suburb' => 'required',
            'address1' => ['required', 'string', 'max:255'],

        ]);


             $userID = Auth::user()->id;
             $id = MainMember::where('memberID',$userID)->pluck('memberID')->first();
             $name = MainMember::where('memberID',$userID)->pluck('name')->first();
             $surname = MainMember::where('memberID',$userID)->pluck('surname')->first();

            $dependent->memberID = $id;
            $dependent->name = request('name');
            $dependent->surname = request('surname');
            $dependent->idNumber = request('idNumber');
            $dependent->phone = request('phone');
            $dependent->email = request('email');
            $dependent->addressLine1 = request('address1');
            $dependent->addressLine2 = request('address2');
            $dependent->suburb_id = request('suburb');
            $dependent->person_resposible = $name. ''.$surname;


        if(request('medicalStatus') == 'yes')
        {
            $data = request()->validate([

                'medicalStatus' => 'required',
                'med_id' => 'required',
                'plan_id' => 'required',
                'medNumber' => 'required'


            ]);
            $dependent->medicalAid = request('medicalStatus');
            $dependent->medical_id = request('med_id');
            $dependent->plan_id = request('plan_id');
            $dependent->medical_number = request('medNumber');
        }else{
            $data = request()->validate([
                'medicalStatus' => 'required'
            ]);
            $dependent->medicalAid = request('medicalStatus');

        }
        $dependent->save();

        $userID = Auth::user()->id;
        $id = MainMember::where('memberID',$userID)->pluck('memberID')->first();
        $name = MainMember::where('memberID',$userID)->pluck('name')->first();
        $surname = MainMember::where('memberID',$userID)->pluck('surname')->first();

        $dependents = DB::table('depends')
            ->select('surname','name','dependentID', 'phone')
            ->where('memberID', '=',$id)
            ->orderBy('dependentID','ASC')
            ->get();



        alert()->success('New dependent Added Successfully', 'Success');
        return Redirect::to('/patient/'.$id.'/dependents')->with('dependents',$dependents)->with('name',$name)->with('surname',$surname);
    }
    public function edit()
    {
        $userID = Auth::user()->id;
        $name = MainMember::where('memberID',$userID)->pluck('name')->first();
        $surname = MainMember::where('memberID',$userID)->pluck('surname')->first();
        $medicals = Medical::all();
        $suburbs = Suburb::all();
        $cities = City::all();
        $dependent = Depend::where('dependentID', request('dependent'))->firstOrFail();
        return view('patient.dependents.edit', compact('dependent','suburbs','cities','medicals','name','surname'));
    }
    public function update(User $user,$id)
    {
        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'idNumber' => ['required', 'string', 'min:13','max:13'],
            'phone' => ['required', 'string', 'min:10'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'suburb' => 'required',
            'address1' => ['required', 'string', 'max:255'],

        ]);

        $dependent =  DB::table('depends')
            ->where('dependentID', request('dependent'))
            ->update([
                'name' => request('name'),
                'surname' => request('surname'),
                'idNumber' => request('idNumber'),
                 'phone' => request('phone'),
                 'email' => request('email'),
                 'addressLine1' => request('address1'),
                 'addressLine2' => request('address2'),
                 'suburb_id' => request('suburb'),
                 'medicalAid' => request('medicalStatus'),
                 'medical_id' => request('med_id'),
                 'plan_id' => request('plan_id'),
                'medical_number' => request('medNumber')
            ]);

        $userID = Auth::user()->id;
        $name = MainMember::where('memberID',$userID)->pluck('name')->first();
        $surname = MainMember::where('memberID',$userID)->pluck('surname')->first();
        $id = MainMember::where('memberID',$userID)->pluck('memberID')->first();


        $dependents = DB::table('depends')
            ->select('surname','name','dependentID', 'phone')
            ->where('memberID', '=',$id)
            ->orderBy('dependentID','ASC')
            ->get();



        return view('patient.dependents.index', compact('dependents','name','surname'));
    }
    public function destroy()
    {

        DB::table('depends')->where('dependentID', '=', request('dependent'))->delete();
        SweetAlert::message('Robots are working!');
        return back()->with('message', 'dependent deleted');
    }
}
