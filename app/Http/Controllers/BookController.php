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
        $data_book = book::all()->sortByDesc('id');
        // $data_book = book::all();
        $jumlahBuku = book::count();
        $totalPrice = book::sum('price');
        return view('bookView', compact('data_book', 'jumlahBuku', 'totalPrice'));

    }

    public function create()
    {
        return view('buku.create');
    }

    public function store(Request $request) {
        $book = new book();
        $book->title = $request->title;
        $book->creator = $request->creator;
        $book->price = $request->price;
        $book->publication_date = $request->publication_date;
        $book->save();

        return redirect('/buku');
    }

    public function destroy($id){
        $book = Book::find($id);
        $book->delete();

        return redirect('/buku');
    }

    public function edit($id){
        $book = Book::find($id);
        return view('buku.edit', compact('book'));
    }
    
    public function update(Request $request, $id){
        $book = Book::find($id);

        $book->title = $request->title;
        
        $book->creator = $request->creator;
        $book->price = $request->price;
        $book->publication_date = $request->publication_date;
        $book->save();

        return redirect('/buku');
    }

}
