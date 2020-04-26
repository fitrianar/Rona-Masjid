@extends('layouts.public.app')
@section('title', 'Detail Masjid | '. $appName)

@section('content')


<div class="col-xl-8 col-lg-8 col-md-8 col-8 content-area text-center " >
	
<table class="table">
  <thead>
    <tr>
      <th scope="col">Nama Masjid</th>
	  <td>{{ $masjid->nama_masjid }}</td>
    </tr>
    <tr>
      <th scope="col">Alamat</th>
	  <td>{{ $masjid->alamat_masjid }}</td>
    </tr>
    <tr>
      <th scope="col">Luas Tanah</th>
	  <td>{{ $masjid->l_tanah }}</td>
    </tr>
	<tr>
      <th scope="col">Panjang Tanah</th>
	  <td>{{ $masjid->p_tanah }}</td>
    </tr>
	<tr>
      <th scope="col">Luas Bangunan</th>
	  <td>{{ $masjid->luas_bangunan }}</td>
    </tr>
	<tr>
      <th scope="col">Lampiran</th>
	  <td>{{ $masjid->lampiran_masjid }}</td>
    </tr>
	<tr>
      <th scope="col">Status Masjid</th>
	  <td>{{ $masjid->status_masjid }}</td>
    </tr>
	<tr>
      <th scope="col">Deskripsi</th>
	  <td>{{ $masjid->deskripsi }}</td>
    </tr>
  
  </tbody>
</table>
</div>

<div class="col-xl-4 col-lg-4 col-md-4 col-4 content-area text-center">
	<img src="{{ asset($masjid->gambar) }}"> 
</div>

<div  class="col-xl-8 col-lg-8 col-md-8 col-8 content-area text-center ">
@if(count($masjid->fasilitas) > 0)
	<!-- Related Post -->
	<div class="related-post">
		<h3>Daftar Fasilitas </h3>
		<div class="related-post-block">
		@forelse($masjid->fasilitas as $fasilitas)
			<div class="related-post-box">
				<a href="#"><img src="{{ asset($fasilitas->foto) }}" alt="Post" /></a>
				<span><a href="#" title="Travel">{{ $fasilitas->nama }}</a></span>
				<h3><a href="#" title="Traffic Jams Solved">{{ $fasilitas->jenis_fasilitas }}</a></h3>
			</div>
		@empty
			<div class="related-post-box"><i>Fasilitas Kosong</i></div>
		@endforelse
		</div>
	</div><!-- Related Post /- -->
	@endif
</div>


<div class="col-xl-4 col-lg-4 col-md-4 col-4 content-area text-center">
@if(count($masjid->kegiatan) > 0)
	<aside class="widget widget_latestposts">
		<h3 class="widget-title">Kegiatan Terdekat</h3>
		@foreach($masjid->kegiatan as $kegiatan)
		<div class="latest-content">
			<a href="#" title="Recent Posts"><i><img src="{{ asset($kegiatan->poster) }}" width="100" height="80" class="wp-psost-image" height="100px" weight="100px" alt="blog-1" /></i></a>
			<h5><a title="Beautiful Landscape View of Rio de Janeiro" href="#">{{ $kegiatan->nama}}</a></h5>
			<span><a href="#">Tgl Pelaksanaan {{ $kegiatan->tgl_dilaksanakan }}</a></span>
		</div>
		@endforeach						
	</aside>
	@endif
</div>

<div  class="col-xl-8 col-lg-8 col-md-8 col-8 content-area text-center ">
@if(count($masjid->users) > 0)
	<!-- Related Post -->
	<div class="related-post">
		<h3>Daftar Pengurus </h3>
		<div class="related-post-block">
		@forelse($masjid->users as $user)
			<div class="related-post-box">
				<a href="#"><img src="{{ asset($user->gambar) }}" alt="Post" /></a>
				<span><a href="#" title="Travel">{{ $user->nama }}</a></span>
				<h3><a href="#" title="Traffic Jams Solved">{{ $user->email }}</a></h3>
			</div>
		@empty
			<div class="related-post-box"><i> Kosong</i></div>
		@endforelse
		</div>
	</div><!-- Related Post /- -->
	@endif
</div>

						<!-- Content Area /- -->
 @endsection