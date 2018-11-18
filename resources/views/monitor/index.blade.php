@extends('layouts.app', ['py' => 'py-0'])

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4"><i class="fe fe-activity mr-1 text-danger"></i> Nuclear monitor</h1>
            <p class="lead mb-0">How are the cities in belguim performing?</p>

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
            <div class="col-md-8 mb-4">
                <div class="card card-body">

                    <table class="table table-hover table-sm">
                        <thead>
                            <tr>
                                <th scope="col" class="border-top-0">Status</th>
                                <th scope="col" class="border-top-0">Postal</th>
                                <th scope="col" class="border-top-0">Name</th>
                                <th scope="col" class="border-top-0">Province</th>
                                <th scope="col" class="border-top-0">&nbsp;</th> {{-- Column dedicated to functions --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cities as $city) {{-- Loop through the cities --}}
                                <tr>
                                    <td>
                                        <span class="badge badge-{{ $city->postal->charter_status }}">
                                            <i class="fe fe-{{ $city->postal->charter_status }} mr-1"></i> 
                                            {{ ucfirst($city->postal->charter_status) }}
                                        </span>
                                    </td>

                                    <td><strong>{{ $city->postal->code }}</strong></td>
                                    <td>{{ $city->name }}</td>
                                    <td>{{ $city->province->name }}</td>

                                    <td> {{-- Options --}}
                                        <span class="float-right">
                                            <a href="{{ route('monitor.web.city', $city) }}" class="mr-1 small no-underline">
                                                <i class="fe mr-1 fe-eye"></i> View
                                            </a>
                                        </span>
                                    </td> {{-- /// END options --}}
                                </tr>
                            @endforeach {{-- /// END city loop --}}
                        </tbody>
                    </table>

                    {{ $cities->links('monitor.partials.pagination') }} {{-- Pagination view instance --}}
                </div>
            </div>

            <div class="col-md-4"> 
                <div class="card p-2 mb-3 card-body">
                    <form class="row">
                        <div class="col-12 col-sm pr-sm-1">
                            <input type="text" name="term" placeholder="Search for another city" class="form-control mr-1"></div> <div class="col-12 col-sm-auto pl-sm-0">
                            <button type="submit" class="btn btn-danger btn-block">
                                <i class="fe fe-search"></i>
                            </button>
                        </div>
                    </form>

                    <hr class="mt-2 mb-2">

                    <div class="row">
                        <div class="col-md-6">
                            <a href="" class="btn pb-xs-2 w-100 btn-twitter">
                                <i class="fe fe-twitter mr-1"></i> Tweet
                            </a>
                        </div>

                        <div class="col-md-6">
                            <a href="" class="btn w-100 btn-facebook">
                                <i class="fe fe-facebook mr-1"></i> Share
                            </a>
                        </div>
                    </div>
                </div>         

                @include('monitor.partials.stats-widget')
            </div>
        </div>
    </div>
@endsection