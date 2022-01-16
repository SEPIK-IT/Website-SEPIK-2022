@extends('layouts.datatable')

@section('judul')
  <title>Pendaftaran</title>

  <style>
      body {
          background-color: blanchedalmond;
          background-image: url('sepik-mlaku-mlaku.gif');
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
    <div class="row style mt-5">
        <div class="col-12 p-3 table-responsive">
            <table class="table table-hover" id = "example">
                <thead class = "text-center">
                    <th>#</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Password</th>
                </thead>
                <tbody class = "text-center">
                    <tr>
                        <td>1</td>
                        <td>Steven</td>
                        <td>@gmail.com</td>
                        <td>12345678</td>
                    </tr>
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