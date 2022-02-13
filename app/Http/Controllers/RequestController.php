<?php

namespace App\Http\Controllers;

use App\MainMember;
use App\Patient;
use App\RequestLog;
use App\Suburb;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use UxWeb\SweetAlert\SweetAlert;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $userID = Auth::user()->id;
        $name = MainMember::where('memberID',$userID)->pluck('name')->first();
        $surname = MainMember::where('memberID',$userID)->pluck('surname')->first();
        $id = MainMember::where('memberID',$userID)->pluck('memberID')->first();
        $requests = DB::table('requests')
            ->select('requestDate','requestTime','status','requestID')
            ->where('requestorID', '=',$userID)
            ->whereIn('status', ['New','Scheduled'])
            ->get();


        return view('patient.request.index',compact('name','surname','requests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        $userID = Auth::user()->id;
        $name = MainMember::where('memberID',$userID)->pluck('name')->first();
        $surname = MainMember::where('memberID',$userID)->pluck('surname')->first();
        $member = MainMember::where('memberID',$userID)->first();

        $dependents = DB::table('depends')
            ->select('surname','name','dependentID', 'phone')
            ->where('memberID', '=',$userID)
            ->orderBy('dependentID','ASC')
            ->get();
        $suburbs = Suburb::all()->sortBy('suburbname');
        return view('patient.request.create',compact('user','name','surname','dependents','suburbs','member'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'suburb' => 'required',
            'addressLine1' => ['required', 'string', 'max:255'],

        ]);
        $userID = Auth::user()->id;

        $request->all();

        foreach($request->input('participant') as $testSubject) {

            $id = DB::table('requests')->insertGetId([
               'requestorID' => $userID,
            'requestDate' => Carbon::now()->format('d-m-Y'),
            'requestTime' => Carbon::now()->format('H:i'),
            'status' => 'New',
            'testSubjectID' => $testSubject,
            'addressLine1' => request('addressLine1'),
            'addressLine2' => request('addressLine2'),
           'suburb_id' => request('suburb')
            ]);

        }

        $name = MainMember::where('memberID',$userID)->pluck('name')->first();
        $surname = MainMember::where('memberID',$userID)->pluck('surname')->first();

        $requests = DB::table('requests')
            ->select('requestDate','requestTime','status','requestID')
            ->where('requestorID', '=',$userID)
            ->whereIn('status', ['New','Scheduled'])
            ->get();

        $history = DB::table('requests')
            ->select('requestDate','requestTime','status','requestID')
            ->where('requestorID', '=',$userID)
            ->whereIn('status', ['Cancelled','Closed'])
            ->get();

        alert()->success('New request Added Successfully', 'Success');


        return view('patient.request.index',compact('name','surname','requests','history'));






    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $userID = Auth::user()->id;
        $name = MainMember::where('memberID',$userID)->pluck('name')->first();
        $surname = MainMember::where('memberID',$userID)->pluck('surname')->first();
        $id = MainMember::where('memberID',$userID)->pluck('memberID')->first();

        $history = DB::table('requests')
            ->select('requestDate','requestTime','status','requestID')
            ->where('requestorID', '=',$userID)
            ->whereIn('status', ['Closed','Cancelled'])
            ->get();

        return view('patient.request.show',compact('name','surname','history'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        $request =  DB::table('requests')
            ->where('requestID', request('request'))
            ->update([
                'status' => 'Cancelled'

            ]);
        $userID = Auth::user()->id;



        return redirect('/patient/'.$userID.'/request')
            ->with('message', 'Request has been cancelled.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
