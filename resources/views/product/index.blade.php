<!-- ผู้ใช้ -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            สวัสดีผู้ใช้งาน {{ Auth::user()->name}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <div class="card">
                                <tr class="card-header">
                                    <th scope="col">ลำดับ</th>
                                    <th scope="col">ชื่อสินค้า</th>
                                    <th scope="col">ประเภทสินค้า</th>
                                    <th scope="col">ราคาสินค้า</th>
                                    <th scope="col">ราคาขาย</th>
                                    <th scope="col">จำนวนสินค้า</th>
                                    <th scope="col">วันที่สร้าง</th>
                                    <th scope="col">เมนูการจัดการ</th>
                                </tr>
                            </div>
                        </thead>
                        <tbody>
                     @foreach($product as $row)
                     <tr>
                        <th>{{$product->firstItem()+$loop->index}}</th>
                         <th>{{$row->product_name}}</th>
                         <th>{{$row->producttype_name}}</th>
                         <th>{{$row->product_price}}</th>
                         <th>{{$row->product_sale}}</th>
                         <th>{{$row->product_net}}</th>
                         <th>
                            @if($row->created_at == NULL)
                            ไม่ถูกนิยาม
                            @else
                            {{Carbon\carbon::parse($row->created_at)->diffForHumans()}}
                            @endif
                        </th>
                        <th>
                            <a href="" class="btn btn-primary">ดูรายละเอียดสินค้า</a>
                        </th>
                     </tr>
                     @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>