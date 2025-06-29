<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\DB;
use Exception;

class EventController extends Controller
{
    public function index()
    {
        try {
            // Test database connection
            DB::connection()->getPdo();
            
            // Try to get events from database
            $events = Event::published()->upcoming()->paginate(12);
            
            // If no data in database, use dummy data
            if ($events->isEmpty()) {
                $eventsData = $this->getDummyEvents();
                // Convert array to collection with pagination-like structure
                $events = $this->createPaginatedCollection($eventsData, 12);
            }
            
        } catch (Exception $e) {
            // Database connection failed or model not ready, use dummy data
            $eventsData = $this->getDummyEvents();
            $events = $this->createPaginatedCollection($eventsData, 12);
        }
        
        return view('concert', compact('events'));
    }

    public function detail($id)
    {
        $event = null;
        
        // Check if database connection is available before querying
        try {
            // Test database connection
            DB::connection()->getPdo();
            // If connection is available, try to get event from database
            $event = Event::find($id);
        } catch (Exception $e) {
            // Database connection failed, we'll use dummy data
            $event = null;
        }
        
        // If no event from database, use dummy data
        if (!$event) {
            $eventsData = $this->getDummyEvents();
            $eventArray = $eventsData[$id] ?? null;
            
            if (!$eventArray) {
                // Event not found - create default "not found" event
                $eventArray = [
                    'id' => $id,
                    'title' => 'Event Not Found',
                    'description' => 'Sorry, the event you are looking for does not exist.',
                    'event_date' => 'TBA',
                    'event_time' => 'TBA',
                    'venue' => 'TBA',
                    'address' => 'TBA',
                    'price' => 'TBA',
                    'image' => 'img/default-event.jpg',
                    'organizer' => 'Unknown',
                    'category' => 'Unknown',
                    'max_participants' => 'TBA',
                    'current_participants' => 0,
                    'status' => 'not_found'
                ];
            }
            
            // Convert array to object
            $event = (object) $eventArray;
        }
        
        return view('detail', compact('event'));
    }

    public function book(Request $request, $id)
    {
        // Validate input
        $validated = $request->validate([
            'quantity' => 'required|integer|min:1|max:10',
            'phone' => 'required|string|min:10|max:15',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255'
        ], [
            'quantity.required' => 'Jumlah tiket harus diisi.',
            'quantity.integer' => 'Jumlah tiket harus berupa angka.',
            'quantity.min' => 'Minimal 1 tiket.',
            'quantity.max' => 'Maksimal 10 tiket per booking.',
            'phone.required' => 'Nomor telepon harus diisi.',
            'phone.min' => 'Nomor telepon minimal 10 digit.',
            'phone.max' => 'Nomor telepon maksimal 15 digit.',
            'name.required' => 'Nama harus diisi.',
            'name.max' => 'Nama maksimal 255 karakter.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.max' => 'Email maksimal 255 karakter.'
        ]);

        try {
            // Check if event exists in database
            DB::connection()->getPdo();
            $event = Event::find($id);
            
            if ($event) {
                // Check availability
                if ($event->max_participants && 
                    ($event->current_participants + $validated['quantity']) > $event->max_participants) {
                    return redirect()->back()
                        ->with('error', 'Maaf, tiket yang tersedia tidak mencukupi. Sisa tiket: ' . 
                               ($event->max_participants - $event->current_participants))
                        ->withInput();
                }
                
                // Update participant count (in real app, this would be in a booking table)
                $event->increment('current_participants', $validated['quantity']);
            }
            
        } catch (Exception $e) {
            // Database not available, just show success message
        }

        // In a real application, you would:
        // 1. Create a booking record
        // 2. Send confirmation email
        // 3. Process payment if required
        
        return redirect()->back()->with('success', 
            'Booking berhasil! Konfirmasi akan dikirim ke email ' . $validated['email'] . 
            ' untuk ' . $validated['quantity'] . ' tiket.');
    }

    public function search(Request $request)
    {
        $query = $request->get('q');
        $category = $request->get('category');
        $date = $request->get('date');
        
        try {
            DB::connection()->getPdo();
            
            $events = Event::published()->upcoming();
            
            if ($query) {
                $events = $events->where(function($q) use ($query) {
                    $q->where('title', 'like', '%' . $query . '%')
                      ->orWhere('description', 'like', '%' . $query . '%')
                      ->orWhere('organizer', 'like', '%' . $query . '%');
                });
            }
            
            if ($category) {
                $events = $events->where('category_id', $category);
            }
            
            if ($date) {
                $events = $events->whereDate('event_date', $date);
            }
            
            $events = $events->paginate(12)->appends($request->query());
            
        } catch (Exception $e) {
            // Fallback to dummy data with basic filtering
            $eventsData = $this->getDummyEvents();
            
            if ($query) {
                $eventsData = array_filter($eventsData, function($event) use ($query) {
                    return stripos($event['title'], $query) !== false ||
                           stripos($event['description'], $query) !== false ||
                           stripos($event['organizer'], $query) !== false;
                });
            }
            
            $events = $this->createPaginatedCollection($eventsData, 12);
        }
        
        return view('concert', compact('events'));
    }

