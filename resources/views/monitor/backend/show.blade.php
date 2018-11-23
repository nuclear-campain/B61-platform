@extends('layouts.app')

@section('content')
    @include ('monitor.partials.city-header') {{-- Page header --}}

    <div class="container py-3">
        <div class="row">
            @include ('monitor.partials.show-sidenav') {{-- Shared sidenav partial --}}

            <div class="col-md-9"> {{-- Content field --}}
                <form method="POST" action="" class="card card-body">
                    @csrf {{-- Form field protection --}}
                    <h6 class="border-bottom border-gray pb-2 mb-0">City information</h6>
                </form>
            </div> {{-- /// Content field --}}

        </div>
    </div>
@endsection