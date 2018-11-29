@extends('layouts.app')

@section('content')
    @include ('monitor.partials.city-header') {{-- Page header --}}

    <div class="container py-3">
        <div class="row">
            @include ('monitor.partials.show-sidenav') {{-- Shared sidenav partial --}}

            <div class="col-md-9"> {{-- Content field --}}
                <form method="POST" action="{{ route('monitor.admin.update', $city) }}" class="card card-body">
                    @csrf               {{-- Form field protection --}}
                    @method('PATCH')    {{-- HTTP method spoofing --}}
                    @form($city)        {{-- Bind the city data to the form --}}

                    <h6 class="border-bottom border-gray pb-2 mb-3">City information</h6>
            
                    @include('flash::message') {{-- Flash session view partial --}}

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputName">Name <span class="text-danger">*</span></label>
                            <input id="inputName" type="text" @input('name') class="form-control @error('name', 'is-invalid')" placeholder="Name from the city">
                            @error('name')
                        </div>

                        <div class="form-group col-md-5">
                            <label for="inputProvince" for="inputProvince">Province <span class="text-danger">*</span></label>

                            <select id="inputProvince" class="form-control @error('province', 'is-invalid')" @input('province')>
                                @foreach ($provinces as $province) {{-- Loop through the province --}}
                                    <option value="{{ $province->id }}" @if ($city->province_id === $province->id) selected @endif > 
                                        {{ $province->name }} 
                                    </option>
                                @endforeach {{-- /// END province loop --}}
                            </select>

                            @error('province') {{-- Validation error view partial --}}   
                        </div>

                        <div class="form-group col-md-3">
                            <label for="postalCode">Postal code</label>
                            <input id="postalCode" type="text" class="form-control" disabled value="{{ $city->postal->code }}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 form-group">
                            <label for="inputLat">Latitude <span class="text-danger">*</span></label>

                            <input id="inputLat" class="form-control @error('lat', 'is-invalid')" @input('lat') placeholder="Latitude from the city">
                            @error('lat')
                        </div>

                        <div class="col-md-6 form-group">
                            <label for="inputLng">Longtitude <span class="text-danger">*</span></label>

                            <input id="inputLng" class="form-control @error('lng', 'is-invalid')" @input('lng') placeholder="Longtitude from the city">
                            @error('lng')
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