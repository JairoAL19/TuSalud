<?php

namespace App\Http\Controllers\TuSalud;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Anuncio;
use App\Models\Empresa;
use Cache;
class Categorias extends Controller
{
    public function index($nombre)
    {
    	$categorias = Categoria::where('cod_subcat', '')->where('estado', 'A')->get();
    	$subcategorias = Categoria::where('cod_subcat', '!=','')->where('estado', 'A')->get();     
        $destacados = Anuncio::where('destacado', 'S')->where('estado', 'A')->inRandomOrder()->get();
        $desta = [];
        for ($i=0; $i <= 2; $i++) { 
            $desta[$i] = new Anuncio();
        }
        for ($i=0; $i <= 2; $i++) { 
            $desta[$i] = $destacados[$i];
        }
        foreach ($desta as $destac) {
            $categor = Categoria::where('cod_cat', $destac->cod_cat)->first();
            $destac->categoria = $categor->nombre;
        }
    	foreach ($categorias as $categoria) {
    		foreach($subcategorias as $subcategoria){    			
				if($subcategoria->cod_cat == $categoria->nombre){
					$categoria->tiene= 'si';
				}
    		}
    	}

    	$categoria = Categoria::where('nombre', $nombre)->first();
    	$ads = Anuncio::where('cod_cat', $categoria->cod_cat)->where('estado', 'A')->get();
    	$data = [];
    	$cont = count($ads);
    	for ($i=1; $i <= $cont; $i++) { 
    	 	$data[$i] = new Anuncio();
    	} 
    	$h=1;
    	foreach ($ads as $ad) {
    		$empresa = Empresa::where('cod_emp', $ad->cod_emp)->first();
    		$data[$h] = $ad;
    		$data[$h]->empresa = $empresa->nombre;
    		$h++;
    	}
        return view('categorias')->with([
    		'categorias' => $categorias,
    		'subcategorias' => $subcategorias,
            'destacados' => $desta,
            'anuncios' => $data,
            'categoria' => $nombre,
    	]);
    }
    public function index_sub($nombre, $sub)
    {
        $categorias = Categoria::where('cod_subcat', '')->where('estado', 'A')->get();
        $subcategorias = Categoria::where('cod_subcat', '!=','')->where('estado', 'A')->get();     
        $destacados = Anuncio::where('destacado', 'S')->where('estado', 'A')->inRandomOrder()->get();
        $desta = [];
        for ($i=0; $i <= 2; $i++) { 
            $desta[$i] = new Anuncio();
        }
        for ($i=0; $i <= 2; $i++) { 
            $desta[$i] = $destacados[$i];
        }
        foreach ($desta as $destac) {
            $categor = Categoria::where('cod_cat', $destac->cod_cat)->first();
            $destac->categoria = $categor->nombre;
        }
        foreach ($categorias as $categoria) {
            foreach($subcategorias as $subcategoria){               
                if($subcategoria->cod_cat == $categoria->nombre){
                    $categoria->tiene= 'si';
                }
            }
        }

        $categoria = Categoria::where('nombre', $sub)->first();
        $ads = Anuncio::where('cod_subcat', $categoria->cod_subcat)->where('estado', 'A')->get();
        $data = [];
        $cont = count($ads);
        for ($i=1; $i <= $cont; $i++) { 
            $data[$i] = new Anuncio();
        } 
        $h=1;
        foreach ($ads as $ad) {
            $empresa = Empresa::where('cod_emp', $ad->cod_emp)->first();
            $data[$h] = $ad;
            $data[$h]->empresa = $empresa->nombre;
            $h++;
        }
        return view('subcategorias')->with([
            'categorias' => $categorias,
            'subcategorias' => $subcategorias,
            'destacados' => $desta,
            'anuncios' => $data,
            'categoria' => $nombre,
            'subcategoria' => $categoria->nombre,
        ]);
    }
    public function index_seg($nombre, $id)
    {
        $categorias = Categoria::where('cod_subcat', '')->where('estado', 'A')->get();
        $subcategorias = Categoria::where('cod_subcat', '!=','')->where('estado', 'A')->get();     
        $destacados = Anuncio::where('destacado', 'S')->where('estado', 'A')->inRandomOrder()->get();
        $mvistos = Anuncio::where('estado', 'A')->get();
        $desta = [];
        for ($i=0; $i <= 2; $i++) { 
            $desta[$i] = new Anuncio();
        }
        for ($i=0; $i <= 2; $i++) { 
            $desta[$i] = $destacados[$i];
        }
        foreach ($desta as $destac) {
            $categor = Categoria::where('cod_cat', $destac->cod_cat)->first();
            $destac->categoria = $categor->nombre;
        }
        foreach ($categorias as $categoria) {
            foreach($subcategorias as $subcategoria){               
                if($subcategoria->cod_cat == $categoria->nombre){
                    $categoria->tiene= 'si';
                }
            }
        }
        foreach ($mvistos as $mvisto) {
            $empresa = Empresa::where('cod_emp', $mvisto->cod_emp)->first();
            $mvisto->empresa = $empresa->nombre;
        }
        $nombre_cat = Categoria::where('nombre', $nombre)->first();
        $anuncio = Anuncio::find($id);
        $empresa = Empresa::where('cod_emp', $anuncio->cod_emp)->first();
        $anuncio->empresa = $empresa->nombre;
        $anuncio->correo = $empresa->correo;
        $anuncio->telf1 = $empresa->telf1;
        return view('anuncio')->with([
            'anuncio' => $anuncio,
            'categorias' => $categorias,
            'nombre_cat' => $nombre_cat->nombre,
            'subcategorias' => $subcategorias,
            'destacados' => $desta,
            'mvistos'    => $mvistos,
        ]);
    }
    public function index_sub_seg($nombre, $sub, $id)
    {
        $categorias = Categoria::where('cod_subcat', '')->where('estado', 'A')->get();
        $subcategorias = Categoria::where('cod_subcat', '!=','')->where('estado', 'A')->get();     
        $destacados = Anuncio::where('destacado', 'S')->where('estado', 'A')->inRandomOrder()->get();
        $mvistos = Anuncio::where('estado', 'A')->get();
        $desta = [];
        for ($i=0; $i <= 2; $i++) { 
            $desta[$i] = new Anuncio();
        }
        for ($i=0; $i <= 2; $i++) { 
            $desta[$i] = $destacados[$i];
        }
        foreach ($desta as $destac) {
            $categor = Categoria::where('cod_cat', $destac->cod_cat)->first();
            $destac->categoria = $categor->nombre;
        }
        foreach ($categorias as $categoria) {
            foreach($subcategorias as $subcategoria){               
                if($subcategoria->cod_cat == $categoria->nombre){
                    $categoria->tiene= 'si';
                }
            }
        }
        foreach ($mvistos as $mvisto) {
            $empresa = Empresa::where('cod_emp', $mvisto->cod_emp)->first();
            $mvisto->empresa = $empresa->nombre;
        }
        $nombre_cat = Categoria::where('nombre', $nombre)->first();
        $anuncio = Anuncio::find($id);
        $empresa = Empresa::where('cod_emp', $anuncio->cod_emp)->first();
        $anuncio->empresa = $empresa->nombre;
        $anuncio->correo = $empresa->correo;
        $anuncio->telf1 = $empresa->telf1;
        return view('anuncio')->with([
            'anuncio' => $anuncio,
            'categorias' => $categorias,
            'nombre_cat' => $nombre_cat->nombre,
            'subcategorias' => $subcategorias,
            'destacados' => $desta,
            'mvistos'    => $mvistos,
        ]);
    }
    public function sumarvisit($id){
        $anuncio = Anuncio::find($id);
        if(Cache::has($id)==false){
            Cache::add($id,'contador',0.30);
            $anuncio->vistas = intval($anuncio->vistas)+1;
            $anuncio->save();
        }
    }
}
