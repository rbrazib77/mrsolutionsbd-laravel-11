<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ActivityForCustomer;


class ActivityForCustomerController extends Controller
{
     public function index(){
        $activitys=ActivityForCustomer::all();
        return view('admin.activityForCustomer.index',compact('activitys'));
   }

    public function create(){
        return view('admin.activityForCustomer.create');
   }


   public function store(Request $request){
    // Validation
    $request->validate([
        'title'       => 'required|string|max:40',
        'description' => 'required|string|max:250',
        'sort_order'       => 'required|integer|min:0|unique:activity_for_customers,sort_order',
        'status'      => 'required|boolean',
    ]);
    
    $data = $request->only('title','description','status', 'sort_order');

    ActivityForCustomer::create($data);
     $notification=array(
            'message'=>'Activity created successfully!',
            'alert-type'=>'success'
         );
          return redirect()->route('admin.activity.index')->with($notification);
    }

    public function update(Request $request, $id){
        // Validation
        $request->validate([
            'title'       => 'required|string|max:40',
            'description' => 'required|string|max:250',
            'sort_order'  => 'required|integer|min:0|unique:activity_for_customers,sort_order,' . $id,
            'status'      => 'required|boolean',
        ]);

        $data = $request->only('title','description','status','sort_order');

        $activity = ActivityForCustomer::findOrFail($id);
        $activity->update($data);

        $notification = [
            'message' => 'Activity updated successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('admin.activity.index')->with($notification);
     }

     public function details($id){
        $activity=ActivityForCustomer::findOrFail($id);
        return view('admin.activityForCustomer.details',compact('activity'));
    }
     public function destroy($id){
        $activity = ActivityForCustomer::findOrFail($id);
        $activity->delete();

        $notification = array(
            'message' => 'Activity deleted successfully!',
            'alert-type' => 'warning'
        );

        return redirect()->back()->with($notification);
    }

      public function toggleActiveDeactive($id){
        $activity = ActivityForCustomer::findOrFail($id);
        $activity->status = !$activity->status;
        $activity->save();
        $notification = array(
            'message' => 'Status updated.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

}
