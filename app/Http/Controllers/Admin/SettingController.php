<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WebsiteSetting;
use File;
class SettingController extends Controller
{
    public function WebsiteIndex(){
        $websiteSetting= WebsiteSetting::first();
        return view('admin.websiteSetting.index',compact('websiteSetting'));
    }

    public function WebsiteUpdate(Request $request, $id){
        $request->validate([
            'main_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'footer_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'favicon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'address_icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'phone_icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email_icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            'phone_one' => 'nullable|string|max:30',
            'phone_two' => 'nullable|string|max:30',
            'email_one' => 'nullable|email|max:255',
            'email_two' => 'nullable|email|max:255',
            'address' => 'nullable|string|max:255',
            'footer_description' => 'required|string',
            'copy_right' => 'nullable|string|max:255',
            'map_url' => 'nullable|string',
        ]);

        $websiteSetting = WebsiteSetting::findOrFail($id);

        // text data
        $websiteSetting->phone_one = $request->phone_one;
        $websiteSetting->phone_two = $request->phone_two;
        $websiteSetting->email_one = $request->email_one;
        $websiteSetting->email_two = $request->email_two;
        $websiteSetting->address = $request->address;
        $websiteSetting->footer_description = $request->footer_description;
        $websiteSetting->copy_right = $request->copy_right;
        $websiteSetting->map_url = $request->map_url;

        // image upload helper function
        upload_setting_image($request, 'main_logo', $websiteSetting);
        upload_setting_image($request, 'footer_logo', $websiteSetting);
        upload_setting_image($request, 'favicon', $websiteSetting);
        upload_setting_image($request, 'address_icon', $websiteSetting);
        upload_setting_image($request, 'phone_icon', $websiteSetting);
        upload_setting_image($request, 'email_icon', $websiteSetting);

        $websiteSetting->save();

        return redirect()->back()->with([
            'message' => 'Settings updated successfully!',
            'alert-type' => 'success'
        ]);
    }



   
}
