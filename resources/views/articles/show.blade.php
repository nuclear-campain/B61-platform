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
                        <a href="#comments" class="no-underline float-right">
                            <i class="fe fe-message-square"></i> Comments ({{ $commentsCount }})
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

            <div class="col-md-8">
                <div class="card card-body mb-3">
                    <h6 class="border-bottom border-gray pb-1 mb-2"><a id="comments"></a>{{ $commentsCount }} Comments</h6>

                    @forelse ($comments as $comment) {{-- Loop through the comments --}}
                        <div class="media small text-muted pt-2">
		<img src="" alt="32x32"  class="mr-2 shadow-sm rounded" style="width: 32px; height: 32px;">
		<div class="card card-text border-0 mb-0">
            <div class="d-flex w-100">
                <div class="float-left">
					<strong class="text-gray-dark">Prof. Prince Davis</strong>
                    - 35 minutes ago
                </div>
            </div>

            <div class="mb-1">
                <a href="" class="small no-underline mr-1 text-secondary"></span><i class="fe fe-edit-2"></i> Edit comment</a>
                <a href="" class="small no-underline text-danger"></span><i class="fe fe-x-circle"></i> Delete comment</a>
                <a href="" class="small no-underline text-danger"></span><i class="fe fe-alert-octagon"></i> Report comment</a>
            </div>

            <span>{{ $comment->comment }}</span>
		</div>
    </div>

    @if (! $loop->last)
        <hr class="mt-2 mb-0">
    @endif

                    @empty {{-- No comments are found in the application.  --}}
                        <p class="card-text text-secondary mb-1">There are no comments at this time.</p>
                    @endforelse {{-- End comment loop  --}}

                    {{ $comments->fragment('comments')->links('comments.pagination') }}

                    <hr class="mt-2 mb-2">

                    @auth
                        <form action="{{ route('article.comment', $article) }}" method="POST"> {{-- Comment form --}}
                            @csrf {{-- Form field protection --}}
                            <div class="form-group">
                                <textarea class="form-control @error('comment', 'is-invalid')" @input('comment') placeholder="Your comment" id="exampleFormControlTextarea1" rows="3">@text('comment')</textarea>
                                @error('comment')
                            </div>

                            <div class="form-group mb-0">
                                <button class="btn btn-sm btn-outline-success">
                                    <i class="fe fe-message-square mr-1"></i> Comment
                                </button>
                            </div>
                        </form> {{-- /// END comment form --}}
                    @else
                        <div class="alert alert-info alert-important mb-0" role="alert">
                            Please <a href="{{ route('login') }}"><strong>sign in</strong></a> or <a href="{{ route('register') }}"><strong>create an account</strong></a> to participate in this conversation.
                        </div>
                    @endauth
                </div>
            </div>

        </div>
    </div>
@endsection
