<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\SocialMedia;

class SocialMediaController extends Controller
{
    public function SocialMediaIndex(){
        $socialMedia=SocialMedia::all();
        return view('admin.socialMedia.index',compact('socialMedia'));
    }
    public function SocialMediaCreate(){
            return view('admin.socialMedia.create');
    }

    public function SocialMediaStore(Request $request){
    $request->validate([
        'name'   => 'required|string|max:255',
        'icon'   => 'required',
        'url'    => 'required|url',
        'status' => 'required|boolean',
        'order'  => 'required|integer|unique:social_media,order',
    ]);

    $iconPath = upload_socialMedia_icon($request, 'icon');

    SocialMedia::create([
        'name'   => $request->name,
        'icon'   => $iconPath,
        'url'    => $request->url,
        'status' => $request->status,
        'order'  => $request->order,
    ]);

    $notification = array(
            'message' => 'Social media created successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
}


    public function SocialMediaUpdate(Request $request, $id){
    $request->validate([
        'name'    => 'required|string|max:255',
        'icon'  => 'required|string|max:255',
        'url'         => 'required|url',
        'status'      => 'required|boolean',
        'order'       => 'required|integer|unique:social_media,order,' . $id,
    ]);

    $socialLink = SocialMedia::findOrFail($id);

    $socialLink->update([
        'name'   => $request->name,
        'icon' => $request->icon,
        'url'        => $request->url,
        'status'     => $request->status,
        'order'      => $request->order ?? 0,
    ]);

    $notification = [
        'message'    => 'Social media updated successfully',
        'alert-type' => 'success'
    ];

    return redirect()->back()->with($notification);
}


    public function SocialMediaDelete($id){
        $socialMedia = SocialMedia::findOrFail($id);
        if ($socialMedia->icon && File::exists(public_path($socialMedia->icon))) {
            File::delete(public_path($socialMedia->icon));
        }
        $socialMedia->delete();
        $notification = [
            'message' => 'Social media deleted successfully!',
            'alert-type' => 'error'
        ];
        return redirect()->back()->with($notification);
    }

    public function toggleSocialMedia($id){
        $socialMediaLink = SocialMedia::findOrFail($id);
        $socialMediaLink->status = !$socialMediaLink->status;
        $socialMediaLink->save();
        $notification = array(
            'message' => 'Status updated.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    
    


}
