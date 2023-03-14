@extends('layout.body')
@section('title', 'miei_blog')

@section('content')

<h1 class="title_profile"> {{$user->Nome}} {{$user->Cognome}} </h1>
<hr size="3" align="center" width="90%" color="#008CBA" noshade>

<div style="display: inline-block; width: 90%;">
    <div style="display: inline-block; width: 10%; margin-left: 5.5%;">
        <h1 class="title_profile" style="display: inline-block; font-size: 28px;"> Anni: </h1>
        <h1 class="title_profile" style="display: inline-block; margin-left: 3%; font-size: 28px;"> {{$user->Anni}} </h1>
    </div>
    <div style="display: inline-block; width: 20%;">
        <h1 class="title_profile" style="display: inline-block; font-size: 28px;"> N° di amici: </h1>
        <h1 class="title_profile" style="display: inline-block; margin-left: 3%; font-size: 28px;"> {{$numAmici}} </h1>
    </div>
    @can('isAdmin')
        <div style="display: inline-block; width: 20%;">
            <a href="{{route('amici_user', [$user->id])}}" class="title_profile" style="text-decoration: underline; color: black; cursor: pointer;"> Visualizza amici </a>
        </div>
    @endcan
    <div>
        <h1 class="title_profile" style="font-size: 28px; margin-left: 6%;"> Profilo: </h1>
        <h1 class="title_profile" style="width: 100%; font-size: 28px; margin-left: 6%;"> {{$user->Descrizione}} </h1>
    </div>
</div>
<div>
    <h1 class="title_profile"> I suoi blog </h1>
    <hr size="3" align="center" width="90%" color="#008CBA" noshade>
    @if(count($blogs) == 0)
        <p class="title_profile"> Nessun Blog creato </p>
    @endif
    <table class="table_blog">
        <tr>
        @if(count($blogs) == 1)
            <td class="td_container">
                <div class="container_blog"> 
                    <a href="{{route('blog', [$blogs[0]->IDBlog])}}" style="text-decoration: none; color: black; padding-top: 16%;">
                        <h1 class="blog_data" style="padding-top: 10%; font-style: italic;"> <b>Titolo :</b> {{$blogs[0]->Titolo}} </h1> 
                        <h1 class="blog_data" style="width: 80%; font-style: italic;"> <b>Descrizione :</b> {{$blogs[0]->Descrizione}} </h1> 
                    </a>
                </div>
            </td>
            <td class="td_container">
            </td>
            <td class="td_container">
            </td>
            </tr>
        @else
            @if(count($blogs) == 2)
                <td class="td_container">
                    <div class="container_blog"> 
                        <a href="{{route('blog', [$blogs[0]->IDBlog])}}" style="text-decoration: none; color: black; padding-top: 16%;">
                            <h1 class="blog_data" style="padding-top: 10%; font-style: italic;"> <b>Titolo :</b> {{$blogs[0]->Titolo}} </h1> 
                            <h1 class="blog_data" style="width: 80%; font-style: italic;"> <b>Descrizione :</b> {{$blogs[0]->Descrizione}} </h1> 
                        </a>
                    </div>
                </td>
                <td class="td_container">
                    <div class="container_blog"> 
                        <a href="{{route('blog', [$blogs[1]->IDBlog])}}" style="text-decoration: none; color: black; padding-top: 16%;">
                            <h1 class="blog_data" style="padding-top: 10%; font-style: italic;"> <b>Titolo :</b> {{$blogs[1]->Titolo}} </h1> 
                            <h1 class="blog_data" style="width: 80%; font-style: italic;"> <b>Descrizione :</b> {{$blogs[1]->Descrizione}} </h1> 
                        </a>
                    </div>
                </td>
                <td class="td_container">
                </td>
                </tr>
            @else
                @for ($i = 0;$i < count($blogs); $i++)
                    @if ($i%3 == 0)
                        </tr> 
                        <tr>
                            <td class="td_container">
                                <div class="container_blog"> 
                                    <a href="{{route('blog', [$blogs[$i]->IDBlog])}}" style="text-decoration: none; color: black;">
                                        <h1 class="blog_data" style="padding-top: 10%; font-style: italic;"> <b>Titolo :</b> {{$blogs[$i]->Titolo}} </h1> 
                                        <h1 class="blog_data" style="width: 80%; font-style: italic;"> <b>Descrizione :</b> {{$blogs[$i]->Descrizione}} </h1> 
                                    </a>
                                </div>
                            </td>
                    @else
                        <td class="td_container">
                            <div class="container_blog"> 
                                <a href="{{route('blog', [$blogs[$i]->IDBlog])}}" style="text-decoration: none; color: black; padding-top: 16%;">
                                    <h1 class="blog_data" style="padding-top: 10%; font-style: italic;"> <b>Titolo :</b> {{$blogs[$i]->Titolo}} </h1> 
                                    <h1 class="blog_data" style="width: 80%; font-style: italic;"> <b>Descrizione :</b> {{$blogs[$i]->Descrizione}} </h1> 
                                </a>
                            </div>
                        </td>
                    @endif
                @endfor
                </tr>
            @endif
        @endif
    </table>
</div>

@endsection