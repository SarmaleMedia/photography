<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhotoFormRequest;
use Aws\S3\MultipartUploader;
use Illuminate\Support\Facades\Storage;
use App\Category;

class PhotosController extends Controller
{
    public function categories()
    {
        return Category::all();
    }

    public function uploadPhoto(PhotoFormRequest $request)
    {
        $disk = Storage::disk('s3');
        $file = $request->files->get('file');

        if (!empty($file)) {
            $uploader = new MultipartUploader($disk->getDriver()->getAdapter()->getClient(), $file->getPathName(), [
                'bucket' => env('AWS_BUCKET'),
                'key'    => rand() . ' - ' . $file->getClientOriginalName(),
                'acl'    => 'public-read'
            ]);

            $result = $uploader->upload();

            echo '<pre>';
            print_r($result->get('ObjectURL'));
            die();
        }
    }
}
