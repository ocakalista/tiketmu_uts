<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use App\Models\User;

class AuthController extends Controller
{
    
    // Method untuk menampilkan halaman Join Us
    public function showJoinForm()
    {
        return view('SignUp');
    }
    
    // Method untuk memproses form Join Us
    public function processJoin(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);
        
        try {
            // Buat user baru
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            
            return redirect()->route('join.form')->with('success', 'Pendaftaran berhasil! Selamat datang di TIKETMU.');
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mendaftar. Silakan coba lagi.');
        }
    }
    
    // Method untuk login form
    public function showLoginForm()
    {
        return view('login');
    }
    
    // Method untuk memproses login
    public function processLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        if (auth()->attempt($request->only('email', 'password'))) {
            return redirect()->intended('/dashboard');
        }
        
        return redirect()->back()->with('error', 'Email atau password salah.');
    }
    
    // Method untuk logout
    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
    
    // Method untuk mengirim contact form
    public function sendContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);
        
        $data = $request->all();
        
        try {
            // Kirim email
            Mail::to('admin@tiketmu.com')->send(new ContactFormMail($data));
            
            return response()->json(['message' => 'Pesan berhasil dikirim']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal mengirim pesan'], 500);
        }
    }
}