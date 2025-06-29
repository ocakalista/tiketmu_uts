@extends('admin.layouts.app')

@section('title', 'Detail Konser')
@section('page-title', 'Detail Konser')

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-info-circle me-2"></i>Informasi Konser
                </h5>
            </div>
            <div class="card-body">
                @if($concert->image)
                    <img src="{{ asset('storage/' . $concert->image) }}" 
                         alt="{{ $concert->title }}" 
                         class="img-fluid rounded mb-3">
                @endif
                
                <h4>{{ $concert->title }}</h4>
                <p class="text-muted mb-3">{{ $concert->description }}</p>
                
                <table class="table table-borderless">
                    <tr>
                        <td><strong>Tanggal:</strong></td>
                        <td>{{ \Carbon\Carbon::parse($concert->date)->format('d M Y') }}</td>
                    </tr>
                    <tr>
                        <td><strong>Waktu:</strong></td>
                        <td>{{ \Carbon\Carbon::parse($concert->time)->format('H:i') }} WIB</td>
                    </tr>
                    <tr>
                        <td><strong>Lokasi:</strong></td>
                        <td>{{ $concert->location }}</td>
                    </tr>
                    <tr>
                        <td><strong>Organizer:</strong></td>
                        <td>{{ $concert->organizer }}</td>
                    </tr>
                    <tr>
                        <td><strong>Harga:</strong></td>
                        <td>{{ $concert->formatted_price }}</td>
                    </tr>
                    <tr>
                        <td><strong>Tiket:</strong></td>
                        <td>{{ $concert->available_tickets }}/{{ $concert->total_tickets }}</td>
                    </tr>
                    <tr>
                        <td><strong>Status:</strong></td>
                        <td>
                            @if($concert->status === 'active')
                                <span class="badge bg-success">Aktif</span>
                            @elseif($concert->status === 'inactive')
                                <span class="badge bg-secondary">Tidak Aktif</span>
                            @else
                                <span class="badge bg-danger">Sold Out</span>
                            @endif
                        </td>
                    </tr>
                </table>
                
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.concerts.edit', $concert) }}" class="btn btn-warning">
                        <i class="fas fa-edit me-2"></i>Edit
                    </a>
                    <a href="{{ route('admin.concerts.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-ticket me-2"></i>Daftar Pemesanan
                </h5>
            </div>
            <div class="card-body">
                @if($bookings->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Kode Booking</th>
                                    <th>Nama Pemesan</th>
                                    <th>Email</th>
                                    <th>Jumlah</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bookings as $booking)
                                <tr>
                                    <td><strong>{{ $booking->booking_code }}</strong></td>
                                    <td>{{ $booking->user->name }}</td>
                                    <td>{{ $booking->user->email }}</td>
                                    <td>{{ $booking->quantity }} tiket</td>
                                    <td>{{ $booking->formatted_total_price }}</td>
                                    <td>
                                        @if($booking->status === 'pending')
                                            <span class="badge bg-warning">Pending</span>
                                        @elseif($booking->status === 'confirmed')
                                            <span class="badge bg-success">Confirmed</span>
                                        @else
                                            <span class="badge bg-danger">Cancelled</span>
                                        @endif
                                    </td>
                                    <td>{{ $booking->created_at->format('d M Y H:i') }}</td>
                                    <td>
                                        <a href="{{ route('admin.bookings.show', $booking) }}" 
                                           class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="d-flex justify-content-center mt-4">
                        {{ $bookings->links() }}
                    </div>
                @else
                    <div class="text-center py-4">
                        <i class="fas fa-ticket fa-3x text-muted mb-3"></i>
                        <p class="text-muted">Belum ada pemesanan untuk konser ini</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection