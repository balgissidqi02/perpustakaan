<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index() 
    {
        return view('authors.index', [
            'authors' => Author::get(),
        ]);
    }

    public function create() 
    {
        return view('authors.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'min:3'],
            'photo' => ['image']
           
        ]);

        $photo = null;

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo')->store('photos');
        }

        $author = new Author();

        $author->name = $request->name;
        $author->photo = $photo;

        $author->save();

        session()->flash('success', 'Data Berhasil Ditambahkan.');

        return redirect()->route('authors.index');
    }

    public function edit($id) 
    {

        
        $author = Author::find($id);
        return view('authors.edit', [
            'author' => $author,
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required', 'min:3'],
            'photo' => ['image']
           
        ]);

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo')->store('photos');
        }


       
        $author = Author::find($id);

        $author->name = $request->name;
        $author->photo = $photo;

        $author->save();

        session()->flash('info', 'Data Berhasil Diperbarui.');

        return redirect()->route('authors.index');
    }

    public function destroy($id)
    {
        $author = Author::find($id);

        $author->delete();

        session()->flash('danger', 'Data Berhasil Dihapus.');

        return redirect()->route('authors.index');
    }
}
