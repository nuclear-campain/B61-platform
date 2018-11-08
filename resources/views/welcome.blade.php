@extends('layouts.app', ['py' => 'py-0'])

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Nuclear monitor</h1>
            <p class="lead mb-0">With this platform we want to compete for a nuclear weapon free belgium.</p>

            <hr class="my-3">

            <p class="lead">
                <a href="" class="btn btn-outline-primary">
                    <i class="fe fe-align-justify mr-1"></i> Monitor
                </a>

                <a href="" class="btn btn-outline-primary">
                    <i class="fe fe-heart text-danger mr-1"></i> Support us
                </a>
            </p>

        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-8"> {{-- Content --}}
                @foreach ($articles as $article) {{-- Article loop --}}
                    <div class="card mb-3">
                        <div class="card-body pb-1 mb-3">
                            <h5 class="card-title mb-1 brand-title">{{ ucfirst($article->title) }}</h5>
                            <small class="card-subtitle mb-2 text-muted">
                                Published {{ $article->created_at->diffForHumans() }}
                            </small>

                            <p class="card-text pt-1">
                                {!! \Illuminate\Support\Str::words(strip_tags($article->content), 30) !!}
                            </p>

                            <hr class="mb-2 mt-2">

                            <span class="align-middle text-secondary">{{ $article->author->name }}</span>

                            <span class="text-muted float-right card-link">
                                <a href="" class="align-middle card-link">Read more »</a>
                            </span>
                        </div>
                    </div>
                @endforeach {{-- /// End article loop --}}
            </div> {{-- /// END content --}}
        </div>
@endsection