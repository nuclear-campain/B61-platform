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

    <div class="container py-3">
        <div class="card card-body">
            @include('flash::message') {{-- Flash session view partial --}}

            <div class="table-responsive">
                <table class="table table-sm table-hover">
                    <thead>
                        <th scope="col" class="border-top-0">#</th>
                        <th scope="col" class="border-top-0">Name</th>
                        <th scope="col" class="border-top-0">Status</th>
                        <th scope="col" class="border-top-0">Email</th>
                        <th scope="col" class="border-top-0">Created at</th>
                        <th scope="col" class="border-top-0">&nbsp;</th>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td><strong>#{{ $user->id }}</strong></td>
                                <td>{{ $user->name }}</td>
                                
                                <td> {{-- Status indicator --}}
                                    @if($user->isOnline())
                                        <span class="badge badge-success">Online</span>
                                    @else {{-- The user is offline --}}
                                        <span class="badge badge-danger">Offline</span>
                                    @endif
                                </td> {{-- // End status indicator --}}

                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at->diffForHumans() }}</td>

                                <td> {{-- User options --}}
                                    <span class="float-right">
                                        @if ($user->trashed())
                                            <a href="{{ route('users.delete.undo', $user) }}" class="no-underline text-success"><i class="fe fe-rotate-ccw"></i></a>
                                        @else {{-- The user is active --}}
                                            <a href="{{ route('users.delete', $user) }}" class="no-underline text-danger"><i class="fe fe-user-x"></i></a>
                                        @endif
                                    </span>
                                </td> {{-- /// User options --}}
                            </tr>
                        @empty {{-- There are no users found with the matching criteria --}}
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection