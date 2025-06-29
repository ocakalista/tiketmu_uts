@extends('admin.layouts.app')

@section('title', 'Manajemen Pemesanan')
@section('page-title', 'Manajemen Pemesanan')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>Daftar Pemesanan</h4>
    <div class="d-flex gap-2">
        <select class="form-select" id="statusFilter" style="width: auto;">
            <option value="">Semua Status</option>
            <option value="pending">Pending</option>
            <option value="confirmed">Confirmed</option>
            <option value="cancelled">Cancelled</option>
        </select>
    </div>
</div>

<div class="card">
    <div class="card-body">
        @if($bookings->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Kode Booking</th>
                            <th>Nama Pemesan</th>
                            <th>Konser</th>
                            <th>Tanggal Konser</th>
                            <th>Jumlah Tiket</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                            <th>Tanggal Pesan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bookings as $booking)
                        <tr>
                            <td>
                                <strong>{{ $booking->booking_code }}</strong>
                                @if($booking->phone)
                                    <br><small class="text-muted">{{ $booking->phone }}</small>
                                @endif
                            </td>
                            <td>
                                <strong>{{ $booking->user->name }}</strong>
                                <br><small class="text-muted">{{ $booking->user->email }}</small>
                            </td>
                            <td>
                                <strong>{{ $booking->concert->title }}</strong>
                                <br><small class="text-muted">{{ $booking->concert->organizer }}</small>
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($booking->concert->date)->format('d M Y') }}
                                <br><small class="text-muted">{{ \Carbon\Carbon::parse($booking->concert->time)->format('H:i') }} WIB</small>
                            </td>
                            <td>
                                <span class="badge bg-primary">{{ $booking->quantity }} tiket</span>
                            </td>
                            <td>{{ $booking->formatted_total_price }}</td>
                            <td>
                                <select class="form-select form-select-sm status-select" 
                                        data-booking-id="{{ $booking->id }}"
                                        data-current-status="{{ $booking->status }}">
                                    <option value="pending" {{ $booking->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="confirmed" {{ $booking->status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                    <option value="cancelled" {{ $booking->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                            </td>
                            <td>{{ $booking->created_at->format('d M Y H:i') }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.bookings.show', $booking) }}" 
                                       class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-danger" 
                                            onclick="deleteBooking({{ $booking->id }})">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
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
                <p class="text-muted">Belum ada pemesanan</p>
            </div>
        @endif
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">