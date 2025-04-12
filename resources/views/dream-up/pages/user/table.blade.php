<div class="overflow-auto max-h-[calc(100vh-250px)] px-1 py-1 shadow-md rounded-lg"> <!-- Điều chỉnh max-height cho phù hợp -->
    <table class="table-auto w-full border-collapse text-sm">
        <thead class="bg-slate-800 sticky top-0 z-10 shadow-md">
        <tr class="text-left text-white h-12">
            <th class="p-4">Mã tài khoản</th>
            <th class="p-4">Tên người dùng</th>
            <th class="p-4 text-center">Số điện thoại</th>
            <th class="p-4 text-center">Email</th>
            <th class="p-4 text-center">Quyền</th>
        </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 cursor-pointer">
        @foreach($users as $user)
            <tr class="hover:bg-gray-100 h-16 group" onclick="window.location='{{ route('ur-edit', $user->id) }}'">
                <td class="p-4 text-blue-500 group-hover:underline">{{ $user->id }}</td>
                <td class="p-4">{{ $user->name }}</td>
                <td class="p-4 text-center">{{ $user->phone }}</td>
                <td class="p-4 text-center">{{ $user->email }}</td>
                <td class="p-4 text-center">{{ $user->role }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
