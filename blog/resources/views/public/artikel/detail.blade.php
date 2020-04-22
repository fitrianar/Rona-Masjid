@extends('layouts.public.app')
@section('title', 'Daftar Artikel | '. $appName)

@section('content')
<div class="entry-cover text-center" style=" margin: auto;">
	<center>
	<img src="{{ asset($artikel->gambar) }}" alt="Post" width="1000"  />
	</center>
</div>
<!-- Content Area -->
<div class="col-xl-12 col-lg-12 col-md-12 col-12 content-area text-center " >
	<article class="type-post">
		<div class="entry-content" >
			<div class="entry-header  text-center"  style=" margin: auto;">	
				<span class="post-category">
					@forelse($kategori as $ktgr)
						<a href="#" title="{{ $ktgr->nama }}">{{ $ktgr->nama }}, </a>
					@empty
					@endforelse
				</span>
				<h3 class="entry-title">{{ $artikel->judul }}</h3>
				<div class="post-meta">
					<span class="byline">Oleh {{ $artikel->nama }} </span>
					<span class="post-date">{{ $artikel->created_at}}</span>
				</div>
			</div>								
			{!! $artikel->isi !!}
		</div>
	</article>
	<!-- Comment Area -->
</div>
						<!-- Content Area /- -->
 @endsection