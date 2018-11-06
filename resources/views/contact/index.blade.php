@extends('layouts.app', ['py' => 'py-0'])

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4"><i class="fe fe-mail mr-1"></i> Contact</h1>
            <p class="lead">If you have a question about the campaign! Dont hesitate to contact us.</p>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('contact.send') }}" method="POST" class="card card-body mb-4">
                    @csrf                       {{-- Form field protection --}}
                    @include ('flash::message') {{-- Flash session view partial --}}

                    <div class="form-group row">
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('firstname', 'is-invalid')" placeholder="Your firstname" @input('firstname')>
                            @error('firstname')
                        </div>

                        <div class="col-md-6">
                            <input type="text" class="form-control @error('lastname', 'is-invalid')" placeholder="Your lastname" @input('lastname')>
                            @error('lastname')
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <input type="email" class="form-control @error('email', 'is-invalid')" placeholder="Your email address" @input('email')>
                            @error('email')
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <textarea @input('message') class="form-control @error('message', 'is-invalid')" placeholder="Your message/question" rows="7">{{ old('bericht') }}</textarea>
                            @error('message')
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-12">
                            <button type="submit" class="btn rounded btn-success">
                                <i class="fe fe-send mr-1"></i> Send
                            </button>

                            <button type="reset" class="btn rounded btn-light">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection