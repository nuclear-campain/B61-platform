@extends('layouts.app')

@section('content')
    @include ('monitor.partials.city-header') {{-- Page header --}}

    <div class="container py-3">
        <div class="row">
            @include('monitor.partials.show-sidenav') {{-- Shared sidenav partial --}}

            <div class="col-md-9"> {{-- Content field --}}
                <form method="POST" action="{{ route('monitor.notations.store', $city) }}" class="card card-body">
                    @csrf {{-- Form field protection  --}}

                    <h6 class="border-bottom border-gray pb-2 mb-3">
                        Create notation for {{ $city->name }}

                        <a href="{{ route('monitor.notations', $city) }}" class="small no-underline float-right">
                            <i class="fe fe-plus-circle mr-1"></i> Notations overview
                        </a>
                    </h6>

                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="inputTitle">Title <span class="text-danger">*</span></label>
                            <input type="text" @input('title') placeholder="Notation title" class="form-control @error('title', 'is-invalid')">
                            @error('title')
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputStatus">Status <span class="text-danger">*</span></label>
                            
                            <select @input('status') class="form-control @error('status', 'is-invalid')">
                                @options($statusses, 'status')
                            </select>

                            @error('status')
                        </div>

                        <div class="form-group col-md-12">
                            <label for="contentArea">Notation description <span class="text-danger">*</span></label>
                            <textarea id="contentArea" @input('description') class="form-control @error('description', 'is-invalid') col-md-12">{{ old('description') }}</textarea>
                            @error('description')
                        </div>
                    </div>

                    <hr class="mt-0 broder-grey">

                    <div class="form-group mb-0">
                        <button type="submit" class="btn btn-success rounded">Create</button>
                        <button type="reset" class="btn btn-light rounded">Reset</button>
                    </div>
                </form>
            </div> {{-- /// Content field --}}
        </div>
    </div>
@endsection