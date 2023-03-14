@extends('layout.body')
@section('title', 'cerca')

@section('content')

<h1 class="title_profile"> Persone trovate {{count($utenti)}}</h1>
<hr size="3" align="center" width="90%" color="#008CBA" noshade>
@if(count($utenti) == 0)
    <p class="title_profile"> Nessun risulato trovato </p>
    @else
        @foreach($utenti as $user)
            <div class="container_user">
                <h1 class="user_search_data"> {{$user->Nome}} {{$user->Cognome}} </h1>
                <h1 class="user_search_data" style="width: 15%;"> {{$user->Città}} </h1>
                <h1 class="user_search_data" style="width: 10%;"> Anni: {{$user->Anni}} </h1>
                @can('isUser')
                    @if (count($amici) == 0 &&  $user->id != Auth::user()->id)
                        <div class="button_send_request">
                            <form method="POST" action="{{route('richiesta')}}">
                                @csrf

                                <input type="hidden" name="id" value={{Auth::user()->id}}>
                                <input type="hidden" name="idAmico" value={{$user->id}}>
                                <button type="submit" class="send_request"><span aria-hidden="true"><i class="fa fa-user-plus"></i></span></button>
                            </form>
                        </div>
                        @if ($user->Visibilità == 's')
                            <div class="button_send_request">
                                <a href="{{route('profileUser', [$user->id])}}"><button class="send_request"><span aria-hidden="true"><i class="fa fa-user"></i></span></button></a>
                            </div>
                        @endif
                    @else
                        @for ($i = 0; $i < count($amici); $i++)
                            @if(($user->id == $amici[$i]->IDUtenteAmico && $amici[$i]->IDUtente == Auth::user()->id) || ($user->id == $amici[$i]->IDUtente && $amici[$i]->IDUtenteAmico == Auth::user()->id))
                                @if($amici[$i]->Amicizia == 0)
                                    @if($user->id == $amici[$i]->IDUtente && $amici[$i]->IDUtenteAmico == Auth::user()->id)
                                        <div class="button_send_request">
                                            <form method="POST" action="{{route('cancella_richiesta')}}">
                                                @csrf

                                                <input type="hidden" name="id" value={{Auth::user()->id}}>
                                                <input type="hidden" name="idAmico" value={{$user->id}}>
                                                <input type="hidden" name="Nome" value={{Auth::user()->Nome}}>
                                                <input type="hidden" name="Cognome" value={{Auth::user()->Cognome}}>
                                                <button type="submit" class="send_request" style="color: red"><span aria-hidden="true"><i class="fa fa-remove"></i></span></button>
                                            </form>
                                        </div>
                                        <div class="button_send_request">
                                            <form method="POST" action="{{route('accetta_richiesta')}}">
                                                @csrf

                                                <input type="hidden" name="id" value={{Auth::user()->id}}>
                                                <input type="hidden" name="idAmico" value={{$user->id}}>
                                                <input type="hidden" name="Nome" value={{Auth::user()->Nome}}>
                                                <input type="hidden" name="Cognome" value={{Auth::user()->Cognome}}>
                                                <button type="submit" class="send_request" style="color: green"><span aria-hidden="true"><i class="fa fa-check"></i></span></button>
                                            </form>
                                        </div>
                                        @if ($user->Visibilità == 's')
                                            <div class="button_send_request">
                                                <a href="{{route('profileUser', [$user->id])}}"><button class="send_request"><span aria-hidden="true"><i class="fa fa-user"></i></span></button></a>
                                            </div>
                                        @endif
                                        @break
                                    @else
                                        <div class="button_send_request">
                                            <a class="send_request" style="cursor: default"><span aria-hidden="true"><i class="fa fa-spinner"></i></span></a>
                                        </div>
                                        @if ($user->Visibilità == 's')
                                            <div class="button_send_request">
                                                <a href="{{route('profileUser', [$amici[$i]->IDUtenteAmico])}}"><button class="send_request"><span aria-hidden="true"><i class="fa fa-user"></i></span></button></a>
                                            </div>
                                        @endif
                                    @endif
                                @else
                                    <div class="button_send_request">
                                        @if ($amici[$i]->IDUtente == Auth::user()->id)
                                            <a href="{{route('profileUser', [$amici[$i]->IDUtenteAmico])}}"><button class="send_request"><span aria-hidden="true"><i class="fa fa-user"></i></span></button></a>
                                        @else
                                            <a href="{{route('profileUser', [$amici[$i]->IDUtente])}}"><button class="send_request"><span aria-hidden="true"><i class="fa fa-user"></i></span></button></a>
                                        @endif
                                    </div>
                                @endif
                                @break
                            @endif
                            @if($i == count($amici) - 1 && $user->id != Auth::user()->id)
                                <div class="button_send_request">
                                    <form method="POST" action="{{route('richiesta')}}">
                                        @csrf
                        
                                        <input type="hidden" name="id" value={{Auth::user()->id}}>
                                        <input type="hidden" name="idAmico" value={{$user->id}}>
                                        <button type="submit" class="send_request"><span aria-hidden="true"><i class="fa fa-user-plus"></i></span></button>
                                    </form>
                                </div>
                                @if ($user->Visibilità == 's')
                                    <div class="button_send_request">
                                        <a href="{{route('profileUser', [$user->id])}}"><button class="send_request"><span aria-hidden="true"><i class="fa fa-user"></i></span></button></a>
                                    </div>
                                @endif
                                @break
                            @endif
                        @endfor
                    @endif
                @endcan
                @can('isStaff')
                    <div class="button_send_request">
                        <a href="{{route('profileUser', [$user->id])}}"><button class="send_request"><span aria-hidden="true"><i class="fa fa-user"></i></span></button></a>
                    </div>
                @endcan
                @can('isAdmin')
                    <div class="button_send_request">
                        <a href="{{route('profileUser', [$user->id])}}"><button class="send_request"><span aria-hidden="true"><i class="fa fa-user"></i></span></button></a>
                    </div>
                @endcan
            </div>
        @endforeach
@endif

@endsection