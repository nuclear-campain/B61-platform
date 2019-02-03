@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">News articles</h1>
            <div class="page-subtitle">Management panel</div>

            <div class="page-options d-flex">
                <a href="{{ route('articles.create') }}" class="btn btn-primary tw-rounded mr-2">
                    <i class="fe fe-file-plus"></i>
                </a>

                <div class="btn-group">
                    <button type="button" class="btn tw-rounded btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fe mr-1 fe-filter"></i> Filter
                    </button>

                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('articles.dashboard') }}">All articles</a>
                        <a class="dropdown-item" href="{{ route('articles.dashboard', ['filter' => 'published']) }}">Published articles</a>
                        <a class="dropdown-item" href="{{ route('articles.dashboard', ['filter' => 'draft']) }}">Drafted articles</a>
                        <a class="dropdown-item" href="{{ route('articles.dashboard', ['filter' => 'deleted']) }}">Deleted articles</a>
                    </div>
                </div>

                <form class="ml-2" action="{{ route('articles.search') }}" method="GET">
                    <input type="text" class="form-control" @input('search', app('request')->input('search')) placeholder="Search article">
                </form>
            </div>
        </div>
    </div>

    <div class="container py-3">
        <div class="card card-body">
            @include ('flash::message') {{-- Flash session view partial --}}

            <div class="table-responsive mb-0">

                <table class="table table-sm @if (count($articles) > 0) table-hover @endif">
                    <thead>
                        <tr>
                            <th scope="col" class="border-top-0">Author</th>
                            <th scope="col" class="border-top-0">Status</th>
                            <th scope="col" class="border-top-0">Title</th>
                            <th scope="col" class="border-top-0">Views</th>
                            <th scope="col" class="border-top-0">Published</th>
                            <th scope="col" class="border-top-0">&nbsp;</th> {{-- Col reserved for the functions --}}
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($articles as $article) {{-- There are articles found in the storage --}}
                            <tr>
                                <td>{{ $article->author->name }}</td>

                                <td> {{-- Status indicator --}}
                                    @if ($article->is_draft) 
                                        <span class="badge badge-primary">Draft</span>
                                    @else {{-- The article has been published --}}
                                        <span class="badge badge-success">Published</span>
                                    @endif
                                </td> {{-- /// END status indicator --}}

                                <td>{{ $article->title }}</td>
                                <td>{{ $article->getUniqueViews() }}<small>x</small></td>
                                <td>{{ $article->created_at->diffForHumans() }}</td>

                                <td> {{-- Options --}}
                                    <span class="float-right">
                                        <a href="{{ route('article.show', $article) }}" class="text-muted no-underline mr-1">
                                            <i class="fe fe-eye"></i>
                                        </a>

                                        @if ($article->is_draft) {{-- Article has draft status --}}
                                            <a href="{{ route('articles.status', ['article' => $article, 'status' => 'publish']) }}" class="text-success no-underline mr-1">
                                                <i class="fe fe-check"></i>
                                            </a>  
                                        @else {{-- Article has publish status --}}
                                            <a href="{{ route('articles.status', ['article' => $article, 'status' => 'draft']) }}" class="text-danger no-underline mr-1">
                                                <i class="fe fe-rotate-ccw"></i>
                                            </a>
                                        @endif {{-- /// END shortcut IF/ELSE --}}

                                        <a href="" class="text-danger no-underline">
                                            <i class="fe fe-x-circle"></i>
                                        </a>
                                    </span>
                                </td> {{-- /// END options --}}
                            </tr>
                        @empty {{-- There are no articles found in the storage --}}
                            <td colspan="4">
                                <span class="tw-text-sm text-muted"><i>There are no news articles found in the application.</i></span>
                            </td>
                        @endforelse {{-- END article loop --}}
                    </tbody>
                </table>

            </div>

            {{ $articles->links() }} {{-- Pagination view partial --}}
        </div>
    </div>
@endsection
