<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\MainMember;
use App\Nurse;
use App\TestBooking;
use App\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use Illuminate\Support\Facades\Validator;

class TestBookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $userID = Auth::user()->id;
        $name = Nurse::where('nurseID',$userID)->pluck('name')->first();
        $surname = Nurse::where('nurseID',$userID)->pluck('surname')->first();

//        $requests = DB::table('requests')
//            ->select('requestDate','requestTime','status','requestID')
//            ->where('requestorID', '=',$userID)
//            ->where('status', '=','New')
//            ->get();

        $requests = DB::table('requests')
            ->select('requestDate','requestTime','status','requestID','suburbname','name','surname')
            ->join('nurse_favourite_suburbs', 'requests.suburb_id', '=','nurse_favourite_suburbs.suburbID')
            ->join('suburbs', 'requests.suburb_id', '=','suburbs.id')
            ->rightJoin('main_members','main_members.memberID','=','requests.requestorID')
            ->where('nurse_favourite_suburbs.nurseID', '=',$userID)
            ->where('status', '=','New')
            ->get();

        $others = DB::table('requests')
            ->select('requestDate','requestTime','status','requestID','suburbname','name','surname')
            ->join('suburbs', 'requests.suburb_id', '=','suburbs.id')
            ->rightJoin('main_members','main_members.memberID','=','requests.requestorID')
            ->where('status', '=','New')
            ->get();


        return view('nurse.booking.index',compact('name','surname','requests','others'));
    }
    public function create($request)
    {

        $userID = Auth::user()->id;
        $name = Nurse::where('nurseID',$userID)->pluck('name')->first();
        $surname = Nurse::where('nurseID',$userID)->pluck('surname')->first();

        $id = request('request');





        return view('nurse.booking.create',compact('name','surname','id'));
    }
    public function store()
    {
        $data = request()->validate([
            'invisible' => ['required'],
            'booking_date' => ['required'],
            'time' => ['required'],

        ]);
        $id = \App\Request::where('RequestID', request('invisible'))->pluck('requestorID')->first();

        $pname = MainMember::where('memberID',$id)->pluck('name')->first();
        $psurname = MainMember::where('memberID',$id)->pluck('surname')->first();
        $memberID = MainMember::where('memberID',$id)->pluck('memberID')->first();
        $email = User::where('id',$memberID)->pluck('email')->first();
        $date = \Carbon\Carbon::parse(request('booking_date'))->format('d-m-Y');
        $time = request('time');


        $dataArray = array();
        $dataArray['emailBody'] = "Good day  $pname $psurname your test request has been scheduled. <br/> Please make sure you or your dependent(s) are ready and available on the following date:  $date +  at this time slot $time  <br/><br/> Thank You, <br/> Kwano Health Center.";
        $to = $email;
        $subject = "Test Request Booking Scheduled";
        Mail::send('dynamic_email_template', ['dataArray' => $dataArray], function ($instance) use ($to, $subject)
        {

            $instance->to($to, 'Recipient Name');
            $instance->subject($subject);
            $instance->replyTo(env('MAIL_REPLY_TO', 's214292312@mandela.ac.za'), 'Desired Name');
        });

        DB::table('requests')
            ->where('RequestID', request('invisible'))
            ->where('status', '=','New')
            ->update(['status' =>  'Scheduled']);

        $userID = Auth::user()->id;
        $nurseID= Nurse::where('nurseID',$userID)->pluck('nurseID')->first();
        $booking = New TestBooking();
        $booking->RequestID = request('invisible');
        $booking->nurse_id = $nurseID;
        $booking->bookingDate = $date;
        $booking->timeSlot = request('time');
        $booking->save();

        $userID = Auth::user()->id;
        $name = Nurse::where('nurseID',$userID)->pluck('name')->first();
        $surname = Nurse::where('nurseID',$userID)->pluck('surname')->first();

        $requests = DB::table('requests')
            ->select('requestDate','requestTime','status','requestID','suburbname','name','surname')
            ->join('nurse_favourite_suburbs', 'requests.suburb_id', '=','nurse_favourite_suburbs.suburbID')
            ->join('suburbs', 'requests.suburb_id', '=','suburbs.id')
            ->rightJoin('main_members','main_members.memberID','=','requests.requestorID')
            ->where('nurse_favourite_suburbs.nurseID', '=',$userID)
            ->where('status', '=','New')
            ->get();

        $others = DB::table('requests')
            ->select('requestDate','requestTime','status','requestID','suburbname','name','surname')
            ->join('suburbs', 'requests.suburb_id', '=','suburbs.id')
            ->rightJoin('main_members','main_members.memberID','=','requests.requestorID')
            ->where('status', '=','New')
            ->get();

        alert()->success('New booking Added Successfully', 'Success');

        return view('nurse.booking.index',compact('name','surname','requests','others'));
    }
    public function show()
    {
        $date = \Carbon\Carbon::now()->format('d-m-Y');

        $userID = Auth::user()->id;
        $bookings = DB::table('requests')
            ->select('bookingDate','timeSlot','status','test_bookings.requestID','requests.addressLine1','requests.addressLine2','suburbname','code','name','surname','requestorID','requests.RequestID')
            ->join('main_members', 'requests.requestorID', '=','main_members.memberID')
            ->join('test_bookings', 'requests.RequestID', '=','test_bookings.RequestID')
            ->join('suburbs', 'requests.suburb_id', '=','suburbs.id')
            ->where('test_bookings.nurse_id', '=',$userID)
            ->where('status', '=','Scheduled')
            ->get();

        $name = Nurse::where('nurseID',$userID)->pluck('name')->first();
        $surname = Nurse::where('nurseID',$userID)->pluck('surname')->first();

        $tomorrow = \Carbon\Carbon::tomorrow()->format('d-m-Y');



        return view('nurse.booking.show',compact('name','surname','bookings','date','tomorrow'));
    }

}
