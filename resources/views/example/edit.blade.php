@extends('layouts.app')

@section('title', 'Edit Example')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-edit"></i> Edit Example #{{ $id }}</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('example.update', $id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                   id="name" name="name" value="{{ old('name', 'Example Item ' . $id) }}" required>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                   id="email" name="email" value="{{ old('email', 'example' . $id . '@test.com') }}" required>
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', 'This is a sample description for example #' . $id) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-select" id="category" name="category">
                                <option value="">Select a category...</option>
                                <option value="general" {{ old('category', 'general') == 'general' ? 'selected' : '' }}>General</option>
                                <option value="important" {{ old('category', 'general') == 'important' ? 'selected' : '' }}>Important</option>
                                <option value="urgent" {{ old('category', 'general') == 'urgent' ? 'selected' : '' }}>Urgent</option>
                            </select>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" 
                                   {{ old('is_active', true) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">
                                Active
                            </label>
                        </div>

                        <div class="alert alert-warning">
                            <i class="fas fa-exclamation-triangle"></i>
                            <strong>Note:</strong> This is a demo form. Changes won't be persisted to a database.
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-between">
                            <div class="btn-group">
                                <a href="{{ route('example.show', $id) }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Back to View
                                </a>
                                <a href="{{ route('example.index') }}" class="btn btn-outline-secondary">
                                    <i class="fas fa-list"></i> Back to List
                                </a>
                            </div>
                            <div class="btn-group">
                                <button type="reset" class="btn btn-outline-warning">
                                    <i class="fas fa-undo"></i> Reset
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Update Example
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection