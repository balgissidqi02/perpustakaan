<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index() 
    {
        return view('books.index', [
            'books' => Book::get(),
        ]);
    }

    public function create() 
    {
        return view('books.create', [
            'names' => Author::get(),
        ]);
    }

    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'penulis_id' => ['required', 'numeric'],
        //     'judul' => ['required', 'min:3'],
        //     'cover' => ['image'],
        //     'tahun' => ['required', 'numeric']
        // ]);

        // $cover = null;

        if ($request->hasFile('cover')) {
            $cover = $request->file('cover')->store('photos');
        }
        $book = new Book();

        $book->penulis_id = $request->penulis_id;
        $book->judul = $request->judul;
        $book->cover = $cover;
        $book->tahun = $request->tahun;

        $book->save();

        session()->flash('success', 'Data Berhasil Ditambahkan.');

        return redirect()->route('books.index');
    }

    public function edit($id) 
    {

        
        $book = Book::find($id);
        return view('books.edit', [
            'book' => $book,
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'penulis_id' => ['required', 'numeric'],
            'judul' => ['required', 'min:3'],
            'cover' => ['image'],
            'tahun' => ['required', 'numeric']
        ]);
        $book = Book::find($id);

        if ($request->hasFile('cover')) {
            // if (Storage::exists($book->cover)) {

            // }
            $cover = $request->file('cover')->store('photos');
        }

        $book->penulis_id = $request->penulis_id;
        $book->judul = $request->judul;
        $book->cover = $cover;
        $book->tahun = $request->tahun;

        $book->save();

        session()->flash('info', 'Data Berhasil Diperbarui.');

        return redirect()->route('books.index');
    }

    public function destroy($id)
    {
        $book = Book::find($id);

        $book->delete();

        session()->flash('danger', 'Data Berhasil Dihapus.');

        return redirect()->route('books.index');
    }
}
