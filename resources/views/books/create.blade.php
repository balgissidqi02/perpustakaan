@extends('templates.default')

@php
    $title = 'Data Buku';
    $preTitle = 'Tambah Data Buku';
@endphp

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('books.store')}}" class="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nama Penulis</label>
                <select type="text" name="penulis_id" id="" class="form-control"> 
                @foreach ($names as $name)

                <option value="{{ $name->id}}">{{$name->name}}</option>
                @endforeach
                </select>

                @error('penulis_id')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>




              <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" name="judul" class="form-control @error('judul')  
                is-invalid
                
                @enderror" name="example-text-input" placeholder="Tulis Judul Buku" value="{{ old('judul') }}">
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
                
                @enderror" name="example-text-input" placeholder="Masukkan Tahun Terbit Buku" value="{{ old('tahun') }}">
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