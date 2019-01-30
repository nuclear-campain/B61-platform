@extends('layouts.app', ['py' => 'py-0'])

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4"><i class="fe fe-activity mr-1 text-danger"></i> Nuclear monitor</h1>
            <p class="lead mb-0">With this platform we want to compete for a nuclear weapon free belgium.</p>

            <hr class="my-3">

            <p class="lead">
                <a href="" class="btn btn-outline-facebook">
                    <i class="fe fe-facebook mr-1"></i> Facebook
                </a>

                <a href="" class="btn btn-outline-twitter">
                    <i class="fe fe-twitter mr-1"></i> Twitter
                </a>
            </p>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-9"> {{-- EDIT BOX --}}
                <form method="POST" action="" class="card card-body">
                    @csrf {{-- Form field protection --}}
                    
                    <h6 class="border-bottom border-gray pb-1 mb-2">Edit comment</h6>
                </form> {{-- /// END edit box --}}
            </div>
        </div>
    </div>
@endsection

