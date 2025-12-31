<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutSection;
use DB;


class AboutSectionController extends Controller
{
    public function index(){
        $about=AboutSection::where('status',1)->first();
        return view('admin.aboutSection.index',compact('about'));
    }

    public function create(){
        return view('admin.aboutSection.create');
    }
    public function update(Request $request, $id){
    $request->validate([
        'small_title' => 'nullable|string|max:255',
        'title'       => 'nullable|string|max:255',
        'description' => 'nullable|string|min:120|max:350',
        'top_image'   => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:2048',
        'bottom_left_image' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:2048',
        'bottom_right_image'=> 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:2048',
        'status' => 'required|boolean',
    ]);

    $about =DB::table('about_sections')->where('id', $id)->first();

    if (!$about) {
        return back()->with('error', 'About section not found!');
    }

    $data = [
        'small_title' => $request->small_title,
        'title'       => $request->title,
        'description' => $request->description,
        'status'      => $request->status,
    ];

    // Image Upload with old delete
    foreach (['top_image','bottom_left_image','bottom_right_image'] as $img) {
        if ($request->hasFile($img)) {
            // পুরাতন ইমেজ delete
            $oldImage = public_path('upload/abouts/'.$about->$img);
            if (!empty($about->$img) && file_exists($oldImage)) {
                unlink($oldImage);
            }

            // নতুন ইমেজ save
            $fileName = time().'_'.$request->$img->getClientOriginalName();
            $request->$img->move(public_path('upload/abouts'), $fileName);
            $data[$img] = $fileName;
        }
    }

    DB::table('about_sections')->where('id', $id)->update($data);
    $notification = [
            'message' => 'About Section Updated Successfully!',
            'alert-type' => 'success'
        ];
        return back()->with($notification);

 }

 

}
