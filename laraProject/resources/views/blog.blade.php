@extends('layout.body')
@section('title', 'posts')

@section('content')

<div style="display: inline-block; width: 90%; height: 5%; margin-left: 0.5%;">
    <h1 class="title_profile" style="display: inline-block;"> Creatore  {{$blogcreator["Nome"]}} {{$blogcreator["Cognome"]}}  </h1>
    @if (Auth::user()->id == $blog->IDUtente)
        <a href="{{route('elimina_mioblog', [$blog->IDBlog])}}" class="send_request" style="float: right; color:black; font-size: 24px; margin-top: 2%;"><span aria-hidden="true"><i class="fa fa-trash"></i></span></a>
    @endif
    @can('isStaff')
        <a href="{{route('elimina_mioblog', [$blog->IDBlog])}}" class="send_request" style="float: right; color:black; font-size: 24px; margin-top: 2%;"><span aria-hidden="true"><i class="fa fa-trash"></i></span></a>
    @endcan
    @can('isAdmin')
        <a href="{{route('elimina_mioblog', [$blog->IDBlog])}}" class="send_request" style="float: right; color:black; font-size: 24px; margin-top: 2%;"><span aria-hidden="true"><i class="fa fa-trash"></i></span></a>
    @endcan
</div>
<hr size="3" align="center" width="90%" color="#008CBA" noshade>

<h1 class="title_profile" style="margin-left: 5%; width: 90%; height: fit-content; font-size: 50px; font-weight: 400;"> {{$blog->Titolo}} </h1>
<h1 class="title_profile" style="margin-left: 5%; width: 90%;"> {{$blog->Descrizione}} </h1>

<form action="{{ route('crea_post' , [$blog->IDBlog]) }}" method="post">
    @csrf
    <div class="container_new_post">
        <textarea class="textarea" style="width: 35.3%; height: 30%; margin-left: 30%; font-size: 24px; border: 1px solid rgb(216, 216, 216); padding: 50px 30px; border-radius: 20px;" name="Descrizione" cols="50" placeholder="A cosa stai pensando {{Auth::user()->Nome}}?"></textarea> 
        @if ($errors->first('Descrizione'))
            @foreach ($errors->get('Descrizione') as $message)
            <h3 style="color: #f93d00; margin-left: 30%;"> • {{ $message }}</h3>
            @endforeach  
        @endif
        <button class="sub3" style="width: 38.4%; margin-left: 30%; margin-top: 0; margin-bottom: 2%;" type="submit"> Pubblica </button>  
    </div>
</form>

@foreach($posts as $post)

    <div class="container_post">
        @foreach ($utenti as $user)
            @if ($user->id == $post->IDUtente)
                <i class="fa fa-user" style="font-size: 20px; display: inline-block; margin-left: 1%;"></i>
                <h1 class="title_profile" style="font-size: 28px; margin-top:0; margin-left: 3%; display: inline-block;"> {{$user->Nome}} {{$user->Cognome}}</h1>
                <h1 class="title_profile" style="font-size: 22px; margin-top:0; float: right; margin-right: 2%; display: inline-block;"> {{$post->Data}} </h1>
                <h1 class="title_profile" style="display: inline-block; font-size: 28px; width: 85%;">{{$post->Descrizione}}</h1>
                @if ($user->id == Auth::user()->id)
                    <form method="GET" action="{{route('cancella_post')}}" style="display: inline-block;">
                        <input type="hidden" name="idPost" value={{$post->IDPost}}>
                        <button type="submit" class="send_request" style="margin-left: 5%;"><span aria-hidden="true"><i class="fa fa-trash"></i></span></button>
                    </form>    
                @endif
                @can('isStaff')
                    <form method="GET" action="{{route('rimuovi_post')}}" style="display: inline-block;">
                        <input type="hidden" name="idPost" value={{$post->IDPost}}>
                        <input type="hidden" name="idUtente" value={{$user->id}}>
                        <button type="submit" class="send_request" style="margin-left: 5%;"><span aria-hidden="true"><i class="fa fa-trash"></i></span></button>
                    </form>
                @endcan
                @can('isAdmin')
                    <form method="GET" action="{{route('rimuovi_post')}}" style="display: inline-block;">
                        <input type="hidden" name="idPost" value={{$post->IDPost}}>
                        <input type="hidden" name="idUtente" value={{$user->id}}>
                        <button type="submit" class="send_request" style="margin-left: 5%;"><span aria-hidden="true"><i class="fa fa-trash"></i></span></button>
                    </form>                
                @endcan
                @break
            @endif 
        @endforeach
    </div>

@endforeach

@endsection