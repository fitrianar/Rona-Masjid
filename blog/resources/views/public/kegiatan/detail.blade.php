@extends('layouts.public.app')
@section('title', 'Detail Kegiatan | '. $appName)

@section('content')
<div class="entry-cover text-center" style=" margin: auto;">
	<center>
	<img src="{{ asset($kegiatan->poster) }}" alt="Post" width="1000"  />
	</center>
</div>
<!-- Content Area -->
<div class="col-xl-12 col-lg-12 col-md-12 col-12 content-area text-center " >
	<article class="type-post">
		<div class="entry-content" >
			<div class="entry-header  text-center"  style=" margin: auto;">	
				<span class="post-category">
				</span>
				<h3 class="entry-title">{{ $kegiatan->judul }}</h3>
				<div class="post-meta">
					<span class="byline">Oleh {{ $kegiatan->nama }} </span>
					<span class="post-date">{{ $kegiatan->created_at}}</span>
				</div>
			</div>
			<div class="text-left">								
			{!! $kegiatan->deskripsi_kegiatan !!}
			</div>
		</div>
	</article>
	<!-- Comment Area -->
</div>
						<!-- Content Area /- -->
 @endsection