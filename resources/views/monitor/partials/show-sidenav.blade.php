<div class="col-md-3"> {{-- Sidebar --}}
    <div class="list-group">
        <a href="{{ route('monitor.admin.show', $city) }}" class="list-group-item list-group-item-action">
            <i class="fe fe-settings mr-1 text-secondary"></i> Information
        </a>
        <a href="{{ route('monitor.notations', $city) }}" class="list-group-item list-group-item-action">
            <i class="fe fe-list mr-1 text-secondary"></i> Notations
        </a>
        <a href="#" class="list-group-item list-group-item-action">
            <i class="fe fe-activity text-danger"></i> Activity log
        </a>
    </div>
</div> {{-- /// End sidebar --}}