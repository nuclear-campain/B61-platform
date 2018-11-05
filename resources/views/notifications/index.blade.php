@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">Notifications</h1>

            <div class="page-options d-flex">
                @php ($userNotifications = Auth::user()->unreadNotifications()->count())

                <a href="{{ route('notifications.markAll') }}" class="btn @if ($userNotifications === 0) disabled @endif btn-outline-primary tw-rounded">
                    <span class="fe fe-bell-off mr-1"></span> Mark all as read
                </a>
            </div>
        </div>
    </div>

    <div class="container py-3">
        <div class="row">
            <div class="col-md-3"> {{-- Sidebar --}}
               <div class="list-group mb-4">
                    <a href="{{ route('notifications.index') }}" class="list-group-item list-group-item-action">
                        Unread notifications
                    </a>

                    <a href="{{ route('notifications.index', ['type' => 'all']) }}" class="list-group-item list-group-item-action">
                        All notifications
                    </a>
                </div>
            </div> {{-- /// END sidebar --}}

            <div class="col-md-9"> {{-- Content --}}
                @if (count($notifications) > 0) {{-- There are notifications found in the application --}}
                    <div class="card card-body">
                        {{ $notifications->links() }} {{-- Paginator view instance --}}
                    </div>
                    @else {{-- There are no notifications found in the application --}}
                <div class="notifications shadow-sm">
                    <h3>No notifications</h3>
                    <p class="pt-2">
                        @if ($type === 'all')
                            Looks like that we currently have no notifications for u!
                        @else {{-- Unread notifications --}}
                            Looks like you've read all your notifications.
                        @endif
                    </p>
                </div>

                @endif {{-- /// END notification loop --}}
            </div> {{-- /// END content --}}
        </div>
    </div>
@endsection