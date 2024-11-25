<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Recibe una imagen y retorna su URL.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function upload(Request $request)
    {
        // Validar que el archivo recibido sea una imagen
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Máx. 2MB
        ]);

        // Almacenar la imagen en el directorio 'uploads'
        $path = $request->file('image')->store('uploads', 'public');

        // Construir la URL pública de la imagen
        $url = Storage::url($path);

        return response()->json(['url' => $url], 200);
    }
}

