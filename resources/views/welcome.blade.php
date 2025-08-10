@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
<!-- Hero Section -->
<section class="hero-section text-center text-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h1 class="display-4 fw-bold mb-4">🏥 Welcome to {{ config('app.name') }}</h1>
                <p class="lead mb-4">
                    A modern Laravel 12 skeleton project with Blade templating and Bootstrap 5. 
                    This is your starting point for building amazing web applications.
                </p>
                <a href="#features" class="btn btn-light btn-lg me-3">
                    <i class="fas fa-rocket"></i> Explore Features
                </a>
                <a href="#examples" class="btn btn-outline-light btn-lg">
                    <i class="fas fa-code"></i> View Examples
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="display-5 fw-bold">🚀 Built with Modern Tools</h2>
                <p class="text-muted">This Laravel skeleton includes everything you need to start building.</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card h-100 feature-card">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <i class="fab fa-laravel fa-3x text-danger"></i>
                        </div>
                        <h5 class="card-title">Laravel 12</h5>
                        <p class="card-text">
                            Built on the latest Laravel framework with all modern features 
                            and security enhancements.
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-4">
                <div class="card h-100 feature-card">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <i class="fab fa-bootstrap fa-3x text-primary"></i>
                        </div>
                        <h5 class="card-title">Bootstrap 5</h5>
                        <p class="card-text">
                            Responsive design system with modern components 
                            and utility classes for rapid development.
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-4">
                <div class="card h-100 feature-card">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <i class="fas fa-layer-group fa-3x text-success"></i>
                        </div>
                        <h5 class="card-title">Blade Templates</h5>
                        <p class="card-text">
                            Powerful templating engine with inheritance, 
                            components, and clean syntax.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Examples Section -->
<section id="examples" class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="display-5 fw-bold">📝 Route Examples</h2>
                <p class="text-muted">Explore these example routes to see Laravel routing in action.</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-user text-primary"></i> User Profiles
                        </h5>
                        <p class="card-text">
                            Example of route parameters. View user profiles with dynamic IDs.
                        </p>
                        <div class="d-grid gap-2">
                            <a href="{{ route('user.profile', ['id' => 1]) }}" class="btn btn-primary">View User 1</a>
                            <a href="{{ route('user.profile', ['id' => 123]) }}" class="btn btn-outline-primary">View User 123</a>
                        </div>
                        <small class="text-muted d-block mt-2">
                            Route: <code>/user/{id}</code>
                        </small>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-newspaper text-success"></i> Posts by Category
                        </h5>
                        <p class="card-text">
                            Example of optional parameters. Browse posts by different categories.
                        </p>
                        <div class="d-grid gap-2">
                            <a href="{{ route('posts.index') }}" class="btn btn-success">All Posts (General)</a>
                            <a href="{{ route('posts.index', ['category' => 'technology']) }}" class="btn btn-outline-success">Technology Posts</a>
                            <a href="{{ route('posts.index', ['category' => 'news']) }}" class="btn btn-outline-success">News Posts</a>
                        </div>
                        <small class="text-muted d-block mt-2">
                            Route: <code>/posts/{category?}</code>
                        </small>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-cogs text-warning"></i> Resource Controller
                        </h5>
                        <p class="card-text">
                            Example of Laravel resource controller with CRUD operations.
                        </p>
                        <div class="d-grid gap-2">
                            <a href="{{ route('example.index') }}" class="btn btn-warning">View Examples</a>
                            <a href="{{ route('example.create') }}" class="btn btn-outline-warning">Create Example</a>
                        </div>
                        <small class="text-muted d-block mt-2">
                            Route: <code>Route::resource('example', ExampleController::class)</code>
                        </small>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="card bg-primary text-white">
                    <div class="card-body text-center">
                        <h5 class="card-title">
                            <i class="fas fa-code"></i> Ready to Build Your Application?
                        </h5>
                        <p class="card-text mb-0">
                            Check out the routes in <code>routes/web.php</code> and views in <code>resources/views/</code>
                            to see how everything works together.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Getting Started Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="display-5 fw-bold mb-4">🛠️ Ready to Build?</h2>
                <p class="lead text-muted mb-4">
                    Start developing your application with this clean Laravel skeleton.
                </p>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="d-grid">
                            <a href="https://laravel.com/docs" class="btn btn-primary btn-lg" target="_blank">
                                <i class="fas fa-book"></i> Laravel Documentation
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="d-grid">
                            <a href="https://getbootstrap.com/docs" class="btn btn-outline-primary btn-lg" target="_blank">
                                <i class="fab fa-bootstrap"></i> Bootstrap Documentation
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="mt-4">
                    <div class="alert alert-info d-inline-block">
                        <i class="fas fa-info-circle"></i>
                        <strong>Next Steps:</strong> Check the README file in <code>resources/views/README.md</code> for setup instructions.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
.hero-section {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    padding: 100px 0;
}

.feature-card {
    transition: transform 0.3s, box-shadow 0.3s;
    border: none;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.feature-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 25px rgba(0,0,0,0.15);
}

.card {
    border: none;
    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
}

code {
    background-color: #f8f9fa;
    padding: 2px 6px;
    border-radius: 4px;
    font-size: 0.9em;
}

.bg-primary code {
    background-color: rgba(255,255,255,0.2);
    color: #fff;
}
</style>
@endpush

@push('scripts')
<script>
// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Add some interactive feedback
document.querySelectorAll('.btn').forEach(btn => {
    btn.addEventListener('click', function(e) {
        // Add a little animation on click
        this.style.transform = 'scale(0.95)';
        setTimeout(() => {
            this.style.transform = 'scale(1)';
        }, 100);
    });
});
</script>
@endpush