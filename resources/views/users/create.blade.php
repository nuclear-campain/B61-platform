@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">Users</h1>
            <div class="page-subtitle">Create new user</div>

            <div class="page-options d-flex">
                <a href="{{ route('users.web.dashboard') }}" class="btn tw-rounded btn-outline-primary">
                    <i class="fe mr-1 fe-users"></i> Users overview
                </a>
            </div>
        </div>
    </div>

    <div class="container py-3">
        <form method="POST" class="card card-body" action="{{ route('users.store') }}">
            @csrf {{-- Form field protection --}}
        
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="labelName">Username <span class="text-danger">*</span></label>
                    <input type="text" @input('name') class="form-control @error('name', 'is-invalid')" id="inputName" placeholder="The username for the account">
                    @error('name')
                </div>

                <div class="form-group col-md-12">
                    <label for="labelEmail">E-mail address <span class="text-danger">*</span></label>
                    <input type="text" @input('email') class="form-control @error('email', 'is-invalid')" id="labelEmail" placeholder="Email address from the user.">
                    @error('email')
                </div>
            </div>

            <div class="form-group">
                <label for="labelRole">Permission role <span class="text-danger">*</span></label>
                
                <select class="form-control @error('role', 'is-invalid')" @input('role')>
                    @options($roles, 'role')
                </select>

                @error('role')
            </div>

            <hr class="mt-0 border-grey">

            <div class="form-group mb-0">
                <button class="btn btn-success rounded" type="submit">Submit</button>
                <button class="btn btn-light rounded" type="reset">Reset</button>
            </div>
        </form>
    </div>
@endsection