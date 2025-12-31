<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
     public function index(){
        $clients = Client::orderBy('sort_order', 'asc')->get();
        return view('admin.client.index', compact('clients'));
    }

     public function create(){
        return view('admin.client.create');
    }

    public function store(Request $request){
        $request->validate([
        'name'        => 'required|string',
        'logo'    => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
        'sort_order'   => 'nullable|integer|min:0|unique:clients,sort_order',
        'status'      => 'required|boolean',
    ]);

        $data = $request->only('name','status', 'sort_order');

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = time() . '.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('upload/clients'), $logoName);
            $data['logo'] = $logoName;
        }

        Client::create($data);
        $notification=array(
                'message'=>'Client created successfully!',
                'alert-type'=>'success'
            );
          return redirect()->route('admin.client.index')->with($notification);
    }

     public function update(Request $request, $id){
        $request->validate([
            'name'        => 'required|string',
            'logo'    => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'sort_order'   => 'nullable|integer|min:0|unique:clients,sort_order,' . $id,
            'status'       => 'required|boolean',
        ]);

        $client = Client::findOrFail($id);

        $data = $request->only('name', 'status', 'sort_order');

        if ($request->hasFile('logo')) {
            if ($client->logo && file_exists(public_path('upload/clients/' . $video->logo))) {
                unlink(public_path('upload/clients/' . $video->logo));
            }
            $logo = $request->file('logo');
            $logoName = time() . '.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('upload/clients'), $logoName);
            $data['logo'] = $logoName;
        }
        $client->update($data);
        $notification = [
            'message' => 'Client updated successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('admin.client.index')->with($notification);
    }




    public function destroy($id){
        $client = Client::findOrFail($id);
        if ($client->logo && file_exists(public_path('upload/clients/' . $client->logo))) {
            unlink(public_path('upload/clients/' . $client->logo));
        }
        $client->delete();

        $notification = array(
            'message' => 'Client deleted successfully!',
            'alert-type' => 'warning'
        );

        return redirect()->back()->with($notification);
    }

      public function toggleActiveDeactive($id){
        $client = Client::findOrFail($id);
        $client->status = !$client->status;
        $client->save();
        $notification = array(
            'message' => 'Status updated.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }





}
