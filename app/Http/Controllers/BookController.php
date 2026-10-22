<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
{
    \Log::info('MASUK BOOKS INDEX');

    $books = Book::latest()->paginate(10);

    return inertia('Books/Index', [
        'books' => $books,
    ]);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return inertia('Books/Create');
}

public function store(Request $request)
{
    $validated = $request->validate([
        'kode_buku' => 'required|unique:books',
        'judul'     => 'required|max:255',
        'pengarang' => 'required|max:255',
        'penerbit'  => 'nullable|max:255',
        'tahun'     => 'nullable|digits:4',
        'stok'      => 'required|integer|min:0',
    ]);

    Book::create($validated);

    return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
