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
            <div class="col-md-8"> {{-- Content --}}
                @foreach ($articles as $article) {{-- Article loop --}}
                    <div class="card mb-3">
                        <div class="card-body pb-1 mb-2">
                            <h5 class="card-title mb-1 brand-title">{{ ucfirst($article->title) }}</h5>

                            <p class="card-text mb-0 pt-1">
                                {!! \Illuminate\Support\Str::words(strip_tags($article->content), 30) !!}
                            </p>

                            <hr style="margin-top: 7px;" class="mb-1">

                            <small class="align-middle text-secondary">Posted {{ $article->created_at->diffForHumans() }} by {{ $article->author->name }}</small>

                            <small class="text-muted float-right card-link">
                                <a href="{{ route('article.show', $article) }}" class="align-middle card-link">Read more »</a>
                            </small>
                        </div>
                    </div>
                @endforeach {{-- /// End article loop --}}
            </div> {{-- /// END content --}}

            <div class="col-md-4"> {{-- Sidenav --}}
                <div class="card tw-shadow p-2">
                    <div class="d-flex align-items-center">
                        <span class="stamp stamp-md shadow-sm bg-success mr-3">
                            <i class="fe fe-check-circle"></i>
                        </span>

                        <div>
                            <h5 class="m-0">{{ $countAccepted }} <small>Cities</small></h5>
                            <small class="text-muted">Accepted the charter declaration</small>
                        </div>
                    </div>

                    <hr class="mt-2 mb-2">

                    <div class="d-flex align-items-center">
                        <span class="stamp stamp-md shadow-sm bg-success mr-3">
                            <i class="fe fe-edit-3"></i>
                        </span>

                        <div>
                            <h5 class="m-0">0 <small>Petition signatures</small></h5>
                            <small class="text-muted">0 signatures today</small>
                        </div>
                    </div>
                </div>

                <hr class="mt-2 mb-2">

                <a href="" class="btn btn-success rounded btn-sm btn-lg btn-block">
                    <i class="fe fe-edit-2 mr-1"></i> Sign petition
                </a>
            </div> {{-- /// Sidenav --}}
        </div>
    </div>
@endsection