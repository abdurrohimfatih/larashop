@extends('layouts.global')

@section('title') Edit Book @endsection

@section('content')

    <div class="row">
        <div class="col-md-8">
            <form action="{{ route('books.update', [$book->id]) }}" method="POST" enctype="multipart/form-data"
                class="p-3 shadow-sm bg-white">

                @csrf
                <input type="hidden" name="_method" value="PUT">

                <label for="title">Title</label><br>
                <input type="text" name="title" id="title"
                    class="form-control {{ $errors->first('title') ? 'is-invalid' : '' }}"
                    value="{{ old('title') ? old('title') : $book->title }}">
                <div class="invalid-feedback">
                    {{ $errors->first('title') }}
                </div>
                <br>

                <label for="cover">Cover</label><br>
                <small class="text-muted">Current cover</small><br>
                @if ($book->cover)
                    <img src="{{ asset('public/storage/' . $book->cover) }}" width="96px">
                @endif
                <br><br>
                <input type="file" name="cover" id="cover"
                    class="form-control{{ $errors->first('cover') ? 'is-invalid' : '' }}">
                <small class="text-muted">Kosongkan jika tidak ingin mengubah cover</small>
                <div class="invalid-feedback">
                    {{ $errors->first('cover') }}
                </div>
                <br><br>

                <label for="slug">Slug</label><br>
                <input type="text" name="slug" id="slug"
                    class="form-control {{ $errors->first('slug') ? 'is-invalid' : '' }}"
                    value="{{ old('slug') ? old('slug') : $book->slug }}">
                <div class="invalid-feedback">
                    {{ $errors->first('slug') }}
                </div>
                <br>

                <label for="description">Description</label><br>
                <textarea name="description" id="description"
                    class="form-control {{ $errors->first('description') ? 'is-invalid' : '' }}">{{ old('description') ? old('description') : $book->description }}</textarea>
                <div class="invalid-feedback">
                    {{ $errors->first('description') }}
                </div>
                <br>

                <label for="categories">Categories</label><br>
                <select name="categories[]" id="categories"
                    class="form-control {{ $errors->first('categories') ? 'is-invalid' : '' }}" multiple></select>
                <br><br>

                <label for="stock">Stock</label><br>
                <input type="number" name="stock" id="stock"
                    class="form-control {{ $errors->first('stock') ? 'is-invalid' : '' }}"
                    value="{{ old('stock') ? old('stock') : $book->stock }}">
                <div class="invalid-feedback">
                    {{ $errors->first('stock') }}
                </div>
                <br>

                <label for="author">Author</label><br>
                <input type="text" name="author" id="author"
                    class="form-control {{ $errors->first('author') ? 'is-invalid' : '' }}"
                    value="{{ old('author') ? old('author') : $book->author }}">
                <div class="invalid-feedback">
                    {{ $errors->first('author') }}
                </div>
                <br>

                <label for="publisher">Publisher</label><br>
                <input type="text" name="publisher" id="publisher"
                    class="form-control {{ $errors->first('publisher') ? 'is-invalid' : '' }}"
                    value="{{ old('publisher') ? old('publisher') : $book->publisher }}">
                <div class="invalid-feedback">
                    {{ $errors->first('publisher') }}
                </div>
                <br>

                <label for="price">Price</label><br>
                <input type="text" name="price" id="price"
                    class="form-control {{ $errors->first('price') ? 'is-invalid' : '' }}"
                    value="{{ old('price') ? old('price') : $book->price }}">
                <div class="invalid-feedback">
                    {{ $errors->first('price') }}
                </div>
                <br>

                <label for="status">Status</label><br>
                <select name="status" id="status" class="form-control {{ $errors->first('status') ? 'is-invalid' : '' }}">
                    <option {{ $book->status == 'PUBLISH' ? 'selected' : '' }} value="PUBLISH">PUBLISH</option>
                    <option {{ $book->status == 'DRAFT' ? 'selected' : '' }} value="DRAFT">DRAFT</option>
                </select>
                <div class="invalid-feedback">
                    {{ $errors->first('status') }}
                </div>
                <br>

                <button class="btn btn-primary" value="PUSBLISH">Update</button>

            </form>
        </div>
    </div>

@section('footer-scripts')
    <link rel="stylesheet" href="{{ asset('public/select2/css/select2.min.css') }}" />
    <script src="{{ asset('public/jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('public/select2/js/select2.min.js') }}"></script>

    <script>
        $('#categories').select2({
            ajax: {
                url: '../../ajax/categories/search',
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

        var categories = {!! $book->categories !!}
        categories.forEach(function(category) {
            var option = new Option(category.name, category.id, true, true);
            $('#categories').append(option).trigger('change');
        });

    </script>
@endsection

@endsection
