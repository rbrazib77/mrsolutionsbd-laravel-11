<?php
if (!function_exists('getSeo')) {
    function getSeo($page)
    {
        return \App\Models\SeoSetting::where('page_name',$page)->first();
    }
}

use Illuminate\Support\Facades\File;

if (!function_exists('upload_setting_image')) {

    function upload_setting_image($request, $field, $model)
    {
        if ($request->hasFile($field)) {

            $file = $request->file($field);
            $destinationPath = public_path('upload/settings/');

            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0775, true);
            }

            // old image delete
            if ($model->$field) {
                $oldPath = public_path($model->$field);
                if (File::exists($oldPath)) {
                    File::delete($oldPath);
                }
            }

            // unique filename
            $filename = uniqid($field . '_') . '.' . $file->getClientOriginalExtension();

            $file->move($destinationPath, $filename);

            // save relative path
            $model->$field = 'upload/settings/' . $filename;
        }
    }
}

if (!function_exists('upload_socialMedia_icon')) {
    function upload_socialMedia_icon($request, $inputName)
    {
        if ($request->hasFile($inputName)) {
            $file = $request->file($inputName);
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('upload/social_media/'), $filename);
            return 'upload/social_media/' . $filename;
        }

        return null; // কোন file না থাকলে null
    }
}