<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WorkingPhotoCategory;
use Illuminate\Support\Str;

class WorkingPhotoCategoryController extends Controller
{
    public function index(){
        $categories = WorkingPhotoCategory::orderBy('sort_order')->get();
        return view('admin.workingPhotoCategories.index', compact('categories'));
    }

   public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'sort_order' => 'nullable|integer',
            'status' => 'nullable|boolean',
        ]);

        WorkingPhotoCategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'sort_order' => $request->sort_order ?? 0,
            'status' => $request->status ?? true,
        ]);
          $notification = array(
            'message' => 'Category added successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
            'sort_order' => 'nullable|integer',
            'status' => 'nullable|boolean',
        ]);

        $category = WorkingPhotoCategory::findOrFail($id);

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'sort_order' => $request->sort_order ?? 0,
            'status' => $request->status ?? true,
        ]);

        $notification = array(
            'message' => 'Category updated successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
 }




     public function destroy($id){
        $category = WorkingPhotoCategory::findOrFail($id);
        $category->delete();

        $notification = array(
            'message' => 'Category deleted successfully!',
            'alert-type' => 'warning'
        );

        return redirect()->back()->with($notification);
    }

      public function toggleActiveDeactive($id){
        $category = WorkingPhotoCategory::findOrFail($id);
        $category->status = !$category->status;
        $category->save();
        $notification = array(
            'message' => 'Status updated.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }




}
