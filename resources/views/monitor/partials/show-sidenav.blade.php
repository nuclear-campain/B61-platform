<div class="col-md-3"> {{-- Sidebar --}}
    <div class="card mb-3">
        <div class="card-header text-secondary">
            <i class="fe fe-home mr-1"></i> City information
        </div>

        <div class="list-group list-group-flush">
            <a href="{{ route('monitor.admin.show', $city) }}" class="list-group-item list-group-item-action">
                <i class="fe fe-settings mr-1 text-secondary"></i> Information
            </a>
            <a href="{{ route('monitor.notations', $city) }}" class="list-group-item list-group-item-action">
                <i class="fe fe-list mr-1 text-secondary mr-1"></i> Notations
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-header text-secondary">
            <i class="fe fe-file-text mr-1"></i> Charter status
        </div>

        <div class="list-group list-group-flush">
            <a href="#" class="list-group-item list-group-item-action">
                <i class="fe mr-1 text-secondary fe-Pending"></i> Register as pending
            </a>
            <a href="{{ route('charter.accept', $city) }}" class="list-group-item list-group-item-action">
                <i class="fe mr-1 text-success fe-Accepted"></i> Register as accepted
            </a>  
            <a href="" class="list-group-item list-group-item-action">
                <i class="fe mr-1 text-danger fe-Rejected"></i> Register as rejected
            </a>
        </div>
    </div>
</div> {{-- /// End sidebar --}}