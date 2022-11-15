<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChiTietTour;
use App\Models\PhieuDat;
use Illuminate\Support\Facades\Auth;


class PhieuDatController extends Controller
{
    private $chitiettour;
    private $phieudat;

     public function __construct()
    {
        $this->chitiettour = new ChiTietTour();
        $this->phieudat = new PhieuDat();

    }

    public function getPhieuDat(Request $request)
    {
        $id = $request->route('id');
        $chitiettour = $this->chitiettour->getXemChiTietTour( $id );
        $chitiettour = $chitiettour[0];
        $request->session()->put('so_luong_con', $chitiettour->so_luong_con);

        $title = "Đặt tour";
       return view('pages.dattour', compact('chitiettour', 'title'));
    }

    public function postPhieuDat(Request $request)
    {

        $request->validate([
            'so_luong_tre_em' => 'required|numeric|integer',
            'so_luong_nguoi_lon' => 'required|numeric|integer',

        ],[
            'so_luong_tre_em.required' => 'Số lượng bắt buộc phải nhập',
            'so_luong_tre_em.integer' => 'Số lượng là số nguyên',
            'so_luong_tre_em.numeric' => 'Là số',
            'so_luong_nguoi_lon.numeric' => 'Là số',
            'so_luong_nguoi_lon.required' => 'Số lượng bắt buộc phải nhập',
            'so_luong_nguoi_lon.integer' => 'Số lượng là số nguyên',
        ]);

        if (!Auth::check()) {
             return redirect()->route('dangnhap')->with('thongbao', 'Bạn phải đăng nhập để đặt tour');
        } 

        $id = $request->route('id');
        
        $dataInsert = [
                    'id_user' => Auth::user()->id,
                    'id_chitiet' => $id,
                    'ngay_dat' => date('Y-m-d H:i:s'),
                    'so_luong_tre_em' => $request->so_luong_tre_em,
                    'so_luong_nguoi_lon' => $request->so_luong_nguoi_lon,
                    'so_luong_dat' => $request->so_luong_nguoi_lon+ $request->so_luong_tre_em, 
                    'trang_thai' => 0,         
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' =>date('Y-m-d H:i:s'),
                ];
        
        $so_luong_con = session('so_luong_con');

        if ($so_luong_con < $dataInsert['so_luong_dat']) {
            return back()->with('thongbao','Số lượng tour không đủ. Vui lòng thử lại!');
        }

          
        $updateSoLuong = [
            'so_luong_con' => $so_luong_con - $dataInsert['so_luong_dat'],
            'updated_at' =>date('Y-m-d H:i:s')
        ] ;
        
        $this->phieudat->addPhieuDat($dataInsert);    
        $this->chitiettour->updateChiTietTour($updateSoLuong, $id);    
        
        return redirect()->route('trangchu')->with('thongbao', 'Bạn đã đặt tour thành công');
    }
}