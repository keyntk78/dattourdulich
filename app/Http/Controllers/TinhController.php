<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Tinh;

class TinhController extends Controller
{
    private $tinh;

     public function __construct(){
        $this->tinh = new Tinh();
    }
     //lấy all
    public function index(){
        
        $data = $this->tinh->getAllTinh();

        $title = 'Danh sách tỉnh';
        return view('admin.tinh.index',['tinh'=> $data], compact('title'));
    }

    // thêm 
    public function addTinh(){
            
        $title = "Thêm tỉnh";
        return view('admin.tinh.add', compact('title'));
    }
    // post thêm tỉnh
    public function postAddTinh(Request  $request){

        $request->validate([
            'tentinh' => 'required',
        ],[
            'tentinh.required' => 'Tên tỉnh bắt buộc phải nhập',
        ]);

        $dataInsert = [
            $request->tentinh,
            date('Y-m-d H:i:s'),
            date('Y-m-d H:i:s'),
        ];
        $this->tinh->addTinh($dataInsert);

        return back()->with('thongbao', 'Thêm tỉnh thành công');
    }

    // get sửa tỉnh
    public function getEditTinh(Request $request,$id = 0){
       
        if (!empty($id)){
            $tinhDetails = $this->tinh->getDetail($id);
            if (!empty($tinhDetails[0])) {
                 $request->session()->put('id', $id);
                 $tinhDetails = $tinhDetails[0];
            } else {
                return redirect()->route('tinh.index')->with('thongbao', 'Tỉnh không tồn tại');
            }
        }else{
            return redirect()->route('tinh.index')->with('thongbao', 'Liên kết không tồn tại');
        }

        $title = $tinhDetails->tentinh;

        return view('admin.tinh.edit', compact('tinhDetails', 'title'));    
    }

    //post sửa

     public function postEditTinh(Request $request){
       
        $id = session('id');
        if (empty($id)) {
            return back()->with('thongbao','Liên kế không tồn tại');
        }

        $request->validate([
            'tentinh' => 'required',
        ],[
            'tentinh.required' => 'Tên tỉnh bắt buộc phải nhập',
        ]);

        $dataUpdate = [
            $request->tentinh,
            date('Y-m-d H:i:s'),
        ];

       $this->tinh->updateTinh($dataUpdate,$id);

       return back()->with('thongbao','Cập nhật tỉnh thành công');
    }

    public function deleteTinh($id)
    {
         if (!empty($id)){
            $tinhDetails = $this->tinh->getDetail($id);
            if (!empty($tinhDetails[0])) {
                $deleteStatus = $this->tinh->DeleteTinh($id);
                if ($deleteStatus) {
                    $thongbao = 'Xóa tỉnh thành công';
                } else {
                    $thongbao = 'Xóa tỉnh không thành công. Vui lòng thử lại!';

                }

            } else {
               $thongbao = 'Tỉnh không tồn tại';
            }
        }else{
             $thongbao = 'Liên kết không tồn tại';
        }
        return redirect()->route('tinh.index')->with('thongbao', $thongbao);

    }
}