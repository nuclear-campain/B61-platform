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
                        <h6 class="border-bottom border-gray pb-1 mb-2">
                            @if ($type === 'all')
                                Your notifications
                            @else
                                Unread notifications
                            @endif
                        </h6>

                        @foreach ($notifications as $notification)
                            <div class="media small text-muted pt-2">
                                <img src="" alt="32x32" alt="{{ $notification->notifiable->name }}" class="mr-2 shadow-sm rounded" style="width: 32px; height: 32px;">
                                <div class="card w-100 card-text border-0 mb-0">
                                    <div class="w-100">
                                        <strong class="float-left text-gray-dark">{{ $notification->notifiable->name }}</strong> - {{ $notification->created_at->diffForHumans() }}</strong>

                                        @if ($notification->unread()) 
                                            <div class="float-right">
                                                <a href="" class="no-underline"><i class="fe fe-check"></i> 
                                                    Mark as read
                                                </a>
                                            </div> 
                                        @endif
                                    </div>

                                    {{ $notification->data['message'] }}
                                </div>
                            </div>

                            @if (! $loop->last) {{-- This notification is not the latest so we need a breakline --}}
                                <hr class="mt-2 mb-0">
                            @endif
                        @endforeach

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