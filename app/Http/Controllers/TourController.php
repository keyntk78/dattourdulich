<?php

namespace App\Http\Controllers;

use App\Models\Tour;

use Illuminate\Http\Request;

class TourController extends Controller
{
    private $tour;

    const _PER_PAGE = 5;

    public function __construct()
    {
        $this->tour = new Tour();
    }

     public function index(Request $request){

        $filters =[];
        $keyword = null;

        if (!empty($request->id_tinh)) {
            $tinh_id = $request->id_tinh;
            
            $filters[] = ['tour.id_tinh', '=', $tinh_id];
        }

        if (!empty($request->id_diadiem)) {
            $diadiem_id = $request->id_diadiem;
            
            $filters[] = ['tour.id_diadiem', '=', $diadiem_id];
        }

        if (!empty($request->id_loaitour)) {
            $loaitour_id = $request->id_loaitour;
            
            $filters[] = ['tour.id_loaitour', '=', $loaitour_id];
        }

        if (!empty($request->keywords)) {
            $keyword = $request->keywords;
        }
        $tours = $this->tour->getAllTour($filters, $keyword, self:: _PER_PAGE); 

        $title = 'Danh sách tour';
        return view('admin.tour.index', compact('tours', 'title'));
    }

    // get
    public function addTour()
    {
        $title = 'Thêm tour';
        return view('admin.tour.add', compact('title'));
    }

    public function postaddTour(Request $request)
    {
        $request->validate([
            'ten_tour' => 'required',
            'id_tinh' => 'not_in:0',
            'id_diadiem' => 'not_in:0',
            'id_loaitour' => 'not_in:0',
            'gia_nguoi_lon' => 'numeric',
            'gia_tre_em' => 'numeric',
            'so_luong_toi_da' => 'numeric',
            'so_ngay' => 'numeric',
            'so_dem' => 'numeric',
            'lich_trinh' => 'required',
            'mo_ta_tour' => 'required',

        ],[
            'ten_tour.required' => 'Tên tour bắt buộc phải nhập',
            'id_tinh.not_in' => 'Phải chọn tỉnh',
            'id_diadiem.not_in' => 'Phải chọn địa điểm',
            'id_loaitour.not_in' => 'Phải chọn loại tour',
            'gia_nguoi_lon.numeric' => 'Giá người lớn phải là số',
            'gia_tre_em.numeric' => 'Giá người lớn phải là số',
            'so_luong_toi_da.numeric' => 'Giá người lớn phải là số',
            'so_ngay.numeric' => 'Giá người lớn phải là số',
            'so_dem.numeric' => 'Giá người lớn phải là số',
            'lich_trinh.required' => 'Lịch trình bắt buộc phải nhập',
            'mo_ta_tour.required' => 'Mô tả bắt buộc phải nhập',
        ]);

         $dataInsert = [
            'ten_tour' => $request->ten_tour,
            'id_tinh' => $request->id_tinh,
            'id_diadiem' => $request->id_diadiem,
            'id_loaitour' => $request->id_loaitour,
            'phuong_tien' => $request->phuong_tien,
            'so_ngay' => $request->so_ngay,
            'so_dem' => $request->so_dem,
            'so_luong_toi_da' => $request->so_luong_toi_da,
            'gia_nguoi_lon' => $request->gia_nguoi_lon,
            'gia_tre_em' => $request->gia_tre_em,
            'mo_ta_tour' => $request->mo_ta_tour,
            'lich_trinh' => $request->lich_trinh,           
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' =>date('Y-m-d H:i:s'),
        ];

        $this->tour->addTour($dataInsert);

        return back()->with('thongbao','Thêm Tour thành công');
    }


    public function getEditTour(Request $request, $id = 0)
    {
        if (!empty($id)){
            $tourDetails = $this->tour->getDetail($id);
            if (!empty($tourDetails[0])) {
                 $request->session()->put('id', $id);
                 $tourDetails = $tourDetails[0];
            } else {
                return redirect()->route('tour.index')->with('thongbao', 'Tỉnh không tồn tại');
            }
        }else{
            return redirect()->route('tour.index')->with('thongbao', 'Liên kết không tồn tại');
        }

        $title = $tourDetails->ten_tour;

        return view('admin.tour.edit', compact('tourDetails', 'title'));
    }

    //post sửa

     public function postEditTour(Request $request){
       
        $id = session('id');
        if (empty($id)) {
            return back()->with('thongbao','Liên kế không tồn tại');
        }
        
        $request->validate([
                    'ten_tour' => 'required',
                    'id_tinh' => 'not_in:0',
                    'id_diadiem' => 'not_in:0',
                    'id_loaitour' => 'not_in:0',
                    'gia_nguoi_lon' => 'numeric',
                    'gia_tre_em' => 'numeric',
                    'so_luong_toi_da' => 'numeric',
                    'so_ngay' => 'numeric',
                    'so_dem' => 'numeric',
                    'lich_trinh' => 'required',
                    'mo_ta_tour' => 'required',

                ],[
                    'ten_tour.required' => 'Tên tour bắt buộc phải nhập',
                    'id_tinh.not_in' => 'Phải chọn tỉnh',
                    'id_diadiem.not_in' => 'Phải chọn địa điểm',
                    'id_loaitour.not_in' => 'Phải chọn loại tour',
                    'gia_nguoi_lon.numeric' => 'Giá người lớn phải là số',
                    'gia_tre_em.numeric' => 'Giá người lớn phải là số',
                    'so_luong_toi_da.numeric' => 'Giá người lớn phải là số',
                    'so_ngay.numeric' => 'Giá người lớn phải là số',
                    'so_dem.numeric' => 'Giá người lớn phải là số',
                    'lich_trinh.required' => 'Lịch trình bắt buộc phải nhập',
                    'mo_ta_tour.required' => 'Mô tả bắt buộc phải nhập',
                ]);


        $dataUpdate = [
            'ten_tour' => $request->ten_tour,
            'id_tinh' => $request->id_tinh,
            'id_diadiem' => $request->id_diadiem,
            'id_loaitour' => $request->id_loaitour,
            'phuong_tien' => $request->phuong_tien,
            'so_ngay' => $request->so_ngay,
            'so_dem' => $request->so_dem,
            'so_luong_toi_da' => $request->so_luong_toi_da,
            'gia_nguoi_lon' => $request->gia_nguoi_lon,
            'gia_tre_em' => $request->gia_tre_em,
            'mo_ta_tour' => $request->mo_ta_tour,
            'lich_trinh' => $request->lich_trinh,           
            'updated_at' =>date('Y-m-d H:i:s'),
        ];

       $this->tour->updateTour($dataUpdate,$id);

       return back()->with('thongbao','Cập nhật Tour thành công');
    }

    public function deleteTour($id)
    {
         if (!empty($id)){
            $tourDetails = $this->tour->getDetail($id);
            if (!empty($tourDetails[0])) {
                $deleteStatus = $this->tour->DeleteTour($id);
                if ($deleteStatus) {
                    $thongbao = 'Xóa tour thành công';
                } else {
                    $thongbao = 'Xóa tour không thành công. Vui lòng thử lại!';
                }
            } else {
               $thongbao = 'Tỉnh không tồn tại';
            }
        }else{
             $thongbao = 'Liên kết không tồn tại';
        }
        return redirect()->route('tour.index')->with('thongbao', $thongbao);

    }
}