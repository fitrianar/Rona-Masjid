@extends('layouts.app')
@section('title', 'Pengurus')
@section('title-content', 'Data Pengurus')
@section('footer-content', '-')

@section('content')

<div class="col-12">
    <div class="text-right">
        <a href="{{  route('pengurus.create') }}" class="btn btn-info">Tambah (+)</a>
    </div>
</div>

<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Masjid</th>
      <th scope="col">No KTP</th>
      <th scope="col">E-mail</th>
      <th scope="col">No Telepon</th>
      <th scope="col">Alamat</th>
      <th scope="col">Jenis Kelamin</th>
      <th scope="col">Foto</th>
      <th scope="col">Verifikasi</th>
      <th scope="col">Aksi</th>
    </tr> <?php ?>
  </thead>
  <tbody>
  
  @forelse($pengguna as $key => $user)
    <tr>
      <th scope="row">{{ $key+1 }}</th>
      <td>{{ $user->nama }}</td>
      <td>{{ $user->nama_masjid }}</td>
      <td>{{ $user->no_ktp }}</td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->no_telpon }}</td>
      <td>{{ $user->alamat }}</td>
      <td>{{ $user->jenis_kelamin }}</td>
      <td><img src="{{asset($user->gambar)}}" width="100"></td>
      @if($user->email_verified === null)
        <td><button class="btn btn-sm btn-danger">Belum Terverifikasi</button></td>
      @else
        <td><button class="btn btn-sm btn-success">Terverifikasi</button></td>
      @endif
      <td>
        <a href="{{ route('pengurus.edit', $user->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i> Edit Data</a>
        <a href="{{ route('pengurus.delete', $user->id) }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Hapus</a>
      </td>
    </tr>
    @empty
        <tr>
            <td colspan="10">Data Kosong</td>
        </tr>
    @endforelse

  </tbody>
</table>
<br>

<div class="text-right">
{{ $pengguna->links() }}
</div>

@endsection