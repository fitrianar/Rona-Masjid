
@extends('layouts.app')
@section('title', 'Tambah Artikel')
@section('title-content', 'Ini Tambah Artikel')
@section('footer-content')

@section('content')
<form action="{{ route('article.store') }}" method="post"  enctype="multipart/form-data">
@csrf

<div class="form-group ">
        <label for="parent_id">Judul </label>
        <input type="text" class="form-control {{ $errors->has('judul') ? 'is-invalid' : '' }}" name="judul" value="{{ old('judul') }}" required>
        @if ($errors->has( 'judul'))
            <div class="text-danger">
            <p>{{ $errors->first('judul')}}</p>
            </div>
        @endif
    </div>

    <div class="form-group ">
        <label for="name">Upload Berkas</label>
        <input id="minute_length"  class="form-control {{ $errors->has('file') ? 'is-invalid' : '' }}" type="file" name="file" value="{{ old('file') }}" required="">
        @if ($errors->has( 'file'))
            <div class="text-danger">
            <p>{{ $errors->first('file')}}</p>
            </div>
        @endif
    </div>

    <div class="form-group ">
        <label for="name">Isi</label>
        <textarea class="form-control" name="isi" value="{{ old('isi') }}"  id="article-ckeditor"></textarea>
        @if ($errors->has( 'isi'))
            <div class="text-danger">
            <p>{{ $errors->first('isi')}}</p>
            </div>
        @endif
    </div>

    <div class="form-group ">
        <label for="name">Kategori</label>
        <select id="kategori" class="form-control" multiple="multiple" name="kategori[]" required>
            @forelse($kategori as $item)
                <option value="{{ $item->id }}">{{ $item->nama }}</option>        
            @empty
            @endforelse
        </select>    
    </div>

    <!-- 
        <input type="text" name="like" value="0">
        <input type="text" name="comment" value="0"> -->

        <button type="submit" class="btn btn-primary">Add</button>

</form>
@endsection

@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" /> 
@endpush

@push('script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<script type="text/javascript"> 

  $(document).ready(function () {
      $('#kategori').select2({
          ajax: {
              url: "{{  route('kategori-fetch')  }}",
              data: function (params) {
                  return {
                      search: params.term,
                      page: params.page || 1
                  };
              },
              dataType: 'json',
              processResults: function (data) {
                  data.page = data.page || 1;
                  return {
                      results: data.items.map(function (item) {
                          return {
                              id: item.id,
                              text: item.nama
                          };
                      }),
                      pagination: {
                          more: data.pagination
                      }
                  }
              },
              cache: true,
              delay: 250
          },
          placeholder: 'input Kategori',
          minimumInputLength: 2,
          multiple: true
      });            
  });  

</script>
@endpush