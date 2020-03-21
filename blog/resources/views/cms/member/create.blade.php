
@extends('layouts.app')
@section('title', 'Tambah Member')
@section('title-content', 'Tambah Member')

@section('content')
<form action="{{ route('member.store') }}" method="post"  enctype="multipart/form-data">
@csrf

<div class="form-group ">
        <label for="parent_id">Nama </label>
        <input type="text" class="form-control" name="nama" required>
    </div>

    <div class="form-group ">
        <label for="name">Gambar</label>
        <input id="minute_length"  class="form-control" type="file" name="gambar" required="">
    </div>

    <div class="form-group ">
        <label for="name">No KTP</label></label>
        <input type="number" class="form-control" name="no_ktp" required/>
    </div>

    <div class="form-group ">
        <label for="name">Email</label>
        <input type="text" class="form-control" name="email" required/>
    </div>

    <div class="form-group ">
        <label for="name">No Telepon</label>
        <input type="text" class="form-control" name="no_telpon"/>
    </div>

    <div class="form-group ">
        <label for="name">Alamat</label>
        <textarea class="form-control" cols="4" name="alamat" required placeholer="isi alamat"></textarea>
    </div>

    <div class="form-group ">
        <label for="name">Jenis Kelamin</label>
        <select class="form-control" name="jenis_kelamin">
            <option selected hidden value="">--Pilih Jenis Kelamin--</option>
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>
    </div>

    <!-- 
        <input type="text" name="like" value="0">
        <input type="text" name="comment" value="0"> -->

        <button type="submit" class="btn btn-primary">Add</button>

</form>
@endsection