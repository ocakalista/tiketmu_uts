<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Concert;
use App\Models\Booking;
use App\Models\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function dashboard()
    {
        $totalConcerts = Concert::count();
        $totalBookings = Booking::count();
        $totalUsers = User::where('role', 'user')->count();
        $totalRevenue = Booking::where('status', 'confirmed')->sum('total_price');

        $recentBookings = Booking::with(['user', 'concert'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalConcerts',
            'totalBookings',
            'totalUsers',
            'totalRevenue',
            'recentBookings'
        ));
    }
}