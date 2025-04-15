<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $sanctumToken = $user->createToken('auth_token')->plainTextToken;

            // Tạo JWT token cho admin
            $adminToken = null;
            if ($user->role > 0) {
                $payload = [
                    'iss' => config('app.url'),
                    'sub' => $user->id,
                    'role' => $user->role,
                    'iat' => time(),
                    'exp' => time() + (60 * 60) // Hết hạn sau 1 giờ
                ];
                $adminToken = JWT::encode($payload, env('JWT_SECRET', 'your-secret-key'), 'HS256');
            }

            return response()->json([
                'success' => true,
                'message' => 'Đăng nhập thành công',
                'data' => [
                    'user' => [
                        'id' => $user->id,
                        'name' => $user->name,
                        'email' => $user->email,
                        'role' => $user->role,
                    ],
                    'token' => $sanctumToken,
                    'admin_token' => $adminToken,
                ],
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Thông tin đăng nhập không chính xác',
        ], 401);
    }

    public function register(Request $request)
    {
        // Nhận dữ liệu từ request
        $data = $request->only('name', 'email', 'password', 'phone');

        // Kiểm tra tính hợp lệ của dữ liệu
        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => [
                'required',
                'string',
                'min:8', // Ít nhất 8 ký tự
                'regex:/^(?![\\/]).*$/', // Không bắt đầu bằng \ hoặc /
                'regex:/[A-Z]/', // Có ít nhất 1 ký tự in hoa
                'regex:/[0-9]/', // Có ít nhất 1 ký tự số
                'regex:/[\W_]/', // Có ít nhất 1 ký tự đặc biệt
            ],
        ], [
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
            'password.regex' => 'Mật khẩu phải chứa ít nhất 1 ký tự in hoa, 1 số, 1 ký tự đặc biệt và không bắt đầu bằng \\ hoặc /.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Dữ liệu không hợp lệ',
                'errors' => $validator->errors(),
            ], 422);
        }

        // Mã hóa mật khẩu
        $data['password'] = Hash::make($data['password']);
        $data['role'] = 0;

        // Tạo người dùng mới
        $user = User::create($data);

        // Trả về phản hồi
        if ($user) {
            return response()->json([
                'success' => true,
                'message' => 'Đăng ký thành công',
                'data' => [
                    'user' => [
                        'id' => $user->id,
                        'name' => $user->name,
                        'email' => $user->email,
                        'role' => $user->role ?? 0,
                    ],
                ],
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Đăng ký thất bại',
            ], 500);
        }
    }

    public function setTempToken(Request $request)
    {
        $tempToken = $request->query('token');

        if (!$tempToken || strlen($tempToken) !== 36) {
            return redirect('http://localhost:3000/login')->with('error', 'Token không hợp lệ');
        }

        $userId = Cache::pull('temp_token_' . $tempToken); // Lấy và xóa token ngay lập tức
        if (!$userId) {
            return redirect('http://localhost:3000/login')->with('error', 'Token không hợp lệ hoặc đã hết hạn');
        }

        $user = User::find($userId);
        if (!$user) {
            return redirect('http://localhost:3000/login')->with('error', 'Người dùng không tồn tại');
        }

        // Đăng nhập người dùng và tạo session
        Auth::login($user);

        // Đặt cookie session
        $request->session()->regenerate();

        // Redirect đến trang admin
        return redirect('/admin/dreamup');
    }

    public function verifyAdminToken(Request $request)
    {
        $token = $request->query('token');

        if (!$token) {
            return redirect('http://localhost:3000/login');
        }

        try {
            $decoded = JWT::decode($token, new Key(env('JWT_SECRET', 'your-secret-key'), 'HS256'));

            // Tìm user từ token
            $user = User::find($decoded->sub);

            if (!$user || $user->role == 0) {
                return redirect('http://localhost:3000/login');
            }

            // Đăng nhập user
            Auth::login($user);
            $request->session()->regenerate();

            // Lưu token vào cookie
            $response = redirect('/admin/dreamup');
            $response->cookie('admin_token', $token, 60); // 60 phút

            return $response;

        } catch (\Exception $e) {
            \Log::error('JWT verification failed', ['error' => $e->getMessage()]);
            return redirect('http://localhost:3000/login');
        }
    }
}
