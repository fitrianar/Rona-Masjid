
@extends('layouts.app')
@section('title', 'Ubah Kegiatan')
@section('title-content', 'Ubah Kegiatan')
@section('footer-content')

@section('content')
<form action="{{ route('kegiatan.update', $kegiatan->id) }}" method="post"  enctype="multipart/form-data">
@csrf

    <div class="form-group ">
        <label for="parent_id">Nama Kegiatan</label>
        <input type="text" class="form-control" name="nama" value="{{ $kegiatan->nama }}" required>
    </div>

    <div class="form-group ">
        <label for="parent_id">Tanggal Dilaksanakan</label>
        <input type="text" class="form-control" name="tgl_dilaksanakan" value="{{ $kegiatan->tgl_dilaksanakan }}" required>
    </div>

    <div class="form-group ">
        <label for="parent_id">Jam Dimulai</label>
        <input type="text" class="form-control" name="jam_dimulai" value="{{ $kegiatan->jam_dimulai }}" required>
    </div>

    <div class="form-group ">
        <label for="parent_id">Jam Berakhir</label>
        <input type="text" class="form-control" name="jam_akhir" value="{{ $kegiatan->jam_akhir }}" required>
    </div>

    <div class="form-group ">
        <label for="name">Deskripsi Kegiatan</label>
        <textarea class="form-control" name="deskripsi_kegiatan" id="kegiatan-ckeditor">{{ $kegiatan->deskripsi_kegiatan }}</textarea>
    </div>

    <div class="form-group ">
        <label for="name">Upload Poster</label><br>
        <img src="{{ asset($kegiatan->poster) }}" height="100px">
        <input id="minute_length"  class="form-control" type="file" name="file" >
    </div>

    <!-- 
        <input type="text" name="like" value="0">
        <input type="text" name="comment" value="0"> -->

        <button type="submit" class="btn btn-primary">Ubah</button>

</form>
@endsection