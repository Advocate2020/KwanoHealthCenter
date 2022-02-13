<?php

namespace App\Http\Controllers;

use App\Nurse;
use App\Test;
use App\TestBooking;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $nurse = Nurse::all()->sortBy('name');

        return view('admin.reports.index',compact('nurse'));
    }
    public function records(Request $request)
    {

        if ($request->ajax()) {

            if ($request->input('start_date') && $request->input('end_date')) {

                $start_date =  $request->input('start_date');
                $end_date = $request->input('end_date');
                $nurse = $request->input('nurse');

                $tests =  DB::table('test_bookings')
                    ->whereBetween('bookingDate', [$start_date, $end_date])
                    ->where('test_bookings.nurse_id','=',$nurse)
                    ->leftJoin('nurses','nurses.nurseID','=','test_bookings.nurse_id')
                    ->RightJoin('tests','tests.RequestID','=','test_bookings.RequestID')
                    ->get();

            } else {
                $tests =  DB::table('test_bookings')
                    ->join('requests','requests.RequestID','=','test_bookings.RequestID')
                    ->leftJoin('nurses','nurses.nurseID','=','test_bookings.nurse_id')
                    ->RightJoin('tests','tests.RequestID','=','test_bookings.RequestID')
                    ->get();

            }

            return response()->json([
                'tests' => $tests
            ]);
        }
    }
}
