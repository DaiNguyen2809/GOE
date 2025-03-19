<div id="pd-cat-table" class="overflow-auto max-h-[calc(100vh-260px)] w-full px-1 py-1 shadow-md rounded-lg"> <!-- Điều chỉnh max-height cho phù hợp -->
    <table class="table-auto table-fixed w-full border-collapse text-sm">
        <thead class="bg-slate-800 sticky top-0 z-10 shadow-md">
        <tr class="text-left text-white h-12">
            <th class="p-2">Tên nhóm</th>
            <th class="p-2">Mã nhóm</th>
            <th class="p-2">Mô tả</th>
            <th class="p-2 text-center">Số lượng sản phẩm</th>
            <th class="p-2 text-center">Ngày tạo</th>
        </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 cursor-pointer">
        @foreach($categories as $category)
            <tr class="hover:bg-gray-100 h-14" onclick="window.location='{{ route('pd-cat-edit', $category->id) }}'">
                <td class="p-2">{{ $category->name }}</td>
                <td class="p-2 font-gilroy_bd">{{ $category->id }}</td>
                <td class="p-2">{{ $category->description }}</td>
                <td class="p-2 text-center">{{ $category->quantity }}</td>
                <td class="p-2 text-center">{{ $category->created_at }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div id="pd-cat-pagination" class="mt-4">
    @if (!request()->ajax())
        {{ $categories->links('vendor.pagination.tailwind') }}
    @endif
</div>

