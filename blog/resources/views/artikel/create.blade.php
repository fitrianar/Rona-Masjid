
@extends('layouts.app');


@section('content')


<div class="card uper">


  <div class="card-body">

      <form method="post" action="{{ route('article.store') }}" enctype="multipart/form-data">
      @csrf


          <div class="form-group">
              <label for="">Judul  :</label>
              <input type="text" class="form-control" name="judul"/>
          </div>

          <div class="form-group">
              <label for="">Upload Berkas  :</label>
              <input id="minute_length"  class="form-control" type="file" name="gambar" required="">
          </div>

          
          <div class="form-group">

              <label for="">Isi :</label>
            <textarea class="form-control" name="isi" id="article-ckeditor">
              </textarea>

          </div>

          <div class="form-group">

            <label for="price">Kategori :</label>

            <input type="text" class="form-control" name="kategori"/>

        </div>
<!-- 
        <input type="text" name="like" value="0">
        <input type="text" name="comment" value="0"> -->

          <button type="submit" class="btn btn-primary">Add</button>

      </form>

  </div>

</div>

@endsection
@section('js')
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
    @append