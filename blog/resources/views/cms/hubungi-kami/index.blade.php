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
      <!-- <th scope="col">Aksi</th> -->
    </tr>
  </thead>
  <tbody>


  </tbody>
</table>
<br>

<div class="text-right">

</div>


@endsection
@push('scripts')
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script>
 $('#appTable').DataTable({
        responsive:true,
        processing:true,
        serverSide:true,
        ajax: "{{ url()->current().'/datatables' }}",
        columns:[
            // {data: 'DT_RowIndex', name:'created_at', searchable: false},
            //  {data: 'verification', name:'verification'},
            //  {data: 'kode_pembayaran', name:'kode_pembayaran'},
            //  {data: 'nama', name:'nama'},
            //  {data: 'email', name:'email'},
            //  {data: 'no_telpon', name:'no_telpon'},
            //  {data: 'kartu_identitas', name:'kartu_identitas'},
            //  {data: 'id_identitas', name:'id_identitas'},
            //  {data: 'nama_perusahaan', name:'nama_perusahaan'},
            //  {data: 'bukti_pembayaran', name:'bukti_pembayaran'},
            //  {data: 'member_type', name:'member_type'},
            //  {data: 'status', name:'status'},            
             {data: 'name', name:'name'},                 
             {data: 'namea', name:'name'},                 
             {data: 'name', name:'name'},                 
             {data: 'name', name:'name'},                 
        ]
    });
</script>
@endpush


