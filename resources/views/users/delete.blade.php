@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">Delete user account</h1>
            <div class="page-subtitle">{{ $user->name }}</div>
        </div>
    </div>

    <div class="container py-3">
        <div class="card card-body">
            <p class="text-danger">
                By deleting the user account for <strong>{{ $user->name }}</strong>, they can't login into the application anymore. 
                Also all data will be deleted from the user. <br>
                So make sure u want to delete the user account in the application.
            </p>

            <p class="mt-2">U can proceed the delete operation by filling in the form below.</p>

            <h5 class="card-title mb-3 mt-4">Confirm deactivation</h5>

            <form action="" method="POST">
                @csrf               {{-- Form field protection --}}
                @method('DELETE')   {{-- HTTP method spoofin --}}
                
                <div class="form-row">
                    <div style="margin-bottom: .5rem;" class="form-group col-md-5">
                        <input type="password" @input('confirmation') class="form-control @error('confirmation', 'is-invalid')" id="inputEmail4" placeholder="Your password">
                        @error('confirmation')
                    </div>
                </div>
    

                <div class="form-group">
                    <button type="submit" class="rounded btn btn-danger">Delete account</button>
                    <a href="{{ route('users.web.dashboard') }}" class="btn btn-light rounded">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection