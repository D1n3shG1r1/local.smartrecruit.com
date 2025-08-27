<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    
    public function show($userId, $filename)
    {
        $path = "users/{$userId}/assets/images/{$filename}";
        
        if (!Storage::disk('local')->exists($path)) {
            abort(404);
        }

        $file = Storage::disk('local')->get($path);
        
        $mimeType = Storage::disk('local')->mimeType($path) ?? 'image/jpeg';

        return response($file, 200)->header('Content-Type', $mimeType);
    }

    public function showAd($filename)
    {
        $path = "adImages/{$filename}";
        
        if (!Storage::disk('local')->exists($path)) {
            abort(404);
        }

        $file = Storage::disk('local')->get($path);
        
        $mimeType = Storage::disk('local')->mimeType($path) ?? 'image/jpeg';

        return response($file, 200)->header('Content-Type', $mimeType);
    }

}
