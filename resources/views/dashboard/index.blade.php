@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-xxl-8 mb-6 order-0">
            <div class="card">
                <div class="d-flex align-items-start row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary mb-3">Welcome {{ Auth::user()->name }}! 🎉</h5>
                            <p class="mb-6">
                                You have successfully logged in to your dashboard.<br />Start managing your content.
                            </p>

                            <a href="{{ route('profile.edit') }}" class="btn btn-sm btn-outline-primary">View Profile</a>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-6">
                            <img src="{{ asset('assets/img/illustrations/man-with-laptop.png') }}" height="175"
                                alt="View Badge User" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-4 col-lg-12 col-md-4 order-1">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-6 mb-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between mb-4">
                                <div class="avatar flex-shrink-0">
                                    <img src="{{ asset('assets/img/icons/unicons/chart-success.png') }}" alt="chart success"
                                        class="rounded" />
                                </div>
                            </div>
                            <p class="mb-1">Total Users</p>
                            <h4 class="card-title mb-3">{{ \App\Models\User::count() }}</h4>
                            {{-- <small class="text-success fw-medium"><i class="icon-base bx bx-up-arrow-alt"></i>
                                +72.80%</small> --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-6 mb-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between mb-4">
                                <div class="avatar flex-shrink-0">
                                    <img src="{{ asset('assets/img/icons/unicons/wallet-info.png') }}" alt="wallet info"
                                        class="rounded" />
                                </div>
                            </div>
                            <p class="mb-1">Active Sessions</p>
                            <h4 class="card-title mb-3">1</h4>
                            {{-- <small class="text-success fw-medium"><i class="icon-base bx bx-up-arrow-alt"></i>
                                +28.42%</small> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
@endpush
