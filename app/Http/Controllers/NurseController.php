<?php

namespace App\Http\Controllers;


use App\Nurse;
use App\Suburb;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class NurseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user)
    {

        $userID = Auth::user()->id;
        $name = Nurse::where('nurseID',$userID)->pluck('name')->first();
        $surname = Nurse::where('nurseID',$userID)->pluck('surname')->first();
        return view('nurse.index', compact('name','surname'));
    }
    public function create()
    {
        $suburbs = Suburb::all()->sortBy('suburbname');
        return view('nurse.register.create',compact('suburbs'));
    }
    protected function store()
    {
        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'phone' => ['required','regex:/^((?:\+27|27)|0)(\d{2})-?(\d{3})-?(\d{4})$/', 'numeric', 'min:10'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'suburb' => 'required',
            'password' => ['required', 'string', 'confirmed']
        ]);

        $id = DB::table('users')->insertGetId([
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'status' => 'A',
            'usertype' => 'N'
        ]);

        $nurse = New Nurse();
        $nurse->nurseID = $id;
        $nurse->name = request('name');
        $nurse->surname = request('surname');
        $nurse->idNumber = request('idNumber');
        $nurse->phone = request('phone');
        $nurse->email = request('email');
        $nurse->suburb_id = request('suburb');
        $nurse->save();


        return back()->with('message','New Nurse Successfully Added!');

    }
}
