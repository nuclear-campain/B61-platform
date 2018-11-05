@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">Account settings</h1>
            <div class="page-subtitle">Security settings</div>
        </div>
    </div>

    <div class="container py-3">
        <div class="row">
            <div class="col-md-3">
                @include ('account.partials.settings-sidebar')
            </div>

            <div class="col-md-9">
                <form class="card card-body" method="POST" action="{{ route('account.settings.security') }}">
                    @include ('flash::message') {{-- Flash session view partial --}}

                    @csrf               {{-- Form field protection --}}
                    @method('PATCH')    {{-- HTTP method spoofing --}}

                     <div class="form-group">
                        <label for="inputPassword">New password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control @error('password', 'is-invalid')" placeholder="Your new password" @input('password')>
                        @error('password')
                    </div>

                    <div class="form-group">
                        <label for="passwordConfirmation">Repeat password <span class="text-danger">*</span></label>
                        <input type="password" @input('password_confirmation') class="form-control" placeholder="Repeat password">
                    </div>

                    <hr class="mt-0 border-grey">

                    <div class="form-group mb-0">
                        <button type="submit" class="btn btn-success rounded">Update</button>
                        <button type="reset" class="btn btn-link rounded">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection