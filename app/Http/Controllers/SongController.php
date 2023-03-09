<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SongController extends Controller
{
    public function index()
    //Obtenemos todas las canciones de la base de datos y las pasamos a la vista songs.index para que se muestren
    {
        $songs = Song::all();
        return view('song.index', compact('songs'));
    }

    public function create()
    //Mostramos un formulario para que el usuario pueda crear una nueva cancion
    {
        return view('song.create');
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

    public function edit(Song $song)
    //Mostramos un formulario para que el usuario pueda editar una canción existente (el parámetro $song es una instancia del modelo Song que se pasará a la vista songs.edit)
    {
        return view('songs.edit', compact('songs'));
    }

    public function update(Request $request, Song $song)
    //Actualizamos una canción existente en la base de datos. La función recibe los datos enviados desde el formulario de edit  y actualiza las propiedades correspondientes del modelo Song. Guarda los cambios en la base de datos y redirige al usuario a songs.index con un mensaje de exito
    {
        $song->song = $request->song;
        $song->artist = $request->artist;
        $song->gender = $request->gender;
        $song->youtube = $request->youtube;
        $song->image = $request->image;
        $song->listened = $request->listened;
        $song->save();
        return redirect()->route('songs.index')->with('success', 'Song updated successfully!');
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
        // if(auth()->user()->id == $song->user_id) {
        //     $song->delete();
        //     return redirect()->route('songs.index')->with('success', 'Song deleted successfully!');
        // } else {
        //     return redirect()->back()->with('error', 'You are not authorized to delete this song.');
        // }
        // $song->delete();
        // return redirect()->route('songs.index')->with('success', 'Song deleted successfully!');
    }
}
