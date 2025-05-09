@extends('dream-up.admin-dream')
@section('title','Cập nhật đơn hàng ' .$formattedOrder['id'])
@section('content')
    <div class="bg-white h-fit w-full flex px-3 py-3">
        <div class="h-full w-[30%] 2xl:w-[25%] flex items-center cursor-pointer group">
            <i class="fa-solid fa-chevron-left ml-8 text-base text-gray-500"></i>
            <a href="{{ route('od-show', $formattedOrder['id']) }}" class="ml-2 text-base text-gray-500 group-hover:underline">Quay lại chi tiết hóa đơn {{ $formattedOrder['id'] }}</a>
        </div>
        <div class="h-full flex items-center justify-end w-[68%] 2xl:w-[74%]">
            <a href="{{ route('od-index') }}" class="w-[12%] 2xl:w-[7%] px-4 py-2 ml-4 bg-white border border-blue-600 text-blue-600 font-gilroy rounded-md cursor-pointer hover:bg-blue-600 hover:text-white text-center text-sm"><i class="fa-solid fa-ban mr-2"></i> Hủy</a>
            <button type="submit" form="od-form-update" class="w-[24%] 2xl:w-[16%] px-4 py-2 ml-4 bg-white border border-green-600 text-green-600 font-gilroy rounded-md cursor-pointer hover:bg-green-600 hover:text-white text-center text-sm"><i class="fa-solid fa-check mr-2"></i> Cập nhật đơn hàng</button>
        </div>
    </div>

    <form action="{{ route('od-update', $formattedOrder['id'])}}" id="od-form-update" method="POST" class="w-[96%] flex flex-wrap gap-6 mb-10"
          x-data='{
              "total": {{ $formattedOrder['sub_total'] ?? 0 }},
              "finalTotal": {{ $formattedOrder['total_after_discount'] ?? 0 }},
              "debt": {{ $formattedOrder['debt'] ?? 0 }},
              "search": "",
              "selectedCustomer": @json($formattedOrder, JSON_UNESCAPED_UNICODE),
              "displayName": "{{ $formattedOrder['cus_name'] ?? ''}}",
              "displayWard": "{{ $formattedOrder['ward'] ?? ''}}",
              "displayArea": "{{ $formattedOrder['area'] ?? ''}}",
              "showCustomerList": false,
              "showProductList": false,
              "searchProduct": "",
              "selectedProducts": @json($formattedOrder['products'] ?? [], JSON_UNESCAPED_UNICODE).map(product => ({...product, count: product.quantity})),
              "products": @json($products ?? [], JSON_UNESCAPED_UNICODE),
              "productStock": @json(collect($products ?? [])->pluck('product_quantity', 'SKU')->all(),JSON_UNESCAPED_UNICODE),
              "selectedPrice": "{{ $formattedOrder['price_type_id'] }}",
              "selectedButton": "amount",
              "selectedDiscountPercent": {{ $formattedOrder['discountPercent'] }},
              "customers": @json($customers ?? [], JSON_UNESCAPED_UNICODE),
              "getProductStock": function(sku) {
                  return this.productStock[sku] || 0;
              },
              "updatePriceSelect": function() {
                  if (this.selectedCustomer) {
                      const priceSelect = this.$refs.priceSelect;
                      const customerPrice = this.selectedCustomer.customer_price;
                      Array.from(priceSelect.options).forEach(option => {
                          option.selected = (option.value == customerPrice);
                      });
                      this.selectedPrice = customerPrice;
                      this.selectedDiscountPercent = this.selectedCustomer.discount_percent;
                      this.totalMoney();
                      this.finalTotalMoney();
                      this.calDebt();
                  }
              },
              "addOrUpdateProduct": function(product) {
                  const existingProduct = this.selectedProducts.find(p => p.SKU === product.SKU);
                  if (existingProduct) {
                      if (existingProduct.count < product.product_quantity)
                          existingProduct.count++;
                  } else {
                      this.selectedProducts.push({...product, count: 1});
                  }
                  this.totalMoney();
                  this.finalTotalMoney();
                  this.calDebt();
              },
              "totalProduct": function() {
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
                  const money = this.selectedProducts.reduce((sum, product) => {
                      return sum + this.calMoneyRaw(product);
                  }, 0);
                  this.total = money.toLocaleString("en-US");
              },
              "finalTotalMoney": function() {
                  const ship = parseInt((this.$refs.ship).value) * 1000;
                  const support = parseInt((this.$refs.support).value) * 1000;
                  const subTotal = parseInt(this.total.replace(/,/g, ""));
                  const final = subTotal + (ship - support);
                  this.finalTotal = isNaN(final) ? "0" : final.toLocaleString("en-US");
                  this.calDebt();
              },
              "calDebt": function() {
                  const final = parseInt(this.finalTotal.replace(/,/g, "")) || 0;
                  const paid = parseInt(this.$refs.paid.value) * 1000 || 0;
                  const debt = final - paid;
                  this.debt = isNaN(debt) ? "0" : debt.toLocaleString("en-US");
              },
              "init": function() {
                  this.totalMoney();
                  this.finalTotalMoney();
                  this.calDebt();
                  this.$watch("selectedProducts", () => {
                      this.totalMoney();
                      this.finalTotalMoney();
                  });
                  this.$watch("$refs.ship.value", () => this.finalTotalMoney());
                  this.$watch("$refs.support.value", () => this.finalTotalMoney());
                  this.$watch("$refs.paid.value", () => this.calDebt());
                  this.$watch("selectedPrice", () => {
                       this.totalMoney();
                       this.finalTotalMoney();
                       this.calDebt();
                  });
              }
          }' @update-total.window="finalTotalMoney()" @update-paid.window="calDebt()">
        @csrf
        @method("PUT")
        @include("dream-up.pages.order.edit-info-customer")
        @include("dream-up.pages.order.edit-info-product")
        <input type="hidden" name="selected_price" x-bind:value="selectedPrice">
        <input type="hidden" name="selected_products" x-bind:value="JSON.stringify(selectedProducts)">
    </form>

    <div class="h-fit flex items-center justify-end w-full mb-10 pr-6">
        <a href="{{ route('od-index') }}" class="w-[9%] 2xl:w-[7%] px-4 py-2 ml-4 bg-white border border-blue-600 text-blue-600 font-gilroy rounded-md cursor-pointer hover:bg-blue-600 hover:text-white text-center text-sm"><i class="fa-solid fa-ban mr-2"></i>Hủy</a>
        <button type="submit" form="od-form-update" class="w-[14%] 2xl:w-[12%] px-4 py-2 ml-4 bg-white border border-green-600 text-green-600 font-gilroy rounded-md cursor-pointer hover:bg-green-600 hover:text-white text-center text-sm"><i class="fa-solid fa-check mr-2"></i>Cập nhật đơn hàng</button>
    </div>
@endsection
