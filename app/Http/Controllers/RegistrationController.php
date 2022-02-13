<?php

namespace App\Http\Controllers;

use App\City;
use App\MainMember;
use App\Medical;
use UxWeb\SweetAlert\SweetAlert;
use App\Plan;
use App\Suburb;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function create()
    {
        $medicals = Medical::all()->sortBy('name');
        $suburbs = Suburb::all()->sortBy('suburbname');
        $cities = City::all();
        return view('create', compact('cities','suburbs','medicals'));
    }
    protected function store()
    {
        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'idNumber' => ['required', 'numeric', 'min:13'],
            'phone' => ['required','regex:/^((?:\+27|27)|0)(\d{2})-?(\d{3})-?(\d{4})$/', 'numeric', 'min:10'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'suburb' => 'required',
            'address1' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'confirmed']
        ]);

        $id = DB::table('users')->insertGetId([
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'status' => 'A',
            'usertype' => 'P'
        ]);

        $patient = New MainMember();
        $patient->memberID = $id;
        $patient->name = request('name');
        $patient->surname = request('surname');
        $patient->idNumber = request('idNumber');
        $patient->phone = request('phone');
        $patient->addressLine1 = request('address1');
        $patient->addressLine2 = request('address2');
        $patient->suburb_id = request('suburb');
        $patient->person_resposible = request('name');
        $patient->person_resposible .= request('surname');

        if(request('medicalStatus') == 'yes')
        {
            $data = request()->validate([

                'medicalStatus' => 'required',
                'med_id' => 'required',
                'plan_id' => 'required',
                'medNumber' => 'required'


            ]);
            $patient->medicalAid = request('medicalStatus');
            $patient->medical_id = request('med_id');
            $patient->plan_id = request('plan_id');
            $patient->medical_number = request('medNumber');
        }else{
            $data = request()->validate([
                'medicalStatus' => 'required'
            ]);
            $patient->medicalAid = request('medicalStatus');

        }

        $patient->save();

        alert()->success('You have successfully registered', 'Success');

        return redirect('/login');

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
    public function getplans($id)
    {
        $plans = Plan::where('medical_id',request('medical'))->pluck('name','id');
        return json_encode($plans);

    }
    public function destroy()
    {
        SweetAlert::message('Robots are working!');
    }
}
