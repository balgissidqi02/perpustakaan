@extends('templates.default')

@php
    $title = 'Data Buku';
    $preTitle = 'Edit Data Buku';
@endphp

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('books.update', $book->id) }}" class="" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">id_Penulis</label>
                <input type="text" name="penulis_id" class="form-control @error('penulis_id')  
                is-invalid
                
                @enderror" name="example-text-input" 
                placeholder="Masukkan id Penulis" value="{{ old('penulis_id') ?? $book->penulis_id }}">
                @error('penulis_id')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
              </div>




              <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" name="judul" class="form-control @error('judul')  
                is-invalid
                
                @enderror" name="example-text-input" 
                placeholder="Tulis Judul Buku" value="{{ old('judul') ?? $book->judul }}">
                @error('judul')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
              </div>




              <div class="mb-3">
                <label class="form-label">Sampul</label>
                <input type="file" name="cover" 
                    class="form-control 
                    @error('cover')  
                        is-invalid
                
                @enderror" 
                 placeholder="Masukkan Foto Anda" value="{{ old('cover') }}">
                @error('cover')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>



              <div class="mb-3">
                <label class="form-label">Tahun</label>
                <input type="text" name="tahun" class="form-control @error('tahun')  
                is-invalid
                
                @enderror" name="example-text-input" 
                placeholder="Masukkan tahun terbit buku" value="{{ old('tahun') ?? $book->tahun }}">
                @error('tahun')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
              </div>

              <div class="mb-3">
                <input type="submit" value="Simpan" class="btn btn-primary">
              </div>
        </form>
    </div>
</div>
    
@endsection