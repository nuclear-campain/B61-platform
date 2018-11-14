<div class="card tw-shadow mb-4 p-2">
    <div class="d-flex align-items-center">
        <span class="stamp stamp-md shadow-sm bg-success mr-3">
            <i class="fe fe-check-circle"></i>
        </span>

        <div>
            <h5 class="m-0">{{ $countAccepted }} <small>Cities</small></h5>
            <small class="text-muted">Accepted the declaration</small>
        </div>
    </div>

    <hr class="mt-2 mb-2">

    <div class="d-flex align-items-center">
        <span class="stamp stamp-md shadow-sm bg-secondary mr-3">
            <i class="fe fe-circle"></i>
        </span>

        <div>
            <h5 class="m-0">{{ $countPending }} <small>Cities</small></h5>
            <small class="text-muted">Didn't voted for the declaration</small>
        </div>
    </div>

    <hr class="mt-2 mb-2">

    <div class="d-flex align-items-center">
        <span class="stamp stamp-md shadow-sm bg-danger mr-3">
            <i class="fe fe-x-circle"></i>
        </span>

        <div>
            <h5 class="m-0">{{ $countRejected }} <small>Cities</small></h5>
            <small class="text-muted">Didn't accept the declaration</small>
        </div>
    </div>
</div>