@extends('layouts.app', ['py' => 'py-0'])

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4"><i class="fe fe-activity mr-1 text-danger"></i> Nuclear monitor</h1>
            <p class="lead mb-0">With this platform we want to compete for a nuclear weapon free belgium.</p>

            <hr class="my-3">

            <p class="lead">
                <a href="{{ route('article.show', $comment->commentable) }}" class="btn btn-outline-primary">
                    <i class="fe fe-arrow-left-circle mr-1"></i> Back to article
                </a>
            </p>

        </div>
    </div>

    <div class="container">
        <div class="row">
            <form class="col-md-12" action="" method="POST">
                @csrf {{-- form field protection --}}

                <div class="card card-body">
                    <h5 class="border-bottom border-gray pb-1 mb-3">Report inappropriate comment</h5>

                    <p class="card-text mb-1">
                        On this page you can report severe inappropriate comments that have been directed at you or other persons. <br>
                        Please use this feature <strong>only when you have been seriously offended.</strong> And we will look after it
                        and delete comment of user if needed.
                    </p>

                    <hr>

                    <div class="form-group row">
                        <label for="comment" class="col-sm-3 col-form-label">Comment</label>
                        <div class="col-sm-9">
                            <input type="text" readonly class="form-control-plaintext" id="comment" value="{{ ucfirst($comment->comment) }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputReason" class="col-sm-3 col-form-label">Report reason <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <textarea rows="5" placeholder="Describe why u report this comment." class="form-control @error('reason', 'is-invalid')" name="reason">@text('reason')</textarea>
                            @error('reason')
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="offset-md-3 col-md-9">
                            <button type="submit" class="btn btn-danger rounded">Report</button>
                        </div>
                    </div>
                </div>
            
            </form>
        </div>
    </div>
@endsection