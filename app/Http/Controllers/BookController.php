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
}
