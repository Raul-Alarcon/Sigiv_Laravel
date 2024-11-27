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
 
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:512' // Máximo 512 KB
        ]);
 
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->store('uploads/images', 'public'); 
            return response()->json([
                'success' => true,
                'url' => Storage::url($filePath) 
            ]);
        }
 
        return response()->json([
            'success' => false,
            'message' => 'No file uploaded'
        ], 400);
 
    }

    public function destroyImg(Request $request){
        
        $request->validate([
            'url' => 'required'
        ]);
        $url = $request->url;
        $url = str_replace('/storage', 'public', $url);
        Storage::delete($url);

        return response()->json(null, 204);
    }
}
