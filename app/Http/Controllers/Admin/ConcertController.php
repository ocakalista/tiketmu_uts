<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Concert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ConcertController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $concerts = Concert::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.concerts.index', compact('concerts'));
    }

    public function create()
    {
        return view('admin.concerts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'time' => 'required',
            'location' => 'required|string|max:255',
            'organizer' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'total_tickets' => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();
        $data['available_tickets'] = $data['total_tickets'];

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('concerts', 'public');
        }

        Concert::create($data);

        return redirect()->route('admin.concerts.index')
            ->with('success', 'Konser berhasil ditambahkan!');
    }

    public function show(Concert $concert)
    {
        $bookings = $concert->bookings()->with('user')->paginate(10);
        return view('admin.concerts.show', compact('concert', 'bookings'));
    }

    public function edit(Concert $concert)
    {
        return view('admin.concerts.edit', compact('concert'));
    }

    public function update(Request $request, Concert $concert)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'time' => 'required',
            'location' => 'required|string|max:255',
            'organizer' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'total_tickets' => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            if ($concert->image) {
                Storage::disk('public')->delete($concert->image);
            }
            $data['image'] = $request->file('image')->store('concerts', 'public');
        }

        $concert->update($data);

        return redirect()->route('admin.concerts.index')
            ->with('success', 'Konser berhasil diupdate!');
    }

    public function destroy(Concert $concert)
    {
        if ($concert->image) {
            Storage::disk('public')->delete($concert->image);
        }

        $concert->delete();

        return redirect()->route('admin.concerts.index')
            ->with('success', 'Konser berhasil dihapus!');
    }
}