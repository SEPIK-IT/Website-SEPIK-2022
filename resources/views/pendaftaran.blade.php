@extends('layouts.datatable')

@section('judul')
  <title>Pendaftaran</title>

  <style>
      body {
          background-color: blanchedalmond;
          background-image: url('bgwebsite.png');
          background-size: cover;
      }
      .style {
        border-radius: 10px; 
        background: rgba(255, 255, 255, 0.3)
      }
  </style>
@endsection

@section('isi')
<div class="container">
    <div class="mt-5">
        <h2 class="text-center">List Pendaftar</h2>
    </div>
    <div class="row style mt-5">
        <div class="col-12 p-3 table-responsive">
            <table class="table table-hover" id = "example">
                <thead class = "text-center">
                    <th>#</th>
                    <th>Nama</th>
                    <th>Email</th>
                </thead>
                <tbody class = "text-center">
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $item['id'] }} </td>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['email'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('datatable')
<script>
$('#example').DataTable( {
    searching: true,
    show: true,
    lengthChange: true,
    paging: true,
    ordering: true,
} );
</script>
@endsection