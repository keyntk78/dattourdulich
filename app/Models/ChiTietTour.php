<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ChiTietTour extends Model
{
    use HasFactory;

     protected $table = 'chitiettour';

    //$filters = [], $keyword = null, $perpage = null
    public function getAllChiTietTour ($filters = [], $keyword = null, $perpage = null){
        $chitiettours = DB::table($this->table)
        ->select('chitiettour.*','tour.ten_tour as tour',)
        ->join('tour', 'chitiettour.id_tour', '=', 'tour.id')
        ->orderBy('tour.updated_at', 'DESC');
        
        if (!empty($filters)) {
            $chitiettours = $chitiettours->where($filters);
        }

         if (!empty($keyword)) {
            $chitiettours = $chitiettours->where(function($query) use ($keyword) {
                $query->orwhere('ten_tour', 'like', '%'.$keyword.'%');
            });
        }

        if(!empty($perpage)){
             $chitiettours = $chitiettours->paginate($perpage); // $perpage bản ghi trên 1 trang
        } else {
            $chitiettours = $chitiettours->get();
        }

        // $chitiettours= $chitiettours->get();
   
        return $chitiettours;
    }

    public function addChiTietTour($data)
    {
       return DB::table($this->table)->insert($data);
    }



     public function updateChiTietTour($data, $id) {
        return DB::table($this->table)->where('id', $id)->update($data);
    }



    // lấy top 5 danh sách các chi tiết tour và tên tour mới nhất// trang chủ
    public function getCTTTrangChu()
    {
       $list = DB::table($this->table)
        ->select('chitiettour.*','tour.ten_tour as tour', 'tour.lich_trinh as lich_trinh')
        ->join('tour', 'chitiettour.id_tour', '=', 'tour.id')
        ->orderBy('tour.updated_at', 'DESC')
        ->take(5)
        ->get();
        
       return $list;
    }

       // lấy tất cả danh sách các chi tiết tour và tên tour // trang chủ
    public function getAllCTTbyLoaitour($id)
    {
       $list = DB::table($this->table)
        ->select('chitiettour.*','tour.ten_tour as tour', 'tour.lich_trinh as lich_trinh', 'tour.gia_nguoi_lon as gia_nguoi_lon','tour.gia_tre_em as gia_tre_em', 'loaitour.ten_loai_tour as ten_loai_tour')
        ->join('tour', 'chitiettour.id_tour', '=', 'tour.id')
        ->join('loaitour', 'tour.id_loaitour', '=', 'loaitour.id')
        ->where('tour.id_loaitour', $id)
        ->orderBy('tour.updated_at', 'DESC') -> paginate(5);
        
       return $list;
    }

    // Lấy thông tin chi tiết tour theo id
     public function getXemChiTietTour($id)
    {
       $deltail = DB::table($this->table)
        ->select('chitiettour.*','tour.ten_tour as tour', 'tour.lich_trinh as lich_trinh','tour.mo_ta_tour as mo_ta_tour','tour.gia_nguoi_lon as gia_nguoi_lon','tour.gia_tre_em as gia_tre_em', 'tour.so_ngay as so_ngay', 'tour.so_dem as so_dem', 'tour.phuong_tien as phuong_tien', 'tour.so_luong_toi_da as so_luong_toi_da' )
        ->join('tour', 'chitiettour.id_tour', '=', 'tour.id')
        ->where('chitiettour.id', '=', $id)
        ->get();


       return $deltail;
    }

    // tìm kiếm
      public function getAllTimKiem($keyword)
    {
       $deltail = DB::table($this->table)
        ->select('chitiettour.*','tour.ten_tour as tour', 'tour.lich_trinh as lich_trinh', 'tour.gia_nguoi_lon as gia_nguoi_lon','tour.gia_tre_em as gia_tre_em')
        ->join('tour', 'chitiettour.id_tour', '=', 'tour.id')
        ->join('tinh', 'tour.id_tinh', '=', 'tinh.id_tinh')
        ->join('diadiem', 'tour.id_diadiem', '=', 'diadiem.id')
        ->orderBy('chitiettour.updated_at', 'DESC');
        
        if (!empty($keyword)) {
            $deltail = $deltail->where(function($query) use ($keyword) {
                $query->orwhere('tour.ten_tour', 'like', '%'.$keyword.'%');
                $query->orwhere('tour.phuong_tien', 'like', '%'.$keyword.'%');
                $query->orwhere('tinh.tentinh', 'like', '%'.$keyword.'%');
                $query->orwhere('diadiem.diem_den', 'like', '%'.$keyword.'%');

            });
        }

        $deltail = $deltail->get();
       return $deltail;
    }

    
}