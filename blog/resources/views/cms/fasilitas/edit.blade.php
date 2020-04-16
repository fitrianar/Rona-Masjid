
@extends('layouts.app')
@section('title', 'Ubah Fasilitas')
@section('title-content', 'Ubah Fasilitas')
@section('footer-content')

@section('content')
<form action="{{ route('fasilitas.update', $fasilitas->id) }}" method="post"  enctype="multipart/form-data">
@csrf

    <div class="form-group ">
        <label for="parent_id">Nama Fasilitas</label>
        <input type="text" class="form-control" name="nama" value="{{ $fasilitas->nama }}" required>
    </div>

    <div class="form-group ">
        <label for="parent_id">Jenis Fasilitas</label>
        <input type="text" class="form-control" name="jenis_fasilitas" value="{{ $fasilitas->jenis_fasilitas }}" required>
    </div>

    <div class="form-group ">
        <label for="name">Upload Foto</label><br>
        <img src="{{ asset($fasilitas->foto) }}" height="100px">
        <input id="minute_length"  class="form-control" type="file" name="file" >
    </div>

    <!-- 
        <input type="text" name="like" value="0">
        <input type="text" name="comment" value="0"> -->

        <button type="submit" class="btn btn-primary">Ubah</button>

</form>
@endsection