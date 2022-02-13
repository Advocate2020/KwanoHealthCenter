<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class NurseRegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('admin.register');
    }
    protected function store()
    {
        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'idNumber' => ['required', 'string', 'min:13','max:13'],
            'phone' => ['required', 'string', 'min:10'],
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


        return redirect('/login');

    }
}
