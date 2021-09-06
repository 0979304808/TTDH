<?php

namespace App\Core\Traits;

use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;
use File;

trait UploadTable {

    /**
     * Save image with FTP to Mazii
     * @param UploadedFile $file
     */
    public function uploadFTPMazii(UploadedFile $file){
        $fileName = 'Thumb_image_' . time() . '.' . $file->getClientOriginalExtension();
        $space = config('access.ftp.space');
        $path = $space . $fileName;
        $host = config('access.ftp.host').$path;

        /* create a stream context telling PHP to overwrite the file */ 
        $options = array('ftp' => array('overwrite' => true)); 
        $stream = stream_context_create($options); 
        $success = file_put_contents($host, $file->getClientOriginalName(), 0, $stream); 

        return config('access.ftp.link').$fileName;
    }

    /**
     * Save image
     * @param UploadedFile $file
     * @param string $filename
     * @param string $disk
     * 
     * @return path
     */
    public function saveImage(UploadedFile $file, $filename, $disk = null){
        $folder = !is_null($disk) ? $disk : public_path('/uploads/images/');
        $path = $folder . $filename;
        if(!is_dir($folder)){
            File::makeDirectory($folder,0777,true);
        }
        Image::make($file->path())->save($path);

        return !is_null($disk) ? $path : url("uploads/images/$filename");
    }
}