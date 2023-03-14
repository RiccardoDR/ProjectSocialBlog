@extends('layout.body')
@section('title', 'Aggiungi staff')

@section('content')

<h1 class="title_profile"> Aggiungi membro staff </h1>
<hr size="3" align="center" width="90%" color="#008CBA" noshade>
<form method="POST" action="{{ route('aggiungi_staff') }}">
    @csrf
    <div class="user_profile1">
        <div class="user_data">
            <p class="user_camp1"  style="display: inline-block"> Nome </p>
            <input type="text" name="Nome">
            @if ($errors->first('Nome'))
                    @foreach ($errors->get('Nome') as $message)
                    <h3 style="color: #f93d00"> • {{ $message }}</h3>
                    @endforeach  
            @endif
        </div>
        <div class="user_data">
            <p class="user_camp1" style="display: inline-block"> Cognome </p>
            <input type="text" name="Cognome">
            @if ($errors->first('Cognome'))
                    @foreach ($errors->get('Cognome') as $message)
                    <h3 style="color: #f93d00"> • {{ $message }}</h3>
                    @endforeach  
            @endif
        </div>
        <div class="user_data">
            <p class="user_camp1" style="display: inline-block"> Telefono </p>
            <input type="text" name="Telefono">
            @if ($errors->first('Telefono'))
                    @foreach ($errors->get('Telefono') as $message)
                    <h3 style="color: #f93d00"> • {{ $message }}</h3>
                    @endforeach  
            @endif
        </div>
        <div class="user_data">
            <p class="user_camp1" style="display: inline-block"> Città </p>
            <input type="text" name="Città">
            @if ($errors->first('Cognome'))
                    @foreach ($errors->get('Città') as $message)
                    <h3 style="color: #f93d00"> • {{ $message }}</h3>
                    @endforeach  
            @endif
        </div>
        <div class="user_data">
            <p class="user_camp1" style="display: inline-block"> Indirizzo </p>
            <input type="text" name="Indirizzo">
            @if ($errors->first('Indirizzo'))
                    @foreach ($errors->get('Indirizzo') as $message)
                    <h3 style="color: #f93d00"> • {{ $message }}</h3>
                    @endforeach  
            @endif
        </div>
        <div class="user_data">
            <p class="user_camp1" style="display: inline-block"> Anni </p>
            <input type="text" name="Anni">
            @if ($errors->first('Anni'))
                    @foreach ($errors->get('Anni') as $message)
                    <h3 style="color: #f93d00"> • {{ $message }}</h3>
                    @endforeach  
            @endif
        </div>
    </div>
    <div class="user_profile2">
        <div class="user_data">
            <p class="user_camp2" style="display: inline-block"> Codice Fiscale </p>
            <input type="text" name="Codice_Fiscale">
            @if ($errors->first('Codice_Fiscale'))
                    @foreach ($errors->get('Codice_Fiscale') as $message)
                    <h3 style="color: #f93d00"> • {{ $message }}</h3>
                    @endforeach  
            @endif
        </div>
        <div class="user_data">
            <p class="user_camp2" style="display: inline-block"> Username </p>
            <input type="text" name="Username" id="Usern">
            @if ($errors->first('Username'))
                    @foreach ($errors->get('Username') as $message)
                    <h3 style="color: #f93d00"> • {{ $message }}</h3>
                    @endforeach  
            @endif
        </div>
        <div class="user_data">
            <p class="user_camp2" style="display: inline-block"> Password </p>
            <input type="password" name="password">
            @if ($errors->first('password'))
                    @foreach ($errors->get('password') as $message)
                    <h3 style="color: #f93d00"> • {{ $message }}</h3>
                    @endforeach  
            @endif
        </div>
        <div class="user_data">
            <p class="user_camp2" style="display: inline-block"> Conferma password </p>
            <input type="text" name="confermaPassword">
        </div>
    </div>
    <input type="hidden" name="livello" value="staff">
    <input type="hidden" name="Visibilità" value="n">
    <input type="hidden" name="Descrizione" value="N/A">
    <button class="mod" type="submit" style="width: 18%; margin-left:0%; margin-top: 3%; margin-bottom: 3%;">Conferma</button>
</form>

@endsection