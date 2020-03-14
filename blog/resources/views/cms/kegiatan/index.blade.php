@extends('layouts.app')
@section('title', 'Kegiatan')
@section('title-content', 'Data Kegiatan')
@section('footer-content', '-')

@section('content')

<table class="table table-bordered">
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
      <td>{{ $kgtn->deskripsi_kegiatan }}</td>
      <td><img src="{{ asset($kgtn->poster) }}" width="300px" height="300px"></td>
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