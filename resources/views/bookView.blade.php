<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
</head>
<body class="container">
    <h1>Daftar Buku</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Number</th>
                <th>ID</th>
                <th>Book's Title</th>
                <th>Creator</th>
                <th>Price</th>
                <th>Publication Date</th>
                <th>Update</th>
                <th>Hapus</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_book as $index => $book)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    {{-- <td>{{ $index+1 }}</td> --}}
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->creator }}</td>
                    <td>{{"Rp. ".number_format($book->price, 2, ',', '.') }}</td>
                    <td>{{ \Carbon\Carbon::parse($book->publication_date)->format('d-m-Y') }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('buku.edit', $book->id) }}">Update</a>
                    </td>
                    <td>
                        <form action="{{ route('buku.destroy', $book->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('yakin mau hapus?')" type="submit" class="btn btn-danger">Hapus</button>
                        </form>                           
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('buku.create') }}" class="btn btn-primary">Tambah Buku</a>

    <h3>Jumlah Buku : {{ $jumlahBuku }}</h3>
    <h3>Total Harga : {{"Rp. ".number_format($totalPrice, 2, ',', '.') }}</h3>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>