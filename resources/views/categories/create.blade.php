@extends('layouts.global')

@section('title') Create Category @endsection

@section('content')
    <div class="col-md-6">
        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data"
            class="bg-white shadow-sm p-3">
            @csrf

            <label>Category name</label>
            <input type="text" name="name" class="form-control {{ $errors->first('name') ? 'is-invalid' : '' }}"
                value="{{ old('name') }}">
            <div class="invalid-feedback">
                {{ $errors->first('name') }}
            </div>
            <br>

            <label>Category image</label>
            <input type="file" name="image" class="form-control {{ $errors->first('image') ? 'is-invalid' : '' }}">
            <div class="invalid-feedback">
                {{ $errors->first('image') }}
            </div>
            <br>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
