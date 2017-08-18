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
                @include('partials.navbar_empresas')                
            </section>
            <section style="padding: 0px">
                <table>
                    <tr>
                        <td>N°</td>
                        <td>Estado</td>
                        <td>Código Empresa</td>
                        <td>Nombre</td>
                        <td>Dirección</td>
                        <td>Teléfono #1</td>
                        <td>Teléfono #2</td>
                        <td>Correo</td>
                        <td>Opciones</td>
                    </tr>
                    @foreach($empresas as $empresa)
                    <tr>
                        <td>{{$cont++}}</td>
                        @if($empresa->estado == 'A')
                            <td><img style="width: 25px; margin-right: 5px" src="/images/verde.png">Activo</td>
                        @elseif($empresa->estado == 'I')
                            <td><img style="width: 25px; margin-right: 5px" src="/images/rojo.png">Inactivo</td>
                        @endif
                        <td>{{$empresa->id}}</td>
                        <td>{{$empresa->nombre}}</td>
                        <td>{{$empresa->direc}}</td>
                        <td>{{$empresa->telf1}}</td>
                        <td>{{$empresa->telf2}}</td>
                        <td>{{$empresa->correo}}</td>
                        <td>
                            <img style="width: 32px" src="/images/editar.png">
                            <a href="/admin2055/activar_emp/{{$empresa->id}}"><img style="width: 32px" src="/images/activar.png"></a>
                            <a href="/admin2055/desactivar_emp/{{$empresa->id}}"><img style="width: 32px" src="/images/desactivar.png"></a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </section>
        </div>        
    </div>
@endsection