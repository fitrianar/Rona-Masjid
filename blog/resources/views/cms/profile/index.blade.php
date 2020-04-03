
@extends('layouts.app')
@section('title', 'PROFILE')
@section('title-content', 'Ubah PROFILE')
@section('footer-content')

@section('content')
<form action="{{ route('profile.update', $profile->id) }}" method="post"  enctype="multipart/form-data">
@csrf

    <div class="form-group ">
        <label for="parent_id">Nama </label>
        <input type="text" class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" value="{{ $profile->nama }}" name="nama" required>
        @if ($errors->has('nama'))
            <div class="text-danger">
            <p>{{ $errors->first('nama')}}</p>
            </div>
        @endif
    </div>

    <div class="form-group ">
        <label for="parent_id">No KTP</label>
        <input type="text" class="form-control {{ $errors->has('no_ktp') ? 'is-invalid' : '' }}" value="{{ $profile->no_ktp }}" name="no_ktp" required>
        @if ($errors->has('no_ktp'))
            <div class="text-danger">
            <p>{{ $errors->first('no_ktp')}}</p>
            </div>
        @endif
    </div>

    <div class="form-group ">
        <label for="parent_id">E-mail</label>
        <input type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{ $profile->email }}" name="email" required>
        @if ($errors->has('email'))
            <div class="text-danger">
            <p>{{ $errors->first('email')}}</p>
            </div>
        @endif
    </div>

    <div class="form-group ">
        <label for="parent_id">Alamat</label>
        <textarea type="text" class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}"  name="alamat" required>{{ $profile->alamat }}</textarea>
        @if ($errors->has('alamat'))
            <div class="text-danger">
            <p>{{ $errors->first('alamat')}}</p>
            </div>
        @endif
    </div>

    <div class="form-group ">
        <label for="parent_id">Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-control">
            <option value="Laki-Laki" {{$profile->jenis_kelamin === 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
            <option value="Perempuan" {{$profile->jenis_kelamin === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
        </select>
        @if ($errors->has('jenis_kelamin'))
            <div class="text-danger">
            <p>{{ $errors->first('jenis_kelamin')}}</p>
            </div>
        @endif
    </div>

    <div class="form-group ">
        <label for="name">Foto</label><br>
        <img src="{{ asset($profile->gambar) }}" height="200px">
        <input id="minute_length"  class="form-control {{ $errors->has('file') ? 'is-invalid' : '' }}" type="file" name="file" >
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