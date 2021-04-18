@extends('layouts.global')

@section('title') Trashed Category @endsection

@section('content')

    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('categories.index') }}">
                <div class="input-group">
                    <input type="text" name="name" class="form-control" placeholder="Filter by category name"
                        value="{{ Request::get('name') }}">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-md-6">
            <ul class="nav nav-pills card-header-pills">
                <li class="nav-item"><a href="{{ route('categories.index') }}" class="nav-link">Published</a></li>
                <li class="nav-item"><a href="{{ route('categories.trash') }}" class="nav-link active">Trashed</a></li>
            </ul>
        </div>
    </div>

    <hr class="my-3">

    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-stripped">
                <thead>
                    <tr>
                        <th><b>Name</b></th>
                        <th><b>Slug</b></th>
                        <th><b>Image</b></th>
                        <th><b>Actions</b></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>
                                @if ($category->image)
                                    <img src="{{ asset('public/storage/' . $category->image) }}" width="48px">
                                @else
                                    No image
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('categories.restore', [$category->id]) }}"
                                    class="btn btn-success btn-sm">
                                    Restore
                                </a>

                                <form action="{{ route('categories.delete-permanent', [$category->id]) }}"
                                    class="d-inline delete-form" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                @if ($categories->total() > 3)
                    <tfoot>
                        <tr>
                            <td colspan="4">
                                <div class="float-left">
                                    Showing
                                    {{ $categories->firstItem() }}
                                    to
                                    {{ $categories->lastItem() }}
                                    of
                                    {{ $categories->total() }}
                                    results
                                </div>
                                <div class="float-right">
                                    {{ $categories->appends(Request::all())->links() }}
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
    <script src="{{ asset('public/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('public/js/script.js') }}"></script>
@endsection
