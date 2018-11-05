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
                <form class="card card-body" method="POST" action="">
                    @csrf {{-- Form field protection --}}
                </form>
            </div>
        </div>
    </div>
@endsection