@extends('layouts.app', ['py' => 'py-0'])

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4"><i class="fe fe-activity mr-1 text-danger"></i> Nuclear monitor</h1>
            <p class="lead mb-0">You found a bug and want to report it?</p>

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
            <div class="col-sm-12">
                <form method="POST" action="{{ route('issue.report.store') }}" class="card card-body mb-3">
                    <h6 class="border-bottom border-gray pb-1 mb-2">Report an issue</h6>

                    @csrf                       {{-- Form field protection --}}
                    @include ('flash::message') {{-- Flash session view partial --}}

                    <p class="card-text">
                        This platform is maintained and build up by volunteers and activists as open-source. 
                        So it could happen that during the development process bugs sneak in the platform. Thats why
                        we built in this bug reporting form for u! If you found a bug and want to report u can fill in the form 
                        below. 
                    </p>

                    <p class="card-text text-danger mb-0">
                        <i class="fe fe-alert-triangle mr-1"></i>
                        Please keep in mind that al data will be placed in our public issue tracker on Github.
                    </p>

                    <hr class="mt-3 mb-4">

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control @error('title', 'is-invalid')" @input('title') placeholder="Title for the issue">
                            @error('title')
                        </div>

                        <div class="form-group col-md-12">
                            <textarea rows="7" @input('body') class="form-control @error('body', 'is-invalid')" placeholder="Discribe the bug or issue so good as possible">{{ old('body') }}</textarea>
                            @error('body')
                        </div>

                        <div class="mb-0 form-group col-md-12">
                            <button type="submit" class="btn btn-outline-success">Submit</button>
                        </div> 
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection