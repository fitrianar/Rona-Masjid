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
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $jmlPengurus }}</h3>

                <p>Jumlah Pengurus</p>
              </div>
              <div class="icon">
                <i class= "fas fa-user-cog"></i>
              </div>
              <a href="{{ route('pengurus.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $jmlMember }}</h3>

                <p>Jumlah Member</p>
              </div>
              <div class="icon">
                <i class= "fas fa-user-tag"></i>
              </div>
              <a href="{{ route('member.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $jmlMasjid }}</h3>

                <p>Jumlah Masjid</p>
              </div>
              <div class="icon">
                <i class="fas fa-mosque"></i>
              </div>
              <a href="{{ route('masjid.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
@endsection