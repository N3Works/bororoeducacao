<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Resources;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class StorageController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function download_resource(Request $req, $slug)
    {
        $resource = Resources::where('slug', $slug)->first();
        $file = $resource->getFile();

        return (new Response($file))
            ->header('Content-Type', Storage::disk('private_resources')->mimeType($resource->resource_file));
    }

}
