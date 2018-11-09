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

            <div class="col-md-8">
                <div class="card card-body mb-3">
                    <h6 class="border-bottom border-gray pb-1 mb-2"><a id="comments"></a> 0 reacties</h6>

                    {{-- <p class="card-text text-secondary mb-1">There are no comments at this time.</p> --}}

                    <div class="media text-muted pt-2">
                        <img data-src="holder.js/32x32?theme=thumb&amp;bg=007bff&amp;fg=007bff&amp;size=1" alt="32x32" class="mr-2 rounded" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2232%22%20height%3D%2232%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2032%2032%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_166f84f3ee7%20text%20%7B%20fill%3A%23007bff%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A2pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_166f84f3ee7%22%3E%3Crect%20width%3D%2232%22%20height%3D%2232%22%20fill%3D%22%23007bff%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2211.546875%22%20y%3D%2216.9%22%3E32x32%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="width: 32px; height: 32px;">
          
                        <div class="media-body pb-2 mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between w-100">
                                <div class="align-items-center">
                                    <strong class="text-gray-dark">Full Name</strong> <small>13 seconds ago</small>
                                </div>
              
                                <div class="align-items-right">
                                    <a href="#" class="text-secondary no-underline"><i class="fe fe-thumbs-up"></i></a> <span class="text-secondary mr-1">0</span>
                                    <a href="#" class="text-secondary no-underline"><i class="fe fe-thumbs-down"></i></a> <span class="text-secondary mr-1">0</span>
                                    <a href="#" class="text-danger no-underline"><i class="fe fe-alert-octagon"></i></a>
                                </div>
                            </div>
                            
                            <span class="d-block">comment description</span>
                        </div>
                    </div>

                    <small class="d-block text-right mt-2">
                        <a href="#">All updates</a>
                        <a href="#">All updates</a>
                    </small>

                    <hr class="mt-2 mb-2">
                       
                    @auth
                        <form class=""> {{-- Comment form --}}
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Your comment" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>

                            <div class="form-group mb-0">
                                <button class="btn btn-sm btn-primary">
                                    <i class="fe fe-message-square mr-1"></i> Comment
                                </button>
                            </div>
                        </form> {{-- /// END comment form --}}
                    @else
                        <div class="alert alert-info alert-important mb-0" role="alert">
                            Please <a href=""><strong>sign in</strong></a> or <a href=""><strong>create an account</strong></a> to participate in this conversation.
                        </div>
                    @endauth
                </div>
            </div>

        </div>
    </div>
@endsection
