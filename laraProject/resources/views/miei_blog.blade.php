@extends('layout.body')
@section('title', 'miei_blog')

@section('content')

<h1 class="title_profile"> I tuoi blog </h1>
<hr size="3" align="center" width="90%" color="#008CBA" noshade>

<table class="table_blog">
    <tr>
    @if(count($blogs) == 0)
        <td class="td_container">
            <div class="container_blog" style="text-align: center;">
                <a href="{{ route('crea_blog') }}" style="text-decoration: none; color: black;">
                    <span aria-hidden="true"><i class="fa fa-plus" style="font-size: 80px; padding-top: 16%;"></i></span>
                </a>
            </div>
        </td>
        <td class="td_container">
        </td>
        <td class="td_container">
        </td>
    </tr>
    @endif
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
            <div class="container_blog" style="text-align: center;">
                <a href="{{ route('crea_blog') }}" style="text-decoration: none; color: black;">
                    <span aria-hidden="true"><i class="fa fa-plus" style="font-size: 80px; padding-top: 16%;"></i></span>
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
            @if ($i == count($blogs) - 1)
                @if (($i+1)%3 == 0)
                    </tr>
                    <tr>
                        <td class="td_container">
                            <div class="container_blog" style="text-align: center;">
                                <a href="{{ route('crea_blog') }}">
                                    <span aria-hidden="true"><i class="fa fa-plus" style="font-size: 80px; padding-top: 16%;"></i></span>
                                </a>
                            </div>
                        </td>
                @else
                    <td class="td_container">
                        <div class="container_blog" style="text-align: center;">
                            <a href="{{ route('crea_blog') }}" style="text-decoration: none; color: black;">
                                <span aria-hidden="true"><i class="fa fa-plus" style="font-size: 80px; padding-top: 16%;"></i></span>
                            </a>
                        </div>
                    </td>
                @endif
            @endif
        @endfor
    @endif

</table>

@endsection