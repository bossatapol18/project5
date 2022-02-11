<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users=DB::table('users')
        ->join('detailusers','users.id','detailusers.user_id')
        ->join('departments','users.id','departments.user_id')
        ->select('users.*','detailusers.telephone')
        ->select('users.*','detailusers.address','detailusers.telephone','detailusers.birthday','departments.department_name')->paginate(3);
        return view('admin.user.index', compact('users'));
    }
      // แสดงข้อมูล
      public function show($id){
        $user = User::find($id);
        return view('admin.user.show',compact('user'));    
}

}
