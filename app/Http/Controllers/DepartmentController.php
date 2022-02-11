<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    //
    public function index(){
        // eloqute1
        //$departments=Department::all();
        // querybuilder
        // $departments=Department::paginate(2);
        $departments=DB::table('departments')
        ->join('users','departments.user_id','users.id')
        ->select('departments.*','users.name')->paginate(2);
        return view('admin.index',compact('departments'));
    }
    public function store(Request $request){
          // ตรวจสอบข้อมูล
            $request->validate([
            'department_name'=>'required|unique:departments|max:255'
        ],[
            'department_name.required' => "กรุณาป้อนตำแหน่งด้วยครับ",
            'department_name.max' => "ห้ามเกิน 255 ตัวอักษร",
            'department_name.unique' => "มีชื่อแผนกนี้ในข้อมุลแล้ว"
        ]);
          // เพิ่มข้อมูล
            $data = array();
            $data["department_name"] = $request->department_name;
            $data["user_id"] = Auth::user()->id;
            DB::table('departments')->insert($data);
            return redirect()->back()->with('success',"บันทึกข้อมูลเรียบร้อยแล้ว");      
    }
    // แสดงข้อมูล
    public function edit($id){
            $department = Department::find($id);
            return view('admin.edit',compact('department'));    
    }
    // อัพเดต
    public function update(Request $request , $id){
        $request->validate([
            'department_name'=>'required|unique:departments|max:255'
        ],
        [
            'department_name.required' => "กรุณาป้อนตำแหน่งด้วยครับ",
            'department_name.max' => "ห้ามเกิน 255 ตัวอักษร",
            'department_name.unique' => "มีชื่อแผนกนี้ในข้อมุลแล้ว"
        ]
    );
    $update = Department::find($id)->update([
        'department_name' => $request->department_name,
        'user_id' =>Auth::user()->id
    ]);
    return redirect()->route('department')->with('success',"แก้ไขข้อมูลเรียบร้อยแล้ว");
    }
}
