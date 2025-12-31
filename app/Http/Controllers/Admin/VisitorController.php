<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserActivityLog;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


class VisitorController extends Controller
{
     public function index(){
        $totalVisits = UserActivityLog::sum('visit_count');
        $logs = UserActivityLog::orderBy('last_activity', 'desc')->paginate(20);
        return view('admin.visitors.index', compact('logs','totalVisits'));
    }

    public function destroy($id){
        $logs = UserActivityLog::findOrFail($id);
        $logs->delete();

        $notification = array(
            'message' => 'Visitor deleted successfully!',
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }


}
