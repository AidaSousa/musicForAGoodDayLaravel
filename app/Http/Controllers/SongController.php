<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;


class SongController extends Controller
{
    public function index()
    //Obtenemos todas las canciones de la base de datos y las pasamos a la vista songs.index para que se muestren
    {
        $songs = Song::paginate(3);
        return view('song.index', compact('songs'));
    }

    public function create()
    //Mostramos un formulario para que el usuario pueda crear una nueva cancion
    {
        return view('home');
    }

    public function store(Request $request)
{

    $song = new Song();

    if( $request->hasFile('image')) {
        $file =$request->file('image');
        $destinationPath = 'img/uploads/';
        $filename = time() . '-' . $file->getClientOriginalName();
        $uploadSuccess = $request->file('image')->move($destinationPath, $filename);
         $song->image = $destinationPath . $filename;
    }

    $song->user_id = auth()->user()->id;
    $song->song = $request->post('song');
    $song->artist = $request->post('artist');
    $song->gender = $request->post('gender');
    $song->youtube = $request->post('youtube');
    if($request->filled('listened')) {
        $song->listened = $request->input('listened');
    } else {
        $song->listened = 'no';
    }
    $song->save();
    return redirect()->route('song.index')->with('success', 'Song created successfully!');
}


    public function show(Song $song)
    //Mostramos los detalles de una cancion especifica (el parámetro $song es una instancia del modelo Song que se pasará a la vista songs.show)
    {
        return view('songs.show', compact('songs'));
    }

    public function edit($id)
    //Mostramos un formulario para que el usuario pueda editar una canción existente (el parámetro $song es una instancia del modelo Song que se pasará a la vista songs.edit)
    {
        $song = Song::findOrFail($id);
        return view('song.edit', compact('song'));
    }

    public function update(Request $request, $id)
    //Actualizamos una canción existente en la base de datos. La función recibe los datos enviados desde el formulario de edit  y actualiza las propiedades correspondientes del modelo Song. Guarda los cambios en la base de datos y redirige al usuario a songs.index con un mensaje de exito
    {
        $song = Song::findOrFail($id);
        $song->song = $request->input('song');
        $song->artist = $request->input('artist');
        $song->gender = $request->input('gender');
        $song->youtube = $request->input('youtube');

        if ($request->hasFile('image')) {
            //Eliminar la imagen anterior
            if(File::exists($song->image)) {
                File::delete($song->image);
            }

            //Subir la nueva imagen al directorio de uploads
            $file = $request->file('image');
            $destinationPath = 'img/uploads/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);

            //Actualizar la ruta de la imagen en la base de datos
            $song->image = $destinationPath . $filename;
        }
        // $song->listened = $request->listened;
        $song->save();
        return redirect()->route('song.index')->with('success', 'Song updated successfully!');
    }

    public function destroy($id)
    // Elimina una cancion de la base de datos
    {
        $song = Song::findOrFail($id);

        if($song->user_id != Auth::user()->id) {
            return redirect()->back()->withErrors(['message', 'No tienes permiso para eliminar esta cancion']);
        } 
        $song->delete();
        return redirect()->action([SongController::class, 'index']);
    }

    public function search(Request $request) {

        $query = $request->input('query');

        $songs = Song::where('song', 'LIKE', '%' . $query . '%')
            ->orWhere('artist', 'LIKE', '%' . $query . '%' )
            ->paginate(9);
        
        if($songs->isEmpty()) {
            $msg = 'No results found for the search: ' . $query;
            return view('song.search', compact('songs', 'msg'));;
        }
        
        return view('song.search', compact('songs'));
    }

    
}
