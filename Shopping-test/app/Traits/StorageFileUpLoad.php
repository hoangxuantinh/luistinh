<?php
namespace App\Traits;
use Str;
trait StorageFileUpload{
    public function StorageSingleFile($request,$fieldName,$folderName) {
        if($request->hasFile($fieldName)) {
            $file = $request->file($fieldName);
            $fileNameOrigin = $file->getClientOriginalName();
            $fileHash = Str::random(20) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/' . $folderName, $fileHash);
            $dataUpload = [
                'file_name' => $fileNameOrigin,
                'file_path' => \Storage::url($path)
            ];
            return $dataUpload;
        }
        return null;
    } 
    public function StorageMutipleFile($file,$folderName) {
        $fileNameOrigin = $file->getClientOriginalName();
        $fileHash = Str::random(20) . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('public/' . $folderName, $fileHash);
        $dataUpload = [
            'file_name' => $fileNameOrigin,
            'file_path' => \Storage::url($path)
        ];
        return $dataUpload;
    } 
}