@extends('layout.body')
@section('title', 'Home')
    
@section('content')
<div class="container">
    <img class="opacity" src="{{asset('images/social.jpg')}}" alt="social" width="100%" height="100%">
    <div class="center">
        <h1>Incontra gente nuova</h1>
        <p>Stringi nuove amicizie pubblicando, commentando nuovi post</p>
    </div>
    <div class="relative">
        <div class="absolute" style="margin-left: 50%">
            <h1 style="margin-block:auto;">SCOPO</h1>
            <p style="margin-block:auto; font-size: 20px">Questo social &egrave; un 
            portale web pensato per far interagire gli utenti, per scambiare 
            informazioni e per socializzare. Le connessioni create 
            da questi strumenti consentono di creare delle reti sociali che uniscono 
            gli utilizzatori attraverso legami di conoscenza, rapporti di lavoro e 
            vincoli famigliari.</p>
        </div>
        <div class="absolute2">
            <h1 style="margin-block:auto;">REGOLAMENTO</h1>
            <p style="margin-block:auto; font-size: 20px">Lo spirito delle regole non 
            è limitare la libertà di pensiero di chi vi partecipa ma è finalizzato 
            alla tutela dei temi trattati e soprattutto alla tutela dei partecipanti.
            Leggete attentamente questa pagina:la conoscenza ed il rispetto di 
            queste semplici regole sono fondamentali per il buon funzionamento 
            dei servizi della Community.Gli utenti devono impegnarsi a rispettare 
            queste regole</p>
        </div>
    </div>
</div>
@endsection