<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Producttype;
use Illuminate\Support\Facades\Auth;
class ProducttypeController extends Controller
{
    //
    public function index(){
        $producttypes=DB::table('producttypes')->paginate(2);;
        return view('product.type.index',compact('producttypes'));
    }
    public function store(Request $request){
        // ตรวจสอบข้อมูล
          $request->validate([
          'producttype_name'=>'required|unique:producttypes|max:255'
      ],[
          'producttype_name.required' => "กรุณาป้อนประเภทสินค้าด้วยครับ",
          'producttype_name.max' => "ห้ามเกิน 255 ตัวอักษร",
          'producttype_name.unique' => "มีชื่อประเภทสินค้านี้ในข้อมุลแล้ว"
      ]);
        $data = array();
        $data["producttype_name"] = $request->producttype_name;
        DB::table('producttypes')->insert($data);
        return redirect()->back()->with('success',"บันทึกข้อมูลเรียบร้อยแล้ว");      
}
        // แสดงข้อมูล
        public function edit($id){
        $producttype =Producttype::find($id);
        return view('product.type.edit',compact('producttype'));    
}
        // อัพเดต
        public function update(Request $request, $id)
        {
            $request->validate(
                [
                    'producttype_name' => 'required|unique:producttypes|max:255'
                ],
                [
                    'producttype_name.required' => "กรุณาป้อนตำแหน่งด้วยครับ",
                    'producttype_name.max' => "ห้ามเกิน 255 ตัวอักษร",
                    'producttype_name.unique' => "มีชื่อซัพพลายเออร์นี้ในข้อมุลแล้ว"
                ]
            );
            $update = Producttype::find($id)->update([
                'producttype_name' => $request->producttype_name,
                'id' =>Auth::user()->id
            ]);
            return redirect()->route('producttype')->with('success',"แก้ไขข้อมูลเรียบร้อยแล้ว");
  }
}