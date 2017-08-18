<?php

namespace App\Http\Controllers\TuSalud;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Anuncio;
use App\Models\Empresa;
class Anuncios extends Controller
{
    public function welcome(){
    	$categorias = Categoria::where('cod_subcat', '')->where('estado', 'A')->get();
    	$subcategorias = Categoria::where('cod_subcat', '!=','')->where('estado', 'A')->get();        
        $mvistos = Anuncio::where('estado', 'A')->get();
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
        foreach ($mvistos as $mvisto) {
            $empresa = Empresa::where('cod_emp', $mvisto->cod_emp)->first();
            $categ = Categoria::where('cod_cat', $mvisto->cod_cat)->first();
            $mvisto->empresa = $empresa->nombre;
            $mvisto->categoria = $categ->nombre;
        }
    	foreach ($categorias as $categoria) {
    		foreach($subcategorias as $subcategoria){    			
				if($subcategoria->cod_cat == $categoria->nombre){
					$categoria->tiene= 'si';
				}
    		}
    	}
    	return view('welcome')->with([
    		'categorias' => $categorias,
    		'subcategorias' => $subcategorias,
            'mvistos'    => $mvistos,
            'destacados' => $desta,
    	]);
    }
    public function search(Request $request){
        $data = $request;
        $categorias = Categoria::where('cod_subcat', '')->where('estado', 'A')->get();
        $subcategorias = Categoria::where('cod_subcat', '!=','')->where('estado', 'A')->get();        
        $mvistos = Anuncio::where('estado', 'A')->get();
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
        foreach ($mvistos as $mvisto) {
            $empresa = Empresa::where('cod_emp', $mvisto->cod_emp)->first();
            $mvisto->empresa = $empresa->nombre;
        }
        foreach ($categorias as $categoria) {
            foreach($subcategorias as $subcategoria){               
                if($subcategoria->cod_cat == $categoria->nombre){
                    $categoria->tiene= 'si';
                }
            }
        }

        $result = Anuncio::where('encabezado', 'LIKE', '%'.$data->search.'%')->get();
        $datos = [];
        for ($i=0; $i < count($result); $i++) { 
            $datos[$i] = new Anuncio();
        }
        $h=0;        
        foreach ($result as $resultado) {
            $datos[$h] = $resultado;
            if ($resultado->cod_subcat == '') {
                $categoria = Categoria::where('cod_cat', $resultado->cod_cat)->where('estado', 'A')->first();                
                $datos[$h]->categoria = $categoria->nombre;
            }else{
                $categoria = Categoria::where('cod_subcat', $resultado->cod_subcat)->where('estado', 'A')->first();
                $datos[$h]->categoria = $categoria->nombre;
            }
            $empresa = Empresa::where('cod_emp', $resultado->cod_emp)->first();
            $datos[$h]->empresa = $empresa->nombre;
            $h++;
            
        }
        if(count($result) > 0)
            return view('busqueda')->with([
                'categorias' => $categorias,
                'subcategorias' => $subcategorias,
                'mvistos'    => $mvistos,
                'destacados' => $desta,
                'resultados' => $datos,
            ]);
        else 
            return view('busqueda')->with([
                'categorias' => $categorias,
                'subcategorias' => $subcategorias,
                'mvistos'    => $mvistos,
                'destacados' => $desta,
                'resultados'  => $datos,
            ]);       
    }
}
