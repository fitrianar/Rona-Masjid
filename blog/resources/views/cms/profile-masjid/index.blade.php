
@extends('layouts.app')
@section('title', 'Edit Masjid')
@section('title-content', 'Edit Masjid '. $masjid->nama_masjid)

@section('content')
<form action="{{ route('profile-masjid.update', $masjid->id) }}" method="post"  enctype="multipart/form-data">
@csrf

<div class="row">
<div class="col-4">
    <div class="text-center">
        <img src="{{ asset($masjid->gambar) }}" class="avatar img-square img-thumbnail" alt="avatar" >
        <h6>Upload a different photo...</h6>
        <input type="file" class="text-center {{ $errors->has('gambar') ? 'is-invalid' : '' }} center-block well well-sm" name="file">
        @if ($errors->has('gambar'))
            <div class="text-danger">
            <p>{{ $errors->first('gambar')}}</p>
            </div>
        @endif
      </div>
</div>

<div class="col-8">
    <div class="form-group ">
        <label for="parent_id">Nama Masjid </label>
        <input type="text" class="form-control {{ $errors->has('nama_masjid') ? 'is-invalid' : '' }}" name="nama_masjid" value="{{ $masjid->nama_masjid }}" required>

    </div>

    <div class="form-group ">
        <label for="parent_id">Alamat Masjid </label>
        <input type="text" class="form-control {{ $errors->has('alamat_masjid') ? 'is-invalid' : '' }}" name="alamat_masjid" value="{{ $masjid->alamat_masjid }}" required>
        @if ($errors->has('alamat_masjid'))
            <div class="text-danger">
            <p>{{ $errors->first('alamat_masjid')}}</p>
            </div>
        @endif
    </div>

    <div class="form-group ">
        <label for="parent_id">Luas Tanah </label> <a><i>meter</i></a>
        <input type="number" class="form-control {{ $errors->has('l_tanah') ? 'is-invalid' : '' }}" name="l_tanah" value="{{ $masjid->l_tanah }}" required>
        @if ($errors->has('l_tanah'))
            <div class="text-danger">
            <p>{{ $errors->first('l_tanah')}}</p>
            </div>
        @endif
    </div>

    <div class="form-group ">
        <label for="parent_id">Panjang Tanah </label> <a><i>meter</i></a> 
        <input type="number" class="form-control {{ $errors->has('p_tanah') ? 'is-invalid' : '' }}" name="p_tanah" value="{{ $masjid->p_tanah }}" required>
        @if ($errors->has('p_tanah'))
            <div class="text-danger">
            <p>{{ $errors->first('p_tanah')}}</p>
            </div>
        @endif
    </div>

    <div class="form-group ">
        <label for="parent_id">Luas Bangunan </label>
        <input type="number" class="form-control {{ $errors->has('luas_bangunan') ? 'is-invalid' : '' }}" name="luas_bangunan" value="{{ $masjid->luas_bangunan }}" required>
        @if ($errors->has('luas_bangunan'))
            <div class="text-danger">
            <p>{{ $errors->first('luas_bangunan')}}</p>
            </div>
        @endif
    </div>

    <div class="form-group  {{ $errors->has('lampiran') ? 'is-invalid' : '' }}">
        <label for="name">Lampiran</label>
        @if(!is_null($masjid->lampiran_masjid))
        <a href="{{ asset($masjid->lampiran_masjid) }}" target="_blank" class="href">Buka Berkas</a>
        @endif
        <input id="minute_length"  class="form-control {{ $errors->has('lampiran') ? 'is-invalid' : '' }}" type="file" name="lampiran">
        @if ($errors->has('lampiran'))
            <div class="text-danger">
            <p>{{ $errors->first('lampiran')}}</p>
            </div>
        @endif
    </div>

    <div class="form-group ">
        <label for="name">Status Masjid</label>
        <select class="form-control  {{ $errors->has('status_masjid') ? 'is-invalid' : '' }}" name="status_masjid">
            <option selecte d hidden value="">--Pilih Status Masjid--</option>
            <option value="Waqaf" {{$masjid->status_masjid === 'Waqaf' ? 'selected' : '' }}>Waqaf</option>
            <option value="Pribadi" {{ $masjid->status_masjid === 'Pribadi' ? 'selected' : '' }}>Pribadi</option>
        </select>
        @if ($errors->has('status_masjid'))
            <div class="text-danger">
            <p>{{ $errors->first('status_masjid')}}</p>
            </div>
        @endif
    </div>

    <div class="form-group ">
        <label for="name">Deskripsi</label>
        <textarea class="form-control  {{ $errors->has('deskripsi') ? 'is-invalid' : '' }}" cols="4" name="deskripsi" required placeholer="isi Deskripsi">{{ $masjid->deskripsi }}</textarea>
        @if ($errors->has('deskripsi'))
            <div class="text-danger">
            <p>{{ $errors->first('deskripsi')}}</p>
            </div>
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Ubah</button>

</div>
</div>

   

    <!-- 
        <input type="text" name="like" value="0">
        <input type="text" name="comment" value="0"> -->


</form>
@endsection