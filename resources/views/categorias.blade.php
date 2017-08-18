@extends('app')

@section('htmlheader_title')
    Home
@endsection

@section('main-content')
    <div id="main">
        <div class="inner">
            <header id="header">
                <a href="/" class="logo"><strong>Tu Salud</strong> .com.pe</a>
                <ul class="icons">
                    <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
                    <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
                    <li><a href="#" class="icon fa-snapchat-ghost"><span class="label">Snapchat</span></a></li>
                    <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
                    <li><a href="#" class="icon fa-medium"><span class="label">Medium</span></a></li>
                </ul>
            </header>
            
            <section>
                <header class="major">
                    <h3>Categoría:  {{$categoria}}</h3>
                </header>

                <div class="posts">
                    @foreach($anuncios as $anuncio)
                        <article>
                            <a href="#" class="image"><img src="/{{ $anuncio->imagen }}" alt="" /></a>
                            <h3 style="display: inline-block; margin-right: 1%">{{ $anuncio->empresa }}</h3> {{ $anuncio->vistas }} <label class="fa fa-eye" style="display: inline-block;" ></label>
                            <p>{{ $anuncio->encabezado }}</p>
                            <ul class="actions">
                                <li><a href="{{$categoria}}/{{$anuncio->id}}" class="button">Más</a></li>
                            </ul>
                        </article>
                    @endforeach                                        
                </div>
            </section>
        </div>
    </div>
@endsection