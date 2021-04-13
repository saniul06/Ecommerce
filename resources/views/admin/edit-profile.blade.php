@extends('admin.admin-master')

@section('admin-content')
<form action="{{ route('update.profile') }}" method="post">
    @csrf
    <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">User Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror"" id="
            formGroupExampleInput" placeholder={{ Auth::user()->name }} name="name">
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label">Email</label>
        <input type="text" class="form-control @error('email') is-invalid @enderror"" id="
            formGroupExampleInput2" placeholder="{{ Auth::user()->email }}" name="email">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label">Password</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror"" id="
            formGroupExampleInput2" placeholder="******" name="password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="mb-3">
        <div class="form-group">
            <label for="password-confirm" class="form-label">Confirm Password</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" placeholder="Confirm password">
        </div><!-- form-group -->
    </div>

    <button type="submit" class="btn btn-primary">Change</button>
</form>

@endsection
