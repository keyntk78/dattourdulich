<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $user = User::all();
        $title = "Danh sách người dùng";
        return view('admin.user.index', ['user' => $user], compact('title'));
    }

    public function edit($id)
    {   
        $user = User::find($id);
        $title = 'Chỉnh sửa người dùng';
        return view('admin.user.edit',['user'=>$user], compact('title'));

    }
    public function postEdit(Request $request, $id)
    {
        $this->validate($request,[
            'hoten'=> 'required',
            'dienthoai' => ['required', 'string', 'max:15'],
            'diachi' => ['required', 'string', 'max:255'],
            'cmnd' => ['required', 'string', 'max:15'],
            'gender' => ['required'],
            
        ],
        [
            'hoten.required'=>'Bạn chưa nhập tên người dùng',
            'dienthoai.max' => 'Số Điện thoại không quá  15 ký tự',
			'dienthoai.required' => 'Số Điện thoại là trường bắt buộc',
			'diachi.required' => 'Địa chỉ là trường bắt buộc',
			'diachi.max' => 'Địa chỉ không quá 255 ký tự',
			'cmnd.max' => 'Số Điện thoại không quá  15 ký tự',
			'cmnd.required' => 'CMND/CCCD là trường bắt buộc',
			'gender.required' => 'Gioi tính là trường bắt buộc',
        ]);

        $user = User::find($id);
        $user->hoten = $request->hoten;
        $user->level = $request->level;
        $user->dienthoai = $request->dienthoai;
        $user->diachi = $request->diachi;
        $user->cmnd = $request->cmnd;
        $user->gender = $request->gender;

        if($request->changePassword == "on")
        {
             $this->validate($request,[
            'password'=>'required|min:6|max:32',
            'password_confirmation'=>'required|same:password',
        ],
        [
            
            'password.required'=>'Bạn chưa nhập mật khẩu',
            'password.min'=>'Mật khẩu phải có ít nhất 6 kí tự',
            'password.max'=>'Mật khẩu không được quá 32 kí tự',
            'password_confirmation.required'=>'Hãy nhập lại mật khẩu',
            'password_confirmation.same'=>'Mật khẩu nhập lại không đúng',
        ]);
            $user->password = bcrypt($request->password);
        }    
        $user->save();
        return redirect('admin/user/edit/'.$id)->with('thongbao','Sửa thành công');
    }


    ///////////////////
    // Xóa
    ///////////////////
    public function delete($id) 
    {
        $user = User::find($id);
        $user->delete();
        return redirect('admin/user')->with('thongbao','Xóa tài khoản thành công');
    }
}