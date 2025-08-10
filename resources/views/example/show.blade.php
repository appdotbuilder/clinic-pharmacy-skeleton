@extends('layouts.app')

@section('title', 'View Example')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-eye"></i> View Example #{{ $id }}</h4>
                </div>
                <div class="card-body">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle"></i>
                        This is an example view showing a single resource with ID: <strong>{{ $id }}</strong>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Example Details</h6>
                            <table class="table table-borderless">
                                <tr>
                                    <td><strong>ID:</strong></td>
                                    <td>{{ $id }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Name:</strong></td>
                                    <td>Example Item {{ $id }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Status:</strong></td>
                                    <td><span class="badge bg-success">Active</span></td>
                                </tr>
                                <tr>
                                    <td><strong>Created:</strong></td>
                                    <td>{{ now()->subDays(rand(1, 30))->format('M j, Y') }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Category:</strong></td>
                                    <td>{{ ['General', 'Important', 'Urgent'][array_rand(['General', 'Important', 'Urgent'])] }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h6>Additional Information</h6>
                            <div class="bg-light p-3 rounded">
                                <p class="mb-0">
                                    This is sample content for example #{{ $id }}. In a real application, 
                                    this would be fetched from your database and displayed dynamically.
                                </p>
                            </div>
                            
                            <div class="mt-3">
                                <h6>Actions</h6>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-sm">
                                        <i class="fas fa-download"></i> Download
                                    </button>
                                    <button type="button" class="btn btn-secondary btn-sm">
                                        <i class="fas fa-share"></i> Share
                                    </button>
                                    <button type="button" class="btn btn-info btn-sm">
                                        <i class="fas fa-print"></i> Print
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <hr>
                    
                    <div class="d-flex justify-content-between">
                        <div>
                            <a href="{{ route('example.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Back to List
                            </a>
                        </div>
                        <div class="btn-group">
                            <a href="{{ route('example.edit', $id) }}" class="btn btn-primary">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('example.destroy', $id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this example?')">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection