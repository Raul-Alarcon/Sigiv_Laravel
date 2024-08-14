<?php

namespace App\Http\Controllers;

use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    public function index()
    {
        $socialMedia = SocialMedia::orderBy("created_at", "desc")->paginate(10);

        return response()->json($socialMedia, 200);
    }


    public function store(Request $request)
    {
        $socialMedia = SocialMedia::create($request->all());
        return response()->json($socialMedia, 201);
    }


    public function update(string $Id, Request $request)
    {
        $socialMedia = SocialMedia::findOrFail($Id);
        if ($socialMedia != null) {
            $socialMedia->update($request->all());
            return response()->json($socialMedia, 200);
        }
        return response()->json(["message" => "The social media I requested was not found or does not exist"], 404);
    }

    public function destroy(string $Id)
    {
        $socialMedia = SocialMedia::findOrFail($Id);
        $socialMedia->delete();
        return response()->json(["message" => "Social Media successfully deleted"], 200);
    }
}
