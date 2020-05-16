
@extends('layouts.app')
@section('title', 'PASSWORD')
@section('title-content', 'Ubah PASSWORD')
@section('footer-content')

@section('content')
<form action="{{ route('profile-update-password', $profile->id) }}" method="post"  enctype="multipart/form-data">
@csrf

    <div class="form-group ">
        <label for="password">Password Baru </label>
        <input type="password" class="form-control form-password {{ $errors->has('password') ? 'is-invalid' : '' }}"  name="password" required>
        @if ($errors->has('password'))
            <div class="text-danger">
            <p>{{ $errors->first('password')}}</p>
            </div>
        @endif
    </div>

    <input type="checkbox" class="form-checkbox"> Show password

    <div class="form-group ">
        <label for="password_confirm">Konfirmasi Password Baru </label>
        <input type="password" class="form-control {{ $errors->has('password_confirm') ? 'is-invalid' : '' }}"  name="password_confirm" required>
        @if ($errors->has('password_confirm'))
            <div class="text-danger">
            <p>{{ $errors->first('password_confirm')}}</p>
            </div>
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Ubah</button>

</form>
@endsection

@push('script')
<script type="text/javascript">
	$(document).ready(function(){		
		$('.form-checkbox').click(function(){
			if($(this).is(':checked')){
				$('.form-password').attr('type','text');
			}else{
				$('.form-password').attr('type','password');
			}
		});
	});
</script>
@endpush