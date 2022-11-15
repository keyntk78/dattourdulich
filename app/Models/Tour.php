<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Tour extends Model
{
    use HasFactory;

    protected $table = 'tour';

    public function getAllTour ($filters = [], $keyword = null, $perpage = null){
        $tours = DB::table($this->table)
        ->select('tour.*', 'tinh.tentinh as tinh', 'diadiem.diem_den as diadiem', 'loaitour.ten_loai_tour as loaitour')
        ->join('tinh', 'tour.id_tinh', '=', 'tinh.id_tinh')
        ->join('diadiem', 'tour.id_diadiem', '=', 'diadiem.id')
        ->join('loaitour', 'tour.id_loaitour', '=', 'loaitour.id')
        ->orderBy('tour.updated_at', 'DESC');
        
        if (!empty($filters)) {
            $tours = $tours->where($filters);
        }

         if (!empty($keyword)) {
            $tours = $tours->where(function($query) use ($keyword) {
                $query->orwhere('ten_tour', 'like', '%'.$keyword.'%');
                $query->orwhere('tinh.tentinh', 'like', '%'.$keyword.'%');
                $query->orwhere('diadiem.diem_den', 'like', '%'.$keyword.'%');
                $query->orwhere('loaitour.ten_loai_tour', 'like', '%'.$keyword.'%');
            });
        }

        if(!empty($perpage)){
             $tours = $tours->paginate($perpage); // $perpage bản ghi trên 1 trang
        } else {
            $tours = $tours->get();
        }

        return $tours;
    }

    public function addTour($data)
    {
       return DB::table($this->table)->insert($data);
    }

    public function getDetail($id) {
        
       return DB::table($this->table)->select('*')->where('id', '=', $id)->get();
        // return DB::select('SELECT * FROM '.$this->table.' WHERE id_tinh = ?', [$id]);
    }

    public function updateTour($data, $id) {
        return DB::table($this->table)->where('id', $id)->update($data);
        // return DB::update('UPDATE  '.$this->table.' SET tentinh = ?, updated_at=? WHERE id_tinh = ?', $data);
    }

    
    public function DeleteTour($id) {

        return DB::table($this->table)->where('id', $id)->delete();
        // return  DB::delete('DELETE FROM '.$this->table.' WHERE id_tinh = ?', [$id]);
    }

    // lấy tất cả tour theo thứ tự tên
      public function getAll()
    {
       $tours = DB::table($this->table)
       ->orderBy('ten_tour', 'ASC')
       ->get();

       return $tours;
    }

}