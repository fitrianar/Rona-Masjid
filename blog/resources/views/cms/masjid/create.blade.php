
@extends('layouts.app')
@section('title', 'Tambah Masjid')
@section('title-content', 'Tambah Masjid')

@section('content')
<form action="{{ route('masjid.store') }}" method="post"  enctype="multipart/form-data">
@csrf

<div class="form-group ">
        <label for="parent_id">Nama Masjid </label>
        <input type="text" class="form-control {{ $errors->has('nama_masjid') ? 'is-invalid' : '' }}" name="nama_masjid" value="{{ old('nama_masjid') }}" required>
        @if ($errors->has('nama_masjid'))
            <div class="text-danger">
            <p>{{ $errors->first('nama_masjid')}}</p>
            </div>
        @endif
    </div>

    <div class="form-group ">
        <label for="name">Gambar</label>
        <input id="minute_length" class="form-control {{ $errors->has('file') ? 'is-invalid' : '' }}" type="file" name="file" value="{{ old('file') }}" required="">
        @if ($errors->has('file'))
            <div class="text-danger">
            <p>{{ $errors->first('file')}}</p>
            </div>
        @endif
    </div>

    <div class="form-group ">
        <label for="parent_id">Alamat Masjid </label>
        <input type="text" class="form-control {{ $errors->has('alamat_masjid') ? 'is-invalid' : '' }}" name="alamat_masjid" value="{{ old('alamat_masjid') }}" required>
        @if ($errors->has('alamat_masjid'))
            <div class="text-danger">
            <p>{{ $errors->first('alamat_masjid')}}</p>
            </div>
        @endif
    </div>

    <div class="form-group ">
        <label for="parent_id">Luas Tanah </label> <a><i>meter</i></a>
        <input type="number" class="form-control {{ $errors->has('l_tanah') ? 'is-invalid' : '' }}" name="l_tanah" value="{{ old('l_tanah') }}" required>
        @if ($errors->has('l_tanah'))
            <div class="text-danger">
            <p>{{ $errors->first('l_tanah')}}</p>
            </div>
        @endif
    </div>

    <div class="form-group ">
        <label for="parent_id">Panjang Tanah </label> <a><i>meter</i></a> 
        <input type="number" class="form-control {{ $errors->has('p_tanah') ? 'is-invalid' : '' }}" name="p_tanah" value="{{ old('p_tanah') }}" required>
        @if ($errors->has('p_tanah'))
            <div class="text-danger">
            <p>{{ $errors->first('p_tanah')}}</p>
            </div>
        @endif
    </div>

    <div class="form-group ">
        <label for="parent_id">Luas Bangunan </label>
        <input type="number" class="form-control {{ $errors->has('luas_bangunan') ? 'is-invalid' : '' }}" name="luas_bangunan" value="{{ old('luas_bangunan') }}" required>
        @if ($errors->has( 'luas_bangunan'))
            <div class="text-danger">
            <p>{{ $errors->first('luas_bangunan')}}</p>
            </div>
        @endif
    </div>

    <div class="form-group ">
        <label for="name">Lampiran</label>
        <input id="minute_length"  class="form-control {{ $errors->has('file_lampiran') ? 'is-invalid' : '' }}" type="file" name="file_lampiran" value="{{ old('file_lampiran') }}" >
        @if ($errors->has('file_lampiran'))
            <div class="text-danger">
            <p>{{ $errors->first('file_lampiran')}}</p>
            </div>
        @endif
    </div>

    <div class="form-group ">
        <label for="name">Status Masjid</label>
        <select class="form-control  {{ $errors->has('status_masjid') ? 'is-invalid' : '' }}" name="status_masjid">
            <option selecte d hidden value="">--Pilih Status Masjid--</option>
            <option value="Waqaf" {{ old('status_masjid') === 'Waqaf' ? 'selected' : '' }}>Waqaf</option>
            <option value="Pribadi" {{ old('status_masjid') === 'Pribadi' ? 'selected' : '' }}>Pribadi</option>
        </select>
        @if ($errors->has('status_masjid'))
            <div class="text-danger">
            <p>{{ $errors->first('status_masjid')}}</p>
            </div>
        @endif
    </div>

    <div class="form-group ">
        <label for="name">Deskripsi</label>
        <textarea class="form-control  {{ $errors->has('deskripsi') ? 'is-invalid' : '' }}" cols="4" name="deskripsi" required placeholer="isi Deskripsi">{{ old('deskripsi') }}</textarea>
        @if ($errors->has('deskripsi'))
            <div class="text-danger">
            <p>{{ $errors->first('deskripsi')}}</p>
            </div>
        @endif
    </div>

    <!-- 
        <input type="text" name="like" value="0">
        <input type="text" name="comment" value="0"> -->

        <button type="submit" class="btn btn-primary">Add</button>

</form>
@endsection