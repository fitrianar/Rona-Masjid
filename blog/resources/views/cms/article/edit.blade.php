
@extends('layouts.app')
@section('title', 'Ubah Artikel')
@section('title-content', 'Ubah Artikel')
@section('footer-content')

@section('content')
<form action="{{ route('article.update', $article->id) }}" method="post"  enctype="multipart/form-data">
@csrf

<div class="form-group ">
        <label for="parent_id">Judul </label>
        <input type="text" class="form-control {{ $errors->has('judul') ? 'is-invalid' : '' }}" value="{{ $article->judul }}" name="judul" required>
        @if ($errors->has('judul'))
            <div class="text-danger">
            <p>{{ $errors->first('judul')}}</p>
            </div>
        @endif
    </div>

    <div class="form-group ">
        <label for="name">Upload Gambar</label><br>
        <img src="{{ asset($article->gambar) }}" height="100px">
        <input id="minute_length"  class="form-control {{ $errors->has('file') ? 'is-invalid' : '' }}" value="{{ $article->file }}" type="file" name="file" >
        @if ($errors->has('file'))
            <div class="text-danger">
            <p>{{ $errors->first('file')}}</p>
            </div>
        @endif
    </div>

    <div class="form-group ">
        <label for="name">Isi</label>
        <textarea class="form-control {{ $errors->has('isi') ? 'is-invalid' : '' }}" name="isi" id="textarea-ckeditor">{{ $article->isi }}</textarea>
        @if ($errors->has('isi'))
            <div class="text-danger">
            <p>{{ $errors->first('isi')}}</p>
            </div>
        @endif
    </div>

    <div class="form-group ">
        <label for="name">Kategori</label>
        <input type="hidden" id="kategori_id" value="{{ $allKategoriId }}">
        <select id="kategori" class="form-control" multiple="multiple" name="kategori[]">
            @forelse($kategori as $item)
                <option value="{{ $item->id }}">{{ $item->nama }}</option>        
            @empty
            @endforelse
        </select>
    </div>

    <!-- 
        <input type="text" name="like" value="0">
        <input type="text" name="comment" value="0"> -->

        <button type="submit" class="btn btn-primary">Ubah</button>

</form>
@endsection

@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" /> 
@endpush

@push('script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>


<script type="text/javascript">     
  $('#kategori').select2({
      placeholder: 'Pilih Beberapa Kategori'
  });

  $(function(){
    var kategori = $('#kategori_id').val();
    var arrKategori = kategori.split(",");

    $("#kategori").select2().val(arrKategori).trigger('change.select2');
  });


</script>
@endpush