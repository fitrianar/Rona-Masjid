@extends('layouts.public.app')
@section('title', 'Tentang Kami | '. $appName)

@section('content')
<div class="row">
						<!-- Content Area -->
						<div class="col-md-12 content-area">
							<!-- Aboute Block -->	
							<div class="aboute-block">
								<img src="{{ asset('img/mosque.png') }}" style="height:1170px wight:440px" alt="abouteme"/>
								<div class="block-title">
									<h3>Tentang Kami</h3>
								</div>
								<p> 
								Berbagai informasi dibutuhkan untuk menambah 
								pengetahuan yang nantinya akan bermanfaat untuk 
								penerimanya. Maka dari itu Aplikasi Portal Masjid 
								Berbasis Web ini salah satunya akan menjadi wadah 
								penyampaian informasi khusus kegiatan ataupun artikel 
								keagamaan (islam). Banyak kegiatan-kegiatan yang dilaksanakan umat muslim, 
								seperti kegiatan hari raya dan lainnya. Selain itu ada 
								kegiatan rutin dilaksanakan seperti dakwah, pengajian, 
								dan kajian di masjid. Ada juga kegiatan ibadah lainnya 
								seperti zakat, infaq dan juga shadaqoh. Informasi dari 
								kegiatan-kegiatan tersebut perlu di sampaikan kepada masyarakat 
								muslim lainnya, salah satunya melalui website ini. 
								Aplikasi ini diberi nama RONA Masjid. 
								Kenapa RONA Masjid? Rona yaitu berasala dari kalimat 
								“Routine Activity”. Rona berarti cahaya atau warna  
								sehingga Rona Masjid memiliki arti cahaya masjid. 
								Di dalam logonya terdapat gambar kubah yang sedikit 
								mengerucut melambangkan tempat ibadah umat islam atau 
								masjid. Gambar dibawahnya seperti buku yang sedang dibuka 
								bermakna selalu ada ilmu didalamnya. Warna gradasi dari 
								hijau ke kuning berartikan semakin kita masuk ke dalam 
								rumah Allah tersebut maka kita akan takjub dan membuat 
								kita terpesona. Hijau itu sendiri berfilosofi sejuk, 
								sedangkan gold itu optimis dan positif, jadi selain sejuk 
								semakin dalam semakin positif dan bermanfaat. </p>							
								<h3>“Siapa yang pada hari ini hanya memikirkan dirinya 
								sendiri maka pada esok ia pun akan memikirkan dirinya 
								saja. Lebih dari itu, siapa yang pada hari ini 
								memikirkan Allah maka besok ia akan selalu memikirkan 
								Allah pula.”
								<span>(Abu Sulaiman)</span></h3>
								<!-- <p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who.</p>
								<ul> -->
									<!-- <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
								</ul> -->
							</div><!-- Aboute Block /- -->	
							<!-- Team Section -->	
							<div class="team-section">
								<div class="block-title">
									<h3>Team</h3>
								</div>
								<div class="team-box">
									<img src="{{ asset('img/me.jpeg') }}" style="height:170px !important" alt="team1">
									<h4>Sri Fitriana Ramadhini</h4>
									<p>Contact Person</p>
									<p>Gmail : srifitrianaramadhini@gmail.com</p>
									<p>No HP : 085559391193</p>
									<!-- <ul>
										<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
									</ul> -->
								</div>
								<!-- <div class="team-box">
									<img src="http://via.placeholder.com/170x170" alt="team1"/>
									<h4>Caitlin Skye</h4>
									<p>These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted.</p>
									<ul>
										<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
									</ul>
								</div> -->
								<!-- <div class="team-box">
									<img src="http://via.placeholder.com/170x170" alt="team1"/>
									<h4>David Wilde</h4>
									<p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system.</p>
									<ul>
										<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
									</ul>
								</div> -->
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

