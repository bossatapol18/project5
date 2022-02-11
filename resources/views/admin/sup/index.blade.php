<!-- แผนก + ผู้ใช้ -->
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
                @if(session("success"))
                    <div class="alert alert-success">{{session('success')}}</div>
                    @endif
                    <table class="table table-hover table-bordered">
                        <thead>
                            <div class="card">
                                <tr class="card-header">
                                    <th scope="col">ลำดับ</th>
                                    <th scope="col">ชื่อซัพพลายเออร์</th>
                                    <th scope="col">เบอร์โทรซัพพลายเออร์</th>
                                    <th scope="col">ที่อยู่ซัพพลายเออร์</th>
                                    <th scope="col">วันที่สร้าง</th>
                                    <th scope="col">เมนูการจัดการ</th>
                                </tr>
                            </div>
                        </thead>
                        <tbody>
                            @foreach($sups as $row)
                            <tr>
                            <tr>
                                <th>{{$sups->firstItem()+$loop->index}}</th>
                                <th>{{$row->sup_name}}</th>
                                <th>{{$row->sup_phone}}</th>
                                <th>{{$row->sup_add}}</th>
                                <th>
                                    @if($row->created_at == NULL)
                                    ไม่ถูกนิยาม
                                    @else
                                    {{Carbon\carbon::parse($row->created_at)->diffForHumans()}}
                                    @endif
                                </th>
                                <th><a href="{{url('/sup/edit/'.$row->id)}}" class="btn btn-primary">แก้ไข</a></th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                     
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">แบบฟอร์ม</div>
                        <div class="card-body">
                            <form action="{{route('addsup')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="sup_name">ชื่อซัพพลายเออร์</label>
                                    <input class="form-control" type="text" name="sup_name">
                                </div> 
                                <br>
                                <div class="form-group">
                                    <label for="sup_phone">เบอร์โทรซัพพลายเออร์</label>
                                    <input class="form-control" type="text" name="sup_phone">
                                </div> 
                                <br>
                                <div class="form-group">
                                    <label for="sup_add">ที่อยู่ซัพพลายเออร์</label>
                                    <input class="form-control" type="text" name="sup_add">
                                </div> 
                                @error('sup_name')
                                <div class="my-2">
                                    <span class="text-danger">{{$message}}</span>
                                </div>
                                @enderror
                                <br>
                                <input type="submit" value="บันทึกข้อมูล" class="btn btn-primary">
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>