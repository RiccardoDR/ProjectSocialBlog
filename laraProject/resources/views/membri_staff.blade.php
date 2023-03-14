@extends('layout.body')
@section('title', 'Membri staff')

@section('content')

<h1 class="title_profile"> Membri staff {{count($utenti)}} </h1>
<hr size="3" align="center" width="90%" color="#008CBA" noshade>
@if(count($utenti) == 0)
    <p class="title_profile"> Nessun membro staff </p>
    <div class="container_user">
        <h1 class="user_search_data"> Aggiungi un membro staff </h1>
        <div class="button_send_request">
            <a href="{{route('aggiungi_staff_view')}}"><button class="send_request"><span aria-hidden="true"><i class="fa fa-user-plus"></i></span></button></a>
        </div>
    </div>
@else
    @foreach($utenti as $user)
        <div class="container_user">
            <h1 class="user_search_data"> {{$user->Nome}} {{$user->Cognome}} </h1>
            <div class="button_send_request">
                <a href="{{route('rimuovi_staff', [$user->id])}}"><button class="send_request"><span aria-hidden="true"><i class="fa fa-trash"></i></span></button></a>
            </div>
        </div>
    @endforeach
    <div class="container_user">
        <h1 class="user_search_data"> Aggiungi un membro staff </h1>
        <div class="button_send_request">
            <a href="{{route('aggiungi_staff_view')}}"><button class="send_request"><span aria-hidden="true"><i class="fa fa-user-plus"></i></span></button></a>
        </div>
    </div>
@endif

@endsection