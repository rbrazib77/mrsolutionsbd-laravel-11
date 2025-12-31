<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrivacyPolicy;

class PrivacyPolicyController extends Controller
{
    public function index(){
        $privacys=PrivacyPolicy::all();
        return view('admin.privacyPolicy.index',compact('privacys'));
    }

    public function create(){
        return view('admin.privacyPolicy.create');
    }

    public function store(Request $request){
        // Validation
        $request->validate([
            'heading'       => 'required|string',
            'content' => 'required|string',
            'sort_order'       => 'required|integer|min:0|unique:privacy_policies,sort_order',
            'status'      => 'required|boolean',
        ]);
    
        $data = $request->only('heading','content','status', 'sort_order');

        PrivacyPolicy::create($data);
        $notification=array(
                'message'=>'Privacy policy created successfully!',
                'alert-type'=>'success'
            );
        return redirect()->route('admin.privacy-policy.index')->with($notification);
    }

    public function update(Request $request, $id){
        $policy = PrivacyPolicy::findOrFail($id);

        // Validation
        $request->validate([
            'heading'       => 'required|string',
            'content'       => 'required|string',
            'sort_order'    => 'required|integer|min:0|unique:privacy_policies,sort_order,' . $policy->id,
            'status'        => 'required|boolean',
        ]);

        $data = $request->only('heading','content','status', 'sort_order');
        $policy->update($data);
        $notification = [
            'message' => 'Privacy policy updated successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('admin.privacy-policy.index')->with($notification);
    }

    public function details($id){
        $privacy=PrivacyPolicy::findOrFail($id);
        return view('admin.privacyPolicy.details',compact('privacy'));
    }
     public function destroy($id){
        $privacy = PrivacyPolicy::findOrFail($id);
        $privacy->delete();

        $notification = array(
            'message' => 'Privacy policy deleted successfully!',
            'alert-type' => 'warning'
        );

        return redirect()->back()->with($notification);
    }

      public function toggleActiveDeactive($id){
        $privacy = PrivacyPolicy::findOrFail($id);
        $privacy->status = !$privacy->status;
        $privacy->save();
        $notification = array(
            'message' => 'Status updated.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }



}
