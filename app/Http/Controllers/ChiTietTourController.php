<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChiTietTour;

class ChiTietTourController extends Controller
{
    private $chitiettour;
    const _PER_PAGE = 10;
    
    public function __construct()
    {
        $this->chitiettour = new ChiTietTour();
    }

     public function index(Request $request)
    {
        $filters = [];
        $keyword = null;
        if (!empty($request->id_tour)) {
            $tour_id = $request->id_tour;
            
            $filters[] = ['chitiettour.id_tour', '=', $tour_id];
        }
        
        if (!empty($request->keywords)) {
            $keyword = $request->keywords;
        }
        $title = "Danh sách chi tiết tour";
        $chitiettours = $this->chitiettour->getAllChiTietTour($filters, $keyword, self:: _PER_PAGE); 
        return view('admin.chitiettour.index', compact('chitiettours', 'title'));
    }

     public function addChiTietTour()
    {
        $title = "Thêm chi tiết tour";
        return view('admin.chitiettour.add', compact('title'));
    }

     public function postaddChiTietTour(Request $request)
    {

         $request->validate([
            'id_tour' => 'not_in:0',
            'ngay_di' => 'required',
            'ngay_ve' => 'required',
            'hinh_anh' => 'required',
            'ghi_chu' => 'required',

        ],[
            'id_tour.not_in' => 'Phải chọn tour',
            'ngay_di.required' => 'Ngày đi bắt buộc phải nhập',
            'ngay_ve.required' => 'Ngày về bắt buộc phải nhập',
            'hinh_anh.required' => 'Hình ảnh bắt buộc',
            'ghi_chu.required' => 'Ngày về bắt buộc phải nhập',

        ]);

        $tourDetail =  getDetailTour($request->id_tour);
        if (!empty($tourDetail[0])) {
            $so_luong_con = $tourDetail[0]->so_luong_toi_da;
        } 

        $user_id = $request->user()->id;


        $gethinh = '';
        if($request->hasFile('hinh_anh')){
            //Hàm kiểm tra dữ liệu
            $this->validate($request, 
                [
                    //Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
                    'hinh_anh' => 'mimes:jpg,jpeg,png,gif|max:2048',
                ],			
                [
                    //Tùy chỉnh hiển thị thông báo không thõa điều kiện
                    'hinh_anh.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                    'hinh_anh.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
                ]
            );
            //Lưu hình ảnh vào thư mục public/upload/hinhthe
            $hinh_anh = $request->file('hinh_anh');
            $gethinh = time().'_'.$hinh_anh->getClientOriginalName();
            $destinationPath = public_path('uploads/images');
            $hinh_anh->move($destinationPath, $gethinh);
        }

         $dataInsert = [
            'id_tour' => $request->id_tour,
            'id_user' => $user_id,
            'ngay_di' => $request->ngay_di,
            'ngay_ve' => $request->ngay_ve,
            'so_luong_con' => $so_luong_con,
            'ghi_chu' => $request->ghi_chu,
            'hinh_anh' => $gethinh,          
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' =>date('Y-m-d H:i:s'),
        ];
        
        $this->chitiettour->addChiTietTour($dataInsert);

        return back()->with('thongbao','Thêm chi tiêt tour thành công');;
    }
}