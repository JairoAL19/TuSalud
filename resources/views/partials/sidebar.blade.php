<div id="sidebar">
						<div class="inner2">

							<!-- Search -->
								<section id="search" class="alt">
									<form method="get" action="/search" role="search">
										<input type="text" name="search" id="query" placeholder="Buscar" />
									</form>
								</section>

							<!-- Menu -->
								<nav id="menu">
									<header class="major">
										<h2>Categorías</h2>
									</header>
									<ul>
										@foreach($categorias as $categoria)
											@if($categoria->tiene == 'si')
												<li>
													<span class="opener">{{$categoria->nombre}}</span>
													<ul>
														@foreach($subcategorias as $subcategoria)
															@if($subcategoria->cod_cat == $categoria->nombre)
																<li><a href="/SubCategoria/{{$categoria->nombre}}/{{$subcategoria->nombre}}">{{$subcategoria->nombre}}</a></li>
															@endif
														@endforeach
													</ul>
												</li>
											@else
												<li><a href="/Categoria/{{$categoria->nombre}}">{{$categoria->nombre}}</a></li>
											@endif
										@endforeach
									</ul>
								</nav>

							<!-- Section -->
								<section>
									<header class="major">
										<h2>Destacados en Salud</h2>
									</header>
									<div class="mini-posts">
										@foreach($destacados as $destacado)
											<article>
												<a href="/Categoria/{{$destacado->categoria}}/{{$destacado->id}}" class="image"><img src="/{{$destacado->imagen}}" alt="" /></a>
												<p>{{$destacado->encabezado}}</p>
											</article>
										@endforeach
									</div>
									<ul class="actions">
										<li><a href="#" class="button">More</a></li>
									</ul>
								</section>

							<!-- Section -->
								<section>
									<header class="major">
										<h2>Estar en Contacto</h2>
									</header>
									<p>Cualquier duda y/o sugerencia no dudes escribirnos a este correo, se responderá en la brevedad posible.</p>
									<ul class="contact">
										<li class="fa-envelope-o"><a href="#">info@tusalud.com</a></li>
										<li class="fa-phone">(01) 000-0000</li>
										<li class="fa-home">Lima - Perú</li>
									</ul>
								</section>

							<!-- Footer -->
								<footer id="footer">
									<p class="copyright">&copy; TuSalud. Todos los derechos reservados. Desarrollo & Diseño: <a href="https://tusalud.com.pe">TuSalud 2017</a>.</p>
								</footer>

						</div>
					</div>