<?php

namespace App\Http\Controllers\TuSalud;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Anuncio;
use App\Models\Empresa;
class Admin extends Controller
{
    public function index()
    {
        return view ('admin/index');
    }

    //CATEGORIAS
    public function index_categorias()
    {
    	$categorias = Categoria::where('cod_subcat', '')->where('estado', 'A')->get();
    	$cont = 1;
        return view ('admin/categorias')->with([
        	'categorias' => $categorias,
        	'cont'		 => $cont,
        ]);
    }
    public function index_categorias_I()
    {
    	$categorias = Categoria::where('cod_subcat', '')->where('estado', 'I')->get();
    	$cont = 1;
        return view ('admin/categorias')->with([
        	'categorias' => $categorias,
        	'cont'		 => $cont,
        ]);
    }
    public function crear_categoria(){
    	return view ('admin/crear_categoria');
    }
    public function crear_categoria_post(Request $request){
    	$data = $request;
    	if(!$data->cod_subcat){
    		$data->cod_subcat= '';
    	}
    	$categoria = new Categoria();
    	$categoria->estado = $data->estado;
    	$categoria->cod_cat = $data->cod_cat;
    	$categoria->cod_subcat = $data->cod_subcat;
    	$categoria->nombre = $data->nombre;
    	$categoria->save();
    	return redirect('/admin2055/categorias');
    }
    public function activar_cat($id){
        $categorias = Categoria::find($id);
        $categorias->estado = 'A';
        $categorias->save();
        return redirect()->back()->with('message', 'Se activo correctamente la categoría: '.$categorias->nombre);
    }
    public function desactivar_cat($id){
        $categorias = Categoria::find($id);
        $categorias->estado = 'I';
        $categorias->save();
        return redirect()->back()->with('message', 'Se Desactivo correctamente la categoría: '.$categorias->nombre);
    }
    //ENDCATEGORIAS

    //SUBCATEGORIAS
    public function index_subcategorias()
    {
    	$categorias = Categoria::where('cod_subcat', '!=','')->where('estado', 'A')->get();
    	$padre = Categoria::where('cod_subcat', '')->get();
    	$cont = 1;
        return view ('admin/subcategorias')->with([
        	'categorias' => $categorias,
        	'cont'		 => $cont,
        	'padre'		 => $padre,
        ]);
    }
    public function index_subcategorias_I()
    {
    	$categorias = Categoria::where('cod_subcat', '!=','')->where('estado', 'I')->get();
    	$padre = Categoria::where('cod_subcat', '')->get();
    	$cont = 1;
        return view ('admin/subcategorias')->with([
        	'categorias' => $categorias,
        	'cont'		 => $cont,
        	'padre'		 => $padre,
        ]);
    }
    public function crear_subcategoria(){
    	$categorias = Categoria::where('cod_subcat', '')->where('estado', 'A')->get();
    	return view ('admin/crear_subcategoria')->with([
        	'categorias' => $categorias,
        ]);
    }
    public function crear_subcategoria_post(Request $request){
    	$data = $request;
    	if(!$data->cod_subcat){
    		$data->cod_subcat= '';
    	}
    	$categoria = new Categoria();
    	$categoria->estado = $data->estado;
    	$categoria->cod_cat = $data->cod_cat;
    	$categoria->cod_subcat = $data->cod_subcat;
    	$categoria->nombre = $data->nombre;
    	$categoria->save();
    	return redirect('/admin2055/subcategorias');
    }
    //ENDSUBCATEGORIAS

    //ANUNCIOS

