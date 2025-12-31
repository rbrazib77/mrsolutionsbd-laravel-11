<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\UserActivityLog;
use Illuminate\Support\Carbon;
use Jenssegers\Agent\Agent;
use Auth;
use WhichBrowser\Parser;
use Symfony\Component\HttpFoundation\Response;

class TrackUserActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next){
    if (!$request->is('admin*')) {
        $url = $request->fullUrl();
        $path = $request->path();

        $skipPatterns = [
            '.css', '.js', '.map', '.png', '.jpg', '.jpeg', '.gif',
            '.webp', '.svg', '.ico', '.woff', '.woff2', '.ttf', '.pdf',
            '.json',         
        ];

        if (str_starts_with($path, '.well-known')) {
            return $next($request);
        }

        foreach ($skipPatterns as $ext) {
            if (str_ends_with($path, $ext)) {
                return $next($request);
            }
        }

        $agent = new \Jenssegers\Agent\Agent();
        $ip = $request->ip();
        $userAgent = $request->userAgent();

        $log = \App\Models\UserActivityLog::where('ip_address', $ip)
            ->where('url', $url)
            ->first();

        if ($log) {
            $log->increment('visit_count');
            $log->update(['last_activity' => now()]);
        } else {
            \App\Models\UserActivityLog::create([
                'user_id'          => auth()->id(),
                'ip_address'       => $ip,
                'url'              => $url,
                'user_agent'       => $userAgent,
                'browser'          => $agent->browser(),
                'browser_version'  => $agent->version($agent->browser()),
                'platform'         => $agent->platform(),
                'platform_version' => $agent->version($agent->platform()),
                'device'           => $agent->device() ?: 'Unknown',
                'country'          => $request->header('CF-IPCountry') ?? null,
                'visit_count'      => 1,
                'last_activity'    => now(),
            ]);
        }
    }

     return $next($request);
 }

    public function getCountryFromIP(string $ip): ?string{
        try {
            $response = @file_get_contents("http://ip-api.com/json/{$ip}");
            if (!$response) {
                return null;
            }
            $data = json_decode($response);
            if ($data && isset($data->status) && $data->status === 'success') {
                return $data->country ?? null;
            }
        } catch (\Exception $e) {
            
        }

        return null;
    }

}
