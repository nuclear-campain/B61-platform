@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">Users</h1>
            <div class="page-subtitle">Management panel</div>

            <div class="page-options d-flex">
                <a href="{{ route('users.create') }}" class="btn tw-rounded btn-primary mr-2">
                    <i class="fe fe-user-plus"></i>
                </a>

                <div class="btn-group">
                    <button type="button" class="btn tw-rounded btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fe mr-1 fe-filter"></i> Filter
                    </button>
                            
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('users.web.dashboard', ['filter' => 'all']) }}">All users</a>
                        <a class="dropdown-item" href="{{ route('users.web.dashboard', ['filter' => 'admin']) }}">Administrators</a>
                        <a class="dropdown-item" href="{{ route('users.web.dashboard', ['filter' => 'deactivated']) }}">Deactivated users</a>
                        <a class="dropdown-item" href="{{ route('users.web.dashboard', ['filter' => 'deleted']) }}">Deleted users</a>
                    </div>
                </div>
                    
                <form class="ml-2">
                    <input type="text" class="form-control" placeholder="Search user">
                </form>
            </div>
        </div>
    </div>
@endsection