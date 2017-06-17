<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManager;

class ImageController extends Controller {

    public function create() {
        return view('image.create');
    }

    public function store(Request $request) {
        $uploadedFile = $request->file('file');
        $file = $uploadedFile->move(public_path('uploads'), $uploadedFile->getClientOriginalName());
        $formats = [150, 500, 1000, 1200, 1400];
        foreach ($formats as $format) {
            $manager = new ImageManager(['driver' =>  'gd']);
            $manager->make($file->getRealPath())
                ->fit($format, $format)
                ->rotate(45)
                ->save(public_path('uploads') . "/{$file->getBasename()}_{$format}x{$format}.jpg");
        }
        return view('image.create');
    }

}
