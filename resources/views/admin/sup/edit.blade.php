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
                        <div class="card-header">แบบฟอร์มแก้ไข</div>
                        <div class="card-body">
                            <form action="{{url('/sup/update/'.$sup->id)}}" method="post">
                            @csrf
                                <div class="form-group">
                                    <label for="sup_name">ชื่อซัพพลายเออร์</label>
                                    <input class="form-control" type="text" name="sup_name" value="{{$sup->sup_name}}">
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