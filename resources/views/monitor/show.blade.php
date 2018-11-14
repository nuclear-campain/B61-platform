@extends('layouts.app', ['py' => 'py-0'])

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4"><i class="fe fe-activity mr-1 text-danger"></i> Nuclear monitor</h1>
            <p class="lead mb-0">How is {{ $city->name }} performing? You can track or find it here.</p>

            <hr class="my-3">

            <p class="lead">
                <a href="" class="btn btn-outline-primary">
                    <i class="fe fe-list mr-1"></i> Back to overview
                </a>
            </p>

        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-4 shadow-sm">
                    <div class="pl-4 pr-4 card-header">
                        {{ $city->postal->code}}, {{ $city->name}} 
                        
                        @if (Auth::check())
                            <a href="" class="float-right no-underline text-success">
                                <strong><i class="fe fe-eye"></i> Follow</strong>
                            </a>
                        @endif
                    </div>

                    <div class="card-body">
                        <table class="table table-borderless table-sm mb-0">
                            <tbody>
                                <tr>
                                    <th>City name:</th> <td>{{ $city->name }}</td>
                                    <th>Province: </th> <td>{{ $city->province->name }}</td>
                                </tr>
                                <tr>
                                    <th>Postal code:</th> 
                                    <td>{{ $city->postal->code }} </td>
                                    <th>Charter:</th>     
                                    <td>
                                        <span class="badge badge-{{ $city->postal->charter_status }}">
                                            <i class="fe fe-{{ $city->postal->charter_status }} mr-1"></i> 
                                            {{ ucfirst($city->postal->charter_status) }}
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" id="notations-tab" data-toggle="tab" href="#notations" role="tab" aria-controls="notations" aria-selected="true">
                                    <i class="fe fe-list mr-1"></i> Notations
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="municipalities-tab" data-toggle="tab" href="#municipalities" role="tab" aria-controls="notations" aria-selected="true"><i class="fe fe-home mr-1"></i> Municipalities </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body pl-4 pr-4 pb-2 pt-2">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="notations" role="tabpanel" aria-labelledby="notations-tab">
                                @forelse
                            </div>

                            <div class="tab-pane fade show" id="municipalities" role="tabpanel" aria-labelledby="municipalities-tab">
                                <table class="table table-sm mb-0">
                                    <tbody>
                                        @forelse ($municipalities as$municipality)
                                            <tr>
                                                <td @if ($loop->first) class="border-top-0" @endif>
                                                    <span class="badge badge-{{ $municipality->postal->charter_status }}">
                                                        <i class="fe fe-{{ $municipality->postal->charter_status }} mr-1"></i> 
                                                        {{ ucfirst($municipality->postal->charter_status) }}
                                                    </span>
                                                </td>
                            
                                                <td @if ($loop->first) class="border-top-0" @endif><strong>{{ $municipality->postal->code }}</strong></td>
                                                <td @if ($loop->first) class="border-top-0" @endif>{{ $municipality->name }}</td>
                                                <td @if ($loop->first) class="border-top-0" @endif>{{ $municipality->province->name }}</td>
                                                    
                                                <td @if ($loop->first) class="border-top-0" @endif>
                                                    <a href="{{ route('monitor.web.city', $municipality) }}" class="no-underline float-right mr-1">
                                                        <i class="fe fe-eye"></i> view
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <td colspan="5" class="border-top-0 text-secondary">
                                                <strong><i class="fe fe-info mr-1"></i></strong> The city doesn't have any municipalities.
                                            </td>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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