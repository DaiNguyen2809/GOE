<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use App\Models\User;
class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
//    public function handle(Request $request, Closure $next): Response
//    {
//        // Kiểm tra xem người dùng đã xác thực chưa
//        if (!Auth::check()) {
//            // Đối với request AJAX, trả về 401
//            if ($request->expectsJson()) {
//                return response()->json(['message' => 'Unauthenticated'], 401);
//            }
//            return redirect('http://localhost:3000/login');
//        }
//
//        $user = Auth::user();
//        if ($user->role == 0) {
//            if ($request->expectsJson()) {
//                return response()->json(['message' => 'Unauthorized'], 403);
//            }
//            return redirect('http://localhost:3000/');
//        }
//
//        return $next($request);
//    }

    public function handle(Request $request, Closure $next): Response
    {
        // Nếu người dùng đã đăng nhập qua session
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role > 0) {
                return $next($request);
            }
            return redirect('http://localhost:3000/');
        }

        // Nếu không có session, kiểm tra JWT từ cookie hoặc header
        $token = $request->cookie('admin_token') ?? $request->header('Authorization');

        if ($token) {
            try {
                // Loại bỏ prefix "Bearer " nếu có
                if (strpos($token, 'Bearer ') === 0) {
                    $token = substr($token, 7);
                }

                $decoded = JWT::decode($token, new Key(env('JWT_SECRET', 'your-secret-key'), 'HS256'));
                $user = User::find($decoded->sub);

                if ($user && $user->role > 0) {
                    // Đăng nhập user
                    Auth::login($user);
                    return $next($request);
                }
            } catch (\Exception $e) {
                \Log::error('JWT verification failed in CheckRole', ['error' => $e->getMessage()]);
            }
        }

        return redirect('http://localhost:3000/login');
    }


}
