<?php

namespace App\Http\Controllers;

use App\LabUser;
use App\Suburb;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LabUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user)
    {

        $userID = Auth::user()->id;
        $name = LabUser::where('labUserID',$userID)->pluck('name')->first();
        $surname = LabUser::where('labUserID',$userID)->pluck('surname')->first();
        return view('lab.index', compact('name','surname'));
    }
    public function create()
    {
        $suburbs = Suburb::all()->sortBy('suburbname');
        return view('lab.register.create',compact('suburbs'));
    }
    protected function store()
    {
        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'phone' => ['required','regex:/^((?:\+27|27)|0)(\d{2})-?(\d{3})-?(\d{4})$/', 'numeric', 'min:10'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'confirmed']
        ]);

        $id = DB::table('users')->insertGetId([
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'status' => 'A',
            'usertype' => 'L'
        ]);

        $lab = New LabUser();
        $lab->labUserID = $id;
        $lab->name = request('name');
        $lab->surname = request('surname');
        $lab->idNumber = request('idNumber');
        $lab->phone = request('phone');
        $lab->email = request('email');
        $lab->save();


        return back()->with('message','New Nurse Successfully Added!');

    }
}
