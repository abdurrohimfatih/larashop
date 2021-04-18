@extends('layouts.global')

@section('footer-scripts')
    <link rel="stylesheet" href="{{ asset('public/select2/css/select2.min.css') }}" />
    <script src="{{ asset('public/jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('public/select2/js/select2.min.js') }}"></script>

    <script>
        $('#categories').select2({
            ajax: {
                url: '../ajax/categories/search',
                processResults: function(data) {
                    return {
                        results: data.map(function(item) {
                            return {
                                id: item.id,
                                text: item.name
                            }
                        })
                    }
                }
            }
        });

    </script>
@endsection

@section('title') Create Book @endsection

@section('content')

    <div class="row">
        <div class="col-md-8">
            <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data"
                class="shadow-sm p-3 bg-white">

                @csrf

                <label for="title">Title</label>
                <input value="{{ old('title') }}" type="text" name="title" placeholder="Book title"
                    class="form-control {{ $errors->first('title') ? 'is-invalid' : '' }}">
                <div class="invalid-feedback">
                    {{ $errors->first('title') }}
                </div>
                <br>

                <label for="cover">Cover</label>
                <input type="file" name="cover" class="form-control {{ $errors->first('cover') ? 'is-invalid' : '' }}">
                <div class="invalid-feedback">
                    {{ $errors->first('cover') }}
                </div>
                <br>

                <label for="description">Description</label>
                <textarea name="description" id="description"
                    class="form-control {{ $errors->first('description') ? 'is-invalid' : '' }}"
                    placeholder="Give a description about this book">{{ old('description') }}</textarea>
                <div class="invalid-feedback">
                    {{ $errors->first('description') }}
                </div>
                <br>

                <label for="categories">Categories</label>
                <select name="categories[]" id="categories" class="form-control" multiple></select>
                <br><br>

                <label for="stock">Stock</label>
                <input type="number" name="stock" id="stock" min=0 value=0 value="{{ old('stock') }}"
                    class="form-control {{ $errors->first('stock') ? 'is-invalid' : '' }}">
                <div class="invalid-feedback">
                    {{ $errors->first('stock') }}
                </div>
                <br>

                <label for="author">Author</label>
                <input type="text" name="author" id="author" placeholder="Book author" value="{{ old('author') }}"
                    class="form-control {{ $errors->first('author') ? 'is-invalid' : '' }}">
                <div class="invalid-feedback">
                    {{ $errors->first('author') }}
                </div>
                <br>

                <label for="publisher">Publisher</label>
                <input type="text" name="publisher" id="publisher" placeholder="Book publisher"
                    value="{{ old('publisher') }}"
                    class="form-control {{ $errors->first('publisher') ? 'is-invalid' : '' }}">
                <div class="invalid-feedback">
                    {{ $errors->first('publisher') }}
                </div>
                <br>

                <label for="price">Price</label>
                <input type="number" name="price" id="price" placeholder="Book price" value="{{ old('price') }}"
                    class="form-control {{ $errors->first('price') ? 'is-invalid' : '' }}">
                <div class="invalid-feedback">
                    {{ $errors->first('price') }}
                </div>
                <br>

                <button name="save_action" class="btn btn-primary" value="PUBLISH">Publish</button>

                <button name="save_action" class="btn btn-secondary" value="DRAFT">Save as draft</button>

            </form>
        </div>
    </div>

@endsection
