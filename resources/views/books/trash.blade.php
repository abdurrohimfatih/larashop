@extends('layouts.global')

@section('title') Trashed Books @endsection

@section('content')

    <div class="row">
        <div class="col-md-12">

            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('books.trash') }}">
                        <div class="input-group">
                            <input type="text" name="keyword" class="form-control" placeholder="Filter by title"
                                value="{{ Request::get('keyword') }}">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-md-6">
                    <ul class="nav nav-pills card-header-pills">
                        <li class="nav-item">
                            <a href="{{ route('books.index') }}"
                                class="nav-link
                                                                                                                                                                                                                                    {{ Request::get('status') == null && Request::path() == 'books' ? 'active' : '' }}">
                                All
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('books.index', ['status' => 'publish']) }}"
                                class="nav-link {{ Request::get('status') == 'publish' ? 'active' : '' }}">
                                Published
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('books.index', ['status' => 'draft']) }}"
                                class="nav-link {{ Request::get('status') == 'draft' ? 'active' : '' }}">
                                Drafted
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('books.trash') }}"
                                class="nav-link {{ Request::path() == 'books/trash' ? 'active' : '' }}">
                                Trashed
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <hr class="my-3">

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th><b>Cover</b></th>
                        <th><b>Title</b></th>
                        <th><b>Author</b></th>
                        <th><b>Categories</b></th>
                        <th><b>Stock</b></th>
                        <th><b>Price</b></th>
                        <th><b>Action</b></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr>
                            <td>
                                @if ($book->cover)
                                    <img src="{{ asset('storage/' . $book->cover) }}" width="96px">
                                @endif
                            </td>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>
                                <ul>
                                    @foreach ($book->categories as $category)
                                        <li>{{ $category->name }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>{{ $book->stock }}</td>
                            <td>{{ $book->price }}</td>
                            <td>
                                <form action="{{ route('books.restore', [$book->id]) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">Restore</button>
                                </form>
                                <form action="{{ route('books.delete-permanent', [$book->id]) }}" method="POST"
                                    class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    {{-- <input type="hidden" name="_method" value="DELETE"> --}}
                                    <button type="submit" class="btn btn-danger btn-sm delete-btn">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                @if ($books->total() > 10)
                    <tfoot>
                        <tr>
                            <td colspan="8">
                                <div class="float-left">
                                    Showing
                                    {{ $books->firstItem() }}
                                    to
                                    {{ $books->lastItem() }}
                                    of
                                    {{ $books->total() }}
                                    results
                                </div>
                                <div class="float-right">
                                    {{ $books->appends(Request::all())->links() }}
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                @endif
            </table>

        </div>
    </div>

@endsection

@section('footer-scripts')
    <script src="{{ asset('sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
@endsection
