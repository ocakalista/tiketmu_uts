<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $bookings = Booking::with(['user', 'concert'])
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('admin.bookings.index', compact('bookings'));
    }

    public function show(Booking $booking)
    {
        return view('admin.bookings.show', compact('booking'));
    }

    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled'
        ]);

        $oldStatus = $booking->status;
        $booking->update(['status' => $request->status]);

        // Update available tickets based on status change
        if ($oldStatus !== $request->status) {
            $concert = $booking->concert;
            
            if ($request->status === 'confirmed' && $oldStatus === 'pending') {
                $concert->decrement('available_tickets', $booking->quantity);
            } elseif ($request->status === 'cancelled' && $oldStatus === 'confirmed') {
                $concert->increment('available_tickets', $booking->quantity);
            }
        }

        return redirect()->route('admin.bookings.index')
            ->with('success', 'Status booking berhasil diupdate!');
    }

    public function destroy(Booking $booking)
    {
        if ($booking->status === 'confirmed') {
            $booking->concert->increment('available_tickets', $booking->quantity);
        }

        $booking->delete();

        return redirect()->route('admin.bookings.index')
            ->with('success', 'Booking berhasil dihapus!');
    }
}