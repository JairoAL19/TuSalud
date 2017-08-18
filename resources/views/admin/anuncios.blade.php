@extends('app_admin')

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
            @if (Session::has('message'))
               <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif
            <section id="banner" style="padding: 0px">
                @include('partials.navbar_anuncios')                
            </section>
            <section style="padding: 0px">
                <table>
                    <tr>
                        <td>N°</td>
                        <td>Estado</td>
                        <td>Código Anuncio</td>
                        <td>Categoría</td>
                        <td>Empresa</td>
                        <td>Vencimiento</td>
                        <td>Vistas</td>
                        <td>Opciones</td>
                    </tr>
                    @foreach($anuncios as $anuncio)
                    <tr>
                        <td>{{$cont++}}</td>
                        @if($anuncio->estado == 'A')
                            <td><img style="width: 25px; margin-right: 5px" src="/images/verde.png">Activo</td>
                        @elseif($anuncio->estado == 'I')
                            <td><img style="width: 25px; margin-right: 5px" src="/images/rojo.png">Inactivo</td>
                        @endif
                        <td>{{$anuncio->id}}</td>
                        <td>{{$anuncio->categoria}}</td>
                        <td>{{$anuncio->cod_emp}}</td>
                        <td>{{$anuncio->duracion}}</td>
                        <td>{{$anuncio->vistas}}</td>
                        <td>
                            <a href="/admin2055/editar_anu/{{$anuncio->id}}"><img style="width: 32px" src="/images/editar.png"></a>
                            <a href="/admin2055/activar_anu/{{$anuncio->id}}"><img style="width: 32px" src="/images/activar.png"></a>
                            <a href="/admin2055/desactivar_anu/{{$anuncio->id}}"><img style="width: 32px" src="/images/desactivar.png"></a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </section>
        </div>        
    </div>
@endsection