@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">Account settings</h1>
            <div class="page-subtitle">Information settings</div>
        </div>
    </div>

    <div class="container py-3">
        <div class="row">
            <div class="col-md-3 mb-3">
                @include ('account.partials.settings-sidebar')
            </div>

            <div class="col-md-9">
                <form method="POST" action="{{ route('account.settings.info') }}" class="card card-body">
                    @include('flash::message')  {{-- Flash session view partial --}}

                    @csrf                       {{-- Form field protection --}}
                    @method('PATCH')            {{-- HTTP method spoofing --}}
                    @form(Auth::user())         {{-- Bind the authenticated user data to the form --}}

                    <div class="form-group">
                        <label for="inputName">Your name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name', 'is-invalid')" id="inputName" placeholder="Your name" @input('name')>
                        @error('name')
                    </div>

                    <div class="form-group">
                        <label for="inputEmail">Email address <span class="text-danger">*</span></label>
                        <input type="email" class="form-control @error('email', 'is-invalid')" id="inputEmail" aria-describedby="emailHelp" placeholder="Enter email" @input('email')>

                        @if ($errors->has('email'))
                            @error('email')
                        @else {{-- No validation errors are found --}}
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        @endif
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