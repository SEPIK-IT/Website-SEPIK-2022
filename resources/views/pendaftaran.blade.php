<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "style.css">
    <title>Pendaftaran</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Password</th>
            </tr>
        </thead>
        <tbody>
           @foreach($pendaftar as $key => $data)
                <tr>
                    <td>{{ $data-> name }}</td>
                    <td>{{ $data-> email }}</td>
                    <td>{{ $data-> password }}</td>
                </tr>
           @endforeach
        </tbody>
    </table>
</body>
</html>