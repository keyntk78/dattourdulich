<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChuongTrinhTour;

class ChuongTrinhTouControllerr extends Controller
{
    private $chuongtrinhtour;

    const _PER_PAGE = 10;

    public function __construct()
    {
        $this->chuongtrinhtour = new ChuongTrinhTour();
    }

     public function index(Request $request)
    {
        $filters =[];
        $keyword = null;

          if (!empty($request->id_tour)) {
            $id_tour = $request->id_tour;
            
            $filters[] = ['chuongtrinhtour.id_tour', '=', $id_tour];
        }

        if (!empty($request->keywords)) {
            $keyword = $request->keywords;
        }
        
        $chuongtrinhtour = $this->chuongtrinhtour->getAllChuongtrinhtours($filters, $keyword, self:: _PER_PAGE); 

        $title = 'Danh sách chương trình tour';

        return view('admin.chuongtrinhtour.index', compact('chuongtrinhtour', 'title'));
    }


    // get
    public function addChuongTrinhTour()
    {
         $title = 'Thêm chương trình tour';
        return view('admin.chuongtrinhtour.add', compact('title'));
    }

     public function postaddChuongTrinhTour(Request $request)
    {
        $request->validate([
            'tieu_de' => 'required',
            'id_tour' => 'not_in:0',
            'ngay_thu' => 'required|numeric',
            'mo_ta' => 'required',
           

        ],[
            'tieu_de.required' => 'Tiêu đề bắt buộc phải nhập',
            'id_tour.not_in' => 'Phải chọn tour',
            'ngay_thu.required' => 'Ngày thứ bắt buộc phải nhập',
            'ngay_thu.numeric' => 'Phải là số',
            'mo_ta.required' => 'Mô tả bắt buộc phải nhập',
        ]);

         $dataInsert = [
            'tieu_de' => $request->tieu_de,
            'id_tour' => $request->id_tour,
            'ngay_thu' => $request->ngay_thu,
            'mo_ta' => $request->mo_ta,          
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' =>date('Y-m-d H:i:s'),
        ];
        
        $this->chuongtrinhtour->addChuongTrinhTour($dataInsert);
        return back()->with('thongbao','Thêm chương trình tour  thành công');
    }

   public function getEditChuongTrinhTour(Request $request, $id = 0)
   {
        if (!empty($id)){
            $chuongtrinhtourDetails = $this->chuongtrinhtour->getDetail($id);
            if (!empty($chuongtrinhtourDetails[0])) {
                 $request->session()->put('id', $id);
                 $chuongtrinhtourDetails = $chuongtrinhtourDetails[0];
            } else {
                return redirect()->route('chuongtrinhtour.index')->with('thongbao', 'Chương trình tour không tồn tại');
            }
        }else{
            return redirect()->route('chuongtrinhtour.index')->with('thongbao', 'Liên kết không tồn tại');
        }

        $title = $chuongtrinhtourDetails->tieu_de;

        return view('admin.chuongtrinhtour.edit', compact('chuongtrinhtourDetails', 'title'));
   }

    public function postEditChuongTrinhTour(Request $request)
    {
        $id = session('id');
        if (empty($id)) {
            return back()->with('thongbao','Liên kế không tồn tại');
        }
        
        $request->validate([
                    'tieu_de' => 'required',
                    'id_tour' => 'not_in:0',
                    'ngay_thu' => 'required|numeric',
                    'mo_ta' => 'required',
                    
                ],[
                    'tieu_de.required' => 'Tiêu đề bắt buộc phải nhập',
                    'id_tour.not_in' => 'Phải chọn tour',
                    'ngay_thu.required' => 'Ngày thứ bắt buộc phải nhập',
                    'ngay_thu.numeric' => 'Ngày thứ phải là số',
                    'mo_ta.required' => 'Mô tả bắt buộc phải nhập',
                ]);


        $dataUpdate = [
            'tieu_de' => $request->tieu_de,
            'id_tour' => $request->id_tour,
            'ngay_thu' => $request->ngay_thu,      
            'mo_ta' => $request->mo_ta,      
            'updated_at' =>date('Y-m-d H:i:s'),
        ];

       $this->chuongtrinhtour->updateChuongtrinhtour($dataUpdate,$id);

       return back()->with('thongbao','Cập nhật chương trình tour thành công');
    }

     public function deleteChuongTrinhTour($id)
    {
          if (!empty($id)){
            $chuongtrinhtourDetails = $this->chuongtrinhtour->getDetail($id);
            if (!empty($chuongtrinhtourDetails[0])) {
                $deleteStatus = $this->chuongtrinhtour->DeleteChuongtrinhtour($id);
                if ($deleteStatus) {
                    $thongbao = 'Xóa chương trinh tour thành công';
                } else {
                    $thongbao = 'Xóa chương trinh tourkhông thành công. Vui lòng thử lại!';
                }
            } else {
               $thongbao = 'Chương trinh tour không tồn tại';
            }
        }else{
             $thongbao = 'Liên kết không tồn tại';
        }
        return redirect()->route('chuongtrinhtour.index')->with('thongbao', $thongbao);
    }
}