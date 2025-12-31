<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WorkingVideo;

class WorkingVideoController extends Controller
{
    public function index(){
        $workingVideos = WorkingVideo::orderBy('sort_order')->get();
        return view('admin.workingVideo.index', compact('workingVideos'));
    }
    public function create(){
        return view('admin.workingVideo.create');
    }

    public function store(Request $request){
        $request->validate([
        'title'        => 'required|string|max:255',
        'youtube_url' => 'required|url',
        'thumbnail'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'sort_order'   => 'nullable|integer|min:0|unique:working_videos,sort_order',
        'status'      => 'required|boolean',
    ]);

        $data = $request->only('title','status', 'sort_order','youtube_url');

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnailName = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('upload/video_thumbnails'), $thumbnailName);
            $data['thumbnail'] = $thumbnailName;
        }

        WorkingVideo::create($data);
        $notification=array(
                'message'=>'Working video created successfully!',
                'alert-type'=>'success'
            );
          return redirect()->route('admin.working-video.index')->with($notification);
    }

    public function update(Request $request, $id){
        $request->validate([
            'title'        => 'required|string|max:255',
            'youtube_url'  => 'required|url',
            'thumbnail'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'sort_order'   => 'nullable|integer|min:0|unique:working_videos,sort_order,' . $id,
            'status'       => 'required|boolean',
        ]);

        $video = WorkingVideo::findOrFail($id);

        $data = $request->only('title', 'status', 'sort_order', 'youtube_url');

        if ($request->hasFile('thumbnail')) {
            if ($video->thumbnail && file_exists(public_path('upload/video_thumbnails/' . $video->thumbnail))) {
                unlink(public_path('upload/video_thumbnails/' . $video->thumbnail));
            }
            $thumbnail = $request->file('thumbnail');
            $thumbnailName = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('upload/video_thumbnails'), $thumbnailName);
            $data['thumbnail'] = $thumbnailName;
        }
        $video->update($data);
        $notification = [
            'message' => 'Working video updated successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('admin.working-video.index')->with($notification);
    }

    public function destroy($id){
        $workingVideo = WorkingVideo::findOrFail($id);
        if ($workingVideo->image && file_exists(public_path('upload/video_thumbnails/' . $workingVideo->image))) {
            unlink(public_path('upload/video_thumbnails/' . $workingVideo->image));
        }
        $workingVideo->delete();

        $notification = array(
            'message' => 'Working video deleted successfully!',
            'alert-type' => 'warning'
        );

        return redirect()->back()->with($notification);
    }

      public function toggleActiveDeactive($id){
        $workingVideo = WorkingVideo::findOrFail($id);
        $workingVideo->status = !$workingVideo->status;
        $workingVideo->save();
        $notification = array(
            'message' => 'Status updated.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

}
