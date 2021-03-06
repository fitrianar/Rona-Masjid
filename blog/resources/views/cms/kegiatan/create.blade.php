@extends('layouts.app')
@section('title', 'Tambah Kegiatan')
@section('title-content', 'Tambah Kegiatan')
@section('footer-content')

@section('content')
<form action="{{ route('kegiatan.store') }}" method="post"  enctype="multipart/form-data">
@csrf

    <div class="form-group ">
        <label for="parent_id">Nama Kegiatan</label>
        <input type="text" class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" name="nama" value="{{ old('nama') }}" required>
        @if ($errors->has('nama'))
            <div class="text-danger">
            <p>{{ $errors->first('nama')}}</p>
            </div>
        @endif
    </div>

    <div class="form-group ">
        <label for="parent_id">Tanggal Dilaksanakan</label>
        <input type="date" name="tgl_dilaksanakan" min="{{ now() }}" class="form-control {{ $errors->has('tgl_dilaksanakan') ? 'is-invalid' : '' }}" value="{{ old('tgl_dilaksanakan') }}" required>
        @if ($errors->has('tgl_dilaksanakan'))
            <div class="text-danger">
            <p>{{ $errors->first('tgl_dilaksanakan')}}</p>
            </div>
        @endif
    </div>

    <div class="form-group ">
        <label for="parent_id">Jam Dimulai</label>
        <select name="jam_dimulai" class="form-control {{ $errors->has('jam_dimulai') ? 'is-invalid' : '' }}" id="">
            @foreach($jam as $item)
            <option value="{{ $item }}">{{$item}}</option>
            @endforeach
        </select>
        @if ($errors->has('jam_dimulai'))
            <div class="text-danger">
            <p>{{ $errors->first('jam_dimulai')}}</p>
            </div>
        @endif
    </div>

    <div class="form-group ">
        <label for="parent_id">Jam Berakhir</label>
         <select name="jam_akhir" class="form-control {{ $errors->has('jam_akhir') ? 'is-invalid' : '' }}" id="">
            @foreach($jam as $item)
            <option value="{{ $item }}">{{$item}}</option>
            @endforeach
            <option value="Selesai">Selesai</option>
        </select>
        @if ($errors->has('jam_akhir'))
            <div class="text-danger">
            <p>{{ $errors->first('jam_akhir')}}</p>
            </div>
        @endif
    </div>

    <div class="form-group ">
        <label for="name">Deskripsi Kegiatan</label>
        <textarea class="form-control {{ $errors->has('deskripsi_kegiatan') ? 'is-invalid' : '' }}" name="deskripsi_kegiatan" value="{{ old('deskripsi_kegiatan') }}"  id="textarea-ckeditor"></textarea>
        @if ($errors->has( 'deskripsi_kegiatan'))
            <div class="text-danger">
            <p>{{ $errors->first('deskripsi_kegiatan')}}</p>
            </div>
        @endif
    </div>

    <div class="form-group ">
        <label for="name">Upload Poster</label>
        <input id="minute_length" class="form-control {{ $errors->has('file') ? 'is-invalid' : '' }}" value="{{ old('file') }}" type="file" name="file" required="">
        @if ($errors->has('file'))
            <div class="text-danger">
            <p>{{ $errors->first('file')}}</p>
            </div>
        @endif
    </div>


    <!-- 
        <input type="text" name="like" value="0">
        <input type="text" name="comment" value="0"> -->

        <button type="submit" class="btn btn-primary">Add</button>

</form>
@endsection