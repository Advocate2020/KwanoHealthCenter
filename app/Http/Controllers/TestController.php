<?php

namespace App\Http\Controllers;

use App\Depend;
use App\MainMember;
use App\Nurse;
use App\Test;
use App\TestBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create($requestorID)
    {
        $userID = Auth::user()->id;
        $name = Nurse::where('nurseID',$userID)->pluck('name')->first();
        $surname = Nurse::where('nurseID',$userID)->pluck('surname')->first();

        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // generate a pin based on 2 * 7 digits + a random character
        $pin = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];
        // shuffle the result
        $string = str_shuffle($pin);

        $member = MainMember::where('memberID',request('requestorID'))->first();
        $memberID = MainMember::where('memberID',request('requestorID'))->pluck('memberID')->first();

        $requestID = request('requestID');

        $dependents = DB::table('depends')
            ->select('name','surname','dependentID')
            ->where('memberID',$memberID)
            ->get();

        return view('nurse.test.create',compact('name','surname','member','string','dependents','requestID'));
    }
    public function store()
    {
        $data = request()->validate([
            'barcode' => ['required','string'],
            'temperature' => ['required','regex:/^[0-9]+(\.[0-9]{1,2})?$/'],
            'blood_pressure' => ['required','regex:/^[0-9]{3}\/[0-9]{2}?$/'],
            'oxygen_level' => ['required','integer'],
            'member_id' => ['required'],
            'request_id' => ['required'],

        ]);



        $req = \App\Request::where('testSubjectID',request('member_id'))->pluck('RequestID')->first();



        DB::table('requests')
            ->where('RequestID', $req)
            ->where('status', '=','Scheduled')
            ->update(['status' =>  'Performed']);

        $userID = Auth::user()->id;
        $test = New Test();
        $test->RequestID = $req;
        $test->patientID = request('member_id');
        $test->barcode = request('barcode');
        $test->temperature = request('temperature');
        $test->pressure = request('blood_pressure');
        $test->oxygen = request('oxygen_level');
        $test->nurseID = $userID;
        $test->save();


        $name = Nurse::where('nurseID',$userID)->pluck('name')->first();
        $surname = Nurse::where('nurseID',$userID)->pluck('surname')->first();

        $message = "Test Submitted Successfully";

        return redirect()->back()->with('message', $message)->with('name',$name)->with('surname',$surname);


    }
    public function insert()
    {
        $data = request()->validate([
            'barcode' => ['required','string'],
            'temperature' => ['required','regex:/^[0-9]+(\.[0-9]{1,2})?$/'],
            'blood_pressure' => ['required','regex:/^[0-9]{3}\/[0-9]{2}?$/'],
            'oxygen_level' => ['required','integer'],
            'member_id' => ['required'],
            'request_id' => ['required'],

        ]);

        $userID = Auth::user()->id;

        $req = \App\Request::where('testSubjectID',request('member_id'))->pluck('RequestID')->first();



        DB::table('requests')
            ->where('RequestID', $req)
            ->where('status', '=','Scheduled')
            ->update(['status' =>  'Performed']);

        $test = New Test();
        $test->RequestID = $req;
        $test->patientID = request('member_id');
        $test->barcode = request('barcode');
        $test->temperature = request('temperature');
        $test->pressure = request('blood_pressure');
        $test->oxygen = request('oxygen_level');
        $test->nurseID = $userID;
        $test->save();


        $name = Nurse::where('nurseID',$userID)->pluck('name')->first();
        $surname = Nurse::where('nurseID',$userID)->pluck('surname')->first();

        $message = "Test Submitted Successfully";

        return redirect()->back()->with('message', $message)->with('name',$name)->with('surname',$surname);


    }
}
