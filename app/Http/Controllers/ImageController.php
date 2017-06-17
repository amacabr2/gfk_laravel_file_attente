<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Image;
use App\Jobs\ResizeImage;

class ImageController extends Controller {

    public function create() {
        $images = Image::all();
        return view('image.create', ['images'=> $images]);
    }

    public function store(ImageRequest $request) {
        $uploadedFile = $request->file('file');
        $name = $uploadedFile->getClientOriginalName();
        $image = Image::firstOrCreate(['name' => $name]);
        $file = $uploadedFile->move(public_path('uploads'), $name);
        $formats = [150, 500, 1000, 1200, 1400];
        $job = new ResizeImage($file, $formats);
        // $job->delay(Carbon::now()->addSeconds(10));
        $this->dispatch($job);
        if (!$image->wasRecentlyCreated) {
            return redirect()
                ->route('image.create')
                ->with('message', 'Cette image est déjà enregistré');
        }
        return redirect()->route('image.create');
    }

}
