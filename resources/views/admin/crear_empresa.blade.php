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
                    <form action="/admin2055/empresas/crear" method="post">
                        <tr>
                            <td>1</td>
                            <td>
                                <select name="estado">
                                    <option value="A">Activo</option>
                                    <option value="I">Inactivo</option>
                                </select>
                            </td>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <td><input type="text" name="cod_emp"></td>
                            <td><input type="text" name="nombre"></td>
                            <td><input type="text" name="direc"></td>
                            <td><input type="text" name="telf1"></td>
                            <td><input type="text" name="telf2"></td>
                            <td><input type="text" name="correo"></td>
                            <td><input type="submit" name="enviar" value="Crear"></td>
                        </tr>
                    </form>
                </table>
            </section>
        </div>        
    </div>
@endsection