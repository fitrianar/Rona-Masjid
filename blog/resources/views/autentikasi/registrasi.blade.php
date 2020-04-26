<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ $appName }} | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('admin-lte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('admin-lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin-lte/dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="{{ route('index') }}"><img src="{{ asset('img/logo.png') }}" height='200px' weight='200px' style="margin-top:-50px; margin-bottom:-50px;"></a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Registrasi Pengurus Baru</p>

      <form action="{{ route('registrasi-pengurus-store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" placeholder="Full name" name="nama" value="{{ old('nama') }}">
         
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          @if ($errors->has('nama'))
              <div class="text-danger">
              <p>{{ $errors->first('nama')}}</p>
              </div>  
          @endif
        </div>
        <div class="form-group ">
          <label for="name">Pilih Masjid</label>
          <select class="form-control" name="masjid_id">
            <option selected hidden value="">--Pilih Masjid--</option>
              @forelse($masjid as $msj)
              <option value="{{ $msj->id }}">{{ $msj->nama_masjid }}</option>
              @empty
            <option value="" selected hidden>data kosong</option>
              @endforelse
          </select>
        </div>
        <div class="form-group ">
          <label for="name">Gambar</label>
          <input id="minute_length"  class="form-control {{ $errors->has('file') ? 'is-invalid' : '' }}" type="file" name="file" value="{{ old('file') }}" required="">
          @if ($errors->has( 'file'))
            <div class="text-danger">
            <p>{{ $errors->first('file')}}</p>
            </div>
          @endif
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
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agreer" required>
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
<!-- 
      <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div> -->

      <a href="{{ route('login') }}" class="text-center">Sudah mempunyai akun? login disini</a>
      <!-- <a href="login.html" class="text-center">Daftar Sebagai Pengurus?</a> -->
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{ asset('admin-lte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin-lte/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
