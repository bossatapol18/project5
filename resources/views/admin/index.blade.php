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
                                    <th scope="col">ชื่อตำแหน่ง</th>
                                    <th scope="col">วันที่สร้าง</th>
                                    <th scope="col">เมนูการจัดการ</th>
                                </tr>
                            </div>
                        </thead>
                        <tbody>
                            @foreach($departments as $row)
                            <tr>
                            <tr>
                                <th>{{$departments->firstItem()+$loop->index}}</th>
                                <th>{{$row->department_name}}</th>
                                <th>
                                    @if($row->created_at == NULL)
                                    ไม่ถูกนิยาม
                                    @else
                                    {{Carbon\carbon::parse($row->created_at)->diffForHumans()}}
                                    @endif
                                </th>
                                <th><a href="{{url('/department/edit/'.$row->id)}}" class="btn btn-primary">แก้ไข</a></th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                        {{ $departments->links()}}
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">แบบฟอร์ม</div>
                        <div class="card-body">
                            <form action="{{route('adddepartment')}}" method="post">
                            @csrf
                                <div class="form-group">
                                    <label for="department_name">ชื่อตำแหน่ง</label>
                                    <input class="form-control" type="text" name="department_name">
                                </div> 
                                @error('department_name')
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