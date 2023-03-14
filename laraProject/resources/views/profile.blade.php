@extends('layout.body')
@section('title', 'Utente')

@section('content')
<div class="profile">
    <h1 class="title_profile" style="display: inline-block;"> I tuoi dati </h1>
    <a href="{{route('mostra_modifica_profilo')}}" class="link-hover"><button class="mod" style="display: inline-block;margin-left: 67%;">Modifica dati</button></a>
    <hr size="3" align="center" width="90%" color="#008CBA" noshade>
    
    <div class="user_profile1">
        <div class="user_data">
            <p class="user_camp1"  style="display: inline-block"> Nome </h1>
            <p class="user_data1"  style="display: inline-block"> {{ Auth::user()->Nome }} </p>
        </div>
        <div class="user_data">
            <p class="user_camp1" style="display: inline-block"> Cognome </p>
            <p class="user_data1" style="display: inline-block"> {{ Auth::user()->Cognome }} </p>
        </div>
        <div class="user_data">
            <p class="user_camp1" style="display: inline-block"> Indirizzo </p>
            <p class="user_data1" style="display: inline-block"> {{ Auth::user()->Indirizzo}}, {{Auth::user()->Città }} </p>
        </div>
        <div class="user_data">
            <p class="user_camp1" style="display: inline-block"> Telefono </p>
            <p class="user_data1" style="display: inline-block"> +39 {{ Auth::user()->Telefono }} </p>
        </div>
    </div>
    <div class="user_profile2">
        <div class="user_data">
            <p class="user_camp2" style="display: inline-block"> Codice Fiscale </p>
            <p class="user_data1" style="display: inline-block"> {{ Auth::user()->Codice_Fiscale }} </p>
        </div>
        <div class="user_data">
            <p class="user_camp2" style="display: inline-block"> Username </p>
            <p class="user_data1" style="display: inline-block"> {{ Auth::user()->Username }} </p>
        </div>
        @can('isUser')
            <div class="user_data">
                <p class="user_camp2" style="display: inline-block"> Visibilità </p>
                @if (Auth::user()->Visibilità == 's')
                    <p class="user_data1" style="display: inline-block"> Tutti </p>
                @else
                    <p class="user_data1" style="display: inline-block"> Solo amici </p>
                @endif
            </div>
        @endcan
        <div class="user_data">
            <p class="user_camp1" style="display: inline-block"> Anni </p>
            <p class="user_data1" style="display: inline-block"> {{ Auth::user()->Anni }} </p>
        </div>
    </div>
    <div class="user_data" style="margin-left: 13%">
        <p class="user_desc"> Descrizione: </p>
        <p class="user_data1" style="width: 80%; margin-left: 0"> {{Auth::user()->Descrizione}} </p>
    </div>
    @can('isUser')
        <div class="user_data" style="margin-left: 13%">
            <p class="user_desc" style="display: inline-block"> N° di amici </p>
            <p class="user_data1" style="display: inline-block"> {{$numAmici}} </p>
        </div>
        <div class="user_data" style="margin-left: 13%;">
            <p class="user_desc" style="display: inline-block; width: 11%;"> N° di blog creati </p>
            <p class="user_data1" style="display: inline-block; margin-left: 3%"> {{$numBlog}} </p>
        </div>
    @endcan
</div>
@endsection