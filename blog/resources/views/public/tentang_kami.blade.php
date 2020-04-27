@extends('layouts.public.app')
@section('title', 'Kontak Kami | '. $appName)

@section('content')
<div class="row">
						<!-- Content Area -->
						<div class="col-md-12 content-area">
							<!-- Aboute Block -->	
							<div class="aboute-block">
								<img src="http://via.placeholder.com/1170x440" alt="abouteme"/>
								<div class="block-title">
									<h3>About us</h3>
								</div>
								<p>These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection. But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that.</p>
								<h3>“To live is the rarest thing in the world. Most people exist, that is all.”<span>Oscar Wilde</span></h3>
								<p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who.</p>
								<ul>
									<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
								</ul>
							</div><!-- Aboute Block /- -->	
							<!-- Team Section -->	
							<div class="team-section">
								<div class="block-title">
									<h3>Team</h3>
								</div>
								<div class="team-box">
									<img src="http://via.placeholder.com/170x170" alt="team1"/>
									<h4>David Wilde</h4>
									<p>To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pursue pain, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful.</p>
									<ul>
										<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
									</ul>
								</div>
								<div class="team-box">
									<img src="http://via.placeholder.com/170x170" alt="team1"/>
									<h4>Caitlin Skye</h4>
									<p>These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted.</p>
									<ul>
										<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
									</ul>
								</div>
								<div class="team-box">
									<img src="http://via.placeholder.com/170x170" alt="team1"/>
									<h4>David Wilde</h4>
									<p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system.</p>
									<ul>
										<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
									</ul>
								</div>
							</div><!-- Team Section /- -->
						</div><!-- Content Area /- -->
					</div><!-- Row / -->
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

