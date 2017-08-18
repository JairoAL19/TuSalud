<?php

namespace Illuminate\Foundation\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use App\Models\Categoria;
use App\Models\Anuncio;
use App\Models\Empresa;
trait RegistersUsers
{
    use RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
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

        return view('auth.register')->with([
            'categorias' => $categorias,
            'subcategorias' => $subcategorias,
            'mvistos'    => $mvistos,
            'destacados' => $desta,
        ]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }
}
