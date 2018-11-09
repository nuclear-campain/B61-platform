@extends('layouts.app', ['py' => 'py-0'])

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4"><i class="fe fe-activity mr-1 text-danger"></i> Nuclear monitor - news</h1>
            <p class="lead mb-0">Keep updated about an nuclear weapon free belguim.</p>

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

    <div class="container mb-3">
        <div class="row">
            <div class="col-md-8">
                <div class="card card-body mb-3">
                    <h5 class="border-bottom border-gray pb-1 mb-2">{{ ucfirst($article->title) }}</h5>
                    <small class="align-middle mb-2 text-secondary">
                        Posted {{ $article->created_at->diffForHumans() }} by {{ $article->author->name }}
                        <a href="#" class="no-underline float-right">
                            <i class="fe fe-message-square"></i> Comments (3)
                        </a>
                    </small>
                    {!! str_replace('<p>', '<p class="card-text">', $article->content) !!}
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-body mb-3 p-3">
                    <div class="media text-muted">
                        <img class="mr-2 rounded shadow-sm" style="width: 32px; height: 32px;" src="{{ $article->author->getFirstMediaUrl('user-'. $article->author->id, 'avatar') }}">
                        <div class="media-body mb-0 small lh-125">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <strong class="text-gray-dark">{{ $article->author->name }}</strong>
                            </div>

                            <span class="d-block">
                                @if ($article->author->bio === null)
                                    {{ ucfirst($article->author->name) }} is an admin on {{ config('app.name') }}.
                                @else {{-- User has filled in his bio --}}
                                    {{ ucfirst($article->author->bio) }}
                                @endif 
                            </span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
