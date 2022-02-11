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
                <div class="col-md-10">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <div class="card">
                                <tr class="card-header">
                                    <th scope="col">ลำดับ</th>
                                    <th scope="col">ชื่อผู้ใช้งานระบบ</th>
                                    <th scope="col">เบอร์โทรศัพท์</th>
                                    <th scope="col">ที่อยู่ผู้ใช้งานระบบ</th>
                                    <th scope="col">ตำแหน่ง</th>
                                    <th scope="col">วันเวลาที่ใช้งาน</th>
                                    <th scope="col">เมนูการจัดการ</th>
                                </tr>
                            </div>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @foreach($users as $row)
                                <tr>
                                    <th>{{$i++}}</th>
                                    <th>{{$row->name}}</th>
                                    <th>{{$row->telephone}}</th>
                                    <th>{{$row->address}}</th>
                                    <th>{{$row->department_name}}</th>
                                    <th>{{Carbon\carbon::parse($row->created_at)->diffForHumans()}}</th>
                                    <th>
                                        <a href="{{url('/user/show/'.$row->id)}}" class="btn btn-primary">ดูรายละเอียด</a>
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