@extends('layouts.public.app')
@section('title', 'Kontak Kami | '. $appName)

@section('content')
<div class="container">
		<div class="contact-info">
		<img src="{{ asset('img/kontak.png') }}" alt="contact" style="height:200px !important">
			<div class="block-title">
				<h3>Hubungi Kami</h3>
			</div>
			<p>Saran dan masukan dari anda sangat berharga bagi kami.</p>
		</div>
		<div class="contact-form">
			<form action="{{ route('store-kontak') }}" method="POST" class="row form-submit">
			@csrf
				<div class="row">
					<div class="col-md-6 form-group">
						<input type="text" class="form-control" placeholder="Nama Anda (Required)" name="name" id="name" required="">
					</div>
					<div class="col-md-6 form-group">
						<input type="text" class="form-control" placeholder="Email Anda (Required)" name="email" id="email" required="">
					</div>
			
					<div class="col-md-12 form-group">
						<input type="text" class="form-control" placeholder="Subjek" name="subjek" id="subjek">
					</div>
					<div class="col-md-12 form-group">
						<textarea class="form-control" placeholder="Your message..." rows="5" name="pesan" id="pesan"></textarea>
					</div>
					<div class="col-md-12 form-group no-bottom-margin">
						<button type="submit" class="submit">Kirim</button>
					</div>
				</div>
			</form>
		</div>
	</div>	
@endsection

	
@push('script')
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
<script>
 $(".form-submit").submit(function(e) {

e.preventDefault(); // avoid to execute the actual submit of the form.

var form = $(this);
var url = form.attr('action');
var method = form.attr('method') != "POST" ? "POST" : form.attr('method');
var name = $('#name').val();
$.ajax({
	type: method,
	url: url,
	data: form.serialize(),
	success: function(data) 
	{
		swal(
		    "Terima Kasih "+name, "Pesan anda Berhasil dimasukan, Harap tunggu balasan kami nanti", "success"
		).then(function() {
			location.reload();
		});
	},
	error: function(xhr) {
		var res = xhr.responseJSON;
		if ($.isEmptyObject(res) == false) {
			$.each(res.errors, function(key, value) {

					jQuery("[name=" + key + "]").addClass(' is-invalid').after('<div class="text-danger"><strong>' + value + '</strong></div>');
					jQuery("[name=" + key + "]").parent().parent().addClass('has-error');
		
			});
		}
	}
});
});
</script>
@endpush

