@extends('layout.body')
@section('title', 'Messaggi')

@section('content')

<h1 class="title_profile"> I tuoi messaggi </h1>
<hr size="3" align="center" width="90%" color="#008CBA" noshade>

@if (count($messaggi) == 0)
    <p class="title_profile"> Nessun messaggio </p>
@else
    @for($i = count($messaggi) - 1; $i >= 0; $i--)

        @foreach($utenti as $utente)

            @if ($messaggi[$i]->IDUtenteRichiesta == $utente->id)

                <div class="container_user">
                    @if($messaggi[$i]->Richiesta == 0)
                        <h1 class="user_search_data" style="width: 90%"> L'utente {{$utente->Nome}} {{$utente->Cognome}} ha rifiutato la tua richiesta di amicizia </h1>
                    @endif
                    @if($messaggi[$i]->Richiesta == 1)
                        <h1 class="user_search_data" style="width: 90%"> L'utente {{$utente->Nome}} {{$utente->Cognome}} ha accettato la tua richiesta di amicizia </h1>
                    @endif
                    @if($messaggi[$i]->Richiesta == 2)
                        <h1 class="user_search_data" style="width: 90%"> L'utente {{$utente->Nome}} {{$utente->Cognome}} ti ha rimosso dagli amici </h1>
                    @endif
                    @if($messaggi[$i]->Richiesta == 3)
                        <h1 class="user_search_data" style="width: 90%"> Il tuo post viola i nostri standard della community, pertanto è stato eliminato </h1>
                    @endif
                </div>
                @break

            @endif

        @endforeach

    @endfor
@endif

@endsection