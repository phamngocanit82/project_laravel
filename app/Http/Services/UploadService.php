<?php


namespace App\Http\Services;
use Intervention\Image\ImageManagerStatic as Image;
class UploadService
{
    public function store($request)
    {
        if ($request->file('file')->isValid()) {
            try {
                $image = $request->file('file');
                $width = Image::make($image)->width(); 
                $height = Image::make($image)->height(); 
                
                $imageName = date("Y_m_d").'_'.$request->file('file')->getClientOriginalName();
                $thumbName = 'thumb_'.date("Y_m_d").'_'.$request->file('file')->getClientOriginalName();
                $folder = $request->folder;
                $pathFull = 'uploads/'.$folder;
                
                $image->storeAs('public/' . $pathFull, $imageName);
                $image = Image::make($image->getRealPath());
                $image->resize(150, 150, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('/storage/uploads/'.$folder.'/'.$thumbName));

                return [
                    'path' => '/storage/'.$pathFull.'/'. $imageName,
                    'thumb' => '/storage/'.$pathFull.'/'. $thumbName,
                    'width' => $width,
                    'height' => $height,
                ];
            } catch (\Exception $error) {
                return false;
            }
        }
    }
}
