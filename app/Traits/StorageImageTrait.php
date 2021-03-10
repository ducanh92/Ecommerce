<?php

namespace App\Traits;

use Auth;
use Storage;
use Str;

trait StorageImageTrait
{
    public function storageUploadTrait($request, $fieldName, $folderName)
    {
        if ($request->hasFile($fieldName)) {
            $file = $request->$fieldName;
            $originalFileName = $file->getClientOriginalName();
            $hashedFileName = Str::random(20) . '.' . $file->getClientOriginalExtension();
            $filePath = $request->file($fieldName)->storeAs('public/' . $folderName . '/' . Auth::user()->id, $hashedFileName);

            $dataUploadTrait = [
                'file_name' => $originalFileName,
                'file_path' => Storage::url($filePath),
            ];

            return $dataUploadTrait;
        }

        return null;
    }

    public function storageMultipleUploadTrait($file, $folderName)
    {
        $originalFileName = $file->getClientOriginalName();
        $hashedFileName = Str::random(20) . '.' . $file->getClientOriginalExtension();
        $filePath = $file->storeAs('public/' . $folderName . '/' . Auth::user()->id, $hashedFileName);

        $dataUploadTrait = [
            'file_name' => $originalFileName,
            'file_path' => Storage::url($filePath),
        ];

        return $dataUploadTrait;

        return null;
    }

}
