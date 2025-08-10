@extends('layouts.app')

@section('title', 'User Profile')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-user"></i> User Profile</h4>
                </div>
                <div class="card-body">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle"></i>
                        This is an example page showing user profile for ID: <strong>{{ $userId }}</strong>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="text-center">
                                <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 100px; height: 100px;">
                                    <i class="fas fa-user fa-3x text-white"></i>
                                </div>
                                <h5 class="mt-3">User {{ $userId }}</h5>
                                <p class="text-muted">Example User</p>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h6>Profile Information</h6>
                            <table class="table table-borderless">
                                <tr>
                                    <td><strong>User ID:</strong></td>
                                    <td>{{ $userId }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Name:</strong></td>
                                    <td>Example User {{ $userId }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Email:</strong></td>
                                    <td>user{{ $userId }}@example.com</td>
                                </tr>
                                <tr>
                                    <td><strong>Status:</strong></td>
                                    <td><span class="badge bg-success">Active</span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <a href="{{ route('home') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Back to Home
                        </a>
                        <button type="button" class="btn btn-primary">
                            <i class="fas fa-edit"></i> Edit Profile
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection