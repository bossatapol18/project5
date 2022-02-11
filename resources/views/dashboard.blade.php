<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ยินดีต้อนรับ {{ Auth::user()->name}}
            <div class="float-end">จำนวนผู้ใช้งานระบบ {{count($users)}} คน</div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ลำดับ</th>
                                <th scope="col">ชื่อ - นามสกุล</th>
                                <th scope="col">อีเมล์</th>
                                <th scope="col">วันที่สร้าง</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach($users as $row)
                            <tr>   
                                <th scope="row">1</th>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ Carbon\carbon::parse($row->created_at)->diffForHumans() }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>