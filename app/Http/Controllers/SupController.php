<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SupController extends Controller
{
    //
    public function index()
    {
        $sups=DB::table('sups')->paginate(2);
        return view('admin.sup.index', compact('sups'));
    }
    public function store(Request $request)
    {
        // ตรวจสอบข้อมูล
        $request->validate([
            'sup_name' => 'required|unique:sups|max:255'
        ], [
            'sup_name.required' => "กรุณาป้อนตำแหน่งด้วยครับ",
            'sup_name.max' => "ห้ามเกิน 255 ตัวอักษร",
            'sup_name.unique' => "มีชื่อแผนกนี้ในข้อมุลแล้ว"
        ]);
        //บันทึก
        $data = array();
        $data["sup_name"] = $request->sup_name;
        $data["sup_phone"] = $request->sup_phone;
        $data["sup_add"] = $request->sup_add;
        DB::table('sups')->insert($data);
        return redirect()->back()->with('success', "บันทึกข้อมูลเรียบร้อยแล้ว");
    }
    // แสดงข้อมูล
    public function edit($id)
    {
        $sup = Sup::find($id);
        return view('admin.sup.edit', compact('sup'));
    }
    // อัพเดต
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'sup_name' => 'required|unique:sups|max:255'
            ],
            [
                'sup_name.required' => "กรุณาป้อนตำแหน่งด้วยครับ",
                'sup_name.max' => "ห้ามเกิน 255 ตัวอักษร",
                'sup_name.unique' => "มีชื่อซัพพลายเออร์นี้ในข้อมุลแล้ว"
            ]
        );
        $update = Sup::find($id)->update([
            'sup_name' => $request->sup_name,
            'id' =>Auth::user()->id
        ]);
        return redirect()->route('sup')->with('success',"แก้ไขข้อมูลเรียบร้อยแล้ว");
    }
}
