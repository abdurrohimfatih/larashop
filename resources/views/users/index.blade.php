@extends('layouts.global')

@section('title') User List @endsection

@section('content')

    <form action="{{ route('users.index') }}">
        <div class="row">
            <div class="col-md-6">
                <input type="text" name="keyword" class="form-control col-md-10" placeholder="Filter berdasarkan email"
                    value="{{ Request::get('keyword') }}" autofocus autocomplete="off">
            </div>
            <div class="col-md-6">
                <input {{ Request::get('status') == 'ACTIVE' ? 'checked' : '' }} value="ACTIVE" type="radio" name="status"
                    id="active" class="form-control">
                <label for="active">Active</label>

                <input {{ Request::get('status') == 'INACTIVE' ? 'checked' : '' }} value="INACTIVE" type="radio"
                    name="status" id="inactive" class="form-control">
                <label for="inactive">Inactive</label>

                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </form>

    <div class="row">
        <div class="col-md-12 text-right">
            <a href="{{ route('users.create') }}" class="btn btn-primary">
                Create User
            </a>
        </div>
    </div>

    <hr class="my-3">

    <table class="table table-bordered">
        <thead>
            <tr>
                <th><b>Name</b></th>
                <th><b>Username</b></th>
                <th><b>Email</b></th>
                <th><b>Avatar</b></th>
                <th><b>Status</b></th>
                <th><b>Action</b></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if ($user->avatar)
                            <img src="{{ asset('storage/' . $user->avatar) }}" height="50px">
                        @else
                            N/A
                        @endif
                    </td>
                    <td>
                        @if ($user->status == 'ACTIVE')
                            <span class="badge badge-success">
                                {{ $user->status }}
                            </span>
                        @else
                            <span class="badge badge-danger">
                                {{ $user->status }}
                            </span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('users.edit', [$user->id]) }}" class="btn btn-info text-white btn-sm">
                            Edit
                        </a>
                        <a href="{{ route('users.show', [$user->id]) }}" class="btn btn-success btn-sm">
                            Detail
                        </a>
                        <form action="{{ route('users.destroy', [$user->id]) }}" class="d-inline delete-form"
                            method="POST">
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
        @if ($users->total() > 3)
            <tfoot>
                <tr>
                    <td colspan="6">
                        <div class="float-left">
                            Showing
                            {{ $users->firstItem() }}
                            to
                            {{ $users->lastItem() }}
                            of
                            {{ $users->total() }}
                            results
                        </div>
                        <div class="float-right">
                            {{ $users->appends(Request::all())->links() }}
                        </div>
                    </td>
                </tr>
            </tfoot>
        @endif
    </table>

@endsection

@section('footer-scripts')
    <script src="{{ asset('sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
@endsection
