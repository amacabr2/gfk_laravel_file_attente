<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Image;
use App\Jobs\ResizeImage;

class ImageController extends Controller {

    public function create() {
        $image = $this->searchFile();
        return view('image.create');
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
        return view('image.create');
    }

    private function searchFile() {
        $list = [];
        if ($dossier = opendir(public_path('uploads'))) {
            while(false !== ($fichier = readdir($dossier))) {
                if ($fichier != '.' and $fichier != '..') {
                    array_push($list, $fichier);
                }
            }
        }
        return $list;
    }

}
