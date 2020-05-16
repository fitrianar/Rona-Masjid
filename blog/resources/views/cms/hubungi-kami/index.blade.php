@extends('layouts.app')
@section('title', 'Hubungi Kami | '.$appName)
@section('title-content', 'Data Hubungi Kami')
@section('footer-content', '-')

@section('content')

<table id="appTable" class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Email</th>
      <th scope="col">Subjek</th>
      <th scope="col">Pesan</th>
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
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script>
 $('#appTable').DataTable({
       // responsive:true,
        processing:true,
        serverSide:true,
        ajax: "{{ url()->current().'/datatables' }}",
        columns:[
            {data: 'DT_RowIndex', name:'name', searchable: false},
             {data: 'name', name:'name'},
             {data: 'email', name:'email'},
             {data: 'subjek', name:'subjek'},
             {data: 'pesan', name:'pesan'},     
             {data: 'action', name:'action'},        
        ]
    });
</script>
@endpush



@endsection


