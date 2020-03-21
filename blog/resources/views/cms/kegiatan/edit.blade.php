
@extends('layouts.app')
@section('title', 'Ubah Kegiatan')
@section('title-content', 'Ubah Kegiatan')
@section('footer-content')

@section('content')
<form action="{{ route('kegiatan.update', $kegiatan->id) }}" method="post"  enctype="multipart/form-data">
@csrf

    <div class="form-group ">
        <label for="parent_id">Nama Kegiatan</label>
        <input type="text" class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" value="{{ $kegiatan->nama }}" name="nama" required>
        @if ($errors->has('nama'))
            <div class="text-danger">
            <p>{{ $errors->first('nama')}}</p>
            </div>
        @endif
    </div>

    <div class="form-group ">
        <label for="parent_id">Tanggal Dilaksanakan</label>
        <input type="text" class="form-control {{ $errors->has('tgl_dilaksanakan') ? 'is-invalid' : '' }}" value="{{ $kegiatan->tgl_dilaksanakan }}" name="tgl_dilaksanakan" required>
        @if ($errors->has('tgl_dilaksanakan'))
            <div class="text-danger">
            <p>{{ $errors->first('tgl_dilaksanakan')}}</p>
            </div>
        @endif
    </div>

    <div class="form-group ">
        <label for="parent_id">Jam Dimulai</label>
        <input type="text" class="form-control {{ $errors->has('jam_dimulai') ? 'is-invalid' : '' }}" value="{{ $kegiatan->jam_dimulai }}" name="jam_dimulai" required>
        @if ($errors->has('jam_dimulai'))
            <div class="text-danger">
            <p>{{ $errors->first('jam_dimulai')}}</p>
            </div>
        @endif
    </div>

    <div class="form-group ">
        <label for="parent_id">Jam Berakhir</label>
        <input type="text" class="form-control {{ $errors->has('jam_akhir') ? 'is-invalid' : '' }}" value="{{ $kegiatan->jam_akhir }}" name="jam_akhir" required>
        @if ($errors->has('jam_akhir'))
            <div class="text-danger">
            <p>{{ $errors->first('jam_akhir')}}</p>
            </div>
        @endif
    </div>

    <div class="form-group ">
        <label for="name">Deskripsi Kegiatan</label>
        <textarea class="form-control {{ $errors->has('deskripsi_kegiatan') ? 'is-invalid' : '' }}" name="deskripsi_kegiatan" id="kegiatan-ckeditor">{{ $kegiatan->deskripsi_kegiatan }}</textarea>
        @if ($errors->has('deskripsi_kegiatan'))
            <div class="text-danger">
            <p>{{ $errors->first('deskripsi_kegiatan')}}</p>
            </div>
        @endif
    </div>

    <div class="form-group ">
        <label for="name">Upload Poster</label><br>
        <img src="{{ asset($kegiatan->poster) }}" height="100px">
        <input id="minute_length"  class="form-control {{ $errors->has('file') ? 'is-invalid' : '' }}" value="{{ $kegiatan->file }}" type="file" name="file" >
        @if ($errors->has('file'))
            <div class="text-danger">
            <p>{{ $errors->first('file')}}</p>
            </div>
        @endif
    </div>

    <!-- 
        <input type="text" name="like" value="0">
        <input type="text" name="comment" value="0"> -->

        <button type="submit" class="btn btn-primary">Ubah</button>

</form>
@endsection