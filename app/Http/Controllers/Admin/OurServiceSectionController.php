<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OurServiceSection;

class OurServiceSectionController extends Controller
{
     public function index(){
         $ourSeviceSection=OurServiceSection::all();
        return view('admin.ourSeviceSection.index',compact('ourSeviceSection'));
    }

    public function create(){
        return view('admin.ourSeviceSection.create');
    }

   public function store(Request $request){
    // Validation
    $request->validate([
        'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        'title'       => 'required|string|max:70',
        'description' => 'required|string|min:120|max:300',
        'sort_order'       => 'required|integer|min:0|unique:our_service_sections,sort_order',
        'status'      => 'required|boolean',
    ]);
    
    $data = $request->only('title','description','status', 'sort_order');

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('upload/services'), $imageName);
        $data['image'] = $imageName;
    }

    OurServiceSection::create($data);
     $notification=array(
            'message'=>'Service created successfully!',
            'alert-type'=>'success'
         );
          return redirect()->route('admin.our.service.index')->with($notification);
    }


    public function update(Request $request, $id){
        $ourService = OurServiceSection::findOrFail($id);
        $request->validate([
        'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        'title'       => 'required|string|max:70',
        'description' => 'required|string|min:120|max:300',
        'sort_order'       => 'required|integer|min:0|unique:our_service_sections,sort_order,'.$ourService->id,
        'status'      => 'required|boolean',
        ]);

        $data = $request->only('title','description','status', 'sort_order');

        if ($request->hasFile('image')) {
            if ($ourService->image && file_exists(public_path('upload/services/' . $ourService->image))) {
                unlink(public_path('upload/services/' . $ourService->image));
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/services'), $imageName);
            $data['image'] = $imageName;
        }
        $ourService->update($data);
        $notification = array(
            'message' => 'Service updated successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    public function details($id){
        $service=OurServiceSection::findOrFail($id);
        return view('admin.ourSeviceSection.details',compact('service'));
    }
     public function destroy($id){
        $ourService = OurServiceSection::findOrFail($id);
        if ($ourService->image && file_exists(public_path('upload/services/' . $ourService->image))) {
            unlink(public_path('upload/services/' . $ourService->image));
        }
        $ourService->delete();

        $notification = array(
            'message' => 'Ours service deleted successfully!',
            'alert-type' => 'warning'
        );

        return redirect()->back()->with($notification);
    }

      public function toggleActiveDeactive($id){
        $ourService = OurServiceSection::findOrFail($id);
        $ourService->status = !$ourService->status;
        $ourService->save();
        $notification = array(
            'message' => 'Status updated.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

}
