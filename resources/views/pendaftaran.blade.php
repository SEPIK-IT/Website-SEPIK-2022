@extends('layouts.datatable')

@section('judul')
  <title>Pendaftaran</title>
@endsection

@section('isi')
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
@endsection