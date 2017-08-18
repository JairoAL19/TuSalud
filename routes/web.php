<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'TuSalud\Anuncios@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/search', 'TuSalud\Anuncios@search')->name('search');


Route::get('/Categoria/{nombre}', 'TuSalud\Categorias@index')->name('Categoria');
Route::get('/Categoria/{nombre}/{id}', 'TuSalud\Categorias@index_seg')->name('Categoria_Sub');
Route::get('/SubCategoria/{nombre}/{sub}', 'TuSalud\Categorias@index_sub')->name('SubCategoria/CAT');
Route::get('/SubCategoria/{nombre}/{sub}/{id}', 'TuSalud\Categorias@index_sub_seg')->name('SubCategoria/CAT_seg');
Route::get('/sumarvisit/{id}', 'TuSalud\Categorias@sumarvisit')->name('sumarvisit');

Route::group(['prefix' => '','middleware' => 'auth'], function() {

	Route::get('/logout', 'HomeController@logout');

	Route::group(['prefix' => 'admin2055','middleware' => 'admin'], function() {

		Route::get('/', 'TuSalud\Admin@index')->name('admin2055');

		//CATEGORIAS

		Route::get('/categorias', 'TuSalud\Admin@index_categorias')->name('admin2055/categorias');
		Route::get('/categorias_I', 'TuSalud\Admin@index_categorias_I')->name('admin2055/categorias_I');
		Route::get('/categorias/crear', 'TuSalud\Admin@crear_categoria')->name('admin2055/categorias/crear');
		Route::post('/categorias/crear', 'TuSalud\Admin@crear_categoria_post')->name('admin2055/categorias/crear_post');

		Route::get('/activar/{id}', 'TuSalud\Admin@activar_cat')->name('activar_cat');
		Route::get('/desactivar/{id}', 'TuSalud\Admin@desactivar_cat')->name('desactivar_cat');		

		Route::get('/subcategorias', 'TuSalud\Admin@index_subcategorias')->name('admin2055/subcategorias');
		Route::get('/subcategorias_I', 'TuSalud\Admin@index_subcategorias_I')->name('admin2055/subcategorias_I');
		Route::get('/subcategorias/crear', 'TuSalud\Admin@crear_subcategoria')->name('admin2055/subcategorias/crear');
		Route::post('/subcategorias/crear', 'TuSalud\Admin@crear_subcategoria_post')->name('admin2055/subcategorias/crear_post');

		//ANUNCIOS

		Route::get('/anuncios', 'TuSalud\Admin@index_anuncios')->name('admin2055/anuncios');
		Route::get('/anuncios_I', 'TuSalud\Admin@index_anuncios_I')->name('admin2055/anuncios_I');
		Route::get('/anuncios/crear', 'TuSalud\Admin@crear_anuncio')->name('admin2055/anuncios/crear');
		Route::post('/anuncios/crear', 'TuSalud\Admin@crear_anuncio_post')->name('admin2055/anuncios/crear_post');
		Route::get('/activar_anu/{id}', 'TuSalud\Admin@activar_anu')->name('activar_anu');
		Route::get('/desactivar_anu/{id}', 'TuSalud\Admin@desactivar_anu')->name('desactivar_anu');		
		Route::get('/editar_anu/{id}', 'TuSalud\Admin@editar_anu')->name('editar_anu');	
		Route::post('/editar_anu/{id}', 'TuSalud\Admin@editar_anu_post')->name('editar_anu_post');	
		//EMPRESAS

		Route::get('/empresas', 'TuSalud\Admin@index_empresas')->name('admin2055/empresas');
		Route::get('/empresas_I', 'TuSalud\Admin@index_empresas_I')->name('admin2055/empresas_I');
		Route::get('/empresas/crear', 'TuSalud\Admin@crear_empresa')->name('admin2055/empresas/crear');
		Route::post('/empresas/crear', 'TuSalud\Admin@crear_empresa_post')->name('admin2055/empresas/crear_post');


		

	});
});