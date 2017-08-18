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

            <section id="banner" style="padding-bottom: 1%">
                <div class="content">
                    <header>
                        <h1>Bienvenido {{Auth::user()->name}}<br /> </h1>
                        <p>Estas en el panel de administrador</p>
                    </header>
                </div>
                <span class="image object">
                    <img src="images/logo_admin.jpg" alt="" />
                </span>
            </section>
        </div>        
    </div>
@endsection