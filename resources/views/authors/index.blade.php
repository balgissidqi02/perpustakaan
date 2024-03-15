@extends('templates.default')

@php
    $title = 'Data Penulis';
    $preTitle = 'Semua Data';
@endphp

@push('page-action')
    <a href="{{ route('authors.create')}}" class="btn btn-primary">Tambah Data</a>
@endpush

@section('content')
<div class="card">
    <div class="table-responsive">
      <table class="table table-vcenter card-table">
        <thead>
          <tr>
            <th>Nama Penulis</th>
            <th>Foto</th>
            
            <th class="w-1"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($authors as $author)
            <tr>
                <td>{{ $author->name }}</td>
                <td><img src="{{ asset('storage/' . $author->photo) }}" height="158px"></td>
                <td>
                  <a href="{{route('authors.edit', $author->id)}}" 
                    class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('authors.destroy', $author->id) }}" method="post" >
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
            
            
                
                
           
          