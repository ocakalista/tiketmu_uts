@extends('admin.layouts.app')

@section('title', 'Manajemen Konser')
@section('page-title', 'Manajemen Konser')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>Daftar Konser</h4>
    <a href="{{ route('admin.concerts.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Tambah Konser
    </a>
</div>

<div class="card">
    <div class="card-body">
        @if($concerts->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Gambar</th>
                            <th>Judul</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Lokasi</th>
                            <th>Harga</th>
                            <th>Tiket Tersedia</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($concerts as $concert)
                        <tr>
                            <td>
                                @if($concert->image)
                                    <img src="{{ asset('storage/' . $concert->image) }}" 
                                         alt="{{ $concert->title }}" 
                                         class="rounded" 
                                         style="width: 60px; height: 60px; object-fit: cover;">
                                @else
                                    <div class="bg-secondary rounded d-flex align-items-center justify-content-center" 
                                         style="width: 60px; height: 60px;">
                                        <i class="fas fa-music text-white"></i>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <strong>{{ $concert->title }}</strong><br>
                                <small class="text-muted">{{ $concert->organizer }}</small>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($concert->date)->format('d M Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($concert->time)->format('H:i') }} WIB</td>
                            <td>{{ $concert->location }}</td>
                            <td>{{ $concert->formatted_price }}</td>
                            <td>
                                <span class="badge {{ $concert->available_tickets > 0 ? 'bg-success' : 'bg-danger' }}">
                                    {{ $concert->available_tickets }}/{{ $concert->total_tickets }}
                                </span>
                            </td>
                            <td>
                                @if($concert->status === 'active')
                                    <span class="badge bg-success">Aktif</span>
                                @elseif($concert->status === 'inactive')
                                    <span class="badge bg-secondary">Tidak Aktif</span>
                                @else
                                    <span class="badge bg-danger">Sold Out</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.concerts.show', $concert) }}" 
                                       class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.concerts.edit', $concert) }}" 
                                       class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-danger" 
                                            onclick="deleteConcert({{ $concert->id }})">
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
                {{ $concerts->links() }}
            </div>
        @else
            <div class="text-center py-4">
                <i class="fas fa-music fa-3x text-muted mb-3"></i>
                <p class="text-muted">Belum ada konser yang ditambahkan</p>
                <a href="{{ route('admin.concerts.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Tambah Konser Pertama
                </a>
            </div>
        @endif
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus konser ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form id="deleteForm" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
function deleteConcert(id) {
    document.getElementById('deleteForm').action = `/admin/concerts/${id}`;
    new bootstrap.Modal(document.getElementById('deleteModal')).show();
}
</script>
@endsection