@extends('layouts.public.app')
@section('title', 'Masjid | '. $appName)

@section('content')
<div class="col-xl-8 col-lg-8 col-md-6 col-12 content-area">
	<article class="type-post">
	
		<!-- Row -->
		<div class="row">
		
		<div class="related-post">
			<div class="related-post-block">
			@foreach($masjids as $masjid)
				<div class="colss-6">
					<div class="related-post-box">
						<a href="{{ route('public-detail-masjid', $masjid->id) }}"><img src="{{$masjid->gambar}}" alt="Post" /></a>
						<span><a href="#" title="Travel">{{ $masjid->alamat_masjid }}</a></span>
						<h3><a href="{{ route('public-detail-masjid', $masjid->id) }}" title="Traffic Jams Solved">{{ $masjid->nama_masjid }}</a></h3>
					</div>
				</div>
			@endforeach
			</div>
		</div>
	
	
		
		</div><!-- Row /- -->

		{{ $masjids->links() }}

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
	
	<!-- Related Post /- -->
	
</div> @endsection