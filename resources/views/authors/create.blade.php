@extends('templates.default')

@php
    $title = 'Data Author';
    $preTitle = 'Tambah Data Author';
@endphp

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('authors.store')}}" class="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="name" class="form-control @error('name')  
                is-invalid
                
                @enderror"  placeholder="Masukkan Nama Anda" value="{{ old('name') }}">
                @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>




              <div class="mb-3">
                <label class="form-label">Foto</label>
                <input type="file" name="photo" 
                    class="form-control 
                    @error('photo')  
                        is-invalid
                
                @enderror" 
                 placeholder="Masukkan Foto Anda" value="{{ old('photo') }}">
                @error('photo')
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