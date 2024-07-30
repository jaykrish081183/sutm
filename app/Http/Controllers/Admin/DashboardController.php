<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $bookings = Booking::all()->count();
        $confirmed = Booking::where('status',2)->count();
        $pending = Booking::where('status',1)->count();
        return view('admin.dashboard.index',compact('bookings','confirmed','pending'));
    }
}
