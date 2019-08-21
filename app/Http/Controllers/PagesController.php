<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CreateMessageRequest;

class PagesController extends Controller
{

	public function __construct()
	{
		// $this->middleware('example', ['only' => ['home']]);
		// $this->middleware('example', ['except' => ['home']]);
	}

    public function home()
    {
    	return view('home');
    }

    public function mensajes(CreateMessageRequest $request)
    {
    	// if ($request->nombre) {    	
    	// 	return "Si ingreso un nombre. Es " . $request->input('nombre') ;
    	// }

    	$data = $request->all(); // procesar los datos del formulario

    	// redirección
    	// return response()->json(['data'=>$data], 202)->header('TOKEN','secret');
    	// a ruta:
    	// return redirect('/');
    	// a nombre ruta:
    	// return redirect()->route('saludos');

    	// return redirect()->route('contactos')->with('info', 'Mensaje enviado correctamente!');

    	return back()->with('info', 'Mensaje enviado correctamente!');

    }

    public function saludo($nombre = "Invitado")
    {
	    // return view('saludo', ['nombre' => $nombre]);
		// return view('saludo')->with(['nombre' => $nombre]);

		$html = "<h2>Contenido html</h2>"; // ingresado por formulario

		$script = "<script>alert('Problema XSS - Cross Site Scripting!')</script>"; // ingresado por formulario

		$consolas = [
			// "Play Station 4",
			// "Xbox One",
			// "Wii U"
		];

		return view('saludo', compact('nombre', 'html','script', 'consolas'));
    }

}
