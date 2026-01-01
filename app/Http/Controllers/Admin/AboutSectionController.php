<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutSection;
use DB;


class AboutSectionController extends Controller
{
    public function index(){
        $aboutSection=AboutSection::first();
        return view('admin.aboutSection.index',compact('aboutSection'));
    }

    public function create(){
        return view('admin.aboutSection.create');
    }

    public function update(Request $request, $id)
{
    $about = AboutSection::findOrFail($id);

    $request->validate([
        'title'              => 'nullable|string|max:255',
        'description'        => 'nullable|string|min:50|max:700',
        'image'  => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:2048',
        'status'             => 'required|boolean',
    ]);

    $data = $request->only('title', 'description', 'status');

    // যদি নতুন ছবি আসে
    if ($request->hasFile('image')) {
        // পুরানো ছবি delete
        if ($about->image && file_exists(public_path('upload/abouts/' . $about->image))) {
            unlink(public_path('upload/abouts/' . $about->image));
        }

        // নতুন ছবি upload
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('upload/abouts/'), $imageName);

        $data['image'] = $imageName;
    }

    // Update DB
    $about->update($data);

    return redirect()->back()->with([
        'message' => 'About Section updated successfully!',
        'alert-type' => 'success'
    ]);
}




   
 

}
