@extends('screens.layout.app')
@section('content')
    <h1>This Is Home Page</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore officiis exercitationem, facilis sint vero magnam qui
        a nihil necessitatibus maiores! Excepturi modi labore unde fugiat veritatis magnam cum iure ullam!</p>
    @if (auth()->user()->unreadNotifications->isNotEmpty())
        <span><b>Notifications : {{auth()->user()->unreadNotifications->count()}}</b></span><br>
        <a href="{{ route('markAllAsRead') }}">Mark All as Read</a><br>
    @endif

    @foreach (auth()->user()->unreadNotifications as $notification)
        {{ $notification->data['user']['name'] }} has just Registered at {{ $notification->created_at->diffForHumans() }}
        <a href="{{ route('markread', $notification->id) }}">Mark as Read</a><br>
    @endforeach
@endsection
