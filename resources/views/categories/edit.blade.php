@extends('layouts.global')

@section('title') Edit Category @endsection

@section('content')

    <div class="col-md-8">
        <form action="{{ route('categories.update', [$category->id]) }}" enctype="multipart/form-data" method="POST"
            class="bg-white shadow-sm p-3">
            @csrf

            <input type="hidden" name="_method" value="PUT">

            <label>Category name</label>
            <br>
            <input type="text" name="name" class="form-control {{ $errors->first('name') ? 'is-invalid' : '' }}"
                value="{{ old('name') ? old('name') : $category->name }}">
            <div class="invalid-feedback">
                {{ $errors->first('name') }}
            </div>
            <br><br>

            <label>Category slug</label><br>
            <input type="text" name="slug" class="form-control {{ $errors->first('slug') ? 'is-invalid' : '' }}"
                value="{{ old('slug') ? old('slug') : $category->slug }}">
            <div class="invalid-feedback">
                {{ $errors->first('slug') }}
            </div>
            <br><br>

            @if ($category->image)
                <span>Current image</span><br>
                <img src="{{ asset('storage/' . $category->image) }}" width="120px">
                <br><br>
            @endif
            <input type="file" name="image" class="form-control {{ $errors->first('image') ? 'is-invalid' : '' }}">
            <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
            <div class="invalid-feedback">
                {{ $errors->first('image') }}
            </div>
            <br><br>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

@endsection
