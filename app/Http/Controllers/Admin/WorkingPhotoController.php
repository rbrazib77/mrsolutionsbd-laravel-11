<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WorkingPhoto;
use App\Models\WorkingPhotoCategory;
use Illuminate\Support\Str;

class WorkingPhotoController extends Controller
{
     public function index(){
        $workingPhotos = WorkingPhoto::orderBy('sort_order')->get();
        $categories = WorkingPhotoCategory::where('status', true)->orderBy('sort_order')->get();
        return view('admin.workingPhoto.index', compact('workingPhotos','categories'));
    }
    public function create(){
        $categories = WorkingPhotoCategory::where('status', true)->orderBy('sort_order')->get();
        return view('admin.workingPhoto.create',compact('categories'));
    }

    public function store(Request $request){
        // Validation
        $request->validate([
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'title'       => 'required|string|max:70',
            'category_id' => 'required|exists:working_photo_categories,id',
            'sort_order'       => 'required|integer|min:0|unique:working_photos,sort_order',
            'status'      => 'required|boolean',
        ]);
    
        $data = $request->only('title','status', 'sort_order','category_id');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/workingPhotos'), $imageName);
            $data['image'] = $imageName;
        }

        WorkingPhoto::create($data);
        $notification=array(
                'message'=>'Working photo created successfully!',
                'alert-type'=>'success'
            );
          return redirect()->route('admin.working-photo.index')->with($notification);
    }


    public function update(Request $request, $id){
        $workingPhoto = WorkingPhoto::findOrFail($id);
        // Validation
        $request->validate([
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'title'       => 'required|string|max:70',
            'category_id' => 'required|exists:working_photo_categories,id',
            'sort_order'  => 'required|integer|min:0|unique:working_photos,sort_order,'.$workingPhoto->id,
            'status'      => 'required|boolean',
        ]);

        $data = $request->only('title','status','sort_order','category_id');

        if ($request->hasFile('image')) {
            if ($workingPhoto->image && file_exists(public_path('upload/workingPhotos/'.$workingPhoto->image))) {
                unlink(public_path('upload/workingPhotos/'.$workingPhoto->image));
            }

            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('upload/workingPhotos'), $imageName);
            $data['image'] = $imageName;
        }
        $workingPhoto->update($data);

        $notification = [
            'message' => 'Working photo updated successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('admin.working-photo.index')->with($notification);
    }

     public function destroy($id){
        $workingPhoto = WorkingPhoto::findOrFail($id);
        if ($workingPhoto->image && file_exists(public_path('upload/workingPhotos/' . $workingPhoto->image))) {
            unlink(public_path('upload/workingPhotos/' . $workingPhoto->image));
        }
        $workingPhoto->delete();

        $notification = array(
            'message' => 'Working photo deleted successfully!',
            'alert-type' => 'warning'
        );

        return redirect()->back()->with($notification);
    }

      public function toggleActiveDeactive($id){
        $workingPhoto = WorkingPhoto::findOrFail($id);
        $workingPhoto->status = !$workingPhoto->status;
        $workingPhoto->save();
        $notification = array(
            'message' => 'Status updated.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }



}
