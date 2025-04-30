@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Profile Details</h5>
                <div class="card-body">
                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img src="{{ asset($user->profile_picture) }}" alt="user-avatar" class="d-block rounded" height="100"
                            width="100" id="uploadedAvatar" />
                        <form action="{{ route('profile.picture.update', $user->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="button-wrapper">
                                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">Upload new photo</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" id="upload" name="profile_picture" class="account-file-input"
                                        hidden accept="image/png, image/jpeg" />
                                </label>

                                <button type="submit" class="btn btn-success mb-4">
                                    <i class="bx bx-reset d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Save</span>
                                </button>

                                <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                    <i class="bx bx-reset d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Reset</span>
                                </button>

                                <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <form id="formAccountSettings" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <hr class="my-0" />
                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="name" class="form-label">Full Name</label>
                                    <input class="form-control" type="text" id="name" name="name"
                                        value="{{ old('name', auth()->user()->name) }}" autofocus />
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="email" class="form-label">E-mail</label>
                                    <input class="form-control" type="text" id="email" name="email"
                                        value="{{ old('email', auth()->user()->email) }}"
                                        placeholder="john.doe@example.com" />
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input class="form-control" type="text" id="phone" name="phone"
                                        value="{{ old('phone', auth()->user()->phone) }}" placeholder="+1 (123) 456-7890" />
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="address" class="form-label">Address</label>
                                    <input class="form-control" type="text" id="address" name="address"
                                        value="{{ old('address', auth()->user()->address) }}"
                                        placeholder="Enter your address" />
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="city" class="form-label">City</label>
                                    <input class="form-control" type="text" id="city" name="city"
                                        value="{{ old('city', auth()->user()->city) }}" placeholder="Enter your city" />
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="state" class="form-label">State</label>
                                    <input class="form-control" type="text" id="state" name="state"
                                        value="{{ old('state', auth()->user()->city) }}" placeholder="Enter your state" />
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="postal_code" class="form-label">Postal Code</label>
                                    <input class="form-control" type="text" id="postal_code" name="postal_code"
                                        value="{{ old('postal_code', auth()->user()->postal_code) }}"
                                        placeholder="Enter your postal code" />
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="country" class="form-label">Country</label>
                                    <select id="country" name="country" class="select2 form-select">
                                        <option value="">Select Country</option>
                                        <option value="US"
                                            {{ old('country', auth()->user()->country) == 'US' ? 'selected' : '' }}>United
                                            States</option>
                                        <option value="CA"
                                            {{ old('country', auth()->user()->country) == 'CA' ? 'selected' : '' }}>Canada
                                        </option>
                                        <option value="UK"
                                            {{ old('country', auth()->user()->country) == 'UK' ? 'selected' : '' }}>United
                                            Kingdom</option>
                                        <option value="AU"
                                            {{ old('country', auth()->user()->country) == 'AU' ? 'selected' : '' }}>
                                            Australia</option>
                                    </select>
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="bio" class="form-label">Bio</label>
                                    <textarea class="form-control" id="bio" name="bio" rows="3" placeholder="Enter your bio">{{ old('bio', auth()->user()->bio) }}</textarea>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                            </div>
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
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            // Initialize Select2
            $('.select2').select2();

            // Handle form submission with AJAX
            $('#formAccountSettings').on('submit', function(e) {
                e.preventDefault();

                let formData = new FormData(this);

                $.ajax({
                    url: '{{ route('profile.update') }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message,
                            timer: 2000,
                            showConfirmButton: false
                        });

                        // Update profile picture if uploaded
                        if (response.profile_picture) {
                            $('#uploadedAvatar').attr('src', response.profile_picture);
                        }

                        // Clear validation errors
                        $('.invalid-feedback').text('');
                        $('.form-control, .form-select').removeClass('is-invalid');
                    },
                    error: function(xhr) {
                        let errors = xhr.responseJSON.errors;

                        // Clear previous validation errors
                        $('.invalid-feedback').text('');
                        $('.form-control, .form-select').removeClass('is-invalid');

                        // Display new validation errors
                        if (errors) {
                            $.each(errors, function(key, value) {
                                let input = $(`[name="${key}"]`);
                                input.addClass('is-invalid');
                                input.siblings('.invalid-feedback').text(value[0]);
                            });
                        }

                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Please check the form for errors.',
                            timer: 2000,
                            showConfirmButton: false
                        });
                    }
                });
            });

            // Handle image preview
            $('#upload').on('change', function() {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#uploadedAvatar').attr('src', e.target.result);
                };
                reader.readAsDataURL(this.files[0]);
            });

            // Reset image
            $('.account-image-reset').on('click', function() {
                $('#uploadedAvatar').attr('src',
                    '{{ auth()->user()->profile_picture ? asset('storage/' . auth()->user()->profile_picture) : asset('assets/img/avatars/1.png') }}'
                    );
                $('#upload').val('');
            });
        });
    </script>
@endpush
