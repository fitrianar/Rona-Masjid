@extends('layouts.app')
@section('title', 'Artikel')
@section('title-content', 'Data Artikel')
@section('footer-content', '-')

@section('content')

<table id="appTable" class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Judul</th>
      <th scope="col">Gambar</th>
      <th scope="col">Isi</th>
      <!-- <th scope="col">Jml Like</th> -->
      <th scope="col">Kategori</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>


  </tbody>
</table>
<br>

<div class="text-right">

</div>
@push('css')
<!-- datatables -->
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css'>
<link rel='stylesheet' href='https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css'>
@endpush

@push('script')
<!-- Datatables -->
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script>
 $('#appTable').DataTable({
        //responsive:true,
        processing:true,
        serverSide:true,
        ajax: "{{ route('article.datatables') }}",
        columns:[
            {data: 'DT_RowIndex', name:'created_at', searchable: false},
            {data: 'judul', name:'judul'},
            {data: 'gambar', name:'gambar'},
            {data: 'isi', name:'isi'},
            {data: 'kategori', name:'kategori'},
            {data: 'created_at', name:'created_at'},
            {data: 'action', name:'action'},              
        ],
        order: [
          6, 'desc'
      ]
    });
</script>
@endpush 

@endsection


