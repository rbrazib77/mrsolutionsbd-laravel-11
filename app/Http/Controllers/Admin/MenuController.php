<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function MenuIndex()
    {
        $menus = Menu::whereNull('parent_id')
            ->orderBy('order_by')
            ->with('children')
            ->get();
         $parents = Menu::whereNull('parent_id')->orderBy('order_by')->get();
        return view('admin.navbarMenu.index', compact('menus','parents'));
    }

    public function MenuCreate()
    {
        $parents = Menu::whereNull('parent_id')->get();
        return view('admin.navbarMenu.create', compact('parents'));
    }

    public function MenuStore(Request $request)
    {
        Menu::create($request->validate([
            'title'=>'required',
            'url'=>'nullable',
            'parent_id'=>'nullable',
            'order_by'=>'nullable',
            'status'=>'required'
        ]));
            $notification = array(
            'message' => 'Menu created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function MenuUpdate(Request $request,$id){
        $menu = Menu::findOrFail($id);
        $menu->update([
            'title'     => $request->title,
            'parent_id' => $request->parent_id,
            'url'       => $request->url,
            'order_by'  => $request->order_by,
            'status'    => $request->status,
        ]);
        $notification = array(
            'message' => 'Menu updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    // public function update(Request $request, Menu $menu)
    // {
    //     $menu->update($request->all());
    //     return redirect()->route('admin.menu.index');
    // }

  public function MenuDelete($id){
    $menu = Menu::findOrFail($id);
        $menu->delete();

        $notification = array(
            'message' => 'Menu deleted successfully!',
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }

     public function toggleMenu($id){
       $menu = Menu::findOrFail($id);
       $menu->status = !$menu->status;
       $menu->save();
        if ($menu->children()->count() > 0) {
            $menu->children()->update(['status' => $menu->status]);
        }
        $notification = array(
            'message' => 'Status updated.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
