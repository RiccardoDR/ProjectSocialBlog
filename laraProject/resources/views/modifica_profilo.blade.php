@extends('layout.body')
@section('title', 'prova')

@section('content')

<form class="profile" action="{{ route('modifica_profilo') }}" method="post" enctype="multipart/form-data">
    @csrf
    <h1 class="title_profile">Modifica dati </h1>
    <hr size="3" align="center" width="90%" color="#008CBA" noshade>
    <div class="user_profile1">
        <div class="user_data">
            <p class="user_camp1"  style="display: inline-block"> Nome </p>
            <input type="text" name="Nome" value="{{ old('Nome', Auth::user()->Nome) }}">
            @if ($errors->first('Nome'))
                    @foreach ($errors->get('Nome') as $message)
                    <h3 style="color: #f93d00"> • {{ $message }}</h3>
                    @endforeach  
            @endif
        </div>
        <div class="user_data">
            <p class="user_camp1" style="display: inline-block"> Cognome </p>
            <input type="text" name="Cognome" value="{{ old('Cognome', Auth::user()->Cognome) }}">
            @if ($errors->first('Cognome'))
                    @foreach ($errors->get('Cognome') as $message)
                    <h3 style="color: #f93d00"> • {{ $message }}</h3>
                    @endforeach  
            @endif
        </div>
        <div class="user_data">
            <p class="user_camp1" style="display: inline-block"> Indirizzo </p>
            <input type="text" name="Indirizzo" value="{{ old('Indirizzo', Auth::user()->Indirizzo) }}">
            @if ($errors->first('Indirizzo'))
                    @foreach ($errors->get('Indirizzo') as $message)
                    <h3 style="color: #f93d00"> • {{ $message }}</h3>
                    @endforeach  
            @endif
        </div>
        <div class="user_data">
            <p class="user_camp1" style="display: inline-block"> Città </p>
            <input type="text" name="Città" value="{{ old('Città', Auth::user()->Città) }}">
            @if ($errors->first('Cognome'))
                    @foreach ($errors->get('Città') as $message)
                    <h3 style="color: #f93d00"> • {{ $message }}</h3>
                    @endforeach  
            @endif
        </div>
        <div class="user_data">
            <p class="user_camp1" style="display: inline-block"> Telefono </p>
            <input type="text" name="Telefono" value="{{ old('Telefono', Auth::user()->Telefono) }}">
            @if ($errors->first('Telefono'))
                    @foreach ($errors->get('Telefono') as $message)
                    <h3 style="color: #f93d00"> • {{ $message }}</h3>
                    @endforeach  
            @endif
        </div>
    </div>
    <div class="user_profile2">
        <div class="user_data">
            <p class="user_camp2" style="display: inline-block"> Codice Fiscale </p>
            <input type="text" name="Codice_Fiscale" value="{{ old('Codice_Fiscale', Auth::user()->Codice_Fiscale) }}">
            @if ($errors->first('Codice_Fiscale'))
                    @foreach ($errors->get('Codice_Fiscale') as $message)
                    <h3 style="color: #f93d00"> • {{ $message }}</h3>
                    @endforeach  
            @endif
        </div>
        <div class="user_data">
            <p class="user_camp2" style="display: inline-block"> Visibilità </p>
            <input type="radio" id="visible" value="s" name="Visibilità" checked>
                <label for="visible">Si</label>
                <input type="radio" id="invisible" value="n" name="Visibilità">
                <label for="invisible">No</label><br>
            @if ($errors->first('Visibilità'))
                    @foreach ($errors->get('Visibilità') as $message)
                    <h3 style="color: #f93d00"> • {{ $message }}</h3>
                    @endforeach  
            @endif
        </div>
        <div class="user_data">
            <p class="user_camp1" style="display: inline-block"> Anni </p>
            <input type="text" name="Anni" value="{{ old('Anni', Auth::user()->Anni) }}">
            @if ($errors->first('Anni'))
                    @foreach ($errors->get('Anni') as $message)
                    <h3 style="color: #f93d00"> • {{ $message }}</h3>
                    @endforeach  
            @endif
        </div>
        <div class="user_data" style="display: inline-block">
            <p class="user_desc"> Descrizione: </p>
            <input type="text" style="width: 30%; resize: none; height: 50px; border-radius: 5px;" name="Descrizione" value="{{ old('Descrizione', Auth::user()->Descrizione) }}">
                @if ($errors->first('Descrizione'))
                        @foreach ($errors->get('Descrizione') as $message)
                        <h3 style="color: #f93d00"> • {{ $message }}</h3>
                        @endforeach  
                @endif
        </div>
    </div>
    <div>
        <button class="mod" type="submit" style="margin-bottom: 3%; margin-top: 2%; margin-left: 13%;">Conferma</button>
    </div>
</form>
@endsection