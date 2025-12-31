<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WhyChooseUsSection;
use App\Models\WhyChooseUsFeature;
use DB;

class WhyChooseUsController extends Controller
{
   public function HeadingIndex(){
    $whysection=WhyChooseUsSection::first();
     return view('admin.whyChooseUs.whyChooseSection',compact('whysection'));
   }

    public function HeadingUpdate(Request $request, $id){
    $request->validate([
        'section_title' => 'required|string|max:40',
        'section_subtitle'       => 'required|string|max:200',
    ]);

    $whysection =DB::table('why_choose_us_sections')->where('id', $id)->first();

    if (!$whysection) {
        return back()->with('error', 'About section not found!');
    }

    $data = [
        'section_title' => $request->section_title,
        'section_subtitle'       => $request->section_subtitle,
    ];

    
    DB::table('why_choose_us_sections')->where('id', $id)->update($data);
    $notification = [
            'message' => 'Why Section Updated Successfully!',
            'alert-type' => 'success'
        ];
        return back()->with($notification);

 }


    public function index(){
        $whyFeature=WhyChooseUsFeature::all();
        return view('admin.whyChooseUs.index',compact('whyFeature'));
   }

    public function create(){
        return view('admin.whyChooseUs.create');
   }


   public function store(Request $request){
    // Validation
    $request->validate([
        'title'       => 'required|string|max:40',
        'description' => 'required|string|max:200',
        'sort_order'       => 'required|integer|min:0|unique:why_choose_us_features,sort_order',
        'status'      => 'required|boolean',
    ]);
    
    $data = $request->only('title','description','status', 'sort_order');

    WhyChooseUsFeature::create($data);
     $notification=array(
            'message'=>'Why choose us created successfully!',
            'alert-type'=>'success'
         );
          return redirect()->route('admin.why-choose-us.index')->with($notification);
    }

    public function update(Request $request, $id){
        // Validation
        $request->validate([
            'title'       => 'required|string|max:40',
            'description' => 'required|string|max:200',
            'sort_order'  => 'required|integer|min:0|unique:why_choose_us_features,sort_order,' . $id,
            'status'      => 'required|boolean',
        ]);

        $data = $request->only('title','description','status','sort_order');

        $whyFeature = WhyChooseUsFeature::findOrFail($id);
        $whyFeature->update($data);

        $notification = [
            'message' => 'Why choose us updated successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('admin.why-choose-us.index')->with($notification);
     }

     public function details($id){
        $whyFeature=WhyChooseUsFeature::findOrFail($id);
        return view('admin.whyChooseUs.details',compact('whyFeature'));
    }
     public function destroy($id){
        $whyFeature = WhyChooseUsFeature::findOrFail($id);
        $whyFeature->delete();

        $notification = array(
            'message' => 'Why choose us deleted successfully!',
            'alert-type' => 'warning'
        );

        return redirect()->back()->with($notification);
    }

      public function toggleActiveDeactive($id){
        $whyFeature = WhyChooseUsFeature::findOrFail($id);
        $whyFeature->status = !$whyFeature->status;
        $whyFeature->save();
        $notification = array(
            'message' => 'Status updated.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }






}
