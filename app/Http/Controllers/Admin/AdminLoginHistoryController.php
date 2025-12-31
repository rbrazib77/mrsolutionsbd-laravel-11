<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminLoginHistory;
use App\Models\User;

class AdminLoginHistoryController extends Controller
{
    public function index(){

    $admins =User::all();
    $summary = $admins->map(function ($admin) {
        $totalLogins = AdminLoginHistory::where('user_id', $admin->id)->count();
        $totalLogouts = AdminLoginHistory::where('user_id', $admin->id)
            ->whereNotNull('logged_out_at')
            ->count();

        $lastLogin = AdminLoginHistory::where('user_id', $admin->id)
            ->orderByDesc('logged_in_at')
            ->first()?->logged_in_at;

        $lastLogout = AdminLoginHistory::where('user_id', $admin->id)
            ->whereNotNull('logged_out_at')
            ->orderByDesc('logged_out_at')
            ->first()?->logged_out_at;

        return [
            'admin' => $admin,   
            'email' => $admin->email, 
            'total_logins' => $totalLogins,
            'total_logouts' => $totalLogouts,
            'last_login' => $lastLogin, 
            'last_logout' => $lastLogout, 
        ];
    });

        $histories = AdminLoginHistory::with('user')->latest()->get();
        return view('admin.adminLoginLogout.index', compact('histories','summary'));
    }

    public function destroy($id){
        $currentUserId = auth()->id();

        if ($currentUserId == $id) {
            $notification = [
                'message' => 'You cannot delete your own account while logged in!',
                'alert-type' => 'error'
            ];
            return back()->with($notification);
        }
        $delete = AdminLoginHistory::findOrFail($id);
        $delete->delete();

        $notification = [
            'message' => 'User deleted successfully!',
            'alert-type' => 'success'
        ];
        return back()->with($notification);
    }
}
