@extends('layouts.base')

@section('content')
    <div class="container">
        @livewire('chat.message', ['users' => $users, 'messages' => $messages ?? null])
    </div>
@endsection
