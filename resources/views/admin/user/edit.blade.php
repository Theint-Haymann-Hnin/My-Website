@extends('admin.dashboard')
@section('content')
    <div class="card mt-3">
        <div class="card-header">
            <h3><b>Edit User</b></h3>
        </div>
        <div class="card-body">
            <form action="{{ url('/user/update/' . $user->id) }}" method="POST">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name"><b>Name</b></label>
                    <input type="text" name="name" id="name"
                        class="form-control @error('name') is-invalid @enderror" placeholder="Enter user name"
                        value="{{ $user->name ?? old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name"><b>Email</b></label>
                    <input type="text" name="email" id="email"
                        class="form-control @error('email') is-invalid @enderror" placeholder="Enter email"
                        value="{{ $user->email ?? old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="status"><b>Role</b></label>
                    <select name="role" id="role" class="form-control">
                        <option value="">Select Role</option>
                        <option value="1" @if ($user->role == '1') selected @endif>Admin</option>
                        <option value="0" @if ($user->role == '0') selected @endif>User</option>
                    </select>
                </div>
                <button class="btn btn-dark btn-sm mt-3">Update</button>
            </form>
        </div>
    </div>
@endsection
