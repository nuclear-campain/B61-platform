@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">Delete your account</h1>
        </div>
    </div>

    <div class="container py-3">
        <form class="card card-body" action="" method="POST">
             @csrf               {{-- Form field protection --}}
            @method('DELETE')    {{-- HTTP method spoofin --}}

            <p class="text-danger">
                By deleting your user account. You can't login anymore in this application. And all your data wil be deleted after 30 days.
            </p>

            <p>
                we keeping the data in case of that you wan't to come back. <br>
                So make sure u want to delete the account in the application
            </p>

            <p class="mt-2">U can proceed the delete operation by filling in the form below.</p>

            <h5 class="card-title mb-3 mt-4">Confirm deactivation</h5>
                
            <div class="form-row">
                <div style="margin-bottom: .5rem;" class="form-group col-md-5">
                    <input type="password" @input('confirmation') class="form-control @error('confirmation', 'is-invalid')" id="inputEmail4" placeholder="Your password">
                    @error('confirmation')
                </div>
            </div>
    

            <div class="form-group">
                <button type="submit" class="rounded btn btn-danger">Delete account</button>
                <a href="" onClick="history.go(-1); return false;" class="btn btn-light rounded">Cancel</a>
            </div>
        </form>
    </div>
@endsection