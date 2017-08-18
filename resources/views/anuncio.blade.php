@extends('app')

@section('htmlheader_title')
    Home
@endsection
<script src="/assets/js/jquery-1.10.2.js" type="text/javascript"></script>
@section('main-content')
	<style>
		#cke_1_top{
			display: none;
		}
		#cke_editor1{
			border: 0px;
		}
		#cke_1_contents{
			height: 250px !important;
		}
		#cke_1_bottom{
			display: none;
		}
	</style>	
    <script>
    	$(document).ready(function () {
		  	var url = "/sumarvisit/{{$anuncio->id}}";
                $.get(url,function(resul){ 
            })
		});
    </script>
    <div id="main">
						<div class="inner">

							<!-- Header -->
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

							<!-- Content -->
								<section style="padding: 1%">
									<header class="main">
										<h2 style="display: inline-block;"> {{$anuncio->empresa}} </h2>
									</header>
									<div style="width: 100%;">
										<div class="divleft" style="display: inline-block; width: 70%">
											<script src="{{ asset('/ckeditor/ckeditor.js') }}"></script>
											<textarea class="ckeditor" name="texto" id="editor1" readonly >{{$anuncio->texto}}</textarea>
										</div>
										<div class="divright" style="display: inline-block; width: 29%; float: right;">
											<img style="width: 100%" src="/{{$anuncio->imagen}}">
											<div>
												<p style="width: 90%; text-align: center; font-size: 13px; margin-left: 5%">{{$anuncio->encabezado}}</p>
												<p style="text-align: center;"><b>Correo: {{$anuncio->correo}}</b></p>
												<p style="text-align: center;"><b>Teléfono: {{$anuncio->telf1}}</b></p>
											</div>
										</div>
									</div>								

								</section>
							<section style="margin-top: 7.5%">
								<header class="major">
				                    <h2>Más Visitados</h2>
				                </header>

				                <div class="posts">
				                    @foreach($mvistos as $anuncio)
				                        <article>
				                            <a href="#" class="image"><img src="/{{ $anuncio->imagen }}" alt="" /></a>
				                            <h3 style="display: inline-block; margin-right: 1%">{{ $anuncio->empresa }}</h3> {{ $anuncio->vistas }} <label class="fa fa-eye" style="display: inline-block;" ></label>
				                            <p>{{ $anuncio->encabezado }}</p>
				                            <ul class="actions">
				                                <li><a href="/Categoria/{{$nombre_cat}}/{{$anuncio->id}}" class="button">Más</a></li>
				                            </ul>
				                        </article>
				                    @endforeach                                        
				                </div>
				            </section>

						</div>
					</div>
@endsection


					

































