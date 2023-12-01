@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Hello') . ' ' . auth()->user()->name,
        'description' => __('This is your Registration page. '),
        'class' => 'col-lg-12',
    ])<div class="container-fluid mt--7">
        <div class="col-xl-8 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <h3 class="mb-0">{{ __('Edit Profile') }}</h3>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('profile.update') }}" autocomplete="off">
                        @csrf
                        @method('put')

                        <h6 class="heading-small text-muted mb-4">{{ __('User information') }}</h6>

                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif


                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                        <input type="text" name="name" id="input-name"
                                            class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                            placeholder="{{ __('Name') }}"
                                            value="{{ old('name', auth()->user()->name) }}" required autofocus>
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                        <input type="email" name="email" id="input-email"
                                            class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                            placeholder="{{ __('Email') }}"
                                            value="{{ old('email', auth()->user()->email) }}" required>
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-password">{{ __('Password') }}</label>
                                        <input type="password" name="password" id="input-password"
                                            class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                            placeholder="{{ __('*******') }}"
                                            value="{{ old('email', auth()->user()->email) }}" required>
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('role') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-role">{{ __('Role') }}</label>
                                        <select name="role" id="input-role" class="form-control form-control-alternative{{ $errors->has('role') ? ' is-invalid' : '' }}" required>
                                            <option value="">Select Role</option>
                                            <option value="doctor">Doctor</option>
                                            <option value="physician">Physician</option>
                                            <option value="user">User</option>
                                            <!-- Add more options as needed -->
                                        </select>
                                        @if ($errors->has('role'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('role') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6" id="dha-license" style="display: none;">
                                    <div class="form-group{{ $errors->has('dha_license') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-dha-license">{{ __('DHA License Number') }}</label>
                                        <input type="text" name="dha_license" id="input-dha-license"
                                            class="form-control form-control-alternative{{ $errors->has('dha_license') ? ' is-invalid' : '' }}"
                                            placeholder="{{ __('DHA License Number') }}"
                                            value="{{ old('dha_license') }}" required>
                                        @if ($errors->has('dha_license'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('dha_license') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6" id="signature" style="display: none;">
                                    <div class="form-group{{ $errors->has('signature') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-signature">{{ __('Signature image select') }}</label>
                                        <input type="file" name="signature" id="input-signature"
                                            class="form-control form-control-alternative{{ $errors->has('signature') ? ' is-invalid' : '' }}"
                                            placeholder="{{ __('Signature image select') }}"
                                            value="{{ old('signature') }}" required>
                                        @if ($errors->has('signature'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('signature') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6" id="title" style="display: none;">
                                    <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-title">{{ __('Title') }}</label>
                                        <input type="text" name="title" id="input-title"
                                            class="form-control form-control-alternative{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                            placeholder="{{ __('Title') }}"
                                            value="{{ old('title') }}" required>
                                        @if ($errors->has('title'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('title') }}</strong>
                                            </span>
                                            @endif
                                    </div>
                                </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var roleSelect = document.getElementById("input-role");
        var dhaLicenseDiv = document.getElementById("dha-license");
        var signatureDiv = document.getElementById("signature");
        var titleDiv = document.getElementById("title");

        roleSelect.addEventListener("change", function() {
            var selectedOption = roleSelect.value;

            // Show/hide input fields based on the selected option
            if (selectedOption === "doctor") {
                dhaLicenseDiv.style.display = "block";
                signatureDiv.style.display = "block";
                titleDiv.style.display = "block";
            } else {
                dhaLicenseDiv.style.display = "none";
                signatureDiv.style.display = "none";
                titleDiv.style.display = "none";
            }
        });
    });
</script>

