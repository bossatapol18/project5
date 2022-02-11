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
                    <div class="card">
                        <div class="card-header">รายละเอียดข้อมูลของคุณ {{ Auth::user()->name}} </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="id">ชื่อผู้ใช้งานระบบ</label>
                                <p>{{$user->name}}</p>
                                </div> 
                                <div class="form-group">
                                    <label for="id">อีเมล์ของผู้ใช้งานระบบ</label>
                                <p>{{$user->email}}</p>
                                </div> 
                                <div class="form-group">
                                    <label for="id">เบอร์โทรศัพท์</label>
                                <p>{{$user->telephone}}</p>
                                </div> 
                                <div class="form-group">
                                    <label for="id">ที่อยู่ของผุ้ใช้งานระบบ</label>
                                <p>{{$user->address}}</p>
                                </div> 
                                <div class="form-group">
                                    <label for="id">วันที่สร้าง</label>
                                <p>{{$user->created_at}}</p>
                                </div> 
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>