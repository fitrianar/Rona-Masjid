@extends('layouts.app')
@section('title', 'Kegiatan')
@section('title-content', 'Data Kegiatan')
@section('footer-content')

@section('content')

<table id="kegiatan" class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Kegiatan</th>
      <th scope="col">Tanggal Dilaksanakanr</th>
      <th scope="col">Waktu Acara</th>
      <th scope="col">Deskripsi Kegiatan</th>
      <th scope="col">Poster</th>
      <th scope="col">Tanggal Publish</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
  @forelse($kegiatan as $key => $kgtn)
    <tr>
      <th scope="row">{{ $key+1 }}</th>
      <td>{{ $kgtn->nama }}</td>
      <td>{{ $kgtn->tgl_dilaksanakan }}</td>
      <td>{{ $kgtn->jam_dimulai }} s/d {{ $kgtn->jam_akhir }} </td>
      @if(strlen($kgtn->deskripsi_kegiatan) > 500)
        <td>{!! substr($kgtn->deskripsi_kegiatan, 0, 500) . '...' !!}</td>
      @else
        <td>{!! $kgtn->deskripsi_kegiatan !!}</td>
      @endif
      <td><img src="{{ asset($kgtn->poster) }}" width="200px" height="200px"></td>
      <td>{!! $kgtn->tgl_dibuat !!}</td>
      
      <td>
        <a href="{{ route('kegiatan.edit', $kgtn->id) }}" class="btn btn-primary">Edit Data</a>
        <a href="{{ route('kegiatan.delete', $kgtn->id) }}" class="btn btn-danger">Hapus</a>
      </td>
    </tr>
    @empty
        <tr>
            <td colspan="6">Data Kosong</td>
        </tr>
    @endforelse

  </tbody>
</table>
<br>

<div class="text-right">
{{ $kegiatan->links() }}
</div>

@endsection

@push('css')
<!-- datatables -->
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css'>
<link rel='stylesheet' href='https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css'>
@endpush

@push('script')
<!-- Datatables -->
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script>
$(document).ready(function() {
    $('#kegiatan').DataTable();
} );
</script>
@endpush