@extends('layouts.app')
@section('title', 'Tambah Fasilitas')
@section('title-content', 'Tambah Fasilitas')
@section('footer-content')

@section('content')
<form action="{{ route('fasilitas.store') }}" method="post"  enctype="multipart/form-data">
@csrf

    <div class="form-group ">
        <label for="parent_id">Nama Fasilitas</label>
        <input type="text" class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" name="nama" value="{{ old('nama') }}" required>
    </div>

    <div class="form-group ">
        <label for="name">Foto</label>
        <input id="minute_length" class="form-control {{ $errors->has('file') ? 'is-invalid' : '' }}" name="file" value="{{ old('file') }}" type="file" name="file" required="">
        @if ($errors->has('file'))
            <div class="text-danger">
            <p>{{ $errors->first('file')}}</p>
            </div>
        @endif
    </div>

    <div class="form-group ">
        <label for="parent_id">Jenis Fasilitas</label>
        <input type="text" class="form-control {{ $errors->has('jenis_fasilitas') ? 'is-invalid' : '' }}" name="jenis_fasilitas" value="{{ old('jenis_fasilitas') }}" required>
    </div>

    <!-- 
        <input type="text" name="like" value="0">
        <input type="text" name="comment" value="0"> -->

        <button type="submit" class="btn btn-primary">Add</button>

</form>
@endsection