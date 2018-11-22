@extends('layouts.app')

@section('content')
    @include ('monitor.partials.city-header') {{-- Page-header --}}

    <div class="container py-3">
        <div class="row">
            @include('monitor.partials.show-sidenav') {{-- Shared sidenav partial --}}

            <div class="col-md-9"> {{-- Content field --}}
                <div class="card card-body">
                    <h6 class="border-bottom border-gray pb-2 mb-3">
                        Notations for {{ $city->name }}

                        <a href="{{ route('monitor.notations.create', $city) }}" class="small no-underline float-right">
                            <i class="fe fe-plus-circle mr-1"></i> Create notation
                        </a>
                    </h6>

                    @include ('flash::message') {{-- Flash session view partial. --}}

                    <table class="table table-sm mb-2">
                        <tbody>
                            @forelse ($notations as $notation)
                                <tr>
                                    <td @if ($loop->first) class="border-top-0" @endif> {{-- Status indicator --}}
                                        @if ($notation->status) {{-- The notation is published --}}
                                            <span class="badge badge-success">Published</span>
                                        @else {{-- Is not published --}}
                                            <span class="badge badge-danger">Draft version</span>
                                        @endif

                                    </td> {{-- /// END status indicator --}}

                                    <td @if ($loop->first) class="border-top-0" @endif>{{ $notation->title }}</td>
                                    <td @if ($loop->first) class="border-top-0" @endif>{{ $notation->created_at->diffForHumans() }}</td>

                                    <td @if ($loop->first) class="border-top-0" @endif> {{-- Options --}}
                                        <span class="float-right">
                                            @if ($notation->status) {{-- The notation is published --}}
                                                <a href="" class="no-underline text-danger mr-1">
                                                    <i class="fe fe-square"></i>
                                                </a>
                                            @else {{-- Is not published --}}
                                                <a href="" class="no-underline text-success mr-1">
                                                    <i class="fe fe-check-square"></i>
                                                </a>
                                            @endif
                                            
                                            <a href="" class="text-secondary no-underline mr-1">
                                                <i class="fe fe-edit-3"></i>
                                            </a>

                                            <a href="{{ route('monitor.notations.delete', $notation) }}" class="text-danger no-underline">
                                                <i class="fe fe-x-circle"></i>
                                            </a>
                                        </span>
                                    </td> {{-- /// END options --}}
                                </tr>   
                            @empty {{-- No notations in the application --}}
                                <tr>
                                    <td colspan="4" class="border-top-0">
                                        <span class="tw-text-sm text-muted"><i>There are no notations found for {{ $city->name}} in the application.</i></span>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{ $notations->links('monitor.partials.pagination') }}
                </div>
            </div> {{-- /// Content field --}}
        </div>
    </div>
@endsection