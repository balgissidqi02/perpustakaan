@extends('templates.default')

@php
    $title = 'Data Buku';
    $preTitle = 'Semua Data';
@endphp

@push('page-action')
    <a href="{{ route('books.create')}}" class="btn btn-primary">Tambah Data</a>
@endpush

@section('content')
<div class="card">
    <div class="table-responsive">
      <table class="table table-vcenter card-table">
        <thead>
          <tr>
            <th>Penulis_id</th>
            <th>Judul Buku</th>
            <th>Cover</th>
            <th>Tahun Terbit</th>
            
            <th class="w-1"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
            <tr>
                <td>{{ $book->penulis_id->name }}</td>
                <td>{{ $book->judul }}</td>
                <td><img src="{{ asset('storage/' . $book->cover) }}" height="158px"></td>
                <td>{{ $book->tahun }}</td>
                <td>
                  <a href="{{route('books.edit', $book->id)}}" 
                    class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('books.destroy', $book->id) }}" method="post" >
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Hapus" class="btn btn-danger btn-sm">
                  </form>
                </td>
              </tr>
             
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
            
            
                
                
           
          