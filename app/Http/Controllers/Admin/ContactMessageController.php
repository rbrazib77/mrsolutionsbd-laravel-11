<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ContactMessageMail;
use Illuminate\Http\Request;
use App\Models\ContactMessage;
use Mail;

class ContactMessageController extends Controller
{
    public function index(){
        $contactMessages = ContactMessage::latest()->get();
        return view('admin.contactMessage.index',compact('contactMessages'));
    }

    public function details($id){
          $contactMessage=ContactMessage::findOrFail($id);
        return view('admin.contactMessage.details',compact('contactMessage'));
    }


    public function submit(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'message' => 'required|string',
            'subject' => 'required',
            'phone' => 'required',
        ]);

        // Validate captcha
      $expectedSum = (int) $request->num1 + (int) $request->num2;
      if ((int) $request->captcha !== $expectedSum) {
          return back()->withErrors(['captcha' => 'Captcha verification failed. Please try again.'])->withInput();
      }



        $message = ContactMessage::create($validated);

        Mail::to('razibhossain344633@gmail.com')->send(new ContactMessageMail( $validated['name'],
        $validated['email'],
        $validated['phone'],
        $validated['subject'],
        $validated['message']));
        return back()->with('success', 'Message sent  successfully.')->withFragment('contactForm');
    }
     public function destroy($id){
        $contactMessage = ContactMessage::findOrFail($id);
        $contactMessage->delete();

        $notification = array(
            'message' => 'contact message deleted successfully!',
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }


}
