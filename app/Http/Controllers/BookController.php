<?php

namespace App\Http\Controllers;

use App\Models\book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $jumlahBuku = book::count();
        $totalPrice = book::sum('price');
        $batas = 10;
        $data_book = book::orderBy('title', 'asc')->paginate($batas);
        $no = ($data_book->currentPage() - 1) * $batas + 1;
        return view('perpustakaan', compact('data_book', 'jumlahBuku', 'totalPrice', 'no'));
    }

    public function search(Request $request)
    {
        $jumlahBuku = book::count();
        $totalPrice = book::sum('price');
        $batas = 10;
        $cari = $request->kata;
        $data_book = book::where('title', 'like', "%".$cari."%")->orwhere('creator', 'like', "%".$cari."%")->paginate($batas);
        $no = ($data_book->currentPage() - 1) * $batas + 1;
        return view('search', compact('data_book', 'jumlahBuku', 'totalPrice', 'no', 'cari'));
    }

    public function create()
    {
        return view('buku.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'creator' => 'required|string|max:30',
            'price' => 'required|numeric',
            'publication_date' => 'required|date'
        ]);

        $book = new Book();
        $book->title = $request->title;
        $book->creator = $request->creator;
        $book->price = $request->price;
        $book->publication_date = $request->publication_date;
        $book->save();

        return redirect('/perpustakaan')->with('created', 'Data buku berhasil dibuat');
    }


    public function destroy($id){
        $book = Book::find($id);
        $book->delete();

        return redirect('/perpustakaan')->with('deleted', 'Data buku berhasil dihapus');
    }

    public function edit($id){
        $book = Book::find($id);
        return view('buku.edit', compact('book'));
    }

    public function update(Request $request, $id){
        $book = Book::find($id);

        $request->validate([
            'title' => 'required|string',
            'creator' => 'required|string|max:30',
            'price' => 'required|numeric',
            'publication_date' => 'required|date'
        ]);

        $book->title = $request->title;
        $book->creator = $request->creator;
        $book->price = $request->price;
        $book->publication_date = $request->publication_date;
        $book->save();

        return redirect('/perpustakaan')->with('updated', 'Data buku berhasil diperbarui');
    }

}
