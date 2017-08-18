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

            <section id="banner" style="padding-bottom: 1%">
                <div class="content">
                    <header>
                        <h1>TuSalud<br /> </h1>
                        <p>Especialistas en Salud</p>
                    </header>
                    <p>El portal donde encontrarás a los mejores especialistas en Salud, somos el unico portal de salud donde tú calificas el nivel de atención.</p>
                    <ul class="actions">
                        <li><a href="#" class="button big">Conocenos</a></li>
                    </ul>
                </div>
                <span class="image object">
                    <img src="images/logo_3.png" alt="" />
                </span>
            </section>

            <section style="padding-top: 3%">
                <header class="major">
                    <h2>¿Quiénes Somos?</h2>
                </header>
                <div class="features">
                    <article>
                        <span class="icon fa-diamond"></span>
                        <div class="content">
                            <h3>Portafolio Estrella</h3>
                            <p>Contamos con reconocidos especialistas en distintas área de la salud, seleccionados de manera exigente y calificados por nuestros propios usuarios.</p>
                        </div>
                    </article>

                    <article>
                        <span class="icon fa-paper-plane"></span>
                        <div class="content">
                            <h3>Contacto Directo</h3>
                            <p>Nuestra plataforma te permite tener un contacto directo con el especialista seleccionado, por medio de chats, correos o llamadas.</p>
                        </div>
                    </article>

                    <article>
                        <span class="icon fa-rocket"></span>
                        <div class="content">
                            <h3>Prioridad de Atención</h3>
                            <p>Las empresas y particulares asociados a TuSalud dan prioridad de servicio a las consultas y solicitudes llegadas desde nuestro portal.</p>
                        </div>
                    </article>

                    <article>
                        <span class="icon fa-signal"></span>
                        <div class="content">
                            <h3>Calificaciones diárias</h3>
                            <p>Las calificaciones se actulizan todos los días para que usted tenga una información actual y segura al momento de elegir.</p>
                        </div>
                    </article>
                </div>
            </section>

            <section>
                <header class="major">
                    <h2>Más Visitados</h2>
                </header>

                <div class="posts">
                    @foreach($mvistos as $anuncio)
                        <article>
                            <a href="#" class="image"><img src="{{ $anuncio->imagen }}" alt="" /></a>
                            <h3 style="display: inline-block; margin-right: 1%">{{ $anuncio->empresa }}</h3> {{ $anuncio->vistas }} <label class="fa fa-eye" style="display: inline-block;" ></label>
                            <p>{{ $anuncio->encabezado }}</p>
                            <ul class="actions">
                                <li><a href="/Categoria/{{$anuncio->categoria}}/{{$anuncio->id}}" class="button">Más</a></li>
                            </ul>
                        </article>
                    @endforeach                                        
                </div>
            </section>
        </div>
    </div>

@endsection