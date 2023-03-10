<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $q = $request->input('q'); // Obtener el término de búsqueda

        // Aquí puedes realizar la acción de búsqueda con el término ingresado

        return view('search_result', ['q' => $q]); // Mostrar los resultados en una vista
    }
}
