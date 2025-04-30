@extends('layouts.app')

@section('title', 'Settings -' . config('app.name'))

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Change Password</h5>
                <div class="card-body">
                    <form id="formChangePassword" method="POST" action="{{ route('password.update') }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="current_password" class="form-label">Current Password</label>
                                <input class="form-control" type="password" id="current_password" name="current_password"
                                    autofocus />
                                @error('current_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="new_password" class="form-label">New Password</label>
                                <input class="form-control" type="password" id="new_password" name="new_password" />
                                @error('new_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                                <input class="form-control" type="password" id="new_password_confirmation"
                                    name="new_password_confirmation" />
                                @error('new_password_confirmation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Change Password</button>
                            <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <h5 class="card-header">Delete Account</h5>
                <div class="card-body">
                    <div class="mb-3 col-12 mb-0">
                        <div class="alert alert-warning">
                            <h6 class="alert-heading mb-1">Are you sure you want to delete your account?</h6>
                            <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
                        </div>
                    </div>
                    <form id="formAccountDeactivation" method="POST" action="{{ route('profile.destroy') }}">
                        @csrf
                        @method('DELETE')
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="delete_confirmation"
                                id="delete_confirmation" value="DELETE" required />
                            <label class="form-check-label" for="delete_confirmation">I confirm my account
                                deactivation</label>
                        </div>
                        <button type="submit" class="btn btn-danger deactivate-account">Deactivate Account</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
