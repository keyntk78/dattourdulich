<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiTour;

class LoaiTourController extends Controller
{
    private $loaiTour;
    
    public function __construct()
    {
        $this->loaiTour = new LoaiTour();
    }

    public function index(){

        $loaitour = $this->loaiTour->getAllLoaiTour();
        $title = 'Danh sách loại tour';
        
        return view('admin.loaitour.index', compact('loaitour', 'title'));
    }

    public function addLoaiTour(){

        $title = 'Thêm loại tour';
        return view('admin.loaitour.add', compact( 'title'));
    }

    public function postaddLoaiTour(Request $request){

        $request->validate([
            'ten_loai_tour' => 'required',
        ],[
            'ten_loai_tour.required' => 'Tên loại tour bắt buộc phải nhập',
        ]);

        
        $dataInsert = [
            $request->ten_loai_tour,
            date('Y-m-d H:i:s'),
            date('Y-m-d H:i:s'),
        ];

        $this->loaiTour->addLoaiTour($dataInsert);
        
        return back()->with('thongbao','Thêm loại tour thành công');
    }

    public function getEditLoaiTour(Request $request, $id = 0)
    {
         if (!empty($id)){
            $loaitourDetails = $this->loaiTour->getDetail($id);
            if (!empty($loaitourDetails[0])) {
                 $request->session()->put('id', $id);
                 $loaitourDetails = $loaitourDetails[0];
            } else {
                return redirect()->route('loaitour.index')->with('thongbao', 'Loại tour không tồn tại');
            }
        }else{
            return redirect()->route('loaitour.index')->with('thongbao', 'Liên kết không tồn tại');
        }

        $title = $loaitourDetails->ten_loai_tour;

        return view('admin.loaitour.edit', compact('loaitourDetails', 'title'));
    }

    public function postEditLoaiTour(Request $request)
    {
        $id = session('id');
        if (empty($id)) {
            return back()->with('thongbao','Liên kế không tồn tại');
        }
        
        $request->validate([
                    'ten_loai_tour' => 'required',
                    
                ],[
                    'ten_loai_tour.required' => 'Tên loại tour bắt buộc phải nhập',
                ]);


        $dataUpdate = [
            'ten_loai_tour' => $request->ten_loai_tour,  
            'updated_at' =>date('Y-m-d H:i:s'),
        ];

       $this->loaiTour->updateLoaitour($dataUpdate,$id);

       return back()->with('thongbao','Cập nhật địa điểm thành công');
    }

    public function deleteLoaiTour($id)
    {
        if (!empty($id)){
            $loaitourDetails = $this->loaiTour->getDetail($id);
            if (!empty($loaitourDetails[0])) {
                $deleteStatus = $this->loaiTour->DeleteLoaiTour($id);
                if ($deleteStatus) {
                    $thongbao = 'Xóa loại tour thành công';
                } else {
                    $thongbao = 'Xóa  loại tour không thành công. Vui lòng thử lại!';
                }
            } else {
               $thongbao = 'Loại tour không tồn tại';
            }
        }else{
             $thongbao = 'Liên kết không tồn tại';
        }
        return redirect()->route('loaitour.index')->with('thongbao', $thongbao);
    }
}