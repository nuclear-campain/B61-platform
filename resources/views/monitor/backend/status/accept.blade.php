@extends('layouts.app')

@section('content')
    @include ('monitor.partials.city-header') {{-- Page header --}}

    <div class="container py-3">
        <div class="row">
            @include ('monitor.partials.show-sidenav') {{-- Shared sidenav partial --}}

            <div class="col-md-9">

                <form method="POST" enctype="multipart/form-data" action="{{ route('charter.accept.store', $city) }}" class="card card-body">
                    @csrf {{-- Form field protection --}}

                    <h6 class="border-bottom border-gray pb-2 mb-3">Declare {{ $city->name }} as a part of the nuclear charter</h6>

                    @include ('flash::message') {{-- Flash session view partial --}}
             
                    <p class="card-text">
                        You are about to declare that {{ $city->name }} is against nuclear weapons. This can only happen if there 
                        is written proof of the local counsil or mayor.
                    </p>

                    <p class="card-text">
                        You will have to upload this statement. So that it can be placed publicly for the visitors or contributors of this campaign.
                    </p>

                    <hr class="mt-2 mb-3">

                    <div class="form-group row">
                        <label for="signedCharter" class="col-sm-3 col-form-label">
                            Signed charter <span class="text-danger">*</span>
                        </label>
                        
                        <div class="col-sm-5">
                            <input type="file" class="@error('charter', 'is-invalid')" @input('charter') id="signedCharter">
                            
                            @if ($errors->has('charter'))
                                <span class="small text-danger">{{ $errors->first('charter') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="offset-md-3 col-md-8">
                            <button type="submit" class="btn btn-success">
                                <i class="fe fe-save mr-1"></i> Submit
                            </button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection