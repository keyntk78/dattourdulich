<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class ChuongTrinhTour extends Model
{
    use HasFactory;

    protected $table = 'chuongtrinhtour';

   public function getAllChuongtrinhtours ($filters = [], $keyword = null, $perpage = null){
        $chuongtrinhtours = DB::table($this->table)
        ->select('chuongtrinhtour.*', 'tour.ten_tour as tour')
        ->join('tour', 'chuongtrinhtour.id_tour', '=', 'tour.id')
        ->orderBy('chuongtrinhtour.updated_at', 'DESC');
        
        if (!empty($filters)) {
            $chuongtrinhtours = $chuongtrinhtours->where($filters);
        }

         if (!empty($keyword)) {
            $chuongtrinhtours = $chuongtrinhtours->where(function($query) use ($keyword) {
                $query->orwhere('tieu_de', 'like', '%'.$keyword.'%');
                $query->orwhere('tour.ten_tour', 'like', '%'.$keyword.'%');
                $query->orwhere('ngay_thu', 'like', '%'.$keyword.'%');
            });
        }

        if(!empty($perpage)){
             $chuongtrinhtours = $chuongtrinhtours->paginate($perpage); // $perpage bản ghi trên 1 trang
        } else {
            $chuongtrinhtours = $chuongtrinhtours->get();
        }

        return $chuongtrinhtours;
    }



    public function addChuongTrinhTour($data)
    {
       return DB::table($this->table)->insert($data);
    }

    public function getDetail($id) {
        
       return DB::table($this->table)->select('*')->where('id', '=', $id)->get();
        // return DB::select('SELECT * FROM '.$this->table.' WHERE id_tinh = ?', [$id]);
    }

    public function updateChuongtrinhtour($data, $id) {
        return DB::table($this->table)->where('id', $id)->update($data);
        // return DB::update('UPDATE  '.$this->table.' SET tentinh = ?, updated_at=? WHERE id_tinh = ?', $data);
    }

    public function DeleteChuongtrinhtour($id) {

        return DB::table($this->table)->where('id', $id)->delete();
        // return  DB::delete('DELETE FROM '.$this->table.' WHERE id_tinh = ?', [$id]);
    }




    // lấy danh sách chuongtrinhtour theo id_tour
    public function getAllChuongTrinhTourIDTour($id)
    {
       return DB::table($this->table)->where('id_tour',$id)->get();
    }
}