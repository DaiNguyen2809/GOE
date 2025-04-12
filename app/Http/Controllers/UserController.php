<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('dream-up.pages.user.index', compact('users'));
    }

    public function create()
    {
        return view('dream-up.pages.user.create');
    }

    public function store(Request $request) {
        $messages = [
            'id.max' => 'Mã User không được quá 100 ký tự',
            'id.unique' => 'Mã User đã tồn tại',
            'name.required' => 'Tên User không được để trống',
            'name.string' => 'Tên User phải là chuỗi ký tự',
            'name.max' => 'Tên User không được quá 100 ký tự',
            'phone.required' => 'Số điện thoại không được để trống',
            'phone.max' => 'Số điện thoại phải có 10 số',
            'email.email' => 'Email không đúng định dạng (VD:abc@email.com)',
            'email.unique' => 'Địa chỉ email đã tồn tại',
            'email.max' => 'Địa chỉ email không được quá 255 ký tự',
            'role.required' => 'Không được bỏ qua quyền người dùng'
        ];

        $request->validate([
            'id' => 'max:100|unique:customers,id',
            'name' => 'required|string|max:100',
            'phone' => 'required|string|max:10',
            'email' =>  'nullable|email|unique:customers,email|max:255',
            'role' => 'required'
        ], $messages);

        $password = $request->password;

        if (empty($password)) {
            return back()->withErrors(['password' => 'Mật khẩu không được để trống.'])->withInput();
        }

        if (preg_match('/^[!@#$%^&*(),.?":{}\|<>_\-\\\\\/]/', $password))
            return back()->withErrors(['password' => 'Mật khẩu không được bắt đầu bằng ký tự đặc biệt.'])->withInput();


        if (preg_match('/[\\\\\/]/', $password))
            return back()->withErrors(['password' => 'Mật khẩu không được chứa ký tự \\ hoặc /.'])->withInput();


        if (strlen($password) < 8)
            return back()->withErrors(['password' => 'Mật khẩu phải có ít nhất 8 ký tự.'])->withInput();


        if (!preg_match('/[A-Z]/', $password))
            return back()->withErrors(['password' => 'Mật khẩu phải chứa ít nhất một chữ in hoa (A-Z).'])->withInput();


        if (!preg_match('/[a-z]/', $password))
            return back()->withErrors(['password' => 'Mật khẩu phải chứa ít nhất một chữ thường (a-z).'])->withInput();


        if (!preg_match('/[0-9]/', $password))
            return back()->withErrors(['password' => 'Mật khẩu phải chứa ít nhất một số (0-9).'])->withInput();


        if (!preg_match('/[!@#$%^&*(),.?":{}\|<>_\-]/', $password))
            return back()->withErrors(['password' => 'Mật khẩu phải chứa ít nhất một ký tự đặc biệt.'])->withInput();

        $data = [
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'email_verified_at' => now(),
            'password' => Hash::make($password),
            'created_at' => now(),
            'updated_at' => now(),
        ];

        if (!empty($request->id))
            $data['id'] = $request->id;

        $user = User::create($data);
        return redirect()->route('ur-index')->with('success', 'Tạo người dùng thành công');
    }

    public function edit(User $user) {
        return view('dream-up.pages.user.edit', compact('user'));
    }

    public function update(Request $request, User $user) {
        $message = [
            'id.max' => 'Mã KH không được quá 100 ký tự',
            'id.unique' => 'Mã KH đã tồn tại',
        ];

        $request->validate([
            'id' => [
                'max:100',
                Rule::unique('users', 'id')->ignore($user->id), // Kiểm tra mã nhưng bỏ qua chính nó
            ],
        ]);

        $data = [
            'id' => $request->id,
            'role' => $request->role
        ];

        User::where('id', $user->id)->update($data);
        return redirect()->route('ur-index')->with('success', 'Cập nhật tài khoản thành công ');
    }

    public function search(Request $request)
    {
        $query = $request->get('query');
        $users = User::where('name', 'like', '%' . $query . '%')->orWhere('phone', 'like', '%' . $query . '%')->orWhere('email', 'like', '%' . $query . '%')->paginate(20);
        return view('dream-up.pages.user.table', compact('users'))->render();
    }
}
