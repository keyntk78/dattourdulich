<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DiaDiem;
use App\Models\Tinh;

class DiaDiemController extends Controller
{
    
    private $diaDiem;
    private $tinh;
    
    public function __construct()
    {
        $this->diaDiem = new DiaDiem();
        $this->tinh = new Tinh();

    }

    public function index(){

        $diadiem = $this->diaDiem->getAllDiaDiem();
        $title = 'Danh sách địa điểm';
        
        return view('admin.diadiem.index', compact('diadiem', 'title'));
    }

    public function addDiaDiem(){

        $tinh = $this->tinh->getAllTinh();
         $title = 'Thêm địa điểm';
        return view('admin.diadiem.add', compact('tinh', 'title'));
    }

    public function postaddDiaDiem(Request $request){

         $request->validate([
            'diem_den' => 'required',
            'mo_ta' => 'required',
            'id_tinh' => 'required',


        ],[
            'diem_den.required' => 'Điểm đến bắt buộc phải nhập',
            'mo_ta.required' => 'Mô tả bắt buộc phải nhập',
            'id_tinh.required' => 'Tỉnh phải bắt buộc phải chọn'
        ]);


        $dataInsert = [
            $request->diem_den,
            $request->id_tinh,
            $request->mo_ta,
            date('Y-m-d H:i:s'),
            date('Y-m-d H:i:s'),
        ];

        $this->diaDiem->addDiaDiem($dataInsert);
        
        return back()->with('thongbao','Thêm địa điểm thành công');

    }

    public function getEditDiaDiem(Request $request, $id = 0)
    {
        if (!empty($id)){
            $diadiemDetails = $this->diaDiem->getDetail($id);
            if (!empty($diadiemDetails[0])) {
                 $request->session()->put('id', $id);
                 $diadiemDetails = $diadiemDetails[0];
            } else {
                return redirect()->route('diadiem.index')->with('thongbao', 'Địa điểm không tồn tại');
            }
        }else{
            return redirect()->route('diadiem.index')->with('thongbao', 'Liên kết không tồn tại');
        }

        $title = $diadiemDetails->diem_den;

       return view('admin.diadiem.edit', compact('diadiemDetails', 'title'));
    }

    public function postEditDiaDiem(Request $request)
    {
        $id = session('id');
        if (empty($id)) {
            return back()->with('thongbao','Liên kế không tồn tại');
        }
        
        $request->validate([
                    'diem_den' => 'required',
                    'id_tinh' => 'not_in:0',
                    'mo_ta' => 'required',
                    
                ],[
                    'diem_den.required' => 'Điểm đến bắt buộc phải nhập',
                    'id_tinh.not_in' => 'Phải chọn tỉnh',
                    'mo_ta.required' => 'Mô tả bắt buộc phải nhập',
                ]);


        $dataUpdate = [
            'diem_den' => $request->diem_den,
            'id_tinh' => $request->id_tinh,
            'mo_ta' => $request->mo_ta,      
            'updated_at' =>date('Y-m-d H:i:s'),
        ];

       $this->diaDiem->updateDiemDen($dataUpdate,$id);

       return back()->with('thongbao','Cập nhật địa điểm thành công');
    }

    public function deleteDiaDiem($id)
    {
          if (!empty($id)){
            $diadiemDetails = $this->diaDiem->getDetail($id);
            if (!empty($diadiemDetails[0])) {
                $deleteStatus = $this->diaDiem->DeleteDiaDiem($id);
                if ($deleteStatus) {
                    $thongbao = 'Xóa địa điểm thành công';
                } else {
                    $thongbao = 'Xóa địa điểm không thành công. Vui lòng thử lại!';
                }
            } else {
               $thongbao = 'Địa điểm không tồn tại';
            }
        }else{
             $thongbao = 'Liên kết không tồn tại';
        }
        return redirect()->route('diadiem.index')->with('thongbao', $thongbao);
    }
}