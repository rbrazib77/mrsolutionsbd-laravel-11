<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BannerSection;
class BannerSectionController extends Controller
{
    public function BannerIndex(){
         $banner=BannerSection::all();
        return view('admin.bannerSection.index',compact('banner'));
    }

    public function BannerCreate(){
        return view('admin.bannerSection.create');
    }

   public function BannerStore(Request $request){
    $request->validate([
        'status'      => 'required|boolean',
        'order' => 'required|integer|unique:banner_sections,order',
        'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
    ]);

    $data = $request->only('status', 'order');

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('upload/banners'), $imageName);
        $data['image'] = $imageName;
    }

    BannerSection::create($data);
     $notification=array(
            'message'=>'Banner created successfully!',
            'alert-type'=>'success'
         );
          return redirect()->route('admin.banner.index')->with($notification);
    }


    public function BannerUpdate(Request $request, $id){
        $banner = BannerSection::findOrFail($id);
        $request->validate([
            'status'      => 'required|boolean',
            'order'       => 'required|integer|unique:banner_sections,order,' . $banner->id,
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $data = $request->only('status', 'order');

        if ($request->hasFile('image')) {
            if ($banner->image && file_exists(public_path('upload/banners/' . $banner->image))) {
                unlink(public_path('upload/banners/' . $banner->image));
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/banners'), $imageName);
            $data['image'] = $imageName;
        }
        $banner->update($data);
        $notification = array(
            'message' => 'Banner updated successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function BannerDelete($id){
        $banner = BannerSection::findOrFail($id);
        if ($banner->image && file_exists(public_path('upload/banners/' . $banner->image))) {
            unlink(public_path('upload/banners/' . $banner->image));
        }
        $banner->delete();

        $notification = array(
            'message' => 'Banner deleted successfully!',
            'alert-type' => 'warning'
        );

        return redirect()->back()->with($notification);
    }

      public function toggleBannerSection($id){
        $bannerSection = BannerSection::findOrFail($id);
        $bannerSection->status = !$bannerSection->status;
        $bannerSection->save();
        $notification = array(
            'message' => 'Status updated.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }




    

    
}
