@extends('layouts.public.app')
@section('title', 'Kegiatan | '. $appName)

@section('content')
<div class="col-xl-8 col-lg-8 col-md-6 col-12 content-area">
	<article class="type-post">
	
		<!-- Row -->
		<div class="row">
		@foreach($kegiatan as $kgtn)

			<div class="col-12 col-md-12 col-sm-6 blog-paralle">
				<div class="type-post">
					<div class="entry-cover">
						<div cass="post-meta">
							<span class="byline">by <a href="#" title="Indesign">{{$kgtn->user_nama}}</a></span>
							<span class="post-date"><a href="#">{{ date("d-m-Y", strtotime($kgtn->created_at)) }}</a></span>
						</div>
						<a href="#"><img src="{{ asset($kgtn->poster) }}" alt="Post" /></a>
					</div>
					<div class="entry-content">
						<div class="entry-header">	
							<span class="post-category"><a href="#" title="Technology">{{$kgtn->tgl_dilaksanakan . ' (' . $kgtn->jam_dimulai .' s/d '. $kgtn->jam_akhir .')'}}</a></span>
							<h3 class="entry-title"><a href="#" title="Traffic Jams Solved">{{$kgtn->nama}}</a></h3>
						</div>								
						<p>{!! $kgtn->deskripsi_kegiatan !!}</p>
						<!-- <a href="#" title="Read More">Read More</a> -->
					</div>
				</div>
			</div>
			@endforeach
		
		</div><!-- Row /- -->

		{{ $kegiatan->links() }}

	</article>
	<!-- About Author -->
	<!-- <div class="about-author-box">
		<div class="author">
			<i><img src="http://via.placeholder.com/170x170" alt="Author" /></i>
			<h4>David Wilde</h4>
			<p>To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some
				advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that
				has no annoying consequences.</p>
			<ul>
				<li><a href="#" title="Facebook"><i class="fa fa-facebook"></i></a></li>
				<li><a href="#" title="Twitter"><i class="fa fa-twitter"></i></a></li>
				<li><a href="#" title="Pinterest"><i class="fa fa-pinterest-p"></i></a></li>
			</ul>
		</div>
	</div> -->
	<!-- About Author /- -->
	<!-- Related Post -->
	<div class="related-post">
		<h3>Daftar Masjid </h3>
		<div class="related-post-block">
		@foreach(\App\Masjid::fetchMasjid() as $masjid)
			<div class="related-post-box">
				<a href="#"><img src="{{$masjid->gambar}}" alt="Post" /></a>
				<span><a href="#" title="Travel">{{ $masjid->alamat_masjid }}</a></span>
				<h3><a href="#" title="Traffic Jams Solved">{{ $masjid->nama_masjid }}</a></h3>
			</div>
		@endforeach
		</div>
	</div><!-- Related Post /- -->
	
</div> @endsection