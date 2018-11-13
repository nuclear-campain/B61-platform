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
                <div class="card shadow-sm">
                    <div class="pl-4 pr-4 card-header">
    {{ $city->postal->code}}, {{ $city->name}} <span class="float-right"><strong>(Information)</strong></span>
  </div>

  <div class="card-body">
    <table class="table table-borderless table-sm mb-0">
                                        <tbody>
                                            <tr>
                                                <th>City name:</th> <td>{{ $city->name }}</td>
                                                <th>Province: </th> <td>{{ $city->province->name }}</td>
                                            </tr>

                                            <tr>
                                                <th>Postal code:</th> <td>{{ $city->postal->code }} </td>
                                                <th>Charter:</th>     <td><span class="badge badge-success">Accepted</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
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