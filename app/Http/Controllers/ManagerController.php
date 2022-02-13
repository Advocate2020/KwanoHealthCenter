<?php

namespace App\Http\Controllers;

use App\Suburb;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManagerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user)
    {
        $suburbs = Suburb::all()->sortBy('suburbname');
        $total = DB::table('users')->count();
        return view('admin.index', compact('user','total','suburbs'));
    }
}
