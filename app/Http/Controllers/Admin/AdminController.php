<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('Admin.admin');
    }

    public function clearNotif(){
        Auth::guard('admin')->user()->unreadNotifications()->update(['read_at' => now()]);
    }
    public function chart()
      {
        $tahun = CARBON::NOW()->format('Y');
        $result = \DB::table('transactions')
                    ->select(DB::raw('MONTHNAME(created_at) as bulan'), DB::raw('COALESCE(SUM(total),0) as pendapatan'))
                    ->groupBy(DB::raw('MONTH(created_at)'))
                    ->where(DB::raw('YEAR(created_at)'),'=', $tahun)
                    ->where('status','success')
                    ->get();
        return response()->json($result);
      }
}
