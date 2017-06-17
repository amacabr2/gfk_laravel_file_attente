<?php

namespace App\Http\Controllers;

use App\Jobs\ResizeImage;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ImageController extends Controller {

    public function create() {
        return view('image.create');
    }

    public function store(Request $request) {
        $uploadedFile = $request->file('file');
        $file = $uploadedFile->move(public_path('uploads'), $uploadedFile->getClientOriginalName());
        $formats = [150, 500, 1000, 1200, 1400];
        $job = new ResizeImage($file, $formats);
        $job->delay(Carbon::now()->addSeconds(10));
        $this->dispatch($job);
        return view('image.create');
    }

}
