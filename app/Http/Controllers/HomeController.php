<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Category;

class HomeController extends Controller
{
    /**
     * Tampilkan halaman utama
     */
    public function index()
    {
        // Ambil event terbaru
        $latestEvents = Event::with('category')
            ->where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        // Ambil event popular berdasarkan rating
        $popularEvents = Event::with('category')
            ->where('status', 'active')
            ->orderBy('rating', 'desc')
            ->take(3)
            ->get();

        // Statistik untuk counter
        $stats = [
            'musik' => Event::where('category_id', 1)->count(),
            'teater' => Event::where('category_id', 2)->count(), 
            'seminar' => Event::where('category_id', 3)->count(),
            'pameran' => Event::where('category_id', 4)->count(),
        ];

        // Ambil kategori untuk dropdown
        $categories = Category::all();

        return view('index', compact('latestEvents', 'popularEvents', 'stats', 'categories'));
    }

    /**
     * Tampilkan halaman about
     */
    public function about()
    {
        // Statistik untuk halaman about
        $stats = [
            'total_events' => Event::count(),
            'active_events' => Event::where('status', 'active')->count(),
            'completed_events' => Event::where('status', 'completed')->count(),
            'total_participants' => 50000, // Bisa diambil dari database bookings
        ];

        // Team members (bisa dari database atau static)
        $teamMembers = [
            [
                'name' => 'Wijaya',
                'position' => 'Event Manager',
                'image' => 'img/wijaya.webp',
                'social' => [
                    'twitter' => '#',
                    'facebook' => '#',
                    'instagram' => '#',
                    'linkedin' => '#'
                ]
            ],
            // Tambah team member lain sesuai kebutuhan
        ];

        return view('about', compact('stats', 'teamMembers'));
    }

    /**
     * Tampilkan halaman features
     */
    public function features()
    {
        // Fitur-fitur utama platform
        $features = [
            [
                'icon' => 'fa-rocket',
                'title' => 'Fast & Easy Booking',
                'description' => 'Sistem booking yang cepat dan mudah digunakan dengan antarmuka yang intuitif.',
                'color' => 'primary'
            ],
            [
                'icon' => 'fa-lock',
                'title' => 'Secure Payments', 
                'description' => 'Pembayaran yang aman dengan enkripsi tingkat tinggi dan berbagai metode pembayaran.',
                'color' => 'secondary'
            ],
            [
                'icon' => 'fa-calendar-alt',
                'title' => 'Wide Range of Events',
                'description' => 'Berbagai macam event dari musik, teater, seminar hingga pameran.',
                'color' => 'warning'
            ],
            [
                'icon' => 'fa-headset',
                'title' => '24/7 Customer Support',
                'description' => 'Dukungan pelanggan 24/7 untuk membantu Anda kapan saja.',
                'color' => 'info'
            ]
        ];

        return view('features', compact('features'));
    }

    /**
     * Tampilkan halaman testimonial
     */
    public function testimonial()
    {
        // Testimonial dari pengguna (bisa dari database)
        $testimonials = [
            [
                'name' => 'Rosa Kalista',
                'position' => 'Event Manager',
                'image' => 'img/testimonial.jpg',
                'rating' => 5,
                'comment' => 'Platform yang sangat memudahkan dalam mengelola dan menjual tiket event. Interface yang user-friendly dan system yang reliable.'
            ],
            [
                'name' => 'Rita Rahmawati',
                'position' => 'Pameran Organizer',
                'image' => 'img/testimonial.jpg',
                'rating' => 5,
                'comment' => 'Pengalaman yang luar biasa! Proses booking yang cepat dan customer service yang responsif.'
            ],
            [
                'name' => 'Budi Santoso',
                'position' => 'Music Event Organizer',
                'image' => 'img/testimonial.jpg',
                'rating' => 4,
                'comment' => 'Sangat membantu dalam menjangkau audiens yang lebih luas. Fitur-fitur yang disediakan sangat lengkap.'
            ]
        ];

        return view('testimonial', compact('testimonials'));
    }

    /**
     * Tampilkan halaman team
     */
    public function team()
    {
        // Data team (bisa dari database atau static)
        $teamMembers = [
            [
                'name' => 'Wijaya',
                'position' => 'CEO & Founder',
                'image' => 'img/wijaya.webp',
                'bio' => 'Passionate about bringing amazing events to life.',
                'social' => [
                    'twitter' => '#',
                    'facebook' => '#',
                    'instagram' => '#',
                    'linkedin' => '#',
                    'youtube' => '#'
                ]
            ],
            [
                'name' => 'Sarah Johnson',
                'position' => 'Event Manager',
                'image' => 'img/team-2.jpg',
                'bio' => 'Expert in managing large-scale events and concerts.',
                'social' => [
                    'twitter' => '#',
                    'facebook' => '#',
                    'instagram' => '#',
                    'linkedin' => '#',
                    'youtube' => '#'
                ]
            ],
            [
                'name' => 'Michael Chen',
                'position' => 'Technical Director',
                'image' => 'img/team-3.jpg',
                'bio' => 'Leading our technical innovation and platform development.',
                'social' => [
                    'twitter' => '#',
                    'facebook' => '#',
                    'instagram' => '#',
                    'linkedin' => '#',
                    'youtube' => '#'
                ]
            ],
            [
                'name' => 'Lisa Anderson',
                'position' => 'Marketing Director',
                'image' => 'img/team-4.jpg',
                'bio' => 'Creative marketing strategies to reach wider audiences.',
                'social' => [
                    'twitter' => '#',
                    'facebook' => '#',
                    'instagram' => '#',
                    'linkedin' => '#',
                    'youtube' => '#'
                ]
            ]
        ];

        return view('team', compact('teamMembers'));
    }
}