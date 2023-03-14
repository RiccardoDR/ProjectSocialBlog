@extends('layout.body')
@section('title', 'Utenti iscritti')

@section('content')

<h1 class="title_profile" style="display: inline-block;"> Utenti iscritti {{count($utenti)}} </h1>
<h1 class="title_profile" style="display: inline-block;"> Numero di blog creati: {{$numBlogs}} </h1>
<hr size="3" align="center" width="90%" color="#008CBA" noshade>
@if(count($utenti) == 0)
    <p class="title_profile"> Nessun utente iscritto </p>
    @else
        @foreach($utenti as $user)
            <div class="container_user">
                <h1 class="user_search_data"> {{$user->Nome}} {{$user->Cognome}} </h1>
                <h1 class="user_search_data" style="width: 15%;"> {{$user->Città}} </h1>
                <h1 class="user_search_data" style="width: 10%;"> Anni: {{$user->Anni}} </h1>
                <div class="button_send_request">
                    <a href="{{route('profileUser', [$user->id])}}"><button class="send_request"><span aria-hidden="true"><i class="fa fa-user"></i></span></button></a>
                </div>
            </div>
        @endforeach
@endif

@endsection