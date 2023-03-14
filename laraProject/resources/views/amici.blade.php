@extends('layout.body')
@section('title', 'Amici')

@section('content')

@php
    function findObjectById($id, $utenti) {
        foreach ($utenti as $element) {
            if ($id == $element->id) {
                return $element;
            }
        }
    }
@endphp

<div style="display: inline-block; width: 40%; margin-left: 3%;">
    <h1 class="title_profile" style="display: inline-block;"> Richieste di amicizia </h1>
</div>
<div style="display: inline-block; width: 40%; margin-left: 9.6%;">
    <h1 class="title_profile" style="display: inline-block;"> I tuoi amici </h1>
    <h1 class="title_profile" style="float: right; display: inline-block;"> {{$numAmici}} </h1>
</div>

<hr size="3" width="40%" color="#008CBA" style="margin-left: 5%; display: inline-block" noshade>
<hr size="3" width="40%" color="#008CBA" style="margin-left: 9.6%; display: inline-block" noshade>

<div class="container_richieste" style="width: 40%; margin-left: 5%; display: inline-block;">
    @foreach($amici as $amico)

        @if ($amico->Amicizia == 0)
            <div class="div_richieste">
                @if ($amico->IDUtente == Auth::user()->id)
                    @php
                        $utente = findObjectById($amico->IDUtenteAmico, $utenti)
                    @endphp
                    <h1 class="user_search_data" style="width: 85%; display: inline-block;"> {{$utente->Nome}} {{$utente->Cognome}} </h1>
                    <a class="send_request" style="margin-left: 7%; cursor: default"><span aria-hidden="true"><i class="fa fa-spinner"></i></span></a>
                @else
                    @php
                        $utente = findObjectById($amico->IDUtente, $utenti)
                    @endphp
                    <h1 class="user_search_data" style="width: 85%; display: inline-block;"> {{$utente->Nome}} {{$utente->Cognome}} </h1>
                    <div class="button_send_request" style="margin-top: 2%; margin-right: 2%;">
                        <form action="{{route('cancella_richiesta')}}" method="post">
                            @csrf

                            <input type="hidden" name="id" value={{Auth::user()->id}}>
                            <input type="hidden" name="idAmico" value={{$amico->IDUtente}}>
                            <button type="submit" class="send_request" style="color: red"><span aria-hidden="true"><i class="fa fa-remove"></i></span></button>
                        </form>
                    </div>
                    <div class="button_send_request" style="margin-top: 2%; margin-right: 4%;">
                        <form action="{{route('accetta_richiesta')}}" method="post">
                            @csrf

                            <input type="hidden" name="id" value={{Auth::user()->id}}>
                            <input type="hidden" name="idAmico" value={{$amico->IDUtente}}>
                            <button type="submit" class="send_request" style="color: green"><span aria-hidden="true"><i class="fa fa-check"></i></span></button>
                        </form>
                    </div>           
                @endif
            </div>
        @endif

    @endforeach
</div>
<div class="container_amici" style="width: 40%; margin-left: 9.6%; display: inline-block;">
    @foreach($amici as $amico)

        @if ($amico->Amicizia == 1)
            <div class="div_amici">
                @if ($amico->IDUtente == Auth::user()->id)
                    @php
                        $utente = findObjectById($amico->IDUtenteAmico, $utenti)
                    @endphp
                    <h1 class="user_search_data" style="width: fit-content; display: inline-block;"> {{$utente->Nome}} {{$utente->Cognome}} </h1>
                    <a href="{{route('elimina_amico', [$amico->IDUtenteAmico, Auth::user()->id])}}"><button class="send_request" style="color: red; font-size: 26px; float: right; margin-top: 1.7%; margin-left: 2%; margin-right: 2%;"><span aria-hidden="true"><i class="fa fa-remove"></i></span></button></a>
                    <a href="{{route('profileUser', [$amico->IDUtenteAmico])}}"><button class="send_request" style="float: right; margin-top: 2%; margin-left: 2%; margin-right: 2%;"><span aria-hidden="true"><i class="fa fa-user"></i></span></button></a>
                @else
                    @php
                        $utente = findObjectById($amico->IDUtente, $utenti)
                    @endphp
                    <h1 class="user_search_data" style="width: fit-content; display: inline-block;"> {{$utente->Nome}} {{$utente->Cognome}} </h1>
                    <a href="{{route('elimina_amico', [$amico->IDUtente, Auth::user()->id])}}"><button class="send_request" style="color: red; font-size: 26px; float: right; margin-top: 1.7%; margin-left: 2%; margin-right: 2%;"><span aria-hidden="true"><i class="fa fa-remove"></i></span></button></a>
                    <a href="{{route('profileUser', [$amico->IDUtente])}}"><button class="send_request" style="float: right; margin-top: 2%; margin-left: 2%; margin-right: 2%;"><span aria-hidden="true"><i class="fa fa-user"></i></span></button></a>
                @endif
            </div>
        @endif

    @endforeach
</div>

@endsection