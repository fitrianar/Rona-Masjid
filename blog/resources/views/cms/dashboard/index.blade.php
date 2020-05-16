@extends('layouts.app')
@section('title', 'Dashboard')
@section('title-content', 'Dashboard')
@section('footer-content')

@section('content')
<!-- Contentnya nanti fitri fokus disini. saya coba mau buat table disini -->
<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $jmlArtikel }}</h3>

                <p>Jumlah Artikel</p>
              </div>
              <div class="icon">
                <i class="fas fa-edit"></i>
              </div>
              <a href="{{ route('article.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $jmlKegiatan }}</h3>

                <p>Jumlah Kegiatan</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="{{ route('kegiatan.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-sm-12">
            <h3 class="m-0 text-dark"> Kegiatan Terdekat</small></h3>
            <hr>
          </div>
          <!-- ./col -->
          @forelse($kegiatan as $kgtn)
            <div class="col-lg-6 col-6">
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h5 class="card-title m-0">
                    <div class="row">
                        <div>{{ $kgtn->tgl_dilaksanakan }} </div>
               
                        <div style="margin-left:20px;"> {{ $kgtn->jam_dimulai .' s/d '. $kgtn->jam_akhir }}</div>
                    </div>
                  </h5>
                </div>
                <div class="card-body row">
                  <div class="col-8">
                    <h4 class="card-title"><b>{{ $kgtn->nama }}</b></h4>

                    <p class="card-text">
                    @if(strlen($kgtn->deskripsi_kegiatan) > 200)
                    {!! substr($kgtn->deskripsi_kegiatan, 0, 200) . '...' !!}</td>
                    @else
                    {!! $kgtn->deskripsi_kegiatan !!}
                    @endif
                    </p>
                  </div>
                  <div class="col-4">
                    <img src="{{asset($kgtn->poster)}}" width="200">
                  </div>
                  <a href="{{ route('public-detail-kegiatan', $kgtn->id) }}" class="btn btn-primary">Detail</a>
                </div>
              </div>
            </div>
          @empty
          <h5>data tidak ada</h5>
          @endforelse

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
@endsection