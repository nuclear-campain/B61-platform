@extends ('layouts.app', ['py' => 'py-0'])

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4"><i class="fe fe-activity mr-1 text-danger"></i> Petition</h1>
            <p class="lead mb-0">As civilian u can raise your voice against nuclear weapons.</p>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-8 mb-4">
                <form method="POST" action="" class="card card-body">
                    <h4 class="border-bottom border-gray pb-1 mb-2">{{ $petition->title }}</h4>

                    <div class="mb-3">
                        {{ str_replace('<p>', '<p class="card-text">', $petition->content) }}
                    </div>

                    <h5 class="border-bottom border-gray pb-1 mb-2">Onderteken petitie</h5>

                    <div class="form-row">
                        <div class="form-group mb-2 col-5">
                            <input type="text" class="form-control form-control-sm" placeholder="* Firstname">
                        </div>

                        <div class="form-group mb-2 col-7">
                            <input type="text" class="form-control form-control-sm" placeholder="* Lastname">
                        </div>

                        <div class="form-group mb-2 col-12">
                            <input type="email" class="form-control form-control-sm" placeholder="* Your Email address">
                        </div>

                        <div class="form-group mb-2 col-4">
                            <input type="text" class="form-control form-control-sm" placeholder="* Postal code">
                        </div>

                        <div class="form-group mb-2 col-4">
                            <input type="text" class="form-control form-control-sm" placeholder="* City">
                        </div>

                        <div class="form-group mb-2 col-4">
                            <input type="text" class="form-control form-control-sm" placeholder="* Country">
                        </div>
                    </div>

                    <hr class="mt-0 mb-2">

                    <div class="form-row">
                        <div class="form-group mb-0 col-12">
                            <button type="submit" class="btn btn-sm btn-success">
                                <i class="fe fe-edit-2 mr-1"></i> Sign
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection