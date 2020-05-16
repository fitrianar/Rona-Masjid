
@extends('layouts.app')
@section('title', 'Balas Pesan')
@section('title-content', 'Balas Pesan')
@section('footer-content')

@section('content')
<form action="{{ route('hubungi-kami-balas-post', $pesan->id) }}" method="post"  enctype="multipart/form-data">
@csrf

    <div class="form-group ">
        <label for="parent_id">Email Penerima</label>
        <input type="text" class="form-control" name="email" value="{{ $pesan->email }}" readonly>
    </div>

    <div class="form-group ">
        <label for="parent_id">Balasan</label>
       <textarea class="form-control" name="balasan" placeholder="tambah balasan disini"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Balas Pesan</button>

</form>
@endsection