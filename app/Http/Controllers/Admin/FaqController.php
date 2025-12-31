<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;

class FaqController extends Controller
{
      public function index(){
         $faqs=Faq::all();
        return view('admin.faq.index',compact('faqs'));
    }

    public function create(){
        return view('admin.faq.create');
    }

    public function store(Request $request){
         $request->validate([
            'question' => 'required|string|max:255',
            'answer'   => 'required|string',
            'status'   => 'required|boolean',
            'sort_order'    => 'required|integer|unique:faqs,sort_order',
        ]);

        Faq::create([
            'question' => $request->question,
            'answer'   => $request->answer,
            'status'   => $request->status,
            'sort_order'    => $request->sort_order,
        ]);
        $notification = array(
            'message' => 'FAQ create successfully!.',
            'alert-type' => 'success'
        );
       return redirect()->route('admin.faq.index')->with($notification);
    }

     public function details($id){
       $faq=Faq::findOrFail($id);
       return view('admin.faq.details',compact('faq'));
    }

    public function update(Request $request ,$id){
            $request->validate([
            'question' => 'required|string|max:255',
            'answer'   => 'required|string',
            'status'   => 'required|boolean',
            'sort_order'    => 'required|integer|unique:faqs,sort_order,' . $id,
        ]);

        Faq::where('id', $id)->update([
            'question' => $request->question,
            'answer'   => $request->answer,
            'status'   => $request->status,
            'sort_order'    => $request->sort_order,
        ]);

        $notification = array(
            'message' => 'FAQ updated successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.faq.index')->with($notification);
    }

    public function destroy($id){
       $faq=Faq::findOrFail($id);
       $faq->delete();

        $notification = array(
            'message' => 'Faq question answer deleted successfully!',
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }

    public function toggleActiveDeactive($id){
        $faq=Faq::findOrFail($id);
        $faq->status = !$faq->status;
        $faq->save();
        $notification = array(
            'message' => 'Status updated.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
