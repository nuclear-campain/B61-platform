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
                        <h5 class="m-0">0 <small>Signatures</small></h5>
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
                        <h5 class="m-0">{{ $countUsers['total'] }} <small>Users</small></h5>
                        <small class="text-muted">{{ $countUsers['today'] }} Registered today</small>
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
                        <h5 class="m-0">0 <small>Reports</small></h5>
                        <small class="text-muted">0 comment reports today</small>
                    </div>
                </div>
            </div>
        </div>
    </div> {{-- /// END sat widgets --}}

    <div class="row">
        <div class="col-md-12 mb-4"> {{-- Recent users --}}
            <div class="card shadow-sm card-body">
                <h6 class="pb-1 mb-2">
                    Latest registered users 

                    <a href="{{ route('users.web.dashboard') }}" class="float-right small no-underline">
                        <i class="fe fe-users"></i> View all
                    </a>
                </h6>

                <table class="table table-sm table-bordermt-2 table-hover">
                    <thead>
                        <tr>
                            <th scope="col" class="border-top-0">Name</th>
                            <th scope="col" class="border-top-0">Status</th>
                            <th scope="col" class="border-top-0">Email</th>
                            <th scope="col" class="border-top-0">Registered at</th>
                            <th scope="col" class="border-top-0">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>
                                    @if ($user->hasVerifiedEmail()) 
                                        <span class="badge badge-success">Verified</span>
                                    @else
                                        <span class="badge badge-danger">Unverified</span>
                                    @endif
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at->diffForHumans() }}</td>

                                <td>
                                    <a href="" class="float-right no-underline text-secondary small">
                                        <i class="fe fe-eye mr-1"></i> View
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            
            </div>
        </div> {{-- /// END recent users --}}
    </div>
</div>
@endsection
