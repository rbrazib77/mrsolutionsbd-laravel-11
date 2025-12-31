<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OurMission;
use DB;

class OurMissionController extends Controller
{
    public function index(){
        $mission=OurMission::first();
        return view('admin.ourMission.index',compact('mission'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'small_title' => 'nullable|string|max:20',
            'title'       => 'nullable|string|max:40',
            'description' => 'nullable|string|min:120|max:300',
            'top_left_image'   => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:2048',
            'top_right_image' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:2048',
            'bottom_image'=> 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:2048',
            'status' => 'required|boolean',
        ]);

        $mission =DB::table('our_missions')->where('id', $id)->first();

        if (!$mission) {
            return back()->with('error', 'Missions section not found!');
        }

        $data = [
            'small_title' => $request->small_title,
            'title'       => $request->title,
            'description' => $request->description,
            'status'      => $request->status,
        ];

        foreach (['top_left_image','top_right_image','bottom_image'] as $img) {
            if ($request->hasFile($img)) {
                $oldImage = public_path('upload/missions/'.$mission->$img);
                if (!empty($mission->$img) && file_exists($oldImage)) {
                    unlink($oldImage);
                }
                $fileName = time().'_'.$request->$img->getClientOriginalName();
                $request->$img->move(public_path('upload/missions'), $fileName);
                $data[$img] = $fileName;
            }
        }

        DB::table('our_missions')->where('id', $id)->update($data);
        $notification = [
                'message' => 'Mission Section Updated Successfully!',
                'alert-type' => 'success'
            ];
        return back()->with($notification);
    }



}
