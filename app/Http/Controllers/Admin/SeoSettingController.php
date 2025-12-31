<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SeoSetting;


class SeoSettingController extends Controller
{
    public function index(){
        $seoSettings = SeoSetting::all();
        return view('admin.seoSetting.index', compact('seoSettings'));
    }
     public function update(Request $request, $id){
            // Validation
        $request->validate([
            'meta_title'       => 'required|string|min:20,max:60',
            'meta_description' => 'required|string|max:160',
            'meta_keywords'    => 'required|string|',
            'og_image'         => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $seo = SeoSetting::findOrFail($id);

        $data = $request->only('meta_title','meta_description','meta_keywords');

        if ($request->hasFile('og_image')) {
            $file = $request->file('og_image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('upload/seo'), $filename);
            $data['og_image'] = $filename;
        }

        $seo->update($data);
         $notification = [
                'message' => 'SEO Updated Successfully!',
                'alert-type' => 'success'
            ];
      
        return redirect()->route('admin.seo.index')->with($notification);
    }
}
