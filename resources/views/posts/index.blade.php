@extends('layouts.app')

@section('title', 'Posts - ' . ucfirst($category))

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2><i class="fas fa-newspaper"></i> Posts</h2>
                    <p class="text-muted">Category: <strong>{{ ucfirst($category) }}</strong></p>
                </div>
                <button type="button" class="btn btn-primary">
                    <i class="fas fa-plus"></i> New Post
                </button>
            </div>

            <div class="row">
                <!-- Sample posts -->
                @for ($i = 1; $i <= 6; $i++)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100">
                        <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                            <i class="fas fa-image fa-3x text-muted"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Sample Post {{ $i }}</h5>
                            <p class="card-text">
                                This is a sample post in the <strong>{{ $category }}</strong> category. 
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">{{ now()->subDays($i)->diffForHumans() }}</small>
                                <span class="badge bg-primary">{{ ucfirst($category) }}</span>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="btn-group w-100">
                                <button type="button" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-eye"></i> View
                                </button>
                                <button type="button" class="btn btn-outline-secondary btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                <button type="button" class="btn btn-outline-danger btn-sm">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endfor
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center">
                <nav>
                    <ul class="pagination">
                        <li class="page-item disabled">
                            <span class="page-link">Previous</span>
                        </li>
                        <li class="page-item active">
                            <span class="page-link">1</span>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="mt-4">
                <a href="{{ route('home') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back to Home
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.card {
    transition: transform 0.2s;
}
.card:hover {
    transform: translateY(-5px);
}
</style>
@endpush