    public function index_anuncios()
    {
        $anuncios = Anuncio::where('estado', 'A')->get();
        $contar = count($anuncios);
        $data = [];
        for ($i=1; $i <= $contar; $i++) { 
            $data[$i] = new Anuncio();
        }
        $h=1;            
        foreach ($anuncios as $anuncio) {
            $categoria = Categoria::where('cod_cat', $anuncio->cod_cat)->first();
            $data[$h] = $anuncio;
            $data[$h]->categoria = $categoria->nombre;
            $h++;
        }
        $cont = 1;
        return view ('admin/anuncios')->with([
            'anuncios' => $data,
            'cont'       => $cont,
        ]);
    }
    public function index_anuncios_I()
    {
        $anuncios = Anuncio::where('estado', 'I')->get();
        $contar = count($anuncios);
        $data = [];
        for ($i=1; $i <= $contar; $i++) { 
            $data[$i] = new Anuncio();
        }
        $h=1;            
        foreach ($anuncios as $anuncio) {
            $categoria = Categoria::where('cod_cat', $anuncio->cod_cat)->first();
            $data[$h] = $anuncio;
            $data[$h]->categoria = $categoria->nombre;
            $h++;
        }
        $cont = 1;
        return view ('admin/anuncios')->with([
            'anuncios' => $data,
            'cont'       => $cont,
        ]);
    }
    public function crear_anuncio(){
        $categorias = Categoria::where('cod_subcat', '')->where('estado', 'A')->get();
        $empresas = Empresa::where('estado', 'A')->get();
        $subcategorias = Categoria::where('cod_subcat', '!=', '')->where('estado', 'A')->get();
        return view ('admin/crear_anuncio')->with([
            'categorias' => $categorias,
            'empresas'   => $empresas,
            'subcategorias' => $subcategorias
        ]);
    }
    public function crear_anuncio_post(Request $request){
        $data = $request;
        if(!$data->cod_emp){
            $data->cod_emp='';
        }
        if($data->cod_subcat == 'No'){
            $data->cod_subcat = '';
        }
        $anuncio = new Anuncio();
        $anuncio->cod_cat = $data->cod_cat;
        $anuncio->cod_subcat = $data->cod_subcat;
        $anuncio->cod_emp = $data->cod_emp;
        $anuncio->encabezado = $data->encabezado;
        $anuncio->texto = $data->texto;
        $anuncio->duracion = $data->duracion;
        $anuncio->destacado = $data->destacado;
        $anuncio->estado = $data->estado;
        $anuncio->vistas = $data->vistas;
        $anuncio->imagen = '';
        $anuncio->save();

        $nombre = $_FILES['imagen']['name'];
        $nombrer = strtolower($nombre);
        $cd=$_FILES['imagen']['tmp_name'];
        $ruta = "images/anuncios/".$anuncio->id.$_FILES['imagen']['name'];
        $destino = "images/anuncios/".$anuncio->id.$_FILES['imagen']['name'];
        $resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);            
        $anuncio->imagen = $destino;
        $anuncio->update();

        return redirect('/admin2055/anuncios');
    }
    public function activar_anu($id){
        $anuncio = Anuncio::find($id);
        $anuncio->estado = 'A';
        $anuncio->save();
        return redirect()->back()->with('message', 'Se activo correctamente el anuncio: '.$anuncio->id);
    }
    public function desactivar_anu($id){
        $anuncio = Anuncio::find($id);
        $anuncio->estado = 'I';
        $anuncio->save();
        return redirect()->back()->with('message', 'Se Desactivo correctamente el anuncio: '.$anuncio->id);
    }
    public function editar_anu($id){
        $anuncio = Anuncio::find($id);
        return view('admin/anuncios_editar')->with('anuncio', $anuncio);
    }
    public function editar_anu_post(Request $request, $id){
        $data = $request;
        $anuncio = Anuncio::find($id);
        $anuncio->estado= $data->estado;
        $anuncio->destacado= $data->destacado;
        $anuncio->duracion= $data->duracion;
        $anuncio->vistas= $data->vistas;
        $anuncio->encabezado= $data->encabezado;
        $anuncio->texto= $data->texto;

        $nombre = $_FILES['imagen']['name'];
        $nombrer = strtolower($nombre);
        $cd=$_FILES['imagen']['tmp_name'];
        $ruta = "images/anuncios/".$anuncio->id.$_FILES['imagen']['name'];
        $destino = "images/anuncios/".$anuncio->id.$_FILES['imagen']['name'];
        $resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);            
        $anuncio->imagen = $destino;

        $anuncio->update();
        return redirect('/admin2055/anuncios');
    }
    //ENDANUNCIOS

    //EMPRESAS

    public function index_empresas(){
        $empresas = Empresa::where('estado', 'A')->get();
        $cont = 1;
        return view ('admin/empresas')->with([
            'empresas' => $empresas,
            'cont'       => $cont,
        ]);
    }
    public function index_empresas_I(){
        $empresas = Empresa::where('estado', 'I')->get();
        $cont = 1;
        return view ('admin/empresas')->with([
            'empresas' => $empresas,
            'cont'       => $cont,
        ]);
    }
    public function crear_empresa(){
        return view ('admin/crear_empresa');
    }
    public function crear_empresa_post(Request $request){
        $data = $request;        
        $empresa = new Empresa();
        $empresa->estado = $data->estado;
        $empresa->cod_emp = $data->cod_emp;
        $empresa->nombre = $data->nombre;
        $empresa->direc = $data->direc;
        $empresa->telf1 = $data->telf1;
        $empresa->telf2 = $data->telf2;
        $empresa->correo = $data->correo;
        $empresa->save();
        return redirect('/admin2055/empresas');
    }
    //ENDEMPRESAS
}
