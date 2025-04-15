<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateReact
{
    public function handle(Request $request, Closure $next)
    {
//        // Kiểm tra xem token hợp lệ hay không
//        if (!$request->bearerToken() || !Auth::guard('api')->check()) {
//        return response()->json(['message' => 'You do not have permission to access this path.'], 401);
//        }
//
//        return $next($request);
        $token = $request->bearerToken();

        // Nếu không có token hoặc token không hợp lệ, trả về Unauthorized
        if (!$token || !Auth::guard('api')->check()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}
