@extends('dream-up.admin-dream')
@section('title','Tạo đơn hàng')
@section('content')
    <div class="bg-white h-fit w-full flex px-3 py-3">
        <div class="h-full w-[30%] 2xl:w-[25%] flex items-center cursor-pointer group">
            <i class="fa-solid fa-chevron-left ml-8 text-base text-gray-500"></i>
            <a href="{{ route('od-index') }}" class="ml-2 text-base text-gray-500 group-hover:underline">Quay lại danh sách hóa đơn</a>
        </div>
        <div class="h-full flex items-center justify-end w-[68%] 2xl:w-[74%]">
            <a href="{{ route('od-index') }}" class="w-[12%] 2xl:w-[7%] px-4 py-2 ml-4 bg-white border border-blue-600 text-blue-600 font-gilroy rounded-md cursor-pointer hover:bg-blue-600 hover:text-white text-center text-sm"><i class="fa-solid fa-ban mr-2"></i>Hủy</a>
            <button type="submit" form="od-form-create" class="w-[20%] 2xl:w-[13%] px-4 py-2 ml-4 bg-white border border-green-600 text-green-600 font-gilroy rounded-md cursor-pointer hover:bg-green-600 hover:text-white text-center text-sm"><i class="fa-solid fa-check mr-2"></i></i>Tạo đơn hàng</button>
        </div>
    </div>

    <form action="" id="od-form-create" method="POST" class="w-[96%] flex flex-wrap gap-6 mb-10"
          x-data='{
                "searchProduct": "",
                "selectedProducts": [],
                "products": @json($products ?? [], JSON_UNESCAPED_UNICODE),
                "search": "",
                "selectedCustomer": null,
                "showCustomerList": false,
                "showProductList": false,
                "selectedPrice": "",
                "selectedButton": "value",
                "selectedDiscountPercent": 0,
                "customers": @json($customers ?? [], JSON_UNESCAPED_UNICODE),
                "updatePriceSelect": function() {
                    if (this.selectedCustomer) {
                        const priceSelect = this.$refs.priceSelect;
                        const customerPrice = this.selectedCustomer.customer_price;
                        Array.from(priceSelect.options).forEach(option => {
                            option.selected = (option.value == customerPrice);
                        });
                        this.selectedPrice = customerPrice;
                        this.selectedDiscountPercent = this.selectedCustomer.discount_percent;
                    }
                },
                "addOrUpdateProduct": function(product) {
                   const existingProduct = this.selectedProducts.find(p => p.SKU === product.SKU);
                   if (existingProduct) {
                       if (existingProduct.count < product.quantity)
                           existingProduct.count++;
                   } else {
                       this.selectedProducts.push({...product, count: 1});
                   }
                },
                "totalProduct": function () {
                   return this.selectedProducts.reduce((total, product) => total + product.count, 0);
                },
                "calMoneyRaw": function(product) {
                    const price = product.prices[this.selectedPrice] || 0;
                    const count = product.count || 0;
                    const discountPercent = this.selectedDiscountPercent || 0;
                    return count * (price - (discountPercent / 100) * price);
                },
                "calMoney": function(product) {
                    const total = this.calMoneyRaw(product);
                    return isNaN(total) ? "0" : total.toLocaleString("en-US");
                },
                "totalMoney": function() {
                    const total = this.selectedProducts.reduce((sum, product) => {
                        return sum + this.calMoneyRaw(product);
                    }, 0);
                    return total.toLocaleString("en-US");
                }
          }'>
        @csrf
        @include("dream-up.pages.order.info-customer")
        @include("dream-up.pages.order.info-product")
    </form>

    <div class="h-fit flex items-center justify-end w-full mb-10 pr-6">
        <a href="{{ route('od-index') }}" class="w-[9%] 2xl:w-[7%] px-4 py-2 ml-4 bg-white border border-blue-600 text-blue-600 font-gilroy rounded-md cursor-pointer hover:bg-blue-600 hover:text-white text-center text-sm"><i class="fa-solid fa-ban mr-2"></i>Hủy</a>
        <button type="submit" form="od-form-create" class="w-[14%] 2xl:w-[10%] px-4 py-2 ml-4 bg-white border border-green-600 text-green-600 font-gilroy rounded-md cursor-pointer hover:bg-green-600 hover:text-white text-center text-sm"><i class="fa-solid fa-check mr-2"></i></i>Tạo đơn hàng</button>
    </div>
@endsection
