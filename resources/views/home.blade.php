@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row"> {{-- Stat widget --}}
        <div class="col-md-3">
            <div class="card shadow-sm mb-4 p-2">
                <div class="d-flex align-items-center">
                    <span class="stamp stamp-md shadow-sm bg-info mr-3">
                        <i class="fe fe-check-circle"></i>
                    </span>

                    <div>
                        <h5 class="m-0">{{ $countAccepted }} <small>Cities</small></h5>
                        <small class="text-muted">Accepted the declaration</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm mb-4 p-2">
                <div class="d-flex align-items-center">
                    <span class="stamp stamp-md shadow-sm bg-info mr-3">
                        <i class="fe fe-edit-3"></i>
                    </span>

                    <div>
                        <h5 class="m-0">{{ $countAccepted }} <small>Signatures</small></h5>
                        <small class="text-muted">0 signatures today</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm mb-4 p-2">
                <div class="d-flex align-items-center">
                    <span class="stamp stamp-md shadow-sm bg-info mr-3">
                        <i class="fe fe-users"></i>
                    </span>

                    <div>
                        <h5 class="m-0">{{ $countAccepted }} <small>Users</small></h5>
                        <small class="text-muted">0 Registered today</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm mb-4 p-2">
                <div class="d-flex align-items-center">
                    <span class="stamp stamp-md shadow-sm bg-info mr-3">
                        <i class="fe fe-alert-octagon"></i>
                    </span>

                    <div>
                        <h5 class="m-0">{{ $countAccepted }} <small>Reports</small></h5>
                        <small class="text-muted">0 comment reports today</small>
                    </div>
                </div>
            </div>
        </div>
    </div> {{-- /// END sat widgets --}}

    <div class="row">
        <div class="col-md-12 mb-4"> {{-- Recent users --}}
            <div class="card shadow-sm card-body">
                <h6 class="border-bottom border-gray pb-1 mb-2">
                    Latest registered users 

                    <a href="" class="float-right small no-underline">
                        <i class="fe fe-users"></i> View all
                    </a>
                </h6>
            </div>
        </div>
    </div> {{-- /// END recent users --}}
</div>
@endsection
