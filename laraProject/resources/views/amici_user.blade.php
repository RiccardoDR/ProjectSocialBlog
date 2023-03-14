@extends('layout.body')
@section('title', 'Amici')

@section('content')

<h1 class="title_profile"> Amici di {{$user->Nome}} </h1>
<hr size="3" align="center" width="90%" color="#008CBA" noshade>
@if(count($friends) == 0)
    <p class="title_profile"> Nessun amico trovato </p>
@else
    <div class="container_user">
        @foreach($friends as $friend)
            @if ($friend->IDUtente == $user->id)
                <h1 class="user_search_data"> {{$users[$friend->IDUtenteAmico - 1]->Nome}} {{$users[$friend->IDUtenteAmico - 1]->Cognome}} </h1>
                <div class="button_send_request">
                    <a href="{{route('profileUser', [$users[$friend->IDUtenteAmico - 1]->id])}}"><button class="send_request"><span aria-hidden="true"><i class="fa fa-user"></i></span></button></a>
                </div>
            @else
                <h1 class="user_search_data"> {{$users[$friend->IDUtente - 1]->Nome}} {{$users[$friend->IDUtente - 1]->Cognome}} </h1>
                <div class="button_send_request">
                    <a href="{{route('profileUser', [$users[$friend->IDUtente - 1]->id])}}"><button class="send_request"><span aria-hidden="true"><i class="fa fa-user"></i></span></button></a>
                </div>
            @endif
        @endforeach
    </div>
@endif

@endsection