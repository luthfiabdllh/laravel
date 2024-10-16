@extends('layout.layoutwebsite')

@section('content')
    @if(count($data_book))
        <div class="alert alert-success mt-5 container">
            Ditemukan <span class="fw-bold">{{ count($data_book) }}</span> data dengan kata: <span class="fw-bold">{{ $cari }}</span>
        </div>
        <div class="mt-5 container">
            <h1>Daftar Buku</h1>

            @if(Session::has('created'))
                <div class="modal fade" id="createdModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Notification</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>{{ Session::get('created') }}</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if(Session::has('updated'))
                <div class="modal fade" id="createdModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Notification</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>{{ Session::get('updated') }}</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if(Session::has('deleted'))
                <div class="modal fade" id="createdModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Notification</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>{{ Session::get('deleted') }}</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="d-flex justify-content-between mb-3">
                <div>
                    <a href="{{ route('buku.create') }}" class="btn btn-primary">Tambah Buku</a>
                </div>
                <div>
                    <form action="{{ route('buku.search') }}">
                        <div class="input-group">
                            <input type="text" name="kata" class="form-control" placeholder="Cari...." aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                        </div>
                    </form>
                </div>
            </div>
            <table class="table table-light table-striped align-middle text-center">
                <thead>
                    <tr class="table-primary">
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
                            <td>{{ $no++ }}</td>
                            <td>{{ $book->id }}</td>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->creator }}</td>
                            <td>{{ "Rp. " . number_format($book->price, 2, ',', '.') }}</td>
                            <td>{{ \Carbon\Carbon::parse($book->publication_date)->format('d-m-Y') }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('buku.edit', $book->id) }}">Update</a>
                            </td>
                            <td class="align-middle">
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

            <div class="d-flex">
                <h6 class="mx-3">Jumlah Buku : {{ $jumlahBuku }}</h6>
                <h6>Total Harga : {{"Rp. " . number_format($totalPrice, 2, ',', '.') }}</h6>
            </div>

            <div>{{ $data_book->links() }}</div>
    </div>
@else
<div class="container mt-5">
    <div class="alert alert-warning">
        Data <span class="fw-bold">{{ $cari }}</span> tidak ditemukan
    </div>
    <a href="{{ route('buku.search') }}" class="btn btn-warning">Kembali</a>
</div>
@endif
@endsection
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var createdModal = new bootstrap.Modal(document.getElementById('createdModal'));
        createdModal.show();
    });
</script>