    public function featured()
    {
        try {
            DB::connection()->getPdo();
            $events = Event::published()->upcoming()->where('featured', true)->paginate(12);
            
            if ($events->isEmpty()) {
                // Get first 3 dummy events as featured
                $eventsData = array_slice($this->getDummyEvents(), 0, 3, true);
                $events = $this->createPaginatedCollection($eventsData, 12);
            }
            
        } catch (Exception $e) {
            $eventsData = array_slice($this->getDummyEvents(), 0, 3, true);
            $events = $this->createPaginatedCollection($eventsData, 12);
        }
        
        return view('concert', compact('events'));
    }

    private function getDummyEvents()
    {
        return [
            1 => [
                'id' => 1,
                'title' => 'Jazz Night Concert',
                'description' => 'Experience the smooth sounds of jazz with renowned musicians from around the world. This intimate evening promises to deliver exceptional performances in a cozy atmosphere.',
                'event_date' => '2025-07-15',
                'event_time' => '19:00 WIB',
                'venue' => 'Blue Note Jakarta',
                'address' => 'Jl. Kemang Raya No. 8, Jakarta Selatan',
                'price' => 250000,
                'formatted_price' => 'Rp 250.000',
                'image' => 'img/concert-1.jpg',
                'organizer' => 'Jakarta Jazz Society',
                'category' => 'Music',
                'max_participants' => 200,
                'current_participants' => 45,
                'capacity' => '200 seats',
                'status' => 'published',
                'featured' => true,
                'rating' => 4.8
            ],
            2 => [
                'id' => 2,
                'title' => 'Rock Festival 2025',
                'description' => 'Get ready to rock with the biggest names in the industry! This festival features multiple stages and food vendors for an unforgettable experience.',
                'event_date' => '2025-08-20',
                'event_time' => '14:00 WIB',
                'venue' => 'Gelora Bung Karno Stadium',
                'address' => 'Jl. Asia Afrika, Senayan, Jakarta Pusat',
                'price' => 500000,
                'formatted_price' => 'Rp 500.000',
                'image' => 'img/concert-2.jpg',
                'organizer' => 'Rock Nation Indonesia',
                'category' => 'Music Festival',
                'max_participants' => 50000,
                'current_participants' => 12500,
                'capacity' => '50,000 people',
                'status' => 'published',
                'featured' => true,
                'rating' => 4.6
            ],
            3 => [
                'id' => 3,
                'title' => 'Classical Orchestra Evening',
                'description' => 'An elegant evening of classical music performed by the Indonesian Symphony Orchestra. Featuring works by Bach, Mozart, and Beethoven.',
                'event_date' => '2025-09-10',
                'event_time' => '18:30 WIB',
                'venue' => 'Taman Ismail Marzuki',
                'address' => 'Jl. Cikini Raya No. 73, Jakarta Pusat',
                'price' => 180000,
                'formatted_price' => 'Rp 180.000',
                'image' => 'img/concert-3.jpg',
                'organizer' => 'Indonesian Symphony Orchestra',
                'category' => 'Classical Music',
                'max_participants' => 800,
                'current_participants' => 320,
                'capacity' => '800 seats',
                'status' => 'published',
                'featured' => false,
                'rating' => 4.9
            ],
            4 => [
                'id' => 4,
                'title' => 'Electronic Dance Music Festival',
                'description' => 'The ultimate EDM experience with top DJs from around the world. Dance the night away with cutting-edge sound systems and stunning visual effects.',
                'event_date' => '2025-10-05',
                'event_time' => '20:00 WIB',
                'venue' => 'Jakarta Convention Center',
                'address' => 'Jl. Gatot Subroto, Jakarta Selatan',
                'price' => 350000,
                'formatted_price' => 'Rp 350.000',
                'image' => 'img/concert-4.jpg',
                'organizer' => 'EDM Indonesia',
                'category' => 'Electronic Music',
                'max_participants' => 5000,
                'current_participants' => 1200,
                'capacity' => '5,000 people',
                'status' => 'published',
                'featured' => true,
                'rating' => 4.7
            ]
        ];
    }

    private function createPaginatedCollection($data, $perPage = 12)
    {
        $collection = collect($data)->map(function($event) {
            return (object) $event;
        });
        
        // Simple pagination simulation
        $currentPage = request()->get('page', 1);
        $offset = ($currentPage - 1) * $perPage;
        $items = $collection->slice($offset, $perPage)->values();
        
        return $items;
    }

    // API endpoints for AJAX requests
    public function getEvents(Request $request)
    {
        try {
            DB::connection()->getPdo();
            $events = Event::published()->upcoming()->paginate(12);
            
            if ($events->isEmpty()) {
                $eventsData = $this->getDummyEvents();
                $events = collect($eventsData)->map(function($event) {
                    return (object) $event;
                });
            }
            
        } catch (Exception $e) {
            $eventsData = $this->getDummyEvents();
            $events = collect($eventsData)->map(function($event) {
                return (object) $event;
            });
        }
        
        return response()->json($events);
    }

    public function getEvent($id)
    {
        try {
            DB::connection()->getPdo();
            $event = Event::find($id);
            
            if (!$event) {
                $eventsData = $this->getDummyEvents();
                $eventArray = $eventsData[$id] ?? null;
                $event = $eventArray ? (object) $eventArray : null;
            }
            
        } catch (Exception $e) {
            $eventsData = $this->getDummyEvents();
            $eventArray = $eventsData[$id] ?? null;
            $event = $eventArray ? (object) $eventArray : null;
        }
        
        if (!$event) {
            return response()->json(['error' => 'Event not found'], 404);
        }
        
        return response()->json($event);
    }
}