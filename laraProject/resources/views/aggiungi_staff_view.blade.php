@extends('layout.body')
@section('title', 'Aggiungi staff')

@section('content')

<h1 class="title_profile"> Aggiungi membro staff </h1>
<hr size="3" align="center" width="90%" color="#008CBA" noshade>

    <form method="POST" action="{{ route('aggiungi_staff') }}">
        @csrf

        <div>
            <h1 class="title_profile" style="margin-left: 10%; font-size: 34px; width: 15%; display: inline-block;"> Nome: </h1>
            <input type="text" class="form-title" name="Nome" placeholder="Nome">
        </div>
        <div>
            <h1 class="title_profile" style="margin-left: 10%; font-size: 34px; width: 15%; display: inline-block;"> Cognome: </h1>
            <input type="text" class="form-title" name="Cognome" placeholder="Cognome">
        </div>
        <div>
            <h1 class="title_profile" style="margin-left: 10%; font-size: 34px; width: 15%; display: inline-block;"> Telefono: </h1>
            <input type="number" class="form-title" name="Telefono" placeholder="Telefono">
        </div>
        <div>
            <h1 class="title_profile" style="margin-left: 10%; font-size: 34px; width: 15%; display: inline-block;"> Città: </h1>
            <input type="text" class="form-title" name="Città" placeholder="Città">
        </div>
        <div>
            <h1 class="title_profile" style="margin-left: 10%; font-size: 34px; width: 15%; display: inline-block;"> Indirizzo: </h1>
            <input type="text" class="form-title" name="Indirizzo" placeholder="Indirizzo">
        </div>
        <div>
            <h1 class="title_profile" style="margin-left: 10%; font-size: 34px; width: 15%; display: inline-block;"> Anni: </h1>
            <input type="number" class="form-title" name="Anni" placeholder="Anni">
        </div>
        <div>
            <h1 class="title_profile" style="margin-left: 10%; font-size: 34px; width: 15%; display: inline-block;"> Codice Fiscale: </h1>
            <input type="text" class="form-title" name="Codice_Fiscale" placeholder="Codice Fiscale">
        </div>
        <div>
            <h1 class="title_profile" style="margin-left: 10%; font-size: 34px; width: 15%; display: inline-block;"> E-mail: </h1>
            <input type="text" class="form-title" name="email" placeholder="E-mail">
        </div>
        <div>
            <h1 class="title_profile" style="margin-left: 10%; font-size: 34px; width: 15%; display: inline-block;"> Password: </h1>
            <input type="password" class="form-title" name="password" placeholder="Password">
        </div>
        <input type="hidden" name="livello" value="staff">
        <input type="hidden" name="Visibilità" value="n">
        <input type="hidden" name="Descrizione" value="N/A">

        <button class="sub3" style="width: 40%; margin-left: 30%; margin-top: 3%; margin-bottom: 3%;" type="submit">Conferma</button>  
    </form>

@endsection