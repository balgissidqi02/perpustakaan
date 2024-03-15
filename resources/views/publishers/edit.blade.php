@extends('templates.default')

@php
    $title = 'Data Penerbit';
    $preTitle = 'Edit Data Penerbit';
@endphp

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('publishers.update', $publisher->id) }}" class="" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="name" class="form-control @error('name')  
                is-invalid
                
                @enderror" name="example-text-input" placeholder="Masukkan Nama Anda" value="{{ old('name') ?? $publisher->name }}">
                @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="mb-3">
                <label class="form-label">Alamat</label>
                <input type="text" name="address" class="form-control @error('address')  
                is-invalid
                
                @enderror" name="example-text-input" placeholder="Tulis Alamat Lengkap Anda" value="{{ old('address') ?? $publisher->address }}">
                @error('address')
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