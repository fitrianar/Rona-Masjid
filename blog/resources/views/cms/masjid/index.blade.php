@extends('layouts.app')
@section('title', 'Data Masjid')
@section('title-content', 'Data Masjid')
@section('footer-content', '-')

@section('content')

<div class="col-12">
    <div class="text-right">
        <a href="{{  route('masjid.create') }}" class="btn btn-info">Tambah (+)</a>
    </div>
</div>

<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Masjid</th>
      <th scope="col">Alamat Masjid</th>
      <th scope="col">Luas Tanah</th>
      <th scope="col">Panjang Tanah</th>
      <th scope="col">Luas Bangunan</th>
      <th scope="col">Status Masjid</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Aksi</th>
    </tr> <?php ?>
  </thead>
  <tbody>
  
  @forelse($masjid as $key => $msj)
    <tr>
      <th scope="row">{{ $key+1 }}</th>
      <td>{{ $msj->nama_masjid }}</td>
      <td>{{ $msj->alamat_masjid }}</td>
      <td>{{ $msj->l_tanah }}</td>
      <td>{{ $msj->p_tanah }}</td>
      <td>{{ $msj->luas_bangunan }}</td>
      <td>{{ $msj->status_masjid }}</td>
      <td>{{ $msj->created_at }}</td>

      <td>
        <a href="{{ route('masjid.edit', $msj->id) }}" class="btn btn-primary">Edit Data</a>
        <a href="{{ route('masjid.delete', $msj->id) }}" class="btn btn-danger">Hapus</a>
      </td>
    </tr>
    @empty
        <tr>
            <td colspan="9">Data Kosong</td>
        </tr>
    @endforelse

  </tbody>
</table>
<br>

<div class="text-right">
{{ $masjid->links() }}
</div>

@endsection