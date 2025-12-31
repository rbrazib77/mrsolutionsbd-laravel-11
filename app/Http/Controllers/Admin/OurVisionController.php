<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OurVision;
use DB;

class OurVisionController extends Controller
{
   public function index(){
        $vision=OurVision::first();
        return view('admin.ourVision.index',compact('vision'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'small_title' => 'nullable|string|max:20',
            'title'       => 'nullable|string|max:40',
            'description' => 'nullable|string|min:120|max:300',
            'top_image'   => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:2048',
            'bottom_left_image' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:2048',
            'bottom_right_image'=> 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:2048',
            'status' => 'required|boolean',
        ]);

        $vision =DB::table('our_visions')->where('id', $id)->first();

        if (!$vision) {
            return back()->with('error', 'About section not found!');
        }

        $data = [
            'small_title' => $request->small_title,
            'title'       => $request->title,
            'description' => $request->description,
            'status'      => $request->status,
        ];

        foreach (['top_image','bottom_left_image','bottom_right_image'] as $img) {
            if ($request->hasFile($img)) {
                $oldImage = public_path('upload/visions/'.$vision->$img);
                if (!empty($vision->$img) && file_exists($oldImage)) {
                    unlink($oldImage);
                }
                $fileName = time().'_'.$request->$img->getClientOriginalName();
                $request->$img->move(public_path('upload/visions'), $fileName);
                $data[$img] = $fileName;
            }
        }

        DB::table('our_visions')->where('id', $id)->update($data);
        $notification = [
                'message' => 'Vision Section Updated Successfully!',
                'alert-type' => 'success'
            ];
        return back()->with($notification);
    }

}
