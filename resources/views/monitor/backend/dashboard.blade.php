@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">City monitor</h1>
            <div class="page-subtitle">Management panel</div>
        
            <div class="page-options d-flex">
                <div class="btn-group">
                    <button type="button" class="rounded btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fe fe-filter mr-1"></i> Filter
                    </button>

                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('monitor.admin.dashboard') }}">All cities</a>
                        <a class="dropdown-item" href="{{ route('monitor.admin.dashboard', ['filter' => 'Accepted']) }}">Accepted cities</a>
                        <a class="dropdown-item" href="{{ route('monitor.admin.dashboard', ['filter' => 'Pending'])  }}">Pending cities</a>
                        <a class="dropdown-item" href="{{ route('monitor.admin.dashboard', ['filter' => 'Rejected']) }}">Rejected cities</a>
                    </div>
                </div>

                <form class="ml-2">
                    <input type="text" class="form-control" placeholder="Search city">
                </form>
            </div>
        </div>
    </div>

    <div class="container py-3">
        <div class="row">
            <div class="col-md-8">
                <div class="card card-body">
                    @include ('flash::message') {{-- Flash session view partial --}}

                    <table class="table table-hover table-sm">
                        <thead>
                            <tr>
                                <th scope="col" class="border-top-0">Status</th>
                                <th scope="col" class="border-top-0">Postal</th>
                                <th scope="col" class="border-top-0">Name</th>
                                <th scope="col" class="border-top-0">Province</th>
                                <th scope="col" class="border-top-0">&nbsp;</th> {{-- Column dedicated to functions --}}
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($cities as $city) {{-- Loop through the cities. --}}
                                <tr>
                                    <td>
                                        <span class="badge badge-{{ $city->postal->charter_status }}">
                                            <i class="fe fe-{{ $city->postal->charter_status }} mr-1"></i> 
                                            {{ ucfirst($city->postal->charter_status) }}
                                        </span>
                                    </td>

                                    <td><strong>{{ $city->postal->code }}</strong>
                                    <td>{{ $city->name }}</td>
                                    <td>{{ $city->province->name }}</td>

                                    <td>{{--Table functions --}}
                                        <span class="float-right mr-1">
                                            <a class="text-secondary no-underline" href="">
                                                <i class="fe fe-eye mr-1"></i>
                                            </a>

                                            <a class="text-secondary no-underline" href="">
                                                <i class="fe fe-edit mr-1"></i>
                                            </a>


                                            @if ($city->hasStatus('Rejected'))
                                                <a class="text-secondary no-underline mr-1" href="">
                                                   <i class="fe fe-circle"></i>
                                                </a>

                                                <a class="text-success no-underline" href="">
                                                    <i class="fe fe-check-circle"></i>
                                                </a>
                                            @endif

                                            @if ($city->hasStatus('Pending'))
                                                <a class="text-success no-underline mr-1">
                                                    <i class="fe fe-check-circle"></i>
                                                </a>

                                                <a class="text-danger no-underline">
                                                    <i class="fe fe-x-circle"></i>
                                                </a>
                                            @endif


                                            @if ($city->hasStatus('Accepted'))
                                                <a class="text-secondary no-underline mr-1" href="">
                                                   <i class="fe fe-circle"></i>
                                                </a>

                                                <a class="text-danger no-underline" href="">
                                                    <i class="fe fe-x-circle"></i>
                                                </a>
                                            @endif
                                        </span>
                                    </td> {{-- /// END table functions --}}
                                </tr>
                            @empty {{-- No cities are found in the table.  --}}
                                {{-- TODO: Implement empty filter text --}}
                            @endforelse {{-- /// END city loop --}}
                        </tbody>
                    </table>

                    {{ $cities->links('monitor.partials.pagination') }} {{-- Pagination view instance --}}
                </div>
            </div>

            <div class="col-md-4"> {{-- Side navigation --}}
                @include ('monitor.partials.stats-widget') {{-- Statistics widget --}}
            </div>
        </div>
    </div>
@endsection