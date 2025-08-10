@extends('layouts.app')

@section('title', 'Examples')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <!-- Success Message -->
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2><i class="fas fa-list"></i> {{ $title }}</h2>
                    <p class="text-muted">This is an example page showing controller and view integration.</p>
                </div>
                <a href="{{ route('example.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Create New
                </a>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5><i class="fas fa-database"></i> Example Items ({{ $count }})</h5>
                </div>
                <div class="card-body">
                    @if(count($items) > 0)
                    <div class="list-group">
                        @foreach($items as $index => $item)
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1">{{ $item }}</h6>
                                <small class="text-muted">Example item #{{ $index + 1 }}</small>
                            </div>
                            <div class="btn-group">
                                <a href="{{ route('example.show', $index + 1) }}" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-eye"></i> View
                                </a>
                                <a href="{{ route('example.edit', $index + 1) }}" class="btn btn-outline-secondary btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('example.destroy', $index + 1) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="text-center py-5">
                        <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                        <h5>No items found</h5>
                        <p class="text-muted">Start by creating your first item.</p>
                        <a href="{{ route('example.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Create First Item
                        </a>
                    </div>
                    @endif
                </div>
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