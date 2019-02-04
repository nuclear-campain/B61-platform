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
                <form method="POST" action="{{ route('petition.sign') }}" class="card card-body">
                    <h4 class="border-bottom border-gray pb-1 mb-2">{{ $petition->title }}</h4>

                    @csrf {{-- Form field protection --}}
                    @include ('flash::message') {{-- Flash session view partial --}}

                    <div class="mb-3">
                        {{ str_replace('<p>', '<p class="card-text">', $petition->content) }}
                    </div>

                    <h5 class="border-bottom border-gray pb-1 mb-2">Onderteken petitie</h5>

                    <div class="form-row">
                        <div class="form-group mb-2 col-5">
                            <input type="text" aria-label="Your firstname" class="form-control @error('firstname', 'is-invalid') form-control-sm" placeholder="* Firstname" @input('firstname')>
                            @error('firstname')
                        </div>

                        <div class="form-group mb-2 col-7">
                            <input type="text" aria-label="Your lastname" class="form-control form-control-sm @error('lastname', 'is-invalid')" placeholder="* Lastname" @input('lastname')>
                            @error('lastname')
                        </div>

                        <div class="form-group mb-2 col-12">
                            <input type="email" aria-label="Your Email address" class="form-control @error('email', 'is-invalid') form-control-sm" placeholder="* Your Email address" @input('email')>
                            @error('email')
                        </div>

                        <div class="form-group mb-2 col-4">
                            <input type="text" aria-label="Postal code from your city" class="form-control @error('postal', 'is-invalid') form-control-sm" placeholder="* Postal code" @input('postal')>
                            @error('postal')
                        </div>

                        <div class="form-group mb-2 col-4">
                            <input type="text" aria-label="Your city" class="form-control @error('city', 'is-invalid') form-control-sm" placeholder="* City" @input('city')>
                            @error('city')
                        </div>

                        <div class="form-group mb-2 col-4">
                            <input type="text" aria-label="Your country" class="form-control @error('country', 'is-invalid') form-control-sm" placeholder="* Country" @input('country')>
                            @error('country')
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