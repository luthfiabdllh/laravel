<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div>
        <h4>Tambah Buku</h4>
        <form action="{{ route('buku.store') }}" method="POST">
            @csrf
            <div>
                <label for="title" class="form-label">Title</label> 
                <input type="text" name="title">
            </div>
            <div>
                <label for="creator" class="form-label">Creator</label> 
                <input type="text" name="creator">
            </div>
            <div>
                <label for="price" class="form-label">Price</label> 
                <input type="text" name="price">
            </div>
            <div>
                <label for="publication_date" class="form-label">Publication Date</label>
                <input type="date" name="publication_date">
            </div>
            <button type="submit">Simpan</button>
            <a href="{{ '/buku' }}">Kembali</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>