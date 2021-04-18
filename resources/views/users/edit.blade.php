@extends('layouts.global')

@section('title') Edit User @endsection

@section('content')

    <form action="{{ route('users.update', [$user->id]) }}" method="POST" enctype="multipart/form-data"
        class="bg-white shadow-sm p-3">

        @csrf

        <input type="hidden" name="_method" value="PUT">

        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ old('name') ? old('name') : $user->name }}"
            class="form-control {{ $errors->first('name') ? 'is-invalid' : '' }}" placeholder="Fullname">
        <div class="invalid-feedback">
            {{ $errors->first('name') }}
        </div>
        <br>

        <label for="username">Username</label>
        <input type="text" name="username" id="username" value="{{ $user->username }}" class="form-control"
            placeholder="username" disabled>
        <br>

        <input {{ $user->status == 'ACTIVE' ? 'checked' : '' }} type="radio" name="status" id="active" value="ACTIVE"
            class="form-control">
        <label for="active">Active</label>

        <input {{ $user->status == 'INACTIVE' ? 'checked' : '' }} type="radio" name="status" id="inactive"
            value="INACTIVE" class="form-control">
        <label for="inactive">Inactive</label>
        <br><br>

        <label for="roles">Roles</label>
        <br>
        <input {{ in_array('ADMIN', json_decode($user->roles)) ? 'checked' : '' }} type="checkbox" name="roles[]"
            id="ADMIN" value="ADMIN" class="form-control {{ $errors->first('roles') ? 'is-invalid' : '' }}">
        <label for="ADMIN">Administrator</label>

        <input {{ in_array('STAFF', json_decode($user->roles)) ? 'checked' : '' }} type="checkbox" name="roles[]"
            id="STAFF" value="STAFF" class="form-control {{ $errors->first('roles') ? 'is-invalid' : '' }}">
        <label for="STAFF">Staff</label>

        <input {{ in_array('CUSTOMER', json_decode($user->roles)) ? 'checked' : '' }} type="checkbox" name="roles[]"
            id="CUSTOMER" value="CUSTOMER" class="form-control {{ $errors->first('roles') ? 'is-invalid' : '' }}">
        <label for="CUSTOMER">Customer</label>
        <div class="invalid-feedback">
            {{ $errors->first('roles') }}
        </div>
        <br>
        <br>

        <label for="phone">Phone Number</label>
        <input type="text" name="phone" id="phone" value="{{ old('phone') ? old('phone') : $user->phone }}"
            class="form-control {{ $errors->first('phone') ? 'is-invalid' : '' }}">
        <div class="invalid-feedback">
            {{ $errors->first('phone') }}
        </div>
        <br>

        <label for="address">Address</label>
        <textarea name="address" id="address"
            class="form-control  {{ $errors->first('address') ? 'is-invalid' : '' }}">{{ old('address') ? old('address') : $user->address }}</textarea>
        <div class="invalid-feedback">
            {{ $errors->first('address') }}
        </div>
        <br>

        <label for="avatar">Avatar</label>
        <br>
        Current Avatar : <br>
        @if ($user->avatar)
            <img src="{{ asset('storage/' . $user->avatar) }}" height="50px">
            <br>
        @else
            No Avatar
        @endif
        <br>

        <input type="file" name="avatar" id="avatar" class="form-control">
        <small class="text-muted">Kosongkan jika tidak ingin mengubah avatar</small>

        <hr class="my-3">

        <label for="email">Email</label>
        <input type="text" name="email" id="email" value="{{ $user->email }}" disabled class="form-control">
        <br>

        <button type="submit" class="btn btn-primary">Save</button>

    </form>

@endsection
