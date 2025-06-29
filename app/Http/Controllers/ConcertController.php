<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Category;

class ConcertController extends Controller
{
    /**
     * Tampilkan daftar semua event/concert
     */
    public function index(Request $request)
    {
        $query = Event::with('category')->where('status', 'active');

        // Filter berdasarkan kategori jika ada
        if ($request->has('category') && $request->category != '') {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        // Filter berdasarkan pencarian
        if ($request->has('search') && $request->search != '') {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%')
                  ->orWhere('organizer', 'like', '%' . $request->search . '%');
            });
        }

        // Sorting
        $sortBy = $request->get('sort', 'latest');
        switch ($sortBy) {
            case 'popular':
                $query->orderBy('rating', 'desc');
                break;
            case 'price_low':
                $query->orderBy('price', 'asc');
                break;
            case 'price_high':
                $query->orderBy('price', 'desc');
                break;
            case 'date':
                $query->orderBy('event_date', 'asc');
                break;
            default:
                $query->orderBy('created_at', 'desc');
        }

        // Pagination
        $events = $query->paginate(9);
        
        // Ambil kategori untuk filter
        $categories = Category::all();

        return view('concert.index', compact('events', 'categories'));
    }

    /**
     * Tampilkan detail event
     */
    public function show($id)
    {
        $event = Event::with(['category', 'reviews.user'])->findOrFail($id);
        
        // Event serupa berdasarkan kategori
        $relatedEvents = Event::where('category_id', $event->category_id)
            ->where('id', '!=', $event->id)
            ->where('status', 'active')
            ->take(3)
            ->get();

        // Hitung rata-rata rating
        $averageRating = $event->reviews()->avg('rating') ?? 0;
        $totalReviews = $event->reviews()->count();

        return view('concert.detail', compact('event', 'relatedEvents', 'averageRating', 'totalReviews'));
    }

    /**
     * Pencarian event
     */
    public function search(Request $request)
    {
        $keyword = $request->get('search', '');
        $category = $request->get('category', '');

        $query = Event::with('category')->where('status', 'active');

        if (!empty($keyword)) {
            $query->where(function($q) use ($keyword) {
                $q->where('title', 'like', '%' . $keyword . '%')
                  ->orWhere('description', 'like', '%' . $keyword . '%')
                  ->orWhere('organizer', 'like', '%' . $keyword . '%');
            });
        }

        if (!empty($category)) {
            $query->whereHas('category', function($q) use ($category) {
                $q->where('slug', $category);
            });
        }

        $events = $query->orderBy('created_at', 'desc')->paginate(12);
        $categories = Category::all();

        return view('concert.search', compact('events', 'categories', 'keyword', 'category'));
    }

    /**
     * Filter berdasarkan kategori
     */
    public function category($category)
    {
        $categoryModel = Category::where('slug', $category)->firstOrFail();
        
        $events = Event::with('category')
            ->where('category_id', $categoryModel->id)
            ->where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('concert.category', compact('events', 'categoryModel'));
    }

    /**
     * Event kategori Musik
     */
    public function musik()
    {
        return $this->category('musik');
    }

    /**
     * Event kategori Teater
     */
    public function teater()
    {
        return $this->category('teater');
    }

    /**
     * Event kategori Seminar
     */
    public function seminar()
    {
        return $this->category('seminar');
    }

    /**
     * Event kategori Pameran
     */
    public function pameran()
    {
        return $this->category('pameran');
    }

    /**
     * API: Event popular
     */
    public function popular()
    {
        $events = Event::with('category')
            ->where('status', 'active')
            ->orderBy('rating', 'desc')
            ->take(6)
            ->get();

        return response()->json($events);
    }

    /**
     * API: Event terbaru
     */
    public function latest()
    {
        $events = Event::with('category')
            ->where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        return response()->json($events);
    }

    /**
     * API: Pencarian event
     */
    public function apiSearch($keyword)
    {
        $events = Event::with('category')
            ->where('status', 'active')
            ->where(function($q) use ($keyword) {
                $q->where('title', 'like', '%' . $keyword . '%')
                  ->orWhere('description', 'like', '%' . $keyword . '%')
                  ->orWhere('organizer', 'like', '%' . $keyword . '%');
            })
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        return response()->json($events);
    }

    /**
     * API: Daftar kategori
     */
    public function categories()
    {
        $categories = Category::withCount('events')->get();
        return response()->json($categories);
    }
}