<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\UploadService;
use Intervention\Image\ImageManagerStatic as Image;
class UploadController extends Controller
{
    protected $upload;
    public function __construct(UploadService $upload){
        $this->upload = $upload;
    }
    public function store(Request $request){
        $data = $this->upload->store($request); 
        if ($data !== false) {
            return response()->json([
                'error' => false,
                'path'   => $data['path'],
                'thumb'   => $data['thumb'],
                'width'   => $data['width'],
                'height'   => $data['height'],
            ]);
        }
        return response()->json(['error' => true]);
    }
}
