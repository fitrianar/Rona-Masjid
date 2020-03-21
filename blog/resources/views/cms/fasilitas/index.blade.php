@extends('layouts.app')
@section('title', 'Fasilitas')
@section('title-content', 'Data Fasilitas')
@section('footer-content')

@section('content')

<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Fasilitas</th>
      <th scope="col">Foto</th>
      <th scope="col">Tanggal Publish</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
  @forelse($fasilitas as $key => $fslts)
    <tr>
      <th scope="row">{{ $key+1 }}</th>
      <td>{{ $fslts->nama }}</td>
      <td><img src="{{ asset($fslts->foto) }}" width="200px" height="200px"></td>
      <td>{!! $fslts->tgl_ditambah !!}</td>
      <td>
        <a href="{{ route('fasilitas.edit', $fslts->id) }}" class="btn btn-primary">Edit Data</a>
        <a href="{{ route('fasilitas.delete', $fslts->id) }}" class="btn btn-danger">Hapus</a>
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
{{ $fasilitas->links() }}
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
    $('#fasilitas').DataTable();
} );
</script>
@endpush