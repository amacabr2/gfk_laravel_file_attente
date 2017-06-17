<?php

namespace App\Http\Controllers;

use App\Jobs\ResizeImage;
use Illuminate\Http\Request;

class ImageController extends Controller {

    public function create() {
        return view('image.create');
    }

    public function store(Request $request) {
        $uploadedFile = $request->file('file');
        $file = $uploadedFile->move(public_path('uploads'), $uploadedFile->getClientOriginalName());
        $formats = [150, 500, 1000, 1200, 1400];
        $this->dispatch(new ResizeImage($file, $formats));
        return view('image.create');
    }

}
