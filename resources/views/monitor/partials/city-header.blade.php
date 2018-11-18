<div class="container">
    <div class="page-header">
        <h1 class="page-title">City monitor</h1>
        <div class="page-subtitle">{{ $city->postal->code }}, {{ $city->name }}</div>
        
        <div class="page-options d-flex">
            <a href="{{ route('monitor.admin.dashboard') }}" class="btn btn-outline-primary">
                <i class="fe fe-arrow-left-circle mr-1"></i> Monitor overview
            </a>
        </div>
    </div>
</div>