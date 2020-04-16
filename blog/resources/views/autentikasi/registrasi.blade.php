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
    <a href="../../index2.html"><img src="{{ asset('img/logo.png') }}" height='200px' weight='200px' style="margin-top:-50px; margin-bottom:-50px;"></a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Registrasi Pengurus Baru</p>

      <form action="{{ route('registrasi-store') }}" method="post" enctype="multipart/form-data">
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
        <div class="input-group mb-3">
          <input type="file" class="form-control {{ $errors->has('file') ? 'is-invalid' : '' }}"  placeholder="Gambar" name="file">
         
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-file"></span>
            </div>
          </div>
          @if ($errors->has('file'))
              <div class="text-danger">
              <p>{{ $errors->first('file')}}</p>
              </div>
          @endif
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="Email" name="email" value="{{ old('email') }}">
     
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          @if ($errors->has('email'))
              <div class="text-danger">
              <p>{{ $errors->first('email')}}</p>
              </div>
          @endif
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control {{ $errors->has('no_telpon') ? 'is-invalid' : '' }}" placeholder="No Telepon" name="no_telpon" value="{{ old('no_telpon') }}">
         
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-number"></span>
            </div>
          </div>
          @if ($errors->has('no_telpon'))
              <div class="text-danger">
              <p>{{ $errors->first('no_telpon')}}</p>
              </div>
          @endif
        </div>
        <div class="input-group mb-3">
        <select name="jenis_kelamin" class="form-control {{ $errors->has('jenis_kelamin') ? 'is-invalid' : '' }}">
          <option selected hidden >-- Pilih Jenis Kelamin --</option>
          <option value="Laki-Laki" {{ old('jenis_kelamin') === 'Laki-Laki' ? 'selected' : ''  }}>Laki-Laki</option>
          <option value="Perempuan" {{ old('jenis_kelamin') === 'Perempuan' ? 'selected' : ''  }}>Perempuan</option>
        </select>
      
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-number"></span>
            </div>
          </div>
          @if ($errors->has( 'jenis_kelamin'))
            <div class="text-danger">
            <p>{{ $errors->first('jenis_kelamin')}}</p>
            </div>
        @endif
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" placeholder="Password" name="password">

          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          @if ($errors->has('password'))
              <div class="text-danger">
              <p>{{ $errors->first('password')}}</p>
              </div>
          @endif
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control {{ $errors->has('password_confirm') ? 'is-invalid' : '' }}" placeholder="Retype password" name="password_confirm">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          @if ($errors->has('password_confirm'))
              <div class="text-danger">
              <p>{{ $errors->first('password_confirm')}}</p>
              </div>
          @endif

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
      <a href="login.html" class="text-center">Daftar Sebagai Pengurus?</a>
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
