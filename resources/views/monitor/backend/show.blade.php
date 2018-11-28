@extends('layouts.app')

@section('content')
    @include ('monitor.partials.city-header') {{-- Page header --}}

    <div class="container py-3">
        <div class="row">
            @include ('monitor.partials.show-sidenav') {{-- Shared sidenav partial --}}

            <div class="col-md-9"> {{-- Content field --}}
                <form method="POST" action="" class="card card-body">
                    @csrf           {{-- Form field protection --}}
                    @form($city)    {{-- Bind the city data to the form --}}

                    <h6 class="border-bottom border-gray pb-2 mb-3">City information</h6>
            
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputName">Name <span class="text-danger">*</span></label>
                            <input id="inputName" type="text" @input('name') class="form-control @error('name', 'is-invalid')" placeholder="Name from the city">
                            @error('name')
                        </div>

                        <div class="form-group col-md-5">
                            <div class="form-group col-md-4">
                                <label for="inputProvince">Province <span class="text-danger">*</span></label>
                            </div>
                        </div>
                    </div>

                    <hr class="mt-0 border-grey">

                    <div class="form-group mb-0">
                        <button type="submit" class="btn btn-success rounded">Update</button>
                        <button type="reset" class="btn btn-link rounded">Reset</button>
                    </div>
                </form>
            </div> {{-- /// Content field --}}

        </div>
    </div>
@endsection